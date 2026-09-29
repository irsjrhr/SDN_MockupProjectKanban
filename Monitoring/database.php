<?php
$currentPage = 'monitoring-database';
$currentModule = 'monitoring';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production Database Tables - Syncboard</title>

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
                            <li class="breadcrumb-item text-muted"><a href="dashboard.php" class="text-muted text-decoration-none">Monitoring</a></li>
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Production Database</li>
                        </ol>
                    </nav>
                </div>
            </header>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary">
                        <i class="fa-solid fa-database fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Production Database & Table Metrics</h1>
                        <span class="text-muted fs-7">Real-time table sizes, row counts, storage engine, indexes, and read/write IOPS</span>
                    </div>
                </div>
            </section>

            <!-- Content -->
            <div class="view-wrapper flex-grow-1 p-4">
                <div class="card shadow-sm border rounded-4 bg-white overflow-hidden mb-4">
                    <div class="card-header bg-white p-3 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <h2 class="h6 fw-bold mb-0">Production Tables Inventory</h2>
                        <span class="badge bg-primary-subtle text-primary fs-8">MySQL 8.0 &bull; 48 Active Tables &bull; Total Size: 4.2 GB</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 fs-7">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                <tr>
                                    <th class="ps-4">Production Table Name</th>
                                    <th>Associated Project</th>
                                    <th>Engine</th>
                                    <th>Total Rows</th>
                                    <th>Data Size</th>
                                    <th>Index Size</th>
                                    <th>Avg Row Length</th>
                                    <th class="pe-4 text-end">Health</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-table text-primary me-2"></i>tbl_middleware_logs</span>
                                    </td>
                                    <td><span class="badge bg-primary-subtle text-primary">Middleware Project</span></td>
                                    <td>InnoDB</td>
                                    <td><strong>1,240,580</strong></td>
                                    <td>842.5 MB</td>
                                    <td>124.2 MB</td>
                                    <td>680 bytes</td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-table text-primary me-2"></i>tbl_telemetry_events</span>
                                    </td>
                                    <td><span class="badge bg-ecommerce text-dark">Analytics Tool</span></td>
                                    <td>TimescaleDB / InnoDB</td>
                                    <td><strong>4,890,200</strong></td>
                                    <td>2,140.0 MB</td>
                                    <td>320.0 MB</td>
                                    <td>438 bytes</td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-table text-primary me-2"></i>tbl_landing_leads</span>
                                    </td>
                                    <td><span class="badge bg-warning-subtle text-warning">Landing Campaign</span></td>
                                    <td>InnoDB</td>
                                    <td><strong>34,190</strong></td>
                                    <td>18.4 MB</td>
                                    <td>4.2 MB</td>
                                    <td>538 bytes</td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-table text-primary me-2"></i>tbl_mobile_sync_tokens</span>
                                    </td>
                                    <td><span class="badge bg-company text-dark">Mobile CRM App</span></td>
                                    <td>InnoDB</td>
                                    <td><strong>118,500</strong></td>
                                    <td>64.0 MB</td>
                                    <td>12.8 MB</td>
                                    <td>540 bytes</td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-table text-primary me-2"></i>tbl_company_articles</span>
                                    </td>
                                    <td><span class="badge bg-info-subtle text-info">Company Website</span></td>
                                    <td>InnoDB</td>
                                    <td><strong>8,420</strong></td>
                                    <td>14.8 MB</td>
                                    <td>2.1 MB</td>
                                    <td>1,760 bytes</td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>
                            </tbody>
                        </table>
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
