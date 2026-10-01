<?php
$pageTitle = 'Project Domains & SSL Certificates - Syncboard';
$currentPage = 'monitoring-domains';
$currentModule = 'monitoring';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Monitoring', 'url' => 'dashboard.php'],
    ['title' => 'Project Domains & SSL', 'url' => '']
];
$extraJs = [$basePath . 'assets/js/monitoring.js'];
include __DIR__ . '/../layouts/header.php';
?>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-info shadow-sm" style="width: 48px; height: 48px;">
                        <i class="fa-solid fa-globe fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Project Domains & SSL Certificates</h1>
                        <span class="text-muted fs-7">DNS resolution status, TLS/SSL certificate health, auto-renewal alerts, and CDN proxy caches per project</span>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button id="btnScanAllSsl" class="btn btn-outline-secondary fs-7 rounded-3 fw-semibold">
                        <i class="fa-solid fa-shield-halved me-1"></i> Scan All SSL
                    </button>
                    <button class="btn btn-primary fs-7 rounded-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#addDomainModal">
                        <i class="fa-solid fa-plus me-1"></i> Add Project Domain
                    </button>
                </div>
            </section>

            <!-- Content -->
            <div class="view-wrapper flex-grow-1 p-4">

                <!-- Domain Context Selector Bar -->
                <?php include __DIR__ . '/_domain_selector.php'; ?>

                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border rounded-4 shadow-sm p-3 bg-white h-100">
                            <span class="text-muted fs-8 fw-bold text-uppercase">Monitored Domains</span>
                            <h3 class="fw-bold my-2 text-dark"><span id="activeDomainCounter">5</span> Domains</h3>
                            <span class="text-success fs-8"><i class="fa-solid fa-circle-check me-1"></i>100% DNS Healthy</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border rounded-4 shadow-sm p-3 bg-white h-100">
                            <span class="text-muted fs-8 fw-bold text-uppercase">SSL Certificate Health</span>
                            <h3 class="fw-bold my-2 text-success">5 Active Valid</h3>
                            <span class="text-muted fs-8">Auto-renewal via Let's Encrypt / DigiCert</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border rounded-4 shadow-sm p-3 bg-white h-100">
                            <span class="text-muted fs-8 fw-bold text-uppercase">Earliest SSL Expiry</span>
                            <h3 class="fw-bold my-2 text-primary">60 Days</h3>
                            <span class="text-muted fs-8">promo.campaign.io</span>
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
                        <div>
                            <h2 class="h6 fw-bold mb-0">Project Domain Registry & SSL Expiry Matrix</h2>
                            <span class="text-muted fs-8">Comprehensive security overview and edge network routing for each project</span>
                        </div>
                        <span class="badge bg-success-subtle text-success fs-8">Global DNS Resolution &bull; All Endpoints 200 OK</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 fs-7">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                <tr>
                                    <th class="ps-4">Project Domain (FQDN)</th>
                                    <th>Target Project</th>
                                    <th>DNS Provider / Edge</th>
                                    <th>SSL Issuer</th>
                                    <th>Expires In</th>
                                    <th>TLS Version</th>
                                    <th>HTTP/3</th>
                                    <th>Live Latency</th>
                                    <th class="pe-4 text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- 1. Middleware Project -->
                                <tr data-domain-item="api-core">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fa-solid fa-lock text-success"></i>
                                            <a href="https://api-core.enterprise.internal" target="_blank" class="fw-bold text-dark text-decoration-none">
                                                api-core.enterprise.internal
                                            </a>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-primary-subtle text-primary">Middleware Project</span></td>
                                    <td>Cloudflare DNS &bull; Proxied</td>
                                    <td>Let's Encrypt Authority X3</td>
                                    <td><span class="badge bg-success-subtle text-success">82 Days Left</span></td>
                                    <td>TLS 1.3</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Enabled</span></td>
                                    <td><span class="badge ping-latency-badge bg-success-subtle text-success">28ms</span></td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary btn-ping-domain" data-domain="api-core.enterprise.internal" title="Ping Domain">
                                                <i class="fa-solid fa-satellite-dish"></i>
                                            </button>
                                            <button class="btn btn-outline-primary btn-view-cert" 
                                                data-domain="api-core.enterprise.internal"
                                                data-project="Middleware Project"
                                                data-issuer="Let's Encrypt Authority X3"
                                                data-expiry="82 Days Remaining (Dec 22, 2026)"
                                                data-tls="TLS 1.3 (RFC 8446) / AES_256_GCM"
                                                data-san="api-core.enterprise.internal, *.api-core.enterprise.internal"
                                                title="View Certificate Details">
                                                <i class="fa-solid fa-certificate"></i> Cert
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- 2. Company Website -->
                                <tr data-domain-item="company-org">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fa-solid fa-lock text-success"></i>
                                            <a href="https://company.org" target="_blank" class="fw-bold text-dark text-decoration-none">
                                                company.org
                                            </a>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-info-subtle text-info">Company Website</span></td>
                                    <td>Fastly CDN &bull; Proxied</td>
                                    <td>DigiCert Global Root G2</td>
                                    <td><span class="badge bg-success-subtle text-success">120 Days Left</span></td>
                                    <td>TLS 1.3</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Enabled</span></td>
                                    <td><span class="badge ping-latency-badge bg-success-subtle text-success">18ms</span></td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary btn-ping-domain" data-domain="company.org" title="Ping Domain">
                                                <i class="fa-solid fa-satellite-dish"></i>
                                            </button>
                                            <button class="btn btn-outline-primary btn-view-cert" 
                                                data-domain="company.org"
                                                data-project="Company Website"
                                                data-issuer="DigiCert Global Root G2"
                                                data-expiry="120 Days Remaining (Jan 29, 2027)"
                                                data-tls="TLS 1.3 (RFC 8446) / CHACHA20_POLY1305"
                                                data-san="company.org, www.company.org"
                                                title="View Certificate Details">
                                                <i class="fa-solid fa-certificate"></i> Cert
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- 3. Landing Campaign -->
                                <tr data-domain-item="promo-campaign">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fa-solid fa-lock text-success"></i>
                                            <a href="https://promo.campaign.io" target="_blank" class="fw-bold text-dark text-decoration-none">
                                                promo.campaign.io
                                            </a>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-warning-subtle text-warning">Landing Campaign</span></td>
                                    <td>Cloudflare DNS &bull; Proxied</td>
                                    <td>Let's Encrypt Authority X3</td>
                                    <td><span class="badge bg-warning-subtle text-warning">60 Days Left</span></td>
                                    <td>TLS 1.3</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Enabled</span></td>
                                    <td><span class="badge ping-latency-badge bg-success-subtle text-success">35ms</span></td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary btn-ping-domain" data-domain="promo.campaign.io" title="Ping Domain">
                                                <i class="fa-solid fa-satellite-dish"></i>
                                            </button>
                                            <button class="btn btn-outline-primary btn-view-cert" 
                                                data-domain="promo.campaign.io"
                                                data-project="Landing Campaign"
                                                data-issuer="Let's Encrypt Authority X3"
                                                data-expiry="60 Days Remaining (Nov 30, 2026)"
                                                data-tls="TLS 1.3 (RFC 8446) / AES_128_GCM"
                                                data-san="promo.campaign.io, *.promo.campaign.io"
                                                title="View Certificate Details">
                                                <i class="fa-solid fa-certificate"></i> Cert
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- 4. Mobile CRM App -->
                                <tr data-domain-item="api-mobile">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fa-solid fa-lock text-success"></i>
                                            <a href="https://api-mobile.enterprise.internal" target="_blank" class="fw-bold text-dark text-decoration-none">
                                                api-mobile.enterprise.internal
                                            </a>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-secondary-subtle text-secondary">Mobile CRM App</span></td>
                                    <td>AWS Route53 + CloudFront</td>
                                    <td>Google Trust Services</td>
                                    <td><span class="badge bg-success-subtle text-success">85 Days Left</span></td>
                                    <td>TLS 1.3</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Enabled</span></td>
                                    <td><span class="badge ping-latency-badge bg-success-subtle text-success">45ms</span></td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary btn-ping-domain" data-domain="api-mobile.enterprise.internal" title="Ping Domain">
                                                <i class="fa-solid fa-satellite-dish"></i>
                                            </button>
                                            <button class="btn btn-outline-primary btn-view-cert" 
                                                data-domain="api-mobile.enterprise.internal"
                                                data-project="Mobile CRM App"
                                                data-issuer="Google Trust Services (GTS CA 1P5)"
                                                data-expiry="85 Days Remaining (Dec 25, 2026)"
                                                data-tls="TLS 1.3 (RFC 8446) / AES_256_GCM"
                                                data-san="api-mobile.enterprise.internal"
                                                title="View Certificate Details">
                                                <i class="fa-solid fa-certificate"></i> Cert
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- 5. Analytics Tool -->
                                <tr data-domain-item="telemetry-hub">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fa-solid fa-lock text-success"></i>
                                            <a href="https://telemetry-hub.internal" target="_blank" class="fw-bold text-dark text-decoration-none">
                                                telemetry-hub.internal
                                            </a>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-success-subtle text-success">Analytics Tool</span></td>
                                    <td>CoreDNS &bull; Internal Mesh</td>
                                    <td>Internal Enterprise Root CA</td>
                                    <td><span class="badge bg-success-subtle text-success">310 Days Left</span></td>
                                    <td>mTLS 1.3</td>
                                    <td><span class="badge bg-secondary-subtle text-secondary">mTLS Native</span></td>
                                    <td><span class="badge ping-latency-badge bg-success-subtle text-success">15ms</span></td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-secondary btn-ping-domain" data-domain="telemetry-hub.internal" title="Ping Domain">
                                                <i class="fa-solid fa-satellite-dish"></i>
                                            </button>
                                            <button class="btn btn-outline-primary btn-view-cert" 
                                                data-domain="telemetry-hub.internal"
                                                data-project="Analytics Tool"
                                                data-issuer="Enterprise Root Authority X2 (Internal)"
                                                data-expiry="310 Days Remaining (Aug 07, 2027)"
                                                data-tls="mTLS 1.3 Mutual Authentication"
                                                data-san="telemetry-hub.internal, mesh.internal"
                                                title="View Certificate Details">
                                                <i class="fa-solid fa-certificate"></i> Cert
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal: View SSL Certificate Details -->
            <div class="modal fade" id="certDetailsModal" tabindex="-1" aria-labelledby="certModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-4 border-0 shadow-lg">
                        <div class="modal-header bg-light border-bottom p-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-3 p-2 bg-primary-subtle text-primary">
                                    <i class="fa-solid fa-shield-halved fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="modal-title h6 fw-bold mb-0" id="certModalLabel">SSL/TLS Certificate Details</h5>
                                    <span class="text-muted fs-8" id="certModalDomainTitle">api-core.enterprise.internal</span>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 fs-7">
                            <div class="list-group list-group-flush rounded-3 border">
                                <div class="list-group-item d-flex justify-content-between align-items-center py-2.5">
                                    <span class="text-muted">Target Project</span>
                                    <span class="fw-bold text-dark" id="certModalProject">Middleware Project</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center py-2.5">
                                    <span class="text-muted">Certificate Authority</span>
                                    <span class="fw-bold text-dark" id="certModalIssuer">Let's Encrypt Authority X3</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center py-2.5">
                                    <span class="text-muted">Validity Status</span>
                                    <span class="badge bg-success-subtle text-success" id="certModalExpiry">82 Days Remaining</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center py-2.5">
                                    <span class="text-muted">TLS Cipher Protocol</span>
                                    <span class="fw-semibold text-dark" id="certModalTls">TLS 1.3 (RFC 8446)</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center py-2.5">
                                    <span class="text-muted">SAN (Subject Alt Names)</span>
                                    <span class="badge bg-light text-dark border" id="certModalSan">api-core.enterprise.internal</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center py-2.5">
                                    <span class="text-muted">OCSP Stapling</span>
                                    <span class="text-success fw-semibold"><i class="fa-solid fa-circle-check me-1"></i> Enabled & Verified</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light border-top p-3">
                            <button type="button" class="btn btn-secondary btn-sm px-3 rounded-3" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal: Add Custom Project Domain -->
            <div class="modal fade" id="addDomainModal" tabindex="-1" aria-labelledby="addDomainLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-4 border-0 shadow-lg">
                        <div class="modal-header bg-light border-bottom p-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-3 p-2 bg-primary-subtle text-primary">
                                    <i class="fa-solid fa-plus fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="modal-title h6 fw-bold mb-0" id="addDomainLabel">Bind New Project Domain</h5>
                                    <span class="text-muted fs-8">Assign a custom domain and SSL monitoring to a project</span>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 fs-7">
                            <form id="formAddDomain">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Target Project</label>
                                    <select class="form-select fs-7" required>
                                        <option value="">-- Select Target Project --</option>
                                        <option value="api-core">Middleware Project</option>
                                        <option value="company-org">Company Website</option>
                                        <option value="promo-campaign">Landing Campaign</option>
                                        <option value="api-mobile">Mobile CRM App</option>
                                        <option value="telemetry-hub">Analytics Tool</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Domain FQDN</label>
                                    <input type="text" class="form-control fs-7" placeholder="e.g. staging-api.company.internal" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">DNS & Edge Provider</label>
                                    <select class="form-select fs-7">
                                        <option value="cloudflare">Cloudflare DNS & Edge</option>
                                        <option value="fastly">Fastly CDN</option>
                                        <option value="route53">AWS Route53 / CloudFront</option>
                                        <option value="internal">CoreDNS Internal Mesh</option>
                                    </select>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="enableAutoSslCheck" checked>
                                    <label class="form-check-label fw-semibold" for="enableAutoSslCheck">Enable Auto-SSL Handshake Monitoring</label>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer bg-light border-top p-3">
                            <button type="button" class="btn btn-secondary btn-sm px-3 rounded-3" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary btn-sm px-3 rounded-3" data-bs-dismiss="modal" onclick="alert('Project domain registered successfully for monitoring.')">Save Domain</button>
                        </div>
                    </div>
                </div>
            </div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
