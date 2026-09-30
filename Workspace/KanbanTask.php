<?php
$currentPage = 'kanban';
$currentModule = 'workspace';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syncboard - Task & Project Management (Bootstrap 5 & jQuery)</title>

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
                            <li class="breadcrumb-item text-muted">Project</li>
                            <li class="breadcrumb-item text-muted">Website</li>
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page"> Middleware Project </li>
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
                            <li><a class="dropdown-menu-item dropdown-item fs-7" href="../Setting/"><i class="fa-solid fa-gear me-2"></i> Master Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-menu-item dropdown-item text-danger fs-7" href="#"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </header>

            <!-- Project Banner Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white">
                        <i class="fa-solid fa-bag-shopping fs-4"></i>
                    </div>
                    <h1 class="project-title h3 fw-extrabold mb-0"> Middleware Project </h1>
                </div>

                <div class="project-actions-area d-flex align-items-center gap-3">
                    <!-- Team Avatars Stack -->
                    <div class="team-avatars-stack d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80" data-bs-toggle="tooltip" title="Michael Anderson" class="rounded-circle border border-2 border-white shadow-sm" alt="Team">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80" data-bs-toggle="tooltip" title="Sophia Carter" class="rounded-circle border border-2 border-white shadow-sm" alt="Team">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80" data-bs-toggle="tooltip" title="Daniel Johnson" class="rounded-circle border border-2 border-white shadow-sm" alt="Team">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80" data-bs-toggle="tooltip" title="James Wilson" class="rounded-circle border border-2 border-white shadow-sm" alt="Team">
                        <div class="avatar-more rounded-circle border border-2 border-white bg-primary-subtle text-primary fw-bold fs-8 d-flex align-items-center justify-content-center shadow-sm">+9</div>
                    </div>

                    <button class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm" id="btnNewTask">
                        <i class="fa-solid fa-plus"></i> New Task
                    </button>
                </div>
            </section>

            <!-- Toolbar Controls Bar -->
            <div class="toolbar-container px-4 pb-3 border-bottom d-flex flex-nowrap align-items-center gap-3 overflow-x-auto" id="toolbar-container">
                <div class="nav nav-pills view-tabs gap-2 flex-nowrap" id="viewTabs">
                    <button class="nav-link tab-btn fw-semibold py-2 px-3 rounded-3" data-view="dashboard">
                        <i class="fa-solid fa-chart-pie me-1"></i> Dashboard
                    </button>
                    <button class="nav-link active tab-btn fw-semibold py-2 px-3 rounded-3" data-view="kanban">
                        <i class="fa-solid fa-sliders me-1"></i> Kanban
                    </button>
                    <button class="nav-link tab-btn fw-semibold py-2 px-3 rounded-3" data-view="board-list">
                        <i class="fa-solid fa-table-cells-large me-1"></i> Board & List
                    </button>
                    <button class="nav-link tab-btn fw-semibold py-2 px-3 rounded-3" data-view="calendar">
                        <i class="fa-regular fa-calendar-days me-1"></i> Calendar & Timeline
                    </button>
                    <button class="nav-link tab-btn fw-semibold py-2 px-3 rounded-3" data-view="documentation">
                        <i class="fa-regular fa-folder-open me-1"></i> Documentation
                    </button>
                    <button class="nav-link tab-btn fw-semibold py-2 px-3 rounded-3" data-view="teams">
                        <i class="fa-solid fa-users me-1"></i> Teams
                    </button>
                    <button class="nav-link tab-btn fw-semibold py-2 px-3 rounded-3" data-view="settings">
                        <i class="fa-solid fa-gear me-1"></i> Settings
                    </button>
                    <button class="nav-link tab-btn fw-semibold py-2 px-3 rounded-3" data-view="github">
                        <i class="fa-brands fa-github me-1"></i> GitHub History
                    </button>
                </div>
            </div>

            <!-- View Containers -->
            <div class="view-wrapper flex-grow-1 p-4">

                <!-- 1. DASHBOARD VIEW (Summary & Statistics) -->
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

                <!-- 2. KANBAN VIEW (Default) -->
                <div class="view-content active" id="viewKanban">
                    <div class="row g-4 kanban-board">
                        <!-- Column: To Do -->
                        <div class="col-12 col-md-6 col-xl-3">
                            <div class="kanban-column bg-light-subtle rounded-4 p-3 border d-flex flex-column h-100" data-status="todo">
                                <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                                    <div class="d-flex align-items-center">
                                        <span class="dot dot-todo me-2"></span>
                                        <h3 class="column-title h6 fw-bold mb-0 me-2">To Do</h3>
                                        <span class="column-badge badge-todo rounded-pill px-2 py-1 fs-8 fw-bold" id="colCountTodo">3</span>
                                    </div>
                                    <button class="btn btn-sm btn-icon-sm text-muted btn-add-task-col" data-status="todo" title="Add Task">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                                <div class="task-cards-list d-flex flex-column gap-3 flex-grow-1" id="colListTodo" data-status="todo">
                                    <!-- Cards rendered dynamically via jQuery -->
                                </div>
                            </div>
                        </div>

                        <!-- Column: In Progress -->
                        <div class="col-12 col-md-6 col-xl-3">
                            <div class="kanban-column bg-light-subtle rounded-4 p-3 border d-flex flex-column h-100" data-status="in-progress">
                                <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                                    <div class="d-flex align-items-center">
                                        <span class="dot dot-progress me-2"></span>
                                        <h3 class="column-title h6 fw-bold mb-0 me-2">In Progres</h3>
                                        <span class="column-badge badge-progress rounded-pill px-2 py-1 fs-8 fw-bold" id="colCountProgress">3</span>
                                    </div>
                                    <button class="btn btn-sm btn-icon-sm text-muted btn-add-task-col" data-status="in-progress" title="Add Task">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                                <div class="task-cards-list d-flex flex-column gap-3 flex-grow-1" id="colListProgress" data-status="in-progress">
                                    <!-- Cards rendered dynamically via jQuery -->
                                </div>
                            </div>
                        </div>

                        <!-- Column: Review -->
                        <div class="col-12 col-md-6 col-xl-3">
                            <div class="kanban-column bg-light-subtle rounded-4 p-3 border d-flex flex-column h-100" data-status="review">
                                <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                                    <div class="d-flex align-items-center">
                                        <span class="dot dot-review me-2"></span>
                                        <h3 class="column-title h6 fw-bold mb-0 me-2">Review</h3>
                                        <span class="column-badge badge-review rounded-pill px-2 py-1 fs-8 fw-bold" id="colCountReview">3</span>
                                    </div>
                                    <button class="btn btn-sm btn-icon-sm text-muted btn-add-task-col" data-status="review" title="Add Task">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                                <div class="task-cards-list d-flex flex-column gap-3 flex-grow-1" id="colListReview" data-status="review">
                                    <!-- Cards rendered dynamically via jQuery -->
                                </div>
                            </div>
                        </div>

                        <!-- Column: Complete -->
                        <div class="col-12 col-md-6 col-xl-3">
                            <div class="kanban-column bg-light-subtle rounded-4 p-3 border d-flex flex-column h-100" data-status="completed">
                                <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                                    <div class="d-flex align-items-center">
                                        <span class="dot dot-complete me-2"></span>
                                        <h3 class="column-title h6 fw-bold mb-0 me-2">Complete</h3>
                                        <span class="column-badge badge-complete rounded-pill px-2 py-1 fs-8 fw-bold" id="colCountComplete">2</span>
                                    </div>
                                    <button class="btn btn-sm btn-icon-sm text-muted btn-add-task-col" data-status="completed" title="Add Task">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                                <div class="task-cards-list d-flex flex-column gap-3 flex-grow-1" id="colListComplete" data-status="completed">
                                    <!-- Cards rendered dynamically via jQuery -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. UNIFIED BOARD & LIST VIEW (With Subtab Switcher) -->
                <div class="view-content" id="viewBoardList">
                    <div class="card shadow-sm border rounded-4 p-4 mb-4 bg-white">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 pb-3 border-bottom">
                            <div>
                                <h2 class="h5 fw-bold mb-0">Board & List Tasks View</h2>
                                <span class="fs-8 text-muted">Switch between Grid Board and Table List views</span>
                            </div>
                            <!-- Subtabs Toggle: Board vs List -->
                            <div class="nav nav-pills board-list-subtabs p-1 bg-light rounded-3 border" id="boardListSubTabs">
                                <button class="nav-link active bl-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="board">
                                    <i class="fa-solid fa-table-cells-large me-1"></i> View by Board
                                </button>
                                <button class="nav-link bl-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="list">
                                    <i class="fa-solid fa-list-ul me-1"></i> View by List
                                </button>
                            </div>
                        </div>

                        <!-- 1. Subview: Board Grid -->
                        <div class="board-list-subview active" id="subviewBoardGrid">
                            <div class="row g-4" id="boardGridContainer">
                                <!-- Dynamic Grid Cards -->
                            </div>
                        </div>

                        <!-- 2. Subview: List Table -->
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
                                        <!-- Dynamic Table Rows -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. CALENDAR VIEW -->
                <div class="view-content" id="viewCalendar">
                    <div class="card shadow-sm border rounded-4 p-4 calendar-wrapper bg-white">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 pb-3 border-bottom">
                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                <h2 class="h5 fw-bold mb-0" id="calendarMonthTitle">September 2026</h2>

                                <!-- Subtabs Toggle: Calendar Grid vs Gantt Timeline vs Timeline Scheduler Manager -->
                                <div class="nav nav-pills calendar-subtabs p-1 bg-light rounded-3 border" id="calendarSubTabs">
                                    <button class="nav-link active cal-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="grid">
                                        <i class="fa-regular fa-calendar-days me-1"></i> View by Calendar
                                    </button>
                                    <button class="nav-link cal-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="timeline">
                                        <i class="fa-solid fa-chart-gantt me-1"></i> View by Timeline
                                    </button>
                                    <button class="nav-link cal-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="schedule-manager">
                                        <i class="fa-solid fa-sliders me-1"></i> Task Timeline Scheduler
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

                        <!-- 1. Subview: Calendar Grid -->
                        <div class="calendar-subview-content active" id="subviewGrid">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="fs-8 text-muted fw-semibold"><i class="fa-solid fa-circle-info text-primary me-1"></i> Click on any task to view or modify its scheduled timeline.</span>
                                <div class="d-flex align-items-center gap-2 fs-8">
                                    <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-todo p-1 rounded-circle"></span> To Do</span>
                                    <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-progress p-1 rounded-circle"></span> In Progress</span>
                                    <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-review p-1 rounded-circle"></span> Review</span>
                                    <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-complete p-1 rounded-circle"></span> Complete</span>
                                </div>
                            </div>
                            <div class="calendar-grid d-grid gap-2" id="calendarGrid" style="grid-template-columns: repeat(7, 1fr);">
                                <!-- Dynamic Calendar Cells -->
                            </div>
                        </div>

                        <!-- 2. Subview: Timeline Schedule (Gantt) -->
                        <div class="calendar-subview-content" id="subviewTimeline">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3 p-2 bg-light-subtle rounded-3 border">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="fs-8 fw-bold text-uppercase text-muted">Timeline Filter:</span>
                                    <select class="form-select form-select-sm fs-8 w-auto py-1" id="timelineStatusFilter">
                                        <option value="all">All Statuses</option>
                                        <option value="todo">To Do</option>
                                        <option value="in-progress">In Progress</option>
                                        <option value="review">Review</option>
                                        <option value="completed">Complete</option>
                                    </select>
                                </div>
                                <div class="fs-8 text-muted">
                                    <span><i class="fa-solid fa-arrows-left-right me-1 text-primary"></i> Bars reflect realistic task duration & progress</span>
                                </div>
                            </div>

                            <div class="timeline-container p-1">
                                <div class="timeline-header d-flex align-items-center border-bottom pb-2 mb-3 fw-bold text-muted fs-8 text-uppercase">
                                    <div style="width: 280px; flex-shrink: 0;">Task, Timeline & Priority</div>
                                    <div class="flex-grow-1 d-flex justify-content-between text-center px-3">
                                        <span class="w-25">Week 1 (Sep 1 - 7)</span>
                                        <span class="w-25">Week 2 (Sep 8 - 14)</span>
                                        <span class="w-25">Week 3 (Sep 15 - 21)</span>
                                        <span class="w-25">Week 4 (Sep 22 - 30)</span>
                                    </div>
                                    <div style="width: 140px; flex-shrink: 0;" class="text-end">Assignees & Actions</div>
                                </div>
                                <div class="timeline-body d-flex flex-column gap-2" id="timelineTasksList">
                                    <!-- Dynamic Timeline Rows rendered via jQuery -->
                                </div>
                            </div>
                        </div>

                        <!-- 3. Subview: Task Timeline Scheduler / Configurator -->
                        <div class="calendar-subview-content" id="subviewScheduleManager">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3 p-3 bg-primary-subtle rounded-3 border border-primary-subtle">
                                <div>
                                    <h6 class="fw-bold text-primary mb-1"><i class="fa-solid fa-sliders me-1"></i> Per-Task Timeline & Schedule Manager</h6>
                                    <p class="fs-8 text-secondary mb-0">Atur langsung tanggal mulai (Start Date), batas waktu (Due Date), durasi hari, dan prioritas untuk setiap task di bawah ini.</p>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <button class="btn btn-sm btn-outline-primary bg-white fs-8 fw-semibold" id="btnSyncAllTimelines">
                                        <i class="fa-solid fa-rotate me-1"></i> Reset to Default Timeline
                                    </button>
                                </div>
                            </div>

                            <div class="table-responsive border rounded-3 bg-white">
                                <table class="table table-hover align-middle mb-0 timeline-schedule-table">
                                    <thead>
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

                <!-- 5. DOCUMENTATION VIEW -->
                <div class="view-content" id="viewDocumentation">
                    <!-- Documentation Header Toolbar -->
                    <div class="card shadow-sm border rounded-4 p-3.5 bg-white mb-4">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div>
                                <div class="d-flex align-items-center gap-2">
                                    <h2 class="h5 fw-bold mb-0 text-dark">Project Documentation Repository</h2>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-8 px-2 py-0.5 rounded-2">Synchronized</span>
                                </div>
                                <span class="fs-8 text-muted mt-0.5 d-block">Pusat master spesifikasi BRD, FSD, PRD, ERD, Blueprint terintegrasi langsung dengan Track Versioning.</span>
                            </div>
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <a href="Documentation/TrackingVersion.php" class="btn btn-sm btn-primary rounded-3 d-flex align-items-center gap-1.5 fs-7 shadow-xs">
                                    <i class="fa-solid fa-timeline"></i> Track Versioning
                                </a>
                            </div>
                        </div>
                        
                        <!-- Quick Jump Module Pills -->
                        <div class="d-flex flex-wrap align-items-center gap-2 pt-3 mt-3 border-top">
                            <span class="fs-8 text-muted fw-bold text-uppercase me-1"><i class="fa-solid fa-link me-1"></i> Quick Jump:</span>
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

                <!-- 6. TEAMS VIEW -->
                <div class="view-content" id="viewTeams">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                        <div>
                            <h2 class="h5 fw-bold mb-0">Project Teams</h2>
                            <span class="fs-8 text-muted">Manage team members and their roles</span>
                        </div>
                        <button class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 fs-7 shadow-sm">
                            <i class="fa-solid fa-user-plus"></i> Invite Member
                        </button>
                    </div>

                    <div class="row g-4">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card shadow-sm border rounded-4 text-center p-4 bg-white">
                                <div class="mb-3 position-relative d-inline-block mx-auto">
                                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80" alt="Avatar" class="rounded-circle img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                                    <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle" style="width: 15px; height: 15px;"></span>
                                </div>
                                <h5 class="fs-6 fw-bold mb-1">Sophia Carter</h5>
                                <p class="text-muted fs-8 mb-3">Project Manager</p>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-light btn-sm rounded-circle"><i class="fa-regular fa-envelope"></i></button>
                                    <button class="btn btn-light btn-sm rounded-circle"><i class="fa-solid fa-phone"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card shadow-sm border rounded-4 text-center p-4 bg-white">
                                <div class="mb-3 position-relative d-inline-block mx-auto">
                                    <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=150&q=80" alt="Avatar" class="rounded-circle img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                                    <span class="position-absolute bottom-0 end-0 bg-warning border border-white rounded-circle" style="width: 15px; height: 15px;"></span>
                                </div>
                                <h5 class="fs-6 fw-bold mb-1">James Wilson</h5>
                                <p class="text-muted fs-8 mb-3">Lead Developer</p>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-light btn-sm rounded-circle"><i class="fa-regular fa-envelope"></i></button>
                                    <button class="btn btn-light btn-sm rounded-circle"><i class="fa-solid fa-phone"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card shadow-sm border rounded-4 text-center p-4 bg-white">
                                <div class="mb-3 position-relative d-inline-block mx-auto">
                                    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=150&q=80" alt="Avatar" class="rounded-circle img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                                    <span class="position-absolute bottom-0 end-0 bg-secondary border border-white rounded-circle" style="width: 15px; height: 15px;"></span>
                                </div>
                                <h5 class="fs-6 fw-bold mb-1">Michael Anderson</h5>
                                <p class="text-muted fs-8 mb-3">UI/UX Designer</p>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-light btn-sm rounded-circle"><i class="fa-regular fa-envelope"></i></button>
                                    <button class="btn btn-light btn-sm rounded-circle"><i class="fa-solid fa-phone"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card shadow-sm border rounded-4 text-center p-4 bg-white">
                                <div class="mb-3 position-relative d-inline-block mx-auto">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80" alt="Avatar" class="rounded-circle img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                                    <span class="position-absolute bottom-0 end-0 bg-danger border border-white rounded-circle" style="width: 15px; height: 15px;"></span>
                                </div>
                                <h5 class="fs-6 fw-bold mb-1">Daniel Johnson</h5>
                                <p class="text-muted fs-8 mb-3">Frontend Developer</p>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-light btn-sm rounded-circle"><i class="fa-regular fa-envelope"></i></button>
                                    <button class="btn btn-light btn-sm rounded-circle"><i class="fa-solid fa-phone"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 7. SETTINGS VIEW -->
                <div class="view-content" id="viewSettings">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8">
                            <div class="card shadow-sm border rounded-4 p-4 bg-white mb-4">
                                <div class="d-flex align-items-center gap-3 border-bottom pb-3 mb-4">
                                    <div class="p-3 bg-primary-subtle text-primary rounded-3">
                                        <i class="fa-solid fa-gear fs-4"></i>
                                    </div>
                                    <div>
                                        <h2 class="h5 fw-bold mb-0">Project Settings & Configuration</h2>
                                        <span class="text-muted fs-7">Manage project info, preferences, and notifications</span>
                                    </div>
                                </div>

                                <form id="settingsForm">
                                    <div class="mb-3">
                                        <label for="setProjTitle" class="form-label fs-7 fw-semibold">Project Name</label>
                                        <input type="text" class="form-control fs-7" id="setProjTitle" value="Middleware Project">
                                    </div>

                                    <div class="mb-3">
                                        <label for="setProjCategory" class="form-label fs-7 fw-semibold">Category</label>
                                        <select class="form-select fs-7" id="setProjCategory">
                                            <option value="website">Website Development</option>
                                            <option value="mobile">Mobile Application</option>
                                            <option value="design">Graphic & UI/UX Design</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="setProjDesc" class="form-label fs-7 fw-semibold">Description</label>
                                        <textarea class="form-control fs-7" id="setProjDesc" rows="3">Middleware and E-Commerce project management system for Syncboard Company.</textarea>
                                    </div>

                                    <h3 class="h6 fw-bold border-top pt-3 mb-3">Preferences & Notifications</h3>
                                    <div class="form-check form-switch mb-2 fs-7">
                                        <input class="form-check-input" type="checkbox" id="chkNotifyEmail" checked>
                                        <label class="form-check-label fw-medium" for="chkNotifyEmail">Send email notifications on task updates</label>
                                    </div>
                                    <div class="form-check form-switch mb-2 fs-7">
                                        <input class="form-check-input" type="checkbox" id="chkNotifyDaily" checked>
                                        <label class="form-check-label fw-medium" for="chkNotifyDaily">Enable daily digest summary</label>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-end gap-2 border-top pt-3 mt-4">
                                        <button type="button" class="btn btn-outline-secondary px-4 fs-7">Reset</button>
                                        <button type="submit" class="btn btn-primary px-4 fs-7 fw-semibold">Save Settings</button>
                                    </div>
                                </form>
                            </div>

                            <!-- GitHub Integration & Sync Configuration Card -->
                            <div class="card shadow-sm border rounded-4 p-4 bg-white mb-4">
                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="p-3 bg-dark text-white rounded-3 shadow-sm" style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fa-brands fa-github fs-4"></i>
                                        </div>
                                        <div>
                                            <h2 class="h6 fw-bold mb-0 text-dark">GitHub Integration & Sync</h2>
                                            <span class="text-muted fs-8">Konfigurasi akun, repository, dan Personal Access Token untuk tab GitHub Stream</span>
                                        </div>
                                    </div>
                                    <span class="badge bg-light text-muted border px-2 py-1 fs-8" id="cfgGhStatusBadge"><i class="fa-solid fa-circle-check text-success me-1"></i> Connected</span>
                                </div>

                                <form id="formGithubConfig">
                                    <div class="row g-3 mb-3">
                                        <div class="col-12 col-md-6">
                                            <label for="cfgGhOwner" class="form-label fs-7 fw-semibold">GitHub Owner / Organization *</label>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-text bg-light"><i class="fa-solid fa-user text-muted"></i></span>
                                                <input type="text" class="form-control fs-7" id="cfgGhOwner" value="irsjrhr" placeholder="e.g. irsjrhr" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="cfgGhRepo" class="form-label fs-7 fw-semibold">Repository Name *</label>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-text bg-light"><i class="fa-solid fa-book-bookmark text-muted"></i></span>
                                                <input type="text" class="form-control fs-7" id="cfgGhRepo" value="MOCKUP_KANBAN_PROJECT" placeholder="e.g. MOCKUP_KANBAN_PROJECT" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3 mb-3">
                                        <div class="col-12 col-md-6">
                                            <label for="cfgGhBranch" class="form-label fs-7 fw-semibold">Default Target Branch</label>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-text bg-light"><i class="fa-solid fa-code-branch text-muted"></i></span>
                                                <input type="text" class="form-control fs-7" id="cfgGhBranch" value="main" placeholder="main">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="cfgGhAutoSync" class="form-label fs-7 fw-semibold">Sinkronisasi Otomatis</label>
                                            <select class="form-select form-select-sm fs-7" id="cfgGhAutoSync">
                                                <option value="manual">Manual (Saat klik tombol Sync)</option>
                                                <option value="on-open" selected>Otomatis saat tab GitHub dibuka</option>
                                                <option value="5m">Otomatis setiap 5 Menit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="cfgGhToken" class="form-label fs-7 fw-semibold d-flex align-items-center justify-content-between">
                                            <span>Personal Access Token (PAT)</span>
                                            <span class="fs-8 text-muted fw-normal">Diperlukan untuk repository PRIVATE & limit 5.000 req/h</span>
                                        </label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text bg-light"><i class="fa-solid fa-key text-muted"></i></span>
                                            <input type="password" class="form-control fs-7" id="cfgGhToken" placeholder="ghp_xxxxxxxxxxxxxxxxxxxx">
                                            <button class="btn btn-outline-secondary" type="button" id="btnToggleTokenVisibility">
                                                <i class="fa-regular fa-eye" id="iconTokenVisibility"></i>
                                            </button>
                                        </div>
                                        <div class="form-text fs-8 text-muted">
                                            Token disimpan aman di <code>localStorage</code> browser dan langsung digunakan untuk mengambil data commit & push.
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-4">
                                        <button type="button" class="btn btn-outline-dark btn-sm px-3 fw-semibold" id="btnTestGhConnection">
                                            <i class="fa-solid fa-plug me-1"></i> Test Koneksi GitHub
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-sm px-4 fw-semibold" id="btnSaveGhConfig">
                                            <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Pengaturan GitHub
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 8. GITHUB HISTORICAL COMMIT & PUSH VIEW -->
                <div class="view-content" id="viewGithub">
                    <!-- Clean Minimalist GitHub Repository Header Bar -->
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
                                <button class="btn btn-sm btn-outline-secondary rounded-3 fs-7 fw-semibold" id="btnGoToGhSettings" title="Buka Konfigurasi GitHub di Tab Settings">
                                    <i class="fa-solid fa-gear me-1"></i> Pengaturan
                                </button>
                                <a href="https://github.com/irsjrhr/MOCKUP_KANBAN_PROJECT" target="_blank" class="btn btn-sm btn-dark rounded-3 fs-7 fw-semibold" id="btnExternalGhRepo">
                                    <i class="fa-brands fa-github me-1"></i> GitHub <i class="fa-solid fa-arrow-up-right-from-square fs-9 ms-0.5"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content Card with Subtabs -->
                    <div class="card shadow-sm border rounded-4 bg-white p-4">
                        <!-- Sub-Navigation and Controls -->
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 pb-3 border-bottom mb-4">
                            <!-- GitHub Subtabs Pills -->
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

                            <!-- Branch Filter & Search Controls -->
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <div class="input-group input-group-sm" style="width: 220px;">
                                    <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-code-branch text-muted"></i></span>
                                    <select class="form-select border-start-0 fs-7 fw-semibold" id="ghBranchSelect">
                                        <option value="main" selected>branch: main</option>
                                    </select>
                                </div>
                                <div class="input-group input-group-sm" style="width: 200px;" id="ghCommitSearchBox">
                                    <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-magnifying-glass text-muted fs-8"></i></span>
                                    <input type="text" class="form-control border-start-0 fs-7" id="ghSearchCommitInput" placeholder="Filter commit message...">
                                </div>
                            </div>
                        </div>

                        <!-- 1. SUBTAB CONTENT: COMMIT HISTORY (Endpoints 4, 5, 6, 7) -->
                        <div class="gh-subtab-content active" id="ghContentCommits">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <h3 class="h6 fw-bold mb-0 text-dark"><i class="fa-solid fa-timeline text-primary me-2"></i>Repository Commit History Stream</h3>
                                    <span class="text-muted fs-8">Displaying commit logs per branch with SHA hashes, authors, and file changes.</span>
                                </div>
                                <div class="fs-8 text-muted">
                                    Active Branch: <span class="badge bg-light text-dark border fw-bold" id="ghActiveBranchLabel">main</span>
                                </div>
                            </div>

                            <!-- Commits Stream List -->
                            <div class="commits-timeline-container d-flex flex-column gap-3" id="ghCommitsList">
                                <!-- Dynamic Commit Cards injected via jQuery -->
                                <div class="text-center py-5 text-muted">
                                    <div class="spinner-border spinner-border-sm text-primary mb-2" role="status"></div>
                                    <p class="fs-7 mb-0">Loading commit logs from GitHub...</p>
                                </div>
                            </div>
                        </div>

                        <!-- 2. SUBTAB CONTENT: PUSH ACTIVITY & REPO EVENTS (Endpoints 9 & 10) -->
                        <div class="gh-subtab-content d-none" id="ghContentPushes">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <h3 class="h6 fw-bold mb-0 text-dark"><i class="fa-solid fa-cloud-arrow-up text-success me-2"></i>Historical Push Activity & Repository Events</h3>
                                    <span class="text-muted fs-8">Monitored PushEvents capturing actor pushes, branch refs, and commit batches.</span>
                                </div>
                            </div>

                            <!-- Pushes Stream List -->
                            <div class="pushes-stream-container d-flex flex-column gap-3" id="ghPushesList">
                                <!-- Dynamic Push Cards injected via jQuery -->
                            </div>
                        </div>

                        <!-- 3. SUBTAB CONTENT: COMPARE BRANCHES / COMMITS (Endpoint 8) -->
                        <div class="gh-subtab-content d-none" id="ghContentCompare">
                            <div class="p-3 bg-light rounded-4 border mb-4">
                                <h3 class="h6 fw-bold mb-3"><i class="fa-solid fa-code-compare text-primary me-2"></i>Compare Revisions & Branches</h3>
                                <div class="row g-3 align-items-end">
                                    <div class="col-12 col-md-5">
                                        <label class="form-label fs-8 fw-bold text-muted text-uppercase mb-1">Base Revision (Behind)</label>
                                        <select class="form-select form-select-sm fs-7 fw-semibold" id="ghCompareBase">
                                            <option value="main" selected>main (base)</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-2 text-center pb-1">
                                        <span class="badge bg-white text-muted border p-2"><i class="fa-solid fa-arrow-left-long me-1"></i> ... <i class="fa-solid fa-arrow-right-long ms-1"></i></span>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <label class="form-label fs-8 fw-bold text-muted text-uppercase mb-1">Head Revision (Ahead)</label>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control fs-7 fw-semibold" id="ghCompareHead" value="develop" placeholder="Branch or SHA...">
                                            <button class="btn btn-primary px-3 fw-semibold" id="btnRunCompare"><i class="fa-solid fa-bolt me-1"></i> Compare</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Compare Results Container -->
                            <div id="ghCompareResults">
                                <div class="text-center py-4 text-muted fs-7">
                                    Pilih base dan head revision lalu klik <strong>Compare</strong> untuk melihat perbandingan diff.
                                </div>
                            </div>
                        </div>

                        <!-- 4. SUBTAB CONTENT: STATS & CONTRIBUTORS (Endpoints 11 & 12) -->
                        <div class="gh-subtab-content d-none" id="ghContentStats">
                            <div class="row g-4">
                                <div class="col-12 col-lg-6">
                                    <div class="p-3 bg-light rounded-4 border h-100">
                                        <h3 class="h6 fw-bold mb-3 text-dark"><i class="fa-solid fa-chart-simple text-primary me-2"></i>Commit Activity Statistics</h3>
                                        <p class="text-muted fs-8 mb-3">Weekly commit distribution and development cadence.</p>
                                        <div class="commit-stats-bars d-flex align-items-end gap-2 justify-content-between p-3 bg-white rounded-3 border" style="height: 160px;" id="ghStatsBars">
                                            <!-- Dynamic Weekly Bars -->
                                        </div>
                                        <div class="d-flex justify-content-between fs-8 text-muted mt-2 px-1">
                                            <span>Earlier Weeks</span>
                                            <span class="fw-bold text-dark">Latest Week</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="p-3 bg-light rounded-4 border h-100">
                                        <h3 class="h6 fw-bold mb-3 text-dark"><i class="fa-solid fa-users text-success me-2"></i>Repository Contributors</h3>
                                        <p class="text-muted fs-8 mb-3">Top contributors and commit counts.</p>
                                        <div class="d-flex flex-column gap-2" id="ghContributorsList">
                                            <!-- Dynamic Contributors Cards -->
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

    <!-- BOOTSTRAP 5 MODAL: NEW / EDIT TASK -->
    <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="modalTaskHeading" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg p-2">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold" id="modalTaskHeading">Create New Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="taskForm">
                    <div class="modal-body">
                        <input type="hidden" id="taskId">
                        <div class="mb-3">
                            <label for="taskTitle" class="form-label fs-7 fw-semibold">Task Title *</label>
                            <input type="text" class="form-control fs-7" id="taskTitle" placeholder="e.g. Homepage UI Design Draft" required>
                        </div>
                        <div class="mb-3">
                            <label for="taskDescription" class="form-label fs-7 fw-semibold">Description</label>
                            <textarea class="form-control fs-7" id="taskDescription" rows="3" placeholder="Briefly describe the task goals..."></textarea>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label for="taskStatus" class="form-label fs-7 fw-semibold">Status / Column</label>
                                <select class="form-select fs-7" id="taskStatus" required>
                                    <option value="todo">To Do</option>
                                    <option value="in-progress">In Progress</option>
                                    <option value="review">Review</option>
                                    <option value="completed">Complete</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="taskPriority" class="form-label fs-7 fw-semibold">Priority Level</label>
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
                            <label for="taskTagsInput" class="form-label fs-7 fw-semibold">Tags (comma separated)</label>
                            <input type="text" class="form-control fs-7" id="taskTagsInput" placeholder="Design UI/UX, Frontend">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fs-7 fw-semibold">Assign Team Members</label>
                            <div class="row g-2" id="memberSelectorGrid">
                                <!-- Dynamic Checkboxes via jQuery -->
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fs-7 fw-semibold">Subtasks</label>
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

    <!-- BOOTSTRAP 5 MODAL: TASK DETAIL & COMMENTS VIEW -->
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
                            <h2 class="h4 fw-bold mb-2" id="detailTitle">Task Title</h2>
                            <p class="text-secondary fs-7 mb-4" id="detailDesc">Task description details go here...</p>

                            <!-- Subtask Checklist -->
                            <div class="subtasks-section mb-4">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h3 class="h6 fw-bold mb-0">Checklist Subtasks</h3>
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
                                <h3 class="h6 fw-bold mb-3">Activity & Comments</h3>
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
                                    <option value="completed">Complete</option>
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

    <!-- BOOTSTRAP 5 MODAL: GITHUB COMMIT DETAIL (Endpoint 6 & 7) -->
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

                    <h3 class="h6 fw-bold mb-2"><i class="fa-regular fa-file-lines text-primary me-1"></i> Changed Files & Diffs</h3>
                    <div class="list-group list-group-flush border rounded-3 overflow-y-auto" style="max-height: 280px;" id="modalCommitFilesList">
                        <!-- Dynamic Changed Files -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP 5 MODAL: GITHUB AUTH TOKEN CONFIG -->
    <div class="modal fade" id="ghTokenModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg p-3">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold"><i class="fa-brands fa-github text-dark me-2"></i>GitHub API Authentication</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted fs-7 mb-3">
                        Secara default API GitHub publik dibatasi 60 request/jam. Masukkan <strong>GitHub Personal Access Token (PAT)</strong> untuk menaikkan limit hingga 5.000 request/jam dan mengakses history private.
                    </p>
                    <div class="mb-3">
                        <label for="inputGhToken" class="form-label fs-7 fw-semibold">GitHub Token (Bearer)</label>
                        <input type="password" class="form-control fs-7" id="inputGhToken" placeholder="ghp_xxxxxxxxxxxxxxxxxxxx">
                        <span class="fs-8 text-muted mt-1 d-block">Token disimpan aman di LocalStorage browser Anda saja.</span>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-danger btn-sm px-3" id="btnClearGhToken">Clear Token</button>
                    <button type="button" class="btn btn-primary btn-sm px-4 fw-semibold" id="btnSaveGhToken">Save & Connect</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Application Script (jQuery version) -->
    <script src="../assets/js/app.js"></script>
    <!-- Documentation Tracker Script -->
    <script src="../assets/js/doc-tracker.js"></script>
</body>

</html>
