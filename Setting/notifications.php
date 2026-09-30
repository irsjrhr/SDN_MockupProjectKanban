<?php
$pageTitle = 'Notifications & Webhook Alerts - Syncboard';
$currentPage = 'setting-notifications';
$currentModule = 'setting';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Master Settings', 'url' => 'general.php'],
    ['title' => 'Notifications & Webhooks', 'url' => '']
];
include __DIR__ . '/../layouts/header.php';
?>


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
                                <p class="text-muted fs-8 mb-3">Broadcast milestone completions and release changelogs to Discord.</p>
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
<?php
include __DIR__ . '/../layouts/footer.php';
?>

