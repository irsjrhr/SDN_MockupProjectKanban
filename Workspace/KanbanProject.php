<?php
$currentPage = 'kanban-project';
$currentModule = 'workspace';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanban Project - Workspace - Syncboard</title>

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
                            <li class="breadcrumb-item text-muted"><a href="dashboard.php" class="text-muted text-decoration-none">Workspace</a></li>
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Kanban Project</li>
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
                            <li><a class="dropdown-menu-item dropdown-item fs-7" href="../Setting/"><i class="fa-solid fa-gear me-2"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-menu-item dropdown-item text-danger fs-7" href="#"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </header>

            <!-- Project Banner Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary">
                        <i class="fa-solid fa-layer-group fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Kanban Project</h1>
                        <span class="text-muted fs-7">Master Workspace Portfolio, Project List & Cross-Project Board</span>
                    </div>
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

                    <button class="btn btn-outline-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#newProjectModal">
                        <i class="fa-solid fa-folder-plus"></i> New Project
                    </button>
                    <button class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm" id="btnNewTask">
                        <i class="fa-solid fa-plus"></i> New Task
                    </button>
                </div>
            </section>

            <!-- Toolbar Controls Bar (3 Views) -->
            <div class="toolbar-container px-4 pb-3 border-bottom d-flex flex-nowrap align-items-center gap-3 overflow-x-auto" id="toolbar-container">
                <div class="nav nav-pills view-tabs gap-2 flex-nowrap" id="viewTabs">
                    <!-- Tab 1: Dashboard -->
                    <button class="nav-link active tab-btn fw-semibold py-2 px-3 rounded-3" data-view="dashboard">
                        <i class="fa-solid fa-chart-pie me-1"></i> Dashboard
                    </button>
                    <!-- Tab 2: Board & List -->
                    <button class="nav-link tab-btn fw-semibold py-2 px-3 rounded-3" data-view="board-list">
                        <i class="fa-solid fa-table-cells-large me-1"></i> Board & List
                    </button>
                    <!-- Tab 3: Calendar & Timeline -->
                    <button class="nav-link tab-btn fw-semibold py-2 px-3 rounded-3" data-view="calendar">
                        <i class="fa-regular fa-calendar-days me-1"></i> Calendar & Timeline
                    </button>
                </div>
            </div>

            <!-- View Containers -->
            <div class="view-wrapper flex-grow-1 p-4">

                <!-- 1. DASHBOARD VIEW -->
                <div class="view-content active" id="viewDashboard">
                    <!-- Stat Cards Grid -->
                    <div class="row g-3 mb-4">
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="card shadow-sm border rounded-4 p-3 bg-white">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div>
                                        <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Total Projects</span>
                                        <h3 class="h4 fw-extrabold mb-0">5 Active</h3>
                                    </div>
                                    <div class="stat-icon bg-primary-subtle text-primary rounded-3 p-3 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-folder-tree fs-4"></i>
                                    </div>
                                </div>
                                <span class="fs-8 text-success fw-semibold"><i class="fa-solid fa-arrow-trend-up"></i> +2 new this month</span>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="card shadow-sm border rounded-4 p-3 bg-white">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div>
                                        <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Master Tasks</span>
                                        <h3 class="h4 fw-extrabold text-dark mb-0" id="dashTotalTasks">11</h3>
                                    </div>
                                    <div class="stat-icon bg-info-subtle text-info rounded-3 p-3 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-list-check fs-4"></i>
                                    </div>
                                </div>
                                <span class="fs-8 text-muted fw-semibold">Across all active workspaces</span>
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
                                    <div class="stat-icon bg-warning-subtle text-warning rounded-3 p-3 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-users fs-4"></i>
                                    </div>
                                </div>
                                <span class="fs-8 text-success fw-semibold"><i class="fa-solid fa-check"></i> 4 Team Members Assigned</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project Analytics Row -->
                    <div class="row g-4">
                        <div class="col-12 col-lg-7">
                            <div class="card shadow-sm border rounded-4 p-4 bg-white h-100">
                                <h2 class="h6 fw-bold mb-3">Portfolio Status Distribution</h2>
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
                                <h2 class="h6 fw-bold mb-3">Recent Project Activities</h2>
                                <div class="activity-feed d-flex flex-column gap-3 fs-7">
                                    <div class="d-flex gap-2 align-items-start">
                                        <span class="badge rounded-circle bg-success p-2 mt-1"><i class="fa-solid fa-check fs-8 text-white"></i></span>
                                        <div>
                                            <span class="fw-bold text-dark">Middleware Project</span> milestone achieved.
                                            <span class="d-block fs-8 text-muted">2 hours ago</span>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2 align-items-start">
                                        <span class="badge rounded-circle bg-primary p-2 mt-1"><i class="fa-solid fa-plus fs-8 text-white"></i></span>
                                        <div>
                                            <span class="fw-bold text-dark">Company Website</span> added 3 new project tasks.
                                            <span class="d-block fs-8 text-muted">5 hours ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. UNIFIED BOARD & LIST PROJECT VIEW -->
                <div class="view-content" id="viewBoardList">
                    <div class="card shadow-sm border rounded-4 p-4 mb-4 bg-white">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 pb-3 border-bottom">
                            <div>
                                <h2 class="h5 fw-bold mb-0">Board & List Project View</h2>
                                <span class="fs-8 text-muted">Switch between Master Project Kanban Board and Project Data Table List</span>
                            </div>
                            <!-- Subtabs Toggle: Board vs List -->
                            <div class="nav nav-pills board-list-subtabs p-1 bg-light rounded-3 border" id="boardListSubTabs">
                                <button class="nav-link active bl-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="board">
                                    <i class="fa-solid fa-table-cells-large me-1"></i> Board
                                </button>
                                <button class="nav-link bl-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="list">
                                    <i class="fa-solid fa-list me-1"></i> List
                                </button>
                            </div>
                        </div>

                        <!-- Subview 1: Project Board Grid (Kanban Columns) -->
                        <div class="board-list-subview active" id="subviewBoardGrid">
                            <div class="row g-4 kanban-board" id="projectKanbanBoard">
                                <!-- Column: Planning / To Do -->
                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="kanban-column bg-light-subtle rounded-4 p-3 border d-flex flex-column h-100" data-status="todo">
                                        <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                                            <div class="d-flex align-items-center">
                                                <span class="dot dot-todo me-2"></span>
                                                <h3 class="column-title h6 fw-bold mb-0 me-2">Planning / To Do</h3>
                                                <span class="column-badge badge-todo rounded-pill px-2 py-1 fs-8 fw-bold" id="projColCountTodo">0</span>
                                            </div>
                                            <button class="btn btn-sm btn-icon-sm text-muted" data-bs-toggle="modal" data-bs-target="#newProjectModal" title="New Project">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="project-cards-list d-flex flex-column gap-3 flex-grow-1" id="projColListTodo" data-status="todo"></div>
                                    </div>
                                </div>

                                <!-- Column: In Development -->
                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="kanban-column bg-light-subtle rounded-4 p-3 border d-flex flex-column h-100" data-status="in-progress">
                                        <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                                            <div class="d-flex align-items-center">
                                                <span class="dot dot-progress me-2"></span>
                                                <h3 class="column-title h6 fw-bold mb-0 me-2">In Development</h3>
                                                <span class="column-badge badge-progress rounded-pill px-2 py-1 fs-8 fw-bold" id="projColCountProgress">0</span>
                                            </div>
                                            <button class="btn btn-sm btn-icon-sm text-muted" data-bs-toggle="modal" data-bs-target="#newProjectModal" title="New Project">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="project-cards-list d-flex flex-column gap-3 flex-grow-1" id="projColListProgress" data-status="in-progress"></div>
                                    </div>
                                </div>

                                <!-- Column: Testing & Review -->
                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="kanban-column bg-light-subtle rounded-4 p-3 border d-flex flex-column h-100" data-status="review">
                                        <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                                            <div class="d-flex align-items-center">
                                                <span class="dot dot-review me-2"></span>
                                                <h3 class="column-title h6 fw-bold mb-0 me-2">Testing & Review</h3>
                                                <span class="column-badge badge-review rounded-pill px-2 py-1 fs-8 fw-bold" id="projColCountReview">0</span>
                                            </div>
                                            <button class="btn btn-sm btn-icon-sm text-muted" data-bs-toggle="modal" data-bs-target="#newProjectModal" title="New Project">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="project-cards-list d-flex flex-column gap-3 flex-grow-1" id="projColListReview" data-status="review"></div>
                                    </div>
                                </div>

                                <!-- Column: Completed / Released -->
                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="kanban-column bg-light-subtle rounded-4 p-3 border d-flex flex-column h-100" data-status="completed">
                                        <div class="column-header d-flex align-items-center justify-content-between mb-3 px-1">
                                            <div class="d-flex align-items-center">
                                                <span class="dot dot-complete me-2"></span>
                                                <h3 class="column-title h6 fw-bold mb-0 me-2">Completed</h3>
                                                <span class="column-badge badge-complete rounded-pill px-2 py-1 fs-8 fw-bold" id="projColCountComplete">0</span>
                                            </div>
                                            <button class="btn btn-sm btn-icon-sm text-muted" data-bs-toggle="modal" data-bs-target="#newProjectModal" title="New Project">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="project-cards-list d-flex flex-column gap-3 flex-grow-1" id="projColListComplete" data-status="completed"></div>
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
                                            <input type="text" class="form-control border-start-0 fs-7" placeholder="Search project name, category, or lead...">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7 d-flex flex-wrap align-items-center justify-content-md-end gap-2">
                                        <select class="form-select form-select-sm fs-7 w-auto">
                                            <option value="">All Categories</option>
                                            <option value="ecommerce">E-Commerce</option>
                                            <option value="corporate">Corporate Web</option>
                                            <option value="marketing">Marketing Campaign</option>
                                            <option value="mobile">Mobile Application</option>
                                        </select>
                                        <select class="form-select form-select-sm fs-7 w-auto">
                                            <option value="">All Statuses</option>
                                            <option value="active">Active</option>
                                            <option value="completed">Completed</option>
                                            <option value="in-review">In Review</option>
                                        </select>
                                        <button class="btn btn-primary btn-sm fs-7" data-bs-toggle="modal" data-bs-target="#newProjectModal">
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
                                                <th>Category</th>
                                                <th>Project Lead</th>
                                                <th>Team Members</th>
                                                <th>Tasks Progress</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                                <th class="pe-4 text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fs-7">
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
                                                            <a href="KanbanProject.php" class="fw-bold text-dark text-decoration-none d-block">Middleware Project</a>
                                                            <span class="text-muted fs-8">Syncboard core middleware architecture</span>
                                                        </div>
                                                    </div>
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
                                                        <a href="KanbanProject.php" class="btn btn-light border" title="Open Kanban"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                                        <button class="btn btn-light border" title="Edit"><i class="fa-solid fa-pen"></i></button>
                                                        <button class="btn btn-light text-danger border" title="Delete"><i class="fa-solid fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>

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
                                                            <a href="KanbanProject.php?project=company" class="fw-bold text-dark text-decoration-none d-block">Company Website</a>
                                                            <span class="text-muted fs-8">Corporate redesign & investor portal</span>
                                                        </div>
                                                    </div>
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
                                                <td><span class="badge bg-warning bg-opacity-10 text-warning border border-warning px-2.5 py-1">Review</span></td>
                                                <td class="pe-4 text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="KanbanProject.php?project=company" class="btn btn-light border" title="Open Kanban"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                                        <button class="btn btn-light border" title="Edit"><i class="fa-solid fa-pen"></i></button>
                                                        <button class="btn btn-light text-danger border" title="Delete"><i class="fa-solid fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>

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
                                                            <a href="KanbanProject.php?project=landing" class="fw-bold text-dark text-decoration-none d-block">Landing Page Campaign</a>
                                                            <span class="text-muted fs-8">Q4 Product launch marketing page</span>
                                                        </div>
                                                    </div>
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
                                                <td><span class="badge bg-primary bg-opacity-10 text-primary border border-primary px-2.5 py-1">In Progress</span></td>
                                                <td class="pe-4 text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="KanbanProject.php?project=landing" class="btn btn-light border" title="Open Kanban"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
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

                <!-- 3. CALENDAR & TIMELINE VIEW (FOR PROJECTS) -->
                <div class="view-content" id="viewCalendar">
                    <div class="card shadow-sm border rounded-4 p-4 calendar-wrapper bg-white">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 pb-3 border-bottom">
                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                <h2 class="h5 fw-bold mb-0" id="projectCalendarMonthTitle">September 2026</h2>

                                <!-- Subtabs Toggle: Project Calendar Grid vs Project Gantt Timeline vs Project Timeline Scheduler -->
                                <div class="nav nav-pills calendar-subtabs p-1 bg-light rounded-3 border" id="projectCalendarSubTabs">
                                    <button class="nav-link active cal-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="grid">
                                        <i class="fa-regular fa-calendar-days me-1"></i> View by Calendar
                                    </button>
                                    <button class="nav-link cal-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="timeline">
                                        <i class="fa-solid fa-chart-gantt me-1"></i> View by Timeline
                                    </button>
                                    <button class="nav-link cal-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="schedule-manager">
                                        <i class="fa-solid fa-sliders me-1"></i> Project Timeline Scheduler
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

                        <!-- 1. Subview: Project Calendar Grid -->
                        <div class="calendar-subview-content active" id="subviewProjGrid">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="fs-8 text-muted fw-semibold"><i class="fa-solid fa-circle-info text-primary me-1"></i> Klik pada proyek untuk membuka papan Kanban Task atau mengubah jadwal timeline.</span>
                                <div class="d-flex align-items-center gap-2 fs-8">
                                    <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-todo p-1 rounded-circle"></span> To Do / Plan</span>
                                    <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-progress p-1 rounded-circle"></span> In Progress</span>
                                    <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-review p-1 rounded-circle"></span> Review</span>
                                    <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-complete p-1 rounded-circle"></span> Complete</span>
                                </div>
                            </div>
                            <div class="calendar-grid d-grid gap-2" id="projectCalendarGrid" style="grid-template-columns: repeat(7, 1fr);">
                                <!-- Dynamic Calendar Cells -->
                            </div>
                        </div>

                        <!-- 2. Subview: Project Timeline Schedule (Gantt) -->
                        <div class="calendar-subview-content" id="subviewProjTimeline">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3 p-2 bg-light-subtle rounded-3 border">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="fs-8 fw-bold text-uppercase text-muted">Project Status Filter:</span>
                                    <select class="form-select form-select-sm fs-8 w-auto py-1" id="projectTimelineStatusFilter">
                                        <option value="all">All Statuses</option>
                                        <option value="todo">Planning / To Do</option>
                                        <option value="in-progress">In Progress</option>
                                        <option value="review">Review</option>
                                        <option value="completed">Complete</option>
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
                                        <span class="w-25">Week 1 (Sep 1 - 7)</span>
                                        <span class="w-25">Week 2 (Sep 8 - 14)</span>
                                        <span class="w-25">Week 3 (Sep 15 - 21)</span>
                                        <span class="w-25">Week 4 (Sep 22 - 30)</span>
                                    </div>
                                    <div style="width: 170px; flex-shrink: 0;" class="text-end">Lead & Actions</div>
                                </div>
                                <div class="timeline-body d-flex flex-column gap-2" id="projectTimelineList">
                                    <!-- Dynamic Project Timeline Rows rendered via jQuery -->
                                </div>
                            </div>
                        </div>

                        <!-- 3. Subview: Project Timeline Scheduler / Configurator -->
                        <div class="calendar-subview-content" id="subviewProjScheduleManager">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3 p-3 bg-primary-subtle rounded-3 border border-primary-subtle">
                                <div>
                                    <h6 class="fw-bold text-primary mb-1"><i class="fa-solid fa-sliders me-1"></i> Per-Project Timeline & Schedule Manager</h6>
                                    <p class="fs-8 text-secondary mb-0">Atur langsung tanggal mulai (Start Date), target selesai (Due Date), durasi hari, dan prioritas untuk setiap portfolio proyek di bawah ini.</p>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <button class="btn btn-sm btn-outline-primary bg-white fs-8 fw-semibold" id="btnResetProjectTimelines">
                                        <i class="fa-solid fa-rotate me-1"></i> Reset Default Timelines
                                    </button>
                                </div>
                            </div>

                            <div class="table-responsive border rounded-3 bg-white">
                                <table class="table table-hover align-middle mb-0 timeline-schedule-table">
                                    <thead>
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
                            <input type="text" class="form-control fs-7" id="taskTitle" placeholder="e.g. Master Architecture Planning" required>
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
                                <label for="taskTagsInput" class="form-label fs-7 fw-semibold">Tags (comma separated)</label>
                                <input type="text" class="form-control fs-7" id="taskTagsInput" placeholder="Design UI/UX, Backend">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fs-7 fw-semibold">Assign Team Members</label>
                            <div class="row g-2" id="memberSelectorGrid"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fs-7 fw-semibold">Subtasks</label>
                            <div class="d-flex flex-column gap-2" id="subtaskInputsList"></div>
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

    <!-- BOOTSTRAP 5 MODAL: CREATE NEW PROJECT -->
    <div class="modal fade" id="newProjectModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg p-2">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">Create New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fs-7 fw-semibold">Project Name *</label>
                            <input type="text" class="form-control fs-7" placeholder="e.g. Mobile E-Commerce App" required>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label class="form-label fs-7 fw-semibold">Category</label>
                                <select class="form-select fs-7">
                                    <option value="ecommerce">E-Commerce</option>
                                    <option value="corporate">Corporate Web</option>
                                    <option value="marketing">Marketing Campaign</option>
                                    <option value="mobile">Mobile App</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fs-7 fw-semibold">Project Lead</label>
                                <select class="form-select fs-7">
                                    <option value="Sophia Carter">Sophia Carter</option>
                                    <option value="Michael Anderson">Michael Anderson</option>
                                    <option value="James Wilson">James Wilson</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-7 fw-semibold">Description</label>
                            <textarea class="form-control fs-7" rows="3" placeholder="Brief project summary..."></textarea>
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

    <!-- BOOTSTRAP 5 MODAL: TASK DETAIL & COMMENTS VIEW -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 border-0 shadow-lg p-3">
                <div class="modal-header border-0 pb-0 d-flex align-items-center justify-content-between">
                    <div class="detail-header-tags d-flex flex-wrap gap-1" id="detailTags"></div>
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
                                <ul class="list-group list-group-flush subtask-checklist fs-7" id="detailSubtasksChecklist"></ul>
                            </div>

                            <!-- Comments Stream -->
                            <div class="comments-section">
                                <h3 class="h6 fw-bold mb-3">Activity & Comments</h3>
                                <div class="comments-list d-flex flex-column gap-2 mb-3 overflow-y-auto" id="commentsList" style="max-height: 200px;"></div>
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

                            <div class="mb-3">
                                <label class="form-label fs-8 text-uppercase fw-bold text-muted mb-1">Assignees</label>
                                <div class="d-flex flex-column gap-2" id="detailAssigneesList"></div>
                            </div>
                        </div>
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

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Application Script -->
    <script src="../assets/js/app.js"></script>

    <!-- Master Project Kanban & Timeline Script -->
    <script>
    $(document).ready(function () {
        const DEFAULT_PROJECTS = [
            {
                id: 'proj-mobile',
                title: 'Mobile CRM Application',
                description: 'Native Flutter mobile app for field agents with offline database sync and biometric authentication.',
                category: 'Mobile Application',
                badgeClass: 'badge-company',
                icon: 'fa-solid fa-mobile-screen',
                status: 'todo',
                progress: 15,
                totalTasks: 14,
                doneTasks: 2,
                priority: 'High',
                priorityClass: 'bg-danger-subtle text-danger',
                lead: 'Daniel Johnson',
                members: [
                    'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
                    'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80'
                ],
                startDate: '2026-09-01',
                dueDate: '2027-01-15',
                url: 'KanbanTask.php?project=mobile'
            },
            {
                id: 'proj-middleware',
                title: 'Middleware Project',
                description: 'Syncboard core RESTful API architecture, authorization gate, and enterprise microservices.',
                category: 'E-Commerce / API',
                badgeClass: 'badge-ecommerce',
                icon: 'fa-solid fa-bag-shopping',
                status: 'in-progress',
                progress: 65,
                totalTasks: 12,
                doneTasks: 8,
                priority: 'High',
                priorityClass: 'bg-danger-subtle text-danger',
                lead: 'Sophia Carter',
                members: [
                    'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
                    'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
                    'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80'
                ],
                startDate: '2026-09-05',
                dueDate: '2026-11-15',
                url: 'KanbanTask.php'
            },
            {
                id: 'proj-landing',
                title: 'Landing Page Campaign',
                description: 'Q4 Product launch promotional landing page with high-conversion lead capture and analytics tracking.',
                category: 'Marketing Campaign',
                badgeClass: 'badge-landing',
                icon: 'fa-solid fa-bullhorn',
                status: 'in-progress',
                progress: 40,
                totalTasks: 8,
                doneTasks: 3,
                priority: 'Medium',
                priorityClass: 'bg-warning-subtle text-warning',
                lead: 'Sophia Carter',
                members: [
                    'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
                    'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80'
                ],
                startDate: '2026-09-01',
                dueDate: '2026-09-20',
                url: 'KanbanTask.php?project=landing'
            },
            {
                id: 'proj-company',
                title: 'Company Website',
                description: 'Corporate redesign, shareholder and investor relations portal, case studies, and blog CMS.',
                category: 'Corporate Web',
                badgeClass: 'badge-company',
                icon: 'fa-solid fa-globe',
                status: 'review',
                progress: 90,
                totalTasks: 10,
                doneTasks: 9,
                priority: 'Medium',
                priorityClass: 'bg-warning-subtle text-warning',
                lead: 'Michael Anderson',
                members: [
                    'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=80&q=80',
                    'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80'
                ],
                startDate: '2026-09-08',
                dueDate: '2026-10-30',
                url: 'KanbanTask.php?project=company'
            },
            {
                id: 'proj-analytics',
                title: 'Internal Analytics Tool',
                description: 'Real-time telemetry and data lake visualization dashboard for engineering operations.',
                category: 'DevOps & Data',
                badgeClass: 'badge-ecommerce',
                icon: 'fa-solid fa-chart-line',
                status: 'completed',
                progress: 100,
                totalTasks: 10,
                doneTasks: 10,
                priority: 'Normal',
                priorityClass: 'bg-success-subtle text-success',
                lead: 'James Wilson',
                members: [
                    'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
                    'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80'
                ],
                startDate: '2026-09-01',
                dueDate: '2026-09-25',
                url: 'KanbanTask.php?project=analytics'
            }
        ];

        let MASTER_PROJECTS = JSON.parse(JSON.stringify(DEFAULT_PROJECTS));

        function showProjectToast(msg) {
            $('#projectToastMsg').text(msg);
            const toastEl = document.getElementById('projectLiveToast');
            if (toastEl) {
                const toast = bootstrap.Toast.getOrCreateInstance(toastEl);
                toast.show();
            }
        }

        function calculateDays(startStr, dueStr) {
            try {
                const s = new Date(startStr);
                const d = new Date(dueStr);
                const diffTime = d - s;
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                return diffDays > 0 ? diffDays : 1;
            } catch (e) {
                return 1;
            }
        }

        function formatDisplayDate(dateStr) {
            if (!dateStr) return '';
            const d = new Date(dateStr);
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            return `${months[d.getMonth()]} ${String(d.getDate()).padStart(2, '0')}, ${d.getFullYear()}`;
        }

        function formatShortDate(dateStr) {
            if (!dateStr) return '';
            const d = new Date(dateStr);
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            return `${months[d.getMonth()]} ${String(d.getDate()).padStart(2, '0')}`;
        }

        /* -------------------------------------------------------------------------- */
        /* 1. TOP VIEW TABS SWITCHER (Dashboard, Board & List, Calendar & Timeline)   */
        /* -------------------------------------------------------------------------- */
        $('#viewTabs .tab-btn').on('click', function () {
            $('#viewTabs .tab-btn').removeClass('active');
            $(this).addClass('active');

            const view = $(this).data('view');
            $('.view-wrapper .view-content').removeClass('active');

            if (view === 'dashboard') {
                $('#viewDashboard').addClass('active');
            } else if (view === 'board-list') {
                $('#viewBoardList').addClass('active');
                renderProjectKanban();
            } else if (view === 'calendar') {
                $('#viewCalendar').addClass('active');
                renderProjectCalendar();
                renderProjectTimeline();
                renderProjectTimelineSchedulerTable();
            }
        });

        /* -------------------------------------------------------------------------- */
        /* 2. CALENDAR SUBTABS SWITCHER (Grid vs Timeline vs Schedule Manager)        */
        /* -------------------------------------------------------------------------- */
        $('#projectCalendarSubTabs .cal-subtab-btn').on('click', function () {
            $('#projectCalendarSubTabs .cal-subtab-btn').removeClass('active');
            $(this).addClass('active');

            const subview = $(this).data('subview');
            $('#viewCalendar .calendar-subview-content').removeClass('active');

            if (subview === 'grid') {
                $('#subviewProjGrid').addClass('active');
                renderProjectCalendar();
            } else if (subview === 'timeline') {
                $('#subviewProjTimeline').addClass('active');
                renderProjectTimeline();
            } else if (subview === 'schedule-manager') {
                $('#subviewProjScheduleManager').addClass('active');
                renderProjectTimelineSchedulerTable();
            }
        });

        /* -------------------------------------------------------------------------- */
        /* 3. RENDER PROJECT KANBAN BOARD (DRAG & DROP)                               */
        /* -------------------------------------------------------------------------- */
        function renderProjectKanban() {
            const containers = {
                todo: $('#projColListTodo').empty(),
                'in-progress': $('#projColListProgress').empty(),
                review: $('#projColListReview').empty(),
                completed: $('#projColListComplete').empty()
            };

            const counts = { todo: 0, 'in-progress': 0, review: 0, completed: 0 };

            MASTER_PROJECTS.forEach(proj => {
                counts[proj.status] = (counts[proj.status] || 0) + 1;
                const membersHtml = proj.members.map(avatar => `<img src="${avatar}" class="avatar-xs rounded-circle border border-white" alt="Member">`).join('');
                
                const $card = $(`
                    <div class="card border rounded-3 p-3 bg-white shadow-sm project-card-item cursor-grab" draggable="true" data-id="${proj.id}">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="badge ${proj.badgeClass} rounded-pill px-2.5 py-1 fs-8 fw-semibold">
                                <i class="${proj.icon} me-1"></i> ${proj.category}
                            </span>
                            <span class="badge ${proj.priorityClass} rounded-pill px-2 py-0.5 fs-8 fw-semibold">${proj.priority}</span>
                        </div>
                        <h4 class="h6 fw-bold mb-1">
                            <a href="${proj.url}" class="text-dark text-decoration-none">${proj.title}</a>
                        </h4>
                        <p class="text-muted fs-8 mb-3 text-truncate-2">${proj.description}</p>
                        
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between fs-8 mb-1">
                                <span class="text-muted"><i class="fa-solid fa-list-check me-1"></i> ${proj.doneTasks}/${proj.totalTasks} Tasks</span>
                                <span class="fw-bold text-dark">${proj.progress}%</span>
                            </div>
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar ${proj.progress === 100 ? 'bg-success' : 'bg-primary'}" style="width: ${proj.progress}%;"></div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                            <div class="team-avatars-stack d-flex align-items-center">
                                ${membersHtml}
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="fs-8 text-muted"><i class="fa-regular fa-calendar me-1"></i> ${formatShortDate(proj.dueDate)}</span>
                                <a href="${proj.url}" class="btn btn-sm btn-light border p-1 rounded-2" title="Open Project Task Board">
                                    <i class="fa-solid fa-arrow-up-right-from-square fs-8 text-primary"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                `);

                if (containers[proj.status]) {
                    containers[proj.status].append($card);
                }
            });

            $('#projColCountTodo').text(counts.todo);
            $('#projColCountProgress').text(counts['in-progress']);
            $('#projColCountReview').text(counts.review);
            $('#projColCountComplete').text(counts.completed);

            initProjectDragAndDrop();
        }

        function initProjectDragAndDrop() {
            $('.project-card-item').on('dragstart', function (e) {
                e.originalEvent.dataTransfer.setData('text/plain', $(this).data('id'));
                $(this).addClass('opacity-50');
            }).on('dragend', function () {
                $(this).removeClass('opacity-50');
            });

            $('.project-cards-list').on('dragover', function (e) {
                e.preventDefault();
                $(this).closest('.kanban-column').addClass('border-primary');
            }).on('dragleave', function () {
                $(this).closest('.kanban-column').removeClass('border-primary');
            }).on('drop', function (e) {
                e.preventDefault();
                $(this).closest('.kanban-column').removeClass('border-primary');
                const projId = e.originalEvent.dataTransfer.getData('text/plain');
                const targetStatus = $(this).data('status');
                const proj = MASTER_PROJECTS.find(p => p.id === projId);
                if (proj && targetStatus) {
                    proj.status = targetStatus;
                    renderProjectKanban();
                    renderProjectTimeline();
                    showProjectToast(`Project "${proj.title}" moved to ${targetStatus.toUpperCase()}`);
                }
            });
        }

        /* -------------------------------------------------------------------------- */
        /* 4. RENDER PROJECT CALENDAR GRID (SEPTEMBER 2026)                          */
        /* -------------------------------------------------------------------------- */
        function renderProjectCalendar() {
            const $grid = $('#projectCalendarGrid').empty();
            const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

            // Header Row (Day names)
            $.each(daysOfWeek, function (_, day) {
                $grid.append(`<div class="cal-day-header text-muted fw-bold fs-8 text-center p-2 text-uppercase bg-light rounded-2">${day}</div>`);
            });

            // 35 Calendar Cells (Sep 2026 starts on Tue -> offset 2, ends on Wed -> 30 days)
            for (let i = 1; i <= 35; i++) {
                let dayNum;
                let isCurrentMonth = true;
                let dateStr = '';

                if (i <= 2) {
                    dayNum = 29 + i; // Aug 30, Aug 31
                    isCurrentMonth = false;
                    dateStr = `2026-08-${String(dayNum).padStart(2, '0')}`;
                } else if (i > 32) {
                    dayNum = i - 32; // Oct 1, Oct 2, Oct 3
                    isCurrentMonth = false;
                    dateStr = `2026-10-${String(dayNum).padStart(2, '0')}`;
                } else {
                    dayNum = i - 2; // Sep 1 - Sep 30
                    dateStr = `2026-09-${String(dayNum).padStart(2, '0')}`;
                }

                const $cell = $('<div>', {
                    class: `cal-cell ${isCurrentMonth ? '' : 'bg-light-subtle opacity-75'}`
                });

                const $cellHeader = $(`
                    <div class="cal-cell-header">
                        <span class="cal-date-num ${dayNum === 15 && isCurrentMonth ? 'badge bg-primary text-white p-1 rounded-circle' : ''}">${dayNum}</span>
                        ${isCurrentMonth ? `<button class="btn btn-sm btn-link text-decoration-none cal-cell-add-btn text-muted" title="Add Project on Sep ${dayNum}"><i class="fa-solid fa-plus"></i></button>` : ''}
                    </div>
                `);

                $cellHeader.find('.cal-cell-add-btn').on('click', function (e) {
                    e.stopPropagation();
                    $('#newProjectModal').modal('show');
                });

                $cell.append($cellHeader);

                // Find projects active on this date
                if (isCurrentMonth) {
                    const thisDate = new Date(dateStr);
                    const dayProjects = MASTER_PROJECTS.filter(p => {
                        const start = new Date(p.startDate || '2026-09-01');
                        const due = new Date(p.dueDate || '2026-09-30');
                        return start <= thisDate && thisDate <= due;
                    });

                    $.each(dayProjects.slice(0, 3), function (_, proj) {
                        const statusClass = `badge-${proj.status === 'completed' ? 'complete' : proj.status === 'in-progress' ? 'progress' : proj.status}`;
                        const $pill = $('<div>', {
                            class: `cal-task-pill ${statusClass} text-truncate d-flex align-items-center gap-1 shadow-2xs cursor-pointer`,
                            title: `${proj.title} (${formatShortDate(proj.startDate)} - ${formatShortDate(proj.dueDate)})`
                        });
                        $pill.html(`<i class="${proj.icon} fs-9"></i> <span class="fw-semibold">${proj.title}</span>`);
                        $pill.on('click', function (e) {
                            e.stopPropagation();
                            window.location.href = proj.url;
                        });
                        $cell.append($pill);
                    });

                    if (dayProjects.length > 3) {
                        $cell.append(`<span class="fs-9 text-muted fw-bold">+${dayProjects.length - 3} more</span>`);
                    }
                }

                $grid.append($cell);
            }
        }

        /* -------------------------------------------------------------------------- */
        /* 5. RENDER PROJECT TIMELINE (GANTT BARS)                                    */
        /* -------------------------------------------------------------------------- */
        function renderProjectTimeline() {
            const $list = $('#projectTimelineList').empty();
            const filter = $('#projectTimelineStatusFilter').val() || 'all';

            const filteredProjects = MASTER_PROJECTS.filter(p => {
                if (filter === 'all') return true;
                return p.status === filter;
            });

            if (filteredProjects.length === 0) {
                $list.html('<div class="text-center text-muted p-4 fs-7"><i class="fa-regular fa-folder-open me-2"></i> No projects found matching filter.</div>');
                return;
            }

            const statusClassMap = {
                todo: 'timeline-bar-todo',
                'in-progress': 'timeline-bar-progress',
                review: 'timeline-bar-review',
                completed: 'timeline-bar-complete'
            };

            const statusBadgeMap = {
                todo: '<span class="badge badge-todo rounded-pill px-2 py-0.5 fs-8 me-1.5">Planning</span>',
                'in-progress': '<span class="badge badge-progress rounded-pill px-2 py-0.5 fs-8 me-1.5">In Progress</span>',
                review: '<span class="badge badge-review rounded-pill px-2 py-0.5 fs-8 me-1.5">Review</span>',
                completed: '<span class="badge badge-complete rounded-pill px-2 py-0.5 fs-8 me-1.5">Complete</span>'
            };

            $.each(filteredProjects, function (_, proj) {
                const startObj = new Date(proj.startDate || '2026-09-01');
                const dueObj = new Date(proj.dueDate || '2026-09-30');
                const startDay = Math.min(30, Math.max(1, startObj.getDate()));
                const duration = calculateDays(proj.startDate || '2026-09-01', proj.dueDate || '2026-09-30');

                const startMargin = ((startDay - 1) / 30) * 100;
                const widthPercent = Math.max(12, Math.min(100 - startMargin, (duration / 30) * 100));

                const priorityClass = `badge-priority-${proj.priority ? proj.priority.toLowerCase() : 'medium'}`;
                const membersHtml = proj.members.map(avatar => `<img src="${avatar}" class="avatar-xs rounded-circle me-1" alt="Member">`).join('');

                const $row = $('<div>', { class: 'gantt-grid-row gap-3' });
                $row.html(`
                    <!-- Project Title & Date Range -->
                    <div class="d-flex flex-column" style="min-width: 0;">
                        <div class="d-flex align-items-center gap-1.5">
                            <i class="${proj.icon} text-primary fs-8"></i>
                            <a href="${proj.url}" class="fw-bold fs-7 text-dark text-truncate text-decoration-none" title="${proj.title}">${proj.title}</a>
                        </div>
                        <div class="d-flex align-items-center gap-1 mt-1 flex-wrap">
                            ${statusBadgeMap[proj.status] || ''}
                            <span class="badge ${proj.badgeClass} fs-9">${proj.category}</span>
                            <span class="fs-8 text-muted fw-semibold">${formatShortDate(proj.startDate)} - ${formatShortDate(proj.dueDate)} (${duration}d)</span>
                        </div>
                    </div>

                    <!-- Gantt Timeline Bar -->
                    <div class="px-2">
                        <div class="timeline-bar-track position-relative" style="height: 20px; border-radius: 999px;">
                            <div class="timeline-bar-fill ${statusClassMap[proj.status] || 'timeline-bar-progress'} d-flex align-items-center justify-content-between text-white fs-9 fw-bold px-2 text-truncate" 
                                 style="width: ${widthPercent}%; margin-left: ${startMargin}%; height: 100%; border-radius: 999px;"
                                 title="${proj.title}: ${proj.startDate} to ${proj.dueDate} (${duration} days - ${proj.progress}%)">
                                <span>${duration >= 5 ? `${duration}d` : ''}</span>
                                <span class="badge bg-dark bg-opacity-25 fs-9 py-0.5 px-1.5 rounded-pill">${proj.progress}%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Actions & Lead -->
                    <div class="d-flex align-items-center justify-content-end gap-2">
                        <div class="card-assignees">${membersHtml}</div>
                        <button class="btn btn-sm btn-outline-primary py-0.5 px-2 fs-8 btn-proj-adjust-timeline" title="Adjust Project Timeline">
                            <i class="fa-solid fa-sliders"></i>
                        </button>
                        <a href="${proj.url}" class="btn btn-sm btn-light border py-0.5 px-2 fs-8" title="Open Task Board">
                            <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i>
                        </a>
                    </div>
                `);

                $row.find('.btn-proj-adjust-timeline').on('click', function (e) {
                    e.stopPropagation();
                    $('#projectCalendarSubTabs .cal-subtab-btn[data-subview="schedule-manager"]').trigger('click');
                    setTimeout(() => {
                        const $targetRow = $(`#row-projschedule-${proj.id}`);
                        if ($targetRow.length) {
                            $targetRow[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                            $targetRow.addClass('table-primary');
                            setTimeout(() => $targetRow.removeClass('table-primary'), 1500);
                        }
                    }, 50);
                });

                $list.append($row);
            });
        }

        $('#projectTimelineStatusFilter').on('change', function () {
            renderProjectTimeline();
        });

        /* -------------------------------------------------------------------------- */
        /* 6. RENDER PROJECT TIMELINE SCHEDULER TABLE (INLINE DATE ADJUSTMENT)        */
        /* -------------------------------------------------------------------------- */
        function renderProjectTimelineSchedulerTable() {
            const $tbody = $('#projectTimelineSchedulerTableBody').empty();

            const statusBadgeMap = {
                todo: '<span class="badge badge-todo rounded-pill px-2 py-1 fs-8">Planning</span>',
                'in-progress': '<span class="badge badge-progress rounded-pill px-2 py-1 fs-8">In Progress</span>',
                review: '<span class="badge badge-review rounded-pill px-2 py-1 fs-8">Review</span>',
                completed: '<span class="badge badge-complete rounded-pill px-2 py-1 fs-8">Complete</span>'
            };

            $.each(MASTER_PROJECTS, function (_, proj) {
                const startDateVal = proj.startDate || '2026-09-01';
                const dueDateVal = proj.dueDate || '2026-09-30';
                const priorityVal = proj.priority || 'Medium';
                const durationDays = calculateDays(startDateVal, dueDateVal);

                const $tr = $('<tr>', { id: `row-projschedule-${proj.id}` });
                $tr.html(`
                    <!-- Project Title -->
                    <td class="py-2.5 px-3">
                        <div class="d-flex align-items-center gap-2">
                            <i class="${proj.icon} text-primary fs-7"></i>
                            <div>
                                <a href="${proj.url}" class="fw-bold text-dark text-decoration-none d-block">${proj.title}</a>
                                <span class="fs-8 text-muted">${proj.lead} &bull; ${proj.doneTasks}/${proj.totalTasks} Tasks (${proj.progress}%)</span>
                            </div>
                        </div>
                    </td>

                    <!-- Category -->
                    <td class="py-2.5 px-2">
                        <span class="badge ${proj.badgeClass} rounded-pill px-2 py-1 fs-8">${proj.category}</span>
                    </td>

                    <!-- Status -->
                    <td class="py-2.5 px-2">${statusBadgeMap[proj.status] || ''}</td>

                    <!-- Priority Selector -->
                    <td class="py-2.5 px-2">
                        <select class="form-select form-select-sm fs-8 py-1 proj-table-priority" data-proj-id="${proj.id}">
                            <option value="Normal" ${priorityVal === 'Normal' ? 'selected' : ''}>Normal</option>
                            <option value="Medium" ${priorityVal === 'Medium' ? 'selected' : ''}>Medium</option>
                            <option value="High" ${priorityVal === 'High' ? 'selected' : ''}>High</option>
                            <option value="Urgent" ${priorityVal === 'Urgent' ? 'selected' : ''}>Urgent</option>
                        </select>
                    </td>

                    <!-- Start Date Input -->
                    <td class="py-2.5 px-2">
                        <input type="date" class="form-control form-control-sm fs-8 py-1 proj-table-start" data-proj-id="${proj.id}" value="${startDateVal}">
                    </td>

                    <!-- Due Date Input -->
                    <td class="py-2.5 px-2">
                        <input type="date" class="form-control form-control-sm fs-8 py-1 proj-table-due" data-proj-id="${proj.id}" value="${dueDateVal}">
                    </td>

                    <!-- Duration Badge -->
                    <td class="py-2.5 px-2">
                        <span class="badge bg-light text-dark border fs-8 px-2 py-1 proj-duration-badge" id="proj-dur-${proj.id}">
                            <i class="fa-regular fa-clock me-1 text-primary"></i> ${durationDays}d
                        </span>
                    </td>

                    <!-- Quick Preset Adjustments -->
                    <td class="py-2.5 px-2">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-secondary fs-9 py-0.5 px-1.5 btn-proj-preset" data-proj-id="${proj.id}" data-days="7" title="+1 Week">+1w</button>
                            <button class="btn btn-outline-secondary fs-9 py-0.5 px-1.5 btn-proj-preset" data-proj-id="${proj.id}" data-days="14" title="+2 Weeks">+2w</button>
                            <button class="btn btn-outline-secondary fs-9 py-0.5 px-1.5 btn-proj-preset" data-proj-id="${proj.id}" data-days="30" title="+1 Month">+1m</button>
                            <button class="btn btn-outline-primary fs-9 py-0.5 px-1.5 btn-proj-preset" data-proj-id="${proj.id}" data-days="90" title="Quarter Q4">Q4</button>
                        </div>
                    </td>

                    <!-- Actions -->
                    <td class="py-2.5 px-3 text-end">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-light border btn-save-proj-timeline" data-proj-id="${proj.id}" title="Save Timeline Changes">
                                <i class="fa-solid fa-check text-success"></i>
                            </button>
                            <a href="${proj.url}" class="btn btn-light border" title="Go to Task Board">
                                <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i>
                            </a>
                        </div>
                    </td>
                `);

                $tbody.append($tr);
            });

            // Handle date changes
            $('.proj-table-start, .proj-table-due').on('change', function () {
                const projId = $(this).data('proj-id');
                const $row = $(`#row-projschedule-${projId}`);
                const startVal = $row.find('.proj-table-start').val();
                const dueVal = $row.find('.proj-table-due').val();

                if (startVal && dueVal) {
                    const dur = calculateDays(startVal, dueVal);
                    $row.find(`#proj-dur-${projId}`).html(`<i class="fa-regular fa-clock me-1 text-primary"></i> ${dur}d`);

                    const proj = MASTER_PROJECTS.find(p => p.id === projId);
                    if (proj) {
                        proj.startDate = startVal;
                        proj.dueDate = dueVal;
                        showProjectToast(`Updated timeline for "${proj.title}" (${dur} days)`);
                    }
                }
            });

            // Handle priority change
            $('.proj-table-priority').on('change', function () {
                const projId = $(this).data('proj-id');
                const priorityVal = $(this).val();
                const proj = MASTER_PROJECTS.find(p => p.id === projId);
                if (proj) {
                    proj.priority = priorityVal;
                    proj.priorityClass = priorityVal === 'Urgent' || priorityVal === 'High' ? 'bg-danger-subtle text-danger' : priorityVal === 'Medium' ? 'bg-warning-subtle text-warning' : 'bg-success-subtle text-success';
                    showProjectToast(`Priority for "${proj.title}" updated to ${priorityVal}`);
                }
            });

            // Quick Preset buttons
            $('.btn-proj-preset').on('click', function () {
                const projId = $(this).data('proj-id');
                const addDays = parseInt($(this).data('days'), 10);
                const $row = $(`#row-projschedule-${projId}`);
                const startVal = $row.find('.proj-table-start').val() || '2026-09-01';

                const sDate = new Date(startVal);
                sDate.setDate(sDate.getDate() + addDays);
                const newDueStr = sDate.toISOString().split('T')[0];

                $row.find('.proj-table-due').val(newDueStr).trigger('change');
            });

            // Save Timeline button
            $('.btn-save-proj-timeline').on('click', function () {
                const projId = $(this).data('proj-id');
                const proj = MASTER_PROJECTS.find(p => p.id === projId);
                if (proj) {
                    showProjectToast(`Timeline saved for "${proj.title}"!`);
                    renderProjectCalendar();
                    renderProjectTimeline();
                }
            });
        }

        // Reset Timelines to Default
        $('#btnResetProjectTimelines').on('click', function () {
            MASTER_PROJECTS = JSON.parse(JSON.stringify(DEFAULT_PROJECTS));
            renderProjectTimelineSchedulerTable();
            renderProjectCalendar();
            renderProjectTimeline();
            renderProjectKanban();
            showProjectToast('All project timelines reset to default schedule.');
        });

        // Month Navigation Buttons
        $('#btnProjPrevMonth').on('click', function () {
            $('#projectCalendarMonthTitle').text('August 2026');
            showProjectToast('Showing August 2026 calendar view');
        });

        $('#btnProjToday').on('click', function () {
            $('#projectCalendarMonthTitle').text('September 2026');
            renderProjectCalendar();
            showProjectToast('Reset to Current Month: September 2026');
        });

        $('#btnProjNextMonth').on('click', function () {
            $('#projectCalendarMonthTitle').text('October 2026');
            showProjectToast('Showing October 2026 calendar view');
        });

        // Initial render
        renderProjectKanban();
    });
    </script>
</body>

</html>
