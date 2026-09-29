<?php
$currentPage = 'setting-notifications';
$currentModule = 'setting';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications & Webhook Alerts - Syncboard</title>

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
                            <li class="breadcrumb-item text-muted"><a href="general.php" class="text-muted text-decoration-none">Master Settings</a></li>
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Notifications & Webhooks</li>
                        </ol>
                    </nav>
                </div>
                <div class="navbar-right d-flex align-items-center gap-2">
                    <button class="btn btn-primary fs-7 rounded-3 px-3"><i class="fa-solid fa-check me-1"></i> Save Notification Rules</button>
                </div>
            </header>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-warning">
                        <i class="fa-solid fa-bell fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Master Notifications & Alerts</h1>
                        <span class="text-muted fs-7">Manage automated team alerts, webhooks dispatch, Slack/Discord integrations, and SMTP configurations</span>
                    </div>
                </div>
            </section>

            <!-- Content Area -->
            <div class="view-wrapper flex-grow-1 p-4">
                <!-- Connected Notification Channels -->
                <div class="row g-4 mb-4">
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 bg-white p-3 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="rounded-3 bg-danger text-white p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fa-solid fa-envelope fs-5"></i>
                                    </div>
                                    <span class="badge bg-success-subtle text-success">Connected</span>
                                </div>
                                <h2 class="h6 fw-bold mb-1">Email (SMTP)</h2>
                                <p class="text-muted fs-8 mb-3">Send system transactional emails and daily digest reports.</p>
                            </div>
                            <button class="btn btn-outline-secondary btn-sm rounded-3 w-100">Configure SMTP</button>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 bg-white p-3 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="rounded-3 bg-dark text-white p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fa-brands fa-slack fs-5 text-warning"></i>
                                    </div>
                                    <span class="badge bg-success-subtle text-success">Connected</span>
                                </div>
                                <h2 class="h6 fw-bold mb-1">Slack Workspace</h2>
                                <p class="text-muted fs-8 mb-3">Post instant task updates & blocker mentions to #dev-feed.</p>
                            </div>
                            <button class="btn btn-outline-secondary btn-sm rounded-3 w-100">Manage Channels</button>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 bg-white p-3 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="rounded-3 bg-primary text-white p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fa-brands fa-discord fs-5"></i>
                                    </div>
                                    <span class="badge bg-secondary-subtle text-muted">Not Connected</span>
                                </div>
                                <h2 class="h6 fw-bold mb-1">Discord Webhook</h2>
                                <p class="text-muted fs-8 mb-3">Broadcast sprint completions and release changelogs to Discord.</p>
                            </div>
                            <button class="btn btn-primary btn-sm rounded-3 w-100">Connect Discord</button>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 bg-white p-3 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="rounded-3 bg-info text-white p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fa-brands fa-telegram fs-5"></i>
                                    </div>
                                    <span class="badge bg-secondary-subtle text-muted">Not Connected</span>
                                </div>
                                <h2 class="h6 fw-bold mb-1">Telegram Bot</h2>
                                <p class="text-muted fs-8 mb-3">Receive critical uptime and server telemetry alerts on Telegram.</p>
                            </div>
                            <button class="btn btn-primary btn-sm rounded-3 w-100">Setup Telegram</button>
                        </div>
                    </div>
                </div>

                <!-- Event Trigger Matrix -->
                <div class="card shadow-sm border rounded-4 bg-white overflow-hidden">
                    <div class="card-header bg-white p-3 border-bottom">
                        <h2 class="h6 fw-bold mb-0">Automated Notification Matrix</h2>
                        <span class="text-muted fs-8">Select which channels receive notifications for specific events</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 fs-7">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                <tr>
                                    <th class="ps-4">System Event Trigger</th>
                                    <th class="text-center">In-App Banner</th>
                                    <th class="text-center">Email Digest</th>
                                    <th class="text-center">Slack Channel</th>
                                    <th class="text-center pe-4">Discord / Webhook</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark">New Task Assigned to Member</span>
                                        <div class="text-muted fs-8">Triggered when an assignee is added or changed</div>
                                    </td>
                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                    <td class="text-center pe-4"><input type="checkbox" class="form-check-input"></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark">Task Status Moved to "Review" or "Done"</span>
                                        <div class="text-muted fs-8">Triggered upon stage advancement on Kanban board</div>
                                    </td>
                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                    <td class="text-center"><input type="checkbox" class="form-check-input"></td>
                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                    <td class="text-center pe-4"><input type="checkbox" class="form-check-input" checked></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark">Task Approaching Due Date (24h reminder)</span>
                                        <div class="text-muted fs-8">Automated daily cron scheduler trigger</div>
                                    </td>
                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                    <td class="text-center"><input type="checkbox" class="form-check-input"></td>
                                    <td class="text-center pe-4"><input type="checkbox" class="form-check-input"></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark">Production Server Incident / High RAM Alert</span>
                                        <div class="text-muted fs-8">Triggered when monitoring nodes report >90% resource utilization</div>
                                    </td>
                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                    <td class="text-center pe-4"><input type="checkbox" class="form-check-input" checked></td>
                                </tr>
                            </tbody>
                        </table>
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
