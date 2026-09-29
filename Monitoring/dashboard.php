<?php
$currentPage = 'monitoring-dashboard';
$currentModule = 'monitoring';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production Monitoring - Syncboard</title>

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
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Overview</li>
                        </ol>
                    </nav>
                </div>

                <div class="navbar-right d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center gap-2 px-3 py-1 bg-success-subtle text-success rounded-pill fs-8 fw-semibold">
                        <span class="spinner-grow spinner-grow-sm text-success" role="status" style="width: 8px; height: 8px;"></span>
                        All Systems Operational (99.98%)
                    </div>
                    <button class="btn btn-light btn-nav-icon rounded-circle position-relative" title="Alerts">
                        <i class="fa-regular fa-bell"></i>
                        <span class="notification-dot position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger p-1"></span>
                    </button>

                    <div class="dropdown">
                        <div class="user-profile-menu d-flex align-items-center gap-2 p-1 rounded-pill cursor-pointer" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&q=80" alt="Jenno Wilson" class="avatar-md rounded-circle">
                            <div class="user-meta d-flex flex-column d-none d-sm-flex">
                                <span class="user-name fw-bold fs-7 lh-1">Jenno Wilson</span>
                                <span class="user-email text-muted fs-8">DevOps Admin</span>
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

            <!-- Page Title Section -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary">
                        <i class="fa-solid fa-gauge-high fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Project Telemetry & Monitoring</h1>
                        <span class="text-muted fs-7">Real-time telemetry, server performance, databases, domains, and traffic load</span>
                    </div>
                </div>

                <div class="project-actions-area d-flex align-items-center gap-3">
                    <button class="btn btn-outline-secondary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 fs-7" onclick="location.reload()">
                        <i class="fa-solid fa-rotate"></i> Refresh Telemetry
                    </button>
                    <a href="servers.php" class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 fs-7">
                        <i class="fa-solid fa-server"></i> Server Specs
                    </a>
                </div>
            </section>

            <!-- Main Content Area -->
            <div class="view-wrapper flex-grow-1 p-4">

                <!-- Real-time Metric Cards Grid -->
                <div class="row g-3 mb-4">
                    <!-- 1. Live Traffic -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Live Traffic</span>
                                    <h3 class="h4 fw-extrabold mb-0">2.4M <small class="fs-7 text-muted fw-normal">req/day</small></h3>
                                </div>
                                <div class="stat-icon bg-primary-subtle text-primary rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-chart-line fs-4"></i>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-2 fs-8">
                                <span class="text-success fw-semibold"><i class="fa-solid fa-bolt"></i> 185 req/sec</span>
                                <span class="text-muted">Avg 42ms</span>
                            </div>
                        </div>
                    </div>

                    <!-- 2. CPU & Specs -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">CPU Utilization</span>
                                    <h3 class="h4 fw-extrabold text-dark mb-0">32.4%</h3>
                                </div>
                                <div class="stat-icon bg-info-subtle text-info rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-microchip fs-4"></i>
                                </div>
                            </div>
                            <div class="progress mb-1" style="height: 6px;">
                                <div class="progress-bar bg-info" style="width: 32.4%;"></div>
                            </div>
                            <span class="fs-8 text-muted">8 vCPU AMD EPYC &bull; Linux 6.8</span>
                        </div>
                    </div>

                    <!-- 3. RAM Usage -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">RAM Memory</span>
                                    <h3 class="h4 fw-extrabold text-success mb-0">18.4 / 32 GB</h3>
                                </div>
                                <div class="stat-icon bg-success-subtle text-success rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-memory fs-4"></i>
                                </div>
                            </div>
                            <div class="progress mb-1" style="height: 6px;">
                                <div class="progress-bar bg-success" style="width: 57.5%;"></div>
                            </div>
                            <span class="fs-8 text-muted">57.5% memory allocated</span>
                        </div>
                    </div>

                    <!-- 4. Storage & DB -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">NVMe Storage</span>
                                    <h3 class="h4 fw-extrabold text-warning mb-0">412 GB / 1 TB</h3>
                                </div>
                                <div class="stat-icon bg-warning-subtle text-warning rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-hard-drive fs-4"></i>
                                </div>
                            </div>
                            <div class="progress mb-1" style="height: 6px;">
                                <div class="progress-bar bg-warning" style="width: 41.2%;"></div>
                            </div>
                            <span class="fs-8 text-muted">48 Tables &bull; 4.2 GB DB Size</span>
                        </div>
                    </div>
                </div>

                <!-- Projects Live Telemetry Master Table -->
                <div class="card shadow-sm border rounded-4 bg-white overflow-hidden mb-4">
                    <div class="card-header bg-white p-3 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <h2 class="h6 fw-bold mb-0">Active Projects Production Status</h2>
                            <span class="text-muted fs-8">Live environment telemetry across all projects under development</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-light text-dark border fs-8"><i class="fa-solid fa-circle text-success me-1"></i> 5 Operational</span>
                            <span class="badge bg-light text-dark border fs-8"><i class="fa-solid fa-shield-halved text-primary me-1"></i> 5 SSL Active</span>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 fs-7">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                <tr>
                                    <th class="ps-4">Project & Environment</th>
                                    <th>Domain & SSL</th>
                                    <th>Traffic / Min</th>
                                    <th>CPU & RAM</th>
                                    <th>Storage Disk</th>
                                    <th>Production DB Table</th>
                                    <th>Uptime</th>
                                    <th class="pe-4 text-end">Health</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- 1. Middleware Project -->
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="badge-icon-sm badge-ecommerce p-2 rounded-3">
                                                <i class="fa-solid fa-bag-shopping fs-5"></i>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark d-block">Middleware Project</span>
                                                <span class="badge bg-primary-subtle text-primary fs-8">api-prod-v2</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-dark d-block">api.syncboard.io</span>
                                        <span class="badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-lock me-1"></i> SSL Valid (74d)</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">4,820 req/m</span>
                                        <span class="d-block fs-8 text-muted">28ms latency</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">CPU: 24%</span>
                                        <span class="d-block fs-8 text-muted">RAM: 4.8 GB / 8 GB</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">120 GB NVMe</span>
                                        <div class="progress mt-1" style="height: 4px; width: 80px;">
                                            <div class="progress-bar bg-primary" style="width: 45%;"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-database text-muted me-1"></i> tbl_middleware_logs</span>
                                        <span class="d-block fs-8 text-muted">1,240,580 rows &bull; InnoDB</span>
                                    </td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">99.99%</span></td>
                                    <td class="pe-4 text-end">
                                        <span class="badge rounded-pill bg-success px-2.5 py-1.5"><i class="fa-solid fa-circle-check me-1"></i> Healthy</span>
                                    </td>
                                </tr>

                                <!-- 2. Company Website -->
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="badge-icon-sm badge-company p-2 rounded-3">
                                                <i class="fa-solid fa-globe fs-5"></i>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark d-block">Company Website</span>
                                                <span class="badge bg-info-subtle text-info fs-8">web-prod</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-dark d-block">syncboard.company</span>
                                        <span class="badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-lock me-1"></i> SSL Valid (120d)</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">1,940 req/m</span>
                                        <span class="d-block fs-8 text-muted">18ms latency</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">CPU: 12%</span>
                                        <span class="d-block fs-8 text-muted">RAM: 2.1 GB / 4 GB</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">45 GB NVMe</span>
                                        <div class="progress mt-1" style="height: 4px; width: 80px;">
                                            <div class="progress-bar bg-success" style="width: 25%;"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-database text-muted me-1"></i> tbl_company_articles</span>
                                        <span class="d-block fs-8 text-muted">8,420 rows &bull; InnoDB</span>
                                    </td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">100.0%</span></td>
                                    <td class="pe-4 text-end">
                                        <span class="badge rounded-pill bg-success px-2.5 py-1.5"><i class="fa-solid fa-circle-check me-1"></i> Healthy</span>
                                    </td>
                                </tr>

                                <!-- 3. Landing Page Campaign -->
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="badge-icon-sm badge-landing p-2 rounded-3">
                                                <i class="fa-solid fa-bullhorn fs-5"></i>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark d-block">Landing Page Campaign</span>
                                                <span class="badge bg-warning-subtle text-warning fs-8">campaign-q4</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-dark d-block">promo.syncboard.io</span>
                                        <span class="badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-lock me-1"></i> SSL Valid (60d)</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">3,120 req/m</span>
                                        <span class="d-block fs-8 text-muted">35ms latency</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">CPU: 38%</span>
                                        <span class="d-block fs-8 text-muted">RAM: 3.4 GB / 4 GB</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">80 GB NVMe</span>
                                        <div class="progress mt-1" style="height: 4px; width: 80px;">
                                            <div class="progress-bar bg-warning" style="width: 60%;"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-database text-muted me-1"></i> tbl_landing_leads</span>
                                        <span class="d-block fs-8 text-muted">34,190 rows &bull; InnoDB</span>
                                    </td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">99.95%</span></td>
                                    <td class="pe-4 text-end">
                                        <span class="badge rounded-pill bg-success px-2.5 py-1.5"><i class="fa-solid fa-circle-check me-1"></i> Healthy</span>
                                    </td>
                                </tr>

                                <!-- 4. Mobile CRM Application API -->
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="badge-icon-sm badge-company p-2 rounded-3">
                                                <i class="fa-solid fa-mobile-screen fs-5"></i>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark d-block">Mobile CRM App</span>
                                                <span class="badge bg-secondary-subtle text-secondary fs-8">mobile-staging</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-dark d-block">mobile-api.syncboard.io</span>
                                        <span class="badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-lock me-1"></i> SSL Valid (85d)</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">850 req/m</span>
                                        <span class="d-block fs-8 text-muted">45ms latency</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">CPU: 18%</span>
                                        <span class="d-block fs-8 text-muted">RAM: 1.8 GB / 4 GB</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">30 GB NVMe</span>
                                        <div class="progress mt-1" style="height: 4px; width: 80px;">
                                            <div class="progress-bar bg-info" style="width: 20%;"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-database text-muted me-1"></i> tbl_mobile_sync_tokens</span>
                                        <span class="d-block fs-8 text-muted">118,500 rows &bull; InnoDB</span>
                                    </td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">99.98%</span></td>
                                    <td class="pe-4 text-end">
                                        <span class="badge rounded-pill bg-success px-2.5 py-1.5"><i class="fa-solid fa-circle-check me-1"></i> Healthy</span>
                                    </td>
                                </tr>

                                <!-- 5. Internal Analytics Tool -->
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="badge-icon-sm badge-ecommerce p-2 rounded-3">
                                                <i class="fa-solid fa-chart-line fs-5"></i>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark d-block">Internal Analytics Tool</span>
                                                <span class="badge bg-success-subtle text-success fs-8">analytics-prod</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-dark d-block">analytics.syncboard.internal</span>
                                        <span class="badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-lock me-1"></i> Internal TLS</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">5,400 req/m</span>
                                        <span class="d-block fs-8 text-muted">15ms latency</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">CPU: 42%</span>
                                        <span class="d-block fs-8 text-muted">RAM: 6.3 GB / 12 GB</span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">137 GB NVMe</span>
                                        <div class="progress mt-1" style="height: 4px; width: 80px;">
                                            <div class="progress-bar bg-danger" style="width: 72%;"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-database text-muted me-1"></i> tbl_telemetry_events</span>
                                        <span class="d-block fs-8 text-muted">4,890,200 rows &bull; TimescaleDB</span>
                                    </td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">100.0%</span></td>
                                    <td class="pe-4 text-end">
                                        <span class="badge rounded-pill bg-success px-2.5 py-1.5"><i class="fa-solid fa-circle-check me-1"></i> Healthy</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Auxiliary Monitoring Cards (Services & Slow Query Log) -->
                <div class="row g-4">
                    <div class="col-12 col-lg-6">
                        <div class="card shadow-sm border rounded-4 p-4 bg-white h-100">
                            <h2 class="h6 fw-bold mb-3"><i class="fa-solid fa-server text-primary me-2"></i>Infrastructure Microservices</h2>
                            <div class="d-flex flex-column gap-3 fs-7">
                                <div class="d-flex align-items-center justify-content-between p-2 border rounded-3 bg-light-subtle">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-success p-1 rounded-circle"><i class="fa-solid fa-check fs-8 text-white"></i></span>
                                        <span class="fw-bold">Nginx API Gateway / Ingress</span>
                                    </div>
                                    <span class="badge bg-success-subtle text-success">Active &bull; 0.02% Error Rate</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between p-2 border rounded-3 bg-light-subtle">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-success p-1 rounded-circle"><i class="fa-solid fa-check fs-8 text-white"></i></span>
                                        <span class="fw-bold">Redis Cache & Session Cluster</span>
                                    </div>
                                    <span class="badge bg-success-subtle text-success">98.4% Hit Rate &bull; 1.2 GB Cached</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between p-2 border rounded-3 bg-light-subtle">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-success p-1 rounded-circle"><i class="fa-solid fa-check fs-8 text-white"></i></span>
                                        <span class="fw-bold">RabbitMQ / Background Task Queue</span>
                                    </div>
                                    <span class="badge bg-success-subtle text-success">0 Queued backlog &bull; 12 Workers</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card shadow-sm border rounded-4 p-4 bg-white h-100">
                            <h2 class="h6 fw-bold mb-3"><i class="fa-solid fa-shield-virus text-info me-2"></i>Security & SSL Certificates</h2>
                            <div class="d-flex flex-column gap-3 fs-7">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span>Cloudflare Edge Firewall (WAF)</span>
                                    <span class="badge bg-success">Protected &bull; 0 Threats</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span>Automated SSL Auto-Renewal (Certbot)</span>
                                    <span class="badge bg-success">Enabled &bull; Let's Encrypt</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span>Database Continuous Backup Schedule</span>
                                    <span class="badge bg-primary">Daily at 02:00 UTC (S3 Glacier)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
