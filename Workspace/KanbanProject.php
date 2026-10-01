<?php
/**
 * ==============================================================================
 * SYNCBOARD - MASTER KANBAN PROJECT & PORTFOLIO MANAGEMENT
 * Location: /Workspace/KanbanProject.php
 * ==============================================================================
 * Portfolio-level project overview, cross-project board, data table list,
 * project timeline calendar, and registered domain telemetry integration.
 */

$pageTitle = 'Syncboard - Master Kanban Project Management';
$currentPage = 'kanban-project';
$currentModule = 'workspace';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Workspace', 'url' => 'dashboard.php'],
    ['title' => 'Kanban Project', 'url' => '']
];
$extraJs = ['../assets/js/kanban-project.js'];

include __DIR__ . '/../layouts/header.php';
?>

<!-- =========================================================================== -->
<!-- 1. PROJECT HEADER & QUICK ACTION BAR                                        -->
<!-- =========================================================================== -->
<section class="project-header p-4 bg-white border-bottom d-flex flex-wrap align-items-center justify-content-between gap-3">
    <!-- Brand Title & Description -->
    <div class="project-title-area d-flex align-items-center gap-3">
        <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white shadow-sm" style="width: 46px; height: 46px; background: linear-gradient(135deg, #3b82f6, #6366f1);">
            <i class="fa-solid fa-folder-tree fs-4"></i>
        </div>
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <h1 class="project-title h4 fw-extrabold text-dark mb-0">Master Kanban Projects</h1>
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold">
                    <i class="fa-solid fa-cubes me-1"></i> Portfolio Suite
                </span>
                <span class="badge bg-success-subtle text-success border border-success-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold">
                    <span class="dot dot-complete me-1"></span> 5 Active Workspaces
                </span>
            </div>
            <p class="text-muted fs-8 mb-0 mt-0.5">
                Master Workspace Portfolio, Cross-Project Board & Live Production Domain Telemetry
            </p>
        </div>
    </div>

    <!-- Right Controls: Team Stack & Action Buttons -->
    <div class="project-actions-area d-flex align-items-center gap-3 flex-wrap">
        <!-- Team Avatars Stack -->
        <div class="team-avatars-stack d-flex align-items-center me-1">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80" data-bs-toggle="tooltip" title="Sophia Carter (Lead)" class="rounded-circle border border-2 border-white shadow-sm" alt="Team">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80" data-bs-toggle="tooltip" title="Michael Anderson (UI/UX)" class="rounded-circle border border-2 border-white shadow-sm" alt="Team">
            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80" data-bs-toggle="tooltip" title="Daniel Johnson (Frontend)" class="rounded-circle border border-2 border-white shadow-sm" alt="Team">
            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80" data-bs-toggle="tooltip" title="James Wilson (Backend)" class="rounded-circle border border-2 border-white shadow-sm" alt="Team">
            <div class="avatar-more rounded-circle border border-2 border-white bg-primary-subtle text-primary fw-bold fs-8 d-flex align-items-center justify-content-center shadow-sm">+9</div>
        </div>

        <!-- Quick Jump Links -->
        <div class="btn-group btn-group-sm">
            <a href="Messages.php" class="btn btn-outline-secondary d-flex align-items-center gap-1.5 px-3 py-2 fw-semibold" title="Team Messages">
                <i class="fa-regular fa-comment-dots"></i> Chat
            </a>
            <a href="CategoryStatus.php" class="btn btn-outline-secondary d-flex align-items-center gap-1.5 px-3 py-2 fw-semibold" title="Category Filter">
                <i class="fa-solid fa-tags"></i> Categories
            </a>
        </div>

        <!-- Create New Project Button -->
        <button class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#newProjectModal">
            <i class="fa-solid fa-folder-plus"></i>
            <span>New Project</span>
        </button>
    </div>
</section>

<!-- =========================================================================== -->
<!-- 2. TOOLBAR NAVIGATION TABS                                                  -->
<!-- =========================================================================== -->
<div class="toolbar-container px-4 py-2.5 bg-white border-bottom d-flex flex-nowrap align-items-center justify-content-between gap-3 overflow-x-auto" id="toolbar-container">
    <div class="nav nav-pills view-tabs gap-2 flex-nowrap" id="viewTabs">
        <button class="nav-link active tab-btn fw-semibold py-1.5 px-3 rounded-3 fs-7" data-view="dashboard">
            <i class="fa-solid fa-chart-pie me-1.5 text-success"></i> Portfolio Dashboard
        </button>
        <button class="nav-link tab-btn fw-semibold py-1.5 px-3 rounded-3 fs-7" data-view="board-list">
            <i class="fa-solid fa-table-cells-large me-1.5 text-primary"></i> Board & List View
        </button>
        <button class="nav-link tab-btn fw-semibold py-1.5 px-3 rounded-3 fs-7" data-view="calendar">
            <i class="fa-regular fa-calendar-days me-1.5 text-info"></i> Calendar & Timeline
        </button>
        <button class="nav-link tab-btn fw-semibold py-1.5 px-3 rounded-3 fs-7" data-view="documentation">
            <i class="fa-regular fa-folder-open me-1.5 text-warning"></i> Documentation
        </button>
    </div>
</div>

<!-- =========================================================================== -->
<!-- 3. MAIN VIEW CONTENT CONTAINERS                                             -->
<!-- =========================================================================== -->
<div class="view-wrapper flex-grow-1 p-4 bg-light-subtle">

    <!-- ----------------------------------------------------------------------- -->
    <!-- VIEW 1: PORTFOLIO DASHBOARD (Summary & Statistics)                      -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="view-content active" id="viewDashboard">
        <!-- Stat Cards Grid -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card shadow-sm border rounded-4 p-3 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div>
                            <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Total Projects</span>
                            <h3 class="h4 fw-extrabold text-dark mb-0">5 Active</h3>
                        </div>
                        <div class="stat-icon bg-primary-subtle text-primary rounded-3 p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="fa-solid fa-folder-tree fs-4"></i>
                        </div>
                    </div>
                    <span class="fs-8 text-success fw-semibold"><i class="fa-solid fa-arrow-trend-up"></i> +2 new initiatives this month</span>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card shadow-sm border rounded-4 p-3 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div>
                            <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Master Tasks</span>
                            <h3 class="h4 fw-extrabold text-dark mb-0" id="dashTotalTasks">11</h3>
                        </div>
                        <div class="stat-icon bg-info-subtle text-info rounded-3 p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="fa-solid fa-list-check fs-4"></i>
                        </div>
                    </div>
                    <span class="fs-8 text-muted fw-semibold">Across all active projects</span>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card shadow-sm border rounded-4 p-3 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div>
                            <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Completed</span>
                            <h3 class="h4 fw-extrabold text-success mb-0" id="dashCompletedTasks">2</h3>
                        </div>
                        <div class="stat-icon bg-success-subtle text-success rounded-3 p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="fa-solid fa-circle-check fs-4"></i>
                        </div>
                    </div>
                    <span class="fs-8 text-muted fw-semibold" id="dashCompletionRate">18% overall completion</span>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card shadow-sm border rounded-4 p-3 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div>
                            <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Team Capacity</span>
                            <h3 class="h4 fw-extrabold text-primary mb-0">92%</h3>
                        </div>
                        <div class="stat-icon bg-warning-subtle text-warning rounded-3 p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="fa-solid fa-users fs-4"></i>
                        </div>
                    </div>
                    <span class="fs-8 text-success fw-semibold"><i class="fa-solid fa-check"></i> 4 Assigned Engineers</span>
                </div>
            </div>
        </div>

        <!-- Project Analytics Row -->
        <div class="row g-4">
            <div class="col-12 col-lg-7">
                <div class="card shadow-sm border rounded-4 p-4 bg-white h-100">
                    <h2 class="h6 fw-bold text-dark mb-3">Portfolio Status Distribution</h2>
                    <div class="d-flex flex-column gap-3">
                        <div>
                            <div class="d-flex justify-content-between fs-7 fw-semibold mb-1">
                                <span><i class="fa-solid fa-circle text-danger fs-8 me-1"></i> To Do / Planning</span>
                                <span id="dashStatTodo">3 tasks (27%)</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" id="barTodo" style="width: 27%;"></div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between fs-7 fw-semibold mb-1">
                                <span><i class="fa-solid fa-circle text-primary fs-8 me-1"></i> In Development</span>
                                <span id="dashStatProgress">3 tasks (27%)</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-primary" id="barProgress" style="width: 27%;"></div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between fs-7 fw-semibold mb-1">
                                <span><i class="fa-solid fa-circle text-warning fs-8 me-1"></i> Testing & Review</span>
                                <span id="dashStatReview">3 tasks (27%)</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-warning" id="barReview" style="width: 27%;"></div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between fs-7 fw-semibold mb-1">
                                <span><i class="fa-solid fa-circle text-success fs-8 me-1"></i> Completed / Released</span>
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
                    <h2 class="h6 fw-bold text-dark mb-3">Recent Project Activities</h2>
                    <div class="activity-feed d-flex flex-column gap-3 fs-7">
                        <div class="d-flex gap-2.5 align-items-start">
                            <span class="badge rounded-circle bg-success p-2 mt-0.5"><i class="fa-solid fa-check fs-8 text-white"></i></span>
                            <div>
                                <span class="fw-bold text-dark">Middleware Project</span> milestone reached 65% completion.
                                <span class="d-block fs-8 text-muted">2 hours ago &bull; Lead: Sophia Carter</span>
                            </div>
                        </div>
                        <div class="d-flex gap-2.5 align-items-start">
                            <span class="badge rounded-circle bg-primary p-2 mt-0.5"><i class="fa-solid fa-plus fs-8 text-white"></i></span>
                            <div>
                                <span class="fw-bold text-dark">Company Website</span> added 3 new deliverables.
                                <span class="d-block fs-8 text-muted">5 hours ago &bull; by Michael Anderson</span>
                            </div>
                        </div>
                        <div class="d-flex gap-2.5 align-items-start">
                            <span class="badge rounded-circle bg-warning p-2 mt-0.5"><i class="fa-solid fa-globe fs-8 text-white"></i></span>
                            <div>
                                <span class="fw-bold text-dark">Live Domain Telemetry</span> SSL validated for all 5 domains.
                                <span class="d-block fs-8 text-muted">Yesterday &bull; All endpoints healthy</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------------------------------------------------------- -->
    <!-- VIEW 2: UNIFIED BOARD & LIST PROJECT VIEW                               -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="view-content" id="viewBoardList">
        <div class="card shadow-sm border rounded-4 p-4 bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 pb-3 border-bottom">
                <div>
                    <h2 class="h5 fw-bold text-dark mb-1">Board & List Project View</h2>
                    <span class="fs-8 text-muted">Switch between Master Project Kanban Board and Project Data Table List.</span>
                </div>
                <!-- Subtabs Toggle: Board vs List -->
                <div class="nav nav-pills board-list-subtabs p-1 bg-light rounded-3 border" id="boardListSubTabs">
                    <button class="nav-link active bl-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="board">
                        <i class="fa-solid fa-table-cells-large me-1"></i> Grid Board
                    </button>
                    <button class="nav-link bl-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="list">
                        <i class="fa-solid fa-list me-1"></i> Table List
                    </button>
                </div>
            </div>

            <!-- Subview 1: Project Board Grid (Kanban Columns) -->
            <div class="board-list-subview active" id="subviewBoardGrid">
                <div class="row g-4 kanban-board" id="projectKanbanBoard">
                    <!-- Column 1: Planning / To Do -->
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="kanban-column bg-light-subtle rounded-4 p-3 border d-flex flex-column h-100" data-status="todo">
                            <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="dot dot-todo"></span>
                                    <h3 class="column-title h6 fw-bold mb-0 text-dark">Planning / To Do</h3>
                                    <span class="column-badge badge-todo rounded-pill px-2 py-0.5 fs-8 fw-bold" id="projColCountTodo">0</span>
                                </div>
                                <button class="btn btn-sm btn-light border btn-icon-sm text-muted rounded-3" data-bs-toggle="modal" data-bs-target="#newProjectModal" title="New Project">
                                    <i class="fa-solid fa-plus fs-8"></i>
                                </button>
                            </div>
                            <div class="project-cards-list d-flex flex-column gap-3 flex-grow-1 min-vh-50" id="projColListTodo" data-status="todo"></div>
                        </div>
                    </div>

                    <!-- Column 2: In Development -->
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="kanban-column bg-light-subtle rounded-4 p-3 border d-flex flex-column h-100" data-status="in-progress">
                            <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="dot dot-progress"></span>
                                    <h3 class="column-title h6 fw-bold mb-0 text-dark">In Development</h3>
                                    <span class="column-badge badge-progress rounded-pill px-2 py-0.5 fs-8 fw-bold" id="projColCountProgress">0</span>
                                </div>
                                <button class="btn btn-sm btn-light border btn-icon-sm text-muted rounded-3" data-bs-toggle="modal" data-bs-target="#newProjectModal" title="New Project">
                                    <i class="fa-solid fa-plus fs-8"></i>
                                </button>
                            </div>
                            <div class="project-cards-list d-flex flex-column gap-3 flex-grow-1 min-vh-50" id="projColListProgress" data-status="in-progress"></div>
                        </div>
                    </div>

                    <!-- Column 3: Testing & Review -->
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="kanban-column bg-light-subtle rounded-4 p-3 border d-flex flex-column h-100" data-status="review">
                            <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="dot dot-review"></span>
                                    <h3 class="column-title h6 fw-bold mb-0 text-dark">Testing & Review</h3>
                                    <span class="column-badge badge-review rounded-pill px-2 py-0.5 fs-8 fw-bold" id="projColCountReview">0</span>
                                </div>
                                <button class="btn btn-sm btn-light border btn-icon-sm text-muted rounded-3" data-bs-toggle="modal" data-bs-target="#newProjectModal" title="New Project">
                                    <i class="fa-solid fa-plus fs-8"></i>
                                </button>
                            </div>
                            <div class="project-cards-list d-flex flex-column gap-3 flex-grow-1 min-vh-50" id="projColListReview" data-status="review"></div>
                        </div>
                    </div>

                    <!-- Column 4: Completed / Released -->
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="kanban-column bg-light-subtle rounded-4 p-3 border d-flex flex-column h-100" data-status="completed">
                            <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="dot dot-complete"></span>
                                    <h3 class="column-title h6 fw-bold mb-0 text-dark">Completed</h3>
                                    <span class="column-badge badge-complete rounded-pill px-2 py-0.5 fs-8 fw-bold" id="projColCountComplete">0</span>
                                </div>
                                <button class="btn btn-sm btn-light border btn-icon-sm text-muted rounded-3" data-bs-toggle="modal" data-bs-target="#newProjectModal" title="New Project">
                                    <i class="fa-solid fa-plus fs-8"></i>
                                </button>
                            </div>
                            <div class="project-cards-list d-flex flex-column gap-3 flex-grow-1 min-vh-50" id="projColListComplete" data-status="completed"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Subview 2: Project List Table -->
            <div class="board-list-subview" id="subviewListTable">
                <!-- Toolbar Filter Card -->
                <div class="p-3 bg-light rounded-3 mb-3 border">
                    <div class="row g-3 align-items-center justify-content-between">
                        <div class="col-12 col-md-5">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" class="form-control border-start-0 fs-7" id="tableFilterSearch" placeholder="Search project name, category, or lead...">
                            </div>
                        </div>
                        <div class="col-12 col-md-7 d-flex flex-wrap align-items-center justify-content-md-end gap-2">
                            <select class="form-select form-select-sm fs-7 w-auto" id="tableFilterCategory">
                                <option value="">All Categories</option>
                                <option value="ecommerce">E-Commerce</option>
                                <option value="corporate">Corporate Web</option>
                                <option value="marketing">Marketing Campaign</option>
                                <option value="mobile">Mobile Application</option>
                            </select>
                            <select class="form-select form-select-sm fs-7 w-auto" id="tableFilterStatus">
                                <option value="">All Statuses</option>
                                <option value="active">Active</option>
                                <option value="completed">Completed</option>
                                <option value="in-review">In Review</option>
                            </select>
                            <button class="btn btn-primary btn-sm fs-7 fw-semibold rounded-3 px-3" data-bs-toggle="modal" data-bs-target="#newProjectModal">
                                <i class="fa-solid fa-plus me-1"></i> New Project
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Master Table Card -->
                <div class="border rounded-3 overflow-hidden bg-white">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                <tr>
                                    <th class="ps-4" style="width: 40px;">
                                        <input class="form-check-input" type="checkbox">
                                    </th>
                                    <th>Project Name</th>
                                    <th>Registered Domain & Telemetry</th>
                                    <th>Category</th>
                                    <th>Project Lead</th>
                                    <th>Team Members</th>
                                    <th>Tasks Progress</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th class="pe-4 text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody class="fs-7" id="masterProjectTableBody">
                                <!-- Row 1: Middleware Project -->
                                <tr>
                                    <td class="ps-4">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="badge-icon-sm badge-ecommerce p-2 rounded-3">
                                                <i class="fa-solid fa-bag-shopping fs-5"></i>
                                            </div>
                                            <div>
                                                <a href="KanbanTask.php" class="fw-bold text-dark text-decoration-none d-block">Middleware Project</a>
                                                <span class="text-muted fs-8">Syncboard core middleware architecture</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1.5 mb-1">
                                            <i class="fa-solid fa-link text-primary fs-8"></i>
                                            <a href="../Monitoring/dashboard.php?domain=api.sdn-middleware.internal" class="fw-bold text-primary text-decoration-none fs-8" title="View Live Telemetry in Monitoring">
                                                api.sdn-middleware.internal
                                            </a>
                                        </div>
                                        <span class="badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-circle-check me-1"></i>SSL Valid (82d)</span>
                                    </td>
                                    <td><span class="badge bg-primary-subtle text-primary">E-Commerce / API</span></td>
                                    <td>
                                        <span class="fw-semibold text-dark">Sophia Carter</span>
                                    </td>
                                    <td>
                                        <div class="team-avatars-stack d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle border border-white" alt="Team">
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle border border-white" alt="Team">
                                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle border border-white" alt="Team">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2" style="min-width: 120px;">
                                            <div class="progress flex-grow-1" style="height: 6px;">
                                                <div class="progress-bar bg-primary" style="width: 65%;"></div>
                                            </div>
                                            <span class="fs-8 text-muted fw-bold">65%</span>
                                        </div>
                                    </td>
                                    <td class="text-secondary">Nov 15, 2026</td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success px-2.5 py-1">In Development</span></td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-light border text-primary btn-trigger-breakdown-row" data-proj-id="proj-middleware" title="View Task Breakdown Modal"><i class="fa-solid fa-list-check"></i></button>
                                            <a href="KanbanTask.php" class="btn btn-light border" title="Open Kanban Tasks"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                            <a href="../Monitoring/dashboard.php?domain=api.sdn-middleware.internal" class="btn btn-light border text-primary" title="Live Monitoring Telemetry"><i class="fa-solid fa-gauge-high"></i></a>
                                            <button class="btn btn-light border" title="Edit"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-light text-danger border" title="Delete"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Row 2: Company Website -->
                                <tr>
                                    <td class="ps-4">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="badge-icon-sm badge-company p-2 rounded-3">
                                                <i class="fa-solid fa-globe fs-5"></i>
                                            </div>
                                            <div>
                                                <a href="KanbanTask.php?project=company" class="fw-bold text-dark text-decoration-none d-block">Company Website</a>
                                                <span class="text-muted fs-8">Corporate redesign & investor portal</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1.5 mb-1">
                                            <i class="fa-solid fa-link text-info fs-8"></i>
                                            <a href="../Monitoring/dashboard.php?domain=company.org" class="fw-bold text-info text-decoration-none fs-8" title="View Live Telemetry in Monitoring">
                                                company.org
                                            </a>
                                        </div>
                                        <span class="badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-circle-check me-1"></i>SSL Valid (120d)</span>
                                    </td>
                                    <td><span class="badge bg-info-subtle text-info">Corporate Web</span></td>
                                    <td>
                                        <span class="fw-semibold text-dark">Michael Anderson</span>
                                    </td>
                                    <td>
                                        <div class="team-avatars-stack d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle border border-white" alt="Team">
                                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle border border-white" alt="Team">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2" style="min-width: 120px;">
                                            <div class="progress flex-grow-1" style="height: 6px;">
                                                <div class="progress-bar bg-success" style="width: 90%;"></div>
                                            </div>
                                            <span class="fs-8 text-muted fw-bold">90%</span>
                                        </div>
                                    </td>
                                    <td class="text-secondary">Oct 30, 2026</td>
                                    <td><span class="badge bg-warning bg-opacity-10 text-warning border border-warning px-2.5 py-1">Testing & Review</span></td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-light border text-primary btn-trigger-breakdown-row" data-proj-id="proj-company" title="View Task Breakdown Modal"><i class="fa-solid fa-list-check"></i></button>
                                            <a href="KanbanTask.php?project=company" class="btn btn-light border" title="Open Kanban Tasks"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                            <a href="../Monitoring/dashboard.php?domain=company.org" class="btn btn-light border text-primary" title="Live Monitoring Telemetry"><i class="fa-solid fa-gauge-high"></i></a>
                                            <button class="btn btn-light border" title="Edit"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-light text-danger border" title="Delete"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Row 3: Landing Page Campaign -->
                                <tr>
                                    <td class="ps-4">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="badge-icon-sm badge-landing p-2 rounded-3">
                                                <i class="fa-solid fa-bullhorn fs-5"></i>
                                            </div>
                                            <div>
                                                <a href="KanbanTask.php?project=landing" class="fw-bold text-dark text-decoration-none d-block">Landing Page Campaign</a>
                                                <span class="text-muted fs-8">Q4 Product launch marketing page</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1.5 mb-1">
                                            <i class="fa-solid fa-link text-warning fs-8"></i>
                                            <a href="../Monitoring/dashboard.php?domain=promo.campaign.io" class="fw-bold text-warning text-decoration-none fs-8" title="View Live Telemetry in Monitoring">
                                                promo.campaign.io
                                            </a>
                                        </div>
                                        <span class="badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-circle-check me-1"></i>SSL Valid (60d)</span>
                                    </td>
                                    <td><span class="badge bg-warning-subtle text-warning">Marketing</span></td>
                                    <td>
                                        <span class="fw-semibold text-dark">Sophia Carter</span>
                                    </td>
                                    <td>
                                        <div class="team-avatars-stack d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle border border-white" alt="Team">
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle border border-white" alt="Team">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2" style="min-width: 120px;">
                                            <div class="progress flex-grow-1" style="height: 6px;">
                                                <div class="progress-bar bg-info" style="width: 40%;"></div>
                                            </div>
                                            <span class="fs-8 text-muted fw-bold">40%</span>
                                        </div>
                                    </td>
                                    <td class="text-secondary">Dec 10, 2026</td>
                                    <td><span class="badge bg-primary bg-opacity-10 text-primary border border-primary px-2.5 py-1">In Development</span></td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-light border text-primary btn-trigger-breakdown-row" data-proj-id="proj-landing" title="View Task Breakdown Modal"><i class="fa-solid fa-list-check"></i></button>
                                            <a href="KanbanTask.php?project=landing" class="btn btn-light border" title="Open Kanban Tasks"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                            <a href="../Monitoring/dashboard.php?domain=promo.campaign.io" class="btn btn-light border text-primary" title="Live Monitoring Telemetry"><i class="fa-solid fa-gauge-high"></i></a>
                                            <button class="btn btn-light border" title="Edit"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-light text-danger border" title="Delete"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Footer -->
                    <div class="card-footer bg-white border-top p-3 d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <span class="text-muted fs-7">Showing <strong>1-3</strong> of <strong>3</strong> Projects</span>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------------------------------------------------------- -->
    <!-- VIEW 3: CALENDAR & TIMELINE VIEW (FOR PROJECTS)                         -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="view-content" id="viewCalendar">
        <div class="card shadow-sm border rounded-4 p-4 calendar-wrapper bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 pb-3 border-bottom">
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <h2 class="h5 fw-bold mb-0 text-dark" id="projectCalendarMonthTitle">September 2026</h2>

                    <!-- Subtabs Toggle -->
                    <div class="nav nav-pills calendar-subtabs p-1 bg-light rounded-3 border" id="projectCalendarSubTabs">
                        <button class="nav-link active cal-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="grid">
                            <i class="fa-regular fa-calendar-days me-1"></i> Calendar Grid
                        </button>
                        <button class="nav-link cal-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="timeline">
                            <i class="fa-solid fa-chart-gantt me-1"></i> Gantt Timeline
                        </button>
                        <button class="nav-link cal-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="schedule-manager">
                            <i class="fa-solid fa-sliders me-1"></i> Schedule Manager
                        </button>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-outline-secondary" id="btnProjPrevMonth" title="Previous Month"><i class="fa-solid fa-chevron-left"></i></button>
                        <button class="btn btn-outline-secondary fw-semibold" id="btnProjToday">Today</button>
                        <button class="btn btn-outline-secondary" id="btnProjNextMonth" title="Next Month"><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                    <button class="btn btn-sm btn-primary fw-semibold rounded-3 d-flex align-items-center gap-1.5 px-3 py-1.5 shadow-sm" data-bs-toggle="modal" data-bs-target="#newProjectModal">
                        <i class="fa-solid fa-folder-plus"></i> New Project
                    </button>
                </div>
            </div>

            <!-- Subview 1: Project Calendar Grid -->
            <div class="calendar-subview-content active" id="subviewProjGrid">
                <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                    <span class="fs-8 text-muted fw-semibold"><i class="fa-solid fa-circle-info text-primary me-1"></i> Klik pada proyek untuk membuka papan Kanban Task atau mengubah jadwal timeline.</span>
                    <div class="d-flex align-items-center gap-3 fs-8">
                        <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-todo p-1 rounded-circle"></span> Planning / To Do</span>
                        <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-progress p-1 rounded-circle"></span> In Development</span>
                        <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-review p-1 rounded-circle"></span> Review</span>
                        <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-complete p-1 rounded-circle"></span> Completed</span>
                    </div>
                </div>
                <div class="calendar-grid d-grid gap-2" id="projectCalendarGrid" style="grid-template-columns: repeat(7, 1fr);">
                    <!-- Dynamic Calendar Cells rendered by jQuery -->
                </div>
            </div>

            <!-- Subview 2: Project Timeline Schedule (Gantt) -->
            <div class="calendar-subview-content" id="subviewProjTimeline">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3 p-2.5 bg-light rounded-3 border">
                    <div class="d-flex align-items-center gap-2">
                        <span class="fs-8 fw-bold text-uppercase text-muted">Project Filter:</span>
                        <select class="form-select form-select-sm fs-8 w-auto py-1" id="projectTimelineStatusFilter">
                            <option value="all">All Statuses</option>
                            <option value="todo">Planning / To Do</option>
                            <option value="in-progress">In Development</option>
                            <option value="review">Testing & Review</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div class="fs-8 text-muted">
                        <span><i class="fa-solid fa-arrows-left-right me-1 text-primary"></i> Timeline bars menunjukkan rentang tanggal & progres penyelesaian proyek</span>
                    </div>
                </div>

                <div class="timeline-container p-1">
                    <div class="timeline-header d-flex align-items-center border-bottom pb-2 mb-3 fw-bold text-muted fs-8 text-uppercase">
                        <div style="width: 290px; flex-shrink: 0;">Project, Category & Priority</div>
                        <div class="flex-grow-1 d-flex justify-content-between text-center px-3">
                            <span class="w-25">Sep 1 - 7</span>
                            <span class="w-25">Sep 8 - 14</span>
                            <span class="w-25">Sep 15 - 21</span>
                            <span class="w-25">Sep 22 - 30</span>
                        </div>
                        <div style="width: 170px; flex-shrink: 0;" class="text-end">Lead & Actions</div>
                    </div>
                    <div class="timeline-body d-flex flex-column gap-2" id="projectTimelineList">
                        <!-- Dynamic Project Timeline Rows rendered via jQuery -->
                    </div>
                </div>
            </div>

            <!-- Subview 3: Project Timeline Scheduler / Configurator -->
            <div class="calendar-subview-content" id="subviewProjScheduleManager">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3 p-3 bg-primary-subtle rounded-3 border border-primary-subtle">
                    <div>
                        <h6 class="fw-bold text-primary mb-1"><i class="fa-solid fa-sliders me-1"></i> Per-Project Timeline & Schedule Manager</h6>
                        <p class="fs-8 text-secondary mb-0">Atur langsung tanggal mulai (Start Date), target selesai (Due Date), durasi hari, dan prioritas untuk setiap portfolio proyek.</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-sm btn-outline-primary bg-white fs-8 fw-semibold" id="btnResetProjectTimelines">
                            <i class="fa-solid fa-rotate me-1"></i> Reset Default Timelines
                        </button>
                    </div>
                </div>

                <div class="table-responsive border rounded-3 bg-white">
                    <table class="table table-hover align-middle mb-0 timeline-schedule-table">
                        <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                            <tr>
                                <th class="py-3 px-3" style="min-width: 250px;">Project Title</th>
                                <th class="py-3 px-2" style="width: 130px;">Category</th>
                                <th class="py-3 px-2" style="width: 120px;">Status</th>
                                <th class="py-3 px-2" style="width: 110px;">Priority</th>
                                <th class="py-3 px-2" style="min-width: 140px;">Start Date</th>
                                <th class="py-3 px-2" style="min-width: 140px;">Due Date</th>
                                <th class="py-3 px-2" style="width: 90px;">Duration</th>
                                <th class="py-3 px-2" style="min-width: 140px;">Quick Presets</th>
                                <th class="py-3 px-3 text-end" style="width: 130px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="projectTimelineSchedulerTableBody" class="fs-7">
                            <!-- Dynamic rows for editing per-project timeline rendered by jQuery -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------------------------------------------------------- -->
    <!-- VIEW 4: DOCUMENTATION REPOSITORY & FILE UPLOAD                          -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="view-content" id="viewDocumentation">
        <!-- Documentation Header Card -->
        <div class="card shadow-sm border rounded-4 p-4 bg-white mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="p-3 bg-warning-subtle text-warning rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 52px; height: 52px;">
                        <i class="fa-solid fa-folder-open fs-3 text-warning"></i>
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <h2 class="h5 fw-bold mb-0 text-dark">Portfolio Documentation & Asset Repository</h2>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold">Multi-Project Hub</span>
                        </div>
                        <span class="fs-8 text-muted mt-0.5 d-block">Pusat master spesifikasi BRD, FSD, PRD, ERD, Blueprint, UI/UX asset, serta arsip file dokumen semua project.</span>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <button class="btn btn-sm btn-primary rounded-3 d-flex align-items-center gap-2 px-3 py-2 fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#uploadDocFileModal">
                        <i class="fa-solid fa-cloud-arrow-up fs-6"></i>
                        <span>Upload File Dokumentasi</span>
                    </button>
                    <a href="Documentation/TrackingVersion.php" class="btn btn-sm btn-outline-secondary rounded-3 d-flex align-items-center gap-1.5 px-3 py-2 fw-semibold">
                        <i class="fa-solid fa-timeline"></i> Track Versioning
                    </a>
                </div>
            </div>

            <!-- Quick Jump Module Pills -->
            <div class="d-flex flex-wrap align-items-center gap-2 pt-3 mt-3 border-top">
                <span class="fs-8 text-muted fw-bold text-uppercase me-1"><i class="fa-solid fa-bolt me-1 text-primary"></i> Master Specs:</span>
                <a href="Documentation/BRD.php" class="btn btn-xs btn-outline-primary rounded-pill fs-8 px-3 py-1 fw-semibold">
                    <i class="fa-solid fa-file-invoice me-1"></i> BRD
                </a>
                <a href="Documentation/FSD.php" class="btn btn-xs btn-outline-success rounded-pill fs-8 px-3 py-1 fw-semibold">
                    <i class="fa-solid fa-file-code me-1"></i> FSD
                </a>
                <a href="Documentation/PRD.php" class="btn btn-xs btn-outline-info rounded-pill fs-8 px-3 py-1 fw-semibold">
                    <i class="fa-solid fa-rectangle-list me-1"></i> PRD
                </a>
                <a href="Documentation/ERD.php" class="btn btn-xs btn-outline-warning rounded-pill fs-8 px-3 py-1 fw-semibold">
                    <i class="fa-solid fa-diagram-project me-1"></i> ERD
                </a>
                <a href="Documentation/Blueprints.php" class="btn btn-xs btn-outline-danger rounded-pill fs-8 px-3 py-1 fw-semibold">
                    <i class="fa-solid fa-cubes-stacked me-1"></i> Blueprints
                </a>
            </div>
        </div>

        <!-- Category Metric Cards Grid -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card shadow-sm border rounded-4 p-3 bg-white text-center cursor-pointer hover-card-shadow doc-quick-cat-filter" data-category="brd">
                    <div class="p-2.5 bg-primary-subtle text-primary rounded-3 d-inline-flex align-items-center justify-content-center mb-2" style="width: 40px; height: 40px;">
                        <i class="fa-solid fa-file-invoice fs-5"></i>
                    </div>
                    <span class="fs-8 fw-bold text-dark d-block text-truncate">BRD Requirements</span>
                    <span class="badge bg-light text-muted border fs-9 mt-1" id="catCount_brd">3 Files</span>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card shadow-sm border rounded-4 p-3 bg-white text-center cursor-pointer hover-card-shadow doc-quick-cat-filter" data-category="fsd">
                    <div class="p-2.5 bg-success-subtle text-success rounded-3 d-inline-flex align-items-center justify-content-center mb-2" style="width: 40px; height: 40px;">
                        <i class="fa-solid fa-file-code fs-5"></i>
                    </div>
                    <span class="fs-8 fw-bold text-dark d-block text-truncate">FSD Specs</span>
                    <span class="badge bg-light text-muted border fs-9 mt-1" id="catCount_fsd">2 Files</span>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card shadow-sm border rounded-4 p-3 bg-white text-center cursor-pointer hover-card-shadow doc-quick-cat-filter" data-category="prd">
                    <div class="p-2.5 bg-info-subtle text-info rounded-3 d-inline-flex align-items-center justify-content-center mb-2" style="width: 40px; height: 40px;">
                        <i class="fa-solid fa-rectangle-list fs-5"></i>
                    </div>
                    <span class="fs-8 fw-bold text-dark d-block text-truncate">PRD Product</span>
                    <span class="badge bg-light text-muted border fs-9 mt-1" id="catCount_prd">2 Files</span>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card shadow-sm border rounded-4 p-3 bg-white text-center cursor-pointer hover-card-shadow doc-quick-cat-filter" data-category="erd">
                    <div class="p-2.5 bg-warning-subtle text-warning rounded-3 d-inline-flex align-items-center justify-content-center mb-2" style="width: 40px; height: 40px;">
                        <i class="fa-solid fa-diagram-project fs-5"></i>
                    </div>
                    <span class="fs-8 fw-bold text-dark d-block text-truncate">ERD Schemas</span>
                    <span class="badge bg-light text-muted border fs-9 mt-1" id="catCount_erd">2 Files</span>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card shadow-sm border rounded-4 p-3 bg-white text-center cursor-pointer hover-card-shadow doc-quick-cat-filter" data-category="blueprint">
                    <div class="p-2.5 bg-danger-subtle text-danger rounded-3 d-inline-flex align-items-center justify-content-center mb-2" style="width: 40px; height: 40px;">
                        <i class="fa-solid fa-cubes-stacked fs-5"></i>
                    </div>
                    <span class="fs-8 fw-bold text-dark d-block text-truncate">Architecture</span>
                    <span class="badge bg-light text-muted border fs-9 mt-1" id="catCount_blueprint">3 Files</span>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card shadow-sm border rounded-4 p-3 bg-white text-center cursor-pointer hover-card-shadow doc-quick-cat-filter" data-category="assets">
                    <div class="p-2.5 bg-secondary-subtle text-dark rounded-3 d-inline-flex align-items-center justify-content-center mb-2" style="width: 40px; height: 40px;">
                        <i class="fa-solid fa-file-zipper fs-5 text-secondary"></i>
                    </div>
                    <span class="fs-8 fw-bold text-dark d-block text-truncate">Assets & Other</span>
                    <span class="badge bg-light text-muted border fs-9 mt-1" id="catCount_assets">4 Files</span>
                </div>
            </div>
        </div>

        <!-- Drag & Drop Upload Quick Zone -->
        <div class="card shadow-sm border rounded-4 p-4 bg-white mb-4">
            <div class="p-4 border-2 border-dashed rounded-4 text-center bg-light-subtle cursor-pointer doc-dropzone" id="quickDocDropzone">
                <div class="d-flex flex-column align-items-center justify-content-center py-2">
                    <div class="p-3 bg-primary-subtle text-primary rounded-circle mb-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-cloud-arrow-up fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark fs-6 mb-1">Drag & drop berkas dokumentasi Anda ke sini</h5>
                    <p class="text-muted fs-8 mb-3">Mendukung semua format berkas: PDF, DOCX, XLSX, PPTX, PNG, JPG, SVG, ZIP, RAR, TXT, MD, DRAWIO (Maks. 100MB per file)</p>
                    <button type="button" class="btn btn-sm btn-primary rounded-3 px-4 py-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#uploadDocFileModal">
                        <i class="fa-solid fa-folder-open me-1.5"></i> Pilih Berkas untuk Diunggah
                    </button>
                </div>
            </div>
        </div>

        <!-- Master Documentation File List / Grid Container -->
        <div class="card shadow-sm border rounded-4 bg-white overflow-hidden mb-4">
            <!-- Filter & Toolbar Header -->
            <div class="card-header bg-white border-bottom p-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <h5 class="h6 fw-bold mb-0 text-dark"><i class="fa-solid fa-folder-tree text-primary me-1.5"></i> Repository Files</h5>
                    <span class="badge bg-light text-muted border fs-8" id="docTotalCountBadge">0 Total Files</span>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-2">
                    <!-- Live Search Input -->
                    <div class="input-group input-group-sm" style="min-width: 220px;">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass fs-8"></i></span>
                        <input type="text" class="form-control border-start-0 fs-8" id="docFileSearchInput" placeholder="Cari nama dokumen, tipe, atau uploader...">
                    </div>

                    <!-- Project Filter Selector -->
                    <select class="form-select form-select-sm fs-8 w-auto" id="docFileProjectFilter">
                        <option value="all">Semua Project</option>
                        <option value="Middleware Project">Middleware Project</option>
                        <option value="Company Website">Company Website</option>
                        <option value="Landing Page Campaign">Landing Page Campaign</option>
                        <option value="Mobile CRM Application">Mobile CRM Application</option>
                        <option value="Internal Analytics Tool">Internal Analytics Tool</option>
                    </select>

                    <!-- Category Filter Selector -->
                    <select class="form-select form-select-sm fs-8 w-auto" id="docFileCategoryFilter">
                        <option value="all">Semua Kategori</option>
                        <option value="brd">BRD (Business Req)</option>
                        <option value="fsd">FSD (Functional Spec)</option>
                        <option value="prd">PRD (Product Req)</option>
                        <option value="erd">ERD (Database Schema)</option>
                        <option value="blueprint">Blueprint & Architecture</option>
                        <option value="assets">Assets & Source Packages</option>
                        <option value="other">Lainnya</option>
                    </select>

                    <!-- Upload Button Shortcut -->
                    <button class="btn btn-sm btn-primary rounded-3 px-3 fs-8 fw-semibold d-flex align-items-center gap-1.5" data-bs-toggle="modal" data-bs-target="#uploadDocFileModal">
                        <i class="fa-solid fa-plus"></i> Upload
                    </button>
                </div>
            </div>

            <!-- Table View -->
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                        <tr>
                            <th class="ps-4 py-3" style="min-width: 280px;">Nama Berkas & Judul Dokumen</th>
                            <th class="py-3" style="width: 180px;">Project Terkait</th>
                            <th class="py-3" style="width: 130px;">Kategori</th>
                            <th class="py-3" style="width: 100px;">Versi</th>
                            <th class="py-3" style="width: 150px;">Uploader & Tanggal</th>
                            <th class="py-3" style="width: 110px;">Ukuran</th>
                            <th class="pe-4 py-3 text-end" style="width: 130px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="fs-7" id="docFilesTableBody">
                        <!-- Dynamic File Rows rendered by JS -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- =========================================================================== -->
<!-- 4. MODALS & POPUPS                                                          -->
<!-- =========================================================================== -->

<!-- Modal: Upload File Documentation (All File Types Supported) -->
<div class="modal fade" id="uploadDocFileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg p-2">
            <div class="modal-header border-0 pb-0">
                <div class="d-flex align-items-center gap-2.5">
                    <div class="p-2.5 bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-cloud-arrow-up fs-5"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0">Upload File Dokumentasi</h5>
                        <span class="fs-8 text-muted">Unggah berkas spesifikasi, diagram, atau aset pendukung untuk project</span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formUploadDocFile">
                <div class="modal-body pt-3">
                    <div class="row g-3 mb-3">
                        <!-- Project Selector -->
                        <div class="col-12 col-md-6">
                            <label class="form-label fs-7 fw-semibold text-dark">Target Project *</label>
                            <select class="form-select fs-7" id="uploadDocProject" required>
                                <option value="Middleware Project">Middleware Project</option>
                                <option value="Company Website">Company Website</option>
                                <option value="Landing Page Campaign">Landing Page Campaign</option>
                                <option value="Mobile CRM Application">Mobile CRM Application</option>
                                <option value="Internal Analytics Tool">Internal Analytics Tool</option>
                            </select>
                        </div>

                        <!-- Category Selector -->
                        <div class="col-12 col-md-6">
                            <label class="form-label fs-7 fw-semibold text-dark">Kategori Dokumen *</label>
                            <select class="form-select fs-7" id="uploadDocCategory" required>
                                <option value="brd">BRD (Business Requirements Document)</option>
                                <option value="fsd">FSD (Functional Specification Document)</option>
                                <option value="prd">PRD (Product Requirements Document)</option>
                                <option value="erd">ERD (Entity Relationship Diagram / SQL)</option>
                                <option value="blueprint">Architecture / Blueprint Diagram</option>
                                <option value="assets">UI/UX Asset / Source Package</option>
                                <option value="other">Lainnya / General Documentation</option>
                            </select>
                        </div>
                    </div>

                    <!-- Document Title & Version -->
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-8">
                            <label class="form-label fs-7 fw-semibold text-dark">Judul Dokumen *</label>
                            <input type="text" class="form-control fs-7" id="uploadDocTitle" placeholder="e.g. Master Enterprise Architecture Blueprint v2" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label fs-7 fw-semibold text-dark">Versi Dokumen</label>
                            <input type="text" class="form-control fs-7 font-monospace" id="uploadDocVersion" placeholder="e.g. v1.0.0" value="v1.0.0">
                        </div>
                    </div>

                    <!-- File Input Area (All Extensions) -->
                    <div class="mb-3">
                        <label class="form-label fs-7 fw-semibold text-dark">Pilih Berkas File *</label>
                        <div class="input-group">
                            <input type="file" class="form-control fs-7" id="uploadDocFileInput" accept="*/*,.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.png,.jpg,.jpeg,.svg,.zip,.rar,.txt,.md,.drawio" required>
                        </div>
                        <span class="fs-8 text-muted mt-1 d-block">
                            <i class="fa-solid fa-circle-check text-success me-1"></i> Mendukung seluruh format berkas dokumen, spreadsheet, arsip kompresi, dan gambar desain.
                        </span>
                    </div>

                    <!-- Author & Description -->
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label fs-7 fw-semibold text-dark">Pengunggah / Author</label>
                            <input type="text" class="form-control fs-7" id="uploadDocAuthor" value="Sophia Carter (Lead Architect)">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fs-7 fw-semibold text-dark">Status Persetujuan</label>
                            <select class="form-select fs-7" id="uploadDocStatus">
                                <option value="Approved" selected>Approved / Official</option>
                                <option value="Under Review">Under Review</option>
                                <option value="Draft">Draft</option>
                                <option value="Archived">Archived</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label fs-7 fw-semibold text-dark">Catatan / Ringkasan Perubahan</label>
                        <textarea class="form-control fs-7" id="uploadDocNotes" rows="2" placeholder="Tuliskan catatan rilis berkas atau changelog singkat..."></textarea>
                    </div>

                    <!-- Upload Progress Simulation Bar (Hidden by default) -->
                    <div class="d-none mt-3" id="uploadDocProgressContainer">
                        <div class="d-flex align-items-center justify-content-between fs-8 mb-1">
                            <span class="text-primary fw-semibold"><i class="fa-solid fa-spinner fa-spin me-1"></i> Mengunggah berkas...</span>
                            <span class="text-dark fw-bold" id="uploadDocProgressPct">0%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" id="uploadDocProgressBar" style="width: 0%;"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary px-3.5 fs-7" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 fs-7 fw-semibold d-flex align-items-center gap-2" id="btnSubmitUploadDoc">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <span>Upload Sekarang</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Preview Documentation File Details -->
<div class="modal fade" id="previewDocFileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg p-3">
            <div class="modal-header border-bottom pb-3">
                <div class="d-flex align-items-center gap-2.5">
                    <div class="p-2.5 rounded-3 d-flex align-items-center justify-content-center text-white" id="previewDocIconBox" style="width: 44px; height: 44px; background: #3b82f6;">
                        <i class="fa-solid fa-file fs-5" id="previewDocIcon"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0" id="previewDocTitle">Document Title</h5>
                        <span class="fs-8 text-muted" id="previewDocSubtitle">Project Association</span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-3">
                <div class="p-3 bg-light rounded-3 mb-3 border">
                    <div class="row g-2 fs-8">
                        <div class="col-6">
                            <span class="text-muted d-block">Nama Berkas:</span>
                            <strong class="text-dark font-monospace" id="previewDocFilename">document.pdf</strong>
                        </div>
                        <div class="col-6">
                            <span class="text-muted d-block">Ukuran File:</span>
                            <strong class="text-dark" id="previewDocSize">2.4 MB</strong>
                        </div>
                        <div class="col-6 mt-2">
                            <span class="text-muted d-block">Kategori & Versi:</span>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle" id="previewDocCategory">BRD</span>
                            <span class="badge bg-light text-dark border font-monospace ms-1" id="previewDocVersion">v1.0.0</span>
                        </div>
                        <div class="col-6 mt-2">
                            <span class="text-muted d-block">Status Dokumen:</span>
                            <span class="badge bg-success-subtle text-success border border-success-subtle" id="previewDocStatus">Approved</span>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <span class="fs-8 text-muted d-block fw-semibold mb-1">Catatan & Deskripsi:</span>
                    <p class="fs-8 text-dark bg-light-subtle p-2.5 rounded-3 border mb-0" id="previewDocDesc">No description available.</p>
                </div>
            </div>
            <div class="modal-footer border-top pt-2.5 d-flex align-items-center justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm px-3 fs-8" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary btn-sm px-3 fs-8 fw-semibold d-flex align-items-center gap-1.5" id="btnPreviewDownload">
                    <i class="fa-solid fa-download"></i> Unduh Berkas
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Create New Project -->
<div class="modal fade" id="newProjectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg p-2">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-dark">Create New Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formNewProject">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fs-7 fw-semibold text-dark">Project Name *</label>
                        <input type="text" class="form-control fs-7" id="newProjName" placeholder="e.g. Mobile CRM Application" required>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fs-7 fw-semibold text-dark">Category</label>
                            <select class="form-select fs-7" id="newProjCategory">
                                <option value="ecommerce">E-Commerce / API</option>
                                <option value="corporate">Corporate Web</option>
                                <option value="marketing">Marketing Campaign</option>
                                <option value="mobile">Mobile App</option>
                                <option value="internal">Internal Analytics</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fs-7 fw-semibold text-dark">Project Lead</label>
                            <select class="form-select fs-7" id="newProjLead">
                                <option value="Sophia Carter">Sophia Carter</option>
                                <option value="Michael Anderson">Michael Anderson</option>
                                <option value="Daniel Johnson">Daniel Johnson</option>
                                <option value="James Wilson">James Wilson</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-7 fw-semibold text-dark">Target Domain / Production FQDN *</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light text-muted"><i class="fa-solid fa-globe"></i></span>
                            <input type="text" class="form-control fs-7" id="newProjDomain" placeholder="e.g. api-v2.company.internal" required>
                        </div>
                        <span class="fs-8 text-muted mt-1 d-block"><i class="fa-solid fa-bolt text-warning me-1"></i> Domain ini otomatis terdaftar ke modul Monitoring untuk live telemetry, SSL check, dan server health.</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-7 fw-semibold text-dark">Description</label>
                        <textarea class="form-control fs-7" id="newProjDesc" rows="2" placeholder="Brief project summary..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary px-3 fs-7" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4 fs-7 fw-semibold">Create Project</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Project Task Breakdown (from Calendar / Gantt Timeline) -->
<div class="modal fade" id="projectTaskBreakdownModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <!-- Modal Header -->
            <div class="modal-header border-bottom px-4 py-3 bg-light-subtle align-items-center">
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <div class="rounded-3 p-2.5 d-flex align-items-center justify-content-center text-white shadow-xs" id="breakdownProjIconBadge" style="width: 44px; height: 44px; background: #3b82f6;">
                        <i class="fa-solid fa-layer-group fs-5" id="breakdownProjIcon"></i>
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <h5 class="modal-title fw-bold text-dark mb-0" id="breakdownProjTitle">Middleware Project</h5>
                            <span class="badge bg-primary-subtle text-primary fs-8 px-2 py-0.5 rounded-2 fw-semibold" id="breakdownProjCategory">E-Commerce / API</span>
                            <span class="badge bg-danger-subtle text-danger fs-8 px-2 py-0.5 rounded-2 fw-semibold" id="breakdownProjPriority">High Priority</span>
                            <span class="badge bg-success-subtle text-success fs-8 px-2 py-0.5 rounded-2 fw-semibold" id="breakdownProjStatus">In Progress</span>
                        </div>
                        <div class="d-flex align-items-center gap-3 fs-8 text-muted mt-1 flex-wrap">
                            <span><i class="fa-solid fa-user-tie text-primary me-1"></i> Lead: <strong class="text-dark" id="breakdownProjLead">Sophia Carter</strong></span>
                            <span><i class="fa-regular fa-calendar text-info me-1"></i> Timeline: <span id="breakdownProjDates">Sep 05 - Nov 15, 2026 (71d)</span></span>
                            <span><i class="fa-solid fa-link text-success me-1"></i> Domain: <a href="#" id="breakdownProjDomain" class="text-primary text-decoration-none fw-semibold" target="_blank">api.sdn-middleware.internal</a></span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4 bg-white">
                <!-- Project Progress Summary Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-4">
                        <div class="p-3 bg-light rounded-3 border h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <span class="fs-8 fw-bold text-uppercase text-muted">Sprint Completion</span>
                                    <span class="fw-bold text-dark fs-7" id="breakdownProgressPct">65%</span>
                                </div>
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar bg-primary progress-bar-striped" id="breakdownProgressBar" style="width: 65%;"></div>
                                </div>
                            </div>
                            <span class="fs-8 text-muted" id="breakdownTaskStats"><i class="fa-solid fa-list-check me-1 text-primary"></i> 8 of 12 Tasks Finished</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="row g-2 h-100">
                            <div class="col-6 col-sm-3">
                                <div class="p-2.5 bg-danger-subtle border border-danger-subtle rounded-3 text-center h-100 d-flex flex-column justify-content-center cursor-pointer breakdown-stat-filter" data-status="todo" title="Filter To Do tasks">
                                    <span class="fs-8 fw-bold text-danger text-uppercase">To Do</span>
                                    <h4 class="fw-extrabold text-danger mb-0" id="breakdownCountTodo">2</h4>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="p-2.5 bg-primary-subtle border border-primary-subtle rounded-3 text-center h-100 d-flex flex-column justify-content-center cursor-pointer breakdown-stat-filter" data-status="in-progress" title="Filter In Progress tasks">
                                    <span class="fs-8 fw-bold text-primary text-uppercase">In Progress</span>
                                    <h4 class="fw-extrabold text-primary mb-0" id="breakdownCountProgress">2</h4>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="p-2.5 bg-warning-subtle border border-warning-subtle rounded-3 text-center h-100 d-flex flex-column justify-content-center cursor-pointer breakdown-stat-filter" data-status="review" title="Filter Review tasks">
                                    <span class="fs-8 fw-bold text-warning text-uppercase">Review</span>
                                    <h4 class="fw-extrabold text-warning mb-0" id="breakdownCountReview">2</h4>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="p-2.5 bg-success-subtle border border-success-subtle rounded-3 text-center h-100 d-flex flex-column justify-content-center cursor-pointer breakdown-stat-filter" data-status="completed" title="Filter Completed tasks">
                                    <span class="fs-8 fw-bold text-success text-uppercase">Done</span>
                                    <h4 class="fw-extrabold text-success mb-0" id="breakdownCountDone">2</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Search & Filters Toolbar for Tasks -->
                <div class="p-3 bg-light rounded-3 mb-3 border">
                    <div class="row g-2 align-items-center justify-content-between">
                        <div class="col-12 col-md-5">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass fs-8"></i></span>
                                <input type="text" class="form-control border-start-0 fs-8" id="breakdownTaskSearch" placeholder="Filter task name, ID, or assignee...">
                            </div>
                        </div>
                        <div class="col-12 col-md-7 d-flex flex-wrap align-items-center justify-content-md-end gap-2">
                            <select class="form-select form-select-sm fs-8 w-auto" id="breakdownStatusFilter">
                                <option value="all">All Statuses</option>
                                <option value="todo">To Do</option>
                                <option value="in-progress">In Progress</option>
                                <option value="review">Review</option>
                                <option value="completed">Completed</option>
                            </select>
                            <select class="form-select form-select-sm fs-8 w-auto" id="breakdownPriorityFilter">
                                <option value="all">All Priorities</option>
                                <option value="Urgent">Urgent</option>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Normal">Normal</option>
                            </select>
                            <button class="btn btn-sm btn-outline-primary fs-8 fw-semibold px-2.5" id="btnBreakdownQuickAddTask">
                                <i class="fa-solid fa-plus me-1"></i> Quick Add Task
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Task Breakdown Table -->
                <div class="border rounded-3 overflow-hidden">
                    <div class="table-responsive" style="max-height: 380px;">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold sticky-top">
                                <tr>
                                    <th class="ps-3 py-2.5" style="width: 100px;">Task ID</th>
                                    <th class="py-2.5" style="min-width: 240px;">Task Title & Deliverables</th>
                                    <th class="py-2.5" style="width: 110px;">Status</th>
                                    <th class="py-2.5" style="width: 90px;">Priority</th>
                                    <th class="py-2.5" style="width: 140px;">Assignee</th>
                                    <th class="py-2.5" style="width: 120px;">SLA Status</th>
                                    <th class="py-2.5" style="width: 110px;">Est. / Due</th>
                                    <th class="pe-3 py-2.5 text-end" style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody class="fs-7" id="breakdownTaskTableBody">
                                <!-- Dynamic Task Rows injected by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer border-top px-4 py-2.5 bg-light-subtle d-flex flex-wrap justify-content-between align-items-center gap-2">
                <span class="fs-8 text-muted">
                    <i class="fa-solid fa-info-circle text-primary me-1"></i> Task breakdown otomatis terhubung dengan jadwal Gantt Timeline dan kalender sprint.
                </span>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm px-3 fs-8" data-bs-dismiss="modal">Close</button>
                    <a href="KanbanTask.php" class="btn btn-primary btn-sm px-3 fs-8 fw-semibold d-flex align-items-center gap-1.5 shadow-sm" id="breakdownOpenTaskBoardBtn">
                        <i class="fa-solid fa-table-columns"></i>
                        <span>Open Full Kanban Workspace</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification Container -->
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1090;">
    <div id="projectLiveToast" class="toast align-items-center text-bg-dark border-0 rounded-3 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center gap-2 fs-7">
                <i class="fa-solid fa-circle-check text-success fs-6"></i>
                <span id="projectToastMsg">Project timeline updated successfully!</span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../layouts/footer.php';
?>
