<?php
$currentPage = 'permission';
$currentModule = 'master';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permissions - Master - Syncboard</title>

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
                            <li class="breadcrumb-item text-muted">Master</li>
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Permissions</li>
                        </ol>
                    </nav>
                </div>

                <div class="navbar-right d-flex align-items-center gap-3">
                    <button class="btn btn-light btn-nav-icon rounded-circle position-relative" title="Notifications">
                        <i class="fa-regular fa-bell"></i>
                        <span class="notification-dot position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger p-1"></span>
                    </button>
                </div>
            </header>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-warning">
                        <i class="fa-solid fa-key fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Permissions Matrix</h1>
                        <span class="text-muted fs-7">Manage system capabilities and feature flags</span>
                    </div>
                </div>

                <button class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-plus"></i> Add Permission
                </button>
            </section>

            <!-- Permissions Matrix Table -->
            <div class="view-wrapper flex-grow-1 p-4">
                <div class="card shadow-sm border rounded-4 overflow-hidden bg-white">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr class="fs-8 text-uppercase text-muted">
                                    <th class="ps-4">Permission Name</th>
                                    <th>Module</th>
                                    <th>Guard</th>
                                    <th>Admin</th>
                                    <th>Manager</th>
                                    <th>Dev</th>
                                    <th class="pe-4 text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody class="fs-7">
                                <tr>
                                    <td class="ps-4 fw-bold text-dark">projects.create</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Workspace</span></td>
                                    <td><code>web</code></td>
                                    <td><i class="fa-solid fa-check text-success"></i></td>
                                    <td><i class="fa-solid fa-check text-success"></i></td>
                                    <td><i class="fa-solid fa-xmark text-muted"></i></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border"><i class="fa-solid fa-pen"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold text-dark">tasks.update</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Workspace</span></td>
                                    <td><code>web</code></td>
                                    <td><i class="fa-solid fa-check text-success"></i></td>
                                    <td><i class="fa-solid fa-check text-success"></i></td>
                                    <td><i class="fa-solid fa-check text-success"></i></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border"><i class="fa-solid fa-pen"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold text-dark">users.manage</td>
                                    <td><span class="badge bg-dark-subtle text-dark">Master</span></td>
                                    <td><code>web</code></td>
                                    <td><i class="fa-solid fa-check text-success"></i></td>
                                    <td><i class="fa-solid fa-xmark text-muted"></i></td>
                                    <td><i class="fa-solid fa-xmark text-muted"></i></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border"><i class="fa-solid fa-pen"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Application Script -->
    <script src="../assets/js/app.js"></script>
</body>

</html>
