<?php
$pageTitle = 'Project Domain Database Tables - Syncboard';
$currentPage = 'monitoring-database';
$currentModule = 'monitoring';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Monitoring', 'url' => 'dashboard.php'],
    ['title' => 'Domain Database Tables', 'url' => '']
];
$extraJs = [$basePath . 'assets/js/monitoring.js'];
include __DIR__ . '/../layouts/header.php';
?>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary shadow-sm" style="width: 48px; height: 48px;">
                        <i class="fa-solid fa-database fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Project Domain Database & Table Metrics</h1>
                        <span class="text-muted fs-7">Real-time table sizes, row counts, storage engine, indexes, and read/write IOPS per project domain</span>
                    </div>
                </div>
            </section>

            <!-- Content -->
            <div class="view-wrapper flex-grow-1 p-4">

                <!-- Domain Context Selector Bar -->
                <?php include __DIR__ . '/_domain_selector.php'; ?>

                <!-- Top Database Metric Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border rounded-4 shadow-sm p-3 bg-white h-100">
                            <span class="text-muted fs-8 fw-bold text-uppercase">Production Databases</span>
                            <h3 class="fw-bold my-2 text-dark"><span id="activeDomainCounter">5</span> Schemas</h3>
                            <span class="text-success fs-8"><i class="fa-solid fa-circle-check me-1"></i>MySQL 8.0 & Timescale</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border rounded-4 shadow-sm p-3 bg-white h-100">
                            <span class="text-muted fs-8 fw-bold text-uppercase">Total Monitored Tables</span>
                            <h3 class="fw-bold my-2 text-primary">48 Tables</h3>
                            <span class="text-muted fs-8">Across 5 Project Domains</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border rounded-4 shadow-sm p-3 bg-white h-100">
                            <span class="text-muted fs-8 fw-bold text-uppercase">Total Data Volume</span>
                            <h3 class="fw-bold my-2 text-warning">4.2 GB</h3>
                            <span class="text-muted fs-8">3.6 GB Data &bull; 600 MB Index</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border rounded-4 shadow-sm p-3 bg-white h-100">
                            <span class="text-muted fs-8 fw-bold text-uppercase">Read / Write IOPS</span>
                            <h3 class="fw-bold my-2 text-success">1,420 IOPS</h3>
                            <span class="text-success fs-8"><i class="fa-solid fa-bolt me-1"></i>0 Slow Queries</span>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border rounded-4 bg-white overflow-hidden mb-4">
                    <div class="card-header bg-white p-3 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <div>
                            <h2 class="h6 fw-bold mb-0">Production Tables Inventory by Project Domain</h2>
                            <span class="text-muted fs-8">Underlying storage tables, index allocation, and record counts</span>
                        </div>
                        <span class="badge bg-primary-subtle text-primary fs-8">InnoDB & TimescaleDB Engine</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 fs-7">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                <tr>
                                    <th class="ps-4">Production Table Name</th>
                                    <th>Target Project & Domain</th>
                                    <th>Engine</th>
                                    <th>Total Rows</th>
                                    <th>Data Size</th>
                                    <th>Index Size</th>
                                    <th>Avg Row Length</th>
                                    <th class="pe-4 text-end">Health</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- 1. Middleware Project -->
                                <tr data-domain-item="api-core">
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-table text-primary me-2"></i>tbl_middleware_logs</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary d-inline-block mb-1">Middleware Project</span>
                                        <div class="fs-8 text-muted">api-core.enterprise.internal</div>
                                    </td>
                                    <td>InnoDB</td>
                                    <td><strong>1,240,580</strong></td>
                                    <td>842.5 MB</td>
                                    <td>124.2 MB</td>
                                    <td>680 bytes</td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>

                                <!-- 2. Company Website -->
                                <tr data-domain-item="company-org">
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-table text-info me-2"></i>tbl_company_articles</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info-subtle text-info d-inline-block mb-1">Company Website</span>
                                        <div class="fs-8 text-muted">company.org</div>
                                    </td>
                                    <td>InnoDB</td>
                                    <td><strong>8,420</strong></td>
                                    <td>14.8 MB</td>
                                    <td>2.1 MB</td>
                                    <td>1,760 bytes</td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>

                                <!-- 3. Landing Campaign -->
                                <tr data-domain-item="promo-campaign">
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-table text-warning me-2"></i>tbl_landing_leads</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning-subtle text-warning d-inline-block mb-1">Landing Campaign</span>
                                        <div class="fs-8 text-muted">promo.campaign.io</div>
                                    </td>
                                    <td>InnoDB</td>
                                    <td><strong>34,190</strong></td>
                                    <td>18.4 MB</td>
                                    <td>4.2 MB</td>
                                    <td>538 bytes</td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>

                                <!-- 4. Mobile CRM App -->
                                <tr data-domain-item="api-mobile">
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-table text-secondary me-2"></i>tbl_mobile_sync_tokens</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary-subtle text-secondary d-inline-block mb-1">Mobile CRM App</span>
                                        <div class="fs-8 text-muted">api-mobile.enterprise.internal</div>
                                    </td>
                                    <td>InnoDB</td>
                                    <td><strong>118,500</strong></td>
                                    <td>64.0 MB</td>
                                    <td>12.8 MB</td>
                                    <td>540 bytes</td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>

                                <!-- 5. Analytics Tool -->
                                <tr data-domain-item="telemetry-hub">
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-table text-danger me-2"></i>tbl_telemetry_events</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success-subtle text-success d-inline-block mb-1">Analytics Tool</span>
                                        <div class="fs-8 text-muted">telemetry-hub.internal</div>
                                    </td>
                                    <td>TimescaleDB / InnoDB</td>
                                    <td><strong>4,890,200</strong></td>
                                    <td>2,140.0 MB</td>
                                    <td>320.0 MB</td>
                                    <td>438 bytes</td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Optimal</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
