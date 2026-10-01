<?php
$pageTitle = 'Project Domain Server & Node Specifications - Syncboard';
$currentPage = 'monitoring-servers';
$currentModule = 'monitoring';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Monitoring', 'url' => 'dashboard.php'],
    ['title' => 'Server & Node Specs', 'url' => '']
];
$extraJs = [$basePath . 'assets/js/monitoring.js'];
include __DIR__ . '/../layouts/header.php';
?>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary shadow-sm" style="width: 48px; height: 48px;">
                        <i class="fa-solid fa-server fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Project Domain Server & Node Specs</h1>
                        <span class="text-muted fs-7">Dedicated host nodes, CPU allocation, memory pools, and NVMe disks powering each project domain</span>
                    </div>
                </div>
            </section>

            <!-- Content -->
            <div class="view-wrapper flex-grow-1 p-4">

                <!-- Domain Context Selector Bar -->
                <?php include __DIR__ . '/_domain_selector.php'; ?>

                <!-- Node Summary Metric Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border rounded-4 shadow-sm p-3 bg-white h-100">
                            <span class="text-muted fs-8 fw-bold text-uppercase">Active Production Nodes</span>
                            <h3 class="fw-bold my-2 text-dark"><span id="activeDomainCounter">5</span> Nodes</h3>
                            <span class="text-success fs-8"><i class="fa-solid fa-circle-check me-1"></i>100% Cluster Healthy</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border rounded-4 shadow-sm p-3 bg-white h-100">
                            <span class="text-muted fs-8 fw-bold text-uppercase">Total Compute Pool</span>
                            <h3 class="fw-bold my-2 text-primary">36 vCPUs</h3>
                            <span class="text-muted fs-8">AMD EPYC &bull; Intel Xeon</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border rounded-4 shadow-sm p-3 bg-white h-100">
                            <span class="text-muted fs-8 fw-bold text-uppercase">Total ECC Memory</span>
                            <h3 class="fw-bold my-2 text-success">144 GB RAM</h3>
                            <span class="text-muted fs-8">Avg 48.6% Memory Pressure</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border rounded-4 shadow-sm p-3 bg-white h-100">
                            <span class="text-muted fs-8 fw-bold text-uppercase">NVMe RAID Storage</span>
                            <h3 class="fw-bold my-2 text-warning">3.2 TB Total</h3>
                            <span class="text-muted fs-8">PCIe 4.0 Direct Attached</span>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border rounded-4 bg-white overflow-hidden mb-4">
                    <div class="card-header bg-white p-3 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <div>
                            <h2 class="h6 fw-bold mb-0">Production Node Allocation per Project Domain</h2>
                            <span class="text-muted fs-8">Hardware architecture and host assignment mapped to each project's public/internal domain</span>
                        </div>
                        <span class="badge bg-primary-subtle text-primary fs-8">All Nodes Online</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 fs-7">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                <tr>
                                    <th class="ps-4">Node / Hostname</th>
                                    <th>Target Project & Domain</th>
                                    <th>OS & Kernel</th>
                                    <th>CPU Core Specs & Load</th>
                                    <th>Memory (RAM)</th>
                                    <th>Disk Storage (NVMe)</th>
                                    <th class="pe-4 text-end">Node Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- 1. Middleware Project -->
                                <tr data-domain-item="api-core">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fa-solid fa-server text-primary"></i>
                                            <div>
                                                <span class="fw-bold text-dark d-block">srv-prod-node01</span>
                                                <span class="fs-8 text-muted">IP: 104.21.84.19</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary d-inline-block mb-1">Middleware Project</span>
                                        <div class="fs-8 fw-semibold text-dark">
                                            <i class="fa-solid fa-link text-muted me-1"></i>api-core.enterprise.internal
                                        </div>
                                    </td>
                                    <td>Ubuntu 24.04 LTS (Kernel 6.8.0)</td>
                                    <td>
                                        <span class="fw-bold text-dark">8 vCPU AMD EPYC</span>
                                        <div class="progress mt-1" style="height: 5px; width: 100px;">
                                            <div class="progress-bar bg-primary" style="width: 24%;"></div>
                                        </div>
                                        <span class="fs-8 text-muted">24% Current Load</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">32 GB ECC DDR5</span>
                                        <span class="d-block fs-8 text-muted">4.8 GB Allocated</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">500 GB NVMe</span>
                                        <span class="d-block fs-8 text-muted">120 GB Used (24%)</span>
                                    </td>
                                    <td class="pe-4 text-end">
                                        <span class="badge bg-success">Online &bull; 42d Uptime</span>
                                    </td>
                                </tr>

                                <!-- 2. Company Website -->
                                <tr data-domain-item="company-org">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fa-solid fa-server text-info"></i>
                                            <div>
                                                <span class="fw-bold text-dark d-block">srv-prod-web01</span>
                                                <span class="fs-8 text-muted">IP: 104.21.84.22</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info-subtle text-info d-inline-block mb-1">Company Website</span>
                                        <div class="fs-8 fw-semibold text-dark">
                                            <i class="fa-solid fa-link text-muted me-1"></i>company.org
                                        </div>
                                    </td>
                                    <td>Ubuntu 24.04 LTS (Kernel 6.8.0)</td>
                                    <td>
                                        <span class="fw-bold text-dark">4 vCPU Intel Xeon</span>
                                        <div class="progress mt-1" style="height: 5px; width: 100px;">
                                            <div class="progress-bar bg-info" style="width: 12%;"></div>
                                        </div>
                                        <span class="fs-8 text-muted">12% Current Load</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">16 GB ECC DDR5</span>
                                        <span class="d-block fs-8 text-muted">2.1 GB Allocated</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">250 GB NVMe</span>
                                        <span class="d-block fs-8 text-muted">45 GB Used (18%)</span>
                                    </td>
                                    <td class="pe-4 text-end">
                                        <span class="badge bg-success">Online &bull; 90d Uptime</span>
                                    </td>
                                </tr>

                                <!-- 3. Landing Campaign -->
                                <tr data-domain-item="promo-campaign">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fa-solid fa-server text-warning"></i>
                                            <div>
                                                <span class="fw-bold text-dark d-block">srv-prod-landing01</span>
                                                <span class="fs-8 text-muted">IP: 104.21.84.35</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning-subtle text-warning d-inline-block mb-1">Landing Campaign</span>
                                        <div class="fs-8 fw-semibold text-dark">
                                            <i class="fa-solid fa-link text-muted me-1"></i>promo.campaign.io
                                        </div>
                                    </td>
                                    <td>Debian 12 Bookworm (Kernel 6.1)</td>
                                    <td>
                                        <span class="fw-bold text-dark">4 vCPU Intel Xeon</span>
                                        <div class="progress mt-1" style="height: 5px; width: 100px;">
                                            <div class="progress-bar bg-warning" style="width: 38%;"></div>
                                        </div>
                                        <span class="fs-8 text-muted">38% Current Load</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">16 GB ECC DDR5</span>
                                        <span class="d-block fs-8 text-muted">3.4 GB Allocated</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">250 GB NVMe</span>
                                        <span class="d-block fs-8 text-muted">80 GB Used (32%)</span>
                                    </td>
                                    <td class="pe-4 text-end">
                                        <span class="badge bg-success">Online &bull; 14d Uptime</span>
                                    </td>
                                </tr>

                                <!-- 4. Mobile CRM App -->
                                <tr data-domain-item="api-mobile">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fa-solid fa-server text-secondary"></i>
                                            <div>
                                                <span class="fw-bold text-dark d-block">srv-prod-mobile01</span>
                                                <span class="fs-8 text-muted">IP: 104.21.84.44</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary-subtle text-secondary d-inline-block mb-1">Mobile CRM App</span>
                                        <div class="fs-8 fw-semibold text-dark">
                                            <i class="fa-solid fa-link text-muted me-1"></i>api-mobile.enterprise.internal
                                        </div>
                                    </td>
                                    <td>Ubuntu 24.04 LTS (Kernel 6.8.0)</td>
                                    <td>
                                        <span class="fw-bold text-dark">4 vCPU Intel Xeon</span>
                                        <div class="progress mt-1" style="height: 5px; width: 100px;">
                                            <div class="progress-bar bg-secondary" style="width: 18%;"></div>
                                        </div>
                                        <span class="fs-8 text-muted">18% Current Load</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">16 GB ECC DDR5</span>
                                        <span class="d-block fs-8 text-muted">1.8 GB Allocated</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">250 GB NVMe</span>
                                        <span class="d-block fs-8 text-muted">30 GB Used (12%)</span>
                                    </td>
                                    <td class="pe-4 text-end">
                                        <span class="badge bg-success">Online &bull; 28d Uptime</span>
                                    </td>
                                </tr>

                                <!-- 5. Analytics Tool -->
                                <tr data-domain-item="telemetry-hub">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fa-solid fa-server text-danger"></i>
                                            <div>
                                                <span class="fw-bold text-dark d-block">srv-prod-dbcluster01</span>
                                                <span class="fs-8 text-muted">IP: 10.0.4.10 (Internal)</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-success-subtle text-success d-inline-block mb-1">Analytics Tool</span>
                                        <div class="fs-8 fw-semibold text-dark">
                                            <i class="fa-solid fa-link text-muted me-1"></i>telemetry-hub.internal
                                        </div>
                                    </td>
                                    <td>Rocky Linux 9 (Enterprise)</td>
                                    <td>
                                        <span class="fw-bold text-dark">16 vCPU AMD EPYC</span>
                                        <div class="progress mt-1" style="height: 5px; width: 100px;">
                                            <div class="progress-bar bg-danger" style="width: 42%;"></div>
                                        </div>
                                        <span class="fs-8 text-muted">42% Current Load</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">64 GB ECC DDR5</span>
                                        <span class="d-block fs-8 text-muted">6.3 GB Allocated</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">2 TB NVMe RAID 10</span>
                                        <span class="d-block fs-8 text-muted">412 GB Used (20.6%)</span>
                                    </td>
                                    <td class="pe-4 text-end">
                                        <span class="badge bg-success">Online &bull; Primary Node</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
