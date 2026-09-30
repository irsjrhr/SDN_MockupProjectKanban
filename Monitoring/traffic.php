<?php
$pageTitle = 'Traffic & Network Analytics - Syncboard';
$currentPage = 'monitoring-traffic';
$currentModule = 'monitoring';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Monitoring', 'url' => 'dashboard.php'],
    ['title' => 'Traffic & Network', 'url' => '']
];
include __DIR__ . '/../layouts/header.php';
?>

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
<?php include __DIR__ . '/../layouts/footer.php'; ?>
