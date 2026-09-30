<?php
$currentPage = 'settings';
$currentModule = 'workspace';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Settings - Syncboard</title>

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
        <?php include __DIR__ . '/sidebar.php'; ?>

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
                            <li class="breadcrumb-item text-muted"><a href="KanbanProject.php" class="text-muted text-decoration-none">Workspace</a></li>
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Settings</li>
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
                            <li><a class="dropdown-menu-item dropdown-item fs-7" href="#"><i class="fa-regular fa-user me-2"></i> Profile</a></li>
                            <li><a class="dropdown-menu-item dropdown-item fs-7" href="Setting.php"><i class="fa-solid fa-gear me-2"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-menu-item dropdown-item text-danger fs-7" href="#"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </header>

            <!-- Page Header Banner -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-dark">
                        <i class="fa-solid fa-sliders fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Workspace Master Configuration</h1>
                        <span class="text-muted fs-7">Global parameters, preferences, API keys, and notification rules</span>
                    </div>
                </div>

                <div class="project-actions-area d-flex align-items-center gap-3">
                    <button class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm">
                        <i class="fa-solid fa-floppy-disk"></i> Save All Changes
                    </button>
                </div>
            </section>

            <!-- Main Content Area -->
            <div class="view-wrapper flex-grow-1 p-4">
                <div class="row g-4">
                    <!-- Left Navigation Tabs Column -->
                    <div class="col-12 col-lg-3">
                        <div class="card shadow-sm border rounded-4 p-2 bg-white sticky-top" style="top: 20px;">
                            <div class="nav flex-column nav-pills gap-1">
                                <button class="nav-link active text-start py-2.5 px-3 rounded-3 fw-semibold fs-7" data-bs-toggle="pill" data-bs-target="#tabGeneral">
                                    <i class="fa-solid fa-gear me-2"></i> General Settings
                                </button>
                                <button class="nav-link text-start py-2.5 px-3 rounded-3 fw-semibold fs-7" data-bs-toggle="pill" data-bs-target="#tabNotifications">
                                    <i class="fa-regular fa-bell me-2"></i> Notification Rules
                                </button>
                                <button class="nav-link text-start py-2.5 px-3 rounded-3 fw-semibold fs-7" data-bs-toggle="pill" data-bs-target="#tabApiKeys">
                                    <i class="fa-solid fa-key me-2"></i> API & Webhooks
                                </button>
                                <button class="nav-link text-start py-2.5 px-3 rounded-3 fw-semibold fs-7" data-bs-toggle="pill" data-bs-target="#tabSecurity">
                                    <i class="fa-solid fa-shield-halved me-2"></i> Security & Policy
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Right Tab Content Column -->
                    <div class="col-12 col-lg-9">
                        <div class="tab-content">
                            <!-- 1. General Settings -->
                            <div class="tab-pane fade show active" id="tabGeneral">
                                <div class="card shadow-sm border rounded-4 p-4 bg-white mb-4">
                                    <h2 class="h5 fw-bold mb-1">General Workspace Information</h2>
                                    <p class="text-muted fs-7 mb-4">Configure primary workspace identities and workspace parameters</p>

                                    <form>
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label fs-7 fw-semibold">Workspace Name *</label>
                                                <input type="text" class="form-control fs-7" value="Team Workspace">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fs-7 fw-semibold">Organization / Domain *</label>
                                                <input type="text" class="form-control fs-7" value="Syncboard.Company">
                                            </div>
                                        </div>

                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label fs-7 fw-semibold">Default Timezone</label>
                                                <select class="form-select fs-7">
                                                    <option selected>(UTC+07:00) Jakarta, Bangkok</option>
                                                    <option>(UTC+00:00) UTC Universal</option>
                                                    <option>(UTC-05:00) Eastern Time (US & Canada)</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fs-7 fw-semibold">Primary Language</label>
                                                <select class="form-select fs-7">
                                                    <option selected>English (United States)</option>
                                                    <option>Bahasa Indonesia</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fs-7 fw-semibold">Workspace Description</label>
                                            <textarea class="form-control fs-7" rows="3">Primary workspace for collaborative project delivery, task management, and technical documentation.</textarea>
                                        </div>

                                        <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                                            <button type="button" class="btn btn-light border px-3 fs-7">Cancel</button>
                                            <button type="submit" class="btn btn-primary px-4 fs-7 fw-semibold">Save General Settings</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- 2. Notification Rules -->
                            <div class="tab-pane fade" id="tabNotifications">
                                <div class="card shadow-sm border rounded-4 p-4 bg-white mb-4">
                                    <h2 class="h5 fw-bold mb-1">Notification Channels & Delivery Rules</h2>
                                    <p class="text-muted fs-7 mb-4">Configure email alerts, push notifications, and automated digest triggers</p>

                                    <div class="d-flex flex-column gap-3 mb-4">
                                        <div class="d-flex align-items-center justify-content-between p-3 border rounded-3 bg-light-subtle">
                                            <div>
                                                <span class="fw-bold fs-7 text-dark d-block">Task Assignment & State Change</span>
                                                <span class="text-muted fs-8">Send instant email notification when assigned to a task or status changes</span>
                                            </div>
                                            <div class="form-check form-switch fs-5">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between p-3 border rounded-3 bg-light-subtle">
                                            <div>
                                                <span class="fw-bold fs-7 text-dark d-block">Daily Project Digest</span>
                                                <span class="text-muted fs-8">Receive summary report of active, pending, and overdue tasks at 08:00 AM</span>
                                            </div>
                                            <div class="form-check form-switch fs-5">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between p-3 border rounded-3 bg-light-subtle">
                                            <div>
                                                <span class="fw-bold fs-7 text-dark d-block">Document Approval Alerts</span>
                                                <span class="text-muted fs-8">Notify all contributors when BRD/FSD/ERD documents are approved or revised</span>
                                            </div>
                                            <div class="form-check form-switch fs-5">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. API & Webhooks Master List Table -->
                            <div class="tab-pane fade" id="tabApiKeys">
                                <div class="card shadow-sm border rounded-4 p-4 bg-white mb-4">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
                                        <div>
                                            <h2 class="h5 fw-bold mb-1">API Keys & Webhooks Master List</h2>
                                            <span class="text-muted fs-7">Manage authorized integration tokens and webhooks</span>
                                        </div>
                                        <button class="btn btn-primary btn-sm px-3 py-1.5 fw-semibold rounded-2">
                                            <i class="fa-solid fa-plus me-1"></i> Generate New Key
                                        </button>
                                    </div>

                                    <div class="table-responsive border rounded-3">
                                        <table class="table table-hover align-middle mb-0 fs-7">
                                            <thead class="table-light fs-8 text-uppercase text-muted">
                                                <tr>
                                                    <th class="ps-3">Integration Client</th>
                                                    <th>API Token Key</th>
                                                    <th>Scope</th>
                                                    <th>Created</th>
                                                    <th>Status</th>
                                                    <th class="pe-3 text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="ps-3 fw-bold text-dark"><i class="fa-brands fa-github me-2 text-dark"></i> GitHub Actions CI</td>
                                                    <td><code>sb_live_9f823a8e...</code></td>
                                                    <td><span class="badge bg-light text-dark border">read:tasks, write:docs</span></td>
                                                    <td class="text-secondary">Sep 01, 2026</td>
                                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">Active</span></td>
                                                    <td class="pe-3 text-end">
                                                        <button class="btn btn-sm btn-light border text-danger" title="Revoke"><i class="fa-solid fa-ban"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-3 fw-bold text-dark"><i class="fa-brands fa-slack me-2 text-warning"></i> Slack Notifications</td>
                                                    <td><code>sb_webhook_21c9...</code></td>
                                                    <td><span class="badge bg-light text-dark border">webhook:post</span></td>
                                                    <td class="text-secondary">Aug 20, 2026</td>
                                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">Active</span></td>
                                                    <td class="pe-3 text-end">
                                                        <button class="btn btn-sm btn-light border text-danger" title="Revoke"><i class="fa-solid fa-ban"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- 4. Security & Policy -->
                            <div class="tab-pane fade" id="tabSecurity">
                                <div class="card shadow-sm border rounded-4 p-4 bg-white mb-4">
                                    <h2 class="h5 fw-bold mb-1">Security Health & Data Retention Policy</h2>
                                    <p class="text-muted fs-7 mb-4">Enforce authentication security and data lifecycle policies</p>

                                    <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label fs-7 fw-semibold">Two-Factor Authentication (2FA)</label>
                                            <select class="form-select fs-7">
                                                <option selected>Enforced for All Workspace Members</option>
                                                <option>Optional for Standard Members</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fs-7 fw-semibold">Soft Delete Retention Period</label>
                                            <select class="form-select fs-7">
                                                <option selected>30 Days Retention</option>
                                                <option>60 Days Retention</option>
                                                <option>Permanent Archival</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Application Script -->
    <script src="../assets/js/app.js"></script>
</body>

</html>
