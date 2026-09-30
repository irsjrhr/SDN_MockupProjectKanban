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
    <title>Master Calendar & Timeline - Workspace - Syncboard</title>

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
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Master Calendar & Timeline (Projects & Tasks)</li>
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
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary">
                        <i class="fa-solid fa-calendar-days fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Master Calendar & Timeline</h1>
                        <span class="text-muted fs-7">Unified cross-project portfolio & task-level schedule roadmap with live Gantt timeline</span>
                    </div>
                </div>

                <div class="project-actions-area d-flex align-items-center gap-2 flex-wrap">
                    <!-- Scope Selector -->
                    <div class="input-group input-group-sm w-auto shadow-sm">
                        <span class="input-group-text bg-white text-muted fs-8 fw-semibold"><i class="fa-solid fa-layer-group me-1 text-primary"></i> Scope</span>
                        <select class="form-select form-select-sm fs-8 fw-semibold" id="selectMasterScope">
                            <option value="all">All (Projects & Tasks)</option>
                            <option value="project">Projects Only (Portfolio)</option>
                            <option value="task">Tasks Only</option>
                        </select>
                    </div>

                    <!-- Project Filter Selector -->
                    <div class="input-group input-group-sm w-auto shadow-sm">
                        <span class="input-group-text bg-white text-muted fs-8 fw-semibold"><i class="fa-solid fa-filter me-1 text-primary"></i> Project</span>
                        <select class="form-select form-select-sm fs-8 fw-semibold" id="selectMasterProject">
                            <option value="all">All Projects</option>
                            <option value="Middleware Project">Middleware Project</option>
                            <option value="Landing Page Campaign">Landing Page Campaign</option>
                            <option value="Company Website">Company Website</option>
                            <option value="Mobile CRM Application">Mobile CRM Application</option>
                            <option value="Internal Analytics Tool">Internal Analytics Tool</option>
                        </select>
                    </div>

                    <button class="btn btn-primary btn-sm px-3 py-1.5 fw-semibold rounded-3 d-flex align-items-center gap-1.5 shadow-sm" data-bs-toggle="modal" data-bs-target="#newEntryModal">
                        <i class="fa-solid fa-plus"></i> New Schedule Entry
                    </button>
                </div>
            </section>

            <!-- Toolbar Controls Bar (3 Top-level Views) -->
            <div class="toolbar-container px-4 pb-3 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-3" id="toolbar-container">
                <div class="nav nav-pills view-tabs gap-2" id="masterViewTabs">
                    <button class="nav-link active tab-btn fw-semibold py-2 px-3 rounded-3" data-view="calendar-timeline">
                        <i class="fa-regular fa-calendar-days me-1"></i> Calendar & Timeline (Projects & Tasks)
                    </button>
                    <button class="nav-link tab-btn fw-semibold py-2 px-3 rounded-3" data-view="delivery-roadmap">
                        <i class="fa-solid fa-route me-1"></i> Delivery Roadmap & Milestones
                    </button>
                    <button class="nav-link tab-btn fw-semibold py-2 px-3 rounded-3" data-view="timeline-config">
                        <i class="fa-solid fa-sliders me-1"></i> Lifecycle & Milestone Config
                    </button>
                </div>
            </div>

            <!-- Main View Container -->
            <div class="view-wrapper flex-grow-1 p-4">

                <!-- 1. UNIFIED CALENDAR & TIMELINE VIEW (PROJECTS & TASKS) -->
                <div class="view-content active" id="viewMasterCalendar">
                    <div class="card shadow-sm border rounded-4 p-4 bg-white calendar-wrapper">
                        <!-- Calendar Controls Topbar -->
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 pb-3 border-bottom">
                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                <h2 class="h5 fw-bold mb-0" id="masterCalendarMonthTitle">September 2026</h2>

                                <!-- Subtabs Toggle: Calendar Grid vs Unified Gantt Timeline vs Unified Timeline Scheduler -->
                                <div class="nav nav-pills calendar-subtabs p-1 bg-light rounded-3 border" id="masterCalendarSubTabs">
                                    <button class="nav-link active cal-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="grid">
                                        <i class="fa-regular fa-calendar-days me-1"></i> View by Calendar
                                    </button>
                                    <button class="nav-link cal-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="timeline">
                                        <i class="fa-solid fa-chart-gantt me-1"></i> View by Timeline (Gantt)
                                    </button>
                                    <button class="nav-link cal-subtab-btn py-1 px-3 fs-7 fw-semibold rounded-2" data-subview="schedule-manager">
                                        <i class="fa-solid fa-sliders me-1"></i> Unified Timeline Scheduler
                                    </button>
                                </div>
                            </div>

                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-secondary" id="btnMasterPrevMonth" title="Previous Month"><i class="fa-solid fa-chevron-left"></i></button>
                                    <button class="btn btn-outline-secondary fw-semibold" id="btnMasterToday">Today</button>
                                    <button class="btn btn-outline-secondary" id="btnMasterNextMonth" title="Next Month"><i class="fa-solid fa-chevron-right"></i></button>
                                </div>
                                <button class="btn btn-sm btn-outline-primary fw-semibold rounded-3 d-flex align-items-center gap-1.5 px-3 py-1.5" id="btnSyncAllMaster">
                                    <i class="fa-solid fa-rotate"></i> Reset All Schedules
                                </button>
                            </div>
                        </div>

                        <!-- 1.1 Subview: Calendar Grid -->
                        <div class="calendar-subview-content active" id="subviewMasterGrid">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                                <span class="fs-8 text-muted fw-semibold">
                                    <i class="fa-solid fa-circle-info text-primary me-1"></i>
                                    Menampilkan jadwal rentang Proyek & deadline Task aktif pada September 2026.
                                </span>
                                <div class="d-flex align-items-center gap-3 fs-8 flex-wrap">
                                    <span class="d-inline-flex align-items-center gap-1"><span class="badge bg-primary p-1 rounded-circle"></span> Project Portfolio</span>
                                    <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-progress p-1 rounded-circle"></span> Task In Progress</span>
                                    <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-todo p-1 rounded-circle"></span> Task To Do</span>
                                    <span class="d-inline-flex align-items-center gap-1"><span class="badge badge-complete p-1 rounded-circle"></span> Complete</span>
                                </div>
                            </div>
                            <div class="calendar-grid d-grid gap-2" id="masterCalendarGrid" style="grid-template-columns: repeat(7, 1fr);">
                                <!-- Dynamic Calendar Cells -->
                            </div>
                        </div>

                        <!-- 1.2 Subview: Unified Timeline Schedule (Gantt) -->
                        <div class="calendar-subview-content" id="subviewMasterTimeline">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3 p-2 bg-light-subtle rounded-3 border">
                                <div class="d-flex align-items-center gap-3 flex-wrap">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="fs-8 fw-bold text-uppercase text-muted">Status:</span>
                                        <select class="form-select form-select-sm fs-8 w-auto py-1" id="masterTimelineStatusFilter">
                                            <option value="all">All Statuses</option>
                                            <option value="todo">To Do / Planning</option>
                                            <option value="in-progress">In Progress</option>
                                            <option value="review">Review</option>
                                            <option value="completed">Complete</option>
                                        </select>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="fs-8 fw-bold text-uppercase text-muted">View Grouping:</span>
                                        <div class="btn-group btn-group-sm" id="ganttGroupingToggle">
                                            <button class="btn btn-outline-secondary active fs-8 py-1" data-group="by-project">Group by Project</button>
                                            <button class="btn btn-outline-secondary fs-8 py-1" data-group="flat">Flat List</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="fs-8 text-muted">
                                    <span><i class="fa-solid fa-arrows-left-right me-1 text-primary"></i> Multi-tier Gantt bars show Project roadmap with nested Task milestones</span>
                                </div>
                            </div>

                            <div class="timeline-container p-1">
                                <div class="timeline-header d-flex align-items-center border-bottom pb-2 mb-3 fw-bold text-muted fs-8 text-uppercase">
                                    <div style="width: 320px; flex-shrink: 0;">Scope, Title & Priority</div>
                                    <div class="flex-grow-1 d-flex justify-content-between text-center px-3">
                                        <span class="w-25">Week 1 (Sep 1 - 7)</span>
                                        <span class="w-25">Week 2 (Sep 8 - 14)</span>
                                        <span class="w-25">Week 3 (Sep 15 - 21)</span>
                                        <span class="w-25">Week 4 (Sep 22 - 30)</span>
                                    </div>
                                    <div style="width: 170px; flex-shrink: 0;" class="text-end">Assignees & Actions</div>
                                </div>
                                <div class="timeline-body d-flex flex-column gap-2" id="masterTimelineList">
                                    <!-- Dynamic Gantt rows -->
                                </div>
                            </div>
                        </div>

                        <!-- 1.3 Subview: Unified Timeline Scheduler (Projects & Tasks) -->
                        <div class="calendar-subview-content" id="subviewMasterScheduleManager">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3 p-3 bg-primary-subtle rounded-3 border border-primary-subtle">
                                <div>
                                    <h6 class="fw-bold text-primary mb-1"><i class="fa-solid fa-sliders me-1"></i> Master Project & Task Timeline Scheduler</h6>
                                    <p class="fs-8 text-secondary mb-0">Atur langsung Start Date, Due Date, durasi hari, dan prioritas untuk portfolio Proyek maupun individual Task di tabel ini.</p>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-white text-primary border border-primary-subtle fs-8 px-2 py-1" id="schedulerCountSummary">5 Projects &bull; 10 Tasks</span>
                                </div>
                            </div>

                            <div class="table-responsive border rounded-3 bg-white">
                                <table class="table table-hover align-middle mb-0 timeline-schedule-table">
                                    <thead>
                                        <tr>
                                            <th class="py-3 px-3" style="width: 100px;">Type</th>
                                            <th class="py-3 px-2" style="min-width: 250px;">Item Title & Project</th>
                                            <th class="py-3 px-2" style="width: 110px;">Status</th>
                                            <th class="py-3 px-2" style="width: 110px;">Priority</th>
                                            <th class="py-3 px-2" style="min-width: 135px;">Start Date</th>
                                            <th class="py-3 px-2" style="min-width: 135px;">Due Date</th>
                                            <th class="py-3 px-2" style="width: 90px;">Duration</th>
                                            <th class="py-3 px-2" style="min-width: 140px;">Quick Presets</th>
                                            <th class="py-3 px-3 text-end" style="width: 120px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="masterTimelineSchedulerTableBody" class="fs-7">
                                        <!-- Dynamic rows for editing schedules -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. DELIVERY ROADMAP & MILESTONES VIEW -->
                <div class="view-content" id="viewDeliveryRoadmap">
                    <div class="card shadow-sm border rounded-4 p-4 bg-white mb-4">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                            <div>
                                <h2 class="h5 fw-bold mb-0">Cross-Project Delivery Roadmap</h2>
                                <span class="text-muted fs-7">Master project delivery milestones and timeline progression across all active teams</span>
                            </div>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-outline-secondary active">Weeks</button>
                                <button class="btn btn-outline-secondary">Months</button>
                                <button class="btn btn-outline-secondary">Quarters</button>
                            </div>
                        </div>

                        <!-- Roadmap List Cards -->
                        <div id="roadmapProjectsContainer" class="d-flex flex-column gap-3">
                            <!-- Dynamic Project Roadmap cards -->
                        </div>
                    </div>
                </div>

                <!-- 3. LIFECYCLE & MILESTONE CONFIG VIEW -->
                <div class="view-content" id="viewTimelineConfig">
                    <div class="row g-4">
                        <!-- Left Column: Milestone Phases -->
                        <div class="col-12 col-xl-8">
                            <div class="card shadow-sm border rounded-4 bg-white overflow-hidden mb-4">
                                <div class="card-header bg-white p-3 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-2">
                                    <div>
                                        <h2 class="h6 fw-bold mb-0">Project Milestone Phases & Delivery Roadmap</h2>
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
                                    <input type="date" class="form-control fs-7 rounded-3" value="2026-09-01">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fs-7 fw-bold">Target Hard Deadline / Go-Live</label>
                                    <input type="date" class="form-control fs-7 rounded-3" value="2027-01-15">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fs-7 fw-bold">Milestone Cadence / Review</label>
                                    <select class="form-select fs-7 rounded-3">
                                        <option value="1">Weekly Reviews</option>
                                        <option value="2" selected>Bi-Weekly Milestones (Recommended)</option>
                                        <option value="3">Monthly Milestones</option>
                                        <option value="4">Quarterly Release Cadence</option>
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

                                <button class="btn btn-primary w-100 fs-7 rounded-3" onclick="showMasterToast('Lifecycle configuration saved!')">
                                    <i class="fa-solid fa-floppy-disk me-1"></i> Save Timeline Configuration
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- Toast Notification Container -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1090;">
        <div id="masterLiveToast" class="toast align-items-center text-bg-dark border-0 rounded-3 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body d-flex align-items-center gap-2 fs-7">
                    <i class="fa-solid fa-circle-check text-success fs-6"></i>
                    <span id="masterToastMsg">Schedule updated successfully!</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- Modal: Add New Schedule Entry (Project or Task) -->
    <div class="modal fade" id="newEntryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 p-2">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold fs-6">New Schedule Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="newEntryForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fs-7 fw-semibold">Entry Scope *</label>
                            <select class="form-select fs-7" id="entryType">
                                <option value="task">Task Schedule</option>
                                <option value="project">Project Milestone</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-7 fw-semibold">Title *</label>
                            <input type="text" class="form-control fs-7" id="entryTitle" placeholder="e.g. Database Partitioning" required>
                        </div>
                        <div class="mb-3" id="entryProjectGroup">
                            <label class="form-label fs-7 fw-semibold">Parent Project</label>
                            <select class="form-select fs-7" id="entryProject">
                                <option value="Middleware Project">Middleware Project</option>
                                <option value="Landing Page Campaign">Landing Page Campaign</option>
                                <option value="Company Website">Company Website</option>
                                <option value="Mobile CRM Application">Mobile CRM Application</option>
                                <option value="Internal Analytics Tool">Internal Analytics Tool</option>
                            </select>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label class="form-label fs-7 fw-semibold">Start Date *</label>
                                <input type="date" class="form-control fs-7" id="entryStartDate" value="2026-09-01" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label fs-7 fw-semibold">Due Date *</label>
                                <input type="date" class="form-control fs-7" id="entryDueDate" value="2026-09-15" required>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-6">
                                <label class="form-label fs-7 fw-semibold">Priority</label>
                                <select class="form-select fs-7" id="entryPriority">
                                    <option value="Normal">Normal</option>
                                    <option value="Medium" selected>Medium</option>
                                    <option value="High">High</option>
                                    <option value="Urgent">Urgent</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fs-7 fw-semibold">Status</label>
                                <select class="form-select fs-7" id="entryStatus">
                                    <option value="todo">To Do</option>
                                    <option value="in-progress" selected>In Progress</option>
                                    <option value="review">Review</option>
                                    <option value="completed">Complete</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-outline-secondary fs-7 px-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary fs-7 fw-semibold px-4">Add Schedule</button>
                    </div>
                </form>
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
                            <input type="text" class="form-control fs-7 rounded-3" placeholder="e.g. Phase 4: Production Release">
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

    <!-- Master Unified Timeline & Calendar Logic -->
    <script>
    $(document).ready(function () {
        // 1. DATA DEFINITIONS (PROJECTS + TASKS)
        const DEFAULT_MASTER_PROJECTS = [
            {
                id: 'p-middleware',
                type: 'project',
                title: 'Middleware Project',
                projectName: 'Middleware Project',
                category: 'E-Commerce / API',
                badgeClass: 'badge-ecommerce',
                icon: 'fa-solid fa-bag-shopping',
                status: 'in-progress',
                progress: 65,
                priority: 'High',
                lead: 'Sophia Carter',
                leadAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
                startDate: '2026-09-01',
                dueDate: '2026-11-15',
                url: 'KanbanTask.php'
            },
            {
                id: 'p-company',
                type: 'project',
                title: 'Company Website',
                projectName: 'Company Website',
                category: 'Corporate Web',
                badgeClass: 'badge-company',
                icon: 'fa-solid fa-globe',
                status: 'review',
                progress: 90,
                priority: 'Medium',
                lead: 'Michael Anderson',
                leadAvatar: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=80&q=80',
                startDate: '2026-09-08',
                dueDate: '2026-10-30',
                url: 'KanbanTask.php?project=company'
            },
            {
                id: 'p-landing',
                type: 'project',
                title: 'Landing Page Campaign',
                projectName: 'Landing Page Campaign',
                category: 'Marketing Campaign',
                badgeClass: 'badge-landing',
                icon: 'fa-solid fa-bullhorn',
                status: 'in-progress',
                progress: 40,
                priority: 'Medium',
                lead: 'Sophia Carter',
                leadAvatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80',
                startDate: '2026-09-01',
                dueDate: '2026-09-20',
                url: 'KanbanTask.php?project=landing'
            },
            {
                id: 'p-mobile',
                type: 'project',
                title: 'Mobile CRM Application',
                projectName: 'Mobile CRM Application',
                category: 'Mobile Application',
                badgeClass: 'badge-company',
                icon: 'fa-solid fa-mobile-screen',
                status: 'todo',
                progress: 15,
                priority: 'High',
                lead: 'Daniel Johnson',
                leadAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
                startDate: '2026-09-01',
                dueDate: '2027-01-15',
                url: 'KanbanTask.php?project=mobile'
            },
            {
                id: 'p-analytics',
                type: 'project',
                title: 'Internal Analytics Tool',
                projectName: 'Internal Analytics Tool',
                category: 'DevOps & Data',
                badgeClass: 'badge-ecommerce',
                icon: 'fa-solid fa-chart-line',
                status: 'completed',
                progress: 100,
                priority: 'Normal',
                lead: 'James Wilson',
                leadAvatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
                startDate: '2026-09-01',
                dueDate: '2026-09-25',
                url: 'KanbanTask.php?project=analytics'
            }
        ];

        const DEFAULT_MASTER_TASKS = [
            {
                id: 't-1',
                type: 'task',
                title: 'Design System & Component Tokens',
                projectName: 'Middleware Project',
                category: 'Design UI',
                badgeClass: 'badge-todo',
                status: 'completed',
                progress: 100,
                priority: 'Medium',
                lead: 'Jenno Wilson',
                leadAvatar: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=80&q=80',
                startDate: '2026-09-01',
                dueDate: '2026-09-07',
                url: 'KanbanTask.php'
            },
            {
                id: 't-2',
                type: 'task',
                title: 'Authentication & Session Architecture',
                projectName: 'Middleware Project',
                category: 'Backend',
                badgeClass: 'badge-progress',
                status: 'in-progress',
                progress: 70,
                priority: 'High',
                lead: 'Sarah Chen',
                leadAvatar: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=80&q=80',
                startDate: '2026-09-04',
                dueDate: '2026-09-12',
                url: 'KanbanTask.php'
            },
            {
                id: 't-3',
                type: 'task',
                title: 'Database Schema Migration & Indexing',
                projectName: 'Middleware Project',
                category: 'Database',
                badgeClass: 'badge-progress',
                status: 'in-progress',
                progress: 50,
                priority: 'High',
                lead: 'Alex Rivera',
                leadAvatar: 'https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=80&q=80',
                startDate: '2026-09-08',
                dueDate: '2026-09-18',
                url: 'KanbanTask.php'
            },
            {
                id: 't-4',
                type: 'task',
                title: 'API Gateway & Rate Limiting Gate',
                projectName: 'Middleware Project',
                category: 'API & Gateway',
                badgeClass: 'badge-todo',
                status: 'todo',
                progress: 0,
                priority: 'Urgent',
                lead: 'Michael Scott',
                leadAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
                startDate: '2026-09-14',
                dueDate: '2026-09-25',
                url: 'KanbanTask.php'
            },
            {
                id: 't-5',
                type: 'task',
                title: 'Marketing Hero Section & Copywriting',
                projectName: 'Landing Page Campaign',
                category: 'Marketing',
                badgeClass: 'badge-landing',
                status: 'completed',
                progress: 100,
                priority: 'Medium',
                lead: 'Sophia Carter',
                leadAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
                startDate: '2026-09-01',
                dueDate: '2026-09-09',
                url: 'KanbanTask.php?project=landing'
            },
            {
                id: 't-6',
                type: 'task',
                title: 'Lead Capture Form & Salesforce Webhook',
                projectName: 'Landing Page Campaign',
                category: 'Integration',
                badgeClass: 'badge-landing',
                status: 'in-progress',
                progress: 45,
                priority: 'High',
                lead: 'David Kim',
                leadAvatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
                startDate: '2026-09-06',
                dueDate: '2026-09-17',
                url: 'KanbanTask.php?project=landing'
            },
            {
                id: 't-7',
                type: 'task',
                title: 'Corporate Brand Asset Library Refresh',
                projectName: 'Company Website',
                category: 'Design',
                badgeClass: 'badge-company',
                status: 'completed',
                progress: 100,
                priority: 'Normal',
                lead: 'Michael Anderson',
                leadAvatar: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=80&q=80',
                startDate: '2026-09-08',
                dueDate: '2026-09-16',
                url: 'KanbanTask.php?project=company'
            },
            {
                id: 't-8',
                type: 'task',
                title: 'Investor Relations Dynamic Financial Chart',
                projectName: 'Company Website',
                category: 'Frontend',
                badgeClass: 'badge-company',
                status: 'review',
                progress: 90,
                priority: 'Medium',
                lead: 'Emily Watson',
                leadAvatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80',
                startDate: '2026-09-15',
                dueDate: '2026-09-28',
                url: 'KanbanTask.php?project=company'
            },
            {
                id: 't-9',
                type: 'task',
                title: 'Flutter Biometric Authentication & FaceID',
                projectName: 'Mobile CRM Application',
                category: 'Mobile Dev',
                badgeClass: 'badge-company',
                status: 'todo',
                progress: 20,
                priority: 'High',
                lead: 'Daniel Johnson',
                leadAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
                startDate: '2026-09-02',
                dueDate: '2026-09-16',
                url: 'KanbanTask.php?project=mobile'
            },
            {
                id: 't-10',
                type: 'task',
                title: 'Offline SQLite Sync Engine & Conflict Resolver',
                projectName: 'Mobile CRM Application',
                category: 'Architecture',
                badgeClass: 'badge-company',
                status: 'todo',
                progress: 10,
                priority: 'Urgent',
                lead: 'Daniel Johnson',
                leadAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
                startDate: '2026-09-12',
                dueDate: '2026-09-30',
                url: 'KanbanTask.php?project=mobile'
            }
        ];

        let ALL_PROJECTS = JSON.parse(JSON.stringify(DEFAULT_MASTER_PROJECTS));
        let ALL_TASKS = JSON.parse(JSON.stringify(DEFAULT_MASTER_TASKS));

        window.showMasterToast = function (msg) {
            $('#masterToastMsg').text(msg);
            const toastEl = document.getElementById('masterLiveToast');
            if (toastEl) {
                const toast = bootstrap.Toast.getOrCreateInstance(toastEl);
                toast.show();
            }
        };

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

        function formatShortDate(dateStr) {
            if (!dateStr) return '';
            const d = new Date(dateStr);
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            return `${months[d.getMonth()]} ${String(d.getDate()).padStart(2, '0')}`;
        }

        function getFilteredItems() {
            const scope = $('#selectMasterScope').val();
            const projFilter = $('#selectMasterProject').val();
            const statusFilter = $('#masterTimelineStatusFilter').val() || 'all';

            let items = [];
            if (scope === 'all' || scope === 'project') {
                items = items.concat(ALL_PROJECTS);
            }
            if (scope === 'all' || scope === 'task') {
                items = items.concat(ALL_TASKS);
            }

            return items.filter(item => {
                if (projFilter !== 'all' && item.projectName !== projFilter) return false;
                if (statusFilter !== 'all' && item.status !== statusFilter) return false;
                return true;
            });
        }

        /* -------------------------------------------------------------------------- */
        /* 2. TAB SWITCHERS                                                           */
        /* -------------------------------------------------------------------------- */
        $('#masterViewTabs .tab-btn').on('click', function () {
            $('#masterViewTabs .tab-btn').removeClass('active');
            $(this).addClass('active');

            const view = $(this).data('view');
            $('.view-wrapper .view-content').removeClass('active');

            if (view === 'calendar-timeline') {
                $('#viewMasterCalendar').addClass('active');
                renderMasterCalendar();
                renderMasterTimeline();
                renderMasterTimelineSchedulerTable();
            } else if (view === 'delivery-roadmap') {
                $('#viewDeliveryRoadmap').addClass('active');
                renderRoadmapCards();
            } else if (view === 'timeline-config') {
                $('#viewTimelineConfig').addClass('active');
            }
        });

        $('#masterCalendarSubTabs .cal-subtab-btn').on('click', function () {
            $('#masterCalendarSubTabs .cal-subtab-btn').removeClass('active');
            $(this).addClass('active');

            const subview = $(this).data('subview');
            $('#viewMasterCalendar .calendar-subview-content').removeClass('active');

            if (subview === 'grid') {
                $('#subviewMasterGrid').addClass('active');
                renderMasterCalendar();
            } else if (subview === 'timeline') {
                $('#subviewMasterTimeline').addClass('active');
                renderMasterTimeline();
            } else if (subview === 'schedule-manager') {
                $('#subviewMasterScheduleManager').addClass('active');
                renderMasterTimelineSchedulerTable();
            }
        });

        $('#selectMasterScope, #selectMasterProject, #masterTimelineStatusFilter').on('change', function () {
            renderMasterCalendar();
            renderMasterTimeline();
            renderMasterTimelineSchedulerTable();
            renderRoadmapCards();
        });

        /* -------------------------------------------------------------------------- */
        /* 3. RENDER MASTER CALENDAR GRID (PROJECTS & TASKS TOGETHER)                 */
        /* -------------------------------------------------------------------------- */
        function renderMasterCalendar() {
            const $grid = $('#masterCalendarGrid').empty();
            const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

            $.each(daysOfWeek, function (_, day) {
                $grid.append(`<div class="cal-day-header text-muted fw-bold fs-8 text-center p-2 text-uppercase bg-light rounded-2">${day}</div>`);
            });

            const items = getFilteredItems();

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
                        ${isCurrentMonth ? `<button class="btn btn-sm btn-link text-decoration-none cal-cell-add-btn text-muted" title="Add schedule on Sep ${dayNum}"><i class="fa-solid fa-plus"></i></button>` : ''}
                    </div>
                `);

                $cellHeader.find('.cal-cell-add-btn').on('click', function (e) {
                    e.stopPropagation();
                    $('#entryStartDate, #entryDueDate').val(dateStr);
                    $('#newEntryModal').modal('show');
                });

                $cell.append($cellHeader);

                if (isCurrentMonth) {
                    const thisDate = new Date(dateStr);
                    const dayItems = items.filter(item => {
                        const start = new Date(item.startDate || '2026-09-01');
                        const due = new Date(item.dueDate || '2026-09-30');
                        return start <= thisDate && thisDate <= due;
                    });

                    // Sort so Projects come first then Tasks
                    dayItems.sort((a, b) => (a.type === 'project' ? -1 : 1));

                    $.each(dayItems.slice(0, 3), function (_, it) {
                        const isProj = it.type === 'project';
                        const statusClass = isProj ? 'bg-primary text-white border-0' : `badge-${it.status === 'completed' ? 'complete' : it.status === 'in-progress' ? 'progress' : it.status}`;
                        const icon = isProj ? 'fa-solid fa-folder-tree' : 'fa-solid fa-check-double';

                        const $pill = $('<div>', {
                            class: `cal-task-pill ${statusClass} text-truncate d-flex align-items-center gap-1 shadow-2xs cursor-pointer`,
                            title: `[${isProj ? 'Project' : 'Task'}] ${it.title} (${formatShortDate(it.startDate)} - ${formatShortDate(it.dueDate)})`
                        });
                        $pill.html(`<i class="${icon} fs-9"></i> <span class="fw-semibold">${isProj ? '⭐ ' : ''}${it.title}</span>`);
                        $pill.on('click', function (e) {
                            e.stopPropagation();
                            window.location.href = it.url;
                        });
                        $cell.append($pill);
                    });

                    if (dayItems.length > 3) {
                        $cell.append(`<span class="fs-9 text-muted fw-bold">+${dayItems.length - 3} more</span>`);
                    }
                }

                $grid.append($cell);
            }
        }

        /* -------------------------------------------------------------------------- */
        /* 4. RENDER UNIFIED GANTT TIMELINE (MULTI-TIER: PROJECTS & TASKS)           */
        /* -------------------------------------------------------------------------- */
        function renderMasterTimeline() {
            const $list = $('#masterTimelineList').empty();
            const groupMode = $('#ganttGroupingToggle .btn.active').data('group') || 'by-project';
            const items = getFilteredItems();

            if (items.length === 0) {
                $list.html('<div class="text-center text-muted p-4 fs-7"><i class="fa-regular fa-folder-open me-2"></i> No timeline items found for current filter.</div>');
                return;
            }

            const statusClassMap = {
                todo: 'timeline-bar-todo',
                'in-progress': 'timeline-bar-progress',
                review: 'timeline-bar-review',
                completed: 'timeline-bar-complete'
            };

            const statusBadgeMap = {
                todo: '<span class="badge badge-todo rounded-pill px-2 py-0.5 fs-8 me-1">To Do</span>',
                'in-progress': '<span class="badge badge-progress rounded-pill px-2 py-0.5 fs-8 me-1">In Progress</span>',
                review: '<span class="badge badge-review rounded-pill px-2 py-0.5 fs-8 me-1">Review</span>',
                completed: '<span class="badge badge-complete rounded-pill px-2 py-0.5 fs-8 me-1">Complete</span>'
            };

            if (groupMode === 'by-project') {
                // Group tasks under their respective projects
                const projectsToRender = ALL_PROJECTS.filter(p => {
                    const projFilter = $('#selectMasterProject').val();
                    return projFilter === 'all' || p.projectName === projFilter;
                });

                $.each(projectsToRender, function (_, proj) {
                    const startObj = new Date(proj.startDate || '2026-09-01');
                    const startDay = Math.min(30, Math.max(1, startObj.getDate()));
                    const duration = calculateDays(proj.startDate || '2026-09-01', proj.dueDate || '2026-09-30');
                    const startMargin = ((startDay - 1) / 30) * 100;
                    const widthPercent = Math.max(12, Math.min(100 - startMargin, (duration / 30) * 100));

                    // 1. Project Master Header Bar
                    const $projRow = $(`
                        <div class="gantt-grid-row gap-3 bg-light-subtle rounded-3 p-2 border border-primary-subtle shadow-2xs mb-1">
                            <div class="d-flex flex-column" style="min-width: 0;">
                                <div class="d-flex align-items-center gap-1.5">
                                    <span class="badge bg-primary fs-9 px-1.5 py-0.5">PROJECT</span>
                                    <a href="${proj.url}" class="fw-extrabold fs-7 text-dark text-truncate text-decoration-none" title="${proj.title}">${proj.title}</a>
                                </div>
                                <div class="d-flex align-items-center gap-1 mt-1 flex-wrap">
                                    <span class="badge ${proj.badgeClass} fs-9">${proj.category}</span>
                                    <span class="fs-8 text-muted fw-semibold">${formatShortDate(proj.startDate)} - ${formatShortDate(proj.dueDate)} (${duration}d)</span>
                                </div>
                            </div>

                            <div class="px-2">
                                <div class="timeline-bar-track position-relative" style="height: 22px; border-radius: 999px;">
                                    <div class="timeline-bar-fill bg-primary d-flex align-items-center justify-content-between text-white fs-9 fw-bold px-2 text-truncate" 
                                         style="width: ${widthPercent}%; margin-left: ${startMargin}%; height: 100%; border-radius: 999px;">
                                        <span>${duration}d</span>
                                        <span class="badge bg-dark bg-opacity-25 fs-9 py-0.5 px-1.5 rounded-pill">${proj.progress}%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end gap-2">
                                <img src="${proj.leadAvatar}" class="avatar-xs rounded-circle border border-white" alt="${proj.lead}">
                                <button class="btn btn-sm btn-outline-primary py-0.5 px-2 fs-8 btn-master-adjust-timeline" data-item-id="${proj.id}" title="Adjust Timeline">
                                    <i class="fa-solid fa-sliders"></i>
                                </button>
                                <a href="${proj.url}" class="btn btn-sm btn-light border py-0.5 px-2 fs-8" title="Open Project Board">
                                    <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i>
                                </a>
                            </div>
                        </div>
                    `);

                    $list.append($projRow);

                    // 2. Child Tasks under this project
                    const childTasks = ALL_TASKS.filter(t => t.projectName === proj.projectName);
                    $.each(childTasks, function (_, task) {
                        const tStartObj = new Date(task.startDate || '2026-09-01');
                        const tStartDay = Math.min(30, Math.max(1, tStartObj.getDate()));
                        const tDuration = calculateDays(task.startDate || '2026-09-01', task.dueDate || '2026-09-30');
                        const tStartMargin = ((tStartDay - 1) / 30) * 100;
                        const tWidthPercent = Math.max(10, Math.min(100 - tStartMargin, (tDuration / 30) * 100));

                        const $taskRow = $(`
                            <div class="gantt-grid-row gap-3 ps-3 mb-1">
                                <div class="d-flex flex-column" style="min-width: 0;">
                                    <div class="d-flex align-items-center gap-1.5">
                                        <span class="badge bg-secondary-subtle text-dark fs-9 px-1 py-0.5">TASK</span>
                                        <span class="fw-bold fs-7 text-dark text-truncate" title="${task.title}">${task.title}</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-1 mt-1 flex-wrap">
                                        ${statusBadgeMap[task.status] || ''}
                                        <span class="fs-8 text-muted">${formatShortDate(task.startDate)} - ${formatShortDate(task.dueDate)} (${tDuration}d)</span>
                                    </div>
                                </div>

                                <div class="px-2">
                                    <div class="timeline-bar-track position-relative" style="height: 16px; border-radius: 999px;">
                                        <div class="timeline-bar-fill ${statusClassMap[task.status] || 'timeline-bar-progress'} d-flex align-items-center justify-content-center text-white fs-9 fw-bold px-2 text-truncate" 
                                             style="width: ${tWidthPercent}%; margin-left: ${tStartMargin}%; height: 100%; border-radius: 999px;">
                                            ${tDuration >= 4 ? `${tDuration}d` : ''}
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-end gap-2">
                                    <img src="${task.leadAvatar}" class="avatar-xs rounded-circle border border-white" alt="${task.lead}">
                                    <button class="btn btn-sm btn-outline-secondary py-0.5 px-2 fs-8 btn-master-adjust-timeline" data-item-id="${task.id}" title="Adjust Task Schedule">
                                        <i class="fa-solid fa-sliders"></i>
                                    </button>
                                </div>
                            </div>
                        `);
                        $list.append($taskRow);
                    });
                });
            } else {
                // Flat items list
                $.each(items, function (_, it) {
                    const isProj = it.type === 'project';
                    const startObj = new Date(it.startDate || '2026-09-01');
                    const startDay = Math.min(30, Math.max(1, startObj.getDate()));
                    const duration = calculateDays(it.startDate || '2026-09-01', it.dueDate || '2026-09-30');
                    const startMargin = ((startDay - 1) / 30) * 100;
                    const widthPercent = Math.max(10, Math.min(100 - startMargin, (duration / 30) * 100));

                    const $row = $(`
                        <div class="gantt-grid-row gap-3 mb-1 ${isProj ? 'bg-light-subtle rounded-3 p-1.5 border' : ''}">
                            <div class="d-flex flex-column" style="min-width: 0;">
                                <div class="d-flex align-items-center gap-1.5">
                                    <span class="badge ${isProj ? 'bg-primary' : 'bg-secondary-subtle text-dark'} fs-9 px-1.5 py-0.5">${isProj ? 'PROJECT' : 'TASK'}</span>
                                    <span class="fw-bold fs-7 text-dark text-truncate" title="${it.title}">${it.title}</span>
                                </div>
                                <div class="d-flex align-items-center gap-1 mt-1 flex-wrap">
                                    ${statusBadgeMap[it.status] || ''}
                                    <span class="fs-8 text-muted">${formatShortDate(it.startDate)} - ${formatShortDate(it.dueDate)} (${duration}d) &bull; ${it.projectName}</span>
                                </div>
                            </div>

                            <div class="px-2">
                                <div class="timeline-bar-track position-relative" style="height: ${isProj ? '20px' : '16px'}; border-radius: 999px;">
                                    <div class="timeline-bar-fill ${isProj ? 'bg-primary' : statusClassMap[it.status] || 'timeline-bar-progress'} d-flex align-items-center justify-content-center text-white fs-9 fw-bold px-2 text-truncate" 
                                         style="width: ${widthPercent}%; margin-left: ${startMargin}%; height: 100%; border-radius: 999px;">
                                        ${duration >= 4 ? `${duration}d` : ''}
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end gap-2">
                                <img src="${it.leadAvatar}" class="avatar-xs rounded-circle border border-white" alt="${it.lead}">
                                <button class="btn btn-sm btn-outline-secondary py-0.5 px-2 fs-8 btn-master-adjust-timeline" data-item-id="${it.id}" title="Adjust Schedule">
                                    <i class="fa-solid fa-sliders"></i>
                                </button>
                            </div>
                        </div>
                    `);
                    $list.append($row);
                });
            }

            $('.btn-master-adjust-timeline').on('click', function (e) {
                e.stopPropagation();
                const itemId = $(this).data('item-id');
                $('#masterCalendarSubTabs .cal-subtab-btn[data-subview="schedule-manager"]').trigger('click');
                setTimeout(() => {
                    const $targetRow = $(`#row-master-sched-${itemId}`);
                    if ($targetRow.length) {
                        $targetRow[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                        $targetRow.addClass('table-primary');
                        setTimeout(() => $targetRow.removeClass('table-primary'), 1500);
                    }
                }, 50);
            });
        }

        $('#ganttGroupingToggle .btn').on('click', function () {
            $('#ganttGroupingToggle .btn').removeClass('active');
            $(this).addClass('active');
            renderMasterTimeline();
        });

        /* -------------------------------------------------------------------------- */
        /* 5. RENDER MASTER UNIFIED TIMELINE SCHEDULER TABLE                          */
        /* -------------------------------------------------------------------------- */
        function renderMasterTimelineSchedulerTable() {
            const $tbody = $('#masterTimelineSchedulerTableBody').empty();
            const items = getFilteredItems();

            $('#schedulerCountSummary').text(`${ALL_PROJECTS.length} Projects • ${ALL_TASKS.length} Tasks`);

            const statusBadgeMap = {
                todo: '<span class="badge badge-todo rounded-pill px-2 py-1 fs-8">To Do</span>',
                'in-progress': '<span class="badge badge-progress rounded-pill px-2 py-1 fs-8">In Progress</span>',
                review: '<span class="badge badge-review rounded-pill px-2 py-1 fs-8">Review</span>',
                completed: '<span class="badge badge-complete rounded-pill px-2 py-1 fs-8">Complete</span>'
            };

            $.each(items, function (_, it) {
                const isProj = it.type === 'project';
                const startDateVal = it.startDate || '2026-09-01';
                const dueDateVal = it.dueDate || '2026-09-30';
                const priorityVal = it.priority || 'Medium';
                const durationDays = calculateDays(startDateVal, dueDateVal);

                const $tr = $('<tr>', { id: `row-master-sched-${it.id}`, class: isProj ? 'table-light' : '' });
                $tr.html(`
                    <!-- Type Badge -->
                    <td class="py-2.5 px-3">
                        <span class="badge ${isProj ? 'bg-primary' : 'bg-secondary-subtle text-dark'} rounded-pill px-2 py-1 fs-8 fw-semibold">
                            ${isProj ? '<i class="fa-solid fa-layer-group me-1"></i> Project' : '<i class="fa-solid fa-check me-1"></i> Task'}
                        </span>
                    </td>

                    <!-- Item Title & Parent Project -->
                    <td class="py-2.5 px-2">
                        <div class="d-flex align-items-center gap-2">
                            <img src="${it.leadAvatar}" class="avatar-xs rounded-circle border" alt="${it.lead}">
                            <div>
                                <a href="${it.url}" class="fw-bold text-dark text-decoration-none d-block">${it.title}</a>
                                <span class="fs-8 text-muted">${it.projectName} &bull; Lead: ${it.lead}</span>
                            </div>
                        </div>
                    </td>

                    <!-- Status -->
                    <td class="py-2.5 px-2">${statusBadgeMap[it.status] || ''}</td>

                    <!-- Priority Selector -->
                    <td class="py-2.5 px-2">
                        <select class="form-select form-select-sm fs-8 py-1 master-sched-priority" data-item-id="${it.id}">
                            <option value="Normal" ${priorityVal === 'Normal' ? 'selected' : ''}>Normal</option>
                            <option value="Medium" ${priorityVal === 'Medium' ? 'selected' : ''}>Medium</option>
                            <option value="High" ${priorityVal === 'High' ? 'selected' : ''}>High</option>
                            <option value="Urgent" ${priorityVal === 'Urgent' ? 'selected' : ''}>Urgent</option>
                        </select>
                    </td>

                    <!-- Start Date Input -->
                    <td class="py-2.5 px-2">
                        <input type="date" class="form-control form-control-sm fs-8 py-1 master-sched-start" data-item-id="${it.id}" value="${startDateVal}">
                    </td>

                    <!-- Due Date Input -->
                    <td class="py-2.5 px-2">
                        <input type="date" class="form-control form-control-sm fs-8 py-1 master-sched-due" data-item-id="${it.id}" value="${dueDateVal}">
                    </td>

                    <!-- Duration Badge -->
                    <td class="py-2.5 px-2">
                        <span class="badge bg-white text-dark border fs-8 px-2 py-1" id="master-dur-${it.id}">
                            <i class="fa-regular fa-clock me-1 text-primary"></i> ${durationDays}d
                        </span>
                    </td>

                    <!-- Quick Preset Adjustments -->
                    <td class="py-2.5 px-2">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-secondary fs-9 py-0.5 px-1.5 btn-master-preset" data-item-id="${it.id}" data-days="7" title="+1 Week">+1w</button>
                            <button class="btn btn-outline-secondary fs-9 py-0.5 px-1.5 btn-master-preset" data-item-id="${it.id}" data-days="14" title="+2 Weeks">+2w</button>
                            <button class="btn btn-outline-secondary fs-9 py-0.5 px-1.5 btn-master-preset" data-item-id="${it.id}" data-days="30" title="+1 Month">+1m</button>
                            <button class="btn btn-outline-primary fs-9 py-0.5 px-1.5 btn-master-preset" data-item-id="${it.id}" data-days="90" title="Quarter Q4">Q4</button>
                        </div>
                    </td>

                    <!-- Actions -->
                    <td class="py-2.5 px-3 text-end">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-light border btn-save-master-sched" data-item-id="${it.id}" title="Save Schedule Changes">
                                <i class="fa-solid fa-check text-success"></i>
                            </button>
                            <a href="${it.url}" class="btn btn-light border" title="Go to Board">
                                <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i>
                            </a>
                        </div>
                    </td>
                `);

                $tbody.append($tr);
            });

            // Date Change Handler
            $('.master-sched-start, .master-sched-due').on('change', function () {
                const itemId = $(this).data('item-id');
                const $row = $(`#row-master-sched-${itemId}`);
                const startVal = $row.find('.master-sched-start').val();
                const dueVal = $row.find('.master-sched-due').val();

                if (startVal && dueVal) {
                    const dur = calculateDays(startVal, dueVal);
                    $row.find(`#master-dur-${itemId}`).html(`<i class="fa-regular fa-clock me-1 text-primary"></i> ${dur}d`);

                    let target = ALL_PROJECTS.find(p => p.id === itemId) || ALL_TASKS.find(t => t.id === itemId);
                    if (target) {
                        target.startDate = startVal;
                        target.dueDate = dueVal;
                        showMasterToast(`Updated timeline for "${target.title}" (${dur} days)`);
                    }
                }
            });

            // Priority Change Handler
            $('.master-sched-priority').on('change', function () {
                const itemId = $(this).data('item-id');
                const priorityVal = $(this).val();
                let target = ALL_PROJECTS.find(p => p.id === itemId) || ALL_TASKS.find(t => t.id === itemId);
                if (target) {
                    target.priority = priorityVal;
                    showMasterToast(`Priority for "${target.title}" updated to ${priorityVal}`);
                }
            });

            // Preset Buttons
            $('.btn-master-preset').on('click', function () {
                const itemId = $(this).data('item-id');
                const addDays = parseInt($(this).data('days'), 10);
                const $row = $(`#row-master-sched-${itemId}`);
                const startVal = $row.find('.master-sched-start').val() || '2026-09-01';

                const sDate = new Date(startVal);
                sDate.setDate(sDate.getDate() + addDays);
                const newDueStr = sDate.toISOString().split('T')[0];

                $row.find('.master-sched-due').val(newDueStr).trigger('change');
            });

            // Save Single Item
            $('.btn-save-master-sched').on('click', function () {
                const itemId = $(this).data('item-id');
                let target = ALL_PROJECTS.find(p => p.id === itemId) || ALL_TASKS.find(t => t.id === itemId);
                if (target) {
                    showMasterToast(`Schedule saved for "${target.title}"!`);
                    renderMasterCalendar();
                    renderMasterTimeline();
                }
            });
        }

        /* -------------------------------------------------------------------------- */
        /* 6. RENDER DELIVERY ROADMAP CARDS                                          */
        /* -------------------------------------------------------------------------- */
        function renderRoadmapCards() {
            const $container = $('#roadmapProjectsContainer').empty();
            const projFilter = $('#selectMasterProject').val();

            const projects = ALL_PROJECTS.filter(p => projFilter === 'all' || p.projectName === projFilter);

            $.each(projects, function (_, proj) {
                const childTasks = ALL_TASKS.filter(t => t.projectName === proj.projectName);
                const doneCount = childTasks.filter(t => t.status === 'completed').length;
                const totalCount = childTasks.length;

                const $card = $(`
                    <div class="p-3 border rounded-4 bg-light-subtle shadow-2xs">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge-icon-sm ${proj.badgeClass} p-1.5 rounded-2"><i class="${proj.icon}"></i></span>
                                <a href="${proj.url}" class="fw-bold text-dark fs-6 text-decoration-none">${proj.title}</a>
                            </div>
                            <span class="badge ${proj.progress === 100 ? 'bg-success' : 'bg-primary'}">${proj.status === 'completed' ? 'Delivered' : 'On Track'} (${proj.progress}%)</span>
                        </div>
                        <div class="progress mb-2" style="height: 10px;">
                            <div class="progress-bar ${proj.progress === 100 ? 'bg-success' : 'bg-primary'}" style="width: ${proj.progress}%;"></div>
                        </div>
                        <div class="d-flex flex-wrap align-items-center justify-content-between fs-8 text-muted">
                            <span><i class="fa-regular fa-calendar me-1"></i> ${formatShortDate(proj.startDate)} - ${formatShortDate(proj.dueDate)}</span>
                            <span>Lead: ${proj.lead} &bull; ${doneCount}/${totalCount} Tasks Complete</span>
                        </div>
                    </div>
                `);
                $container.append($card);
            });
        }

        /* -------------------------------------------------------------------------- */
        /* 7. RESET & MONTH NAVIGATION                                                */
        /* -------------------------------------------------------------------------- */
        $('#btnSyncAllMaster').on('click', function () {
            ALL_PROJECTS = JSON.parse(JSON.stringify(DEFAULT_MASTER_PROJECTS));
            ALL_TASKS = JSON.parse(JSON.stringify(DEFAULT_MASTER_TASKS));
            renderMasterCalendar();
            renderMasterTimeline();
            renderMasterTimelineSchedulerTable();
            renderRoadmapCards();
            showMasterToast('All project and task schedules reset to defaults.');
        });

        $('#btnMasterPrevMonth').on('click', function () {
            $('#masterCalendarMonthTitle').text('August 2026');
            showMasterToast('Showing August 2026 calendar view');
        });

        $('#btnMasterToday').on('click', function () {
            $('#masterCalendarMonthTitle').text('September 2026');
            renderMasterCalendar();
            showMasterToast('Reset to Current Month: September 2026');
        });

        $('#btnMasterNextMonth').on('click', function () {
            $('#masterCalendarMonthTitle').text('October 2026');
            showMasterToast('Showing October 2026 calendar view');
        });

        // Add New Schedule Entry Form Submission
        $('#newEntryForm').on('submit', function (e) {
            e.preventDefault();
            const type = $('#entryType').val();
            const title = $('#entryTitle').val();
            const project = $('#entryProject').val();
            const start = $('#entryStartDate').val();
            const due = $('#entryDueDate').val();
            const priority = $('#entryPriority').val();
            const status = $('#entryStatus').val();

            const newId = 'entry-' + Date.now();
            const newItem = {
                id: newId,
                type: type,
                title: title,
                projectName: project,
                category: type === 'project' ? 'New Project' : 'General Task',
                badgeClass: 'badge-progress',
                icon: type === 'project' ? 'fa-solid fa-folder-tree' : 'fa-solid fa-check',
                status: status,
                progress: status === 'completed' ? 100 : status === 'in-progress' ? 50 : 0,
                priority: priority,
                lead: 'Jenno Wilson',
                leadAvatar: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=80&q=80',
                startDate: start,
                dueDate: due,
                url: type === 'project' ? 'KanbanProject.php' : 'KanbanTask.php'
            };

            if (type === 'project') {
                ALL_PROJECTS.push(newItem);
            } else {
                ALL_TASKS.push(newItem);
            }

            $('#newEntryModal').modal('hide');
            $('#newEntryForm')[0].reset();
            renderMasterCalendar();
            renderMasterTimeline();
            renderMasterTimelineSchedulerTable();
            renderRoadmapCards();
            showMasterToast(`Added new ${type}: "${title}"!`);
        });

        // Initial Boot
        renderMasterCalendar();
        renderMasterTimeline();
        renderMasterTimelineSchedulerTable();
        renderRoadmapCards();
    });
    </script>
</body>

</html>
