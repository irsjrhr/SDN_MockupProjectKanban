/**
 * ==============================================================================
 * SYNCBOARD - SLA (SERVICE LEVEL AGREEMENT) TRACKER & GOVERNANCE CONTROLLER
 * Location: /assets/js/sla.js
 * ==============================================================================
 * Mengelola kalkulasi real-time kepatuhan SLA untuk semua 5 project dan seluruh
 * task, live countdown timer, deteksi threshold risiko, eskalasi darurat, dan audit log.
 */

$(document).ready(function () {
    // --------------------------------------------------------------------------
    // 1. DEFAULT SLA POLICY THRESHOLDS
    // --------------------------------------------------------------------------
    const DEFAULT_SLA_POLICIES = {
        urgent: 24,   // P1: 24 Jam
        high: 72,     // P2: 72 Jam (3 Hari)
        medium: 168,  // P3: 168 Jam (7 Hari)
        normal: 336,  // P4: 336 Jam (14 Hari)
        atRiskThreshold: 24 // Jam
    };

    let slaPolicies = JSON.parse(localStorage.getItem('kanban_sla_policies')) || DEFAULT_SLA_POLICIES;

    // --------------------------------------------------------------------------
    // 2. MULTI-PROJECT DEFINITIONS
    // --------------------------------------------------------------------------
    const MASTER_PROJECTS = [
        {
            id: 'proj-middleware',
            name: 'Middleware Project',
            category: 'E-Commerce / API',
            lead: 'Sophia Carter',
            leadAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            icon: 'fa-solid fa-bag-shopping',
            badgeClass: 'badge-ecommerce',
            targetSla: 95.0
        },
        {
            id: 'proj-mobile',
            name: 'Mobile CRM Application',
            category: 'Mobile Application',
            lead: 'Daniel Johnson',
            leadAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            icon: 'fa-solid fa-mobile-screen',
            badgeClass: 'badge-company',
            targetSla: 90.0
        },
        {
            id: 'proj-landing',
            name: 'Landing Page Campaign',
            category: 'Marketing Campaign',
            lead: 'Sophia Carter',
            leadAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            icon: 'fa-solid fa-bullhorn',
            badgeClass: 'badge-landing',
            targetSla: 95.0
        },
        {
            id: 'proj-company',
            name: 'Company Website',
            category: 'Corporate Web',
            lead: 'Michael Anderson',
            leadAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            icon: 'fa-solid fa-globe',
            badgeClass: 'badge-company',
            targetSla: 90.0
        },
        {
            id: 'proj-analytics',
            name: 'Internal Analytics Tool',
            category: 'DevOps & Data',
            lead: 'James Wilson',
            leadAvatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            icon: 'fa-solid fa-chart-line',
            badgeClass: 'badge-ecommerce',
            targetSla: 95.0
        }
    ];

    // --------------------------------------------------------------------------
    // 3. MASTER TASKS SLA DATASET (ACROSS ALL PROJECTS)
    // --------------------------------------------------------------------------
    const DEFAULT_SLA_TASKS = [
        // --- 1. Middleware Project Tasks ---
        {
            id: 'MID-101',
            title: 'Setup Microservices API Gateway Router',
            project: 'Middleware Project',
            priority: 'urgent',
            priorityLabel: 'P1 - Urgent',
            assignee: 'James Wilson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-01T08:00:00',
            dueDate: '2026-09-02T08:00:00',
            status: 'completed',
            resolvedAt: '2026-09-01T22:30:00',
            bufferHours: 0
        },
        {
            id: 'MID-102',
            title: 'OAuth2 & JWT Token Authorization Module',
            project: 'Middleware Project',
            priority: 'urgent',
            priorityLabel: 'P1 - Urgent',
            assignee: 'Sophia Carter',
            assigneeAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-03T09:00:00',
            dueDate: '2026-09-04T09:00:00',
            status: 'completed',
            resolvedAt: '2026-09-04T07:15:00',
            bufferHours: 0
        },
        {
            id: 'MID-103',
            title: 'Live Telemetry & Log Ingestion Pipeline',
            project: 'Middleware Project',
            priority: 'high',
            priorityLabel: 'P2 - High',
            assignee: 'James Wilson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-29T10:00:00',
            dueDate: '2026-10-02T10:00:00',
            status: 'in-progress',
            resolvedAt: null,
            bufferHours: 0
        },
        {
            id: 'MID-104',
            title: 'Redis Cache Invalidation & Rate Limiting Engine',
            project: 'Middleware Project',
            priority: 'medium',
            priorityLabel: 'P3 - Medium',
            assignee: 'Daniel Johnson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-26T08:00:00',
            dueDate: '2026-10-03T08:00:00',
            status: 'in-progress',
            resolvedAt: null,
            bufferHours: 0
        },
        {
            id: 'MID-105',
            title: 'Production FQDN SSL & TLS 1.3 Routing Policy',
            project: 'Middleware Project',
            priority: 'high',
            priorityLabel: 'P2 - High',
            assignee: 'Sophia Carter',
            assigneeAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-30T14:00:00',
            dueDate: '2026-10-03T14:00:00',
            status: 'in-progress',
            resolvedAt: null,
            bufferHours: 0
        },
        {
            id: 'MID-106',
            title: 'E2E Stress Testing & Latency Optimization (50k req/s)',
            project: 'Middleware Project',
            priority: 'urgent',
            priorityLabel: 'P1 - Urgent',
            assignee: 'Daniel Johnson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-10-01T06:00:00',
            dueDate: '2026-10-02T06:00:00',
            status: 'in-progress',
            resolvedAt: null,
            bufferHours: 0
        },
        {
            id: 'MID-107',
            title: 'Swagger / OpenAPI 3.0 Documentation Hub',
            project: 'Middleware Project',
            priority: 'normal',
            priorityLabel: 'P4 - Low',
            assignee: 'Michael Anderson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-28T09:00:00',
            dueDate: '2026-10-12T09:00:00',
            status: 'todo',
            resolvedAt: null,
            bufferHours: 0
        },

        // --- 2. Mobile CRM Application Tasks ---
        {
            id: 'MOB-201',
            title: 'Flutter Core Engine & Bloc State Boilerplate',
            project: 'Mobile CRM Application',
            priority: 'high',
            priorityLabel: 'P2 - High',
            assignee: 'Daniel Johnson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-05T08:00:00',
            dueDate: '2026-09-08T08:00:00',
            status: 'completed',
            resolvedAt: '2026-09-08T06:00:00',
            bufferHours: 0
        },
        {
            id: 'MOB-202',
            title: 'Biometric Auth Gate (FaceID & Fingerprint)',
            project: 'Mobile CRM Application',
            priority: 'urgent',
            priorityLabel: 'P1 - Urgent',
            assignee: 'Daniel Johnson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-28T10:00:00',
            dueDate: '2026-09-29T10:00:00',
            status: 'in-progress',
            resolvedAt: null,
            bufferHours: 0 // Overdue / Breached
        },
        {
            id: 'MOB-203',
            title: 'Offline SQLite Database Synchronization Engine',
            project: 'Mobile CRM Application',
            priority: 'high',
            priorityLabel: 'P2 - High',
            assignee: 'James Wilson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-29T08:00:00',
            dueDate: '2026-10-02T08:00:00',
            status: 'in-progress',
            resolvedAt: null,
            bufferHours: 0 // At Risk (< 24h)
        },
        {
            id: 'MOB-204',
            title: 'Firebase Cloud Messaging Push Notification Hub',
            project: 'Mobile CRM Application',
            priority: 'medium',
            priorityLabel: 'P3 - Medium',
            assignee: 'Sophia Carter',
            assigneeAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-25T08:00:00',
            dueDate: '2026-10-02T08:00:00',
            status: 'todo',
            resolvedAt: null,
            bufferHours: 0 // At Risk (< 24h)
        },
        {
            id: 'MOB-205',
            title: 'GPS Geolocation & Agent Route Check-in Engine',
            project: 'Mobile CRM Application',
            priority: 'medium',
            priorityLabel: 'P3 - Medium',
            assignee: 'Daniel Johnson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-27T08:00:00',
            dueDate: '2026-10-04T08:00:00',
            status: 'todo',
            resolvedAt: null,
            bufferHours: 0
        },

        // --- 3. Landing Page Campaign Tasks ---
        {
            id: 'LND-301',
            title: 'Hero Section 3D Interactive Animation',
            project: 'Landing Page Campaign',
            priority: 'high',
            priorityLabel: 'P2 - High',
            assignee: 'Michael Anderson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-02T09:00:00',
            dueDate: '2026-09-05T09:00:00',
            status: 'completed',
            resolvedAt: '2026-09-05T08:00:00',
            bufferHours: 0
        },
        {
            id: 'LND-302',
            title: 'Lead Generation Form & Hubspot Webhook',
            project: 'Landing Page Campaign',
            priority: 'urgent',
            priorityLabel: 'P1 - Urgent',
            assignee: 'Sophia Carter',
            assigneeAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-07T10:00:00',
            dueDate: '2026-09-08T10:00:00',
            status: 'completed',
            resolvedAt: '2026-09-08T09:30:00',
            bufferHours: 0
        },
        {
            id: 'LND-303',
            title: 'Interactive Pricing Tier & ROI Calculator',
            project: 'Landing Page Campaign',
            priority: 'medium',
            priorityLabel: 'P3 - Medium',
            assignee: 'Daniel Johnson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-28T08:00:00',
            dueDate: '2026-10-05T08:00:00',
            status: 'in-progress',
            resolvedAt: null,
            bufferHours: 0
        },
        {
            id: 'LND-304',
            title: 'Google Analytics 4 & Custom Pixel Tracking',
            project: 'Landing Page Campaign',
            priority: 'medium',
            priorityLabel: 'P3 - Medium',
            assignee: 'Sophia Carter',
            assigneeAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-29T11:00:00',
            dueDate: '2026-10-06T11:00:00',
            status: 'todo',
            resolvedAt: null,
            bufferHours: 0
        },
        {
            id: 'LND-305',
            title: 'Mobile Speed & Core Web Vitals 95+ Audit',
            project: 'Landing Page Campaign',
            priority: 'high',
            priorityLabel: 'P2 - High',
            assignee: 'Michael Anderson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-30T09:00:00',
            dueDate: '2026-10-03T09:00:00',
            status: 'in-progress',
            resolvedAt: null,
            bufferHours: 0
        },

        // --- 4. Company Website Tasks ---
        {
            id: 'WEB-401',
            title: 'Corporate Header & Megamenu Architecture',
            project: 'Company Website',
            priority: 'medium',
            priorityLabel: 'P3 - Medium',
            assignee: 'Michael Anderson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-10T08:00:00',
            dueDate: '2026-09-17T08:00:00',
            status: 'completed',
            resolvedAt: '2026-09-16T15:00:00',
            bufferHours: 0
        },
        {
            id: 'WEB-402',
            title: 'Investor Relations & Financial Reports CMS',
            project: 'Company Website',
            priority: 'high',
            priorityLabel: 'P2 - High',
            assignee: 'Sophia Carter',
            assigneeAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-15T08:00:00',
            dueDate: '2026-09-18T08:00:00',
            status: 'completed',
            resolvedAt: '2026-09-18T07:30:00',
            bufferHours: 0
        },
        {
            id: 'WEB-403',
            title: 'Customer Case Studies Dynamic Grid & Filter',
            project: 'Company Website',
            priority: 'normal',
            priorityLabel: 'P4 - Low',
            assignee: 'Michael Anderson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-18T08:00:00',
            dueDate: '2026-10-02T08:00:00',
            status: 'completed',
            resolvedAt: '2026-09-26T12:00:00',
            bufferHours: 0
        },
        {
            id: 'WEB-404',
            title: 'Multi-language Localization (EN / ID / JA)',
            project: 'Company Website',
            priority: 'high',
            priorityLabel: 'P2 - High',
            assignee: 'Sophia Carter',
            assigneeAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-24T08:00:00',
            dueDate: '2026-09-27T08:00:00',
            status: 'completed',
            resolvedAt: '2026-09-27T06:00:00',
            bufferHours: 0
        },
        {
            id: 'WEB-405',
            title: 'Career Portal & Job Application Workflow',
            project: 'Company Website',
            priority: 'medium',
            priorityLabel: 'P3 - Medium',
            assignee: 'Daniel Johnson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-24T09:00:00',
            dueDate: '2026-10-01T09:00:00',
            status: 'in-progress',
            resolvedAt: null,
            bufferHours: 0 // Breached / Overdue today
        },

        // --- 5. Internal Analytics Tool Tasks ---
        {
            id: 'ANL-501',
            title: 'ClickHouse Data Pipeline & Ingestion Queue',
            project: 'Internal Analytics Tool',
            priority: 'urgent',
            priorityLabel: 'P1 - Urgent',
            assignee: 'James Wilson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-01T08:00:00',
            dueDate: '2026-09-02T08:00:00',
            status: 'completed',
            resolvedAt: '2026-09-01T20:00:00',
            bufferHours: 0
        },
        {
            id: 'ANL-502',
            title: 'Prometheus Node Exporter Metric Aggregation',
            project: 'Internal Analytics Tool',
            priority: 'high',
            priorityLabel: 'P2 - High',
            assignee: 'James Wilson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-03T08:00:00',
            dueDate: '2026-09-06T08:00:00',
            status: 'completed',
            resolvedAt: '2026-09-05T18:00:00',
            bufferHours: 0
        },
        {
            id: 'ANL-503',
            title: 'Grafana Executive KPI Dashboards & Alerts',
            project: 'Internal Analytics Tool',
            priority: 'medium',
            priorityLabel: 'P3 - Medium',
            assignee: 'Daniel Johnson',
            assigneeAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-08T08:00:00',
            dueDate: '2026-09-15T08:00:00',
            status: 'completed',
            resolvedAt: '2026-09-14T11:00:00',
            bufferHours: 0
        }
    ];

    let slaTasks = JSON.parse(localStorage.getItem('kanban_sla_tasks')) || DEFAULT_SLA_TASKS;

    // Toast Notification Helper
    function showSlaToast(msg, isSuccess = true) {
        const $toast = $('#slaLiveToast');
        if ($toast.length) {
            $('#slaToastMsg').text(msg);
            $toast.find('i').attr('class', isSuccess ? 'fa-solid fa-circle-check text-success fs-6' : 'fa-solid fa-triangle-exclamation text-warning fs-6');
            const toastBs = bootstrap.Toast.getOrCreateInstance($toast[0]);
            toastBs.show();
        }
    }

    // --------------------------------------------------------------------------
    // 4. SLA TIME CALCULATION ENGINE
    // --------------------------------------------------------------------------
    function calculateTaskSla(task) {
        const now = new Date();
        const start = new Date(task.startDate);
        const maxHours = (slaPolicies[task.priority] || 72) + (task.bufferHours || 0);
        const deadline = new Date(start.getTime() + maxHours * 3600 * 1000);

        const totalAllowedMs = maxHours * 3600 * 1000;
        let elapsedMs = 0;
        let isResolved = false;

        if (task.status === 'completed' && task.resolvedAt) {
            isResolved = true;
            elapsedMs = new Date(task.resolvedAt).getTime() - start.getTime();
        } else {
            elapsedMs = now.getTime() - start.getTime();
        }

        const remainingMs = deadline.getTime() - now.getTime();
        const remainingHours = Math.round(remainingMs / (3600 * 1000));
        const elapsedPct = Math.min(100, Math.max(0, Math.round((elapsedMs / totalAllowedMs) * 100)));

        let slaStatus = 'on-track';
        let slaBadgeHtml = '';

        if (isResolved) {
            slaStatus = 'resolved';
            slaBadgeHtml = '<span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 rounded-2 fw-semibold"><i class="fa-solid fa-circle-check me-1"></i>Resolved</span>';
        } else if (remainingMs < 0) {
            slaStatus = 'breached';
            const overdueHours = Math.abs(remainingHours);
            const overdueDays = (overdueHours / 24).toFixed(1);
            slaBadgeHtml = `<span class="badge bg-danger text-white px-2.5 py-1 rounded-2 fw-bold shadow-xs"><i class="fa-solid fa-circle-exclamation me-1"></i>Breached (-${overdueDays}d)</span>`;
        } else if (remainingHours <= slaPolicies.atRiskThreshold) {
            slaStatus = 'at-risk';
            slaBadgeHtml = `<span class="badge bg-warning text-dark px-2.5 py-1 rounded-2 fw-bold shadow-xs"><i class="fa-solid fa-clock me-1"></i>At Risk (${remainingHours}h left)</span>`;
        } else {
            slaStatus = 'on-track';
            const leftDays = (remainingHours / 24).toFixed(1);
            slaBadgeHtml = `<span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 rounded-2 fw-semibold"><i class="fa-solid fa-shield-check me-1"></i>On Track (${leftDays}d)</span>`;
        }

        return {
            maxHours,
            deadline,
            remainingHours,
            remainingMs,
            elapsedPct,
            slaStatus,
            slaBadgeHtml,
            isResolved
        };
    }

    // --------------------------------------------------------------------------
    // 5. RENDER PROJECT SLA HEALTH CARDS (SECTION 2)
    // --------------------------------------------------------------------------
    function renderProjectSlaCards() {
        const $grid = $('#slaProjectCardsGrid');
        if (!$grid.length) return;

        $grid.empty();

        MASTER_PROJECTS.forEach(proj => {
            const projTasks = slaTasks.filter(t => t.project === proj.name);
            const total = projTasks.length;
            let onTrack = 0;
            let atRisk = 0;
            let breached = 0;

            projTasks.forEach(t => {
                const calc = calculateTaskSla(t);
                if (calc.slaStatus === 'on-track' || calc.slaStatus === 'resolved') onTrack++;
                else if (calc.slaStatus === 'at-risk') atRisk++;
                else if (calc.slaStatus === 'breached') breached++;
            });

            const compliancePct = total > 0 ? (((onTrack) / total) * 100).toFixed(1) : 100;
            const isHealthy = parseFloat(compliancePct) >= proj.targetSla;

            const $card = $(`
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card border shadow-sm rounded-4 p-3 bg-white h-100 position-relative">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="badge-icon-sm ${proj.badgeClass} rounded-2 p-2 d-flex align-items-center justify-content-center text-white shadow-xs" style="width: 36px; height: 36px;">
                                    <i class="${proj.icon} fs-6"></i>
                                </span>
                                <div>
                                    <h6 class="fw-bold text-dark mb-0 fs-7">${proj.name}</h6>
                                    <span class="fs-9 text-muted">${proj.category} &bull; Lead: ${proj.lead.split(' ')[0]}</span>
                                </div>
                            </div>
                            <span class="badge ${isHealthy ? 'bg-success-subtle text-success border border-success-subtle' : 'bg-danger-subtle text-danger border border-danger-subtle'} fs-8 fw-semibold">
                                ${isHealthy ? '✅ Compliant' : '⚠️ Under Target'}
                            </span>
                        </div>

                        <!-- SLA Rate & Target -->
                        <div class="d-flex align-items-baseline justify-content-between mb-1.5 fs-8">
                            <span class="text-muted">SLA Compliance:</span>
                            <div>
                                <strong class="fs-6 ${isHealthy ? 'text-success' : 'text-danger'} font-monospace">${compliancePct}%</strong>
                                <span class="text-muted fs-9 ms-1">(Target: ${proj.targetSla}%)</span>
                            </div>
                        </div>

                        <div class="progress mb-3" style="height: 6px;">
                            <div class="progress-bar ${isHealthy ? 'bg-success' : 'bg-danger'}" style="width: ${compliancePct}%;"></div>
                        </div>

                        <!-- Mini breakdown counters -->
                        <div class="d-flex align-items-center justify-content-between p-2 bg-light rounded-3 fs-8 text-center mb-3 border">
                            <div>
                                <span class="text-muted d-block fs-9">Total Tasks</span>
                                <strong class="text-dark">${total}</strong>
                            </div>
                            <div class="border-start ps-2">
                                <span class="text-success d-block fs-9">On Track</span>
                                <strong class="text-success">${onTrack}</strong>
                            </div>
                            <div class="border-start ps-2">
                                <span class="text-warning-emphasis d-block fs-9">At Risk</span>
                                <strong class="text-warning-emphasis">${atRisk}</strong>
                            </div>
                            <div class="border-start ps-2">
                                <span class="text-danger d-block fs-9">Breached</span>
                                <strong class="text-danger">${breached}</strong>
                            </div>
                        </div>

                        <!-- Footer Action -->
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                            <button class="btn btn-xs btn-outline-secondary rounded-pill px-2.5 py-1 fs-8 btn-filter-proj-tasks" data-project="${proj.name}">
                                <i class="fa-solid fa-list-check me-1"></i> Filter Tasks
                            </button>
                            <a href="KanbanTask.php" class="text-primary fs-8 text-decoration-none fw-semibold">
                                Open Board <i class="fa-solid fa-arrow-right fs-9"></i>
                            </a>
                        </div>
                    </div>
                </div>
            `);

            $grid.append($card);
        });
    }

    // --------------------------------------------------------------------------
    // 6. RENDER TASK-LEVEL SLA TABLE (SECTION 3)
    // --------------------------------------------------------------------------
    function renderSlaTasksTable() {
        const $tbody = $('#slaTasksTableBody');
        if (!$tbody.length) return;

        $tbody.empty();

        const searchQuery = ($('#slaTaskSearchInput').val() || '').toLowerCase().trim();
        const projectFilter = $('#slaTaskProjectFilter').val() || 'all';
        const statusFilter = $('#slaTaskStatusFilter').val() || 'all';
        const priorityFilter = $('#slaTaskPriorityFilter').val() || 'all';

        const filteredTasks = slaTasks.filter(task => {
            const calc = calculateTaskSla(task);

            const matchesSearch = !searchQuery ||
                task.title.toLowerCase().includes(searchQuery) ||
                task.id.toLowerCase().includes(searchQuery) ||
                task.project.toLowerCase().includes(searchQuery) ||
                task.assignee.toLowerCase().includes(searchQuery);

            const matchesProject = projectFilter === 'all' || task.project === projectFilter;
            const matchesStatus = statusFilter === 'all' || calc.slaStatus === statusFilter;
            const matchesPriority = priorityFilter === 'all' || task.priority === priorityFilter;

            return matchesSearch && matchesProject && matchesStatus && matchesPriority;
        });

        $('#slaTaskTotalCountBadge').text(`${filteredTasks.length} Total Tasks`);

        // Update Master Metrics
        let totalAll = slaTasks.length;
        let countOnTrack = 0;
        let countAtRisk = 0;
        let countBreached = 0;

        slaTasks.forEach(t => {
            const c = calculateTaskSla(t);
            if (c.slaStatus === 'on-track' || c.slaStatus === 'resolved') countOnTrack++;
            else if (c.slaStatus === 'at-risk') countAtRisk++;
            else if (c.slaStatus === 'breached') countBreached++;
        });

        const overallPct = totalAll > 0 ? (((countOnTrack) / totalAll) * 100).toFixed(1) : 100;
        $('#metricOverallCompliance').text(`${overallPct}%`);
        $('#metricComplianceBar').css('width', `${overallPct}%`);
        $('#metricBreachedCount').text(`${countBreached} Tasks`);
        $('#metricAtRiskCount').text(`${countAtRisk} Tasks`);

        if (filteredTasks.length === 0) {
            $tbody.html(`
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <i class="fa-solid fa-shield-check fs-1 text-muted opacity-50 mb-2"></i>
                            <span class="fw-semibold text-dark fs-7">Tidak ada task yang cocok dengan filter SLA</span>
                            <span class="fs-8 text-muted mt-1">Coba sesuaikan kata kunci pencarian atau reset filter prioritas</span>
                        </div>
                    </td>
                </tr>
            `);
            return;
        }

        filteredTasks.forEach(task => {
            const calc = calculateTaskSla(task);
            const priorityBadge = task.priority === 'urgent'
                ? '<span class="badge bg-danger text-white font-monospace">P1 - Urgent</span>'
                : task.priority === 'high'
                ? '<span class="badge bg-warning-subtle text-warning-emphasis font-monospace border border-warning-subtle">P2 - High</span>'
                : task.priority === 'medium'
                ? '<span class="badge bg-primary-subtle text-primary font-monospace border border-primary-subtle">P3 - Med</span>'
                : '<span class="badge bg-secondary-subtle text-secondary font-monospace border">P4 - Low</span>';

            const deadlineFormatted = new Date(calc.deadline).toLocaleString('id-ID', {
                dateStyle: 'medium',
                timeStyle: 'short'
            });

            const $tr = $(`
                <tr>
                    <!-- Task & Project -->
                    <td class="ps-4 py-3">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-light text-dark border font-monospace fs-8">${task.id}</span>
                                <a href="javascript:void(0)" class="fw-bold text-dark fs-7 text-decoration-none btn-sla-detail-trigger" data-task-id="${task.id}">
                                    ${task.title}
                                </a>
                            </div>
                            <span class="fs-9 text-muted mt-0.5">
                                <i class="fa-solid fa-folder-tree text-primary me-1"></i> ${task.project}
                            </span>
                        </div>
                    </td>

                    <!-- Priority -->
                    <td class="py-3">
                        ${priorityBadge}
                    </td>

                    <!-- Assignee -->
                    <td class="py-3">
                        <div class="d-flex align-items-center gap-2">
                            <img src="${task.assigneeAvatar}" class="avatar-xs rounded-circle border" alt="${task.assignee}" style="width: 28px; height: 28px;">
                            <span class="fs-8 fw-semibold text-dark text-truncate" style="max-width: 110px;">${task.assignee.split(' ')[0]}</span>
                        </div>
                    </td>

                    <!-- Target Deadline -->
                    <td class="py-3">
                        <span class="fs-8 text-dark font-monospace d-block">${deadlineFormatted}</span>
                        <span class="fs-9 text-muted">SLA limit: ${calc.maxHours}h ${task.bufferHours > 0 ? `(+${task.bufferHours}h buffer)` : ''}</span>
                    </td>

                    <!-- Remaining / Countdown Progress -->
                    <td class="py-3">
                        <div class="d-flex align-items-center justify-content-between fs-9 mb-1">
                            <span class="text-muted">Elapsed:</span>
                            <span class="fw-bold text-dark font-monospace">${calc.elapsedPct}%</span>
                        </div>
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar ${calc.slaStatus === 'breached' ? 'bg-danger' : calc.slaStatus === 'at-risk' ? 'bg-warning' : 'bg-success'}" style="width: ${calc.elapsedPct}%;"></div>
                        </div>
                    </td>

                    <!-- SLA Status -->
                    <td class="py-3">
                        ${calc.slaBadgeHtml}
                    </td>

                    <!-- Actions -->
                    <td class="pe-4 py-3 text-end">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-light border btn-sla-detail-trigger" data-task-id="${task.id}" title="Lihat Audit SLA">
                                <i class="fa-solid fa-clock-rotate-left text-primary fs-8"></i>
                            </button>
                            <button class="btn btn-light border btn-extend-buffer-trigger" data-task-id="${task.id}" title="Tambah Buffer +24h">
                                <i class="fa-solid fa-plus text-success fs-8"></i>
                            </button>
                            <button class="btn btn-light border btn-escalate-task-trigger" data-task-id="${task.id}" title="Eskalasi Darurat">
                                <i class="fa-solid fa-bullhorn text-danger fs-8"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `);

            $tbody.append($tr);
        });
    }

    // --------------------------------------------------------------------------
    // 7. EVENT HANDLERS & FILTERS
    // --------------------------------------------------------------------------
    $('#slaTaskSearchInput').on('input', renderSlaTasksTable);
    $('#slaTaskProjectFilter, #slaTaskStatusFilter, #slaTaskPriorityFilter').on('change', renderSlaTasksTable);

    $(document).on('click', '.btn-filter-proj-tasks', function () {
        const proj = $(this).data('project');
        $('#slaTaskProjectFilter').val(proj).trigger('change');
        $('html, body').animate({
            scrollTop: $('#slaTasksTableBody').offset().top - 200
        }, 300);
    });

    // Configure SLA Form Submit
    $('#formConfigureSla').on('submit', function (e) {
        e.preventDefault();
        slaPolicies.urgent = parseInt($('#cfgP1Hours').val(), 10) || 24;
        slaPolicies.high = parseInt($('#cfgP2Hours').val(), 10) || 72;
        slaPolicies.medium = parseInt($('#cfgP3Hours').val(), 10) || 168;
        slaPolicies.normal = parseInt($('#cfgP4Hours').val(), 10) || 336;
        slaPolicies.atRiskThreshold = parseInt($('#cfgAtRiskHours').val(), 10) || 24;

        localStorage.setItem('kanban_sla_policies', JSON.stringify(slaPolicies));

        const modalBs = bootstrap.Modal.getInstance(document.getElementById('configureSlaModal'));
        if (modalBs) modalBs.hide();

        renderProjectSlaCards();
        renderSlaTasksTable();
        showSlaToast('Kebijakan batas SLA dan threshold berhasil diperbarui!');
    });

    // Escalate SLA Form Submit
    $('#formEscalateSla').on('submit', function (e) {
        e.preventDefault();
        const project = $('#escProjectSelect').val();
        const severity = $('#escSeverity').val();
        const reason = $('#escReason').val();

        const modalBs = bootstrap.Modal.getInstance(document.getElementById('escalateSlaModal'));
        if (modalBs) modalBs.hide();

        showSlaToast(`Peringatan darurat (${severity}) berhasil disiarkan ke tim ${project}!`);
    });

    // Task SLA Detail Trigger
    $(document).on('click', '.btn-sla-detail-trigger', function (e) {
        e.preventDefault();
        const taskId = $(this).data('task-id');
        const task = slaTasks.find(t => t.id === taskId);
        if (!task) return;

        const calc = calculateTaskSla(task);

        $('#modalSlaTaskId').text(task.id);
        $('#modalSlaTaskTitle').text(task.title);
        $('#modalSlaProjectSubtitle').html(`<i class="fa-solid fa-folder-tree text-primary me-1"></i> ${task.project}`);
        $('#modalSlaPriority').text(task.priorityLabel);
        $('#modalSlaAssignee').text(task.assignee);
        $('#modalSlaTargetDuration').text(`${calc.maxHours} Jam`);
        $('#modalSlaStatusBadge').replaceWith(calc.slaBadgeHtml);

        $('#modalSlaElapsedPct').text(`${calc.elapsedPct}% Consumption`);
        $('#modalSlaProgressBar').css('width', `${calc.elapsedPct}%`).attr('class', `progress-bar ${calc.slaStatus === 'breached' ? 'bg-danger' : calc.slaStatus === 'at-risk' ? 'bg-warning' : 'bg-success'}`);
        $('#modalSlaStartTime').text(`Start: ${new Date(task.startDate).toLocaleDateString('id-ID')}`);
        $('#modalSlaDeadlineTime').text(`Deadline: ${new Date(calc.deadline).toLocaleDateString('id-ID')}`);

        // Milestone logs
        const $auditList = $('#modalSlaAuditList').empty();
        $auditList.append(`
            <div class="list-group-item d-flex align-items-center justify-content-between p-2.5 fs-8">
                <div>
                    <strong class="text-dark d-block"><i class="fa-solid fa-circle-play text-primary me-1"></i> Task Created & SLA Clock Started</strong>
                    <span class="text-muted fs-9">${new Date(task.startDate).toLocaleString('id-ID')} &bull; Baseline: ${calc.maxHours}h MTTR</span>
                </div>
                <span class="badge bg-light text-dark border">Clock Started</span>
            </div>
        `);

        if (task.bufferHours > 0) {
            $auditList.append(`
                <div class="list-group-item d-flex align-items-center justify-content-between p-2.5 fs-8 bg-warning-subtle">
                    <div>
                        <strong class="text-warning-emphasis d-block"><i class="fa-solid fa-clock-rotate-left me-1"></i> Buffer Extension Approved (+${task.bufferHours}h)</strong>
                        <span class="text-muted fs-9">Extended by Project Lead for blocker resolution</span>
                    </div>
                    <span class="badge bg-warning text-dark">+${task.bufferHours}h Buffer</span>
                </div>
            `);
        }

        if (task.status === 'completed' && task.resolvedAt) {
            $auditList.append(`
                <div class="list-group-item d-flex align-items-center justify-content-between p-2.5 fs-8 bg-success-subtle">
                    <div>
                        <strong class="text-success d-block"><i class="fa-solid fa-circle-check me-1"></i> Task Resolved & SLA Clock Stopped</strong>
                        <span class="text-muted fs-9">${new Date(task.resolvedAt).toLocaleString('id-ID')} &bull; Status: Target Met</span>
                    </div>
                    <span class="badge bg-success text-white">SLA Compliant</span>
                </div>
            `);
        } else if (calc.slaStatus === 'breached') {
            $auditList.append(`
                <div class="list-group-item d-flex align-items-center justify-content-between p-2.5 fs-8 bg-danger-subtle">
                    <div>
                        <strong class="text-danger d-block"><i class="fa-solid fa-circle-exclamation me-1"></i> SLA Threshold Breached</strong>
                        <span class="text-muted fs-9">Deadline exceeded on ${new Date(calc.deadline).toLocaleString('id-ID')}</span>
                    </div>
                    <span class="badge bg-danger text-white">Breach Alert</span>
                </div>
            `);
        }

        // Action Extend Buffer in Modal
        $('#btnModalExtendBuffer').off('click').on('click', function () {
            task.bufferHours = (task.bufferHours || 0) + 24;
            localStorage.setItem('kanban_sla_tasks', JSON.stringify(slaTasks));
            renderSlaTasksTable();
            renderProjectSlaCards();
            showSlaToast(`Buffer SLA untuk task ${task.id} berhasil ditambahkan +24 Jam.`);
            const detailModal = bootstrap.Modal.getInstance(document.getElementById('slaDetailModal'));
            if (detailModal) detailModal.hide();
        });

        const detailModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('slaDetailModal'));
        detailModal.show();
    });

    // Quick Action: Extend Buffer from Table Row
    $(document).on('click', '.btn-extend-buffer-trigger', function (e) {
        e.preventDefault();
        const taskId = $(this).data('task-id');
        const task = slaTasks.find(t => t.id === taskId);
        if (task) {
            task.bufferHours = (task.bufferHours || 0) + 24;
            localStorage.setItem('kanban_sla_tasks', JSON.stringify(slaTasks));
            renderSlaTasksTable();
            renderProjectSlaCards();
            showSlaToast(`Buffer SLA +24h berhasil ditambahkan ke task ${task.id}.`);
        }
    });

    // Quick Action: Escalate Single Task
    $(document).on('click', '.btn-escalate-task-trigger', function (e) {
        e.preventDefault();
        const taskId = $(this).data('task-id');
        const task = slaTasks.find(t => t.id === taskId);
        if (task) {
            $('#escProjectSelect').val(task.project);
            $('#escReason').val(`Eskalasi darurat untuk Task ${task.id}: ${task.title}. SLA berisiko terlampaui.`);
            const modalBs = bootstrap.Modal.getOrCreateInstance(document.getElementById('escalateSlaModal'));
            modalBs.show();
        }
    });

    // Export SLA Report
    $('#btnExportSlaReport').on('click', function () {
        let csvContent = "data:text/csv;charset=utf-8,";
        csvContent += "Task ID,Task Title,Project,Priority,Assignee,Start Date,Deadline,Status,SLA Status,Elapsed %\n";

        slaTasks.forEach(t => {
            const calc = calculateTaskSla(t);
            csvContent += `"${t.id}","${t.title}","${t.project}","${t.priorityLabel}","${t.assignee}","${t.startDate}","${calc.deadline.toISOString()}","${t.status}","${calc.slaStatus}","${calc.elapsedPct}%"\n`;
        });

        const encodedUri = encodeURI(csvContent);
        const link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", `Syncboard_SLA_Report_${new Date().toISOString().split('T')[0]}.csv`);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        showSlaToast('Laporan kepatuhan SLA berhasil diexport ke CSV!');
    });

    // Initial Renders
    renderProjectSlaCards();
    renderSlaTasksTable();

    // Auto-refresh countdown every 60 seconds
    setInterval(() => {
        renderSlaTasksTable();
    }, 60000);
});
