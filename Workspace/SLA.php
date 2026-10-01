<?php
/**
 * ==============================================================================
 * SYNCBOARD - SLA (SERVICE LEVEL AGREEMENT) GOVERNANCE & TRACKING WORKSPACE
 * Location: /Workspace/SLA.php
 * ==============================================================================
 * Centralized SLA dashboard, multi-project compliance matrix, real-time task
 * deadline countdowns, breach risk alerts, and escalation policy manager.
 */

$pageTitle = 'SLA Management & Service Level Tracking';
$currentPage = 'sla';
$currentModule = 'workspace';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Project', 'url' => 'KanbanProject.php'],
    ['title' => 'Workspace', 'url' => '#'],
    ['title' => 'SLA Governance', 'url' => '']
];

include __DIR__ . '/../layouts/header.php';
?>

<!-- =========================================================================== -->
<!-- 1. SLA MASTER HEADER & ACTIONS                                              -->
<!-- =========================================================================== -->
<section class="p-4 bg-white border-bottom d-flex flex-wrap align-items-center justify-content-between gap-3">
    <div class="d-flex align-items-center gap-3">
        <div class="p-3 bg-danger-subtle text-danger rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 52px; height: 52px;">
            <i class="fa-solid fa-stopwatch-20 fs-3"></i>
        </div>
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <h1 class="h4 fw-extrabold text-dark mb-0">SLA Governance & Performance Tracking</h1>
                <span class="badge bg-success-subtle text-success border border-success-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold">
                    <i class="fa-solid fa-shield-check me-1"></i> Live Real-Time Guard
                </span>
            </div>
            <p class="text-muted fs-8 mb-0 mt-0.5">
                Pemantauan Service Level Agreement (SLA), target batas penyelesaian (MTTR), deteksi risiko keterlambatan, dan eskalasi otomatis pada seluruh task project.
            </p>
        </div>
    </div>

    <div class="d-flex align-items-center gap-2 flex-wrap">
        <button class="btn btn-outline-secondary btn-sm px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-1.5" id="btnExportSlaReport">
            <i class="fa-solid fa-file-export"></i>
            <span>Export SLA Report</span>
        </button>
        <button class="btn btn-outline-primary btn-sm px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-1.5" data-bs-toggle="modal" data-bs-target="#configureSlaModal">
            <i class="fa-solid fa-sliders"></i>
            <span>Configure Policies</span>
        </button>
        <button class="btn btn-danger btn-sm px-3.5 py-2 fw-semibold rounded-3 d-flex align-items-center gap-1.5 shadow-sm" data-bs-toggle="modal" data-bs-target="#escalateSlaModal">
            <i class="fa-solid fa-bullhorn"></i>
            <span>Trigger Escalation</span>
        </button>
    </div>
</section>

