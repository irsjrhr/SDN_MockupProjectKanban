<?php
$currentPage = 'setting-kanban';
$currentModule = 'setting';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanban & Workflow Master Configuration - Syncboard</title>

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
                            <li class="breadcrumb-item text-muted"><a href="general.php" class="text-muted text-decoration-none">Master Settings</a></li>
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Kanban & Workflows</li>
                        </ol>
                    </nav>
                </div>
                <div class="navbar-right d-flex align-items-center gap-2">
                    <button class="btn btn-outline-secondary fs-7 rounded-3 px-3">Reset to Default</button>
                    <button class="btn btn-primary fs-7 rounded-3 px-3"><i class="fa-solid fa-check me-1"></i> Save Workflow</button>
                </div>
            </header>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-warning">
                        <i class="fa-solid fa-table-columns fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Kanban Board & Workflow Master</h1>
                        <span class="text-muted fs-7">Manage global stage columns, WIP (Work In Progress) constraints, priority taxonomy, and task badges</span>
                    </div>
                </div>
                <button class="btn btn-primary fs-7 rounded-3"><i class="fa-solid fa-plus me-1"></i> Add Stage Column</button>
            </section>

            <!-- Content Area -->
            <div class="view-wrapper flex-grow-1 p-4">
                <!-- Section 1: Stage Columns -->
                <div class="card shadow-sm border rounded-4 bg-white overflow-hidden mb-4">
                    <div class="card-header bg-white p-3 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <div>
                            <h2 class="h6 fw-bold mb-0">Master Kanban Column Stages</h2>
                            <span class="text-muted fs-8">These columns determine the default board lifecycle for new projects</span>
                        </div>
                        <span class="badge bg-primary-subtle text-primary fs-8">4 Standard Stages &bull; Drag to Reorder</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 fs-7">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                <tr>
                                    <th class="ps-4" style="width: 40px;">Order</th>
                                    <th>Stage Title</th>
                                    <th>Status Identifier</th>
                                    <th>Color Accent</th>
                                    <th>WIP Task Limit</th>
                                    <th>Automation Rule</th>
                                    <th class="pe-4 text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4 text-muted"><i class="fa-solid fa-grip-vertical cursor-grab"></i> 1</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge rounded-circle p-1 bg-secondary"></span>
                                            <span class="fw-bold text-dark">To Do</span>
                                        </div>
                                    </td>
                                    <td><code>todo</code></td>
                                    <td><span class="badge bg-secondary-subtle text-secondary border">Slate Gray</span></td>
                                    <td><span class="badge bg-light text-dark border">No Limit</span></td>
                                    <td><span class="text-muted fs-8">Default on Creation</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border rounded-2"><i class="fa-solid fa-pen-to-square"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4 text-muted"><i class="fa-solid fa-grip-vertical cursor-grab"></i> 2</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge rounded-circle p-1 bg-primary"></span>
                                            <span class="fw-bold text-dark">In Progress</span>
                                        </div>
                                    </td>
                                    <td><code>in_progress</code></td>
                                    <td><span class="badge bg-primary-subtle text-primary border">Indigo Blue</span></td>
                                    <td><span class="badge bg-warning-subtle text-warning border">Max 5 / Dev</span></td>
                                    <td><span class="text-muted fs-8">Log Start Time</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border rounded-2"><i class="fa-solid fa-pen-to-square"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4 text-muted"><i class="fa-solid fa-grip-vertical cursor-grab"></i> 3</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge rounded-circle p-1 bg-info"></span>
                                            <span class="fw-bold text-dark">Review / QA</span>
                                        </div>
                                    </td>
                                    <td><code>review</code></td>
                                    <td><span class="badge bg-info-subtle text-info border">Cyan Teal</span></td>
                                    <td><span class="badge bg-light text-dark border">Max 10 Total</span></td>
                                    <td><span class="text-muted fs-8">Notify Lead QA</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border rounded-2"><i class="fa-solid fa-pen-to-square"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4 text-muted"><i class="fa-solid fa-grip-vertical cursor-grab"></i> 4</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge rounded-circle p-1 bg-success"></span>
                                            <span class="fw-bold text-dark">Done</span>
                                        </div>
                                    </td>
                                    <td><code>done</code></td>
                                    <td><span class="badge bg-success-subtle text-success border">Emerald Green</span></td>
                                    <td><span class="badge bg-light text-dark border">No Limit</span></td>
                                    <td><span class="text-muted fs-8">Mark 100% Progress</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border rounded-2"><i class="fa-solid fa-pen-to-square"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row g-4">
                    <!-- Master Priorities -->
                    <div class="col-12 col-lg-6">
                        <div class="card shadow-sm border rounded-4 bg-white p-4 h-100">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h2 class="h6 fw-bold mb-0 text-dark">Master Priority Levels</h2>
                                    <span class="text-muted fs-8">Global priority labels and SLA resolution targets</span>
                                </div>
                                <button class="btn btn-sm btn-outline-primary rounded-3"><i class="fa-solid fa-plus me-1"></i> New</button>
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <div class="d-flex align-items-center justify-content-between p-2 rounded-3 border bg-light">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="fa-solid fa-fire text-danger"></i>
                                        <span class="fw-bold text-dark fs-7">Urgent / Critical</span>
                                    </div>
                                    <span class="badge bg-danger">SLA: 4 Hours</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between p-2 rounded-3 border bg-light">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="fa-solid fa-arrow-up text-warning"></i>
                                        <span class="fw-bold text-dark fs-7">High Priority</span>
                                    </div>
                                    <span class="badge bg-warning text-dark">SLA: 24 Hours</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between p-2 rounded-3 border bg-light">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="fa-solid fa-equals text-primary"></i>
                                        <span class="fw-bold text-dark fs-7">Medium Priority</span>
                                    </div>
                                    <span class="badge bg-primary">SLA: 3 Days</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between p-2 rounded-3 border bg-light">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="fa-solid fa-arrow-down text-secondary"></i>
                                        <span class="fw-bold text-dark fs-7">Low Priority</span>
                                    </div>
                                    <span class="badge bg-secondary">SLA: 7 Days</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Master Tags / Labels -->
                    <div class="col-12 col-lg-6">
                        <div class="card shadow-sm border rounded-4 bg-white p-4 h-100">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h2 class="h6 fw-bold mb-0 text-dark">Global Task Tags & Badges</h2>
                                    <span class="text-muted fs-8">Tags shared across all projects for easy filtering</span>
                                </div>
                                <button class="btn btn-sm btn-outline-primary rounded-3"><i class="fa-solid fa-plus me-1"></i> New Tag</button>
                            </div>
                            <div class="d-flex flex-wrap gap-2 pt-2">
                                <span class="badge bg-primary-subtle text-primary border px-3 py-2 fs-7 rounded-pill"><i class="fa-solid fa-tag me-1"></i> Backend API</span>
                                <span class="badge bg-info-subtle text-info border px-3 py-2 fs-7 rounded-pill"><i class="fa-solid fa-tag me-1"></i> Frontend UI</span>
                                <span class="badge bg-danger-subtle text-danger border px-3 py-2 fs-7 rounded-pill"><i class="fa-solid fa-bug me-1"></i> Bugfix</span>
                                <span class="badge bg-warning-subtle text-warning border px-3 py-2 fs-7 rounded-pill"><i class="fa-solid fa-tag me-1"></i> Performance</span>
                                <span class="badge bg-success-subtle text-success border px-3 py-2 fs-7 rounded-pill"><i class="fa-solid fa-shield me-1"></i> Security</span>
                                <span class="badge bg-secondary-subtle text-secondary border px-3 py-2 fs-7 rounded-pill"><i class="fa-solid fa-book me-1"></i> Documentation</span>
                                <span class="badge bg-purple-subtle text-dark border px-3 py-2 fs-7 rounded-pill"><i class="fa-solid fa-server me-1"></i> DevOps / CI</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
