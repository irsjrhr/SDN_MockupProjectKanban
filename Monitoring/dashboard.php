<?php
$pageTitle = 'Project Domain Telemetry & Monitoring - Syncboard';
$currentPage = 'monitoring-dashboard';
$currentModule = 'monitoring';
$basePath = '../';
$extraJs = [$basePath . 'assets/js/monitoring.js'];
include __DIR__ . '/../layouts/header.php';
?>

            <!-- Page Title Section -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary shadow-sm" style="width: 48px; height: 48px;">
                        <i class="fa-solid fa-gauge-high fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Project Domain Telemetry & Monitoring</h1>
                        <span class="text-muted fs-7">Real-time health, SSL certificate validity, server node metrics, and traffic load per project domain</span>
                    </div>
                </div>

                <div class="project-actions-area d-flex align-items-center gap-2">
                    <button class="btn btn-outline-secondary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 fs-7" onclick="location.reload()">
                        <i class="fa-solid fa-rotate"></i> Refresh Telemetry
                    </button>
                    <a href="domains.php" class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 fs-7">
                        <i class="fa-solid fa-globe"></i> Domains & SSL Registry
                    </a>
                </div>
            </section>

            <!-- Main Content Area -->
            <div class="view-wrapper flex-grow-1 p-4">

                <!-- Domain Context Selector Bar -->
                <?php include __DIR__ . '/_domain_selector.php'; ?>

                <!-- Top Real-time Metric Cards Grid -->
                <div class="row g-3 mb-4">
                    <!-- 1. Monitored Project Domains -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Monitored Domains</span>
                                    <h3 class="h4 fw-extrabold text-dark mb-0"><span id="activeDomainCounter">5</span> <small class="fs-7 text-muted fw-normal">Active FQDNs</small></h3>
                                </div>
                                <div class="stat-icon bg-primary-subtle text-primary rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-globe fs-4"></i>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-2 fs-8">
                                <span class="text-success fw-semibold"><i class="fa-solid fa-circle-check"></i> 100% DNS Online</span>
                                <span class="text-muted">Edge Proxied</span>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Live Request Traffic -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Live Aggregate Traffic</span>
                                    <h3 class="h4 fw-extrabold mb-0">2.4M <small class="fs-7 text-muted fw-normal">req/day</small></h3>
                                </div>
                                <div class="stat-icon bg-info-subtle text-info rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-chart-line fs-4"></i>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-2 fs-8">
                                <span id="liveTrafficReqSec" class="text-success fw-semibold"><i class="fa-solid fa-bolt text-warning"></i> 185 req/sec</span>
                                <span class="text-muted">Avg 28ms latency</span>
                            </div>
                        </div>
                    </div>

                    <!-- 3. SSL Health & Security -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">SSL Certificate Status</span>
                                    <h3 class="h4 fw-extrabold text-success mb-0">5 Valid (TLS 1.3)</h3>
                                </div>
                                <div class="stat-icon bg-success-subtle text-success rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-shield-halved fs-4"></i>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-2 fs-8">
                                <span class="text-primary fw-semibold"><i class="fa-solid fa-clock-rotate-left"></i> Earliest: 60d</span>
                                <span class="text-muted">Auto-renewal Active</span>
                            </div>
                        </div>
                    </div>

                    <!-- 4. Global Infrastructure Nodes -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Domain Host Nodes</span>
                                    <h3 class="h4 fw-extrabold text-primary mb-0">5 Nodes Online</h3>
                                </div>
                                <div class="stat-icon bg-warning-subtle text-warning rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-server fs-4"></i>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-2 fs-8">
                                <span class="text-success fw-semibold"><i class="fa-solid fa-microchip"></i> Avg CPU: 27.2%</span>
                                <span class="text-muted">RAM: 52%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Projects & Domains Live Telemetry Master Table -->
                <div class="card shadow-sm border rounded-4 bg-white overflow-hidden mb-4">
                    <div class="card-header bg-white p-3 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <h2 class="h6 fw-bold mb-0">Live Project Domain Telemetry & Health Matrix</h2>
                            <span class="text-muted fs-8">Real-time status, HTTP response, SSL certificate validity, and node metrics per project domain</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-success-subtle text-success border border-success-subtle fs-8"><i class="fa-solid fa-circle-check me-1"></i> 5 Operational</span>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-8"><i class="fa-solid fa-lock me-1"></i> 100% TLS Valid</span>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 fs-7" id="domainTelemetryTable">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                <tr>
                                    <th class="ps-4">Target Project & Scope</th>
                                    <th>Monitored Domain (FQDN)</th>
                                    <th>SSL / TLS Certificate</th>
                                    <th>Live Ping & Latency</th>
                                    <th>Assigned Server Node</th>
                                    <th>Associated DB Table</th>
                                    <th>Uptime (30d)</th>
                                    <th class="pe-4 text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- 1. Middleware Project -->
                                <tr data-domain-item="api-core">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="badge-icon-sm badge-ecommerce p-2 rounded-3 text-primary bg-primary-subtle">
                                                <i class="fa-solid fa-cubes-stacked fs-5"></i>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark d-block">Middleware Project</span>
                                                <span class="badge bg-primary-subtle text-primary fs-8">api-prod-v2</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1.5">
                                            <i class="fa-solid fa-arrow-up-right-from-square text-muted fs-8"></i>
                                            <a href="https://api-core.enterprise.internal" target="_blank" class="fw-bold text-dark text-decoration-none">
                                                api-core.enterprise.internal
                                            </a>
                                        </div>
                                        <span class="d-block fs-8 text-muted">Cloudflare DNS &bull; Proxied</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success-subtle text-success fs-8 mb-1"><i class="fa-solid fa-lock me-1"></i> Valid &bull; 82 Days</span>
                                        <span class="d-block fs-8 text-muted">Let's Encrypt (TLS 1.3)</span>
                                    </td>
                                    <td>
                                        <span class="badge ping-latency-badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-bolt me-1"></i> 28ms (200 OK)</span>
                                        <span class="d-block fs-8 text-muted">4,820 req/m</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark d-block">srv-prod-node01</span>
                                        <span class="fs-8 text-muted">CPU: 24% &bull; RAM: 4.8 GB</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-database text-muted me-1"></i> tbl_middleware_logs</span>
                                        <span class="d-block fs-8 text-muted">1.24M rows &bull; 842.5 MB</span>
                                    </td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">99.99%</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-xs btn-outline-primary btn-ping-domain rounded-2 px-2 py-1 fs-8" data-domain="api-core.enterprise.internal" title="Send Live Ping">
                                            <i class="fa-solid fa-satellite-dish me-1"></i> Ping
                                        </button>
                                    </td>
                                </tr>

                                <!-- 2. Company Website -->
                                <tr data-domain-item="company-org">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="badge-icon-sm badge-company p-2 rounded-3 text-info bg-info-subtle">
                                                <i class="fa-solid fa-globe fs-5"></i>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark d-block">Company Website</span>
                                                <span class="badge bg-info-subtle text-info fs-8">web-portal</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1.5">
                                            <i class="fa-solid fa-arrow-up-right-from-square text-muted fs-8"></i>
                                            <a href="https://company.org" target="_blank" class="fw-bold text-dark text-decoration-none">
                                                company.org
                                            </a>
                                        </div>
                                        <span class="d-block fs-8 text-muted">Fastly CDN &bull; Edge Cached</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success-subtle text-success fs-8 mb-1"><i class="fa-solid fa-lock me-1"></i> Valid &bull; 120 Days</span>
                                        <span class="d-block fs-8 text-muted">DigiCert Global (TLS 1.3)</span>
                                    </td>
                                    <td>
                                        <span class="badge ping-latency-badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-bolt me-1"></i> 18ms (200 OK)</span>
                                        <span class="d-block fs-8 text-muted">1,940 req/m</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark d-block">srv-prod-web01</span>
                                        <span class="fs-8 text-muted">CPU: 12% &bull; RAM: 2.1 GB</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-database text-muted me-1"></i> tbl_company_articles</span>
                                        <span class="d-block fs-8 text-muted">8,420 rows &bull; 14.8 MB</span>
                                    </td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">100.0%</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-xs btn-outline-primary btn-ping-domain rounded-2 px-2 py-1 fs-8" data-domain="company.org" title="Send Live Ping">
                                            <i class="fa-solid fa-satellite-dish me-1"></i> Ping
                                        </button>
                                    </td>
                                </tr>

                                <!-- 3. Landing Page Campaign -->
                                <tr data-domain-item="promo-campaign">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="badge-icon-sm badge-landing p-2 rounded-3 text-warning bg-warning-subtle">
                                                <i class="fa-solid fa-bullhorn fs-5"></i>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark d-block">Landing Campaign</span>
                                                <span class="badge bg-warning-subtle text-warning fs-8">promo-q4</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1.5">
                                            <i class="fa-solid fa-arrow-up-right-from-square text-muted fs-8"></i>
                                            <a href="https://promo.campaign.io" target="_blank" class="fw-bold text-dark text-decoration-none">
                                                promo.campaign.io
                                            </a>
                                        </div>
                                        <span class="d-block fs-8 text-muted">Cloudflare Edge &bull; 94.8% Cache</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success-subtle text-success fs-8 mb-1"><i class="fa-solid fa-lock me-1"></i> Valid &bull; 60 Days</span>
                                        <span class="d-block fs-8 text-muted">Let's Encrypt (TLS 1.3)</span>
                                    </td>
                                    <td>
                                        <span class="badge ping-latency-badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-bolt me-1"></i> 35ms (200 OK)</span>
                                        <span class="d-block fs-8 text-muted">3,120 req/m</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark d-block">srv-prod-landing01</span>
                                        <span class="fs-8 text-muted">CPU: 38% &bull; RAM: 3.4 GB</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-database text-muted me-1"></i> tbl_landing_leads</span>
                                        <span class="d-block fs-8 text-muted">34,190 rows &bull; 18.4 MB</span>
                                    </td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">99.95%</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-xs btn-outline-primary btn-ping-domain rounded-2 px-2 py-1 fs-8" data-domain="promo.campaign.io" title="Send Live Ping">
                                            <i class="fa-solid fa-satellite-dish me-1"></i> Ping
                                        </button>
                                    </td>
                                </tr>

                                <!-- 4. Mobile CRM App -->
                                <tr data-domain-item="api-mobile">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="badge-icon-sm badge-company p-2 rounded-3 text-secondary bg-secondary-subtle">
                                                <i class="fa-solid fa-mobile-screen fs-5"></i>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark d-block">Mobile CRM App</span>
                                                <span class="badge bg-secondary-subtle text-secondary fs-8">mobile-sync</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1.5">
                                            <i class="fa-solid fa-arrow-up-right-from-square text-muted fs-8"></i>
                                            <a href="https://api-mobile.enterprise.internal" target="_blank" class="fw-bold text-dark text-decoration-none">
                                                api-mobile.enterprise.internal
                                            </a>
                                        </div>
                                        <span class="d-block fs-8 text-muted">AWS Route53 + CloudFront</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success-subtle text-success fs-8 mb-1"><i class="fa-solid fa-lock me-1"></i> Valid &bull; 85 Days</span>
                                        <span class="d-block fs-8 text-muted">Google Trust Services</span>
                                    </td>
                                    <td>
                                        <span class="badge ping-latency-badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-bolt me-1"></i> 45ms (200 OK)</span>
                                        <span class="d-block fs-8 text-muted">850 req/m</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark d-block">srv-prod-mobile01</span>
                                        <span class="fs-8 text-muted">CPU: 18% &bull; RAM: 1.8 GB</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-database text-muted me-1"></i> tbl_mobile_sync_tokens</span>
                                        <span class="d-block fs-8 text-muted">118,500 rows &bull; 64.0 MB</span>
                                    </td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">99.98%</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-xs btn-outline-primary btn-ping-domain rounded-2 px-2 py-1 fs-8" data-domain="api-mobile.enterprise.internal" title="Send Live Ping">
                                            <i class="fa-solid fa-satellite-dish me-1"></i> Ping
                                        </button>
                                    </td>
                                </tr>

                                <!-- 5. Analytics Tool -->
                                <tr data-domain-item="telemetry-hub">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="badge-icon-sm badge-ecommerce p-2 rounded-3 text-success bg-success-subtle">
                                                <i class="fa-solid fa-chart-pie fs-5"></i>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark d-block">Analytics Tool</span>
                                                <span class="badge bg-success-subtle text-success fs-8">telemetry-hub</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1.5">
                                            <i class="fa-solid fa-arrow-up-right-from-square text-muted fs-8"></i>
                                            <a href="https://telemetry-hub.internal" target="_blank" class="fw-bold text-dark text-decoration-none">
                                                telemetry-hub.internal
                                            </a>
                                        </div>
                                        <span class="d-block fs-8 text-muted">CoreDNS &bull; Internal Mesh</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success-subtle text-success fs-8 mb-1"><i class="fa-solid fa-lock me-1"></i> Valid &bull; 310 Days</span>
                                        <span class="d-block fs-8 text-muted">Enterprise CA (mTLS)</span>
                                    </td>
                                    <td>
                                        <span class="badge ping-latency-badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-bolt me-1"></i> 15ms (200 OK)</span>
                                        <span class="d-block fs-8 text-muted">5,400 req/m</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark d-block">srv-prod-dbcluster01</span>
                                        <span class="fs-8 text-muted">CPU: 42% &bull; RAM: 6.3 GB</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-database text-muted me-1"></i> tbl_telemetry_events</span>
                                        <span class="d-block fs-8 text-muted">4.89M rows &bull; 2.14 GB</span>
                                    </td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">100.0%</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-xs btn-outline-primary btn-ping-domain rounded-2 px-2 py-1 fs-8" data-domain="telemetry-hub.internal" title="Send Live Ping">
                                            <i class="fa-solid fa-satellite-dish me-1"></i> Ping
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Auxiliary Cards (Edge Ingress & Domain Security Health) -->
                <div class="row g-4">
                    <div class="col-12 col-lg-6">
                        <div class="card shadow-sm border rounded-4 p-4 bg-white h-100">
                            <h2 class="h6 fw-bold mb-3"><i class="fa-solid fa-network-wired text-primary me-2"></i>Edge Ingress & Gateway Architecture</h2>
                            <div class="d-flex flex-column gap-3 fs-7">
                                <div class="d-flex align-items-center justify-content-between p-2.5 border rounded-3 bg-light-subtle">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-success p-1 rounded-circle"><i class="fa-solid fa-check fs-8 text-white"></i></span>
                                        <div>
                                            <span class="fw-bold d-block">Nginx API Gateway / Ingress</span>
                                            <span class="fs-8 text-muted">Routing traffic across all 5 project domains</span>
                                        </div>
                                    </div>
                                    <span class="badge bg-success-subtle text-success">Active &bull; 0.02% Error</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between p-2.5 border rounded-3 bg-light-subtle">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-success p-1 rounded-circle"><i class="fa-solid fa-check fs-8 text-white"></i></span>
                                        <div>
                                            <span class="fw-bold d-block">Redis Cache & Domain Session Pool</span>
                                            <span class="fs-8 text-muted">Cross-domain shared cache cluster</span>
                                        </div>
                                    </div>
                                    <span class="badge bg-success-subtle text-success">98.4% Hit Rate &bull; 1.2 GB</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between p-2.5 border rounded-3 bg-light-subtle">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-success p-1 rounded-circle"><i class="fa-solid fa-check fs-8 text-white"></i></span>
                                        <div>
                                            <span class="fw-bold d-block">RabbitMQ Telemetry Queue</span>
                                            <span class="fs-8 text-muted">Asynchronous log dispatcher per domain</span>
                                        </div>
                                    </div>
                                    <span class="badge bg-success-subtle text-success">0 Backlog &bull; 12 Workers</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card shadow-sm border rounded-4 p-4 bg-white h-100">
                            <h2 class="h6 fw-bold mb-3"><i class="fa-solid fa-shield-halved text-success me-2"></i>Domain Security & TLS Auto-Renewal</h2>
                            <div class="d-flex flex-column gap-3 fs-7">
                                <div class="d-flex align-items-center justify-content-between p-2.5 border rounded-3 bg-light-subtle">
                                    <div>
                                        <span class="fw-bold d-block">Cloudflare & Edge WAF Rules</span>
                                        <span class="fs-8 text-muted">DDoS mitigation & OWASP Top 10 rules</span>
                                    </div>
                                    <span class="badge bg-success">Protected &bull; 0 Threats</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between p-2.5 border rounded-3 bg-light-subtle">
                                    <div>
                                        <span class="fw-bold d-block">Certbot SSL Auto-Renewal Daemon</span>
                                        <span class="fs-8 text-muted">Automated cron scan at 00:00 UTC daily</span>
                                    </div>
                                    <span class="badge bg-success-subtle text-success">Active &bull; Let's Encrypt</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between p-2.5 border rounded-3 bg-light-subtle">
                                    <div>
                                        <span class="fw-bold d-block">Domain Database S3 Backup Schedule</span>
                                        <span class="fs-8 text-muted">Encrypted snapshots across project tables</span>
                                    </div>
                                    <span class="badge bg-primary-subtle text-primary">Daily at 02:00 UTC</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
