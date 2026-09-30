<?php
$pageTitle = 'Master Calendar & Timeline - Workspace - Syncboard';
$currentPage = 'calendar-timeline';
$currentModule = 'workspace';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Workspace', 'url' => 'dashboard.php'],
    ['title' => 'Master Calendar & Timeline (Projects & Tasks)', 'url' => '']
];
$extraJs = ['../assets/js/calendar-timeline.js'];
include __DIR__ . '/../layouts/header.php';
?>

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
<?php include __DIR__ . '/../layouts/footer.php'; ?>
