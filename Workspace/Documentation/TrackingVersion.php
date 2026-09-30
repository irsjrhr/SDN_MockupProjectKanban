<?php
$currentPage = 'tracking-version';
$currentModule = 'workspace';
$basePath = '../../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents Tracking Version - Documentation - Syncboard</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fira+Code:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="../../assets/css/styles.css">

    <style>
        .font-mono {
            font-family: 'Fira Code', monospace;
        }

        .timeline-version-tree {
            position: relative;
            padding-left: 28px;
        }

        .timeline-version-tree::before {
            content: '';
            position: absolute;
            top: 14px;
            bottom: 14px;
            left: 10px;
            width: 2px;
            background: #e2e8f0;
        }

        .timeline-version-node {
            position: relative;
            margin-bottom: 24px;
        }

        .timeline-version-node::before {
            content: '';
            position: absolute;
            left: -24px;
            top: 6px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #fff;
            border: 3px solid var(--primary-color, #4f46e5);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
            z-index: 1;
        }

        .timeline-version-node.node-latest::before {
            background: #10b981;
            border-color: #059669;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.2);
        }

        .doc-type-pill {
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 3px 8px;
            border-radius: 6px;
        }

        .card-doc-track {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #e2e8f0;
        }

        .card-doc-track:hover {
            border-color: #cbd5e1;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.03);
            transform: translateY(-2px);
        }

        .changelog-box {
            background-color: #f8fafc;
            border-left: 3px solid #6366f1;
            padding: 10px 14px;
            border-radius: 6px;
        }
    </style>
</head>

<body class="bg-main">
    <div class="app-container d-flex">
        <!-- Sidebar Navigation Component -->
        <?php include __DIR__ . '/../../layouts/sidebar.php'; ?>

        <!-- Main Content Area -->
        <main class="main-content flex-grow-1 d-flex flex-column min-vh-100">
            <!-- Top Header Navbar -->
            <header class="top-navbar bg-white border-bottom px-4 d-flex align-items-center justify-content-between">
                <div class="navbar-left d-flex align-items-center gap-3">
                    <button class="btn btn-light d-md-none" id="sidebarToggleBtn">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 fs-7">
                            <li class="breadcrumb-item text-muted"><a href="../KanbanProject.php" class="text-muted text-decoration-none">Workspace</a></li>
                            <li class="breadcrumb-item text-muted"><a href="BRD.php" class="text-muted text-decoration-none">Documentation</a></li>
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Version Tracking</li>
                        </ol>
                    </nav>
                </div>

                <div class="navbar-right d-flex align-items-center gap-3">
                    <button class="btn btn-light btn-nav-icon rounded-circle position-relative" title="Notifications">
                        <i class="fa-regular fa-bell"></i>
                        <span class="notification-dot position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger p-1"></span>
                    </button>
                    <button class="btn btn-light btn-nav-icon rounded-circle" title="Messages">
                        <i class="fa-regular fa-comment-dots"></i>
                    </button>

                    <div class="dropdown">
                        <div class="user-profile-menu d-flex align-items-center gap-2 p-1 rounded-pill cursor-pointer" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&q=80" alt="Jenno Wilson" class="avatar-md rounded-circle">
                            <div class="user-meta d-flex flex-column d-none d-sm-flex">
                                <span class="user-name fw-bold fs-7 lh-1">Jenno Wilson</span>
                                <span class="user-email text-muted fs-8">jeno.sonn@gmail.com</span>
                            </div>
                            <i class="fa-solid fa-chevron-down text-muted fs-8 ms-1"></i>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li><a class="dropdown-menu-item dropdown-item fs-7" href="../../Setting/account.php"><i class="fa-regular fa-user me-2"></i> Account Info</a></li>
                            <li><a class="dropdown-menu-item dropdown-item fs-7" href="../../Setting/account-security.php"><i class="fa-solid fa-shield-halved me-2"></i> Security</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-menu-item dropdown-item text-danger fs-7" href="#"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </header>

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
        </main>
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

    <!-- jQuery 3.7.1 -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Application Script -->
    <script src="../../assets/js/app.js"></script>
    <!-- Centralized Document & Tracking Versioning Store -->
    <script src="../../assets/js/doc-tracker.js"></script>

    <script>
        /* Helper Badge Colors */
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
            const docs = DocTracker.getAllDocs();
            const $sel = $('#inputTargetDoc');
            const currentVal = $sel.val();
            $sel.empty();
            $sel.append('<option value="" disabled selected>-- Choose Document --</option>');
            docs.forEach(d => {
                $sel.append(`<option value="${d.code}" data-type="${d.type}" data-proj="${d.project}" data-cur="${d.latestVersion}">${d.code}: ${d.title} (Current: ${d.latestVersion})</option>`);
            });
            if (currentVal) $sel.val(currentVal);
        }

        /* -------------------------------------------------------------------------- */
        /* 1. RENDER MATRIX VIEW (DOCUMENT LIST + REVISIONS ACCORDION)                */
        /* -------------------------------------------------------------------------- */
        function renderMatrixView() {
            const $container = $('#docCardsContainer');
            $container.empty();

            const TRACKED_DOCS = DocTracker.getAllDocs();
            const typeFilter = $('#docTypeFilterGroup .btn.active').data('filter') || 'all';
            const projectFilter = $('#selectProjectFilter').val() || 'all';
            const searchQuery = $('#searchDocInput').val() ? $('#searchDocInput').val().toLowerCase().trim() : '';

            let filteredDocs = TRACKED_DOCS.filter(doc => {
                const matchType = (typeFilter === 'all' || doc.type.toLowerCase() === typeFilter.toLowerCase());
                const matchProject = (projectFilter === 'all' || doc.project === projectFilter);
                const matchSearch = (
                    doc.title.toLowerCase().includes(searchQuery) ||
                    doc.code.toLowerCase().includes(searchQuery) ||
                    doc.project.toLowerCase().includes(searchQuery) ||
                    doc.author.toLowerCase().includes(searchQuery) ||
                    doc.latestVersion.toLowerCase().includes(searchQuery)
                );
                return matchType && matchProject && matchSearch;
            });

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

                revisions.forEach((rev, rIdx) => {
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
        /* 2. RENDER TREE TIMELINE VIEW (CHRONOLOGICAL AUDIT TRAIL)                   */
        /* -------------------------------------------------------------------------- */
        function renderTreeTimeline() {
            const $tree = $('#timelineTreeContainer');
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
        /* 3. INTERACTIVE ACTIONS & HANDLERS                                          */
        /* -------------------------------------------------------------------------- */
        function showTrackToast(message) {
            DocTracker.showToast(message);
        }

        function openDetailsModal(docCode, version) {
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
            $('#detailDocContext').text(`${doc.code} &bull; ${doc.project} &bull; ${doc.title}`);
            $('#detailChangelogContent').text(rev.summary);
            $('#detailAuthorName').text(rev.author);
            $('#detailAuthorRole').text(rev.authorRole || 'Contributor');
            $('#detailChecksum').text(rev.hash || 'sha256:e3b0c442');

            $('#btnDownloadFromModal').off('click').on('click', function () {
                downloadVersionAsset(doc.code, rev.version);
            });

            const modal = new bootstrap.Modal(document.getElementById('modalVersionDetails'));
            modal.show();
        }

        function promptRollback(docTitle, targetVersion) {
            $('#rollbackDocName').text(docTitle);
            $('#rollbackTargetVer').text(targetVersion);
            const modal = new bootstrap.Modal(document.getElementById('modalRollback'));
            modal.show();
        }

        function downloadVersionAsset(docCode, version) {
            showTrackToast(`Downloading signed specification archive for ${docCode} (${version})...`);
        }

        function quickNewVersion(docCode) {
            populateTargetDocSelect();
            $('#inputTargetDoc').val(docCode).trigger('change');
            const modal = new bootstrap.Modal(document.getElementById('modalNewVersion'));
            modal.show();
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
        /* 4. DOM READY INITIALIZATION                                                */
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

                    $('#modalNewVersion').modal('hide');
                    this.reset();
                    showTrackToast(`Successfully published ${docCode} version ${updated.latestVersion}!`);
                }
            });

            // Rollback confirm
            $('#btnConfirmRollback').on('click', function () {
                const targetVer = $('#rollbackTargetVer').text();
                $('#modalRollback').modal('hide');
                showTrackToast(`Document restored to ${targetVer}. Version record updated.`);
            });
        });
    </script>
</body>

</html>