<!-- =========================================================================== -->
<!-- 2. MAIN SLA CONTENT AREA                                                    -->
<!-- =========================================================================== -->
<div class="p-4 bg-light-subtle flex-grow-1">

    <!-- KPI Metric Cards Grid -->
    <div class="row g-3 mb-4">
        <!-- 1. Overall SLA Compliance -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 position-relative overflow-hidden">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fs-8 fw-bold text-uppercase text-muted">SLA Compliance Rate</span>
                    <span class="badge bg-success-subtle text-success fs-8"><i class="fa-solid fa-arrow-trend-up me-1"></i>+2.4%</span>
                </div>
                <div class="d-flex align-items-baseline gap-2 mb-2">
                    <h2 class="h3 fw-extrabold text-dark mb-0" id="metricOverallCompliance">94.8%</h2>
                    <span class="fs-8 text-muted">Target: &ge; 90.0%</span>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 94.8%;" id="metricComplianceBar"></div>
                </div>
                <span class="fs-9 text-muted mt-2 d-block"><i class="fa-solid fa-circle-check text-success me-1"></i>34 of 36 tasks met target SLA baseline.</span>
            </div>
        </div>

        <!-- 2. Breached SLA Tasks -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 position-relative overflow-hidden">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fs-8 fw-bold text-uppercase text-muted">Breached / Overdue</span>
                    <span class="badge bg-danger-subtle text-danger fs-8 fw-bold"><i class="fa-solid fa-circle-exclamation me-1"></i>Critical</span>
                </div>
                <div class="d-flex align-items-baseline gap-2 mb-2">
                    <h2 class="h3 fw-extrabold text-danger mb-0" id="metricBreachedCount">2 Tasks</h2>
                    <span class="fs-8 text-muted">Across 2 Projects</span>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%;"></div>
                </div>
                <span class="fs-9 text-danger mt-2 d-block fw-semibold"><i class="fa-solid fa-triangle-exclamation me-1"></i>Eskalasi darurat sedang aktif untuk 2 task.</span>
            </div>
        </div>

        <!-- 3. At Risk Tasks (< 24h Left) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 position-relative overflow-hidden">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fs-8 fw-bold text-uppercase text-muted">At Risk (&lt; 24h Left)</span>
                    <span class="badge bg-warning-subtle text-warning fs-8 fw-bold"><i class="fa-solid fa-clock me-1"></i>Warning</span>
                </div>
                <div class="d-flex align-items-baseline gap-2 mb-2">
                    <h2 class="h3 fw-extrabold text-warning-emphasis mb-0" id="metricAtRiskCount">4 Tasks</h2>
                    <span class="fs-8 text-muted">Threshold &lt; 24h</span>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 75%;"></div>
                </div>
                <span class="fs-9 text-muted mt-2 d-block"><i class="fa-solid fa-bell text-warning me-1"></i>Perlu perhatian sebelum tenggat terlampaui.</span>
            </div>
        </div>

        <!-- 4. Avg Resolution Time (MTTR) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 position-relative overflow-hidden">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fs-8 fw-bold text-uppercase text-muted">Avg. MTTR Resolution</span>
                    <span class="badge bg-primary-subtle text-primary fs-8">Optimized</span>
                </div>
                <div class="d-flex align-items-baseline gap-2 mb-2">
                    <h2 class="h3 fw-extrabold text-dark mb-0">1.8 Days</h2>
                    <span class="fs-8 text-muted">Max Target: 3.0d</span>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%;"></div>
                </div>
                <span class="fs-9 text-muted mt-2 d-block"><i class="fa-solid fa-gauge-high text-primary me-1"></i>Kecepatan rata-rata penyelesaian task optimal.</span>
            </div>
        </div>
    </div>

    <!-- Section: SLA Priority Tier & Resolution Target Matrix -->
    <div class="card border-0 shadow-sm rounded-4 bg-white mb-4 overflow-hidden">
        <div class="card-header bg-white border-bottom p-3 d-flex flex-wrap align-items-center justify-content-between gap-2">
            <div class="d-flex align-items-center gap-2">
                <span class="p-2 bg-primary-subtle text-primary rounded-3"><i class="fa-solid fa-layer-group fs-6"></i></span>
                <div>
                    <h5 class="h6 fw-bold mb-0 text-dark">SLA Priority Tiers & Standard Resolution Targets</h5>
                    <span class="fs-8 text-muted">Standar responsivitas dan batas waktu penyelesaian yang disepakati antar-tim.</span>
                </div>
            </div>
            <button class="btn btn-sm btn-outline-primary rounded-3 fs-8 fw-semibold" data-bs-toggle="modal" data-bs-target="#configureSlaModal">
                <i class="fa-solid fa-pen-to-square me-1"></i> Edit SLA Thresholds
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Priority Tier</th>
                        <th class="py-3">First Response SLA</th>
                        <th class="py-3">Target Resolution MTTR</th>
                        <th class="py-3">Escalation Policy</th>
                        <th class="py-3">Current Compliance</th>
                        <th class="pe-4 py-3 text-end">Health Status</th>
                    </tr>
                </thead>
                <tbody class="fs-7">
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-danger text-white font-monospace px-2 py-1">P1</span>
                                <div>
                                    <strong class="text-dark d-block">Critical / Urgent</strong>
                                    <span class="fs-8 text-muted">Blokir produksi, fatal security bug</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-3"><strong class="text-dark font-monospace">&le; 2 Jam</strong></td>
                        <td class="py-3"><strong class="text-danger font-monospace">&le; 24 Jam (1 Hari)</strong></td>
                        <td class="py-3"><span class="badge bg-danger-subtle text-danger border border-danger-subtle">SMS + Slack #emergency + Lead Alert</span></td>
                        <td class="py-3">
                            <div class="d-flex align-items-center gap-2">
                                <strong class="text-dark font-monospace">92.5%</strong>
                                <div class="progress flex-grow-1" style="height: 5px; width: 70px;">
                                    <div class="progress-bar bg-success" style="width: 92.5%;"></div>
                                </div>
                            </div>
                        </td>
                        <td class="pe-4 py-3 text-end">
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 fw-semibold"><i class="fa-solid fa-circle-check me-1"></i>Compliant</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-warning-subtle text-warning-emphasis font-monospace px-2 py-1 border border-warning-subtle">P2</span>
                                <div>
                                    <strong class="text-dark d-block">High Priority</strong>
                                    <span class="fs-8 text-muted">Fitur utama terganggu, integrasi API lambat</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-3"><strong class="text-dark font-monospace">&le; 6 Jam</strong></td>
                        <td class="py-3"><strong class="text-warning-emphasis font-monospace">&le; 72 Jam (3 Hari)</strong></td>
                        <td class="py-3"><span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle">Slack #dev-sprint + Email Escalate</span></td>
                        <td class="py-3">
                            <div class="d-flex align-items-center gap-2">
                                <strong class="text-dark font-monospace">88.0%</strong>
                                <div class="progress flex-grow-1" style="height: 5px; width: 70px;">
                                    <div class="progress-bar bg-warning" style="width: 88%;"></div>
                                </div>
                            </div>
                        </td>
                        <td class="pe-4 py-3 text-end">
                            <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle px-2.5 py-1 fw-semibold"><i class="fa-solid fa-triangle-exclamation me-1"></i>At Risk</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary-subtle text-primary font-monospace px-2 py-1 border border-primary-subtle">P3</span>
                                <div>
                                    <strong class="text-dark d-block">Medium / Normal</strong>
                                    <span class="fs-8 text-muted">Penyempurnaan UI/UX, optimasi query ringan</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-3"><strong class="text-dark font-monospace">&le; 12 Jam</strong></td>
                        <td class="py-3"><strong class="text-primary font-monospace">&le; 7 Hari</strong></td>
                        <td class="py-3"><span class="badge bg-primary-subtle text-primary border border-primary-subtle">Daily Standup Reminder</span></td>
                        <td class="py-3">
                            <div class="d-flex align-items-center gap-2">
                                <strong class="text-dark font-monospace">97.0%</strong>
                                <div class="progress flex-grow-1" style="height: 5px; width: 70px;">
                                    <div class="progress-bar bg-success" style="width: 97%;"></div>
                                </div>
                            </div>
                        </td>
                        <td class="pe-4 py-3 text-end">
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 fw-semibold"><i class="fa-solid fa-circle-check me-1"></i>Compliant</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-secondary-subtle text-secondary font-monospace px-2 py-1 border">P4</span>
                                <div>
                                    <strong class="text-dark d-block">Low Priority / Backlog</strong>
                                    <span class="fs-8 text-muted">Perapian dokumentasi, minor label styling</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-3"><strong class="text-dark font-monospace">&le; 24 Jam</strong></td>
                        <td class="py-3"><strong class="text-secondary font-monospace">&le; 14 Hari</strong></td>
                        <td class="py-3"><span class="badge bg-secondary-subtle text-secondary border">Weekly Backlog Review</span></td>
                        <td class="py-3">
                            <div class="d-flex align-items-center gap-2">
                                <strong class="text-dark font-monospace">100.0%</strong>
                                <div class="progress flex-grow-1" style="height: 5px; width: 70px;">
                                    <div class="progress-bar bg-success" style="width: 100%;"></div>
                                </div>
                            </div>
                        </td>
                        <td class="pe-4 py-3 text-end">
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 fw-semibold"><i class="fa-solid fa-circle-check me-1"></i>Compliant</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Section: Project-Level SLA Compliance Matrix (All 5 Projects) -->
    <div class="card border-0 shadow-sm rounded-4 bg-white mb-4 overflow-hidden">
        <div class="card-header bg-white border-bottom p-3 d-flex flex-wrap align-items-center justify-content-between gap-2">
            <div class="d-flex align-items-center gap-2">
                <span class="p-2 bg-success-subtle text-success rounded-3"><i class="fa-solid fa-chart-line fs-6"></i></span>
                <div>
                    <h5 class="h6 fw-bold mb-0 text-dark">Multi-Project SLA Health Matrix</h5>
                    <span class="fs-8 text-muted">Tingkat kepatuhan SLA dan rasio task aman/terancam untuk semua 5 project aktif.</span>
                </div>
            </div>
            <span class="badge bg-light text-muted border fs-8">5 Active Projects Monitored</span>
        </div>
        <div class="p-3">
            <div class="row g-3" id="slaProjectCardsGrid">
                <!-- Dynamic Project SLA Health Cards rendered by JS -->
            </div>
        </div>
    </div>

    <!-- Section: Real-Time Task-Level SLA Board & Live Table -->
    <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden mb-4">
        <!-- Toolbar Filter Header -->
        <div class="card-header bg-white border-bottom p-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <h5 class="h6 fw-bold mb-0 text-dark"><i class="fa-solid fa-list-check text-primary me-1.5"></i> Task-Level SLA Live Tracking</h5>
                <span class="badge bg-light text-muted border fs-8" id="slaTaskTotalCountBadge">0 Total Tasks</span>
            </div>

            <!-- Filters -->
            <div class="d-flex flex-wrap align-items-center gap-2">
                <!-- Search -->
                <div class="input-group input-group-sm" style="min-width: 220px;">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass fs-8"></i></span>
                    <input type="text" class="form-control border-start-0 fs-8" id="slaTaskSearchInput" placeholder="Cari task, assignee, project...">
                </div>

                <!-- Project Filter -->
                <select class="form-select form-select-sm fs-8 w-auto" id="slaTaskProjectFilter">
                    <option value="all">Semua Project</option>
                    <option value="Middleware Project">Middleware Project</option>
                    <option value="Mobile CRM Application">Mobile CRM Application</option>
                    <option value="Landing Page Campaign">Landing Page Campaign</option>
                    <option value="Company Website">Company Website</option>
                    <option value="Internal Analytics Tool">Internal Analytics Tool</option>
                </select>

                <!-- SLA Status Filter -->
                <select class="form-select form-select-sm fs-8 w-auto" id="slaTaskStatusFilter">
                    <option value="all">Semua Status SLA</option>
                    <option value="breached">🚨 Breached / Overdue</option>
                    <option value="at-risk">⚠️ At Risk (&lt; 24h)</option>
                    <option value="on-track">✅ On Track</option>
                    <option value="resolved">🏁 Resolved Within SLA</option>
                </select>

                <!-- Priority Filter -->
                <select class="form-select form-select-sm fs-8 w-auto" id="slaTaskPriorityFilter">
                    <option value="all">Semua Prioritas</option>
                    <option value="urgent">P1 - Critical / Urgent</option>
                    <option value="high">P2 - High Priority</option>
                    <option value="medium">P3 - Medium</option>
                    <option value="normal">P4 - Low / Normal</option>
                </select>
            </div>
        </div>

        <!-- Table View -->
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                    <tr>
                        <th class="ps-4 py-3" style="min-width: 280px;">Task & Project</th>
                        <th class="py-3" style="width: 120px;">Prioritas Tier</th>
                        <th class="py-3" style="width: 150px;">Assignee</th>
                        <th class="py-3" style="width: 200px;">Target Tenggat SLA</th>
                        <th class="py-3" style="width: 180px;">Sisa Waktu / Countdown</th>
                        <th class="py-3" style="width: 140px;">Status SLA</th>
                        <th class="pe-4 py-3 text-end" style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="fs-7" id="slaTasksTableBody">
                    <!-- Dynamic SLA Task Rows rendered by JS -->
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- =========================================================================== -->
<!-- MODALS SECTION                                                              -->
<!-- =========================================================================== -->

