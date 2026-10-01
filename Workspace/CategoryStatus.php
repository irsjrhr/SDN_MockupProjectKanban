<?php
$currentStatus = isset($_GET['status']) ? strtolower($_GET['status']) : 'all';
$statusNames = [
    'all' => 'All Categories',
    'todo' => 'To Do Pipeline',
    'in-progress' => 'In Progress Tasks',
    'review' => 'QA & Review Pipeline',
    'completed' => 'Completed Tasks'
];

$pageTitle = ($statusNames[$currentStatus] ?? 'Category Status') . ' - Workspace - Syncboard';
$currentPage = 'category-' . $currentStatus;
$currentModule = 'workspace';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Workspace', 'url' => 'KanbanProject.php'],
    ['title' => 'Category Status', 'url' => 'CategoryStatus.php?status=all'],
    ['title' => ($statusNames[$currentStatus] ?? ucfirst($currentStatus)), 'url' => '']
];
$extraJs = [$basePath . 'assets/js/category-status.js'];
include __DIR__ . '/../layouts/header.php';
?>

            <!-- Page Title Section -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary shadow-sm" style="width: 48px; height: 48px;">
                        <i class="fa-solid fa-tags fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0" id="currentStatusTitle">
                            <?= $statusNames[$currentStatus] ?? 'Category Pipeline Overview' ?>
                        </h1>
                        <span class="text-muted fs-7" id="currentStatusDesc">
                            Aggregated task workload filtered and managed by sprint category status
                        </span>
                    </div>
                </div>

                <div class="project-actions-area d-flex align-items-center gap-2">
                    <a href="KanbanProject.php" class="btn btn-outline-secondary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 fs-7">
                        <i class="fa-solid fa-layer-group"></i> Kanban Board
                    </a>
                    <button class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 fs-7" data-bs-toggle="modal" data-bs-target="#newCategoryTaskModal">
                        <i class="fa-solid fa-plus"></i> New Task
                    </button>
                </div>
            </section>

            <!-- Main Content Area -->
            <div class="view-wrapper flex-grow-1 p-4">

                <!-- Status Filter Navigation Pills -->
                <div class="card shadow-sm border-0 rounded-4 bg-white mb-4 overflow-hidden">
                    <div class="p-2.5 bg-light-subtle border-bottom d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <div class="nav nav-pills gap-1.5 flex-nowrap overflow-x-auto" id="statusFilterTabs">
                            <button class="nav-link status-filter-tab py-1.5 px-3 rounded-3 fs-7 fw-semibold <?= ($currentStatus === 'all') ? 'active' : '' ?>" data-status="all">
                                <span>All Statuses</span> <span class="badge bg-secondary-subtle text-secondary ms-1">11</span>
                            </button>
                            <button class="nav-link status-filter-tab py-1.5 px-3 rounded-3 fs-7 fw-semibold <?= ($currentStatus === 'todo') ? 'active' : '' ?>" data-status="todo">
                                <span class="dot dot-todo me-1.5"></span> To Do <span class="badge bg-danger-subtle text-danger ms-1">3</span>
                            </button>
                            <button class="nav-link status-filter-tab py-1.5 px-3 rounded-3 fs-7 fw-semibold <?= ($currentStatus === 'in-progress') ? 'active' : '' ?>" data-status="in-progress">
                                <span class="dot dot-progress me-1.5"></span> In Progress <span class="badge bg-primary-subtle text-primary ms-1">3</span>
                            </button>
                            <button class="nav-link status-filter-tab py-1.5 px-3 rounded-3 fs-7 fw-semibold <?= ($currentStatus === 'review') ? 'active' : '' ?>" data-status="review">
                                <span class="dot dot-review me-1.5"></span> Review <span class="badge bg-warning-subtle text-warning ms-1">3</span>
                            </button>
                            <button class="nav-link status-filter-tab py-1.5 px-3 rounded-3 fs-7 fw-semibold <?= ($currentStatus === 'completed') ? 'active' : '' ?>" data-status="completed">
                                <span class="dot dot-complete me-1.5"></span> Completed <span class="badge bg-success-subtle text-success ms-1">2</span>
                            </button>
                        </div>

                        <!-- View Switcher (Grid / Table) -->
                        <div class="btn-group btn-group-sm ms-auto" role="group">
                            <button type="button" class="btn btn-primary" id="btnViewGrid" title="Card Grid View"><i class="fa-solid fa-grip"></i></button>
                            <button type="button" class="btn btn-outline-secondary" id="btnViewTable" title="List Table View"><i class="fa-solid fa-list"></i></button>
                        </div>
                    </div>

                    <!-- Toolbar Filters Bar -->
                    <div class="p-3 bg-white d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div class="d-flex flex-wrap align-items-center gap-2 flex-grow-1" style="max-width: 700px;">
                            <div class="input-group input-group-sm flex-grow-1" style="min-width: 220px;">
                                <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" id="categoryTaskSearch" class="form-control border-start-0 ps-0 fs-7" placeholder="Search tasks by title, code, or description...">
                            </div>

                            <select id="categoryProjectFilter" class="form-select form-select-sm fs-7 fw-semibold" style="width: 200px;">
                                <option value="all" selected>All Workspace Projects</option>
                                <option value="middleware">Middleware Project</option>
                                <option value="company">Company Website</option>
                                <option value="landing">Landing Campaign</option>
                                <option value="mobile">Mobile CRM App</option>
                                <option value="analytics">Analytics Tool</option>
                            </select>

                            <select id="categoryPriorityFilter" class="form-select form-select-sm fs-7 fw-semibold" style="width: 140px;">
                                <option value="all" selected>All Priority</option>
                                <option value="urgent">Urgent</option>
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                        </div>

                        <div class="d-flex align-items-center gap-2 text-muted fs-8">
                            <i class="fa-solid fa-clock-rotate-left"></i> Real-time Category Sync Active
                        </div>
                    </div>
                </div>

                <!-- 1. GRID CARDS VIEW -->
                <div id="categoryGridView">
                    <div class="row g-3">
                        <!-- Task 1: To Do -->
                        <div class="col-12 col-md-6 col-xl-4 task-item-card" data-task-status="todo" data-task-project="middleware" data-task-priority="urgent">
                            <div class="card border rounded-4 shadow-sm h-100 p-3 bg-white status-accent-todo">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-primary-subtle text-primary fs-8">Middleware Project</span>
                                    <span class="badge bg-danger-subtle text-danger fs-8"><i class="fa-solid fa-triangle-exclamation me-1"></i> Urgent</span>
                                </div>
                                <h3 class="h6 fw-bold text-dark mb-1">
                                    <span class="text-muted fw-normal">SYNC-101:</span> Core API Gateway Handshake
                                </h3>
                                <p class="text-muted fs-8 mb-3">Refactor Redis session pool and JWT authentication middleware token validation.</p>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between fs-8 mb-1">
                                        <span class="text-muted">Subtasks: 0/4</span>
                                        <span class="fw-bold text-danger">0%</span>
                                    </div>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar bg-danger" style="width: 0%;"></div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between border-top pt-2.5 mt-auto fs-8">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle" alt="Lead">
                                        <span class="text-secondary fw-semibold">Sophia C.</span>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-xs status-badge-todo rounded-pill px-2.5 py-1 dropdown-toggle fs-8 fw-semibold" data-bs-toggle="dropdown">
                                            To Do
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end fs-7 shadow-sm border-0 rounded-3">
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="todo" data-task-id="SYNC-101"><span class="dot dot-todo me-2"></span> To Do</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="in-progress" data-task-id="SYNC-101"><span class="dot dot-progress me-2"></span> In Progress</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="review" data-task-id="SYNC-101"><span class="dot dot-review me-2"></span> Review</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="completed" data-task-id="SYNC-101"><span class="dot dot-complete me-2"></span> Completed</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Task 2: To Do -->
                        <div class="col-12 col-md-6 col-xl-4 task-item-card" data-task-status="todo" data-task-project="company" data-task-priority="high">
                            <div class="card border rounded-4 shadow-sm h-100 p-3 bg-white status-accent-todo">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-info-subtle text-info fs-8">Company Website</span>
                                    <span class="badge bg-warning-subtle text-warning fs-8">High Priority</span>
                                </div>
                                <h3 class="h6 fw-bold text-dark mb-1">
                                    <span class="text-muted fw-normal">SYNC-102:</span> Investor Portal Wireframe
                                </h3>
                                <p class="text-muted fs-8 mb-3">Complete high-fidelity Figma components and typography tokens review.</p>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between fs-8 mb-1">
                                        <span class="text-muted">Subtasks: 1/3</span>
                                        <span class="fw-bold text-primary">33%</span>
                                    </div>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar bg-primary" style="width: 33%;"></div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between border-top pt-2.5 mt-auto fs-8">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle" alt="Lead">
                                        <span class="text-secondary fw-semibold">Michael A.</span>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-xs status-badge-todo rounded-pill px-2.5 py-1 dropdown-toggle fs-8 fw-semibold" data-bs-toggle="dropdown">
                                            To Do
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end fs-7 shadow-sm border-0 rounded-3">
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="todo" data-task-id="SYNC-102"><span class="dot dot-todo me-2"></span> To Do</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="in-progress" data-task-id="SYNC-102"><span class="dot dot-progress me-2"></span> In Progress</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="review" data-task-id="SYNC-102"><span class="dot dot-review me-2"></span> Review</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="completed" data-task-id="SYNC-102"><span class="dot dot-complete me-2"></span> Completed</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Task 3: To Do -->
                        <div class="col-12 col-md-6 col-xl-4 task-item-card" data-task-status="todo" data-task-project="landing" data-task-priority="medium">
                            <div class="card border rounded-4 shadow-sm h-100 p-3 bg-white status-accent-todo">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-warning-subtle text-warning fs-8">Landing Campaign</span>
                                    <span class="badge bg-secondary-subtle text-secondary fs-8">Medium</span>
                                </div>
                                <h3 class="h6 fw-bold text-dark mb-1">
                                    <span class="text-muted fw-normal">SYNC-103:</span> Lead Capture Form Sanitization
                                </h3>
                                <p class="text-muted fs-8 mb-3">Integrate reCAPTCHA v3 and backend honeypot spam protection.</p>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between fs-8 mb-1">
                                        <span class="text-muted">Subtasks: 0/2</span>
                                        <span class="fw-bold text-danger">0%</span>
                                    </div>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar bg-danger" style="width: 0%;"></div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between border-top pt-2.5 mt-auto fs-8">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle" alt="Lead">
                                        <span class="text-secondary fw-semibold">Daniel J.</span>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-xs status-badge-todo rounded-pill px-2.5 py-1 dropdown-toggle fs-8 fw-semibold" data-bs-toggle="dropdown">
                                            To Do
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end fs-7 shadow-sm border-0 rounded-3">
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="todo" data-task-id="SYNC-103"><span class="dot dot-todo me-2"></span> To Do</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="in-progress" data-task-id="SYNC-103"><span class="dot dot-progress me-2"></span> In Progress</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="review" data-task-id="SYNC-103"><span class="dot dot-review me-2"></span> Review</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="completed" data-task-id="SYNC-103"><span class="dot dot-complete me-2"></span> Completed</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Task 4: In Progress -->
                        <div class="col-12 col-md-6 col-xl-4 task-item-card" data-task-status="in-progress" data-task-project="middleware" data-task-priority="urgent">
                            <div class="card border rounded-4 shadow-sm h-100 p-3 bg-white status-accent-progress">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-primary-subtle text-primary fs-8">Middleware Project</span>
                                    <span class="badge bg-danger-subtle text-danger fs-8">Urgent</span>
                                </div>
                                <h3 class="h6 fw-bold text-dark mb-1">
                                    <span class="text-muted fw-normal">SYNC-104:</span> Database Replication & Failover
                                </h3>
                                <p class="text-muted fs-8 mb-3">Configure MySQL 8.0 Group Replication with automatic proxy router failover.</p>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between fs-8 mb-1">
                                        <span class="text-muted">Subtasks: 3/4</span>
                                        <span class="fw-bold text-primary">75%</span>
                                    </div>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar bg-primary" style="width: 75%;"></div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between border-top pt-2.5 mt-auto fs-8">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle" alt="Lead">
                                        <span class="text-secondary fw-semibold">James W.</span>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-xs status-badge-progress rounded-pill px-2.5 py-1 dropdown-toggle fs-8 fw-semibold" data-bs-toggle="dropdown">
                                            In Progress
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end fs-7 shadow-sm border-0 rounded-3">
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="todo" data-task-id="SYNC-104"><span class="dot dot-todo me-2"></span> To Do</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="in-progress" data-task-id="SYNC-104"><span class="dot dot-progress me-2"></span> In Progress</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="review" data-task-id="SYNC-104"><span class="dot dot-review me-2"></span> Review</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="completed" data-task-id="SYNC-104"><span class="dot dot-complete me-2"></span> Completed</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Task 5: In Progress -->
                        <div class="col-12 col-md-6 col-xl-4 task-item-card" data-task-status="in-progress" data-task-project="company" data-task-priority="high">
                            <div class="card border rounded-4 shadow-sm h-100 p-3 bg-white status-accent-progress">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-info-subtle text-info fs-8">Company Website</span>
                                    <span class="badge bg-warning-subtle text-warning fs-8">High Priority</span>
                                </div>
                                <h3 class="h6 fw-bold text-dark mb-1">
                                    <span class="text-muted fw-normal">SYNC-105:</span> Dynamic CMS Blog Engine
                                </h3>
                                <p class="text-muted fs-8 mb-3">Develop Markdown editor integration and multi-language post taxonomy.</p>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between fs-8 mb-1">
                                        <span class="text-muted">Subtasks: 2/4</span>
                                        <span class="fw-bold text-primary">50%</span>
                                    </div>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar bg-primary" style="width: 50%;"></div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between border-top pt-2.5 mt-auto fs-8">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle" alt="Lead">
                                        <span class="text-secondary fw-semibold">Sophia C.</span>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-xs status-badge-progress rounded-pill px-2.5 py-1 dropdown-toggle fs-8 fw-semibold" data-bs-toggle="dropdown">
                                            In Progress
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end fs-7 shadow-sm border-0 rounded-3">
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="todo" data-task-id="SYNC-105"><span class="dot dot-todo me-2"></span> To Do</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="in-progress" data-task-id="SYNC-105"><span class="dot dot-progress me-2"></span> In Progress</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="review" data-task-id="SYNC-105"><span class="dot dot-review me-2"></span> Review</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="completed" data-task-id="SYNC-105"><span class="dot dot-complete me-2"></span> Completed</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Task 6: In Progress -->
                        <div class="col-12 col-md-6 col-xl-4 task-item-card" data-task-status="in-progress" data-task-project="mobile" data-task-priority="medium">
                            <div class="card border rounded-4 shadow-sm h-100 p-3 bg-white status-accent-progress">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-secondary-subtle text-secondary fs-8">Mobile CRM App</span>
                                    <span class="badge bg-secondary-subtle text-secondary fs-8">Medium</span>
                                </div>
                                <h3 class="h6 fw-bold text-dark mb-1">
                                    <span class="text-muted fw-normal">SYNC-106:</span> Offline SQLite Sync Queue
                                </h3>
                                <p class="text-muted fs-8 mb-3">Queue local customer edits and dispatch background sync when connection restores.</p>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between fs-8 mb-1">
                                        <span class="text-muted">Subtasks: 2/3</span>
                                        <span class="fw-bold text-primary">66%</span>
                                    </div>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar bg-primary" style="width: 66%;"></div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between border-top pt-2.5 mt-auto fs-8">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle" alt="Lead">
                                        <span class="text-secondary fw-semibold">Daniel J.</span>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-xs status-badge-progress rounded-pill px-2.5 py-1 dropdown-toggle fs-8 fw-semibold" data-bs-toggle="dropdown">
                                            In Progress
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end fs-7 shadow-sm border-0 rounded-3">
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="todo" data-task-id="SYNC-106"><span class="dot dot-todo me-2"></span> To Do</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="in-progress" data-task-id="SYNC-106"><span class="dot dot-progress me-2"></span> In Progress</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="review" data-task-id="SYNC-106"><span class="dot dot-review me-2"></span> Review</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="completed" data-task-id="SYNC-106"><span class="dot dot-complete me-2"></span> Completed</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Task 7: Review -->
                        <div class="col-12 col-md-6 col-xl-4 task-item-card" data-task-status="review" data-task-project="middleware" data-task-priority="urgent">
                            <div class="card border rounded-4 shadow-sm h-100 p-3 bg-white status-accent-review">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-primary-subtle text-primary fs-8">Middleware Project</span>
                                    <span class="badge bg-danger-subtle text-danger fs-8">Urgent Review</span>
                                </div>
                                <h3 class="h6 fw-bold text-dark mb-1">
                                    <span class="text-muted fw-normal">SYNC-107:</span> OAuth2 Scope Permission Matrix
                                </h3>
                                <p class="text-muted fs-8 mb-3">Security team audit for granular role grants and bearer token revocation.</p>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between fs-8 mb-1">
                                        <span class="text-muted">Subtasks: 4/4</span>
                                        <span class="fw-bold text-warning">100% (Pending Signoff)</span>
                                    </div>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar bg-warning" style="width: 100%;"></div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between border-top pt-2.5 mt-auto fs-8">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle" alt="Lead">
                                        <span class="text-secondary fw-semibold">James W.</span>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-xs status-badge-review rounded-pill px-2.5 py-1 dropdown-toggle fs-8 fw-semibold" data-bs-toggle="dropdown">
                                            Review
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end fs-7 shadow-sm border-0 rounded-3">
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="todo" data-task-id="SYNC-107"><span class="dot dot-todo me-2"></span> To Do</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="in-progress" data-task-id="SYNC-107"><span class="dot dot-progress me-2"></span> In Progress</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="review" data-task-id="SYNC-107"><span class="dot dot-review me-2"></span> Review</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="completed" data-task-id="SYNC-107"><span class="dot dot-complete me-2"></span> Completed</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Task 8: Review -->
                        <div class="col-12 col-md-6 col-xl-4 task-item-card" data-task-status="review" data-task-project="landing" data-task-priority="high">
                            <div class="card border rounded-4 shadow-sm h-100 p-3 bg-white status-accent-review">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-warning-subtle text-warning fs-8">Landing Campaign</span>
                                    <span class="badge bg-warning-subtle text-warning fs-8">High Priority</span>
                                </div>
                                <h3 class="h6 fw-bold text-dark mb-1">
                                    <span class="text-muted fw-normal">SYNC-108:</span> A/B Testing Conversion Pixel
                                </h3>
                                <p class="text-muted fs-8 mb-3">Verify GA4 and Meta Pixel tracking events on checkout call-to-action buttons.</p>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between fs-8 mb-1">
                                        <span class="text-muted">Subtasks: 2/2</span>
                                        <span class="fw-bold text-warning">100%</span>
                                    </div>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar bg-warning" style="width: 100%;"></div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between border-top pt-2.5 mt-auto fs-8">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle" alt="Lead">
                                        <span class="text-secondary fw-semibold">Sophia C.</span>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-xs status-badge-review rounded-pill px-2.5 py-1 dropdown-toggle fs-8 fw-semibold" data-bs-toggle="dropdown">
                                            Review
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end fs-7 shadow-sm border-0 rounded-3">
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="todo" data-task-id="SYNC-108"><span class="dot dot-todo me-2"></span> To Do</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="in-progress" data-task-id="SYNC-108"><span class="dot dot-progress me-2"></span> In Progress</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="review" data-task-id="SYNC-108"><span class="dot dot-review me-2"></span> Review</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="completed" data-task-id="SYNC-108"><span class="dot dot-complete me-2"></span> Completed</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Task 9: Completed -->
                        <div class="col-12 col-md-6 col-xl-4 task-item-card" data-task-status="completed" data-task-project="company" data-task-priority="medium">
                            <div class="card border rounded-4 shadow-sm h-100 p-3 bg-white status-accent-completed">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-info-subtle text-info fs-8">Company Website</span>
                                    <span class="badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-circle-check me-1"></i> Completed</span>
                                </div>
                                <h3 class="h6 fw-bold text-dark mb-1">
                                    <span class="text-muted fw-normal">SYNC-109:</span> SSL Auto-Renewal Automation
                                </h3>
                                <p class="text-muted fs-8 mb-3">Certbot cron scheduled for automated TLS 1.3 certificate handshakes.</p>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between fs-8 mb-1">
                                        <span class="text-muted">Subtasks: 3/3</span>
                                        <span class="fw-bold text-success">100% Done</span>
                                    </div>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar bg-success" style="width: 100%;"></div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between border-top pt-2.5 mt-auto fs-8">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle" alt="Lead">
                                        <span class="text-secondary fw-semibold">Daniel J.</span>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-xs status-badge-completed rounded-pill px-2.5 py-1 dropdown-toggle fs-8 fw-semibold" data-bs-toggle="dropdown">
                                            Completed
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end fs-7 shadow-sm border-0 rounded-3">
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="todo" data-task-id="SYNC-109"><span class="dot dot-todo me-2"></span> To Do</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="in-progress" data-task-id="SYNC-109"><span class="dot dot-progress me-2"></span> In Progress</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="review" data-task-id="SYNC-109"><span class="dot dot-review me-2"></span> Review</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="completed" data-task-id="SYNC-109"><span class="dot dot-complete me-2"></span> Completed</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Task 10: Completed -->
                        <div class="col-12 col-md-6 col-xl-4 task-item-card" data-task-status="completed" data-task-project="analytics" data-task-priority="high">
                            <div class="card border rounded-4 shadow-sm h-100 p-3 bg-white status-accent-completed">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-success-subtle text-success fs-8">Analytics Tool</span>
                                    <span class="badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-circle-check me-1"></i> Completed</span>
                                </div>
                                <h3 class="h6 fw-bold text-dark mb-1">
                                    <span class="text-muted fw-normal">SYNC-110:</span> TimescaleDB Partitioning Setup
                                </h3>
                                <p class="text-muted fs-8 mb-3">Hypertable chunking intervals configured for 24h compression policies.</p>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between fs-8 mb-1">
                                        <span class="text-muted">Subtasks: 4/4</span>
                                        <span class="fw-bold text-success">100% Done</span>
                                    </div>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar bg-success" style="width: 100%;"></div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between border-top pt-2.5 mt-auto fs-8">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80" class="avatar-xs rounded-circle" alt="Lead">
                                        <span class="text-secondary fw-semibold">James W.</span>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-xs status-badge-completed rounded-pill px-2.5 py-1 dropdown-toggle fs-8 fw-semibold" data-bs-toggle="dropdown">
                                            Completed
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end fs-7 shadow-sm border-0 rounded-3">
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="todo" data-task-id="SYNC-110"><span class="dot dot-todo me-2"></span> To Do</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="in-progress" data-task-id="SYNC-110"><span class="dot dot-progress me-2"></span> In Progress</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="review" data-task-id="SYNC-110"><span class="dot dot-review me-2"></span> Review</a></li>
                                            <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="completed" data-task-id="SYNC-110"><span class="dot dot-complete me-2"></span> Completed</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- 2. TABLE LIST VIEW (Initially Hidden) -->
                <div id="categoryTableView" style="display: none;">
                    <div class="card shadow-sm border rounded-4 bg-white overflow-hidden">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0 fs-7">
                                <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                    <tr>
                                        <th class="ps-4" style="width: 40px;"><input type="checkbox" class="form-check-input"></th>
                                        <th>Code & Task Title</th>
                                        <th>Target Project</th>
                                        <th>Assignee</th>
                                        <th>Priority</th>
                                        <th>Status Category</th>
                                        <th>Subtasks</th>
                                        <th class="pe-4 text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="task-table-row" data-task-status="todo" data-task-project="middleware" data-task-priority="urgent">
                                        <td class="ps-4"><input type="checkbox" class="form-check-input"></td>
                                        <td>
                                            <span class="fw-bold text-dark d-block">SYNC-101: Core API Gateway Handshake</span>
                                            <span class="fs-8 text-muted">Redis session pool and JWT auth middleware</span>
                                        </td>
                                        <td><span class="badge bg-primary-subtle text-primary">Middleware Project</span></td>
                                        <td>Sophia Carter</td>
                                        <td><span class="badge bg-danger-subtle text-danger">Urgent</span></td>
                                        <td><span class="status-badge-todo px-2 py-0.5 rounded-pill fs-8 fw-semibold">To Do</span></td>
                                        <td>0/4 (0%)</td>
                                        <td class="pe-4 text-end">
                                            <button class="btn btn-xs btn-outline-secondary dropdown-toggle fs-8" data-bs-toggle="dropdown">Move Status</button>
                                            <ul class="dropdown-menu dropdown-menu-end fs-7 shadow-sm border-0 rounded-3">
                                                <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="todo" data-task-id="SYNC-101"><span class="dot dot-todo me-2"></span> To Do</a></li>
                                                <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="in-progress" data-task-id="SYNC-101"><span class="dot dot-progress me-2"></span> In Progress</a></li>
                                                <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="review" data-task-id="SYNC-101"><span class="dot dot-review me-2"></span> Review</a></li>
                                                <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="completed" data-task-id="SYNC-101"><span class="dot dot-complete me-2"></span> Completed</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr class="task-table-row" data-task-status="in-progress" data-task-project="middleware" data-task-priority="urgent">
                                        <td class="ps-4"><input type="checkbox" class="form-check-input"></td>
                                        <td>
                                            <span class="fw-bold text-dark d-block">SYNC-104: Database Replication & Failover</span>
                                            <span class="fs-8 text-muted">MySQL Group Replication setup</span>
                                        </td>
                                        <td><span class="badge bg-primary-subtle text-primary">Middleware Project</span></td>
                                        <td>James Wilson</td>
                                        <td><span class="badge bg-danger-subtle text-danger">Urgent</span></td>
                                        <td><span class="status-badge-progress px-2 py-0.5 rounded-pill fs-8 fw-semibold">In Progress</span></td>
                                        <td>3/4 (75%)</td>
                                        <td class="pe-4 text-end">
                                            <button class="btn btn-xs btn-outline-secondary dropdown-toggle fs-8" data-bs-toggle="dropdown">Move Status</button>
                                            <ul class="dropdown-menu dropdown-menu-end fs-7 shadow-sm border-0 rounded-3">
                                                <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="todo" data-task-id="SYNC-104"><span class="dot dot-todo me-2"></span> To Do</a></li>
                                                <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="in-progress" data-task-id="SYNC-104"><span class="dot dot-progress me-2"></span> In Progress</a></li>
                                                <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="review" data-task-id="SYNC-104"><span class="dot dot-review me-2"></span> Review</a></li>
                                                <li><a class="dropdown-item dropdown-set-status" href="#" data-new-status="completed" data-task-id="SYNC-104"><span class="dot dot-complete me-2"></span> Completed</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal: Create New Task in Category -->
            <div class="modal fade" id="newCategoryTaskModal" tabindex="-1" aria-labelledby="newCategoryTaskLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-4 border-0 shadow-lg">
                        <div class="modal-header bg-light border-bottom p-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-3 p-2 bg-primary-subtle text-primary">
                                    <i class="fa-solid fa-list-check fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="modal-title h6 fw-bold mb-0" id="newCategoryTaskLabel">Create New Sprint Task</h5>
                                    <span class="text-muted fs-8">Create task with preselected category status</span>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 fs-7">
                            <form id="formNewCategoryTask">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Task Title *</label>
                                    <input type="text" class="form-control fs-7" placeholder="e.g. Implement Webhook Dispatcher" required>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-6">
                                        <label class="form-label fw-bold">Target Project</label>
                                        <select class="form-select fs-7" required>
                                            <option value="middleware">Middleware Project</option>
                                            <option value="company">Company Website</option>
                                            <option value="landing">Landing Campaign</option>
                                            <option value="mobile">Mobile CRM App</option>
                                            <option value="analytics">Analytics Tool</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label fw-bold">Initial Category Status</label>
                                        <select class="form-select fs-7">
                                            <option value="todo" <?= ($currentStatus === 'todo') ? 'selected' : '' ?>>To Do</option>
                                            <option value="in-progress" <?= ($currentStatus === 'in-progress') ? 'selected' : '' ?>>In Progress</option>
                                            <option value="review" <?= ($currentStatus === 'review') ? 'selected' : '' ?>>Review</option>
                                            <option value="completed" <?= ($currentStatus === 'completed') ? 'selected' : '' ?>>Completed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-6">
                                        <label class="form-label fw-bold">Priority Level</label>
                                        <select class="form-select fs-7">
                                            <option value="urgent">Urgent</option>
                                            <option value="high" selected>High</option>
                                            <option value="medium">Medium</option>
                                            <option value="low">Low</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label fw-bold">Assignee Lead</label>
                                        <select class="form-select fs-7">
                                            <option value="Sophia Carter">Sophia Carter</option>
                                            <option value="Michael Anderson">Michael Anderson</option>
                                            <option value="Daniel Johnson">Daniel Johnson</option>
                                            <option value="James Wilson">James Wilson</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Task Description</label>
                                    <textarea class="form-control fs-7" rows="2" placeholder="Brief technical summary..."></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer bg-light border-top p-3">
                            <button type="button" class="btn btn-secondary btn-sm px-3 rounded-3" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary btn-sm px-3 rounded-3" data-bs-dismiss="modal" onclick="alert('Task added to pipeline!')">Create Task</button>
                        </div>
                    </div>
                </div>
            </div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
