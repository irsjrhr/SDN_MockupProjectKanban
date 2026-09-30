/**
 * ==============================================================================
 * DOCUMENTS TRACKING VERSION & REVISION HISTORY SCRIPT
 * Location: /tracking-version.js
 * ==============================================================================
 * Mengontrol rendering matriks dokumen, alur timeline riwayat versi (tree),
 * filter dokumen, bump semantic version, dan modal detail changelog.
 */

(function ($) {
    'use strict';

    /* -------------------------------------------------------------------------- */
    /* 1. HELPER BADGE COLORS & UTILITIES                                         */
    /* -------------------------------------------------------------------------- */
    function getTypeBadgeClass(type) {
        switch (type) {
            case 'BRD': return 'bg-primary text-white';
            case 'FSD': return 'bg-success text-white';
            case 'PRD': return 'bg-info text-dark';
            case 'ERD': return 'bg-warning text-dark';
            case 'Blueprint': return 'bg-danger text-white';
            default: return 'bg-secondary text-white';
        }
    }

    /* Populate Target Doc Select dropdown */
    function populateTargetDocSelect() {
        if (typeof DocTracker === 'undefined') return;
        const docs = DocTracker.getAllDocs();
        const $sel = $('#inputTargetDoc');
        if (!$sel.length) return;

        const currentVal = $sel.val();
        $sel.empty();
        $sel.append('<option value="" disabled selected>-- Choose Document --</option>');
        docs.forEach(d => {
            $sel.append(`<option value="${d.code}" data-type="${d.type}" data-proj="${d.project}" data-cur="${d.latestVersion}">${d.code}: ${d.title} (Current: ${d.latestVersion})</option>`);
        });
        if (currentVal) $sel.val(currentVal);
    }

    /* -------------------------------------------------------------------------- */
    /* 2. RENDER MATRIX VIEW (DOCUMENT LIST + REVISIONS ACCORDION)                */
    /* -------------------------------------------------------------------------- */
    function renderMatrixView() {
        const $container = $('#docCardsContainer');
        if (!$container.length || typeof DocTracker === 'undefined') return;
        $container.empty();

        const TRACKED_DOCS = DocTracker.getAllDocs();
        const typeFilter = $('#docTypeFilterGroup .btn.active').data('filter') || 'all';
        const projectFilter = $('#selectProjectFilter').val() || 'all';
        const searchQuery = $('#searchDocInput').val() ? $('#searchDocInput').val().toLowerCase().trim() : '';

        let filteredDocs = TRACKED_DOCS.filter(doc => {
            const matchType = (typeFilter === 'all' || doc.type.toLowerCase() === typeFilter.toLowerCase());
            const matchProject = (projectFilter === 'all' || doc.project === projectFilter);
            const matchSearch = (
                (doc.title && doc.title.toLowerCase().includes(searchQuery)) ||
                (doc.code && doc.code.toLowerCase().includes(searchQuery)) ||
                (doc.project && doc.project.toLowerCase().includes(searchQuery)) ||
                (doc.author && doc.author.toLowerCase().includes(searchQuery)) ||
                (doc.latestVersion && doc.latestVersion.toLowerCase().includes(searchQuery))
            );
            return matchType && matchProject && matchSearch;
        });

        // Update KPI metrics
        $('#kpiTotalDocs').text(`${TRACKED_DOCS.length} Files`);

        if (filteredDocs.length === 0) {
            $container.html(`
                <div class="card shadow-sm border rounded-4 bg-white p-5 text-center">
                    <div class="text-muted mb-3"><i class="fa-solid fa-folder-open fs-1"></i></div>
                    <h4 class="h6 fw-bold text-dark mb-1">No Matching Tracked Documents</h4>
                    <p class="text-muted fs-8 mb-3">Try adjusting your filters or search terms.</p>
                    <div>
                        <button class="btn btn-sm btn-outline-secondary" onclick="resetFilters()">Reset All Filters</button>
                    </div>
                </div>
            `);
            return;
        }

        filteredDocs.forEach((doc, idx) => {
            const safeCode = doc.code.replace(/[^a-zA-Z0-9]/g, '_');
            const collapseId = `collapseRevisions_${safeCode}`;
            const cardId = `card_doc_${safeCode}`;
            
            let revisionsHtml = '';
            const revisions = (doc.revisions && doc.revisions.length) ? doc.revisions : [{
                version: doc.latestVersion,
                isLatest: true,
                date: doc.updatedAt,
                author: doc.author,
                authorRole: doc.authorRole || 'Contributor',
                title: 'Initial Release Baseline',
                summary: doc.description,
                hash: 'sha256:e3b0c442',
                fileSize: doc.fileSize || '2.4 MB PDF'
            }];

            revisions.forEach((rev) => {
                const isLatestBadge = rev.isLatest 
                    ? '<span class="badge bg-success-subtle text-success border border-success-subtle ms-2">Active Baseline</span>' 
                    : '<span class="badge bg-light text-muted border ms-2">Archived</span>';

                revisionsHtml += `
                    <div class="p-3 border rounded-3 bg-white mb-2 shadow-xs">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-dark font-mono fs-8">${rev.version}</span>
                                ${isLatestBadge}
                                <span class="fw-bold text-dark fs-7">${rev.title}</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-muted fs-8"><i class="fa-regular fa-calendar me-1"></i>${rev.date}</span>
                                <span class="text-muted fs-8">&bull; By <strong>${rev.author}</strong></span>
                            </div>
                        </div>
                        <p class="text-muted fs-8 mb-2">${rev.summary}</p>
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pt-2 border-top">
                            <div class="d-flex align-items-center gap-2 font-mono fs-9 text-muted">
                                <span class="badge bg-light text-dark border"><i class="fa-solid fa-fingerprint me-1"></i>${rev.hash}</span>
                                <span><i class="fa-regular fa-file-pdf me-1"></i>${rev.fileSize}</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <button class="btn btn-xs btn-outline-primary rounded-2 px-2 py-1 fs-8" onclick="openDetailsModal('${doc.code}', '${rev.version}')" title="View Changelog">
                                    <i class="fa-regular fa-file-lines me-1"></i> Changelog
                                </button>
                                <button class="btn btn-xs btn-light border rounded-2 px-2 py-1 fs-8" onclick="downloadVersionAsset('${doc.code}', '${rev.version}')" title="Download Asset">
                                    <i class="fa-solid fa-download me-1"></i> Download
                                </button>
                                ${!rev.isLatest ? `
                                    <button class="btn btn-xs btn-outline-danger rounded-2 px-2 py-1 fs-8" onclick="promptRollback('${doc.title}', '${rev.version}')" title="Restore this version">
                                        <i class="fa-solid fa-rotate-left me-1"></i> Restore
                                    </button>
                                ` : ''}
                            </div>
                        </div>
                    </div>
                `;
            });

            const cardHtml = `
                <div class="card card-doc-track shadow-sm rounded-4 bg-white p-4" id="${cardId}">
                    <div class="d-flex flex-wrap align-items-start justify-content-between gap-3">
                        <div class="d-flex align-items-start gap-3 flex-grow-1">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <span class="doc-type-pill ${getTypeBadgeClass(doc.type)} mb-1">${doc.type}</span>
                                <span class="font-mono fs-9 text-muted fw-bold">${doc.code}</span>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                                    <h3 class="h6 fw-bold mb-0 text-dark">${doc.title}</h3>
                                    <span class="badge bg-dark font-mono fs-8">${doc.latestVersion}</span>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle fs-9"><i class="fa-solid fa-circle-check me-1"></i>Active</span>
                                </div>
                                <p class="text-muted fs-8 mb-2">${doc.description}</p>
                                <div class="d-flex align-items-center gap-3 flex-wrap fs-8 text-muted">
                                    <span><i class="fa-solid fa-layer-group text-primary me-1"></i><strong>${doc.project}</strong></span>
                                    <span><i class="fa-solid fa-code-branch text-indigo me-1"></i>${revisions.length} Revisions Logged</span>
                                    <span class="d-flex align-items-center gap-1">
                                        <img src="${doc.authorAvatar}" class="avatar-xs rounded-circle" alt="">
                                        <span>${doc.author} &bull; ${doc.updatedAt}</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-sm btn-outline-primary rounded-3 px-3 py-1.5 fs-8" onclick="quickNewVersion('${doc.code}')">
                                <i class="fa-solid fa-plus me-1"></i> Bump Version
                            </button>
                            <button class="btn btn-sm btn-light border rounded-3 px-3 py-1.5 fs-8" type="button" data-bs-toggle="collapse" data-bs-target="#${collapseId}" aria-expanded="${idx === 0 ? 'true' : 'false'}">
                                <i class="fa-solid fa-clock-rotate-left me-1"></i> Revisions (${revisions.length})
                            </button>
                        </div>
                    </div>

                    <!-- Revision Drawer Accordion -->
                    <div class="collapse ${idx === 0 ? 'show' : ''} mt-3 pt-3 border-top" id="${collapseId}">
                        <div class="bg-light-subtle p-3 rounded-3 border">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-8 fw-bold text-uppercase text-muted"><i class="fa-solid fa-timeline me-1 text-primary"></i> Version Changelog Trail</span>
                                <span class="fs-9 text-muted font-mono">Semantic Versioning</span>
                            </div>
                            ${revisionsHtml}
                        </div>
                    </div>
                </div>
            `;

            $container.append(cardHtml);
        });
    }

    /* -------------------------------------------------------------------------- */
    /* 3. RENDER TREE TIMELINE VIEW (CHRONOLOGICAL AUDIT TRAIL)                   */
    /* -------------------------------------------------------------------------- */
    function renderTreeTimeline() {
        const $tree = $('#timelineTreeContainer');
        if (!$tree.length || typeof DocTracker === 'undefined') return;
        $tree.empty();

        const TRACKED_DOCS = DocTracker.getAllDocs();

        // Flatten all revisions with document context
        let allTimelineEvents = [];
        TRACKED_DOCS.forEach(doc => {
            const revisions = (doc.revisions && doc.revisions.length) ? doc.revisions : [{
                version: doc.latestVersion,
                isLatest: true,
                date: doc.updatedAt,
                author: doc.author,
                authorRole: doc.authorRole || 'Contributor',
                title: 'Initial Baseline Release',
                summary: doc.description,
                hash: 'sha256:e3b0c442',
                fileSize: doc.fileSize || '2.4 MB PDF'
            }];

            revisions.forEach(rev => {
                allTimelineEvents.push({
                    docCode: doc.code,
                    docTitle: doc.title,
                    docType: doc.type,
                    project: doc.project,
                    ...rev
                });
            });
        });

        allTimelineEvents.forEach(evt => {
            const nodeClass = evt.isLatest ? 'node-latest' : '';
            
            const nodeHtml = `
                <div class="timeline-version-node ${nodeClass}">
                    <div class="p-3 border rounded-3 bg-light-subtle shadow-xs">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-1">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge ${getTypeBadgeClass(evt.docType)}">${evt.docType}</span>
                                <span class="font-mono fw-bold fs-7 text-dark">${evt.docCode}</span>
                                <span class="badge bg-dark font-mono fs-8">${evt.version}</span>
                                <span class="fw-bold text-dark fs-7">${evt.title}</span>
                            </div>
                            <span class="text-muted fs-8"><i class="fa-regular fa-clock me-1"></i>${evt.date}</span>
                        </div>
                        <p class="text-muted fs-8 mb-2">${evt.summary}</p>
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 fs-9 text-muted pt-2 border-top">
                            <div>
                                <span class="me-2"><i class="fa-solid fa-layer-group text-primary me-1"></i>${evt.project}</span>
                                <span class="me-2">&bull; Author: <strong>${evt.author}</strong> (${evt.authorRole || 'Contributor'})</span>
                                <code class="text-muted">${evt.hash}</code>
                            </div>
                            <div class="d-flex gap-1">
                                <button class="btn btn-xs btn-outline-primary py-0.5 px-2 fs-9" onclick="openDetailsModal('${evt.docCode}', '${evt.version}')">
                                    <i class="fa-regular fa-file-lines me-1"></i> Changelog
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            $tree.append(nodeHtml);
        });
    }

    /* -------------------------------------------------------------------------- */
    /* 4. INTERACTIVE ACTIONS & MODALS                                            */
    /* -------------------------------------------------------------------------- */
    function showTrackToast(message) {
        if (typeof DocTracker !== 'undefined' && DocTracker.showToast) {
            DocTracker.showToast(message);
        } else {
            const toastEl = document.getElementById('trackLiveToast');
            if (toastEl) {
                $('#toastTrackMessage').text(message);
                const toast = bootstrap.Toast.getOrCreateInstance(toastEl);
                toast.show();
            }
        }
    }

    function openDetailsModal(docCode, version) {
        if (typeof DocTracker === 'undefined') return;
        const doc = DocTracker.getDocByCode(docCode);
        if (!doc) return;
        const rev = (doc.revisions && doc.revisions.find(r => r.version === version)) || (doc.revisions ? doc.revisions[0] : {
            version: doc.latestVersion,
            date: doc.updatedAt,
            title: doc.title,
            summary: doc.description,
            author: doc.author,
            authorRole: 'Contributor',
            hash: 'sha256:e3b0c442'
        });

        $('#detailModalSubtitle').text(`Release info for ${doc.code}`);
        $('#detailVersionTag').text(rev.version);
        $('#detailStatusBadge').html(rev.isLatest ? '<span class="badge bg-success-subtle text-success border border-success-subtle">Active Baseline</span>' : '<span class="badge bg-light text-muted border">Archived</span>');
        $('#detailReleaseDate').text(rev.date);
        $('#detailReleaseTitle').text(rev.title);
        $('#detailDocContext').text(`${doc.code} • ${doc.project} • ${doc.title}`);
        $('#detailChangelogContent').text(rev.summary);
        $('#detailAuthorName').text(rev.author);
        $('#detailAuthorRole').text(rev.authorRole || 'Contributor');
        $('#detailChecksum').text(rev.hash || 'sha256:e3b0c442');

        $('#btnDownloadFromModal').off('click').on('click', function () {
            downloadVersionAsset(doc.code, rev.version);
        });

        const modalEl = document.getElementById('modalVersionDetails');
        if (modalEl) {
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    }

    function promptRollback(docTitle, targetVersion) {
        $('#rollbackDocName').text(docTitle);
        $('#rollbackTargetVer').text(targetVersion);
        const modalEl = document.getElementById('modalRollback');
        if (modalEl) {
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    }

    function downloadVersionAsset(docCode, version) {
        showTrackToast(`Downloading signed specification archive for ${docCode} (${version})...`);
    }

    function quickNewVersion(docCode) {
        populateTargetDocSelect();
        $('#inputTargetDoc').val(docCode).trigger('change');
        const modalEl = document.getElementById('modalNewVersion');
        if (modalEl) {
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    }

    function resetFilters() {
        $('#docTypeFilterGroup .btn').removeClass('active btn-primary').addClass('btn-light text-muted');
        $('#docTypeFilterGroup .btn[data-filter="all"]').addClass('active btn-primary').removeClass('btn-light text-muted');
        $('#selectProjectFilter').val('all');
        $('#searchDocInput').val('');
        renderMatrixView();
    }

    function exportAuditLog() {
        showTrackToast('Exporting complete document revision list (CSV)...');
    }

    /* -------------------------------------------------------------------------- */
    /* 5. DOM READY INITIALIZATION                                                */
    /* -------------------------------------------------------------------------- */
    $(document).ready(function () {
        populateTargetDocSelect();
        renderMatrixView();
        renderTreeTimeline();

        // Check URL query param: ?doc=DOC-BRD-001
        const urlParams = new URLSearchParams(window.location.search);
        const targetDocParam = urlParams.get('doc');
        if (targetDocParam) {
            const safeCode = targetDocParam.replace(/[^a-zA-Z0-9]/g, '_');
            $(`#collapseRevisions_${safeCode}`).collapse('show');
            const targetCard = $(`#card_doc_${safeCode}`);
            if (targetCard.length) {
                $('html, body').animate({
                    scrollTop: targetCard.offset().top - 100
                }, 500);
                targetCard.addClass('border-primary shadow-lg').css({
                    'box-shadow': '0 0 20px rgba(99, 102, 241, 0.35)',
                    'border-width': '2px'
                });
            }
        }

        // Doc type filter click
        $('#docTypeFilterGroup .btn').on('click', function () {
            $('#docTypeFilterGroup .btn').removeClass('active btn-primary').addClass('btn-light text-muted');
            $(this).addClass('active btn-primary').removeClass('btn-light text-muted');
            renderMatrixView();
        });

        // Dropdown filter & live search
        $('#selectProjectFilter').on('change', renderMatrixView);
        $('#searchDocInput').on('input', renderMatrixView);

        // View mode switcher (Matrix vs Tree)
        $('#viewModeTabs .nav-link').on('click', function (e) {
            e.preventDefault();
            $('#viewModeTabs .nav-link').removeClass('active');
            $(this).addClass('active');

            const view = $(this).data('view');
            if (view === 'matrix') {
                $('#viewMatrix').show();
                $('#viewTimeline').hide();
            } else {
                $('#viewMatrix').hide();
                $('#viewTimeline').show();
            }
        });

        // Form Submit: New Version Release
        $('#formNewVersion').on('submit', function (e) {
            e.preventDefault();

            const docCode = $('#inputTargetDoc').val();
            const title = $('#inputVersionTitle').val();
            const bumpType = $('input[name="versionBump"]:checked').val() || 'patch';
            const changelog = $('#inputChangelog').val();
            const authorName = $('#inputAuthorName').val() || 'Jenno Wilson';

            if (typeof DocTracker !== 'undefined' && docCode) {
                const updated = DocTracker.updateDoc(docCode, {}, {
                    isBump: true,
                    bumpType: bumpType,
                    title: title,
                    changelog: changelog,
                    author: authorName,
                    authorRole: 'Contributor'
                });

                if (updated) {
                    renderMatrixView();
                    renderTreeTimeline();
                    populateTargetDocSelect();

                    const modalEl = document.getElementById('modalNewVersion');
                    if (modalEl) {
                        const modal = bootstrap.Modal.getInstance(modalEl);
                        if (modal) modal.hide();
                    }
                    this.reset();
                    showTrackToast(`Successfully published ${docCode} version ${updated.latestVersion}!`);
                }
            }
        });

        // Rollback confirm
        $('#btnConfirmRollback').on('click', function () {
            const targetVer = $('#rollbackTargetVer').text();
            const modalEl = document.getElementById('modalRollback');
            if (modalEl) {
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            }
            showTrackToast(`Rolled back active baseline to version ${targetVer}`);
        });
    });

    // Expose functions globally for onclick attributes
    window.getTypeBadgeClass = getTypeBadgeClass;
    window.populateTargetDocSelect = populateTargetDocSelect;
    window.renderMatrixView = renderMatrixView;
    window.renderTreeTimeline = renderTreeTimeline;
    window.showTrackToast = showTrackToast;
    window.openDetailsModal = openDetailsModal;
    window.promptRollback = promptRollback;
    window.downloadVersionAsset = downloadVersionAsset;
    window.quickNewVersion = quickNewVersion;
    window.resetFilters = resetFilters;
    window.exportAuditLog = exportAuditLog;

})(typeof jQuery !== 'undefined' ? jQuery : window.$);
