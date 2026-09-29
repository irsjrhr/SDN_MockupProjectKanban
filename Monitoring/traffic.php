<?php
$currentPage = 'monitoring-traffic';
$currentModule = 'monitoring';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traffic & Network Analytics - Syncboard</title>

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
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Traffic & Network</li>
                        </ol>
                    </nav>
                </div>
            </header>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary">
                        <i class="fa-solid fa-chart-line fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Traffic, Hit Rates & Network IO</h1>
                        <span class="text-muted fs-7">Real-time HTTP request throughput, response times, and bandwidth usage</span>
                    </div>
                </div>
            </section>

            <!-- Content -->
            <div class="view-wrapper flex-grow-1 p-4">
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white">
                            <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">HTTP 2xx Success Rate</span>
                            <h3 class="h4 fw-extrabold text-success mb-0">99.82%</h3>
                            <span class="fs-8 text-muted mt-1 d-block">2,395,680 successful requests</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white">
                            <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">HTTP 4xx Client Errors</span>
                            <h3 class="h4 fw-extrabold text-warning mb-0">0.16%</h3>
                            <span class="fs-8 text-muted mt-1 d-block">3,840 404/401 rate</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white">
                            <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">HTTP 5xx Server Errors</span>
                            <h3 class="h4 fw-extrabold text-danger mb-0">0.02%</h3>
                            <span class="fs-8 text-muted mt-1 d-block">480 total incidents</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white">
                            <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Egress Bandwidth</span>
                            <h3 class="h4 fw-extrabold text-primary mb-0">48.2 GB / 24h</h3>
                            <span class="fs-8 text-muted mt-1 d-block">Peak throughput: 84 Mbps</span>
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
