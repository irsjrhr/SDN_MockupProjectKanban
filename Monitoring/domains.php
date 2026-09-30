<?php
$pageTitle = 'Domains & SSL Certificates Monitoring - Syncboard';
$currentPage = 'monitoring-domains';
$currentModule = 'monitoring';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Monitoring', 'url' => 'dashboard.php'],
    ['title' => 'Domains & SSL', 'url' => '']
];
include __DIR__ . '/../layouts/header.php';
?>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-info">
                        <i class="fa-solid fa-globe fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Production Domains & SSL Certificates</h1>
                        <span class="text-muted fs-7">DNS resolution status, TLS/SSL certificate health, auto-renewal alerts, and CDN proxy caches</span>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary fs-7 rounded-3"><i class="fa-solid fa-rotate me-1"></i> Scan All SSL</button>
                    <button class="btn btn-primary fs-7 rounded-3"><i class="fa-solid fa-plus me-1"></i> Add Custom Domain</button>
                </div>
            </section>

            <!-- Content -->
            <div class="view-wrapper flex-grow-1 p-4">
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border rounded-4 shadow-sm p-3 bg-white h-100">
                            <span class="text-muted fs-8 fw-bold text-uppercase">Total Monitored Domains</span>
                            <h3 class="fw-bold my-2 text-dark">5 Domains</h3>
                            <span class="text-success fs-8"><i class="fa-solid fa-circle-check me-1"></i>100% DNS Healthy</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border rounded-4 shadow-sm p-3 bg-white h-100">
                            <span class="text-muted fs-8 fw-bold text-uppercase">SSL Certificate Health</span>
                            <h3 class="fw-bold my-2 text-success">5 Active Valid</h3>
                            <span class="text-muted fs-8">Auto-renewal via Let's Encrypt / Cloudflare</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border rounded-4 shadow-sm p-3 bg-white h-100">
                            <span class="text-muted fs-8 fw-bold text-uppercase">Earliest SSL Expiry</span>
                            <h3 class="fw-bold my-2 text-primary">82 Days</h3>
                            <span class="text-muted fs-8">api-core.enterprise.internal</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border rounded-4 shadow-sm p-3 bg-white h-100">
                            <span class="text-muted fs-8 fw-bold text-uppercase">CDN Edge Cache Ratio</span>
                            <h3 class="fw-bold my-2 text-info">94.8%</h3>
                            <span class="text-success fs-8"><i class="fa-solid fa-bolt me-1"></i>Cloudflare Edge Proxied</span>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border rounded-4 bg-white overflow-hidden mb-4">
                    <div class="card-header bg-white p-3 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <h2 class="h6 fw-bold mb-0">Live Domains & SSL Registry</h2>
                        <span class="badge bg-success-subtle text-success fs-8">Global DNS Resolution &bull; All Endpoints 200 OK</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 fs-7">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                <tr>
                                    <th class="ps-4">FQDN / Domain</th>
                                    <th>Target Project</th>
                                    <th>DNS Provider / Edge</th>
                                    <th>SSL Issuer</th>
                                    <th>Expires In</th>
                                    <th>TLS Version</th>
                                    <th>HTTP/3 Ready</th>
                                    <th class="pe-4 text-end">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4">
                                        <a href="https://api-core.enterprise.internal" target="_blank" class="fw-bold text-dark text-decoration-none">
                                            <i class="fa-solid fa-lock text-success me-2"></i>api-core.enterprise.internal
                                        </a>
                                    </td>
                                    <td><span class="badge bg-primary-subtle text-primary">Middleware Project</span></td>
                                    <td>Cloudflare DNS &bull; Proxied</td>
                                    <td>Let's Encrypt Authority X3</td>
                                    <td><span class="badge bg-success-subtle text-success">82 Days Left</span></td>
                                    <td>TLS 1.3</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Enabled</span></td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Secure</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <a href="https://company.org" target="_blank" class="fw-bold text-dark text-decoration-none">
                                            <i class="fa-solid fa-lock text-success me-2"></i>company.org
                                        </a>
                                    </td>
                                    <td><span class="badge bg-info-subtle text-info">Company Website</span></td>
                                    <td>AWS Route53 / CloudFront</td>
                                    <td>Amazon Trust Services</td>
                                    <td><span class="badge bg-success-subtle text-success">245 Days Left</span></td>
                                    <td>TLS 1.3</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Enabled</span></td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Secure</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <a href="https://promo.enterprise.com" target="_blank" class="fw-bold text-dark text-decoration-none">
                                            <i class="fa-solid fa-lock text-success me-2"></i>promo.enterprise.com
                                        </a>
                                    </td>
                                    <td><span class="badge bg-warning-subtle text-warning">Landing Campaign</span></td>
                                    <td>Vercel Edge Network</td>
                                    <td>Let's Encrypt E1</td>
                                    <td><span class="badge bg-success-subtle text-success">74 Days Left</span></td>
                                    <td>TLS 1.3</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Enabled</span></td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Secure</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <a href="https://mobile-sync.enterprise.com" target="_blank" class="fw-bold text-dark text-decoration-none">
                                            <i class="fa-solid fa-lock text-success me-2"></i>mobile-sync.enterprise.com
                                        </a>
                                    </td>
                                    <td><span class="badge bg-company text-dark">Mobile CRM App</span></td>
                                    <td>Cloudflare DNS &bull; Proxied</td>
                                    <td>Google Trust Services</td>
                                    <td><span class="badge bg-success-subtle text-success">90 Days Left</span></td>
                                    <td>TLS 1.3</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Enabled</span></td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Secure</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <a href="https://metrics.internal.cloud" target="_blank" class="fw-bold text-dark text-decoration-none">
                                            <i class="fa-solid fa-lock text-success me-2"></i>metrics.internal.cloud
                                        </a>
                                    </td>
                                    <td><span class="badge bg-ecommerce text-dark">Analytics Tool</span></td>
                                    <td>Internal CoreDNS</td>
                                    <td>Private Root CA v2</td>
                                    <td><span class="badge bg-success-subtle text-success">310 Days Left</span></td>
                                    <td>TLS 1.3</td>
                                    <td><span class="badge bg-secondary-subtle text-muted">HTTP/2</span></td>
                                    <td class="pe-4 text-end"><span class="badge bg-success">Secure</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<?php include __DIR__ . '/../layouts/footer.php'; ?>
