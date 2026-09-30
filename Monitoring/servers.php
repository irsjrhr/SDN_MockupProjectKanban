<?php
$pageTitle = 'Server & Hardware Specifications - Syncboard';
$currentPage = 'monitoring-servers';
$currentModule = 'monitoring';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Monitoring', 'url' => 'dashboard.php'],
    ['title' => 'Server Specifications', 'url' => '']
];
include __DIR__ . '/../layouts/header.php';
?>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary">
                        <i class="fa-solid fa-server fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Server & Infrastructure Specs</h1>
                        <span class="text-muted fs-7">Hardware resource allocation, CPU, RAM, NVMe Disks, and OS environments</span>
                    </div>
                </div>
            </section>

            <!-- Content -->
            <div class="view-wrapper flex-grow-1 p-4">
                <div class="card shadow-sm border rounded-4 bg-white overflow-hidden mb-4">
                    <div class="card-header bg-white p-3 border-bottom">
                        <h2 class="h6 fw-bold mb-0">Production Nodes & Hardware Instances</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 fs-7">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                <tr>
                                    <th class="ps-4">Node / Hostname</th>
                                    <th>Assigned Project</th>
                                    <th>OS & Kernel</th>
                                    <th>CPU Core Specs</th>
                                    <th>Memory (RAM)</th>
                                    <th>Disk Storage (NVMe)</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark d-block">srv-prod-node01</span>
                                        <span class="fs-8 text-muted">IP: 104.21.84.19</span>
                                    </td>
                                    <td><span class="badge bg-primary-subtle text-primary">Middleware Project</span></td>
                                    <td>Ubuntu 24.04 LTS (Kernel 6.8.0-generic)</td>
                                    <td>8 vCPU @ 3.4 GHz AMD EPYC</td>
                                    <td>32 GB ECC DDR5</td>
                                    <td>500 GB NVMe PCIe 4.0</td>
                                    <td><span class="badge bg-success">Online &bull; 42d Uptime</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark d-block">srv-prod-web01</span>
                                        <span class="fs-8 text-muted">IP: 104.21.84.22</span>
                                    </td>
                                    <td><span class="badge bg-info-subtle text-info">Company Website</span></td>
                                    <td>Ubuntu 24.04 LTS (Kernel 6.8.0-generic)</td>
                                    <td>4 vCPU @ 3.2 GHz Intel Xeon</td>
                                    <td>16 GB ECC DDR5</td>
                                    <td>250 GB NVMe PCIe 4.0</td>
                                    <td><span class="badge bg-success">Online &bull; 90d Uptime</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark d-block">srv-prod-landing01</span>
                                        <span class="fs-8 text-muted">IP: 104.21.84.35</span>
                                    </td>
                                    <td><span class="badge bg-warning-subtle text-warning">Landing Campaign</span></td>
                                    <td>Debian 12 Bookworm</td>
                                    <td>4 vCPU @ 3.2 GHz Intel Xeon</td>
                                    <td>16 GB ECC DDR5</td>
                                    <td>250 GB NVMe PCIe 4.0</td>
                                    <td><span class="badge bg-success">Online &bull; 14d Uptime</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark d-block">srv-prod-dbcluster01</span>
                                        <span class="fs-8 text-muted">IP: 10.0.4.10 (Internal)</span>
                                    </td>
                                    <td><span class="badge bg-danger-subtle text-danger">Master DB Cluster</span></td>
                                    <td>Rocky Linux 9 (Enterprise)</td>
                                    <td>16 vCPU @ 3.7 GHz AMD EPYC</td>
                                    <td>64 GB ECC DDR5</td>
                                    <td>2 TB NVMe RAID 10</td>
                                    <td><span class="badge bg-success">Online &bull; Primary Master</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<?php include __DIR__ . '/../layouts/footer.php'; ?>
