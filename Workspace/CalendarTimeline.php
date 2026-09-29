<?php
$currentPage = 'calendar-timeline';
$currentModule = 'workspace';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar & Timeline - Workspace - Syncboard</title>

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
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Calendar & Timeline</li>
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

            <!-- Page Banner Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-info">
                        <i class="fa-solid fa-calendar-days fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Calendar & Timeline</h1>
                        <span class="text-muted fs-7">Master schedule, sprint milestones, and cross-project timeline roadmap</span>
                    </div>
                </div>

                <div class="project-actions-area d-flex align-items-center gap-3">
                    <!-- Project Selector Filter -->
                    <select class="form-select form-select-sm fs-7 w-auto shadow-sm" id="selectFilterProject">
                        <option value="all">All Projects (Master)</option>
                        <option value="Middleware Project">Middleware Project</option>
                        <option value="Company Website">Company Website</option>
                        <option value="Landing Page Campaign">Landing Page Campaign</option>
                    </select>

                    <button class="btn btn-outline-secondary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm tab-btn" data-view="timeline-config" title="Configure Master Timeline">
                        <i class="fa-solid fa-sliders"></i> Timeline Config
                    </button>
                    <button class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm" id="btnNewTask">
                        <i class="fa-solid fa-plus"></i> Add Event / Task
                    </button>
                </div>
            </section>

            <!-- Toolbar Controls Bar (Calendar, Timeline & Config Switcher) -->
            <div class="toolbar-container px-4 pb-3 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-3" id="toolbar-container">
                <div class="nav nav-pills view-tabs gap-2" id="viewTabs">
                    <button class="nav-link active tab-btn fw-semibold py-2 px-3 rounded-3" data-view="calendar">
                        <i class="fa-regular fa-calendar-days me-1"></i> Master Calendar
                    </button>
                    <button class="nav-link tab-btn fw-semibold py-2 px-3 rounded-3" data-view="timeline">
                        <i class="fa-solid fa-chart-gantt me-1"></i> Master Timeline
                    </button>
                    <button class="nav-link tab-btn fw-semibold py-2 px-3 rounded-3" data-view="timeline-config">
                        <i class="fa-solid fa-sliders me-1"></i> Timeline & Milestone Config
                    </button>
                </div>
            </div>

            <!-- Main View Container -->
            <div class="view-wrapper flex-grow-1 p-4">

                <!-- 1. MASTER CALENDAR VIEW -->
                <div class="view-content active" id="viewCalendar">
                    <div class="card shadow-sm border rounded-4 p-4 bg-white calendar-wrapper">
                        <!-- Calendar Controls Topbar -->
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 pb-3 border-bottom">
                            <div class="d-flex align-items-center gap-3">
                                <h2 class="h5 fw-bold mb-0" id="calendarMonthTitle">September 2026</h2>
                                <span class="badge bg-primary-subtle text-primary fs-8">Portfolio Schedule</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-secondary" id="btnPrevMonth" title="Previous Month"><i class="fa-solid fa-chevron-left"></i></button>
                                    <button class="btn btn-outline-secondary fw-semibold" id="btnToday">Today</button>
                                    <button class="btn btn-outline-secondary" id="btnNextMonth" title="Next Month"><i class="fa-solid fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- Calendar Grid -->
                        <div class="calendar-subview-content active" id="subviewGrid">
                            <div class="calendar-grid d-grid gap-2" id="calendarGrid" style="grid-template-columns: repeat(7, 1fr);"></div>
                        </div>
                    </div>
                </div>

                <!-- 2. MASTER TIMELINE VIEW -->
                <div class="view-content" id="viewTimeline">
                    <div class="card shadow-sm border rounded-4 p-4 bg-white mb-4">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                            <div>
                                <h2 class="h5 fw-bold mb-0">Cross-Project Delivery Roadmap</h2>
                                <span class="text-muted fs-7">Master sprint progression and delivery milestones across all active teams</span>
                            </div>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-outline-secondary active">Weeks</button>
                                <button class="btn btn-outline-secondary">Months</button>
                                <button class="btn btn-outline-secondary">Quarters</button>
                            </div>
                        </div>

                        <!-- Master Roadmap Item: Middleware Project -->
                        <div class="p-3 border rounded-4 bg-light-subtle mb-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge-icon-sm badge-ecommerce p-1.5 rounded-2"><i class="fa-solid fa-bag-shopping"></i></span>
                                    <span class="fw-bold text-dark fs-6">Middleware Project</span>
                                </div>
                                <span class="badge bg-success">On Track (65%)</span>
                            </div>
                            <div class="progress mb-2" style="height: 10px;">
                                <div class="progress-bar bg-primary" style="width: 65%;"></div>
                            </div>
                            <div class="d-flex justify-content-between fs-8 text-muted">
                                <span><i class="fa-regular fa-calendar me-1"></i> Sep 01 - Nov 15, 2026</span>
                                <span>Lead: Sophia Carter &bull; 4 Assignees</span>
                            </div>
                        </div>

                        <!-- Master Roadmap Item: Company Website -->
                        <div class="p-3 border rounded-4 bg-light-subtle mb-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge-icon-sm badge-company p-1.5 rounded-2"><i class="fa-solid fa-globe"></i></span>
                                    <span class="fw-bold text-dark fs-6">Company Website</span>
                                </div>
                                <span class="badge bg-warning text-dark">Review (90%)</span>
                            </div>
                            <div class="progress mb-2" style="height: 10px;">
                                <div class="progress-bar bg-success" style="width: 90%;"></div>
                            </div>
                            <div class="d-flex justify-content-between fs-8 text-muted">
                                <span><i class="fa-regular fa-calendar me-1"></i> Sep 15 - Oct 30, 2026</span>
                                <span>Lead: Michael Anderson &bull; 3 Assignees</span>
                            </div>
                        </div>

                        <!-- Master Roadmap Item: Landing Page Campaign -->
                        <div class="p-3 border rounded-4 bg-light-subtle mb-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge-icon-sm badge-landing p-1.5 rounded-2"><i class="fa-solid fa-bullhorn"></i></span>
                                    <span class="fw-bold text-dark fs-6">Landing Page Campaign</span>
                                </div>
                                <span class="badge bg-primary">In Progress (40%)</span>
                            </div>
                            <div class="progress mb-2" style="height: 10px;">
                                <div class="progress-bar bg-info" style="width: 40%;"></div>
                            </div>
                            <div class="d-flex justify-content-between fs-8 text-muted">
                                <span><i class="fa-regular fa-calendar me-1"></i> Oct 01 - Dec 10, 2026</span>
                                <span>Lead: Sophia Carter &bull; 2 Assignees</span>
                            </div>
                        </div>

                        <!-- Detailed Sprint Timeline Grid -->
                        <div class="timeline-container p-1 border-top pt-4">
                            <h3 class="h6 fw-bold mb-3">Active Tasks Schedule Breakdown</h3>
                            <div class="timeline-header d-flex align-items-center border-bottom pb-2 mb-3 fw-bold text-muted fs-8 text-uppercase">
                                <div style="width: 260px; flex-shrink: 0;">Task & Project</div>
                                <div class="flex-grow-1 d-flex justify-content-between text-center px-3">
                                    <span class="w-25">Week 1 (Sep 1-7)</span>
                                    <span class="w-25">Week 2 (Sep 8-14)</span>
                                    <span class="w-25">Week 3 (Sep 15-21)</span>
                                    <span class="w-25">Week 4 (Sep 22-28)</span>
                                </div>
                                <div style="width: 100px; flex-shrink: 0;" class="text-end">Assignees</div>
                            </div>
                            <div class="timeline-body d-flex flex-column gap-2" id="timelineTasksList"></div>
                        </div>
                    </div>
                </div>

                <!-- 3. TIMELINE & MILESTONE CONFIG VIEW -->
                <div class="view-content" id="viewTimelineConfig">
                    <div class="row g-4">
                        <!-- Left Column: Milestone Phases -->
                        <div class="col-12 col-xl-8">
                            <div class="card shadow-sm border rounded-4 bg-white overflow-hidden mb-4">
                                <div class="card-header bg-white p-3 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-2">
                                    <div>
                                        <h2 class="h6 fw-bold mb-0">Project Milestone Phases & Sprint Roadmap</h2>
                                        <span class="text-muted fs-8">Timeline phases configured here populate the Master Gantt Chart & Calendar</span>
                                    </div>
                                    <button class="btn btn-sm btn-primary rounded-3" data-bs-toggle="modal" data-bs-target="#addPhaseModal">
                                        <i class="fa-solid fa-plus me-1"></i> Add Phase / Milestone
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0 fs-7">
                                        <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                            <tr>
                                                <th class="ps-4" style="width: 40px;">#</th>
                                                <th>Milestone / Phase Name</th>
                                                <th>Date Range</th>
                                                <th>Deliverables</th>
                                                <th>Owner / Lead</th>
                                                <th>Status</th>
                                                <th class="pe-4 text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="ps-4 text-muted fw-bold">1</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge rounded-circle p-1 bg-success"></span>
                                                        <span class="fw-bold text-dark">Phase 1: Architecture & DB Design</span>
                                                    </div>
                                                    <span class="text-muted fs-8">Database schema, indexing, API contracts</span>
                                                </td>
                                                <td><code>01 Oct - 15 Oct 2026</code> <span class="badge bg-light text-muted border ms-1">15d</span></td>
                                                <td><span class="badge bg-primary-subtle text-primary">8 Tasks</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&q=80" class="avatar-xs rounded-circle" alt="">
                                                        <span class="fs-8">Jenno Wilson</span>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                                <td class="pe-4 text-end">
                                                    <button class="btn btn-sm btn-light border rounded-2" title="Edit"><i class="fa-solid fa-pen-to-square"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-4 text-muted fw-bold">2</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge rounded-circle p-1 bg-primary"></span>
                                                        <span class="fw-bold text-dark">Phase 2: Core Middleware & Auth</span>
                                                    </div>
                                                    <span class="text-muted fs-8">JWT auth, payload validation, proxy gateway</span>
                                                </td>
                                                <td><code>16 Oct - 05 Nov 2026</code> <span class="badge bg-light text-muted border ms-1">21d</span></td>
                                                <td><span class="badge bg-primary-subtle text-primary">14 Tasks</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=100&q=80" class="avatar-xs rounded-circle" alt="">
                                                        <span class="fs-8">Sarah Chen</span>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-primary">In Progress</span></td>
                                                <td class="pe-4 text-end">
                                                    <button class="btn btn-sm btn-light border rounded-2" title="Edit"><i class="fa-solid fa-pen-to-square"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-4 text-muted fw-bold">3</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge rounded-circle p-1 bg-warning"></span>
                                                        <span class="fw-bold text-dark">Phase 3: Integration & QA Testing</span>
                                                    </div>
                                                    <span class="text-muted fs-8">Unit tests, integration tests, latency benchmarks</span>
                                                </td>
                                                <td><code>06 Nov - 20 Nov 2026</code> <span class="badge bg-light text-muted border ms-1">15d</span></td>
                                                <td><span class="badge bg-secondary-subtle text-dark">10 Tasks</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=100&q=80" class="avatar-xs rounded-circle" alt="">
                                                        <span class="fs-8">Alex Rivera</span>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-secondary">Upcoming</span></td>
                                                <td class="pe-4 text-end">
                                                    <button class="btn btn-sm btn-light border rounded-2" title="Edit"><i class="fa-solid fa-pen-to-square"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-4 text-muted fw-bold">4</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge rounded-circle p-1 bg-danger"></span>
                                                        <span class="fw-bold text-dark">Phase 4: Staging & Production Release</span>
                                                    </div>
                                                    <span class="text-muted fs-8">Deployment pipeline, canary rollout, telemetry check</span>
                                                </td>
                                                <td><code>21 Nov - 30 Nov 2026</code> <span class="badge bg-light text-muted border ms-1">10d</span></td>
                                                <td><span class="badge bg-secondary-subtle text-dark">6 Tasks</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" class="avatar-xs rounded-circle" alt="">
                                                        <span class="fs-8">Michael Scott</span>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-secondary">Upcoming</span></td>
                                                <td class="pe-4 text-end">
                                                    <button class="btn btn-sm btn-light border rounded-2" title="Edit"><i class="fa-solid fa-pen-to-square"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Timeline Automation Settings -->
                            <div class="card shadow-sm border rounded-4 bg-white p-4">
                                <h2 class="h6 fw-bold mb-1 text-dark">Timeline Automation & Dependencies</h2>
                                <p class="text-muted fs-7 mb-4">Set rules for auto-scheduling and milestone dependencies</p>
                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" id="ctAutoCascade" checked>
                                            <label class="form-check-label fs-7 fw-bold" for="ctAutoCascade">Auto-Cascade Dependent Deadlines</label>
                                        </div>
                                        <p class="text-muted fs-8 mb-0">Push following milestones automatically if parent dates move.</p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" id="ctCriticalPath" checked>
                                            <label class="form-check-label fs-7 fw-bold" for="ctCriticalPath">Highlight Critical Path Bottlenecks</label>
                                        </div>
                                        <p class="text-muted fs-8 mb-0">Mark red warnings on dependent tasks with tight SLAs.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Project Boundaries -->
                        <div class="col-12 col-xl-4">
                            <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4">
                                <h3 class="h6 fw-bold mb-3 text-dark"><i class="fa-solid fa-calendar-check text-primary me-2"></i>Project Lifecycle Boundary</h3>

                                <div class="mb-3">
                                    <label class="form-label fs-7 fw-bold">Project Kick-off Date</label>
                                    <input type="date" class="form-control fs-7 rounded-3" value="2026-10-01">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fs-7 fw-bold">Target Hard Deadline / Go-Live</label>
                                    <input type="date" class="form-control fs-7 rounded-3" value="2026-11-30">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fs-7 fw-bold">Sprint Cycle Duration</label>
                                    <select class="form-select fs-7 rounded-3">
                                        <option value="1">1 Week Sprints</option>
                                        <option value="2" selected>2 Weeks (Standard Scrum)</option>
                                        <option value="3">3 Weeks Sprints</option>
                                        <option value="4">1 Month Sprints</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fs-7 fw-bold">Working Days Calendar</label>
                                    <select class="form-select fs-7 rounded-3">
                                        <option value="5" selected>Monday - Friday (5 Business Days)</option>
                                        <option value="6">Monday - Saturday (6 Days)</option>
                                        <option value="7">All 7 Days (Continuous)</option>
                                    </select>
                                </div>

                                <button class="btn btn-primary w-100 fs-7 rounded-3">
                                    <i class="fa-solid fa-floppy-disk me-1"></i> Save Timeline Configuration
                                </button>
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
                    <h5 class="modal-title fw-bold" id="modalTaskHeading">Create New Task / Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="taskForm">
                    <div class="modal-body">
                        <input type="hidden" id="taskId">
                        <div class="mb-3">
                            <label for="taskTitle" class="form-label fs-7 fw-semibold">Task Title *</label>
                            <input type="text" class="form-control fs-7" id="taskTitle" placeholder="e.g. API Integration Testing" required>
                        </div>
                        <div class="mb-3">
                            <label for="taskDescription" class="form-label fs-7 fw-semibold">Description</label>
                            <textarea class="form-control fs-7" id="taskDescription" rows="3" placeholder="Briefly describe the task goals..."></textarea>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label for="taskStatus" class="form-label fs-7 fw-semibold">Status</label>
                                <select class="form-select fs-7" id="taskStatus" required>
                                    <option value="todo">To Do</option>
                                    <option value="in-progress">In Progress</option>
                                    <option value="review">Review</option>
                                    <option value="completed">Complete</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="taskTagsInput" class="form-label fs-7 fw-semibold">Tags</label>
                                <input type="text" class="form-control fs-7" id="taskTagsInput" placeholder="Design, Backend">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-7 fw-semibold">Assign Team Members</label>
                            <div class="row g-2" id="memberSelectorGrid"></div>
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

    <!-- Modal: Add Phase / Milestone -->
    <div class="modal fade" id="addPhaseModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded-4">
                <div class="modal-header border-bottom p-4">
                    <h5 class="modal-title fw-bold fs-6">Add Milestone Phase</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label fs-7 fw-bold">Milestone / Phase Title</label>
                            <input type="text" class="form-control fs-7 rounded-3" placeholder="e.g. Phase 5: Security Audit & Penetration Testing">
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fs-7 fw-bold">Start Date</label>
                                <input type="date" class="form-control fs-7 rounded-3" value="2026-11-21">
                            </div>
                            <div class="col-6">
                                <label class="form-label fs-7 fw-bold">Target End Date</label>
                                <input type="date" class="form-control fs-7 rounded-3" value="2026-11-30">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-7 fw-bold">Assigned Lead / Owner</label>
                            <select class="form-select fs-7 rounded-3">
                                <option value="1">Jenno Wilson (Tech Lead)</option>
                                <option value="2">Sarah Chen (Senior Backend)</option>
                                <option value="3">Alex Rivera (Frontend Engineer)</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-top p-3">
                    <button type="button" class="btn btn-light fs-7 rounded-3 px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary fs-7 rounded-3 px-3" data-bs-dismiss="modal">Create Milestone</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Application Script -->
    <script src="../assets/js/app.js"></script>
</body>

</html>
