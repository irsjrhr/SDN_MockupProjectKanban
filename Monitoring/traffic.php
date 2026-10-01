<?php
$pageTitle = 'Project Domain Traffic & Network Load - Syncboard';
$currentPage = 'monitoring-traffic';
$currentModule = 'monitoring';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Monitoring', 'url' => 'dashboard.php'],
    ['title' => 'Traffic & Network Load', 'url' => '']
];
$extraJs = [$basePath . 'assets/js/monitoring.js'];
include __DIR__ . '/../layouts/header.php';
?>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary shadow-sm" style="width: 48px; height: 48px;">
                        <i class="fa-solid fa-chart-line fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Project Domain Traffic & Network IO</h1>
                        <span class="text-muted fs-7">Real-time HTTP request throughput, response times, error codes, and bandwidth usage per project domain</span>
                    </div>
                </div>
            </section>

            <!-- Content -->
            <div class="view-wrapper flex-grow-1 p-4">

                <!-- Domain Context Selector Bar -->
                <?php include __DIR__ . '/_domain_selector.php'; ?>

                <!-- Top Metric Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white h-100">
                            <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">HTTP 2xx Success Rate</span>
                            <h3 class="h4 fw-extrabold text-success mb-0">99.82%</h3>
                            <span class="fs-8 text-muted mt-1 d-block">2,395,680 successful requests</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white h-100">
                            <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">HTTP 4xx Client Errors</span>
                            <h3 class="h4 fw-extrabold text-warning mb-0">0.16%</h3>
                            <span class="fs-8 text-muted mt-1 d-block">3,840 404/401 rate</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white h-100">
                            <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">HTTP 5xx Server Errors</span>
                            <h3 class="h4 fw-extrabold text-danger mb-0">0.02%</h3>
                            <span class="fs-8 text-muted mt-1 d-block">480 total incidents</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white h-100">
                            <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Egress Bandwidth</span>
                            <h3 class="h4 fw-extrabold text-primary mb-0">48.2 GB / 24h</h3>
                            <span class="fs-8 text-muted mt-1 d-block">Peak throughput: 84 Mbps</span>
                        </div>
                    </div>
                </div>

                <!-- Top Monitored Endpoints & Domain Routes -->
                <div class="card shadow-sm border rounded-4 bg-white overflow-hidden mb-4">
                    <div class="card-header bg-white p-3 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <div>
                            <h2 class="h6 fw-bold mb-0">Top Active Endpoints & Routes per Project Domain</h2>
                            <span class="text-muted fs-8">Request volume, HTTP methods, average latency, and status rates</span>
                        </div>
                        <span class="badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-bolt me-1"></i> Live Edge Ingestion</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 fs-7">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                <tr>
                                    <th class="ps-4">Target Project & Domain</th>
                                    <th>Method</th>
                                    <th>Route / URI Endpoint</th>
                                    <th>24h Hits</th>
                                    <th>Avg Response Latency</th>
                                    <th>2xx Success</th>
                                    <th>Error Rate</th>
                                    <th class="pe-4 text-end">Health</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- 1. Middleware Project -->
                                <tr data-domain-item="api-core">
                                    <td class="ps-4">
                                        <span class="badge bg-primary-subtle text-primary d-block mb-1">Middleware Project</span>
                                        <span class="fw-bold text-dark fs-8">api-core.enterprise.internal</span>
                                    </td>
                                    <td><span class="badge bg-primary">POST</span></td>
                                    <td><code>/api/v2/transactions/sync</code></td>
                                    <td><strong>1,240,500</strong></td>
                                    <td><span class="badge bg-success-subtle text-success">24ms</span></td>
                                    <td>99.94%</td>
                                    <td><span class="badge bg-success-subtle text-success">0.06%</span></td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>
                                <tr data-domain-item="api-core">
                                    <td class="ps-4">
                                        <span class="badge bg-primary-subtle text-primary d-block mb-1">Middleware Project</span>
                                        <span class="fw-bold text-dark fs-8">api-core.enterprise.internal</span>
                                    </td>
                                    <td><span class="badge bg-success">GET</span></td>
                                    <td><code>/api/v2/health/check</code></td>
                                    <td><strong>580,200</strong></td>
                                    <td><span class="badge bg-success-subtle text-success">8ms</span></td>
                                    <td>100.0%</td>
                                    <td><span class="badge bg-success-subtle text-success">0.00%</span></td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>

                                <!-- 2. Company Website -->
                                <tr data-domain-item="company-org">
                                    <td class="ps-4">
                                        <span class="badge bg-info-subtle text-info d-block mb-1">Company Website</span>
                                        <span class="fw-bold text-dark fs-8">company.org</span>
                                    </td>
                                    <td><span class="badge bg-success">GET</span></td>
                                    <td><code>/products/enterprise-solutions</code></td>
                                    <td><strong>342,800</strong></td>
                                    <td><span class="badge bg-success-subtle text-success">18ms</span></td>
                                    <td>99.88%</td>
                                    <td><span class="badge bg-warning-subtle text-warning">0.12%</span></td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>

                                <!-- 3. Landing Campaign -->
                                <tr data-domain-item="promo-campaign">
                                    <td class="ps-4">
                                        <span class="badge bg-warning-subtle text-warning d-block mb-1">Landing Campaign</span>
                                        <span class="fw-bold text-dark fs-8">promo.campaign.io</span>
                                    </td>
                                    <td><span class="badge bg-primary">POST</span></td>
                                    <td><code>/api/leads/submit-q4</code></td>
                                    <td><strong>185,400</strong></td>
                                    <td><span class="badge bg-success-subtle text-success">32ms</span></td>
                                    <td>99.75%</td>
                                    <td><span class="badge bg-warning-subtle text-warning">0.25%</span></td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>

                                <!-- 4. Mobile CRM App -->
                                <tr data-domain-item="api-mobile">
                                    <td class="ps-4">
                                        <span class="badge bg-secondary-subtle text-secondary d-block mb-1">Mobile CRM App</span>
                                        <span class="fw-bold text-dark fs-8">api-mobile.enterprise.internal</span>
                                    </td>
                                    <td><span class="badge bg-primary">POST</span></td>
                                    <td><code>/v1/auth/device-tokens</code></td>
                                    <td><strong>98,200</strong></td>
                                    <td><span class="badge bg-success-subtle text-success">42ms</span></td>
                                    <td>99.80%</td>
                                    <td><span class="badge bg-success-subtle text-success">0.20%</span></td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>

                                <!-- 5. Analytics Tool -->
                                <tr data-domain-item="telemetry-hub">
                                    <td class="ps-4">
                                        <span class="badge bg-success-subtle text-success d-block mb-1">Analytics Tool</span>
                                        <span class="fw-bold text-dark fs-8">telemetry-hub.internal</span>
                                    </td>
                                    <td><span class="badge bg-primary">POST</span></td>
                                    <td><code>/v1/telemetry/ingest/batch</code></td>
                                    <td><strong>4,890,200</strong></td>
                                    <td><span class="badge bg-success-subtle text-success">14ms</span></td>
                                    <td>100.0%</td>
                                    <td><span class="badge bg-success-subtle text-success">0.00%</span></td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