<!-- 1. Modal: Configure SLA Policies -->
<div class="modal fade" id="configureSlaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg p-3">
            <div class="modal-header border-bottom pb-3">
                <div class="d-flex align-items-center gap-2.5">
                    <div class="p-2.5 bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px;">
                        <i class="fa-solid fa-sliders fs-5"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0">Configure SLA Policies & Thresholds</h5>
                        <span class="fs-8 text-muted">Sesuaikan target waktu respon dan batas durasi penyelesaian untuk setiap level prioritas.</span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formConfigureSla">
                <div class="modal-body py-3">
                    <div class="mb-3">
                        <label class="form-label fs-7 fw-semibold text-dark">Scope Penerapan Kebijakan</label>
                        <select class="form-select fs-7" id="cfgSlaScope">
                            <option value="global" selected>Global (Semua Project dalam Workspace)</option>
                            <option value="Middleware Project">Khusus Middleware Project</option>
                            <option value="Mobile CRM Application">Khusus Mobile CRM Application</option>
                            <option value="Landing Page Campaign">Khusus Landing Page Campaign</option>
                            <option value="Company Website">Khusus Company Website</option>
                            <option value="Internal Analytics Tool">Khusus Internal Analytics Tool</option>
                        </select>
                    </div>

                    <h6 class="fs-8 fw-bold text-uppercase text-muted mb-2 mt-3"><i class="fa-solid fa-clock me-1 text-primary"></i> Target Resolution Hours (MTTR)</h6>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-6 col-md-3">
                            <label class="form-label fs-8 fw-bold text-danger">P1 - Urgent (Hours)</label>
                            <input type="number" class="form-control fs-7" id="cfgP1Hours" value="24" min="1" max="168" required>
                        </div>
                        <div class="col-6 col-md-3">
                            <label class="form-label fs-8 fw-bold text-warning-emphasis">P2 - High (Hours)</label>
                            <input type="number" class="form-control fs-7" id="cfgP2Hours" value="72" min="1" max="336" required>
                        </div>
                        <div class="col-6 col-md-3">
                            <label class="form-label fs-8 fw-bold text-primary">P3 - Medium (Hours)</label>
                            <input type="number" class="form-control fs-7" id="cfgP3Hours" value="168" min="1" max="720" required>
                        </div>
                        <div class="col-6 col-md-3">
                            <label class="form-label fs-8 fw-bold text-secondary">P4 - Low (Hours)</label>
                            <input type="number" class="form-control fs-7" id="cfgP4Hours" value="336" min="1" max="1440" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fs-7 fw-semibold text-dark">At-Risk Warning Threshold (Hours Before Breach)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted"><i class="fa-solid fa-triangle-exclamation text-warning"></i></span>
                            <input type="number" class="form-control fs-7" id="cfgAtRiskHours" value="24" min="1" max="72">
                            <span class="input-group-text bg-light text-muted">Jam tersisa</span>
                        </div>
                        <span class="fs-8 text-muted mt-1 d-block">Task yang memiliki sisa waktu kurang dari nilai ini akan otomatis masuk ke status <strong>At Risk</strong>.</span>
                    </div>

                    <div class="mb-2">
                        <label class="form-label fs-7 fw-semibold text-dark">Eskalasi Webhook URL (Slack / Discord / Teams)</label>
                        <input type="url" class="form-control fs-7 font-monospace" id="cfgWebhookUrl" value="https://hooks.slack.com/services/T00/B00/SDN_SLA_ALERTS" placeholder="https://hooks.slack.com/services/...">
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary px-3.5 fs-7" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 fs-7 fw-semibold d-flex align-items-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i>
                        <span>Simpan Kebijakan SLA</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- 2. Modal: Emergency SLA Escalation -->
