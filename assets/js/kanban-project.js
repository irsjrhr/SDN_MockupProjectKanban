/**
 * ==============================================================================
 * MASTER PROJECT KANBAN, CALENDAR TIMELINE & TASK BREAKDOWN SCRIPT
 * Location: /assets/js/kanban-project.js
 * ==============================================================================
 */

$(document).ready(function () {
    const DEFAULT_PROJECTS = [
        {
            id: 'proj-middleware',
            title: 'Middleware Project',
            domain: 'api.sdn-middleware.internal',
            description: 'Syncboard core RESTful API architecture, authorization gate, and enterprise microservices.',
            category: 'E-Commerce / API',
            badgeClass: 'badge-ecommerce',
            icon: 'fa-solid fa-bag-shopping',
            status: 'in-progress',
            progress: 65,
            totalTasks: 8,
            doneTasks: 4,
            priority: 'High',
            priorityClass: 'bg-danger-subtle text-danger',
            lead: 'Sophia Carter',
            members: [
                'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
                'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
                'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80'
            ],
            startDate: '2026-09-05',
            dueDate: '2026-11-15',
            url: 'KanbanTask.php',
            tasks: [
                { id: 'MID-101', title: 'Setup Microservices API Gateway Router', desc: 'Reverse proxy, circuit breaker, and dynamic request routing.', status: 'completed', priority: 'High', assignee: 'James Wilson', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80', est: '16h', due: 'Sep 10, 2026', progress: 100 },
                { id: 'MID-102', title: 'OAuth2 & JWT Token Authorization Module', desc: 'Secure RBAC token signing and refresh token rotation.', status: 'completed', priority: 'Urgent', assignee: 'Sophia Carter', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', est: '24h', due: 'Sep 15, 2026', progress: 100 },
                { id: 'MID-103', title: 'Live Telemetry & Log Ingestion Pipeline', desc: 'High-throughput stream processing for metrics & audit logs.', status: 'in-progress', priority: 'High', assignee: 'James Wilson', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80', est: '32h', due: 'Oct 12, 2026', progress: 70 },
                { id: 'MID-104', title: 'Redis Cache Invalidation & Rate Limiting Engine', desc: 'Sliding window rate limit and distributed session store.', status: 'in-progress', priority: 'Medium', assignee: 'Daniel Johnson', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80', est: '18h', due: 'Oct 20, 2026', progress: 60 },
                { id: 'MID-105', title: 'Production FQDN SSL & TLS 1.3 Routing Policy', desc: 'Automated certificate renewal and Let\'s Encrypt resolver.', status: 'review', priority: 'High', assignee: 'Sophia Carter', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', est: '12h', due: 'Oct 25, 2026', progress: 90 },
                { id: 'MID-106', title: 'E2E Stress Testing & Latency Optimization', desc: 'Benchmark under 50,000 req/sec load with k6 suite.', status: 'review', priority: 'Urgent', assignee: 'Daniel Johnson', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80', est: '14h', due: 'Oct 28, 2026', progress: 85 },
                { id: 'MID-107', title: 'Swagger / OpenAPI 3.0 Documentation Hub', desc: 'Automated schema generator for developer integrations.', status: 'todo', priority: 'Normal', assignee: 'Michael Anderson', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80', est: '10h', due: 'Nov 05, 2026', progress: 0 },
                { id: 'MID-108', title: 'Distributed Tracing Integration (OpenTelemetry)', desc: 'Trace context propagation across all downstream nodes.', status: 'todo', priority: 'Medium', assignee: 'James Wilson', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80', est: '20h', due: 'Nov 15, 2026', progress: 0 }
            ]
        },
        {
            id: 'proj-mobile',
            title: 'Mobile CRM Application',
            domain: 'api-mobile.enterprise.internal',
            description: 'Native Flutter mobile app for field agents with offline database sync and biometric authentication.',
            category: 'Mobile Application',
            badgeClass: 'badge-company',
            icon: 'fa-solid fa-mobile-screen',
            status: 'todo',
            progress: 25,
            totalTasks: 6,
            doneTasks: 1,
            priority: 'High',
            priorityClass: 'bg-danger-subtle text-danger',
            lead: 'Daniel Johnson',
            members: [
                'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
                'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80'
            ],
            startDate: '2026-09-01',
            dueDate: '2027-01-15',
            url: 'KanbanTask.php?project=mobile',
            tasks: [
                { id: 'MOB-201', title: 'Flutter Core Engine & Bloc State Boilerplate', desc: 'Initialize state architecture and base routing framework.', status: 'completed', priority: 'High', assignee: 'Daniel Johnson', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80', est: '20h', due: 'Sep 10, 2026', progress: 100 },
                { id: 'MOB-202', title: 'Biometric Auth Gate (FaceID & Fingerprint)', desc: 'Integrate native local auth security for agent access.', status: 'in-progress', priority: 'Urgent', assignee: 'Daniel Johnson', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80', est: '28h', due: 'Oct 05, 2026', progress: 50 },
                { id: 'MOB-203', title: 'Offline SQLite Database Synchronization Engine', desc: 'Background queue & delta sync with cloud backend.', status: 'todo', priority: 'High', assignee: 'James Wilson', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80', est: '35h', due: 'Nov 12, 2026', progress: 0 },
                { id: 'MOB-204', title: 'Firebase Cloud Messaging Push Notification Hub', desc: 'Targeted alerts for field assignment updates.', status: 'todo', priority: 'Medium', assignee: 'Sophia Carter', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', est: '15h', due: 'Dec 01, 2026', progress: 0 },
                { id: 'MOB-205', title: 'GPS Geolocation & Agent Route Check-in', desc: 'Real-time location audit and geofencing verification.', status: 'todo', priority: 'Medium', assignee: 'Daniel Johnson', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80', est: '18h', due: 'Dec 20, 2026', progress: 0 },
                { id: 'MOB-206', title: 'Design System & Dark Theme Implementation', desc: 'Enterprise component library and accessible palette.', status: 'review', priority: 'Normal', assignee: 'Michael Anderson', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80', est: '12h', due: 'Oct 18, 2026', progress: 85 }
            ]
        },
        {
            id: 'proj-landing',
            title: 'Landing Page Campaign',
            domain: 'promo.campaign.io',
            description: 'Q4 Product launch promotional landing page with high-conversion lead capture and analytics tracking.',
            category: 'Marketing Campaign',
            badgeClass: 'badge-landing',
            icon: 'fa-solid fa-bullhorn',
            status: 'in-progress',
            progress: 40,
            totalTasks: 5,
            doneTasks: 2,
            priority: 'Medium',
            priorityClass: 'bg-warning-subtle text-warning',
            lead: 'Sophia Carter',
            members: [
                'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
                'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80'
            ],
            startDate: '2026-09-01',
            dueDate: '2026-09-20',
            url: 'KanbanTask.php?project=landing',
            tasks: [
                { id: 'LND-301', title: 'Hero Section 3D Interactive Animation', desc: 'ThreeJS dynamic graphic with responsive viewport layout.', status: 'completed', priority: 'High', assignee: 'Michael Anderson', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80', est: '16h', due: 'Sep 05, 2026', progress: 100 },
                { id: 'LND-302', title: 'Lead Generation Form & Hubspot Webhook', desc: 'Secure token validation & automated CRM lead routing.', status: 'completed', priority: 'Urgent', assignee: 'Sophia Carter', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', est: '14h', due: 'Sep 09, 2026', progress: 100 },
                { id: 'LND-303', title: 'Interactive Pricing Tier & ROI Calculator', desc: 'Client-side simulation slider with customized discount tiers.', status: 'in-progress', priority: 'Medium', assignee: 'Daniel Johnson', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80', est: '12h', due: 'Sep 15, 2026', progress: 60 },
                { id: 'LND-304', title: 'Google Analytics 4 & Custom Pixel Tracking', desc: 'UTM parameter attribution and conversion goals setup.', status: 'todo', priority: 'Medium', assignee: 'Sophia Carter', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', est: '8h', due: 'Sep 18, 2026', progress: 0 },
                { id: 'LND-305', title: 'Mobile Speed & Core Web Vitals 95+ Audit', desc: 'Image compression, critical CSS, and CDN edge caching.', status: 'review', priority: 'High', assignee: 'Michael Anderson', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80', est: '10h', due: 'Sep 20, 2026', progress: 85 }
            ]
        },
        {
            id: 'proj-company',
            title: 'Company Website',
            domain: 'company.org',
            description: 'Corporate redesign, shareholder and investor relations portal, case studies, and blog CMS.',
            category: 'Corporate Web',
            badgeClass: 'badge-company',
            icon: 'fa-solid fa-globe',
            status: 'review',
            progress: 90,
            totalTasks: 6,
            doneTasks: 5,
            priority: 'Medium',
            priorityClass: 'bg-warning-subtle text-warning',
            lead: 'Michael Anderson',
            members: [
                'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=80&q=80',
                'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80'
            ],
            startDate: '2026-09-08',
            dueDate: '2026-10-30',
            url: 'KanbanTask.php?project=company',
            tasks: [
                { id: 'WEB-401', title: 'Corporate Header & Megamenu Architecture', desc: 'Accessible desktop navigation and mobile offcanvas drawer.', status: 'completed', priority: 'Medium', assignee: 'Michael Anderson', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80', est: '14h', due: 'Sep 15, 2026', progress: 100 },
                { id: 'WEB-402', title: 'Investor Relations & Financial Reports CMS', desc: 'Downloadable PDF reports and SEC filing data lake.', status: 'completed', priority: 'High', assignee: 'Sophia Carter', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', est: '22h', due: 'Sep 22, 2026', progress: 100 },
                { id: 'WEB-403', title: 'Customer Case Studies Dynamic Grid & Filter', desc: 'Industry tags, client ROI testimonials, and video embeds.', status: 'completed', priority: 'Normal', assignee: 'Michael Anderson', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80', est: '16h', due: 'Sep 28, 2026', progress: 100 },
                { id: 'WEB-404', title: 'Multi-language Localization (EN / ID / JA)', desc: 'i18n translation strings and RTL stylesheet support.', status: 'completed', priority: 'High', assignee: 'Sophia Carter', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', est: '24h', due: 'Oct 08, 2026', progress: 100 },
                { id: 'WEB-405', title: 'Career Portal & Job Application Workflow', desc: 'Resume parsing integration and candidate submission pipeline.', status: 'review', priority: 'Medium', assignee: 'Daniel Johnson', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80', est: '18h', due: 'Oct 25, 2026', progress: 90 },
                { id: 'WEB-406', title: 'Structured Data & Schema.org Rich Snippets', desc: 'Organization, Breadcrumbs, and Article SEO tags.', status: 'completed', priority: 'Normal', assignee: 'Michael Anderson', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80', est: '8h', due: 'Oct 15, 2026', progress: 100 }
            ]
        },
        {
            id: 'proj-analytics',
            title: 'Internal Analytics Tool',
            domain: 'telemetry-hub.internal',
            description: 'Real-time telemetry and data lake visualization dashboard for engineering operations.',
            category: 'DevOps & Data',
            badgeClass: 'badge-ecommerce',
            icon: 'fa-solid fa-chart-line',
            status: 'completed',
            progress: 100,
            totalTasks: 4,
            doneTasks: 4,
            priority: 'Normal',
            priorityClass: 'bg-success-subtle text-success',
            lead: 'James Wilson',
            members: [
                'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
                'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80'
            ],
            startDate: '2026-09-01',
            dueDate: '2026-09-25',
            url: 'KanbanTask.php?project=analytics',
            tasks: [
                { id: 'DAT-501', title: 'ClickHouse Data Lake Ingestion Connector', desc: 'High volume append pipeline with distributed partitioning.', status: 'completed', priority: 'High', assignee: 'James Wilson', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80', est: '30h', due: 'Sep 10, 2026', progress: 100 },
                { id: 'DAT-502', title: 'WebSocket Real-Time Latency & Query Monitor', desc: 'Sub-second streaming metrics to frontend dashboard.', status: 'completed', priority: 'Urgent', assignee: 'James Wilson', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80', est: '24h', due: 'Sep 16, 2026', progress: 100 },
                { id: 'DAT-503', title: 'RBAC Permission Gate & Audit Log Stream', desc: 'Granular table access control and SOC2 compliance.', status: 'completed', priority: 'Medium', assignee: 'Sophia Carter', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', est: '16h', due: 'Sep 20, 2026', progress: 100 },
                { id: 'DAT-504', title: 'Automated CSV & Executive PDF Report Digest', desc: 'Weekly cron digest dispatching to Slack & email.', status: 'completed', priority: 'Normal', assignee: 'Daniel Johnson', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80', est: '12h', due: 'Sep 25, 2026', progress: 100 }
            ]
        }
    ];

    let MASTER_PROJECTS = JSON.parse(JSON.stringify(DEFAULT_PROJECTS));
    let currentActiveBreakdownProjId = null;

    function showProjectToast(msg) {
        $('#projectToastMsg').text(msg);
        const toastEl = document.getElementById('projectLiveToast');
        if (toastEl) {
            const toast = bootstrap.Toast.getOrCreateInstance(toastEl);
            toast.show();
        }
    }

    function calculateDays(startStr, dueStr) {
        try {
            const s = new Date(startStr);
            const d = new Date(dueStr);
            const diffTime = d - s;
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
            return diffDays > 0 ? diffDays : 1;
        } catch (e) {
            return 1;
        }
    }

    function formatShortDate(dateStr) {
        if (!dateStr) return '';
        const d = new Date(dateStr);
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        return `${months[d.getMonth()]} ${String(d.getDate()).padStart(2, '0')}`;
    }

    /* -------------------------------------------------------------------------- */
    /* 1. TOP VIEW TABS SWITCHER (Dashboard, Board & List, Calendar & Timeline)   */
    /* -------------------------------------------------------------------------- */
    $('#viewTabs .tab-btn').on('click', function () {
        $('#viewTabs .tab-btn').removeClass('active');
        $(this).addClass('active');

        const view = $(this).data('view');
        $('.view-wrapper .view-content').removeClass('active');

        if (view === 'dashboard') {
            $('#viewDashboard').addClass('active');
        } else if (view === 'board-list') {
            $('#viewBoardList').addClass('active');
            renderProjectKanban();
        } else if (view === 'calendar') {
            $('#viewCalendar').addClass('active');
            renderProjectCalendar();
            renderProjectTimeline();
            renderProjectTimelineSchedulerTable();
        } else if (view === 'documentation') {
            $('#viewDocumentation').addClass('active');
            renderDocumentationRepository();
        } else if (view === 'board') {
            $('#viewBoard').addClass('active');
            if (window.projEmbeddedWhiteboard) {
                setTimeout(() => window.projEmbeddedWhiteboard.resizeCanvas(), 50);
            } else if ($('#projWhiteboardContainer').length && window.WhiteboardStudio) {
                window.projEmbeddedWhiteboard = new window.WhiteboardStudio('#projWhiteboardContainer', {
                    isEmbedded: true
                });
            }
        }
    });

    /* -------------------------------------------------------------------------- */
    /* 2. BOARD & LIST SUBTABS SWITCHER (Board vs List Table)                     */
    /* -------------------------------------------------------------------------- */
    $('#boardListSubTabs .bl-subtab-btn').on('click', function () {
        $('#boardListSubTabs .bl-subtab-btn').removeClass('active');
        $(this).addClass('active');

        const subview = $(this).data('subview');
        $('.board-list-subview').removeClass('active');

        if (subview === 'board') {
            $('#subviewBoardGrid').addClass('active');
            renderProjectKanban();
        } else if (subview === 'list') {
            $('#subviewListTable').addClass('active');
        }
    });

    /* -------------------------------------------------------------------------- */
    /* 3. CALENDAR SUBTABS SWITCHER (Grid vs Timeline vs Schedule Manager)        */
    /* -------------------------------------------------------------------------- */
    $('#projectCalendarSubTabs .cal-subtab-btn').on('click', function () {
        $('#projectCalendarSubTabs .cal-subtab-btn').removeClass('active');
        $(this).addClass('active');

        const subview = $(this).data('subview');
        $('#viewCalendar .calendar-subview-content').removeClass('active');

        if (subview === 'grid') {
            $('#subviewProjGrid').addClass('active');
            renderProjectCalendar();
        } else if (subview === 'timeline') {
            $('#subviewProjTimeline').addClass('active');
            renderProjectTimeline();
        } else if (subview === 'schedule-manager') {
            $('#subviewProjScheduleManager').addClass('active');
            renderProjectTimelineSchedulerTable();
        }
    });

    /* -------------------------------------------------------------------------- */
    /* 4. TASK BREAKDOWN MODAL ENGINE (Dynamic List Tasks for Any Project)        */
    /* -------------------------------------------------------------------------- */
    function openProjectTaskBreakdown(projId, filterStatus) {
        const proj = MASTER_PROJECTS.find(p => p.id === projId) || MASTER_PROJECTS[0];
        if (!proj) return;

        currentActiveBreakdownProjId = proj.id;
        const tasks = proj.tasks || [];

        // 1. Fill Header Information
        $('#breakdownProjTitle').text(proj.title);
        $('#breakdownProjCategory').text(proj.category);
        $('#breakdownProjPriority').text(`${proj.priority} Priority`);
        
        const statusBadgeMap = {
            todo: '<span class="badge bg-danger-subtle text-danger border border-danger-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold">Planning / To Do</span>',
            'in-progress': '<span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold">In Development</span>',
            review: '<span class="badge bg-warning-subtle text-warning border border-warning-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold">Testing & Review</span>',
            completed: '<span class="badge bg-success-subtle text-success border border-success-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold">Completed / Released</span>'
        };
        $('#breakdownProjStatus').html(statusBadgeMap[proj.status] || `<span class="badge bg-light text-dark">${proj.status}</span>`);

        $('#breakdownProjLead').text(proj.lead);
        const duration = calculateDays(proj.startDate, proj.dueDate);
        $('#breakdownProjDates').text(`${formatShortDate(proj.startDate)} - ${formatShortDate(proj.dueDate)}, 2026 (${duration}d)`);
        
        const domainUrl = proj.domain ? `../Monitoring/dashboard.php?domain=${proj.domain}` : '#';
        $('#breakdownProjDomain').text(proj.domain || 'N/A').attr('href', domainUrl);
        $('#breakdownOpenTaskBoardBtn').attr('href', proj.url || 'KanbanTask.php');

        // 2. Calculate Task Counters
        const countTodo = tasks.filter(t => t.status === 'todo').length;
        const countProgress = tasks.filter(t => t.status === 'in-progress').length;
        const countReview = tasks.filter(t => t.status === 'review').length;
        const countDone = tasks.filter(t => t.status === 'completed').length;
        const total = tasks.length;

        const calculatedProgress = total > 0 ? Math.round((countDone / total) * 100) : proj.progress;
        $('#breakdownProgressPct').text(`${calculatedProgress}%`);
        $('#breakdownProgressBar').css('width', `${calculatedProgress}%`).attr('aria-valuenow', calculatedProgress);
        $('#breakdownTaskStats').html(`<i class="fa-solid fa-list-check me-1 text-primary"></i> ${countDone} of ${total} Tasks Finished`);

        $('#breakdownCountTodo').text(countTodo);
        $('#breakdownCountProgress').text(countProgress);
        $('#breakdownCountReview').text(countReview);
        $('#breakdownCountDone').text(countDone);

        // 3. Reset Filters
        $('#breakdownTaskSearch').val('');
        $('#breakdownStatusFilter').val(filterStatus || 'all');
        $('#breakdownPriorityFilter').val('all');

        // 4. Render Table Rows
        renderBreakdownTaskTable(proj);

        // 5. Open Bootstrap Modal
        const modalEl = document.getElementById('projectTaskBreakdownModal');
        if (modalEl) {
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    }

    function renderBreakdownTaskTable(proj) {
        const $tbody = $('#breakdownTaskTableBody').empty();
        const tasks = proj.tasks || [];
        const searchKeyword = ($('#breakdownTaskSearch').val() || '').toLowerCase().trim();
        const statusFilter = $('#breakdownStatusFilter').val() || 'all';
        const priorityFilter = $('#breakdownPriorityFilter').val() || 'all';

        const filteredTasks = tasks.filter(t => {
            const matchesSearch = !searchKeyword || 
                t.title.toLowerCase().includes(searchKeyword) || 
                t.id.toLowerCase().includes(searchKeyword) || 
                (t.desc && t.desc.toLowerCase().includes(searchKeyword)) ||
                (t.assignee && t.assignee.toLowerCase().includes(searchKeyword));
            
            const matchesStatus = statusFilter === 'all' || t.status === statusFilter;
            const matchesPriority = priorityFilter === 'all' || t.priority === priorityFilter;

            return matchesSearch && matchesStatus && matchesPriority;
        });

        if (filteredTasks.length === 0) {
            $tbody.html(`
                <tr>
                    <td colspan="7" class="text-center py-4 text-muted fs-8">
                        <i class="fa-regular fa-folder-open fs-5 d-block mb-1 text-secondary"></i>
                        No tasks found matching current filter criteria in <strong>${proj.title}</strong>.
                    </td>
                </tr>
            `);
            return;
        }

        const taskStatusBadgeMap = {
            todo: '<span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-0.5 fs-8 rounded-pill"><span class="dot dot-todo me-1"></span>To Do</span>',
            'in-progress': '<span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-0.5 fs-8 rounded-pill"><span class="dot dot-progress me-1"></span>In Progress</span>',
            review: '<span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2 py-0.5 fs-8 rounded-pill"><span class="dot dot-review me-1"></span>Review</span>',
            completed: '<span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-0.5 fs-8 rounded-pill"><span class="dot dot-complete me-1"></span>Completed</span>'
        };

        const taskPriorityBadgeMap = {
            Urgent: '<span class="badge bg-danger text-white rounded-pill fs-8 px-2 py-0.5">Urgent</span>',
            High: '<span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill fs-8 px-2 py-0.5">High</span>',
            Medium: '<span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill fs-8 px-2 py-0.5">Medium</span>',
            Normal: '<span class="badge bg-light text-muted border rounded-pill fs-8 px-2 py-0.5">Normal</span>'
        };

        $.each(filteredTasks, function (index, task) {
            const avatarImg = task.avatar || 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80';
            const progressBarColor = task.status === 'completed' ? 'bg-success' : task.status === 'review' ? 'bg-warning' : 'bg-primary';

            const $tr = $(`
                <tr>
                    <td class="ps-3 py-2.5">
                        <span class="badge bg-light text-dark border font-monospace fs-8 px-2 py-1">${task.id}</span>
                    </td>
                    <td class="py-2.5">
                        <div class="fw-bold text-dark fs-7">${task.title}</div>
                        <span class="fs-8 text-muted d-block text-truncate" style="max-width: 320px;">${task.desc || 'No description provided.'}</span>
                    </td>
                    <td class="py-2.5">
                        ${taskStatusBadgeMap[task.status] || task.status}
                    </td>
                    <td class="py-2.5">
                        ${taskPriorityBadgeMap[task.priority] || task.priority}
                    </td>
                    <td class="py-2.5">
                        <div class="d-flex align-items-center gap-2">
                            <img src="${avatarImg}" class="avatar-xs rounded-circle border" alt="${task.assignee}">
                            <span class="fs-8 fw-semibold text-dark">${task.assignee}</span>
                        </div>
                    </td>
                    <td class="py-2.5">
                        ${task.status === 'completed' 
                            ? '<span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-0.5 fs-8 rounded-pill"><i class="fa-solid fa-circle-check me-1"></i>Met SLA</span>' 
                            : (task.id === 'MOB-202' || task.id === 'WEB-405') 
                            ? '<span class="badge bg-danger text-white px-2 py-0.5 fs-8 rounded-pill shadow-xs"><i class="fa-solid fa-circle-exclamation me-1"></i>Breached</span>' 
                            : (task.id === 'MOB-203' || task.id === 'MOB-204')
                            ? '<span class="badge bg-warning text-dark px-2 py-0.5 fs-8 rounded-pill shadow-xs"><i class="fa-solid fa-clock me-1"></i>At Risk</span>'
                            : '<span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-0.5 fs-8 rounded-pill"><i class="fa-solid fa-shield-check me-1"></i>On Track</span>'}
                    </td>
                    <td class="py-2.5">
                        <div class="d-flex align-items-center gap-1.5 fs-8 text-muted mb-1">
                            <i class="fa-regular fa-clock text-primary"></i> ${task.est || '8h'} &bull; ${task.due || 'Oct 2026'}
                        </div>
                        <div class="progress" style="height: 4px; width: 80px;">
                            <div class="progress-bar ${progressBarColor}" style="width: ${task.progress || (task.status === 'completed' ? 100 : 40)}%;"></div>
                        </div>
                    </td>
                    <td class="pe-3 py-2.5 text-end">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-sm btn-light border btn-task-toggle-status" data-task-id="${task.id}" title="Cycle Status">
                                <i class="fa-solid fa-arrows-rotate text-primary fs-8"></i>
                            </button>
                            <a href="${proj.url}" class="btn btn-sm btn-light border" title="Open in Task Board">
                                <i class="fa-solid fa-arrow-up-right-from-square fs-8 text-secondary"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            `);

            // Quick Status Cycle inside modal
            $tr.find('.btn-task-toggle-status').on('click', function (e) {
                e.stopPropagation();
                const statusOrder = ['todo', 'in-progress', 'review', 'completed'];
                const nextIdx = (statusOrder.indexOf(task.status) + 1) % statusOrder.length;
                task.status = statusOrder[nextIdx];
                task.progress = task.status === 'completed' ? 100 : task.status === 'review' ? 85 : task.status === 'in-progress' ? 50 : 0;
                
                openProjectTaskBreakdown(proj.id, $('#breakdownStatusFilter').val());
                renderProjectKanban();
                renderProjectTimeline();
                showProjectToast(`Task ${task.id} updated to ${task.status.toUpperCase()}`);
            });

            $tbody.append($tr);
        });
    }

    // Modal Search and Filter listeners
    $('#breakdownTaskSearch').on('input', function () {
        const proj = MASTER_PROJECTS.find(p => p.id === currentActiveBreakdownProjId);
        if (proj) renderBreakdownTaskTable(proj);
    });

    $('#breakdownStatusFilter, #breakdownPriorityFilter').on('change', function () {
        const proj = MASTER_PROJECTS.find(p => p.id === currentActiveBreakdownProjId);
        if (proj) renderBreakdownTaskTable(proj);
    });

    // Modal Count Boxes click to filter
    $('.breakdown-stat-filter').on('click', function () {
        const status = $(this).data('status');
        $('#breakdownStatusFilter').val(status).trigger('change');
    });

    // Quick Add Task inside Breakdown Modal
    $('#btnBreakdownQuickAddTask').on('click', function () {
        const proj = MASTER_PROJECTS.find(p => p.id === currentActiveBreakdownProjId);
        if (!proj) return;

        const taskTitle = prompt(`Enter new Task Title for [${proj.title}]:`, 'New deliverable item');
        if (taskTitle && taskTitle.trim()) {
            const newId = `TSK-${Math.floor(100 + Math.random() * 900)}`;
            proj.tasks.unshift({
                id: newId,
                title: taskTitle.trim(),
                desc: 'Created via Timeline Task Breakdown',
                status: 'todo',
                priority: 'High',
                assignee: proj.lead || 'Sophia Carter',
                avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
                est: '16h',
                due: formatShortDate(proj.dueDate),
                progress: 0
            });
            proj.totalTasks = proj.tasks.length;
            openProjectTaskBreakdown(proj.id);
            renderProjectKanban();
            renderProjectTimeline();
            showProjectToast(`Added new task "${taskTitle}" to ${proj.title}`);
        }
    });

    /* -------------------------------------------------------------------------- */
    /* 5. RENDER PROJECT KANBAN BOARD (DRAG & DROP)                               */
    /* -------------------------------------------------------------------------- */
    function renderProjectKanban() {
        const containers = {
            todo: $('#projColListTodo').empty(),
            'in-progress': $('#projColListProgress').empty(),
            review: $('#projColListReview').empty(),
            completed: $('#projColListComplete').empty()
        };

        const counts = { todo: 0, 'in-progress': 0, review: 0, completed: 0 };

        MASTER_PROJECTS.forEach(proj => {
            counts[proj.status] = (counts[proj.status] || 0) + 1;
            const membersHtml = proj.members.map(avatar => `<img src="${avatar}" class="avatar-xs rounded-circle border border-white" alt="Member">`).join('');
            const doneCount = (proj.tasks || []).filter(t => t.status === 'completed').length;
            const totalCount = (proj.tasks || []).length || proj.totalTasks;
            const progressVal = totalCount > 0 ? Math.round((doneCount / totalCount) * 100) : proj.progress;
            
            const slaProjectRates = {
                'proj-middleware': { rate: '96.2%', badge: 'bg-success-subtle text-success border border-success-subtle' },
                'proj-mobile': { rate: '88.5%', badge: 'bg-danger-subtle text-danger border border-danger-subtle' },
                'proj-landing': { rate: '98.0%', badge: 'bg-success-subtle text-success border border-success-subtle' },
                'proj-company': { rate: '94.0%', badge: 'bg-success-subtle text-success border border-success-subtle' },
                'proj-analytics': { rate: '100%', badge: 'bg-success-subtle text-success border border-success-subtle' }
            };
            const projSla = slaProjectRates[proj.id] || { rate: '95.0%', badge: 'bg-success-subtle text-success' };

            const $card = $(`
                <div class="card border rounded-3 p-3 bg-white shadow-sm project-card-item cursor-grab" draggable="true" data-id="${proj.id}">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge ${proj.badgeClass} rounded-pill px-2.5 py-1 fs-8 fw-semibold">
                            <i class="${proj.icon} me-1"></i> ${proj.category}
                        </span>
                        <div class="d-flex align-items-center gap-1.5">
                            <a href="SLA.php" class="badge ${projSla.badge} rounded-pill px-2 py-0.5 fs-8 fw-semibold text-decoration-none" title="View SLA Compliance"><i class="fa-solid fa-stopwatch me-1"></i>SLA: ${projSla.rate}</a>
                            <span class="badge ${proj.priorityClass} rounded-pill px-2 py-0.5 fs-8 fw-semibold">${proj.priority}</span>
                        </div>
                    </div>
                    <h4 class="h6 fw-bold mb-1">
                        <a href="javascript:void(0)" class="text-dark text-decoration-none btn-trigger-breakdown" data-proj-id="${proj.id}">${proj.title}</a>
                    </h4>
                    <p class="text-muted fs-8 mb-3 text-truncate-2">${proj.description}</p>
                    
                    <div class="mb-3 cursor-pointer btn-trigger-breakdown" data-proj-id="${proj.id}" title="Click to view full task breakdown">
                        <div class="d-flex align-items-center justify-content-between fs-8 mb-1">
                            <span class="text-primary fw-semibold"><i class="fa-solid fa-list-check me-1"></i> ${doneCount}/${totalCount} Tasks (Breakdown)</span>
                            <span class="fw-bold text-dark">${progressVal}%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar ${progressVal === 100 ? 'bg-success' : 'bg-primary'}" style="width: ${progressVal}%;"></div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                        <div class="team-avatars-stack d-flex align-items-center">
                            ${membersHtml}
                        </div>
                        <div class="d-flex align-items-center gap-1.5">
                            <button class="btn btn-sm btn-outline-primary py-0.5 px-2 fs-8 rounded-2 btn-trigger-breakdown" data-proj-id="${proj.id}" title="View Tasks Breakdown">
                                <i class="fa-solid fa-list-check me-1"></i>Tasks
                            </button>
                            <a href="${proj.url}" class="btn btn-sm btn-light border py-0.5 px-2 fs-8 rounded-2" title="Open Project Task Board">
                                <i class="fa-solid fa-arrow-up-right-from-square text-secondary"></i>
                            </a>
                        </div>
                    </div>
                </div>
            `);

            $card.find('.btn-trigger-breakdown').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                openProjectTaskBreakdown(proj.id);
            });

            if (containers[proj.status]) {
                containers[proj.status].append($card);
            }
        });

        $('#projColCountTodo').text(counts.todo);
        $('#projColCountProgress').text(counts['in-progress']);
        $('#projColCountReview').text(counts.review);
        $('#projColCountComplete').text(counts.completed);

        initProjectDragAndDrop();
    }

    function initProjectDragAndDrop() {
        $('.project-card-item').on('dragstart', function (e) {
            e.originalEvent.dataTransfer.setData('text/plain', $(this).data('id'));
            $(this).addClass('opacity-50');
        }).on('dragend', function () {
            $(this).removeClass('opacity-50');
        });

        $('.project-cards-list').on('dragover', function (e) {
            e.preventDefault();
            $(this).closest('.kanban-column').addClass('border-primary');
        }).on('dragleave', function () {
            $(this).closest('.kanban-column').removeClass('border-primary');
        }).on('drop', function (e) {
            e.preventDefault();
            $(this).closest('.kanban-column').removeClass('border-primary');
            const projId = e.originalEvent.dataTransfer.getData('text/plain');
            const targetStatus = $(this).data('status');
            const proj = MASTER_PROJECTS.find(p => p.id === projId);
            if (proj && targetStatus) {
                proj.status = targetStatus;
                renderProjectKanban();
                renderProjectTimeline();
                showProjectToast(`Project "${proj.title}" moved to ${targetStatus.toUpperCase()}`);
            }
        });
    }

    /* -------------------------------------------------------------------------- */
    /* 6. RENDER PROJECT CALENDAR GRID (SEPTEMBER 2026)                          */
    /* -------------------------------------------------------------------------- */
    function renderProjectCalendar() {
        const $grid = $('#projectCalendarGrid').empty();
        const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        // Header Row (Day names)
        $.each(daysOfWeek, function (_, day) {
            $grid.append(`<div class="cal-day-header text-muted fw-bold fs-8 text-center p-2 text-uppercase bg-light rounded-2">${day}</div>`);
        });

        // 35 Calendar Cells (Sep 2026 starts on Tue -> offset 2, ends on Wed -> 30 days)
        for (let i = 1; i <= 35; i++) {
            let dayNum;
            let isCurrentMonth = true;
            let dateStr = '';

            if (i <= 2) {
                dayNum = 29 + i; // Aug 30, Aug 31
                isCurrentMonth = false;
                dateStr = `2026-08-${String(dayNum).padStart(2, '0')}`;
            } else if (i > 32) {
                dayNum = i - 32; // Oct 1, Oct 2, Oct 3
                isCurrentMonth = false;
                dateStr = `2026-10-${String(dayNum).padStart(2, '0')}`;
            } else {
                dayNum = i - 2; // Sep 1 - Sep 30
                dateStr = `2026-09-${String(dayNum).padStart(2, '0')}`;
            }

            const $cell = $('<div>', {
                class: `cal-cell ${isCurrentMonth ? '' : 'bg-light-subtle opacity-75'}`
            });

            const $cellHeader = $(`
                <div class="cal-cell-header">
                    <span class="cal-date-num ${dayNum === 15 && isCurrentMonth ? 'badge bg-primary text-white p-1 rounded-circle' : ''}">${dayNum}</span>
                    ${isCurrentMonth ? `<button class="btn btn-sm btn-link text-decoration-none cal-cell-add-btn text-muted" title="Add Project on Sep ${dayNum}"><i class="fa-solid fa-plus"></i></button>` : ''}
                </div>
            `);

            $cellHeader.find('.cal-cell-add-btn').on('click', function (e) {
                e.stopPropagation();
                $('#newProjectModal').modal('show');
            });

            $cell.append($cellHeader);

            // Find projects active on this date
            if (isCurrentMonth) {
                const thisDate = new Date(dateStr);
                const dayProjects = MASTER_PROJECTS.filter(p => {
                    const start = new Date(p.startDate || '2026-09-01');
                    const due = new Date(p.dueDate || '2026-09-30');
                    return start <= thisDate && thisDate <= due;
                });

                $.each(dayProjects.slice(0, 3), function (_, proj) {
                    const statusClass = `badge-${proj.status === 'completed' ? 'complete' : proj.status === 'in-progress' ? 'progress' : proj.status}`;
                    const $pill = $('<div>', {
                        class: `cal-task-pill ${statusClass} text-truncate d-flex align-items-center gap-1 shadow-2xs cursor-pointer`,
                        title: `${proj.title} &bull; Click to view task breakdown modal`
                    });
                    $pill.html(`<i class="${proj.icon} fs-9"></i> <span class="fw-semibold">${proj.title}</span>`);
                    $pill.on('click', function (e) {
                        e.stopPropagation();
                        openProjectTaskBreakdown(proj.id);
                    });
                    $cell.append($pill);
                });

                if (dayProjects.length > 3) {
                    $cell.append(`<span class="fs-9 text-muted fw-bold">+${dayProjects.length - 3} more</span>`);
                }
            }

            $grid.append($cell);
        }
    }

    /* -------------------------------------------------------------------------- */
    /* 7. RENDER PROJECT TIMELINE (GANTT BARS WITH TASK BREAKDOWN CLICK)         */
    /* -------------------------------------------------------------------------- */
    function renderProjectTimeline() {
        const $list = $('#projectTimelineList').empty();
        const filter = $('#projectTimelineStatusFilter').val() || 'all';

        const filteredProjects = MASTER_PROJECTS.filter(p => {
            if (filter === 'all') return true;
            return p.status === filter;
        });

        if (filteredProjects.length === 0) {
            $list.html('<div class="text-center text-muted p-4 fs-7"><i class="fa-regular fa-folder-open me-2"></i> No projects found matching filter.</div>');
            return;
        }

        const statusClassMap = {
            todo: 'timeline-bar-todo',
            'in-progress': 'timeline-bar-progress',
            review: 'timeline-bar-review',
            completed: 'timeline-bar-complete'
        };

        const statusBadgeMap = {
            todo: '<span class="badge badge-todo rounded-pill px-2 py-0.5 fs-8 me-1.5">Planning</span>',
            'in-progress': '<span class="badge badge-progress rounded-pill px-2 py-0.5 fs-8 me-1.5">In Progress</span>',
            review: '<span class="badge badge-review rounded-pill px-2 py-0.5 fs-8 me-1.5">Review</span>',
            completed: '<span class="badge badge-complete rounded-pill px-2 py-0.5 fs-8 me-1.5">Complete</span>'
        };

        $.each(filteredProjects, function (_, proj) {
            const startObj = new Date(proj.startDate || '2026-09-01');
            const startDay = Math.min(30, Math.max(1, startObj.getDate()));
            const duration = calculateDays(proj.startDate || '2026-09-01', proj.dueDate || '2026-09-30');

            const startMargin = ((startDay - 1) / 30) * 100;
            const widthPercent = Math.max(12, Math.min(100 - startMargin, (duration / 30) * 100));

            const membersHtml = proj.members.map(avatar => `<img src="${avatar}" class="avatar-xs rounded-circle me-1" alt="Member">`).join('');
            const doneCount = (proj.tasks || []).filter(t => t.status === 'completed').length;
            const totalCount = (proj.tasks || []).length || proj.totalTasks;
            const progressVal = totalCount > 0 ? Math.round((doneCount / totalCount) * 100) : proj.progress;

            const $row = $('<div>', { class: 'gantt-grid-row gap-3 py-2 border-bottom' });
            $row.html(`
                <!-- Project Title & Date Range -->
                <div class="d-flex flex-column" style="min-width: 0;">
                    <div class="d-flex align-items-center gap-1.5">
                        <i class="${proj.icon} text-primary fs-8"></i>
                        <a href="javascript:void(0)" class="fw-bold fs-7 text-dark text-truncate text-decoration-none btn-open-task-breakdown" data-proj-id="${proj.id}" title="Click to view Task Breakdown Modal">${proj.title}</a>
                    </div>
                    <div class="d-flex align-items-center gap-1 mt-1 flex-wrap">
                        ${statusBadgeMap[proj.status] || ''}
                        <span class="badge ${proj.badgeClass} fs-9">${proj.category}</span>
                        <span class="fs-8 text-muted fw-semibold">${formatShortDate(proj.startDate)} - ${formatShortDate(proj.dueDate)} (${duration}d)</span>
                    </div>
                </div>

                <!-- Gantt Timeline Bar (Clickable to open breakdown) -->
                <div class="px-2">
                    <div class="timeline-bar-track position-relative cursor-pointer btn-open-task-breakdown" data-proj-id="${proj.id}" style="height: 22px; border-radius: 999px;" title="Click to view task breakdown for ${proj.title}">
                        <div class="timeline-bar-fill ${statusClassMap[proj.status] || 'timeline-bar-progress'} d-flex align-items-center justify-content-between text-white fs-9 fw-bold px-2 text-truncate shadow-sm" 
                             style="width: ${widthPercent}%; margin-left: ${startMargin}%; height: 100%; border-radius: 999px;">
                            <span>${duration >= 5 ? `${duration}d` : ''}</span>
                            <span class="badge bg-dark bg-opacity-25 fs-9 py-0.5 px-1.5 rounded-pill"><i class="fa-solid fa-list-check me-1"></i>${doneCount}/${totalCount} (${progressVal}%)</span>
                        </div>
                    </div>
                </div>

                <!-- Actions & Lead -->
                <div class="d-flex align-items-center justify-content-end gap-1.5">
                    <div class="card-assignees">${membersHtml}</div>
                    <button class="btn btn-sm btn-primary py-0.5 px-2 fs-8 btn-open-task-breakdown rounded-2" data-proj-id="${proj.id}" title="View Breakdown List Task">
                        <i class="fa-solid fa-list-check me-1"></i>Tasks
                    </button>
                    <button class="btn btn-sm btn-outline-secondary py-0.5 px-2 fs-8 btn-proj-adjust-timeline rounded-2" title="Adjust Project Timeline">
                        <i class="fa-solid fa-sliders"></i>
                    </button>
                    <a href="${proj.url}" class="btn btn-sm btn-light border py-0.5 px-2 fs-8 rounded-2" title="Open Task Board">
                        <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i>
                    </a>
                </div>
            `);

            $row.find('.btn-open-task-breakdown').on('click', function (e) {
                e.stopPropagation();
                openProjectTaskBreakdown(proj.id);
            });

            $row.find('.btn-proj-adjust-timeline').on('click', function (e) {
                e.stopPropagation();
                $('#projectCalendarSubTabs .cal-subtab-btn[data-subview="schedule-manager"]').trigger('click');
                setTimeout(() => {
                    const $targetRow = $(`#row-projschedule-${proj.id}`);
                    if ($targetRow.length) {
                        $targetRow[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                        $targetRow.addClass('table-primary');
                        setTimeout(() => $targetRow.removeClass('table-primary'), 1500);
                    }
                }, 50);
            });

            $list.append($row);
        });
    }

    $('#projectTimelineStatusFilter').on('change', function () {
        renderProjectTimeline();
    });

    /* -------------------------------------------------------------------------- */
    /* 8. RENDER PROJECT TIMELINE SCHEDULER TABLE (INLINE DATE ADJUSTMENT)        */
    /* -------------------------------------------------------------------------- */
    function renderProjectTimelineSchedulerTable() {
        const $tbody = $('#projectTimelineSchedulerTableBody').empty();

        const statusBadgeMap = {
            todo: '<span class="badge badge-todo rounded-pill px-2 py-1 fs-8">Planning</span>',
            'in-progress': '<span class="badge badge-progress rounded-pill px-2 py-1 fs-8">In Progress</span>',
            review: '<span class="badge badge-review rounded-pill px-2 py-1 fs-8">Review</span>',
            completed: '<span class="badge badge-complete rounded-pill px-2 py-1 fs-8">Complete</span>'
        };

        $.each(MASTER_PROJECTS, function (_, proj) {
            const startDateVal = proj.startDate || '2026-09-01';
            const dueDateVal = proj.dueDate || '2026-09-30';
            const priorityVal = proj.priority || 'Medium';
            const durationDays = calculateDays(startDateVal, dueDateVal);
            const doneCount = (proj.tasks || []).filter(t => t.status === 'completed').length;
            const totalCount = (proj.tasks || []).length || proj.totalTasks;

            const $tr = $('<tr>', { id: `row-projschedule-${proj.id}` });
            $tr.html(`
                <!-- Project Title -->
                <td class="py-2.5 px-3">
                    <div class="d-flex align-items-center gap-2">
                        <i class="${proj.icon} text-primary fs-7"></i>
                        <div>
                            <a href="javascript:void(0)" class="fw-bold text-dark text-decoration-none d-block btn-open-sched-breakdown" data-proj-id="${proj.id}">${proj.title}</a>
                            <span class="fs-8 text-muted">${proj.lead} &bull; ${doneCount}/${totalCount} Tasks (${proj.progress}%)</span>
                        </div>
                    </div>
                </td>

                <!-- Category -->
                <td class="py-2.5 px-2">
                    <span class="badge ${proj.badgeClass} rounded-pill px-2 py-1 fs-8">${proj.category}</span>
                </td>

                <!-- Status -->
                <td class="py-2.5 px-2">${statusBadgeMap[proj.status] || ''}</td>

                <!-- Priority Selector -->
                <td class="py-2.5 px-2">
                    <select class="form-select form-select-sm fs-8 py-1 proj-table-priority" data-proj-id="${proj.id}">
                        <option value="Normal" ${priorityVal === 'Normal' ? 'selected' : ''}>Normal</option>
                        <option value="Medium" ${priorityVal === 'Medium' ? 'selected' : ''}>Medium</option>
                        <option value="High" ${priorityVal === 'High' ? 'selected' : ''}>High</option>
                        <option value="Urgent" ${priorityVal === 'Urgent' ? 'selected' : ''}>Urgent</option>
                    </select>
                </td>

                <!-- Start Date Input -->
                <td class="py-2.5 px-2">
                    <input type="date" class="form-control form-control-sm fs-8 py-1 proj-table-start" data-proj-id="${proj.id}" value="${startDateVal}">
                </td>

                <!-- Due Date Input -->
                <td class="py-2.5 px-2">
                    <input type="date" class="form-control form-control-sm fs-8 py-1 proj-table-due" data-proj-id="${proj.id}" value="${dueDateVal}">
                </td>

                <!-- Duration Badge -->
                <td class="py-2.5 px-2">
                    <span class="badge bg-light text-dark border fs-8 px-2 py-1 proj-duration-badge" id="proj-dur-${proj.id}">
                        <i class="fa-regular fa-clock me-1 text-primary"></i> ${durationDays}d
                    </span>
                </td>

                <!-- Quick Preset Adjustments -->
                <td class="py-2.5 px-2">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-outline-secondary fs-9 py-0.5 px-1.5 btn-proj-preset" data-proj-id="${proj.id}" data-days="7" title="+1 Week">+1w</button>
                        <button class="btn btn-outline-secondary fs-9 py-0.5 px-1.5 btn-proj-preset" data-proj-id="${proj.id}" data-days="14" title="+2 Weeks">+2w</button>
                        <button class="btn btn-outline-secondary fs-9 py-0.5 px-1.5 btn-proj-preset" data-proj-id="${proj.id}" data-days="30" title="+1 Month">+1m</button>
                        <button class="btn btn-outline-primary fs-9 py-0.5 px-1.5 btn-proj-preset" data-proj-id="${proj.id}" data-days="90" title="Quarter Q4">Q4</button>
                    </div>
                </td>

                <!-- Actions -->
                <td class="py-2.5 px-3 text-end">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-light border btn-open-sched-breakdown text-primary" data-proj-id="${proj.id}" title="View Tasks Breakdown">
                            <i class="fa-solid fa-list-check"></i>
                        </button>
                        <button class="btn btn-light border btn-save-proj-timeline" data-proj-id="${proj.id}" title="Save Timeline Changes">
                            <i class="fa-solid fa-check text-success"></i>
                        </button>
                        <a href="${proj.url}" class="btn btn-light border" title="Go to Task Board">
                            <i class="fa-solid fa-arrow-up-right-from-square text-secondary"></i>
                        </a>
                    </div>
                </td>
            `);

            $tr.find('.btn-open-sched-breakdown').on('click', function (e) {
                e.stopPropagation();
                openProjectTaskBreakdown(proj.id);
            });

            $tbody.append($tr);
        });

        // Handle date changes
        $('.proj-table-start, .proj-table-due').on('change', function () {
            const projId = $(this).data('proj-id');
            const $row = $(`#row-projschedule-${projId}`);
            const startVal = $row.find('.proj-table-start').val();
            const dueVal = $row.find('.proj-table-due').val();

            if (startVal && dueVal) {
                const dur = calculateDays(startVal, dueVal);
                $row.find(`#proj-dur-${projId}`).html(`<i class="fa-regular fa-clock me-1 text-primary"></i> ${dur}d`);

                const proj = MASTER_PROJECTS.find(p => p.id === projId);
                if (proj) {
                    proj.startDate = startVal;
                    proj.dueDate = dueVal;
                    showProjectToast(`Updated timeline for "${proj.title}" (${dur} days)`);
                }
            }
        });

        // Handle priority change
        $('.proj-table-priority').on('change', function () {
            const projId = $(this).data('proj-id');
            const priorityVal = $(this).val();
            const proj = MASTER_PROJECTS.find(p => p.id === projId);
            if (proj) {
                proj.priority = priorityVal;
                proj.priorityClass = priorityVal === 'Urgent' || priorityVal === 'High' ? 'bg-danger-subtle text-danger' : priorityVal === 'Medium' ? 'bg-warning-subtle text-warning' : 'bg-success-subtle text-success';
                showProjectToast(`Priority for "${proj.title}" updated to ${priorityVal}`);
            }
        });

        // Quick Preset buttons
        $('.btn-proj-preset').on('click', function () {
            const projId = $(this).data('proj-id');
            const addDays = parseInt($(this).data('days'), 10);
            const $row = $(`#row-projschedule-${projId}`);
            const startVal = $row.find('.proj-table-start').val() || '2026-09-01';

            const sDate = new Date(startVal);
            sDate.setDate(sDate.getDate() + addDays);
            const newDueStr = sDate.toISOString().split('T')[0];

            $row.find('.proj-table-due').val(newDueStr).trigger('change');
        });

        // Save Timeline button
        $('.btn-save-proj-timeline').on('click', function () {
            const projId = $(this).data('proj-id');
            const proj = MASTER_PROJECTS.find(p => p.id === projId);
            if (proj) {
                showProjectToast(`Timeline saved for "${proj.title}"!`);
                renderProjectCalendar();
                renderProjectTimeline();
            }
        });
    }

    // Reset Timelines to Default
    $('#btnResetProjectTimelines').on('click', function () {
        MASTER_PROJECTS = JSON.parse(JSON.stringify(DEFAULT_PROJECTS));
        renderProjectTimelineSchedulerTable();
        renderProjectCalendar();
        renderProjectTimeline();
        renderProjectKanban();
        showProjectToast('All project timelines reset to default schedule.');
    });

    // Month Navigation Buttons
    $('#btnProjPrevMonth').on('click', function () {
        $('#projectCalendarMonthTitle').text('August 2026');
        showProjectToast('Showing August 2026 calendar view');
    });

    $('#btnProjToday').on('click', function () {
        $('#projectCalendarMonthTitle').text('September 2026');
        renderProjectCalendar();
        showProjectToast('Reset to Current Month: September 2026');
    });

    $('#btnProjNextMonth').on('click', function () {
        $('#projectCalendarMonthTitle').text('October 2026');
        showProjectToast('Showing October 2026 calendar view');
    });

    // Attach task breakdown trigger to the master project table buttons & rows
    $('#masterProjectTableBody').on('click', '.btn-trigger-breakdown-row', function (e) {
        e.preventDefault();
        e.stopPropagation();
        const projId = $(this).data('proj-id');
        openProjectTaskBreakdown(projId);
    });

    $('#masterProjectTableBody').on('click', 'tr', function (e) {
        // if user clicked directly on link or button, let default action happen
        if ($(e.target).closest('a, button, input').length) return;
        const projName = $(this).find('td:nth-child(2) a').text().trim();
        const proj = MASTER_PROJECTS.find(p => p.title.toLowerCase() === projName.toLowerCase());
        if (proj) {
            openProjectTaskBreakdown(proj.id);
        }
    });

    /* -------------------------------------------------------------------------- */
    /* 8. DOCUMENTATION REPOSITORY & FILE UPLOAD ENGINE                           */
    /* -------------------------------------------------------------------------- */
    const DEFAULT_DOCUMENTS = [
        {
            id: 'doc-1',
            title: 'Business Requirements Document (BRD) - Core Middleware',
            filename: 'BRD_Middleware_Enterprise_v2.1.docx',
            fileExt: 'docx',
            fileSize: '3.4 MB',
            category: 'brd',
            categoryLabel: 'BRD Requirements',
            projectName: 'Middleware Project',
            version: 'v2.1.0',
            status: 'Approved',
            author: 'Sophia Carter (Lead Architect)',
            authorAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            uploadedDate: '2026-09-02',
            notes: 'Spesifikasi kebutuhan bisnis, baseline scope e-commerce, dan enterprise compliance.'
        },
        {
            id: 'doc-2',
            title: 'Functional Specification Document (FSD) - Auth & Gateway',
            filename: 'FSD_Auth_RateLimiting_v1.4.pdf',
            fileExt: 'pdf',
            fileSize: '5.1 MB',
            category: 'fsd',
            categoryLabel: 'FSD Specs',
            projectName: 'Middleware Project',
            version: 'v1.4.0',
            status: 'Approved',
            author: 'Sarah Chen (Senior Backend)',
            authorAvatar: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=80&q=80',
            uploadedDate: '2026-09-08',
            notes: 'Spesifikasi logika event gateway, rate limiting token bucket, dan JWT token rotation.'
        },
        {
            id: 'doc-3',
            title: 'Product Requirements Document (PRD) - Mobile CRM Apps',
            filename: 'PRD_Mobile_CRM_FieldSales_v1.0.pdf',
            fileExt: 'pdf',
            fileSize: '4.8 MB',
            category: 'prd',
            categoryLabel: 'PRD Product',
            projectName: 'Mobile CRM Application',
            version: 'v1.0.0',
            status: 'Approved',
            author: 'Daniel Johnson (Mobile Lead)',
            authorAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            uploadedDate: '2026-09-04',
            notes: 'User story offline mode, biometric FaceID login, dan acceptance criteria rilis Play Store & App Store.'
        },
        {
            id: 'doc-4',
            title: 'Entity Relationship Diagram & Migration SQL',
            filename: 'ERD_Database_Schema_Migration_v2.sql',
            fileExt: 'sql',
            fileSize: '1.2 MB',
            category: 'erd',
            categoryLabel: 'ERD Schemas',
            projectName: 'Middleware Project',
            version: 'v2.0.0',
            status: 'Approved',
            author: 'Alex Rivera (Database Eng)',
            authorAvatar: 'https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=80&q=80',
            uploadedDate: '2026-09-10',
            notes: 'DDL skema database multi-tenant MySQL/PostgreSQL dan indeks partisi tabel pesanan.'
        },
        {
            id: 'doc-5',
            title: 'High-Availability Cloud Architecture Blueprint',
            filename: 'Architecture_Topologi_Cloud_v3.drawio',
            fileExt: 'drawio',
            fileSize: '8.6 MB',
            category: 'blueprint',
            categoryLabel: 'Architecture',
            projectName: 'Company Website',
            version: 'v3.0.0',
            status: 'Approved',
            author: 'Michael Anderson (Tech Lead)',
            authorAvatar: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=80&q=80',
            uploadedDate: '2026-09-12',
            notes: 'Topologi AWS Kubernetes Cluster, Cloudflare CDN proxy, load balancer, dan failover multi-AZ.'
        },
        {
            id: 'doc-6',
            title: 'Campaign UI/UX Design System Tokens & Vector Assets',
            filename: 'LandingPage_Vector_Brand_Assets.zip',
            fileExt: 'zip',
            fileSize: '24.5 MB',
            category: 'assets',
            categoryLabel: 'Assets & Packages',
            projectName: 'Landing Page Campaign',
            version: 'v1.2.0',
            status: 'Approved',
            author: 'Sophia Carter (Lead Designer)',
            authorAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            uploadedDate: '2026-09-06',
            notes: 'Paket arsip SVG icons, Figma tokens, 3D spline hero render, dan typography export.'
        },
        {
            id: 'doc-7',
            title: 'Internal Analytics Tool Architecture & Pipeline DDL',
            filename: 'Analytics_ClickHouse_ETL_Specs.pdf',
            fileExt: 'pdf',
            fileSize: '3.9 MB',
            category: 'blueprint',
            categoryLabel: 'Architecture',
            projectName: 'Internal Analytics Tool',
            version: 'v1.1.0',
            status: 'Approved',
            author: 'James Wilson (DevOps Lead)',
            authorAvatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            uploadedDate: '2026-09-14',
            notes: 'Pipeline data ingestion Kafka ke ClickHouse dan integrasi dasbor telemetri Grafana.'
        }
    ];

    let MASTER_DOCUMENTS = JSON.parse(localStorage.getItem('kanban_project_docs') || 'null');
    if (!MASTER_DOCUMENTS || !MASTER_DOCUMENTS.length) {
        MASTER_DOCUMENTS = JSON.parse(JSON.stringify(DEFAULT_DOCUMENTS));
    }

    function getDocIconConfig(ext) {
        const e = (ext || '').toLowerCase().replace('.', '');
        if (['pdf'].includes(e)) return { icon: 'fa-solid fa-file-pdf', colorClass: 'text-danger', bgClass: 'bg-danger-subtle' };
        if (['doc', 'docx'].includes(e)) return { icon: 'fa-solid fa-file-word', colorClass: 'text-primary', bgClass: 'bg-primary-subtle' };
        if (['xls', 'xlsx', 'csv'].includes(e)) return { icon: 'fa-solid fa-file-excel', colorClass: 'text-success', bgClass: 'bg-success-subtle' };
        if (['ppt', 'pptx'].includes(e)) return { icon: 'fa-solid fa-file-powerpoint', colorClass: 'text-warning', bgClass: 'bg-warning-subtle' };
        if (['zip', 'rar', '7z', 'tar', 'gz'].includes(e)) return { icon: 'fa-solid fa-file-zipper', colorClass: 'text-secondary', bgClass: 'bg-secondary-subtle' };
        if (['png', 'jpg', 'jpeg', 'svg', 'webp', 'gif'].includes(e)) return { icon: 'fa-solid fa-file-image', colorClass: 'text-info', bgClass: 'bg-info-subtle' };
        if (['sql', 'json', 'js', 'ts', 'php', 'html', 'css', 'py'].includes(e)) return { icon: 'fa-solid fa-file-code', colorClass: 'text-dark', bgClass: 'bg-light-subtle' };
        if (['drawio', 'vsdx', 'fig'].includes(e)) return { icon: 'fa-solid fa-diagram-project', colorClass: 'text-danger', bgClass: 'bg-danger-subtle' };
        return { icon: 'fa-solid fa-file-lines', colorClass: 'text-primary', bgClass: 'bg-primary-subtle' };
    }

    function renderDocumentationRepository() {
        const $tbody = $('#docFilesTableBody').empty();

        // 1. Update Category Count Badges
        const brdCount = MASTER_DOCUMENTS.filter(d => d.category === 'brd').length;
        const fsdCount = MASTER_DOCUMENTS.filter(d => d.category === 'fsd').length;
        const prdCount = MASTER_DOCUMENTS.filter(d => d.category === 'prd').length;
        const erdCount = MASTER_DOCUMENTS.filter(d => d.category === 'erd').length;
        const bpCount = MASTER_DOCUMENTS.filter(d => d.category === 'blueprint').length;
        const assetCount = MASTER_DOCUMENTS.filter(d => d.category === 'assets' || d.category === 'other').length;

        $('#catCount_brd').text(`${brdCount} Files`);
        $('#catCount_fsd').text(`${fsdCount} Files`);
        $('#catCount_prd').text(`${prdCount} Files`);
        $('#catCount_erd').text(`${erdCount} Files`);
        $('#catCount_blueprint').text(`${bpCount} Files`);
        $('#catCount_assets').text(`${assetCount} Files`);
        $('#docTotalCountBadge').text(`${MASTER_DOCUMENTS.length} Total Files`);

        // 2. Filter Documents
        const searchKeyword = ($('#docFileSearchInput').val() || '').toLowerCase().trim();
        const projectFilter = $('#docFileProjectFilter').val() || 'all';
        const categoryFilter = $('#docFileCategoryFilter').val() || 'all';

        const filteredDocs = MASTER_DOCUMENTS.filter(doc => {
            const matchesSearch = !searchKeyword ||
                doc.title.toLowerCase().includes(searchKeyword) ||
                doc.filename.toLowerCase().includes(searchKeyword) ||
                (doc.author && doc.author.toLowerCase().includes(searchKeyword)) ||
                (doc.notes && doc.notes.toLowerCase().includes(searchKeyword));

            const matchesProject = projectFilter === 'all' || doc.projectName === projectFilter;
            const matchesCategory = categoryFilter === 'all' || doc.category === categoryFilter;

            return matchesSearch && matchesProject && matchesCategory;
        });

        if (filteredDocs.length === 0) {
            $tbody.html(`
                <tr>
                    <td colspan="7" class="text-center py-5 text-muted">
                        <i class="fa-regular fa-folder-open fs-2 d-block mb-2 text-secondary"></i>
                        <h6 class="fw-bold text-dark mb-1">Tidak ada file dokumentasi ditemukan</h6>
                        <span class="fs-8">Cobalah mengubah kata kunci pencarian atau filter proyek/kategori Anda.</span>
                        <div class="mt-3">
                            <button class="btn btn-sm btn-primary rounded-3 px-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#uploadDocFileModal">
                                <i class="fa-solid fa-cloud-arrow-up me-1"></i> Upload File Pertama
                            </button>
                        </div>
                    </td>
                </tr>
            `);
            return;
        }

        const catBadgeMap = {
            brd: '<span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-8 px-2 py-0.5 rounded-2">BRD</span>',
            fsd: '<span class="badge bg-success-subtle text-success border border-success-subtle fs-8 px-2 py-0.5 rounded-2">FSD</span>',
            prd: '<span class="badge bg-info-subtle text-info border border-info-subtle fs-8 px-2 py-0.5 rounded-2">PRD</span>',
            erd: '<span class="badge bg-warning-subtle text-warning border border-warning-subtle fs-8 px-2 py-0.5 rounded-2">ERD</span>',
            blueprint: '<span class="badge bg-danger-subtle text-danger border border-danger-subtle fs-8 px-2 py-0.5 rounded-2">Blueprint</span>',
            assets: '<span class="badge bg-secondary-subtle text-dark border border-secondary-subtle fs-8 px-2 py-0.5 rounded-2">Asset</span>',
            other: '<span class="badge bg-light text-dark border fs-8 px-2 py-0.5 rounded-2">Doc</span>'
        };

        $.each(filteredDocs, function (_, doc) {
            const iconCfg = getDocIconConfig(doc.fileExt);
            const authorAvatar = doc.authorAvatar || 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80';
            const authorName = doc.author || 'Project Lead';

            const $tr = $(`
                <tr>
                    <!-- File Name & Title -->
                    <td class="ps-4 py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-2.5 rounded-3 d-flex align-items-center justify-content-center ${iconCfg.bgClass} shadow-2xs" style="width: 42px; height: 42px;">
                                <i class="${iconCfg.icon} ${iconCfg.colorClass} fs-5"></i>
                            </div>
                            <div style="min-width: 0;">
                                <a href="javascript:void(0)" class="fw-bold text-dark fs-7 text-decoration-none d-block text-truncate btn-preview-doc-trigger" data-doc-id="${doc.id}" title="${doc.title}">
                                    ${doc.title}
                                </a>
                                <div class="d-flex align-items-center gap-1.5 mt-0.5">
                                    <span class="fs-8 text-muted font-monospace text-truncate" style="max-width: 220px;">${doc.filename}</span>
                                    <span class="badge bg-light text-muted border fs-9 text-uppercase">${doc.fileExt || 'file'}</span>
                                </div>
                            </div>
                        </div>
                    </td>

                    <!-- Project Association -->
                    <td class="py-3">
                        <span class="badge bg-light text-dark border fs-8 px-2 py-1 fw-semibold text-truncate d-inline-block" style="max-width: 170px;">
                            <i class="fa-solid fa-folder-tree me-1 text-primary"></i> ${doc.projectName}
                        </span>
                    </td>

                    <!-- Category -->
                    <td class="py-3">
                        ${catBadgeMap[doc.category] || `<span class="badge bg-light text-dark border">${doc.category}</span>`}
                    </td>

                    <!-- Version -->
                    <td class="py-3">
                        <span class="badge bg-light text-dark border font-monospace fs-8 px-2 py-0.5">${doc.version || 'v1.0.0'}</span>
                    </td>

                    <!-- Uploader & Date -->
                    <td class="py-3">
                        <div class="d-flex align-items-center gap-2">
                            <img src="${authorAvatar}" class="avatar-xs rounded-circle border" alt="${authorName}">
                            <div>
                                <span class="fs-8 fw-semibold text-dark d-block text-truncate" style="max-width: 120px;">${authorName.split(' ')[0]}</span>
                                <span class="fs-9 text-muted">${formatShortDate(doc.uploadedDate || '2026-09-01')}</span>
                            </div>
                        </div>
                    </td>

                    <!-- File Size -->
                    <td class="py-3">
                        <span class="fs-8 text-muted font-monospace fw-semibold">${doc.fileSize || '2.0 MB'}</span>
                    </td>

                    <!-- Actions -->
                    <td class="pe-4 py-3 text-end">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-light border btn-preview-doc-trigger" data-doc-id="${doc.id}" title="Preview Details">
                                <i class="fa-solid fa-eye text-primary fs-8"></i>
                            </button>
                            <button class="btn btn-light border btn-download-doc-trigger" data-doc-id="${doc.id}" title="Download File">
                                <i class="fa-solid fa-download text-success fs-8"></i>
                            </button>
                            <button class="btn btn-light border btn-delete-doc-trigger" data-doc-id="${doc.id}" title="Hapus Dokumen">
                                <i class="fa-solid fa-trash text-danger fs-8"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `);

            $tbody.append($tr);
        });
    }

    // Filter Listeners
    $('#docFileSearchInput').on('input', function () {
        renderDocumentationRepository();
    });

    $('#docFileProjectFilter, #docFileCategoryFilter').on('change', function () {
        renderDocumentationRepository();
    });

    $('.doc-quick-cat-filter').on('click', function () {
        const cat = $(this).data('category');
        $('#docFileCategoryFilter').val(cat).trigger('change');
    });

    // Form Upload File Documentation Submission
    $('#formUploadDocFile').on('submit', function (e) {
        e.preventDefault();
        const project = $('#uploadDocProject').val();
        const category = $('#uploadDocCategory').val();
        const title = $('#uploadDocTitle').val().trim();
        const version = $('#uploadDocVersion').val().trim() || 'v1.0.0';
        const author = $('#uploadDocAuthor').val().trim() || 'Sophia Carter';
        const status = $('#uploadDocStatus').val() || 'Approved';
        const notes = $('#uploadDocNotes').val().trim();

        const fileInput = document.getElementById('uploadDocFileInput');
        let filename = 'document_upload.pdf';
        let fileExt = 'pdf';
        let fileSize = '2.5 MB';

        if (fileInput && fileInput.files && fileInput.files.length > 0) {
            const file = fileInput.files[0];
            filename = file.name;
            const extParts = file.name.split('.');
            if (extParts.length > 1) fileExt = extParts.pop().toLowerCase();
            
            // Format bytes to KB / MB
            if (file.size < 1024 * 1024) {
                fileSize = (file.size / 1024).toFixed(1) + ' KB';
            } else {
                fileSize = (file.size / (1024 * 1024)).toFixed(1) + ' MB';
            }
        }

        // Show Progress Simulation
        const $progressContainer = $('#uploadDocProgressContainer').removeClass('d-none');
        const $progressBar = $('#uploadDocProgressBar');
        const $progressPct = $('#uploadDocProgressPct');
        const $submitBtn = $('#btnSubmitUploadDoc').prop('disabled', true);

        let progress = 0;
        const uploadInterval = setInterval(() => {
            progress += 25;
            $progressBar.css('width', `${progress}%`);
            $progressPct.text(`${progress}%`);

            if (progress >= 100) {
                clearInterval(uploadInterval);

                const newDoc = {
                    id: `doc-${Date.now()}`,
                    title: title,
                    filename: filename,
                    fileExt: fileExt,
                    fileSize: fileSize,
                    category: category,
                    projectName: project,
                    version: version,
                    status: status,
                    author: author,
                    authorAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
                    uploadedDate: new Date().toISOString().split('T')[0],
                    notes: notes || 'Uploaded file documentation.'
                };

                MASTER_DOCUMENTS.unshift(newDoc);
                localStorage.setItem('kanban_project_docs', JSON.stringify(MASTER_DOCUMENTS));

                // Reset and close modal
                setTimeout(() => {
                    $progressContainer.addClass('d-none');
                    $progressBar.css('width', '0%');
                    $progressPct.text('0%');
                    $submitBtn.prop('disabled', false);
                    $('#uploadDocFileModal').modal('hide');
                    $('#formUploadDocFile')[0].reset();

                    renderDocumentationRepository();
                    showProjectToast(`Berhasil mengunggah file "${filename}" untuk ${project}!`);
                }, 300);
            }
        }, 120);
    });

    // Preview Document Details
    $('#docFilesTableBody').on('click', '.btn-preview-doc-trigger', function (e) {
        e.preventDefault();
        const docId = $(this).data('doc-id');
        const doc = MASTER_DOCUMENTS.find(d => d.id === docId);
        if (!doc) return;

        const iconCfg = getDocIconConfig(doc.fileExt);
        $('#previewDocTitle').text(doc.title);
        $('#previewDocSubtitle').html(`<i class="fa-solid fa-folder-tree me-1 text-primary"></i> ${doc.projectName} &bull; Uploaded by ${doc.author}`);
        $('#previewDocFilename').text(doc.filename);
        $('#previewDocSize').text(doc.fileSize || '2.4 MB');
        $('#previewDocCategory').text(doc.category.toUpperCase());
        $('#previewDocVersion').text(doc.version || 'v1.0.0');
        $('#previewDocStatus').text(doc.status || 'Approved');
        $('#previewDocDesc').text(doc.notes || 'Tidak ada deskripsi tambahan.');

        $('#previewDocIcon').attr('class', `${iconCfg.icon} fs-5`);
        $('#previewDocIconBox').attr('class', `p-2.5 rounded-3 d-flex align-items-center justify-content-center text-white ${iconCfg.bgClass}`);

        $('#btnPreviewDownload').off('click').on('click', function () {
            showProjectToast(`Mengunduh berkas "${doc.filename}"...`);
            $('#previewDocFileModal').modal('hide');
        });

        const previewModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('previewDocFileModal'));
        previewModal.show();
    });

    // Download Document Action
    $('#docFilesTableBody').on('click', '.btn-download-doc-trigger', function (e) {
        e.preventDefault();
        e.stopPropagation();
        const docId = $(this).data('doc-id');
        const doc = MASTER_DOCUMENTS.find(d => d.id === docId);
        if (doc) {
            showProjectToast(`Mengunduh berkas "${doc.filename}" (${doc.fileSize})...`);
        }
    });

    // Delete Document Action
    $('#docFilesTableBody').on('click', '.btn-delete-doc-trigger', function (e) {
        e.preventDefault();
        e.stopPropagation();
        const docId = $(this).data('doc-id');
        const docIndex = MASTER_DOCUMENTS.findIndex(d => d.id === docId);
        if (docIndex !== -1) {
            const removedDoc = MASTER_DOCUMENTS[docIndex];
            if (confirm(`Apakah Anda yakin ingin menghapus dokumen "${removedDoc.title}"?`)) {
                MASTER_DOCUMENTS.splice(docIndex, 1);
                localStorage.setItem('kanban_project_docs', JSON.stringify(MASTER_DOCUMENTS));
                renderDocumentationRepository();
                showProjectToast(`Dokumen "${removedDoc.filename}" berhasil dihapus.`);
            }
        }
    });

    // Initial render
    renderProjectKanban();
});
