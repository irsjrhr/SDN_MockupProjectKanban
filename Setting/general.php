<?php
$currentPage = 'setting-general';
$currentModule = 'setting';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace & General Settings - Syncboard</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body class="bg-main">
    <div class="app-container d-flex">
        <!-- Sidebar Navigation Component -->
        <?php include __DIR__ . '/../layouts/sidebar.php'; ?>

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
                            <li class="breadcrumb-item text-muted"><a href="general.php" class="text-muted text-decoration-none">Master Settings</a></li>
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Workspace & Branding</li>
                        </ol>
                    </nav>
                </div>
                <div class="navbar-right d-flex align-items-center gap-2">
                    <button class="btn btn-outline-secondary fs-7 rounded-3 px-3">Discard</button>
                    <button class="btn btn-primary fs-7 rounded-3 px-3"><i class="fa-solid fa-check me-1"></i> Save Changes</button>
                </div>
            </header>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary">
                        <i class="fa-solid fa-sliders fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Master Workspace & Branding</h1>
                        <span class="text-muted fs-7">Configure global app settings, organization branding, timezones, and project defaults</span>
                    </div>
                </div>
            </section>

            <!-- Content Area -->
            <div class="view-wrapper flex-grow-1 p-4">
                <div class="row g-4">
                    <!-- Left Form Section -->
                    <div class="col-12 col-xl-8">
                        <!-- Branding & Identity -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4">
                            <h2 class="h6 fw-bold mb-1 text-dark">Workspace Identity</h2>
                            <p class="text-muted fs-7 mb-4">Customize your workspace visual identity and basic company details.</p>

                            <div class="d-flex align-items-center gap-4 mb-4">
                                <div class="position-relative">
                                    <div class="rounded-4 bg-primary text-white d-flex align-items-center justify-content-center fw-bold fs-2 shadow-sm" style="width: 80px; height: 80px;">
                                        <i class="fa-solid fa-cubes"></i>
                                    </div>
                                    <button class="btn btn-light btn-sm position-absolute bottom-0 end-0 rounded-circle border shadow-sm" title="Change Logo">
                                        <i class="fa-solid fa-camera fs-8 text-primary"></i>
                                    </button>
                                </div>
                                <div>
                                    <h3 class="h6 fw-bold mb-1">Workspace Logo & Icon</h3>
                                    <p class="text-muted fs-8 mb-2">Recommended size: 256x256px PNG, JPG, or SVG (Max 2MB)</p>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-outline-primary btn-sm rounded-3 fs-8">Upload New</button>
                                        <button class="btn btn-outline-danger btn-sm rounded-3 fs-8">Remove</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="form-label fs-7 fw-bold">Workspace Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control fs-7 rounded-3" value="Syncboard Master Hub">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label fs-7 fw-bold">Organization / Company</label>
                                    <input type="text" class="form-control fs-7 rounded-3" value="Arxino Digital Solutions Ltd.">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label fs-7 fw-bold">Workspace URL Slug</label>
                                    <div class="input-group">
                                        <span class="input-group-text fs-8 text-muted bg-light">syncboard.app/</span>
                                        <input type="text" class="form-control fs-7" value="arxino-master">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label fs-7 fw-bold">Support & Admin Email</label>
                                    <input type="email" class="form-control fs-7 rounded-3" value="admin@arxino.tech">
                                </div>
                            </div>
                        </div>

                        <!-- Regional & Localization -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4">
                            <h2 class="h6 fw-bold mb-1 text-dark">Localization & Regional Standards</h2>
                            <p class="text-muted fs-7 mb-4">Determine how dates, times, and currencies are presented across all projects.</p>

                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="form-label fs-7 fw-bold">Primary Timezone</label>
                                    <select class="form-select fs-7 rounded-3">
                                        <option value="Asia/Jakarta" selected>Asia/Jakarta (GMT+07:00) Western Indonesia Time</option>
                                        <option value="Asia/Singapore">Asia/Singapore (GMT+08:00) Singapore Standard Time</option>
                                        <option value="UTC">UTC (GMT+00:00) Universal Coordinated Time</option>
                                        <option value="America/New_York">America/New_York (GMT-05:00) Eastern Time</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label fs-7 fw-bold">Default System Language</label>
                                    <select class="form-select fs-7 rounded-3">
                                        <option value="en" selected>English (United States)</option>
                                        <option value="id">Bahasa Indonesia</option>
                                        <option value="ja">日本語 (Japanese)</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label fs-7 fw-bold">Date Format</label>
                                    <select class="form-select fs-7 rounded-3">
                                        <option value="DD MMM YYYY" selected>DD MMM YYYY (e.g., 29 Sep 2026)</option>
                                        <option value="YYYY-MM-DD">YYYY-MM-DD (ISO 8601, e.g., 2026-09-29)</option>
                                        <option value="MM/DD/YYYY">MM/DD/YYYY (US, e.g., 09/29/2026)</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label fs-7 fw-bold">First Day of Week</label>
                                    <select class="form-select fs-7 rounded-3">
                                        <option value="monday" selected>Monday (Default Business Week)</option>
                                        <option value="sunday">Sunday</option>
                                        <option value="saturday">Saturday</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Project Default Rules -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4">
                            <h2 class="h6 fw-bold mb-1 text-dark">Default Project & Task Conventions</h2>
                            <p class="text-muted fs-7 mb-4">Set baseline parameters applied when creating new projects or boards.</p>

                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="form-label fs-7 fw-bold">Default Initial View</label>
                                    <select class="form-select fs-7 rounded-3">
                                        <option value="kanban" selected>Kanban Board View</option>
                                        <option value="list">List / Table View</option>
                                        <option value="timeline">Timeline / Gantt View</option>
                                        <option value="calendar">Calendar View</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label fs-7 fw-bold">Task Prefix Format</label>
                                    <input type="text" class="form-control fs-7 rounded-3" value="SYNC-[NUMBER]">
                                </div>
                                <div class="col-12">
                                    <div class="form-check form-switch mt-2">
                                        <input class="form-check-input" type="checkbox" id="autoArchiveSwitch" checked>
                                        <label class="form-check-label fs-7 fw-bold" for="autoArchiveSwitch">Auto-archive completed tasks after 30 days</label>
                                        <p class="text-muted fs-8 mb-0">Keeps active kanban boards fast and clutter-free without deleting historical records.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Sidebar Info / Overview -->
                    <div class="col-12 col-xl-4">
                        <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4">
                            <h3 class="h6 fw-bold mb-3 text-dark"><i class="fa-solid fa-circle-info text-primary me-2"></i>Workspace Plan</h3>
                            <div class="p-3 bg-light rounded-3 mb-3 border">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fs-8 text-muted fw-bold text-uppercase">Current Tier</span>
                                    <span class="badge bg-primary">Enterprise Pro</span>
                                </div>
                                <div class="h5 fw-bold mb-0 text-dark">Unlimited Projects & Tasks</div>
                            </div>
                            <ul class="list-unstyled fs-7 mb-3 text-muted d-flex flex-column gap-2">
                                <li><i class="fa-solid fa-check text-success me-2"></i> Active Projects: <strong>5 / Unlimited</strong></li>
                                <li><i class="fa-solid fa-check text-success me-2"></i> Team Members: <strong>24 / 50 Seats</strong></li>
                                <li><i class="fa-solid fa-check text-success me-2"></i> Cloud Storage: <strong>4.2 GB / 500 GB</strong></li>
                                <li><i class="fa-solid fa-check text-success me-2"></i> Live Telemetry: <strong>Active (5 Nodes)</strong></li>
                            </ul>
                            <button class="btn btn-outline-primary w-100 fs-7 rounded-3"><i class="fa-solid fa-bolt me-1"></i> Manage Subscription</button>
                        </div>

                        <div class="card shadow-sm border rounded-4 bg-white p-4">
                            <h3 class="h6 fw-bold mb-3 text-dark"><i class="fa-solid fa-triangle-exclamation text-danger me-2"></i>Danger Zone</h3>
                            <p class="text-muted fs-8 mb-3">Irreversible actions that affect all projects and workspaces.</p>
                            <div class="d-flex flex-column gap-2">
                                <button class="btn btn-outline-warning text-dark text-start fs-7 rounded-3 p-2">
                                    <i class="fa-solid fa-box-archive me-2 text-warning"></i> Archive Entire Workspace
                                </button>
                                <button class="btn btn-outline-danger text-start fs-7 rounded-3 p-2">
                                    <i class="fa-solid fa-trash-can me-2 text-danger"></i> Delete All Workspace Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
