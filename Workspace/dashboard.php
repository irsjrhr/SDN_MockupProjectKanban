<?php
$pageTitle = 'Workspace Dashboard - Syncboard';
$currentPage = 'dashboard';
$currentModule = 'workspace';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Workspace', 'url' => 'KanbanProject.php'],
    ['title' => 'Dashboard', 'url' => '']
];
include __DIR__ . '/../layouts/header.php';
?>

            <!-- Page Title Section -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary">
                        <i class="fa-solid fa-chart-pie fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Workspace Analytics & Overview</h1>
                        <span class="text-muted fs-7">Real-time task analytics, metrics, and progress tracking</span>
                    </div>
                </div>

                <div class="project-actions-area d-flex align-items-center gap-3">
                    <a href="KanbanTask.php" class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm">
                        <i class="fa-solid fa-table-columns"></i> Go to Kanban
                    </a>
                </div>
            </section>

            <!-- Dashboard Content -->
            <div class="view-wrapper flex-grow-1 p-4">
                <!-- Stat Cards Grid -->
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Total Tasks</span>
                                    <h3 class="h4 fw-extrabold mb-0" id="dashTotalTasks">11</h3>
                                </div>
                                <div class="stat-icon bg-primary-subtle text-primary rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-list-check fs-4"></i>
                                </div>
                            </div>
                            <span class="fs-8 text-success fw-semibold d-inline-flex align-items-center gap-1">
                                <i class="fa-solid fa-arrow-trend-up"></i> +12% from last week
                            </span>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Completed</span>
                                    <h3 class="h4 fw-extrabold text-success mb-0" id="dashCompletedTasks">2</h3>
                                </div>
                                <div class="stat-icon bg-success-subtle text-success rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-circle-check fs-4"></i>
                                </div>
                            </div>
                            <span class="fs-8 text-muted fw-semibold" id="dashCompletionRate">18% completion rate</span>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">In Progress</span>
                                    <h3 class="h4 fw-extrabold text-primary mb-0" id="dashProgressTasks">3</h3>
                                </div>
                                <div class="stat-icon bg-info-subtle text-info rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-spinner fs-4"></i>
                                </div>
                            </div>
                            <span class="fs-8 text-muted fw-semibold">Active development</span>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Team Members</span>
                                    <h3 class="h4 fw-extrabold text-dark mb-0">4</h3>
                                </div>
                                <div class="stat-icon bg-warning-subtle text-warning rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-users fs-4"></i>
                                </div>
                            </div>
                            <span class="fs-8 text-muted fw-semibold">Active contributors</span>
                        </div>
                    </div>
                </div>

                <!-- Charts & Recent Activity Row -->
                <div class="row g-4">
                    <div class="col-12 col-lg-7">
                        <div class="card shadow-sm border rounded-4 p-4 bg-white h-100">
                            <h2 class="h6 fw-bold mb-3">Project Status Distribution</h2>
                            <div class="d-flex flex-column gap-3">
                                <div>
                                    <div class="d-flex justify-content-between fs-7 fw-semibold mb-1">
                                        <span><i class="fa-solid fa-circle text-danger fs-8 me-1"></i> To Do</span>
                                        <span id="dashStatTodo">3 tasks (27%)</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-danger" id="barTodo" style="width: 27%;"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between fs-7 fw-semibold mb-1">
                                        <span><i class="fa-solid fa-circle text-primary fs-8 me-1"></i> In Progress</span>
                                        <span id="dashStatProgress">3 tasks (27%)</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-primary" id="barProgress" style="width: 27%;"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between fs-7 fw-semibold mb-1">
                                        <span><i class="fa-solid fa-circle text-warning fs-8 me-1"></i> Review</span>
                                        <span id="dashStatReview">3 tasks (27%)</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-warning" id="barReview" style="width: 27%;"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between fs-7 fw-semibold mb-1">
                                        <span><i class="fa-solid fa-circle text-success fs-8 me-1"></i> Completed</span>
                                        <span id="dashStatComplete">2 tasks (19%)</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-success" id="barComplete" style="width: 19%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-5">
                        <div class="card shadow-sm border rounded-4 p-4 bg-white h-100">
                            <h2 class="h6 fw-bold mb-3">Recent Activity Feed</h2>
                            <div class="activity-feed d-flex flex-column gap-3 fs-7">
                                <div class="d-flex gap-2 align-items-start">
                                    <span class="badge rounded-circle bg-success p-2 mt-1"><i class="fa-solid fa-check fs-8 text-white"></i></span>
                                    <div>
                                        <span class="fw-bold text-dark">Database Schema Setup</span> marked complete.
                                        <span class="d-block fs-8 text-muted">2 hours ago</span>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 align-items-start">
                                    <span class="badge rounded-circle bg-primary p-2 mt-1"><i class="fa-solid fa-plus fs-8 text-white"></i></span>
                                    <div>
                                        <span class="fw-bold text-dark">User Registration Flow</span> updated.
                                        <span class="d-block fs-8 text-muted">4 hours ago</span>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 align-items-start">
                                    <span class="badge rounded-circle bg-warning p-2 mt-1"><i class="fa-solid fa-comment fs-8 text-white"></i></span>
                                    <div>
                                        <span class="fw-bold text-dark">Michael Anderson</span> commented on Homepage UI.
                                        <span class="d-block fs-8 text-muted">Yesterday</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php include __DIR__ . '/../layouts/footer.php'; ?>
