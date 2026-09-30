<?php
$pageTitle = 'Documents Tracking Version - Documentation - Syncboard';
$currentPage = 'tracking-version';
$currentModule = 'workspace';
$basePath = '../../';
$breadcrumbs = [
    ['title' => 'Workspace', 'url' => '../KanbanProject.php'],
    ['title' => 'Documentation', 'url' => 'BRD.php'],
    ['title' => 'Version Tracking', 'url' => '']
];
$extraJs = ['../../assets/js/tracking-version.js'];
include __DIR__ . '/../../layouts/header.php';
?>
<style>
    .font-mono { font-family: 'Fira Code', monospace; }
    .timeline-version-tree { position: relative; padding-left: 28px; }
    .timeline-version-tree::before { content: ''; position: absolute; top: 14px; bottom: 14px; left: 10px; width: 2px; background: #e2e8f0; }
    .timeline-version-node { position: relative; margin-bottom: 24px; }
    .timeline-version-node::before { content: ''; position: absolute; left: -24px; top: 6px; width: 14px; height: 14px; border-radius: 50%; background: #fff; border: 3px solid var(--primary-color, #4f46e5); box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15); z-index: 1; }
    .timeline-version-node.node-latest::before { background: #10b981; border-color: #059669; box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.2); }
    .doc-type-pill { font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; padding: 3px 8px; border-radius: 6px; }
    .card-doc-track { transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid #e2e8f0; }
    .card-doc-track:hover { border-color: #cbd5e1; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.03); transform: translateY(-2px); }
    .changelog-box { background-color: #f8fafc; border-left: 3px solid #6366f1; padding: 10px 14px; border-radius: 6px; }
</style>


            <!-- Page Header Banner -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white shadow-sm" style="background: linear-gradient(135deg, #6366f1, #8b5cf6); width: 48px; height: 48px;">
                        <i class="fa-solid fa-code-compare fs-4"></i>
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <h1 class="project-title h3 fw-extrabold mb-0">Documents Tracking Version</h1>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-8">Semantic Versioning</span>
                        </div>
                        <span class="text-muted fs-7">Track technical specifications, changelogs, file attachments, and version release history</span>
                    </div>
                </div>

                <div class="project-actions-area d-flex align-items-center gap-2 flex-wrap">
                    <button class="btn btn-outline-secondary btn-sm px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm bg-white" onclick="exportAuditLog()">
                        <i class="fa-solid fa-file-export text-primary"></i> Export Version List (CSV)
                    </button>
                    <button class="btn btn-primary btn-sm px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalNewVersion">
                        <i class="fa-solid fa-plus"></i> Release New Version
                    </button>
                </div>
            </section>

            <!-- KPI Metric Summary Cards -->
            <div class="px-4 pb-2">
                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 bg-white p-3 d-flex flex-row align-items-center justify-content-between">
                            <div>
                                <span class="text-muted fs-8 fw-bold text-uppercase d-block">Tracked Documents</span>
                                <h3 class="h4 fw-bold mb-0 text-dark" id="kpiTotalDocs">14 Files</h3>
                                <span class="fs-8 text-success"><i class="fa-solid fa-circle-check me-1"></i>All Types Synced</span>
                            </div>
                            <div class="rounded-3 bg-primary-subtle text-primary p-3">
                                <i class="fa-regular fa-folder-open fs-4"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 bg-white p-3 d-flex flex-row align-items-center justify-content-between">
                            <div>
                                <span class="text-muted fs-8 fw-bold text-uppercase d-block">Total Revisions</span>
                                <h3 class="h4 fw-bold mb-0 text-dark">48 Commits</h3>
                                <span class="fs-8 text-primary"><i class="fa-solid fa-code-commit me-1"></i>+6 This Month</span>
                            </div>
                            <div class="rounded-3 bg-indigo-subtle text-indigo p-3" style="background-color: #ede9fe; color: #6d28d9;">
                                <i class="fa-solid fa-timeline fs-4"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 bg-white p-3 d-flex flex-row align-items-center justify-content-between">
                            <div>
                                <span class="text-muted fs-8 fw-bold text-uppercase d-block">Active Projects</span>
                                <h3 class="h4 fw-bold mb-0 text-dark">4 Projects</h3>
                                <span class="fs-8 text-muted"><i class="fa-solid fa-layer-group me-1"></i>Covered in Workspace</span>
                            </div>
                            <div class="rounded-3 bg-info-subtle text-info p-3">
                                <i class="fa-solid fa-folder-tree fs-4"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 bg-white p-3 d-flex flex-row align-items-center justify-content-between">
                            <div>
                                <span class="text-muted fs-8 fw-bold text-uppercase d-block">Latest Release</span>
                                <h3 class="h4 fw-bold mb-0 text-success font-mono">v2.4.0</h3>
                                <span class="fs-8 text-muted">2 hours ago by @sarah</span>
                            </div>
                            <div class="rounded-3 bg-success-subtle text-success p-3">
                                <i class="fa-solid fa-tag fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Toolbar Filters & View Switcher -->
            <div class="toolbar-container px-4 py-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <!-- Doc Type Filter Pills -->
                    <div class="btn-group btn-group-sm bg-white p-1 rounded-3 border shadow-sm" id="docTypeFilterGroup">
                        <button class="btn btn-sm btn-primary rounded-2 active" data-filter="all">All Docs (14)</button>
                        <button class="btn btn-sm btn-light rounded-2 text-muted" data-filter="BRD">BRD (4)</button>
                        <button class="btn btn-sm btn-light rounded-2 text-muted" data-filter="FSD">FSD (3)</button>
                        <button class="btn btn-sm btn-light rounded-2 text-muted" data-filter="PRD">PRD (3)</button>
                        <button class="btn btn-sm btn-light rounded-2 text-muted" data-filter="ERD">ERD (2)</button>
                        <button class="btn btn-sm btn-light rounded-2 text-muted" data-filter="Blueprint">Blueprint (2)</button>
                    </div>

                    <!-- Project Scope Dropdown -->
                    <select class="form-select form-select-sm fs-8 fw-semibold rounded-3 shadow-sm" id="selectProjectFilter" style="width: auto;">
                        <option value="all">All Projects</option>
                        <option value="Middleware Project">Middleware Project</option>
                        <option value="Company Website">Company Website</option>
                        <option value="Landing Page Campaign">Landing Page Campaign</option>
                        <option value="Mobile CRM Application">Mobile CRM Application</option>
                    </select>
                </div>

                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <!-- Search Input -->
                    <div class="input-group input-group-sm shadow-sm" style="width: 260px;">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control border-start-0 fs-8" id="searchDocInput" placeholder="Search doc, code, author, tag...">
                    </div>

                    <!-- View Switcher Tabs -->
                    <div class="nav nav-pills view-tabs gap-1 p-1 bg-white border rounded-3 shadow-sm" id="viewModeTabs">
                        <button class="nav-link active tab-btn py-1 px-2 fs-8 rounded-2" data-view="matrix" title="Matrix & Drawer View">
                            <i class="fa-solid fa-list-check me-1"></i> Matrix
                        </button>
                        <button class="nav-link tab-btn py-1 px-2 fs-8 rounded-2" data-view="timeline" title="Tree Timeline View">
                            <i class="fa-solid fa-timeline me-1"></i> Tree
                        </button>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="view-wrapper flex-grow-1 px-4 pb-4">

                <!-- 1. MATRIX VIEW (DOCUMENT LIST + REVISION LOG) -->
                <div class="view-content active" id="viewMatrix">
                    <div class="d-flex flex-column gap-3" id="docCardsContainer">
                        <!-- Dynamic Document Version Cards will be populated here via JS -->
                    </div>
                </div>

                <!-- 2. TREE TIMELINE VIEW (GLOBAL CHRONOLOGICAL REVISION LOG) -->
                <div class="view-content" id="viewTimeline" style="display: none;">
                    <div class="card shadow-sm border rounded-4 bg-white p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom">
                            <div>
                                <h2 class="h5 fw-bold mb-1 text-dark">Chronological Revision Tree</h2>
                                <span class="text-muted fs-8">Unified timeline across all technical specs, ERDs, and architecture blueprints</span>
                            </div>
                            <button class="btn btn-outline-secondary btn-sm rounded-3" onclick="exportAuditLog()">
                                <i class="fa-solid fa-file-export me-1"></i> Export (CSV)
                            </button>
                        </div>

                        <div class="timeline-version-tree" id="timelineTreeContainer">
                            <!-- Populated dynamically via JS -->
                        </div>
                    </div>
                </div>
            </div>

    <!-- MODAL 1: RELEASE NEW VERSION -->
    <div class="modal fade" id="modalNewVersion" tabindex="-1" aria-labelledby="modalNewVersionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-bottom px-4 py-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-3 bg-primary text-white p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                            <i class="fa-solid fa-code-branch"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0" id="modalNewVersionLabel">Release / Register New Version</h5>
                            <span class="text-muted fs-8">Create a new tracked revision with semantic version bump</span>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formNewVersion">
                    <div class="modal-body px-4 py-3">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label fs-7 fw-bold">Select Target Document <span class="text-danger">*</span></label>
                                <select class="form-select fs-7 rounded-3" id="inputTargetDoc" required>
                                    <option value="" disabled selected>-- Choose Document --</option>
                                    <option value="DOC-BRD-001" data-type="BRD" data-proj="Middleware Project" data-cur="v2.3.0">DOC-BRD-001: Core Architecture & API Gateway (Current: v2.3.0)</option>
                                    <option value="DOC-FSD-002" data-type="FSD" data-proj="Middleware Project" data-cur="v2.1.0">DOC-FSD-002: JWT Authentication & Role ACL (Current: v2.1.0)</option>
                                    <option value="DOC-PRD-003" data-type="PRD" data-proj="Company Website" data-cur="v1.4.2">DOC-PRD-003: CMS Multi-Language & Blog Engine (Current: v1.4.2)</option>
                                    <option value="DOC-ERD-004" data-type="ERD" data-proj="Middleware Project" data-cur="v3.0.1">DOC-ERD-004: Master PostgreSQL Schema & Migrations (Current: v3.0.1)</option>
                                    <option value="DOC-BLU-005" data-type="Blueprint" data-proj="Mobile CRM Application" data-cur="v1.1.0">DOC-BLU-005: Cloud Infrastructure & AWS Topology (Current: v1.1.0)</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label fs-7 fw-bold">Semantic Version Bump <span class="text-danger">*</span></label>
                                <div class="d-flex gap-2">
                                    <div class="form-check form-check-inline flex-grow-1 p-2 border rounded-3 text-center bg-light">
                                        <input class="form-check-input" type="radio" name="versionBump" id="bumpPatch" value="patch" checked>
                                        <label class="form-check-label fs-8 fw-bold d-block" for="bumpPatch">Patch (v2.3.1)</label>
                                        <span class="fs-9 text-muted d-block">Bugfix / Minor Edit</span>
                                    </div>
                                    <div class="form-check form-check-inline flex-grow-1 p-2 border rounded-3 text-center bg-light">
                                        <input class="form-check-input" type="radio" name="versionBump" id="bumpMinor" value="minor">
                                        <label class="form-check-label fs-8 fw-bold d-block" for="bumpMinor">Minor (v2.4.0)</label>
                                        <span class="fs-9 text-muted d-block">New Features / Specs</span>
                                    </div>
                                    <div class="form-check form-check-inline flex-grow-1 p-2 border rounded-3 text-center bg-light">
                                        <input class="form-check-input" type="radio" name="versionBump" id="bumpMajor" value="major">
                                        <label class="form-check-label fs-8 fw-bold d-block" for="bumpMajor">Major (v3.0.0)</label>
                                        <span class="fs-9 text-muted d-block">Major Rewrite</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-8">
                                <label class="form-label fs-7 fw-bold">Version Release Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control fs-7 rounded-3" id="inputVersionTitle" placeholder="e.g. Add OAuth2 Token Refresh & Rate Limiting Specs" required>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label fs-7 fw-bold">Author / Contributor</label>
                                <input type="text" class="form-control fs-7 rounded-3" id="inputAuthorName" value="Jenno Wilson">
                            </div>

                            <div class="col-12">
                                <label class="form-label fs-7 fw-bold">Changelog & Key Modifications <span class="text-danger">*</span></label>
                                <textarea class="form-control fs-7 font-mono rounded-3" rows="4" id="inputChangelog" placeholder="- Added section 4.2 Rate Limiter Redis configuration&#10;- Deprecated legacy API key header authentication&#10;- Updated ERD table tbl_middleware_tokens with expires_at column" required></textarea>
                                <span class="text-muted fs-8">Provide a clear summary of what changed in this version release.</span>
                            </div>

                            <div class="col-12">
                                <label class="form-label fs-7 fw-bold">Upload Source Document (PDF / MD / DOCX)</label>
                                <input type="file" class="form-control fs-7 rounded-3" id="inputFileAttachment">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top px-4 py-3">
                        <button type="button" class="btn btn-light border fs-7 rounded-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary fs-7 rounded-3 px-4">
                            <i class="fa-solid fa-cloud-arrow-up me-1"></i> Publish Version
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL 2: VERSION RELEASE DETAILS & CHANGELOG VIEWER -->
    <div class="modal fade" id="modalVersionDetails" tabindex="-1" aria-labelledby="modalVersionDetailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-bottom px-4 py-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-3 bg-primary text-white p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                            <i class="fa-regular fa-file-lines"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0" id="modalVersionDetailsLabel">Version Release Details</h5>
                            <span class="text-muted fs-8" id="detailModalSubtitle">Release info & changelog notes</span>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-3">
                    <!-- Release Header Card -->
                    <div class="p-3 bg-light rounded-4 border mb-3">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-dark font-mono fs-7" id="detailVersionTag">v2.4.0</span>
                                <span id="detailStatusBadge"></span>
                            </div>
                            <span class="text-muted fs-8"><i class="fa-regular fa-calendar me-1"></i><span id="detailReleaseDate">30 Sep 2026</span></span>
                        </div>
                        <h5 class="fw-bold text-dark mb-1" id="detailReleaseTitle">Release Title</h5>
                        <p class="text-muted fs-8 mb-0" id="detailDocContext">DOC-BRD-001 &bull; Middleware Project</p>
                    </div>

                    <!-- Changelog / Modification Summary -->
                    <div class="mb-4">
                        <h6 class="fw-bold fs-7 text-dark mb-2"><i class="fa-solid fa-list-check text-primary me-2"></i>Release Changelog & Notes</h6>
                        <div class="changelog-box">
                            <p class="fs-8 text-dark mb-0 font-mono" id="detailChangelogContent" style="white-space: pre-line;">- Added section 4.2 Rate Limiter Redis configuration&#10;- Deprecated legacy API key header authentication&#10;- Updated ERD table tbl_middleware_tokens with expires_at column</p>
                        </div>
                    </div>

                    <!-- Meta info Details -->
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="p-3 border rounded-3 bg-light-subtle">
                                <span class="text-muted fs-8 fw-bold d-block text-uppercase">Author / Contributor</span>
                                <span class="fs-7 fw-bold text-dark d-block" id="detailAuthorName">Sarah Chen</span>
                                <span class="fs-8 text-muted" id="detailAuthorRole">Tech Lead</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="p-3 border rounded-3 bg-light-subtle">
                                <span class="text-muted fs-8 fw-bold d-block text-uppercase">SHA-256 Checksum</span>
                                <code class="fs-8 text-primary d-block font-mono" id="detailChecksum">sha256:e3b0c44298fc1c14</code>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top px-4 py-3">
                    <button type="button" class="btn btn-outline-secondary fs-7 rounded-3" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary fs-7 rounded-3" id="btnDownloadFromModal">
                        <i class="fa-solid fa-download me-1"></i> Download Document File
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 3: ROLLBACK CONFIRMATION -->
    <div class="modal fade" id="modalRollback" tabindex="-1" aria-labelledby="modalRollbackLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-bottom px-4 py-3 bg-danger-subtle">
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation text-danger fs-4"></i>
                        <h5 class="modal-title fw-bold text-danger mb-0" id="modalRollbackLabel">Confirm Version Rollback</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-3">
                    <p class="text-dark fs-7 mb-2">Are you sure you want to restore the document back to this historic revision?</p>
                    <div class="p-3 bg-light rounded-3 border mb-3">
                        <span class="d-block fw-bold text-dark fs-7" id="rollbackDocName">DOC-BRD-001: Core Architecture</span>
                        <span class="d-block fs-8 text-muted">Target Restore: <strong class="text-danger font-mono" id="rollbackTargetVer">v2.2.0</strong></span>
                    </div>
                    <p class="text-muted fs-8 mb-0">This will automatically mark the target version as the active baseline and create a forward version record.</p>
                </div>
                <div class="modal-footer border-top px-4 py-3">
                    <button type="button" class="btn btn-light border fs-7 rounded-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger fs-7 rounded-3 px-3" id="btnConfirmRollback">
                        <i class="fa-solid fa-rotate-left me-1"></i> Confirm & Rollback Version
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Live Toast Container -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1090;">
        <div id="trackLiveToast" class="toast align-items-center text-bg-dark border-0 rounded-3 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body d-flex align-items-center gap-2 fs-7">
                    <i class="fa-solid fa-circle-check text-success fs-5"></i>
                    <span id="toastTrackMessage">Action completed successfully!</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

<?php
include __DIR__ . '/../../layouts/footer.php';
?>