<div class="modal fade" id="escalateSlaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg p-3">
            <div class="modal-header border-bottom pb-3">
                <div class="d-flex align-items-center gap-2.5">
                    <div class="p-2.5 bg-danger-subtle text-danger rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px;">
                        <i class="fa-solid fa-bullhorn fs-5"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-danger mb-0">Emergency SLA Escalation</h5>
                        <span class="fs-8 text-muted">Kirimkan peringatan darurat ke seluruh Project Lead & Tim DevOps.</span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEscalateSla">
                <div class="modal-body py-3">
                    <div class="mb-3">
                        <label class="form-label fs-7 fw-semibold text-dark">Target Project *</label>
                        <select class="form-select fs-7" id="escProjectSelect" required>
                            <option value="All Projects">Semua Project (Broadcast Global)</option>
                            <option value="Middleware Project">Middleware Project (Sophia Carter)</option>
                            <option value="Mobile CRM Application" selected>Mobile CRM Application (Daniel Johnson)</option>
                            <option value="Landing Page Campaign">Landing Page Campaign (Sophia Carter)</option>
                            <option value="Company Website">Company Website (Michael Anderson)</option>
                            <option value="Internal Analytics Tool">Internal Analytics Tool (James Wilson)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fs-7 fw-semibold text-dark">Severity Level *</label>
                        <select class="form-select fs-7" id="escSeverity">
                            <option value="P1 - Critical Production Blocker">P1 - Critical Production Blocker</option>
                            <option value="P2 - High Risk SLA Breach">P2 - High Risk SLA Breach</option>
                            <option value="General Escalation">General Escalation</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fs-7 fw-semibold text-dark">Pesan & Alasan Eskalasi *</label>
                        <textarea class="form-control fs-7" id="escReason" rows="3" placeholder="Jelaskan hambatan atau alasan eskalasi darurat SLA ini..." required>Task terindikasi melewati batas toleransi SLA. Memerlukan bantuan tambahan engineer untuk unblocking.</textarea>
                    </div>

                    <div class="p-3 bg-danger-subtle rounded-3 border border-danger-subtle fs-8 text-danger">
                        <i class="fa-solid fa-triangle-exclamation me-1.5"></i>
                        Pesan akan diteruskan secara otomatis ke webhook Slack <strong>#sdn-sla-alerts</strong> dan notifikasi email ke lead project.
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary px-3.5 fs-7" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger px-4 fs-7 fw-semibold d-flex align-items-center gap-2" id="btnSubmitEscalate">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span>Kirim Eskalasi Sekarang</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- 3. Modal: SLA Detail & Audit Lifecycle -->
<div class="modal fade" id="slaDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg p-3">
            <div class="modal-header border-bottom pb-3">
                <div class="d-flex align-items-center gap-2.5">
                    <div class="p-2.5 rounded-3 d-flex align-items-center justify-content-center text-white" id="modalSlaIconBox" style="width: 44px; height: 44px; background: #3b82f6;">
                        <i class="fa-solid fa-stopwatch fs-5"></i>
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <h5 class="modal-title fw-bold text-dark mb-0" id="modalSlaTaskTitle">Task SLA Detail</h5>
                            <span class="badge" id="modalSlaStatusBadge">On Track</span>
                        </div>
                        <span class="fs-8 text-muted" id="modalSlaProjectSubtitle">Project Name</span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-3">
                <!-- Metadata Box -->
                <div class="p-3 bg-light rounded-3 mb-3 border">
                    <div class="row g-3 fs-8">
                        <div class="col-6 col-md-3">
                            <span class="text-muted d-block">Task ID:</span>
                            <strong class="text-dark font-monospace" id="modalSlaTaskId">MID-101</strong>
                        </div>
                        <div class="col-6 col-md-3">
                            <span class="text-muted d-block">Prioritas Tier:</span>
                            <span class="badge bg-danger text-white font-monospace" id="modalSlaPriority">P1 - Urgent</span>
                        </div>
                        <div class="col-6 col-md-3">
                            <span class="text-muted d-block">Assignee Lead:</span>
                            <strong class="text-dark" id="modalSlaAssignee">Sophia Carter</strong>
                        </div>
                        <div class="col-6 col-md-3">
                            <span class="text-muted d-block">Target SLA MTTR:</span>
                            <strong class="text-dark font-monospace" id="modalSlaTargetDuration">24 Jam</strong>
                        </div>
                    </div>
                </div>

                <!-- SLA Progress Gauge -->
                <div class="card p-3 border rounded-3 mb-3 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-1.5 fs-8">
                        <span class="fw-bold text-dark">SLA Consumption Elapsed:</span>
                        <span class="fw-bold text-dark font-monospace" id="modalSlaElapsedPct">65% (15h / 24h)</span>
                    </div>
                    <div class="progress mb-2" style="height: 8px;">
                        <div class="progress-bar bg-success" id="modalSlaProgressBar" style="width: 65%;"></div>
                    </div>
                    <div class="d-flex justify-content-between fs-9 text-muted">
                        <span id="modalSlaStartTime">Start: Sep 01, 2026</span>
                        <span id="modalSlaDeadlineTime" class="fw-semibold text-danger">Deadline: Sep 02, 2026</span>
                    </div>
                </div>

                <!-- SLA Lifecycle Timeline Audit -->
                <h6 class="fs-8 fw-bold text-uppercase text-muted mb-2"><i class="fa-solid fa-timeline me-1 text-primary"></i> SLA Audit Log & Event Milestones</h6>
                <div class="list-group list-group-flush border rounded-3 overflow-y-auto" style="max-height: 180px;" id="modalSlaAuditList">
                    <!-- Dynamic Milestones -->
                </div>
            </div>
            <div class="modal-footer border-top pt-2.5 d-flex align-items-center justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm px-3 fs-8" data-bs-dismiss="modal">Tutup</button>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-outline-primary btn-sm px-3 fs-8 fw-semibold" id="btnModalExtendBuffer">
                        <i class="fa-solid fa-plus me-1"></i> Minta Buffer +24h
                    </button>
                    <a href="KanbanTask.php" class="btn btn-primary btn-sm px-3 fs-8 fw-semibold" id="btnModalOpenTask">
                        Buka di Kanban <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1090;">
    <div id="slaLiveToast" class="toast align-items-center text-bg-dark border-0 rounded-3 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center gap-2 fs-7">
                <i class="fa-solid fa-circle-check text-success fs-6"></i>
                <span id="slaToastMsg">SLA operation updated successfully!</span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<?php
$extraJs = [
    $basePath . 'assets/js/sla.js'
];
include __DIR__ . '/../layouts/footer.php';
?>
