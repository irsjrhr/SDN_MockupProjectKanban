<?php
/**
 * ==============================================================================
 * SYNCBOARD - ENTERPRISE TASK & KANBAN MANAGEMENT WORKSPACE
 * Location: /Workspace/KanbanTask.php
 * ==============================================================================
 * Interactive project-level Kanban board, task list, timeline calendar,
 * sprint statistics, and documentation repository.
 */

$pageTitle = 'Syncboard - Task & Kanban Management';
$currentPage = 'kanban';
$currentModule = 'workspace';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Project', 'url' => 'KanbanProject.php'],
    ['title' => 'Website', 'url' => '#'],
    ['title' => 'Middleware Project', 'url' => '']
];

include __DIR__ . '/../layouts/header.php';
?>

<!-- =========================================================================== -->
<!-- 1. PROJECT HEADER & QUICK ACTION BAR                                        -->
<!-- =========================================================================== -->
<section class="project-header p-4 bg-white border-bottom d-flex flex-wrap align-items-center justify-content-between gap-3">
    <!-- Project Brand & Telemetry Information -->
    <div class="project-title-area d-flex align-items-center gap-3">
        <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white shadow-sm" style="width: 46px; height: 46px; background: linear-gradient(135deg, #3b82f6, #6366f1);">
            <i class="fa-solid fa-layer-group fs-4"></i>
        </div>
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <h1 class="project-title h4 fw-extrabold text-dark mb-0">Middleware Project</h1>
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold">
                    <i class="fa-solid fa-code me-1"></i> Website Development
                </span>
                <a href="../Monitoring/dashboard.php?domain=api.sdn-middleware.internal" class="badge bg-success-subtle text-success border border-success-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold text-decoration-none" title="View Live Telemetry">
                    <span class="dot dot-complete me-1"></span> api.sdn-middleware.internal
                </a>
            </div>
            <p class="text-muted fs-8 mb-0 mt-0.5">
                Sprint #4 &bull; Target Release: Oct 15, 2026 &bull; Lead: Sophia Carter
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
            <div class="avatar-more rounded-circle border border-2 border-white bg-primary-subtle text-primary fw-bold fs-8 d-flex align-items-center justify-content-center shadow-sm">+4</div>
        </div>

        <!-- Quick Filter Buttons -->
        <div class="btn-group btn-group-sm">
            <a href="SLA.php" class="btn btn-outline-danger d-flex align-items-center gap-1.5 px-3 py-2 fw-semibold" title="View SLA Tracking & Live Deadlines">
                <i class="fa-solid fa-stopwatch-20"></i> SLA 96.2%
            </a>
            <a href="CategoryStatus.php" class="btn btn-outline-secondary d-flex align-items-center gap-1.5 px-3 py-2 fw-semibold" title="Category Filter">
                <i class="fa-solid fa-tags"></i> Categories
            </a>
        </div>

        <!-- New Task Button -->
        <button class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm" id="btnNewTask">
            <i class="fa-solid fa-plus"></i>
            <span>New Task</span>
        </button>
    </div>
</section>

<!-- =========================================================================== -->
<!-- 2. TOOLBAR NAVIGATION TABS                                                  -->
<!-- =========================================================================== -->
<div class="toolbar-container px-4 py-2.5 bg-white border-bottom d-flex flex-nowrap align-items-center justify-content-between gap-3 overflow-x-auto" id="toolbar-container">
    <div class="nav nav-pills view-tabs gap-2 flex-nowrap" id="viewTabs">
        <button class="nav-link active tab-btn fw-semibold py-1.5 px-3 rounded-3 fs-7" data-view="kanban">
            <i class="fa-solid fa-table-columns me-1.5 text-primary"></i> Kanban Board
        </button>
        <button class="nav-link tab-btn fw-semibold py-1.5 px-3 rounded-3 fs-7" data-view="board-list">
            <i class="fa-solid fa-list-check me-1.5 text-secondary"></i> Board & List View
        </button>
        <button class="nav-link tab-btn fw-semibold py-1.5 px-3 rounded-3 fs-7" data-view="calendar">
            <i class="fa-regular fa-calendar-days me-1.5 text-info"></i> Calendar & Timeline
        </button>
        <button class="nav-link tab-btn fw-semibold py-1.5 px-3 rounded-3 fs-7" data-view="dashboard">
            <i class="fa-solid fa-chart-pie me-1.5 text-success"></i> Sprint Analytics
        </button>
        <button class="nav-link tab-btn fw-semibold py-1.5 px-3 rounded-3 fs-7" data-view="documentation">
            <i class="fa-regular fa-folder-open me-1.5 text-warning"></i> Documentation
        </button>
        <button class="nav-link tab-btn fw-semibold py-1.5 px-3 rounded-3 fs-7" data-view="teams">
            <i class="fa-solid fa-users me-1.5 text-indigo"></i> Teams
        </button>
        <button class="nav-link tab-btn fw-semibold py-1.5 px-3 rounded-3 fs-7" data-view="settings">
            <i class="fa-solid fa-gear me-1.5 text-muted"></i> Settings
        </button>
        <button class="nav-link tab-btn fw-semibold py-1.5 px-3 rounded-3 fs-7" data-view="github">
            <i class="fa-brands fa-github me-1.5 text-dark"></i> GitHub Stream
        </button>
    </div>
</div>

<!-- =========================================================================== -->
<!-- 3. MAIN VIEW CONTENT CONTAINERS                                             -->
<!-- =========================================================================== -->
<div class="view-wrapper flex-grow-1 p-4 bg-light-subtle">

    <!-- ----------------------------------------------------------------------- -->
    <!-- VIEW 1: KANBAN BOARD (Default Active View)                              -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="view-content active" id="viewKanban">
        <div class="row g-4 kanban-board">
            
            <!-- Column 1: To Do -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="kanban-column bg-white rounded-4 p-3 border shadow-xs d-flex flex-column h-100" data-status="todo">
                    <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                        <div class="d-flex align-items-center gap-2">
                            <span class="dot dot-todo"></span>
                            <h3 class="column-title h6 fw-bold mb-0 text-dark">To Do</h3>
                            <span class="column-badge badge-todo rounded-pill px-2 py-0.5 fs-8 fw-bold" id="colCountTodo">3</span>
                        </div>
                        <button class="btn btn-sm btn-light border btn-icon-sm text-muted btn-add-task-col rounded-3" data-status="todo" title="Add task to To Do">
                            <i class="fa-solid fa-plus fs-8"></i>
                        </button>
                    </div>
                    <div class="task-cards-list d-flex flex-column gap-3 flex-grow-1 min-vh-50" id="colListTodo" data-status="todo">
                        <!-- Dynamic Kanban Cards rendered via jQuery app.js -->
                    </div>
                </div>
            </div>

            <!-- Column 2: In Progress -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="kanban-column bg-white rounded-4 p-3 border shadow-xs d-flex flex-column h-100" data-status="in-progress">
                    <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                        <div class="d-flex align-items-center gap-2">
                            <span class="dot dot-progress"></span>
                            <h3 class="column-title h6 fw-bold mb-0 text-dark">In Progress</h3>
                            <span class="column-badge badge-progress rounded-pill px-2 py-0.5 fs-8 fw-bold" id="colCountProgress">3</span>
                        </div>
                        <button class="btn btn-sm btn-light border btn-icon-sm text-muted btn-add-task-col rounded-3" data-status="in-progress" title="Add task to In Progress">
                            <i class="fa-solid fa-plus fs-8"></i>
                        </button>
                    </div>
                    <div class="task-cards-list d-flex flex-column gap-3 flex-grow-1 min-vh-50" id="colListProgress" data-status="in-progress">
                        <!-- Dynamic Kanban Cards rendered via jQuery app.js -->
                    </div>
                </div>
            </div>

            <!-- Column 3: Review -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="kanban-column bg-white rounded-4 p-3 border shadow-xs d-flex flex-column h-100" data-status="review">
                    <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                        <div class="d-flex align-items-center gap-2">
                            <span class="dot dot-review"></span>
                            <h3 class="column-title h6 fw-bold mb-0 text-dark">Review</h3>
                            <span class="column-badge badge-review rounded-pill px-2 py-0.5 fs-8 fw-bold" id="colCountReview">3</span>
                        </div>
                        <button class="btn btn-sm btn-light border btn-icon-sm text-muted btn-add-task-col rounded-3" data-status="review" title="Add task to Review">
                            <i class="fa-solid fa-plus fs-8"></i>
                        </button>
                    </div>
                    <div class="task-cards-list d-flex flex-column gap-3 flex-grow-1 min-vh-50" id="colListReview" data-status="review">
                        <!-- Dynamic Kanban Cards rendered via jQuery app.js -->
                    </div>
                </div>
            </div>

            <!-- Column 4: Completed -->
            <div class="col-12 col-md-6 col-xl-3">
                <div class="kanban-column bg-white rounded-4 p-3 border shadow-xs d-flex flex-column h-100" data-status="completed">
                    <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                        <div class="d-flex align-items-center gap-2">
                            <span class="dot dot-complete"></span>
                            <h3 class="column-title h6 fw-bold mb-0 text-dark">Completed</h3>
                            <span class="column-badge badge-complete rounded-pill px-2 py-0.5 fs-8 fw-bold" id="colCountComplete">2</span>
                        </div>
                        <button class="btn btn-sm btn-light border btn-icon-sm text-muted btn-add-task-col rounded-3" data-status="completed" title="Add task to Completed">
                            <i class="fa-solid fa-plus fs-8"></i>
                        </button>
                    </div>
                    <div class="task-cards-list d-flex flex-column gap-3 flex-grow-1 min-vh-50" id="colListComplete" data-status="completed">
                        <!-- Dynamic Kanban Cards rendered via jQuery app.js -->
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ----------------------------------------------------------------------- -->
    <!-- VIEW 2: UNIFIED BOARD & LIST VIEW                                       -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="view-content" id="viewBoardList">
        <div class="card shadow-sm border rounded-4 p-4 bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 pb-3 border-bottom">
                <div>
                    <h2 class="h5 fw-bold text-dark mb-1">Board & List Tasks View</h2>
                    <span class="fs-8 text-muted">Switch between interactive grid cards and structured tabular task data.</span>
                </div>
                <!-- Subtabs Toggle: Board vs List -->
                <div class="nav nav-pills board-list-subtabs p-1 bg-light rounded-3 border" id="boardListSubTabs">
                    <button class="nav-link active bl-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="board">
                        <i class="fa-solid fa-table-cells-large me-1"></i> Grid Board
                    </button>
                    <button class="nav-link bl-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="list">
                        <i class="fa-solid fa-list-ul me-1"></i> Table List
                    </button>
                </div>
            </div>

            <!-- Subview 1: Board Grid -->
            <div class="board-list-subview active" id="subviewBoardGrid">
                <div class="row g-4" id="boardGridContainer">
                    <!-- Dynamic Grid Cards rendered by jQuery -->
                </div>
            </div>

            <!-- Subview 2: List Table -->
            <div class="board-list-subview" id="subviewListTable">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 list-table">
                        <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                            <tr>
                                <th scope="col" class="py-3 px-4">Task Name</th>
                                <th scope="col" class="py-3 px-4">Status</th>
                                <th scope="col" class="py-3 px-4">Tags</th>
                                <th scope="col" class="py-3 px-4">Progress</th>
                                <th scope="col" class="py-3 px-4">Assignees</th>
                                <th scope="col" class="py-3 px-4 text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="listTableBody" class="fs-7">
                            <!-- Dynamic Table Rows rendered by jQuery -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------------------------------------------------------- -->
    <!-- VIEW 3: CALENDAR & TIMELINE VIEW                                        -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="view-content" id="viewCalendar">
        <div class="card shadow-sm border rounded-4 p-4 calendar-wrapper bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 pb-3 border-bottom">
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <h2 class="h5 fw-bold mb-0 text-dark" id="calendarMonthTitle">September 2026</h2>

                    <!-- Subtabs Toggle: Calendar Grid vs Gantt Timeline vs Timeline Scheduler Manager -->
                    <div class="nav nav-pills calendar-subtabs p-1 bg-light rounded-3 border" id="calendarSubTabs">
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
                        <button class="btn btn-outline-secondary" id="btnPrevMonth" title="Previous Month"><i class="fa-solid fa-chevron-left"></i></button>
                        <button class="btn btn-outline-secondary fw-semibold" id="btnToday">Today</button>
                        <button class="btn btn-outline-secondary" id="btnNextMonth" title="Next Month"><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                    <button class="btn btn-sm btn-primary fw-semibold rounded-3 d-flex align-items-center gap-1.5 px-3 py-1.5 shadow-sm" id="btnQuickAddTaskFromCal">
                        <i class="fa-solid fa-plus"></i> New Task Timeline
                    </button>
                </div>
            </div>

            <!-- Subview 1: Calendar Grid -->
            <div class="calendar-subview-content active" id="subviewGrid">
                <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                    <span class="fs-8 text-muted fw-semibold"><i class="fa-solid fa-circle-info text-primary me-1"></i> Click on any task to view or modify its scheduled timeline.</span>
                    <div class="d-flex align-items-center gap-3 fs-8">
                        <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-todo p-1 rounded-circle"></span> To Do</span>
                        <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-progress p-1 rounded-circle"></span> In Progress</span>
                        <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-review p-1 rounded-circle"></span> Review</span>
                        <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-complete p-1 rounded-circle"></span> Completed</span>
                    </div>
                </div>
                <div class="calendar-grid d-grid gap-2" id="calendarGrid" style="grid-template-columns: repeat(7, 1fr);">
                    <!-- Dynamic Calendar Cells rendered by jQuery -->
                </div>
            </div>

            <!-- Subview 2: Timeline Schedule (Gantt) -->
            <div class="calendar-subview-content" id="subviewTimeline">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3 p-2.5 bg-light rounded-3 border">
                    <div class="d-flex align-items-center gap-2">
                        <span class="fs-8 fw-bold text-uppercase text-muted">Timeline Filter:</span>
                        <select class="form-select form-select-sm fs-8 w-auto py-1" id="timelineStatusFilter">
                            <option value="all">All Statuses</option>
                            <option value="todo">To Do</option>
                            <option value="in-progress">In Progress</option>
                            <option value="review">Review</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div class="fs-8 text-muted">
                        <span><i class="fa-solid fa-arrows-left-right me-1 text-primary"></i> Bars reflect realistic task duration & completion progress</span>
                    </div>
                </div>

                <div class="timeline-container p-1">
                    <div class="timeline-header d-flex align-items-center border-bottom pb-2 mb-3 fw-bold text-muted fs-8 text-uppercase">
                        <div style="width: 280px; flex-shrink: 0;">Task, Timeline & Priority</div>
                        <div class="flex-grow-1 d-flex justify-content-between text-center px-3">
                            <span class="w-25">Sep 1 - 7</span>
                            <span class="w-25">Sep 8 - 14</span>
                            <span class="w-25">Sep 15 - 21</span>
                            <span class="w-25">Sep 22 - 30</span>
                        </div>
                        <div style="width: 140px; flex-shrink: 0;" class="text-end">Assignees & Actions</div>
                    </div>
                    <div class="timeline-body d-flex flex-column gap-2" id="timelineTasksList">
                        <!-- Dynamic Timeline Rows rendered via jQuery -->
                    </div>
                </div>
            </div>

            <!-- Subview 3: Task Timeline Scheduler / Configurator -->
            <div class="calendar-subview-content" id="subviewScheduleManager">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3 p-3 bg-primary-subtle rounded-3 border border-primary-subtle">
                    <div>
                        <h6 class="fw-bold text-primary mb-1"><i class="fa-solid fa-sliders me-1"></i> Per-Task Timeline & Schedule Manager</h6>
                        <p class="fs-8 text-secondary mb-0">Atur langsung tanggal mulai (Start Date), batas waktu (Due Date), durasi hari, dan prioritas untuk setiap task.</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-sm btn-outline-primary bg-white fs-8 fw-semibold" id="btnSyncAllTimelines">
                            <i class="fa-solid fa-rotate me-1"></i> Reset to Default Timeline
                        </button>
                    </div>
                </div>

                <div class="table-responsive border rounded-3 bg-white">
                    <table class="table table-hover align-middle mb-0 timeline-schedule-table">
                        <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                            <tr>
                                <th class="py-3 px-3" style="min-width: 240px;">Task Title</th>
                                <th class="py-3 px-2" style="width: 120px;">Status</th>
                                <th class="py-3 px-2" style="width: 110px;">Priority</th>
                                <th class="py-3 px-2" style="min-width: 140px;">Start Date</th>
                                <th class="py-3 px-2" style="min-width: 140px;">Due Date</th>
                                <th class="py-3 px-2" style="width: 90px;">Duration</th>
                                <th class="py-3 px-2" style="min-width: 130px;">Quick Preset</th>
                                <th class="py-3 px-3 text-end" style="width: 120px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="timelineSchedulerTableBody" class="fs-7">
                            <!-- Dynamic rows for editing per-task timeline rendered by jQuery -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------------------------------------------------------- -->
    <!-- VIEW 4: SPRINT ANALYTICS & DASHBOARD VIEW                               -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="view-content" id="viewDashboard">
        <!-- Stat Cards Grid -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card shadow-sm border rounded-4 p-3 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div>
                            <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Total Tasks</span>
                            <h3 class="h4 fw-extrabold mb-0" id="dashTotalTasks">11</h3>
                        </div>
                        <div class="stat-icon bg-primary-subtle text-primary rounded-3 p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="fa-solid fa-list-check fs-4"></i>
                        </div>
                    </div>
                    <span class="fs-8 text-success fw-semibold d-inline-flex align-items-center gap-1">
                        <i class="fa-solid fa-arrow-trend-up"></i> +12% from last sprint
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
                        <div class="stat-icon bg-success-subtle text-success rounded-3 p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
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
                        <div class="stat-icon bg-info-subtle text-info rounded-3 p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
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
                        <div class="stat-icon bg-warning-subtle text-warning rounded-3 p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="fa-solid fa-users fs-4"></i>
                        </div>
                    </div>
                    <span class="fs-8 text-muted fw-semibold">4 active contributors</span>
                </div>
            </div>
        </div>

        <!-- Charts & Activity Row -->
        <div class="row g-4">
            <div class="col-12 col-lg-7">
                <div class="card shadow-sm border rounded-4 p-4 bg-white h-100">
                    <h2 class="h6 fw-bold mb-3 text-dark">Task Status Distribution</h2>
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
                    <h2 class="h6 fw-bold mb-3 text-dark">Recent Activity Feed</h2>
                    <div class="activity-feed d-flex flex-column gap-3 fs-7">
                        <div class="d-flex gap-2.5 align-items-start">
                            <span class="badge rounded-circle bg-success p-2 mt-0.5"><i class="fa-solid fa-check fs-8 text-white"></i></span>
                            <div>
                                <span class="fw-bold text-dark">Database Schema Setup</span> marked complete.
                                <span class="d-block fs-8 text-muted">2 hours ago &bull; by James Wilson</span>
                            </div>
                        </div>
                        <div class="d-flex gap-2.5 align-items-start">
                            <span class="badge rounded-circle bg-primary p-2 mt-0.5"><i class="fa-solid fa-plus fs-8 text-white"></i></span>
                            <div>
                                <span class="fw-bold text-dark">User Registration Flow</span> status moved to In Progress.
                                <span class="d-block fs-8 text-muted">4 hours ago &bull; by Daniel Johnson</span>
                            </div>
                        </div>
                        <div class="d-flex gap-2.5 align-items-start">
                            <span class="badge rounded-circle bg-warning p-2 mt-0.5"><i class="fa-solid fa-comment fs-8 text-white"></i></span>
                            <div>
                                <span class="fw-bold text-dark">Michael Anderson</span> added feedback on Homepage UI.
                                <span class="d-block fs-8 text-muted">Yesterday &bull; 3 comments</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------------------------------------------------------- -->
    <!-- VIEW 5: DOCUMENTATION REPOSITORY & FILE UPLOAD                          -->
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
                            <h2 class="h5 fw-bold mb-0 text-dark">Project Documentation & Asset Repository</h2>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold">Synchronized Hub</span>
                        </div>
                        <span class="fs-8 text-muted mt-0.5 d-block">Pusat master spesifikasi BRD, FSD, PRD, ERD, Blueprint, UI/UX asset, serta arsip file dokumen terintegrasi langsung dengan Track Versioning.</span>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <button class="btn btn-sm btn-primary rounded-3 d-flex align-items-center gap-2 px-3 py-2 fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#uploadTaskDocModal">
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

        <!-- Drag & Drop Upload Quick Zone -->
        <div class="card shadow-sm border rounded-4 p-4 bg-white mb-4">
            <div class="p-4 border-2 border-dashed rounded-4 text-center bg-light-subtle cursor-pointer doc-dropzone" id="quickTaskDocDropzone">
                <div class="d-flex flex-column align-items-center justify-content-center py-2">
                    <div class="p-3 bg-primary-subtle text-primary rounded-circle mb-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-cloud-arrow-up fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark fs-6 mb-1">Drag & drop berkas dokumentasi Anda ke sini</h5>
                    <p class="text-muted fs-8 mb-3">Mendukung semua format berkas: PDF, DOCX, XLSX, PPTX, PNG, JPG, SVG, ZIP, RAR, TXT, MD, DRAWIO, SQL (Maks. 100MB per file)</p>
                    <button type="button" class="btn btn-sm btn-primary rounded-3 px-4 py-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#uploadTaskDocModal">
                        <i class="fa-solid fa-folder-open me-1.5"></i> Pilih Berkas untuk Diunggah
                    </button>
                </div>
            </div>
        </div>

        <!-- Master Documentation Files Repository Table -->
        <div class="card shadow-sm border rounded-4 bg-white overflow-hidden mb-4">
            <!-- Filter & Toolbar Header -->
            <div class="card-header bg-white border-bottom p-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <h5 class="h6 fw-bold mb-0 text-dark"><i class="fa-solid fa-folder-tree text-primary me-1.5"></i> Uploaded Repository Files</h5>
                    <span class="badge bg-light text-muted border fs-8" id="taskDocTotalCountBadge">0 Total Files</span>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-2">
                    <!-- Live Search Input -->
                    <div class="input-group input-group-sm" style="min-width: 220px;">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass fs-8"></i></span>
                        <input type="text" class="form-control border-start-0 fs-8" id="taskDocFileSearchInput" placeholder="Cari nama dokumen, tipe, uploader...">
                    </div>

                    <!-- Category Filter Selector -->
                    <select class="form-select form-select-sm fs-8 w-auto" id="taskDocFileCategoryFilter">
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
                    <button class="btn btn-sm btn-primary rounded-3 px-3 fs-8 fw-semibold d-flex align-items-center gap-1.5" data-bs-toggle="modal" data-bs-target="#uploadTaskDocModal">
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
                            <th class="py-3" style="width: 150px;">Kategori</th>
                            <th class="py-3" style="width: 100px;">Versi</th>
                            <th class="py-3" style="width: 160px;">Uploader & Tanggal</th>
                            <th class="py-3" style="width: 110px;">Ukuran</th>
                            <th class="pe-4 py-3 text-end" style="width: 130px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="fs-7" id="taskDocFilesTableBody">
                        <!-- Dynamic File Rows rendered by JS -->
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex flex-column gap-4">
            <!-- 1. BRD Box -->
            <div class="card shadow-sm border rounded-4 bg-white overflow-hidden" id="doc-brd">
                <div class="card-header bg-white border-bottom p-3 d-flex align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="doc-icon-box doc-icon-word shadow-xs">
                            <i class="fa-solid fa-file-invoice"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fs-6 fw-bold text-dark">Business Requirements Document (BRD)</h5>
                            <span class="fs-8 text-muted">Kebutuhan bisnis, scope baseline, dan kepatuhan enterprise</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-light text-muted border font-mono fs-8" id="docCount_brd">0 Items</span>
                        <a href="Documentation/BRD.php" class="btn btn-sm btn-outline-primary rounded-3 fs-8 fw-semibold">
                            Buka Master BRD <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="list-group list-group-flush border-0" id="docList_brd">
                    <!-- Dynamic BRD Documents from DocTracker -->
                </div>
            </div>

            <!-- 2. FSD Box -->
            <div class="card shadow-sm border rounded-4 bg-white overflow-hidden" id="doc-fsd">
                <div class="card-header bg-white border-bottom p-3 d-flex align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="doc-icon-box doc-icon-code shadow-xs">
                            <i class="fa-solid fa-file-code"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fs-6 fw-bold text-dark">Functional Specification Document (FSD)</h5>
                            <span class="fs-8 text-muted">Spesifikasi logika teknis, arsitektur event, dan state machine</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-light text-muted border font-mono fs-8" id="docCount_fsd">0 Items</span>
                        <a href="Documentation/FSD.php" class="btn btn-sm btn-outline-success rounded-3 fs-8 fw-semibold">
                            Buka Master FSD <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="list-group list-group-flush border-0" id="docList_fsd">
                    <!-- Dynamic FSD Documents from DocTracker -->
                </div>
            </div>

            <!-- 3. PRD Box -->
            <div class="card shadow-sm border rounded-4 bg-white overflow-hidden" id="doc-prd">
                <div class="card-header bg-white border-bottom p-3 d-flex align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="doc-icon-box doc-icon-default shadow-xs">
                            <i class="fa-solid fa-rectangle-list"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fs-6 fw-bold text-dark">Product Requirements Document (PRD)</h5>
                            <span class="fs-8 text-muted">Fitur produk, user journey, acceptance criteria, dan roadmap</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-light text-muted border font-mono fs-8" id="docCount_prd">0 Items</span>
                        <a href="Documentation/PRD.php" class="btn btn-sm btn-outline-info rounded-3 fs-8 fw-semibold">
                            Buka Master PRD <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="list-group list-group-flush border-0" id="docList_prd">
                    <!-- Dynamic PRD Documents from DocTracker -->
                </div>
            </div>

            <!-- 4. ERD Box -->
            <div class="card shadow-sm border rounded-4 bg-white overflow-hidden" id="doc-erd">
                <div class="card-header bg-white border-bottom p-3 d-flex align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="doc-icon-box doc-icon-diagram shadow-xs">
                            <i class="fa-solid fa-diagram-project"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fs-6 fw-bold text-dark">Entity Relationship Diagram (ERD)</h5>
                            <span class="fs-8 text-muted">Struktur relasi tabel database, foreign keys, dan indeks skema</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-light text-muted border font-mono fs-8" id="docCount_erd">0 Items</span>
                        <a href="Documentation/ERD.php" class="btn btn-sm btn-outline-warning rounded-3 fs-8 fw-semibold">
                            Buka Master ERD <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="list-group list-group-flush border-0" id="docList_erd">
                    <!-- Dynamic ERD Documents from DocTracker -->
                </div>
            </div>

            <!-- 5. Blueprints Box -->
            <div class="card shadow-sm border rounded-4 bg-white overflow-hidden" id="doc-blueprints">
                <div class="card-header bg-white border-bottom p-3 d-flex align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="doc-icon-box doc-icon-blueprint shadow-xs">
                            <i class="fa-solid fa-cubes-stacked"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fs-6 fw-bold text-dark">Architecture & System Blueprints</h5>
                            <span class="fs-8 text-muted">Diagram infrastruktur cloud, CI/CD pipeline, dan topologi jaringan</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-light text-muted border font-mono fs-8" id="docCount_blueprint">0 Items</span>
                        <a href="Documentation/Blueprints.php" class="btn btn-sm btn-outline-danger rounded-3 fs-8 fw-semibold">
                            Buka Master Blueprints <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="list-group list-group-flush border-0" id="docList_blueprint">
                    <!-- Dynamic Blueprints Documents from DocTracker -->
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------------------------------------------------------- -->
    <!-- VIEW 6: TEAMS VIEW                                                      -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="view-content" id="viewTeams">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <div>
                <h2 class="h5 fw-bold mb-0 text-dark">Project Squad & Collaborators</h2>
                <span class="fs-8 text-muted">Manage assignees, engineering leads, and designer roles.</span>
            </div>
            <a href="Teams.php" class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 fs-7 shadow-sm">
                <i class="fa-solid fa-users"></i> Open Full Teams Hub
            </a>
        </div>

        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card shadow-sm border rounded-4 text-center p-4 bg-white h-100">
                    <div class="mb-3 position-relative d-inline-block mx-auto">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80" alt="Avatar" class="rounded-circle img-thumbnail shadow-sm" style="width: 76px; height: 76px; object-fit: cover;">
                        <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle p-1.5" title="Online"></span>
                    </div>
                    <h5 class="fs-6 fw-bold mb-0.5 text-dark">Sophia Carter</h5>
                    <p class="text-primary fs-8 fw-semibold mb-3">Project Lead & Architect</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="Messages.php?user=sophia" class="btn btn-light btn-sm rounded-circle border"><i class="fa-regular fa-comment-dots"></i></a>
                        <button class="btn btn-light btn-sm rounded-circle border"><i class="fa-solid fa-phone"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card shadow-sm border rounded-4 text-center p-4 bg-white h-100">
                    <div class="mb-3 position-relative d-inline-block mx-auto">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80" alt="Avatar" class="rounded-circle img-thumbnail shadow-sm" style="width: 76px; height: 76px; object-fit: cover;">
                        <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle p-1.5" title="Online"></span>
                    </div>
                    <h5 class="fs-6 fw-bold mb-0.5 text-dark">Michael Anderson</h5>
                    <p class="text-muted fs-8 fw-semibold mb-3">UI/UX Designer</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="Messages.php?user=michael" class="btn btn-light btn-sm rounded-circle border"><i class="fa-regular fa-comment-dots"></i></a>
                        <button class="btn btn-light btn-sm rounded-circle border"><i class="fa-solid fa-phone"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card shadow-sm border rounded-4 text-center p-4 bg-white h-100">
                    <div class="mb-3 position-relative d-inline-block mx-auto">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=150&q=80" alt="Avatar" class="rounded-circle img-thumbnail shadow-sm" style="width: 76px; height: 76px; object-fit: cover;">
                        <span class="position-absolute bottom-0 end-0 bg-warning border border-white rounded-circle p-1.5" title="Away"></span>
                    </div>
                    <h5 class="fs-6 fw-bold mb-0.5 text-dark">Daniel Johnson</h5>
                    <p class="text-muted fs-8 fw-semibold mb-3">Frontend Developer</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="Messages.php?user=daniel" class="btn btn-light btn-sm rounded-circle border"><i class="fa-regular fa-comment-dots"></i></a>
                        <button class="btn btn-light btn-sm rounded-circle border"><i class="fa-solid fa-phone"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card shadow-sm border rounded-4 text-center p-4 bg-white h-100">
                    <div class="mb-3 position-relative d-inline-block mx-auto">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80" alt="Avatar" class="rounded-circle img-thumbnail shadow-sm" style="width: 76px; height: 76px; object-fit: cover;">
                        <span class="position-absolute bottom-0 end-0 bg-secondary border border-white rounded-circle p-1.5" title="Offline"></span>
                    </div>
                    <h5 class="fs-6 fw-bold mb-0.5 text-dark">James Wilson</h5>
                    <p class="text-muted fs-8 fw-semibold mb-3">Backend & DB Lead</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="Messages.php?user=james" class="btn btn-light btn-sm rounded-circle border"><i class="fa-regular fa-comment-dots"></i></a>
                        <button class="btn btn-light btn-sm rounded-circle border"><i class="fa-solid fa-phone"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------------------------------------------------------- -->
    <!-- VIEW 7: SETTINGS VIEW (GRID LAYOUT)                                     -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="view-content" id="viewSettings">
        <div class="row g-4">
            <!-- Left Column: GitHub Repository & Account Configuration Card -->
            <div class="col-12 col-xl-6">
                <div class="card shadow-sm border rounded-4 p-4 bg-white h-100 d-flex flex-column justify-content-between" id="githubConfigCard">
                    <div>
                        <!-- Card Header -->
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 border-bottom pb-3 mb-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="p-3 bg-dark text-white rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 48px; height: 48px;">
                                    <i class="fa-brands fa-github fs-3"></i>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                        <h2 class="h5 fw-bold mb-0 text-dark">GitHub Repo & Account</h2>
                                        <span class="badge bg-success-subtle text-success border border-success-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold" id="cfgGhStatusBadge">
                                            <i class="fa-solid fa-circle-check text-success me-1"></i> Connected
                                        </span>
                                    </div>
                                    <span class="text-muted fs-8">Commit stream, push events, & task sync</span>
                                </div>
                            </div>
                            <a href="https://github.com/settings/tokens" target="_blank" class="btn btn-sm btn-outline-secondary rounded-3 fs-8 fw-semibold" title="Generate New GitHub Personal Access Token">
                                <i class="fa-solid fa-key me-1"></i> PAT Token <i class="fa-solid fa-arrow-up-right-from-square fs-9 ms-0.5"></i>
                            </a>
                        </div>

                        <!-- Card Form -->
                        <form id="formGithubConfig">
                            <div class="row g-3 mb-3">
                                <!-- GitHub Owner / Username -->
                                <div class="col-12 col-sm-6">
                                    <label for="cfgGhOwner" class="form-label fs-7 fw-semibold text-dark">
                                        <i class="fa-regular fa-user text-primary me-1"></i> Owner / Org *
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-light text-muted"><i class="fa-solid fa-at fs-8"></i></span>
                                        <input type="text" class="form-control fs-7" id="cfgGhOwner" placeholder="e.g. irsjrhr" value="irsjrhr" required>
                                    </div>
                                    <span class="fs-8 text-muted mt-1 d-block">Username / organisasi GitHub.</span>
                                </div>

                                <!-- GitHub Repository Name -->
                                <div class="col-12 col-sm-6">
                                    <label for="cfgGhRepo" class="form-label fs-7 fw-semibold text-dark">
                                        <i class="fa-solid fa-book-bookmark text-primary me-1"></i> Repository *
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-light text-muted"><i class="fa-brands fa-git-alt fs-8"></i></span>
                                        <input type="text" class="form-control fs-7" id="cfgGhRepo" placeholder="e.g. MOCKUP_KANBAN_PROJECT" value="MOCKUP_KANBAN_PROJECT" required>
                                    </div>
                                    <span class="fs-8 text-muted mt-1 d-block">Slug repository remote.</span>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <!-- Default Branch -->
                                <div class="col-12 col-sm-6">
                                    <label for="cfgGhBranch" class="form-label fs-7 fw-semibold text-dark">
                                        <i class="fa-solid fa-code-branch text-info me-1"></i> Active Branch
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-light text-muted"><i class="fa-solid fa-code-fork fs-8"></i></span>
                                        <input type="text" class="form-control fs-7 font-monospace" id="cfgGhBranch" placeholder="e.g. main" value="main">
                                    </div>
                                    <span class="fs-8 text-muted mt-1 d-block">Branch stream yang dipantau.</span>
                                </div>

                                <!-- Auto Sync Interval -->
                                <div class="col-12 col-sm-6">
                                    <label for="cfgGhAutoSync" class="form-label fs-7 fw-semibold text-dark">
                                        <i class="fa-solid fa-arrows-rotate text-success me-1"></i> Auto-Sync
                                    </label>
                                    <select class="form-select form-select-sm fs-7" id="cfgGhAutoSync">
                                        <option value="manual">Manual Refresh</option>
                                        <option value="60" selected>Every 1 Min (Live)</option>
                                        <option value="300">Every 5 Minutes</option>
                                        <option value="900">Every 15 Minutes</option>
                                    </select>
                                    <span class="fs-8 text-muted mt-1 d-block">Interval fetch commit API.</span>
                                </div>
                            </div>

                            <!-- Personal Access Token (PAT) -->
                            <div class="mb-3">
                                <label for="cfgGhToken" class="form-label fs-7 fw-semibold text-dark d-flex align-items-center justify-content-between">
                                    <span><i class="fa-solid fa-shield-halved text-warning me-1"></i> Personal Access Token (PAT)</span>
                                    <span class="badge bg-light text-muted border fs-9">Private / High Rate-Limit</span>
                                </label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-light text-muted"><i class="fa-solid fa-key fs-8"></i></span>
                                    <input type="password" class="form-control fs-7 font-monospace" id="cfgGhToken" placeholder="ghp_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" value="">
                                    <button class="btn btn-outline-secondary" type="button" id="btnToggleTokenVisibility" title="Toggle visibility">
                                        <i class="fa-solid fa-eye fs-8" id="iconTokenVisibility"></i>
                                    </button>
                                </div>
                                <span class="fs-8 text-muted mt-1 d-block">
                                    <i class="fa-solid fa-circle-info text-primary me-1"></i>
                                    Tersimpan aman di LocalStorage untuk rate-limit 5.000 req/jam.
                                </span>
                            </div>

                            <!-- Webhook & Automation Rules -->
                            <div class="p-3 bg-light rounded-3 mb-4 border">
                                <h4 class="fs-7 fw-bold text-dark mb-2.5"><i class="fa-solid fa-sliders text-secondary me-1.5"></i> Stream & Webhook Automation</h4>
                                <div class="form-check form-switch mb-2 fs-7">
                                    <input class="form-check-input" type="checkbox" id="chkGhLinkTasks" checked>
                                    <label class="form-check-label fw-medium text-dark" for="chkGhLinkTasks">
                                        Tautkan commit <code>#ID</code> ke task Kanban
                                    </label>
                                </div>
                                <div class="form-check form-switch mb-2 fs-7">
                                    <input class="form-check-input" type="checkbox" id="chkGhAutoRefreshEvents" checked>
                                    <label class="form-check-label fw-medium text-dark" for="chkGhAutoRefreshEvents">
                                        Auto-refresh stream saat ada push baru
                                    </label>
                                </div>
                                <div class="form-check form-switch fs-7">
                                    <input class="form-check-input" type="checkbox" id="chkGhNotifyChannel" checked>
                                    <label class="form-check-label fw-medium text-dark" for="chkGhNotifyChannel">
                                        Notifikasi ke chat <code>#middleware-core</code>
                                    </label>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 border-top pt-3">
                                <button type="button" class="btn btn-outline-info btn-sm px-3 fw-semibold rounded-3 d-flex align-items-center gap-1.5" id="btnTestGhConnection">
                                    <i class="fa-solid fa-bolt"></i> Test Live
                                </button>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="https://github.com/irsjrhr/MOCKUP_KANBAN_PROJECT" target="_blank" class="btn btn-outline-secondary btn-sm px-3 rounded-3" id="btnGhExternalDirect">
                                        <i class="fa-brands fa-github me-1"></i> Open Repo
                                    </a>
                                    <button type="submit" class="btn btn-dark btn-sm px-3.5 fw-semibold rounded-3 d-flex align-items-center gap-1.5 shadow-sm" id="btnSaveGhConfig">
                                        <i class="fa-solid fa-floppy-disk"></i> Save GitHub
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column: Project Settings & General Preferences Card -->
            <div class="col-12 col-xl-6">
                <div class="card shadow-sm border rounded-4 p-4 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Card Header -->
                        <div class="d-flex align-items-center justify-content-between gap-3 border-bottom pb-3 mb-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="p-3 bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 48px; height: 48px;">
                                    <i class="fa-solid fa-gear fs-4"></i>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center gap-2">
                                        <h2 class="h5 fw-bold mb-0 text-dark">Project Preferences</h2>
                                        <span class="badge bg-primary-subtle text-primary fs-8 px-2 py-0.5 rounded-2 fw-semibold">Workspace</span>
                                    </div>
                                    <span class="text-muted fs-7">Manage project info, category, and alerts</span>
                                </div>
                            </div>
                            <span class="badge bg-light text-dark border fs-8 px-2.5 py-1.5 rounded-3 font-monospace">SYNC-MDW</span>
                        </div>

                        <!-- Card Form -->
                        <form id="settingsForm">
                            <div class="row g-3 mb-3">
                                <div class="col-12 col-sm-8">
                                    <label for="setProjTitle" class="form-label fs-7 fw-semibold text-dark">
                                        <i class="fa-solid fa-heading text-primary me-1"></i> Project Name *
                                    </label>
                                    <input type="text" class="form-control fs-7" id="setProjTitle" value="Middleware Project" required>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <label for="setProjCode" class="form-label fs-7 fw-semibold text-dark">
                                        <i class="fa-solid fa-tag text-info me-1"></i> Project Key
                                    </label>
                                    <input type="text" class="form-control fs-7 font-monospace text-uppercase" id="setProjCode" value="MDW" readonly>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-12 col-sm-6">
                                    <label for="setProjCategory" class="form-label fs-7 fw-semibold text-dark">
                                        <i class="fa-solid fa-layer-group text-primary me-1"></i> Category
                                    </label>
                                    <select class="form-select fs-7" id="setProjCategory">
                                        <option value="ecommerce" selected>E-Commerce / API Services</option>
                                        <option value="website">Corporate Website</option>
                                        <option value="mobile">Mobile Application</option>
                                        <option value="design">Graphic & UI/UX Design</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="setProjLead" class="form-label fs-7 fw-semibold text-dark">
                                        <i class="fa-solid fa-user-tie text-success me-1"></i> Project Lead
                                    </label>
                                    <select class="form-select fs-7" id="setProjLead">
                                        <option value="Sophia Carter" selected>Sophia Carter (Lead Architect)</option>
                                        <option value="Jenno Wilson">Jenno Wilson (Tech Lead)</option>
                                        <option value="Sarah Chen">Sarah Chen (Senior Backend)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="setProjDesc" class="form-label fs-7 fw-semibold text-dark">
                                    <i class="fa-solid fa-align-left text-secondary me-1"></i> Project Overview
                                </label>
                                <textarea class="form-control fs-7" id="setProjDesc" rows="2.5" placeholder="Enter brief overview...">Middleware and E-Commerce project management system for Syncboard Company.</textarea>
                            </div>

                            <div class="p-3 bg-light rounded-3 mb-4 border">
                                <h3 class="fs-7 fw-bold mb-2.5 text-dark"><i class="fa-regular fa-bell text-secondary me-1.5"></i> Notification & Alert Preferences</h3>
                                <div class="form-check form-switch mb-2 fs-7">
                                    <input class="form-check-input" type="checkbox" id="chkNotifyEmail" checked>
                                    <label class="form-check-label fw-medium text-dark" for="chkNotifyEmail">Kirim email notifikasi pada update prioritas task</label>
                                </div>
                                <div class="form-check form-switch mb-2 fs-7">
                                    <input class="form-check-input" type="checkbox" id="chkNotifyDaily" checked>
                                    <label class="form-check-label fw-medium text-dark" for="chkNotifyDaily">Aktifkan ringkasan daily digest jam 08:00 WIB</label>
                                </div>
                                <div class="form-check form-switch fs-7">
                                    <input class="form-check-input" type="checkbox" id="chkNotifySlack" checked>
                                    <label class="form-check-label fw-medium text-dark" for="chkNotifySlack">Integrasi webhook alert ke monitoring dashboard</label>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end gap-2 border-top pt-3">
                                <button type="button" class="btn btn-outline-secondary px-3.5 fs-7 rounded-3">Reset</button>
                                <button type="submit" class="btn btn-primary px-4 fs-7 fw-semibold rounded-3 shadow-sm">Save Preferences</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------------------------------------------------------- -->
    <!-- VIEW 8: GITHUB HISTORICAL COMMIT STREAM                                 -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="view-content" id="viewGithub">
        <div class="card shadow-sm border rounded-4 bg-white p-3 px-4 mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-dark text-white p-2.5 d-flex align-items-center justify-content-center shadow-sm" style="width: 44px; height: 44px;">
                        <i class="fa-brands fa-github fs-3"></i>
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <h2 class="h6 fw-extrabold text-dark mb-0 font-monospace" id="ghRepoFullName">irsjrhr / MOCKUP_KANBAN_PROJECT</h2>
                            <span class="badge bg-light text-dark border px-2 py-0.5 fs-8 fw-bold" id="ghDefaultBranchBadge"><i class="fa-solid fa-code-branch text-primary me-1"></i>main</span>
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-0.5 fs-8 fw-semibold" id="ghConnStatusBadge"><i class="fa-solid fa-circle text-success fs-9 me-1"></i>Connected</span>
                        </div>
                        <span class="text-muted fs-8">Historical commits, branch stream, and push events tracking.</span>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-sm btn-primary rounded-3 fs-7 fw-semibold d-inline-flex align-items-center gap-1.5 px-3" id="btnRefreshGithub">
                        <i class="fa-solid fa-rotate" id="refreshGhIcon"></i> Sync Data
                    </button>
                    <a href="https://github.com/irsjrhr/MOCKUP_KANBAN_PROJECT" target="_blank" class="btn btn-sm btn-dark rounded-3 fs-7 fw-semibold" id="btnExternalGhRepo">
                        <i class="fa-brands fa-github me-1"></i> GitHub <i class="fa-solid fa-arrow-up-right-from-square fs-9 ms-0.5"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content Card with Subtabs -->
        <div class="card shadow-sm border rounded-4 bg-white p-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 pb-3 border-bottom mb-4">
                <div class="nav nav-pills gap-2" id="githubSubTabs">
                    <button class="nav-link active gh-subtab-btn fw-semibold py-2 px-3 rounded-3 fs-7" data-subtab="commits">
                        <i class="fa-solid fa-code-commit me-1"></i> Commit History
                        <span class="badge bg-primary ms-1" id="ghCommitBadgeCount">0</span>
                    </button>
                    <button class="nav-link gh-subtab-btn fw-semibold py-2 px-3 rounded-3 fs-7" data-subtab="pushes">
                        <i class="fa-solid fa-cloud-arrow-up me-1"></i> Push Activity & Events
                    </button>
                    <button class="nav-link gh-subtab-btn fw-semibold py-2 px-3 rounded-3 fs-7" data-subtab="compare">
                        <i class="fa-solid fa-code-compare me-1"></i> Compare Diff
                    </button>
                    <button class="nav-link gh-subtab-btn fw-semibold py-2 px-3 rounded-3 fs-7" data-subtab="stats">
                        <i class="fa-solid fa-chart-line me-1"></i> Activity & Contributors
                    </button>
                </div>

                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <div class="input-group input-group-sm" style="width: 220px;">
                        <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-code-branch text-muted"></i></span>
                        <select class="form-select border-start-0 fs-7 fw-semibold" id="ghBranchSelect">
                            <option value="main" selected>branch: main</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Subtab 1: Commit History -->
            <div class="gh-subtab-content active" id="ghContentCommits">
                <div class="commits-timeline-container d-flex flex-column gap-3" id="ghCommitsList">
                    <div class="text-center py-5 text-muted">
                        <div class="spinner-border spinner-border-sm text-primary mb-2" role="status"></div>
                        <p class="fs-7 mb-0">Loading commit logs from GitHub...</p>
                    </div>
                </div>
            </div>

            <!-- Subtab 2: Push Events -->
            <div class="gh-subtab-content d-none" id="ghContentPushes">
                <div class="pushes-stream-container d-flex flex-column gap-3" id="ghPushesList">
                    <!-- Injected via jQuery -->
                </div>
            </div>

            <!-- Subtab 3: Compare Diff -->
            <div class="gh-subtab-content d-none" id="ghContentCompare">
                <div id="ghCompareResults">
                    <div class="text-center py-4 text-muted fs-7">
                        Pilih base dan head revision lalu klik <strong>Compare</strong> untuk melihat perbandingan diff.
                    </div>
                </div>
            </div>

            <!-- Subtab 4: Stats -->
            <div class="gh-subtab-content d-none" id="ghContentStats">
                <div class="row g-4">
                    <div class="col-12 col-lg-6">
                        <div class="p-3 bg-light rounded-4 border h-100">
                            <h3 class="h6 fw-bold mb-3 text-dark"><i class="fa-solid fa-chart-simple text-primary me-2"></i>Commit Activity Statistics</h3>
                            <div class="commit-stats-bars d-flex align-items-end gap-2 justify-content-between p-3 bg-white rounded-3 border" style="height: 160px;" id="ghStatsBars"></div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="p-3 bg-light rounded-4 border h-100">
                            <h3 class="h6 fw-bold mb-3 text-dark"><i class="fa-solid fa-users text-success me-2"></i>Repository Contributors</h3>
                            <div class="d-flex flex-column gap-2" id="ghContributorsList"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- =========================================================================== -->
<!-- 4. MODALS & POPUPS                                                          -->
<!-- =========================================================================== -->

<!-- Modal: Create / Edit Task -->
<div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="modalTaskHeading" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg p-2">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-dark" id="modalTaskHeading">Create New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="taskForm">
                <div class="modal-body">
                    <input type="hidden" id="taskId">
                    <div class="mb-3">
                        <label for="taskTitle" class="form-label fs-7 fw-semibold text-dark">Task Title *</label>
                        <input type="text" class="form-control fs-7" id="taskTitle" placeholder="e.g. Homepage UI Design Draft" required>
                    </div>
                    <div class="mb-3">
                        <label for="taskDescription" class="form-label fs-7 fw-semibold text-dark">Description</label>
                        <textarea class="form-control fs-7" id="taskDescription" rows="3" placeholder="Briefly describe the task goals..."></textarea>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label for="taskStatus" class="form-label fs-7 fw-semibold text-dark">Status / Column</label>
                            <select class="form-select fs-7" id="taskStatus" required>
                                <option value="todo">To Do</option>
                                <option value="in-progress">In Progress</option>
                                <option value="review">Review</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="taskPriority" class="form-label fs-7 fw-semibold text-dark">Priority Level</label>
                            <select class="form-select fs-7" id="taskPriority">
                                <option value="low">Low Priority</option>
                                <option value="medium" selected>Medium Priority</option>
                                <option value="high">High Priority</option>
                                <option value="urgent">Urgent / SLA Alert</option>
                            </select>
                        </div>
                    </div>

                    <!-- Timeline Schedule: Start Date & Due Date -->
                    <div class="row g-3 mb-3 p-2 bg-light-subtle rounded-3 border">
                        <div class="col-6">
                            <label for="taskStartDate" class="form-label fs-8 fw-bold text-uppercase text-muted mb-1">
                                <i class="fa-regular fa-calendar-plus text-primary me-1"></i> Start Date
                            </label>
                            <input type="date" class="form-control form-control-sm fs-7" id="taskStartDate" value="2026-09-01">
                        </div>
                        <div class="col-6">
                            <label for="taskDueDate" class="form-label fs-8 fw-bold text-uppercase text-muted mb-1">
                                <i class="fa-regular fa-calendar-check text-danger me-1"></i> Due Date
                            </label>
                            <input type="date" class="form-control form-control-sm fs-7" id="taskDueDate" value="2026-09-15">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="taskTagsInput" class="form-label fs-7 fw-semibold text-dark">Tags (comma separated)</label>
                        <input type="text" class="form-control fs-7" id="taskTagsInput" placeholder="Design UI/UX, Frontend">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fs-7 fw-semibold text-dark">Assign Team Members</label>
                        <div class="row g-2" id="memberSelectorGrid">
                            <!-- Dynamic Checkboxes via jQuery -->
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fs-7 fw-semibold text-dark">Subtasks</label>
                        <div class="d-flex flex-column gap-2" id="subtaskInputsList">
                            <!-- Dynamic subtask inputs -->
                        </div>
                        <button type="button" class="btn btn-sm btn-light border mt-2 fs-8 fw-semibold" id="btnAddSubtaskInput">
                            <i class="fa-solid fa-plus me-1"></i> Add Subtask Item
                        </button>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary px-3 fs-7" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4 fs-7 fw-semibold" id="btnSaveTask">Save Task</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Task Detail & Comments View -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg p-3">
            <div class="modal-header border-0 pb-0 d-flex align-items-center justify-content-between">
                <div class="detail-header-tags d-flex flex-wrap gap-1" id="detailTags">
                    <!-- Dynamic Tags -->
                </div>
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-sm btn-light text-secondary border" id="btnEditTaskFromDetail" title="Edit Task"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-sm btn-light text-danger border" id="btnDeleteTaskFromDetail" title="Delete Task"><i class="fa-solid fa-trash-can"></i></button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>

            <div class="modal-body">
                <div class="row g-4">
                    <div class="col-12 col-md-8">
                        <h2 class="h4 fw-bold text-dark mb-2" id="detailTitle">Task Title</h2>
                        <p class="text-secondary fs-7 mb-4" id="detailDesc">Task description details go here...</p>

                        <!-- Subtask Checklist -->
                        <div class="subtasks-section mb-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h3 class="h6 fw-bold mb-0 text-dark">Checklist Subtasks</h3>
                                <span class="fs-8 text-muted fw-semibold" id="detailSubtaskProgressText">2 of 4 completed</span>
                            </div>
                            <div class="progress mb-3" style="height: 8px;">
                                <div class="progress-bar bg-primary" id="detailProgressFill" role="progressbar" style="width: 50%;"></div>
                            </div>
                            <ul class="list-group list-group-flush subtask-checklist fs-7" id="detailSubtasksChecklist">
                                <!-- Dynamic checklist -->
                            </ul>
                        </div>

                        <!-- Comments Stream -->
                        <div class="comments-section">
                            <h3 class="h6 fw-bold mb-3 text-dark">Activity & Comments</h3>
                            <div class="comments-list d-flex flex-column gap-2 mb-3 overflow-y-auto" id="commentsList" style="max-height: 200px;">
                                <!-- Dynamic Comments -->
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 p-1">
                                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&q=80" class="avatar-sm rounded-circle" alt="User">
                                </span>
                                <input type="text" class="form-control border-start-0 border-end-0 fs-7" id="newCommentInput" placeholder="Write a comment or update...">
                                <button class="btn btn-primary px-3 fs-7" id="btnSendComment"><i class="fa-solid fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 border-start-md">
                        <div class="mb-3">
                            <label class="form-label fs-8 text-uppercase fw-bold text-muted mb-1">Status</label>
                            <select id="detailStatusSelect" class="form-select form-select-sm fs-7 fw-semibold">
                                <option value="todo">To Do</option>
                                <option value="in-progress">In Progress</option>
                                <option value="review">Review</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>

                        <!-- Timeline & Schedule Info in Details -->
                        <div class="p-3 bg-light rounded-3 border mb-3">
                            <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-2"><i class="fa-regular fa-calendar-days text-primary me-1"></i> Timeline Schedule</span>
                            <div class="d-flex flex-column gap-1 fs-7">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted fs-8">Start Date:</span>
                                    <span class="fw-bold text-dark fs-8" id="detailStartDate">Sep 01, 2026</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted fs-8">Due Date:</span>
                                    <span class="fw-bold text-danger fs-8" id="detailDueDate">Sep 15, 2026</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted fs-8">Duration:</span>
                                    <span class="badge bg-primary-subtle text-primary fw-bold" id="detailDuration">14 Days</span>
                                </div>
                                <div class="d-flex justify-content-between mt-1 pt-1 border-top">
                                    <span class="text-muted fs-8">Priority:</span>
                                    <span class="badge" id="detailPriorityBadge">Medium</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fs-8 text-uppercase fw-bold text-muted mb-1">Assignees</label>
                            <div class="d-flex flex-column gap-2" id="detailAssigneesList">
                                <!-- Dynamic assignees -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: GitHub Commit Detail -->
<div class="modal fade" id="ghCommitDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg p-3">
            <div class="modal-header border-0 pb-0 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-dark text-white font-monospace px-2 py-1 fs-7" id="modalCommitSha">#sha</span>
                    <span class="badge bg-success-subtle text-success fs-8 fw-bold" id="modalCommitHeadBadge"><i class="fa-solid fa-code-branch me-1"></i>HEAD of branch</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="#" target="_blank" class="btn btn-sm btn-outline-dark fs-8 fw-semibold" id="modalCommitGhLink">
                        <i class="fa-brands fa-github me-1"></i> View on GitHub
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body pt-3">
                <h2 class="h5 fw-bold text-dark mb-2" id="modalCommitMessage">Commit Title Message</h2>
                
                <div class="p-3 bg-light rounded-3 border mb-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&q=80" class="avatar-md rounded-circle border" id="modalCommitAuthorAvatar" alt="Author" style="width: 42px; height: 42px;">
                        <div>
                            <span class="fw-bold text-dark fs-7 d-block" id="modalCommitAuthorName">Author Name</span>
                            <span class="text-muted fs-8" id="modalCommitDate">Committed on Sep 30, 2026</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 fs-7">
                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1" id="modalCommitAdditions">+0 additions</span>
                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1" id="modalCommitDeletions">-0 deletions</span>
                        <span class="badge bg-secondary-subtle text-secondary border px-2 py-1" id="modalCommitTotalFiles">0 files changed</span>
                    </div>
                </div>

                <h3 class="h6 fw-bold mb-2 text-dark"><i class="fa-regular fa-file-lines text-primary me-1"></i> Changed Files & Diffs</h3>
                <div class="list-group list-group-flush border rounded-3 overflow-y-auto" style="max-height: 280px;" id="modalCommitFilesList">
                    <!-- Dynamic Changed Files -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================================== -->
<!-- MODAL: UPLOAD PROJECT & TASK DOCUMENTATION FILE                             -->
<!-- =========================================================================== -->
<div class="modal fade" id="uploadTaskDocModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg p-3">
            <div class="modal-header border-bottom pb-3">
                <div class="d-flex align-items-center gap-2.5">
                    <div class="p-2.5 bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px;">
                        <i class="fa-solid fa-cloud-arrow-up fs-5"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0">Upload File Dokumentasi</h5>
                        <span class="fs-8 text-muted">Unggah berkas spesifikasi, diagram ERD, blueprint arsitektur, atau aset pendukung.</span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formUploadTaskDoc">
                <div class="modal-body py-3">
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label fs-7 fw-semibold text-dark">Kategori Dokumen *</label>
                            <select class="form-select fs-7" id="uploadTaskDocCategory" required>
                                <option value="brd">BRD (Business Requirements)</option>
                                <option value="fsd">FSD (Functional Specification)</option>
                                <option value="prd">PRD (Product Requirements)</option>
                                <option value="erd">ERD (Database Schema)</option>
                                <option value="blueprint">Blueprint & Architecture</option>
                                <option value="assets">Assets & Source Packages</option>
                                <option value="other">Lainnya / General Docs</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fs-7 fw-semibold text-dark">Project Association *</label>
                            <select class="form-select fs-7" id="uploadTaskDocProject" required>
                                <option value="Middleware Project" selected>Middleware Project</option>
                                <option value="Mobile CRM Application">Mobile CRM Application</option>
                                <option value="Landing Page Campaign">Landing Page Campaign</option>
                                <option value="Company Website">Company Website</option>
                                <option value="Internal Analytics Tool">Internal Analytics Tool</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-8">
                            <label class="form-label fs-7 fw-semibold text-dark">Judul Dokumen *</label>
                            <input type="text" class="form-control fs-7" id="uploadTaskDocTitle" placeholder="e.g. Master Enterprise Architecture Blueprint v2" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label fs-7 fw-semibold text-dark">Versi Dokumen</label>
                            <input type="text" class="form-control fs-7 font-monospace" id="uploadTaskDocVersion" placeholder="e.g. v1.0.0" value="v1.0.0">
                        </div>
                    </div>

                    <!-- File Input Area (All Extensions) -->
                    <div class="mb-3">
                        <label class="form-label fs-7 fw-semibold text-dark">Pilih Berkas File *</label>
                        <div class="input-group">
                            <input type="file" class="form-control fs-7" id="uploadTaskDocFileInput" accept="*/*,.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.png,.jpg,.jpeg,.svg,.zip,.rar,.txt,.md,.drawio,.sql" required>
                        </div>
                        <span class="fs-8 text-muted mt-1 d-block">
                            <i class="fa-solid fa-circle-check text-success me-1"></i> Mendukung seluruh format berkas dokumen, spreadsheet, arsip kompresi, diagram, SQL, dan gambar.
                        </span>
                    </div>

                    <!-- Author & Status -->
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label fs-7 fw-semibold text-dark">Pengunggah / Author</label>
                            <input type="text" class="form-control fs-7" id="uploadTaskDocAuthor" value="Sophia Carter (Lead Architect)">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fs-7 fw-semibold text-dark">Status Persetujuan</label>
                            <select class="form-select fs-7" id="uploadTaskDocStatus">
                                <option value="Approved" selected>Approved / Official</option>
                                <option value="Under Review">Under Review</option>
                                <option value="Draft">Draft</option>
                                <option value="Archived">Archived</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label fs-7 fw-semibold text-dark">Catatan / Ringkasan Perubahan</label>
                        <textarea class="form-control fs-7" id="uploadTaskDocNotes" rows="2" placeholder="Tuliskan catatan rilis berkas atau changelog singkat..."></textarea>
                    </div>

                    <!-- Upload Progress Simulation Bar (Hidden by default) -->
                    <div class="d-none mt-3" id="uploadTaskDocProgressContainer">
                        <div class="d-flex align-items-center justify-content-between fs-8 mb-1">
                            <span class="text-primary fw-semibold"><i class="fa-solid fa-spinner fa-spin me-1"></i> Mengunggah berkas...</span>
                            <span class="text-dark fw-bold" id="uploadTaskDocProgressPct">0%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" id="uploadTaskDocProgressBar" style="width: 0%;"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary px-3.5 fs-7" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 fs-7 fw-semibold d-flex align-items-center gap-2" id="btnSubmitUploadTaskDoc">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <span>Upload Sekarang</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- =========================================================================== -->
<!-- MODAL: PREVIEW DOCUMENTATION FILE DETAILS                                   -->
<!-- =========================================================================== -->
<div class="modal fade" id="previewTaskDocModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg p-3">
            <div class="modal-header border-bottom pb-3">
                <div class="d-flex align-items-center gap-2.5">
                    <div class="p-2.5 rounded-3 d-flex align-items-center justify-content-center text-white" id="previewTaskDocIconBox" style="width: 44px; height: 44px; background: #3b82f6;">
                        <i class="fa-solid fa-file fs-5" id="previewTaskDocIcon"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0" id="previewTaskDocTitle">Document Title</h5>
                        <span class="fs-8 text-muted" id="previewTaskDocSubtitle">Project Association</span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-3">
                <div class="p-3 bg-light rounded-3 mb-3 border">
                    <div class="row g-2 fs-8">
                        <div class="col-6">
                            <span class="text-muted d-block">Nama Berkas:</span>
                            <strong class="text-dark font-monospace" id="previewTaskDocFilename">document.pdf</strong>
                        </div>
                        <div class="col-6">
                            <span class="text-muted d-block">Ukuran File:</span>
                            <strong class="text-dark" id="previewTaskDocSize">2.4 MB</strong>
                        </div>
                        <div class="col-6 mt-2">
                            <span class="text-muted d-block">Kategori & Versi:</span>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle" id="previewTaskDocCategory">BRD</span>
                            <span class="badge bg-light text-dark border font-monospace ms-1" id="previewTaskDocVersion">v1.0.0</span>
                        </div>
                        <div class="col-6 mt-2">
                            <span class="text-muted d-block">Status Dokumen:</span>
                            <span class="badge bg-success-subtle text-success border border-success-subtle" id="previewTaskDocStatus">Approved</span>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <span class="fs-8 text-muted d-block fw-semibold mb-1">Catatan & Deskripsi:</span>
                    <p class="fs-8 text-dark bg-light-subtle p-2.5 rounded-3 border mb-0" id="previewTaskDocDesc">No description available.</p>
                </div>
            </div>
            <div class="modal-footer border-top pt-2.5 d-flex align-items-center justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm px-3 fs-8" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary btn-sm px-3 fs-8 fw-semibold d-flex align-items-center gap-1.5" id="btnPreviewTaskDocDownload">
                    <i class="fa-solid fa-download"></i> Unduh Berkas
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification Container -->
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1090;">
    <div id="liveTaskToast" class="toast align-items-center text-bg-dark border-0 rounded-3 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center gap-2 fs-7">
                <i class="fa-solid fa-circle-check text-success fs-6"></i>
                <span id="liveTaskToastMsg">Operation completed successfully!</span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../layouts/footer.php';
?>
