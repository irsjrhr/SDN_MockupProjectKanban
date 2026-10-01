/**
 * ==============================================================================
 * MASTER CALENDAR & GANTT TIMELINE CONTROLLER
 * Location: /assets/js/calendar-timeline.js
 * ==============================================================================
 */

$(document).ready(function () {
    // 1. DATA DEFINITIONS (PROJECTS + TASKS)
    const DEFAULT_MASTER_PROJECTS = [
        {
            id: 'p-middleware',
            type: 'project',
            title: 'Middleware Project',
            projectName: 'Middleware Project',
            category: 'E-Commerce / API',
            badgeClass: 'badge-ecommerce',
            icon: 'fa-solid fa-bag-shopping',
            status: 'in-progress',
            progress: 65,
            priority: 'High',
            lead: 'Sophia Carter',
            leadAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-01',
            dueDate: '2026-11-15',
            url: 'KanbanTask.php'
        },
        {
            id: 'p-company',
            type: 'project',
            title: 'Company Website',
            projectName: 'Company Website',
            category: 'Corporate Web',
            badgeClass: 'badge-company',
            icon: 'fa-solid fa-globe',
            status: 'review',
            progress: 90,
            priority: 'Medium',
            lead: 'Michael Anderson',
            leadAvatar: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-08',
            dueDate: '2026-10-30',
            url: 'KanbanTask.php?project=company'
        },
        {
            id: 'p-landing',
            type: 'project',
            title: 'Landing Page Campaign',
            projectName: 'Landing Page Campaign',
            category: 'Marketing Campaign',
            badgeClass: 'badge-landing',
            icon: 'fa-solid fa-bullhorn',
            status: 'in-progress',
            progress: 40,
            priority: 'Medium',
            lead: 'Sophia Carter',
            leadAvatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-01',
            dueDate: '2026-09-20',
            url: 'KanbanTask.php?project=landing'
        },
        {
            id: 'p-mobile',
            type: 'project',
            title: 'Mobile CRM Application',
            projectName: 'Mobile CRM Application',
            category: 'Mobile Application',
            badgeClass: 'badge-company',
            icon: 'fa-solid fa-mobile-screen',
            status: 'todo',
            progress: 15,
            priority: 'High',
            lead: 'Daniel Johnson',
            leadAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-01',
            dueDate: '2027-01-15',
            url: 'KanbanTask.php?project=mobile'
        },
        {
            id: 'p-analytics',
            type: 'project',
            title: 'Internal Analytics Tool',
            projectName: 'Internal Analytics Tool',
            category: 'DevOps & Data',
            badgeClass: 'badge-ecommerce',
            icon: 'fa-solid fa-chart-line',
            status: 'completed',
            progress: 100,
            priority: 'Normal',
            lead: 'James Wilson',
            leadAvatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-01',
            dueDate: '2026-09-25',
            url: 'KanbanTask.php?project=analytics'
        }
    ];

    const DEFAULT_MASTER_TASKS = [
        {
            id: 't-1',
            type: 'task',
            title: 'Design System & Component Tokens',
            projectName: 'Middleware Project',
            category: 'Design UI',
            badgeClass: 'badge-todo',
            status: 'completed',
            progress: 100,
            priority: 'Medium',
            lead: 'Jenno Wilson',
            assignee: 'Jenno Wilson',
            leadAvatar: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=80&q=80',
            avatar: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-01',
            dueDate: '2026-09-07',
            est: '16h',
            due: 'Sep 07',
            desc: 'Setup core typography tokens, elevation scales, and dark-mode glassmorphism variables.',
            url: 'KanbanTask.php'
        },
        {
            id: 't-2',
            type: 'task',
            title: 'Authentication & Session Architecture',
            projectName: 'Middleware Project',
            category: 'Backend',
            badgeClass: 'badge-progress',
            status: 'in-progress',
            progress: 70,
            priority: 'High',
            lead: 'Sarah Chen',
            assignee: 'Sarah Chen',
            leadAvatar: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=80&q=80',
            avatar: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-04',
            dueDate: '2026-09-12',
            est: '24h',
            due: 'Sep 12',
            desc: 'JWT auth mechanism with refresh token rotation and Redis distributed cache integration.',
            url: 'KanbanTask.php'
        },
        {
            id: 't-3',
            type: 'task',
            title: 'Database Schema Migration & Indexing',
            projectName: 'Middleware Project',
            category: 'Database',
            badgeClass: 'badge-progress',
            status: 'in-progress',
            progress: 50,
            priority: 'High',
            lead: 'Alex Rivera',
            assignee: 'Alex Rivera',
            leadAvatar: 'https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=80&q=80',
            avatar: 'https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-08',
            dueDate: '2026-09-18',
            est: '32h',
            due: 'Sep 18',
            desc: 'Multi-tenant database schema migrations with query optimization for high throughput.',
            url: 'KanbanTask.php'
        },
        {
            id: 't-4',
            type: 'task',
            title: 'API Gateway & Rate Limiting Gate',
            projectName: 'Middleware Project',
            category: 'API & Gateway',
            badgeClass: 'badge-todo',
            status: 'todo',
            progress: 0,
            priority: 'Urgent',
            lead: 'Michael Scott',
            assignee: 'Michael Scott',
            leadAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-14',
            dueDate: '2026-09-25',
            est: '20h',
            due: 'Sep 25',
            desc: 'Leaky bucket algorithm for microservice endpoints protection against DDoS spikes.',
            url: 'KanbanTask.php'
        },
        {
            id: 't-5',
            type: 'task',
            title: 'Marketing Hero Section & Copywriting',
            projectName: 'Landing Page Campaign',
            category: 'Marketing',
            badgeClass: 'badge-landing',
            status: 'completed',
            progress: 100,
            priority: 'Medium',
            lead: 'Sophia Carter',
            assignee: 'Sophia Carter',
            leadAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-01',
            dueDate: '2026-09-09',
            est: '12h',
            due: 'Sep 09',
            desc: 'High-converting headline copy, dynamic 3D spline hero graphics, and fast CDN assets.',
            url: 'KanbanTask.php?project=landing'
        },
        {
            id: 't-6',
            type: 'task',
            title: 'Lead Capture Form & Salesforce Webhook',
            projectName: 'Landing Page Campaign',
            category: 'Integration',
            badgeClass: 'badge-landing',
            status: 'in-progress',
            progress: 45,
            priority: 'High',
            lead: 'David Kim',
            assignee: 'David Kim',
            leadAvatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-06',
            dueDate: '2026-09-17',
            est: '18h',
            due: 'Sep 17',
            desc: 'Real-time form validation with asynchronous queue to trigger immediate lead sync.',
            url: 'KanbanTask.php?project=landing'
        },
        {
            id: 't-7',
            type: 'task',
            title: 'Corporate Brand Asset Library Refresh',
            projectName: 'Company Website',
            category: 'Design',
            badgeClass: 'badge-company',
            status: 'completed',
            progress: 100,
            priority: 'Normal',
            lead: 'Michael Anderson',
            assignee: 'Michael Anderson',
            leadAvatar: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=80&q=80',
            avatar: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-08',
            dueDate: '2026-09-16',
            est: '14h',
            due: 'Sep 16',
            desc: 'Modern SVG vector illustrations and refreshed photo library for investor pages.',
            url: 'KanbanTask.php?project=company'
        },
        {
            id: 't-8',
            type: 'task',
            title: 'Investor Relations Dynamic Financial Chart',
            projectName: 'Company Website',
            category: 'Frontend',
            badgeClass: 'badge-company',
            status: 'review',
            progress: 90,
            priority: 'Medium',
            lead: 'Emily Watson',
            assignee: 'Emily Watson',
            leadAvatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80',
            avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-15',
            dueDate: '2026-09-28',
            est: '22h',
            due: 'Sep 28',
            desc: 'Interactive Chart.js quarterly earnings visualization with CSV download capability.',
            url: 'KanbanTask.php?project=company'
        },
        {
            id: 't-9',
            type: 'task',
            title: 'Flutter Biometric Authentication & FaceID',
            projectName: 'Mobile CRM Application',
            category: 'Mobile Dev',
            badgeClass: 'badge-company',
            status: 'todo',
            progress: 20,
            priority: 'High',
            lead: 'Daniel Johnson',
            assignee: 'Daniel Johnson',
            leadAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-02',
            dueDate: '2026-09-16',
            est: '28h',
            due: 'Sep 16',
            desc: 'Native iOS LocalAuthentication and Android BiometricPrompt security bridge.',
            url: 'KanbanTask.php?project=mobile'
        },
        {
            id: 't-10',
            type: 'task',
            title: 'Offline SQLite Sync Engine & Conflict Resolver',
            projectName: 'Mobile CRM Application',
            category: 'Architecture',
            badgeClass: 'badge-company',
            status: 'todo',
            progress: 10,
            priority: 'Urgent',
            lead: 'Daniel Johnson',
            assignee: 'Daniel Johnson',
            leadAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-12',
            dueDate: '2026-09-30',
            est: '40h',
            due: 'Sep 30',
            desc: 'Vector clocks and timestamp based reconciliation algorithm for offline work.',
            url: 'KanbanTask.php?project=mobile'
        },
        {
            id: 't-11',
            type: 'task',
            title: 'ETL Pipeline & Log Ingestion Daemon',
            projectName: 'Internal Analytics Tool',
            category: 'DevOps & Data',
            badgeClass: 'badge-ecommerce',
            status: 'completed',
            progress: 100,
            priority: 'Normal',
            lead: 'James Wilson',
            assignee: 'James Wilson',
            leadAvatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-01',
            dueDate: '2026-09-15',
            est: '30h',
            due: 'Sep 15',
            desc: 'Kafka message consumer with batch micro-loading to ClickHouse analytics warehouse.',
            url: 'KanbanTask.php?project=analytics'
        },
        {
            id: 't-12',
            type: 'task',
            title: 'Grafana Live Dashboard Integration',
            projectName: 'Internal Analytics Tool',
            category: 'Frontend & Data',
            badgeClass: 'badge-ecommerce',
            status: 'completed',
            progress: 100,
            priority: 'Medium',
            lead: 'James Wilson',
            assignee: 'James Wilson',
            leadAvatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-16',
            dueDate: '2026-09-25',
            est: '16h',
            due: 'Sep 25',
            desc: 'Embedded real-time metric panels for system latencies and API throughput monitoring.',
            url: 'KanbanTask.php?project=analytics'
        }
    ];

    let ALL_PROJECTS = JSON.parse(JSON.stringify(DEFAULT_MASTER_PROJECTS));
    let ALL_TASKS = JSON.parse(JSON.stringify(DEFAULT_MASTER_TASKS));
    let currentActiveCalBreakdownProj = null;

    window.showMasterToast = function (msg) {
        $('#masterToastMsg').text(msg);
        const toastEl = document.getElementById('masterLiveToast');
        if (toastEl) {
            const toast = bootstrap.Toast.getOrCreateInstance(toastEl);
            toast.show();
        }
    };

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

    function getFilteredItems() {
        const scope = $('#selectMasterScope').val();
        const projFilter = $('#selectMasterProject').val();
        const statusFilter = $('#masterTimelineStatusFilter').val() || 'all';

        let items = [];
        if (scope === 'all' || scope === 'project') {
            items = items.concat(ALL_PROJECTS);
        }
        if (scope === 'all' || scope === 'task') {
            items = items.concat(ALL_TASKS);
        }

        return items.filter(item => {
            if (projFilter !== 'all' && item.projectName !== projFilter) return false;
            if (statusFilter !== 'all' && item.status !== statusFilter) return false;
            return true;
        });
    }

    /* -------------------------------------------------------------------------- */
    /* TASK BREAKDOWN MODAL ENGINE FOR CALENDAR & TIMELINE                        */
    /* -------------------------------------------------------------------------- */
    function openCalendarTaskBreakdown(targetIdentifier, filterStatus) {
        let proj = null;

        if (targetIdentifier) {
            proj = ALL_PROJECTS.find(p => p.id === targetIdentifier || p.title === targetIdentifier || p.projectName === targetIdentifier);
            if (!proj) {
                const matchedTask = ALL_TASKS.find(t => t.id === targetIdentifier || t.title === targetIdentifier);
                if (matchedTask) {
                    proj = ALL_PROJECTS.find(p => p.projectName === matchedTask.projectName || p.title === matchedTask.projectName);
                }
            }
        }

        if (!proj) {
            proj = ALL_PROJECTS[0];
        }

        if (!proj) return;

        currentActiveCalBreakdownProj = proj;
        const projectTasks = ALL_TASKS.filter(t => t.projectName === proj.projectName || t.projectName === proj.title);

        // 1. Populate Header Information
        $('#calBreakdownTitle').text(proj.title);
        $('#calBreakdownCategory').text(proj.category || 'General');
        $('#calBreakdownPriority').text(`${proj.priority || 'Medium'} Priority`);

        const statusBadgeMap = {
            todo: '<span class="badge bg-danger-subtle text-danger border border-danger-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold">Planning / To Do</span>',
            'in-progress': '<span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold">In Development</span>',
            review: '<span class="badge bg-warning-subtle text-warning border border-warning-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold">Testing & Review</span>',
            completed: '<span class="badge bg-success-subtle text-success border border-success-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold">Completed / Released</span>'
        };
        $('#calBreakdownStatus').html(statusBadgeMap[proj.status] || `<span class="badge bg-light text-dark">${proj.status}</span>`);
        $('#calBreakdownLead').text(proj.lead || 'Jenno Wilson');

        const duration = calculateDays(proj.startDate, proj.dueDate);
        $('#calBreakdownDates').text(`${formatShortDate(proj.startDate)} - ${formatShortDate(proj.dueDate)}, 2026 (${duration}d)`);

        const domainHost = proj.id === 'p-middleware' ? 'api.sdn-middleware.internal' :
                           proj.id === 'p-company' ? 'www.company-portal.internal' :
                           proj.id === 'p-landing' ? 'campaign.landing-promo.internal' :
                           proj.id === 'p-mobile' ? 'app.crm-mobile.internal' : 'analytics.monitoring.internal';
        $('#calBreakdownDomain').text(domainHost).attr('href', `../Monitoring/dashboard.php?domain=${domainHost}`);
        $('#calBreakdownOpenTaskBoardBtn').attr('href', proj.url || 'KanbanTask.php');

        // Icon styling
        if (proj.icon) {
            $('#calBreakdownIcon').attr('class', `${proj.icon} fs-5`);
        }

        // 2. Calculate Counters
        const countTodo = projectTasks.filter(t => t.status === 'todo').length;
        const countProgress = projectTasks.filter(t => t.status === 'in-progress').length;
        const countReview = projectTasks.filter(t => t.status === 'review').length;
        const countDone = projectTasks.filter(t => t.status === 'completed').length;
        const total = projectTasks.length;

        const calculatedProgress = total > 0 ? Math.round((countDone / total) * 100) : (proj.progress || 0);
        $('#calBreakdownProgressPct').text(`${calculatedProgress}%`);
        $('#calBreakdownProgressBar').css('width', `${calculatedProgress}%`).attr('aria-valuenow', calculatedProgress);
        $('#calBreakdownTaskStats').html(`<i class="fa-solid fa-list-check me-1 text-primary"></i> ${countDone} of ${total} Tasks Finished`);

        $('#calBreakdownCountTodo').text(countTodo);
        $('#calBreakdownCountProgress').text(countProgress);
        $('#calBreakdownCountReview').text(countReview);
        $('#calBreakdownCountDone').text(countDone);

        // 3. Reset or Set Filters
        $('#calBreakdownSearch').val('');
        $('#calBreakdownStatusFilter').val(filterStatus || 'all');
        $('#calBreakdownPriorityFilter').val('all');

        // 4. Render Table Rows
        renderCalBreakdownTaskTable();

        // 5. Open Modal
        const modalEl = document.getElementById('calendarTaskBreakdownModal');
        if (modalEl) {
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    }

    function renderCalBreakdownTaskTable() {
        const $tbody = $('#calBreakdownTaskTableBody').empty();
        if (!currentActiveCalBreakdownProj) return;

        const proj = currentActiveCalBreakdownProj;
        const tasks = ALL_TASKS.filter(t => t.projectName === proj.projectName || t.projectName === proj.title);
        const searchKeyword = ($('#calBreakdownSearch').val() || '').toLowerCase().trim();
        const statusFilter = $('#calBreakdownStatusFilter').val() || 'all';
        const priorityFilter = $('#calBreakdownPriorityFilter').val() || 'all';

        const filteredTasks = tasks.filter(t => {
            const matchesSearch = !searchKeyword ||
                (t.title && t.title.toLowerCase().includes(searchKeyword)) ||
                (t.id && t.id.toLowerCase().includes(searchKeyword)) ||
                (t.desc && t.desc.toLowerCase().includes(searchKeyword)) ||
                ((t.assignee || t.lead) && (t.assignee || t.lead).toLowerCase().includes(searchKeyword));

            const matchesStatus = statusFilter === 'all' || t.status === statusFilter;
            const matchesPriority = priorityFilter === 'all' || t.priority === priorityFilter;

            return matchesSearch && matchesStatus && matchesPriority;
        });

        if (filteredTasks.length === 0) {
            $tbody.html(`
                <tr>
                    <td colspan="7" class="text-center py-4 text-muted fs-8">
                        <i class="fa-regular fa-folder-open fs-5 d-block mb-1 text-secondary"></i>
                        No tasks found matching filter criteria in <strong>${proj.title}</strong>.
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

        $.each(filteredTasks, function (_, task) {
            const avatarImg = task.avatar || task.leadAvatar || 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80';
            const assigneeName = task.assignee || task.lead || 'Engineer';
            const progressBarColor = task.status === 'completed' ? 'bg-success' : task.status === 'review' ? 'bg-warning' : 'bg-primary';

            const $tr = $(`
                <tr>
                    <td class="ps-3 py-2.5">
                        <span class="badge bg-light text-dark border font-monospace fs-8 px-2 py-1">${task.id}</span>
                    </td>
                    <td class="py-2.5">
                        <div class="fw-bold text-dark fs-7">${task.title}</div>
                        <span class="fs-8 text-muted d-block text-truncate" style="max-width: 320px;">${task.desc || 'Task delivery milestone and specifications.'}</span>
                    </td>
                    <td class="py-2.5">
                        ${taskStatusBadgeMap[task.status] || task.status}
                    </td>
                    <td class="py-2.5">
                        ${taskPriorityBadgeMap[task.priority] || task.priority}
                    </td>
                    <td class="py-2.5">
                        <div class="d-flex align-items-center gap-2">
                            <img src="${avatarImg}" class="avatar-xs rounded-circle border" alt="${assigneeName}">
                            <span class="fs-8 fw-semibold text-dark">${assigneeName}</span>
                        </div>
                    </td>
                    <td class="py-2.5">
                        <div class="d-flex align-items-center gap-1.5 fs-8 text-muted mb-1">
                            <i class="fa-regular fa-clock text-primary"></i> ${task.est || '16h'} &bull; ${task.due || formatShortDate(task.dueDate)}
                        </div>
                        <div class="progress" style="height: 4px; width: 80px;">
                            <div class="progress-bar ${progressBarColor}" style="width: ${task.progress || (task.status === 'completed' ? 100 : 40)}%;"></div>
                        </div>
                    </td>
                    <td class="pe-3 py-2.5 text-end">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-sm btn-light border btn-cal-task-toggle-status" data-task-id="${task.id}" title="Cycle Status">
                                <i class="fa-solid fa-arrows-rotate text-primary fs-8"></i>
                            </button>
                            <a href="${task.url || proj.url || 'KanbanTask.php'}" class="btn btn-sm btn-light border" title="Open in Task Board">
                                <i class="fa-solid fa-arrow-up-right-from-square fs-8 text-secondary"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            `);

            // Quick Status Cycle inside modal
            $tr.find('.btn-cal-task-toggle-status').on('click', function (e) {
                e.stopPropagation();
                const statusOrder = ['todo', 'in-progress', 'review', 'completed'];
                const nextIdx = (statusOrder.indexOf(task.status) + 1) % statusOrder.length;
                task.status = statusOrder[nextIdx];
                task.progress = task.status === 'completed' ? 100 : task.status === 'review' ? 85 : task.status === 'in-progress' ? 50 : 0;

                openCalendarTaskBreakdown(proj.id, $('#calBreakdownStatusFilter').val());
                renderMasterCalendar();
                renderMasterTimeline();
                renderMasterTimelineSchedulerTable();
                renderRoadmapCards();
                showMasterToast(`Task ${task.id} updated to ${task.status.toUpperCase()}`);
            });

            $tbody.append($tr);
        });
    }

    // Modal Search and Filter listeners
    $('#calBreakdownSearch').on('input', function () {
        renderCalBreakdownTaskTable();
    });

    $('#calBreakdownStatusFilter, #calBreakdownPriorityFilter').on('change', function () {
        renderCalBreakdownTaskTable();
    });

    $('.cal-breakdown-stat-filter').on('click', function () {
        const targetStatus = $(this).data('status');
        $('#calBreakdownStatusFilter').val(targetStatus);
        renderCalBreakdownTaskTable();
    });

    // Quick Add Task inside modal
    $('#btnCalBreakdownQuickAddTask').on('click', function () {
        if (!currentActiveCalBreakdownProj) return;
        const taskTitle = prompt(`Enter new task title for "${currentActiveCalBreakdownProj.title}":`);
        if (taskTitle && taskTitle.trim()) {
            const newTaskId = `t-${Date.now().toString().slice(-4)}`;
            const newTask = {
                id: newTaskId,
                type: 'task',
                title: taskTitle.trim(),
                projectName: currentActiveCalBreakdownProj.projectName || currentActiveCalBreakdownProj.title,
                category: 'Development',
                badgeClass: 'badge-progress',
                status: 'todo',
                progress: 0,
                priority: 'Medium',
                lead: currentActiveCalBreakdownProj.lead || 'Sophia Carter',
                assignee: currentActiveCalBreakdownProj.lead || 'Sophia Carter',
                leadAvatar: currentActiveCalBreakdownProj.leadAvatar,
                avatar: currentActiveCalBreakdownProj.leadAvatar,
                startDate: '2026-09-01',
                dueDate: '2026-09-15',
                est: '16h',
                due: 'Sep 15',
                desc: 'Quickly scheduled task from Calendar Timeline breakdown modal.',
                url: currentActiveCalBreakdownProj.url || 'KanbanTask.php'
            };

            ALL_TASKS.push(newTask);
            openCalendarTaskBreakdown(currentActiveCalBreakdownProj.id, $('#calBreakdownStatusFilter').val());
            renderMasterCalendar();
            renderMasterTimeline();
            renderMasterTimelineSchedulerTable();
            renderRoadmapCards();
            showMasterToast(`Added task "${taskTitle.trim()}" to ${currentActiveCalBreakdownProj.title}`);
        }
    });

    // Expose openCalendarTaskBreakdown globally for direct onclick calls if needed
    window.openCalendarTaskBreakdown = openCalendarTaskBreakdown;

    /* -------------------------------------------------------------------------- */
    /* 2. TAB SWITCHERS                                                           */
    /* -------------------------------------------------------------------------- */
    $('#masterViewTabs .tab-btn').on('click', function () {
        $('#masterViewTabs .tab-btn').removeClass('active');
        $(this).addClass('active');

        const view = $(this).data('view');
        $('.view-wrapper .view-content').removeClass('active');

        if (view === 'calendar-timeline') {
            $('#viewMasterCalendar').addClass('active');
            renderMasterCalendar();
            renderMasterTimeline();
            renderMasterTimelineSchedulerTable();
        } else if (view === 'delivery-roadmap') {
            $('#viewDeliveryRoadmap').addClass('active');
            renderRoadmapCards();
        } else if (view === 'timeline-config') {
            $('#viewTimelineConfig').addClass('active');
        }
    });

    $('#masterCalendarSubTabs .cal-subtab-btn').on('click', function () {
        $('#masterCalendarSubTabs .cal-subtab-btn').removeClass('active');
        $(this).addClass('active');

        const subview = $(this).data('subview');
        $('#viewMasterCalendar .calendar-subview-content').removeClass('active');

        if (subview === 'grid') {
            $('#subviewMasterGrid').addClass('active');
            renderMasterCalendar();
        } else if (subview === 'timeline') {
            $('#subviewMasterTimeline').addClass('active');
            renderMasterTimeline();
        } else if (subview === 'schedule-manager') {
            $('#subviewMasterScheduleManager').addClass('active');
            renderMasterTimelineSchedulerTable();
        }
    });

    $('#selectMasterScope, #selectMasterProject, #masterTimelineStatusFilter').on('change', function () {
        renderMasterCalendar();
        renderMasterTimeline();
        renderMasterTimelineSchedulerTable();
        renderRoadmapCards();
    });

    /* -------------------------------------------------------------------------- */
    /* 3. RENDER MASTER CALENDAR GRID (PROJECTS & TASKS TOGETHER)                 */
    /* -------------------------------------------------------------------------- */
    function renderMasterCalendar() {
        const $grid = $('#masterCalendarGrid').empty();
        const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        $.each(daysOfWeek, function (_, day) {
            $grid.append(`<div class="cal-day-header text-muted fw-bold fs-8 text-center p-2 text-uppercase bg-light rounded-2">${day}</div>`);
        });

        const items = getFilteredItems();

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
                    ${isCurrentMonth ? `<button class="btn btn-sm btn-link text-decoration-none cal-cell-add-btn text-muted" title="Add schedule on Sep ${dayNum}"><i class="fa-solid fa-plus"></i></button>` : ''}
                </div>
            `);

            $cellHeader.find('.cal-cell-add-btn').on('click', function (e) {
                e.stopPropagation();
                $('#entryStartDate, #entryDueDate').val(dateStr);
                $('#newEntryModal').modal('show');
            });

            $cell.append($cellHeader);

            if (isCurrentMonth) {
                const thisDate = new Date(dateStr);
                const dayItems = items.filter(item => {
                    const start = new Date(item.startDate || '2026-09-01');
                    const due = new Date(item.dueDate || '2026-09-30');
                    return start <= thisDate && thisDate <= due;
                });

                // Sort so Projects come first then Tasks
                dayItems.sort((a, b) => (a.type === 'project' ? -1 : 1));

                $.each(dayItems.slice(0, 3), function (_, it) {
                    const isProj = it.type === 'project';
                    const statusClass = isProj ? 'bg-primary text-white border-0' : `badge-${it.status === 'completed' ? 'complete' : it.status === 'in-progress' ? 'progress' : it.status}`;
                    const icon = isProj ? 'fa-solid fa-folder-tree' : 'fa-solid fa-check-double';

                    const $pill = $('<div>', {
                        class: `cal-task-pill ${statusClass} text-truncate d-flex align-items-center gap-1 shadow-2xs cursor-pointer`,
                        title: `[${isProj ? 'Project' : 'Task'}] ${it.title} (${formatShortDate(it.startDate)} - ${formatShortDate(it.dueDate)})\nClick to view task breakdown`
                    });
                    $pill.html(`<i class="${icon} fs-9"></i> <span class="fw-semibold">${isProj ? '⭐ ' : ''}${it.title}</span>`);
                    
                    // Clicking pill opens the breakdown modal for this project / task's parent project
                    $pill.on('click', function (e) {
                        e.stopPropagation();
                        openCalendarTaskBreakdown(it.projectName || it.title || it.id);
                    });
                    $cell.append($pill);
                });

                if (dayItems.length > 3) {
                    const $moreBadge = $(`<span class="fs-9 text-muted fw-bold cursor-pointer hover-text-primary">+${dayItems.length - 3} more</span>`);
                    $moreBadge.on('click', function (e) {
                        e.stopPropagation();
                        if (dayItems[0]) openCalendarTaskBreakdown(dayItems[0].projectName || dayItems[0].title);
                    });
                    $cell.append($moreBadge);
                }
            }

            $grid.append($cell);
        }
    }

    /* -------------------------------------------------------------------------- */
    /* 4. RENDER UNIFIED GANTT TIMELINE (MULTI-TIER: PROJECTS & TASKS)           */
    /* -------------------------------------------------------------------------- */
    function renderMasterTimeline() {
        const $list = $('#masterTimelineList').empty();
        const groupMode = $('#ganttGroupingToggle .btn.active').data('group') || 'by-project';
        const items = getFilteredItems();

        if (items.length === 0) {
            $list.html('<div class="text-center text-muted p-4 fs-7"><i class="fa-regular fa-folder-open me-2"></i> No timeline items found for current filter.</div>');
            return;
        }

        const statusClassMap = {
            todo: 'timeline-bar-todo',
            'in-progress': 'timeline-bar-progress',
            review: 'timeline-bar-review',
            completed: 'timeline-bar-complete'
        };

        const statusBadgeMap = {
            todo: '<span class="badge badge-todo rounded-pill px-2 py-0.5 fs-8 me-1">To Do</span>',
            'in-progress': '<span class="badge badge-progress rounded-pill px-2 py-0.5 fs-8 me-1">In Progress</span>',
            review: '<span class="badge badge-review rounded-pill px-2 py-0.5 fs-8 me-1">Review</span>',
            completed: '<span class="badge badge-complete rounded-pill px-2 py-0.5 fs-8 me-1">Complete</span>'
        };

        if (groupMode === 'by-project') {
            // Group tasks under their respective projects
            const projectsToRender = ALL_PROJECTS.filter(p => {
                const projFilter = $('#selectMasterProject').val();
                return projFilter === 'all' || p.projectName === projFilter;
            });

            $.each(projectsToRender, function (_, proj) {
                const startObj = new Date(proj.startDate || '2026-09-01');
                const startDay = Math.min(30, Math.max(1, startObj.getDate()));
                const duration = calculateDays(proj.startDate || '2026-09-01', proj.dueDate || '2026-09-30');
                const startMargin = ((startDay - 1) / 30) * 100;
                const widthPercent = Math.max(12, Math.min(100 - startMargin, (duration / 30) * 100));

                // 1. Project Master Header Bar
                const $projRow = $(`
                    <div class="gantt-grid-row gap-3 bg-light-subtle rounded-3 p-2 border border-primary-subtle shadow-2xs mb-1">
                        <div class="d-flex flex-column" style="min-width: 0;">
                            <div class="d-flex align-items-center gap-1.5">
                                <span class="badge bg-primary fs-9 px-1.5 py-0.5">PROJECT</span>
                                <a href="javascript:void(0)" class="fw-extrabold fs-7 text-dark text-truncate text-decoration-none btn-open-proj-breakdown" data-proj-id="${proj.id}" title="Click to view task breakdown">${proj.title}</a>
                            </div>
                            <div class="d-flex align-items-center gap-1 mt-1 flex-wrap">
                                <span class="badge ${proj.badgeClass} fs-9">${proj.category}</span>
                                <span class="fs-8 text-muted fw-semibold">${formatShortDate(proj.startDate)} - ${formatShortDate(proj.dueDate)} (${duration}d)</span>
                            </div>
                        </div>

                        <div class="px-2">
                            <div class="timeline-bar-track position-relative cursor-pointer btn-open-proj-breakdown" data-proj-id="${proj.id}" style="height: 22px; border-radius: 999px;" title="Click to view task breakdown">
                                <div class="timeline-bar-fill bg-primary d-flex align-items-center justify-content-between text-white fs-9 fw-bold px-2 text-truncate" 
                                     style="width: ${widthPercent}%; margin-left: ${startMargin}%; height: 100%; border-radius: 999px;">
                                    <span>${duration}d</span>
                                    <span class="badge bg-dark bg-opacity-25 fs-9 py-0.5 px-1.5 rounded-pill">${proj.progress}%</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <img src="${proj.leadAvatar}" class="avatar-xs rounded-circle border border-white" alt="${proj.lead}">
                            <button class="btn btn-sm btn-outline-info py-0.5 px-2 fs-8 btn-open-proj-breakdown" data-proj-id="${proj.id}" title="View Task Breakdown">
                                <i class="fa-solid fa-list-check"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-primary py-0.5 px-2 fs-8 btn-master-adjust-timeline" data-item-id="${proj.id}" title="Adjust Timeline">
                                <i class="fa-solid fa-sliders"></i>
                            </button>
                            <a href="${proj.url}" class="btn btn-sm btn-light border py-0.5 px-2 fs-8" title="Open Project Board">
                                <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i>
                            </a>
                        </div>
                    </div>
                `);

                $projRow.find('.btn-open-proj-breakdown').on('click', function (e) {
                    e.stopPropagation();
                    openCalendarTaskBreakdown(proj.id);
                });

                $list.append($projRow);

                // 2. Child Tasks under this project
                const childTasks = ALL_TASKS.filter(t => t.projectName === proj.projectName || t.projectName === proj.title);
                $.each(childTasks, function (_, task) {
                    const tStartObj = new Date(task.startDate || '2026-09-01');
                    const tStartDay = Math.min(30, Math.max(1, tStartObj.getDate()));
                    const tDuration = calculateDays(task.startDate || '2026-09-01', task.dueDate || '2026-09-30');
                    const tStartMargin = ((tStartDay - 1) / 30) * 100;
                    const tWidthPercent = Math.max(10, Math.min(100 - tStartMargin, (tDuration / 30) * 100));

                    const $taskRow = $(`
                        <div class="gantt-grid-row gantt-task-child-row gap-3 ps-4 ms-3 mb-1 border-start border-3 border-primary bg-light-subtle rounded-end-3 py-2">
                            <div class="d-flex flex-column" style="min-width: 0;">
                                <div class="d-flex align-items-center gap-1.5">
                                    <span class="badge bg-secondary-subtle text-dark fs-9 px-1.5 py-0.5"><i class="fa-solid fa-code-branch me-1 text-primary"></i>TASK</span>
                                    <span class="fw-bold fs-7 text-dark text-truncate cursor-pointer hover-text-primary btn-open-task-breakdown" data-proj-id="${proj.id}" title="Click to view breakdown">${task.title}</span>
                                </div>
                                <div class="d-flex align-items-center gap-1 mt-1 flex-wrap">
                                    ${statusBadgeMap[task.status] || ''}
                                    <span class="fs-8 text-muted">${formatShortDate(task.startDate)} - ${formatShortDate(task.dueDate)} (${tDuration}d)</span>
                                </div>
                            </div>

                            <div class="px-2">
                                <div class="timeline-bar-track position-relative cursor-pointer btn-open-task-breakdown" data-proj-id="${proj.id}" style="height: 16px; border-radius: 999px;" title="Click to view project tasks">
                                    <div class="timeline-bar-fill ${statusClassMap[task.status] || 'timeline-bar-progress'} d-flex align-items-center justify-content-center text-white fs-9 fw-bold px-2 text-truncate" 
                                         style="width: ${tWidthPercent}%; margin-left: ${tStartMargin}%; height: 100%; border-radius: 999px;">
                                        ${tDuration >= 4 ? `${tDuration}d` : ''}
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end gap-2">
                                <img src="${task.leadAvatar || task.avatar}" class="avatar-xs rounded-circle border border-white" alt="${task.lead}">
                                <button class="btn btn-sm btn-outline-secondary py-0.5 px-2 fs-8 btn-master-adjust-timeline" data-item-id="${task.id}" title="Adjust Task Schedule">
                                    <i class="fa-solid fa-sliders"></i>
                                </button>
                            </div>
                        </div>
                    `);

                    $taskRow.find('.btn-open-task-breakdown').on('click', function (e) {
                        e.stopPropagation();
                        openCalendarTaskBreakdown(proj.id);
                    });

                    $list.append($taskRow);
                });
            });
        } else {
            // Flat items list
            $.each(items, function (_, it) {
                const isProj = it.type === 'project';
                const startObj = new Date(it.startDate || '2026-09-01');
                const startDay = Math.min(30, Math.max(1, startObj.getDate()));
                const duration = calculateDays(it.startDate || '2026-09-01', it.dueDate || '2026-09-30');
                const startMargin = ((startDay - 1) / 30) * 100;
                const widthPercent = Math.max(10, Math.min(100 - startMargin, (duration / 30) * 100));

                const $row = $(`
                    <div class="gantt-grid-row gap-3 mb-1 ${isProj ? 'bg-light-subtle rounded-3 p-1.5 border' : ''}">
                        <div class="d-flex flex-column" style="min-width: 0;">
                            <div class="d-flex align-items-center gap-1.5">
                                <span class="badge ${isProj ? 'bg-primary' : 'bg-secondary-subtle text-dark'} fs-9 px-1.5 py-0.5">${isProj ? 'PROJECT' : 'TASK'}</span>
                                <span class="fw-bold fs-7 text-dark text-truncate cursor-pointer hover-text-primary btn-open-flat-breakdown" data-proj-name="${it.projectName || it.title}" title="Click to view breakdown">${it.title}</span>
                            </div>
                            <div class="d-flex align-items-center gap-1 mt-1 flex-wrap">
                                ${statusBadgeMap[it.status] || ''}
                                <span class="fs-8 text-muted">${formatShortDate(it.startDate)} - ${formatShortDate(it.dueDate)} (${duration}d) &bull; ${it.projectName}</span>
                            </div>
                        </div>

                        <div class="px-2">
                            <div class="timeline-bar-track position-relative cursor-pointer btn-open-flat-breakdown" data-proj-name="${it.projectName || it.title}" style="height: ${isProj ? '20px' : '16px'}; border-radius: 999px;" title="Click to view breakdown">
                                <div class="timeline-bar-fill ${isProj ? 'bg-primary' : statusClassMap[it.status] || 'timeline-bar-progress'} d-flex align-items-center justify-content-center text-white fs-9 fw-bold px-2 text-truncate" 
                                     style="width: ${widthPercent}%; margin-left: ${startMargin}%; height: 100%; border-radius: 999px;">
                                    ${duration >= 4 ? `${duration}d` : ''}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <img src="${it.leadAvatar || it.avatar}" class="avatar-xs rounded-circle border border-white" alt="${it.lead}">
                            <button class="btn btn-sm btn-outline-info py-0.5 px-2 fs-8 btn-open-flat-breakdown" data-proj-name="${it.projectName || it.title}" title="View Breakdown">
                                <i class="fa-solid fa-list-check"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-secondary py-0.5 px-2 fs-8 btn-master-adjust-timeline" data-item-id="${it.id}" title="Adjust Schedule">
                                <i class="fa-solid fa-sliders"></i>
                            </button>
                        </div>
                    </div>
                `);

                $row.find('.btn-open-flat-breakdown').on('click', function (e) {
                    e.stopPropagation();
                    openCalendarTaskBreakdown($(this).data('proj-name'));
                });

                $list.append($row);
            });
        }

        $('.btn-master-adjust-timeline').on('click', function (e) {
            e.stopPropagation();
            const itemId = $(this).data('item-id');
            $('#masterCalendarSubTabs .cal-subtab-btn[data-subview="schedule-manager"]').trigger('click');
            setTimeout(() => {
                const $targetRow = $(`#row-master-sched-${itemId}`);
                if ($targetRow.length) {
                    $targetRow[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                    $targetRow.addClass('table-primary');
                    setTimeout(() => $targetRow.removeClass('table-primary'), 1500);
                }
            }, 50);
        });
    }

    $('#ganttGroupingToggle .btn').on('click', function () {
        $('#ganttGroupingToggle .btn').removeClass('active');
        $(this).addClass('active');
        renderMasterTimeline();
    });

    /* -------------------------------------------------------------------------- */
    /* 5. RENDER MASTER UNIFIED TIMELINE SCHEDULER TABLE                          */
    /* -------------------------------------------------------------------------- */
    function renderMasterTimelineSchedulerTable() {
        const $tbody = $('#masterTimelineSchedulerTableBody').empty();
        const items = getFilteredItems();

        $('#schedulerCountSummary').text(`${ALL_PROJECTS.length} Projects • ${ALL_TASKS.length} Tasks`);

        const statusBadgeMap = {
            todo: '<span class="badge badge-todo rounded-pill px-2 py-1 fs-8">To Do</span>',
            'in-progress': '<span class="badge badge-progress rounded-pill px-2 py-1 fs-8">In Progress</span>',
            review: '<span class="badge badge-review rounded-pill px-2 py-1 fs-8">Review</span>',
            completed: '<span class="badge badge-complete rounded-pill px-2 py-1 fs-8">Complete</span>'
        };

        $.each(items, function (_, it) {
            const isProj = it.type === 'project';
            const startDateVal = it.startDate || '2026-09-01';
            const dueDateVal = it.dueDate || '2026-09-30';
            const priorityVal = it.priority || 'Medium';
            const durationDays = calculateDays(startDateVal, dueDateVal);

            const $tr = $('<tr>', { id: `row-master-sched-${it.id}`, class: isProj ? 'table-light' : '' });
            $tr.html(`
                <!-- Type Badge -->
                <td class="py-2.5 px-3">
                    <span class="badge ${isProj ? 'bg-primary' : 'bg-secondary-subtle text-dark'} rounded-pill px-2 py-1 fs-8 fw-semibold">
                        ${isProj ? '<i class="fa-solid fa-layer-group me-1"></i> Project' : '<i class="fa-solid fa-check me-1"></i> Task'}
                    </span>
                </td>

                <!-- Item Title & Parent Project -->
                <td class="py-2.5 px-2">
                    <div class="d-flex align-items-center gap-2">
                        <img src="${it.leadAvatar || it.avatar}" class="avatar-xs rounded-circle border" alt="${it.lead}">
                        <div>
                            <a href="javascript:void(0)" class="fw-bold text-dark text-decoration-none d-block btn-sched-breakdown" data-proj-name="${it.projectName || it.title}" title="Click to view task breakdown">${it.title}</a>
                            <span class="fs-8 text-muted">${it.projectName} &bull; Lead: ${it.lead}</span>
                        </div>
                    </div>
                </td>

                <!-- Status -->
                <td class="py-2.5 px-2">${statusBadgeMap[it.status] || ''}</td>

                <!-- Priority Selector -->
                <td class="py-2.5 px-2">
                    <select class="form-select form-select-sm fs-8 py-1 master-sched-priority" data-item-id="${it.id}">
                        <option value="Normal" ${priorityVal === 'Normal' ? 'selected' : ''}>Normal</option>
                        <option value="Medium" ${priorityVal === 'Medium' ? 'selected' : ''}>Medium</option>
                        <option value="High" ${priorityVal === 'High' ? 'selected' : ''}>High</option>
                        <option value="Urgent" ${priorityVal === 'Urgent' ? 'selected' : ''}>Urgent</option>
                    </select>
                </td>

                <!-- Start Date Input -->
                <td class="py-2.5 px-2">
                    <input type="date" class="form-control form-control-sm fs-8 py-1 master-sched-start" data-item-id="${it.id}" value="${startDateVal}">
                </td>

                <!-- Due Date Input -->
                <td class="py-2.5 px-2">
                    <input type="date" class="form-control form-control-sm fs-8 py-1 master-sched-due" data-item-id="${it.id}" value="${dueDateVal}">
                </td>

                <!-- Duration Badge -->
                <td class="py-2.5 px-2">
                    <span class="badge bg-white text-dark border fs-8 px-2 py-1" id="master-dur-${it.id}">
                        <i class="fa-regular fa-clock me-1 text-primary"></i> ${durationDays}d
                    </span>
                </td>

                <!-- Quick Preset Adjustments -->
                <td class="py-2.5 px-2">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-outline-secondary fs-9 py-0.5 px-1.5 btn-master-preset" data-item-id="${it.id}" data-days="7" title="+1 Week">+1w</button>
                        <button class="btn btn-outline-secondary fs-9 py-0.5 px-1.5 btn-master-preset" data-item-id="${it.id}" data-days="14" title="+2 Weeks">+2w</button>
                        <button class="btn btn-outline-secondary fs-9 py-0.5 px-1.5 btn-master-preset" data-item-id="${it.id}" data-days="30" title="+1 Month">+1m</button>
                        <button class="btn btn-outline-primary fs-9 py-0.5 px-1.5 btn-master-preset" data-item-id="${it.id}" data-days="90" title="Quarter Q4">Q4</button>
                    </div>
                </td>

                <!-- Actions -->
                <td class="py-2.5 px-3 text-end">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-light border btn-sched-breakdown" data-proj-name="${it.projectName || it.title}" title="View Task Breakdown">
                            <i class="fa-solid fa-list-check text-info"></i>
                        </button>
                        <button class="btn btn-light border btn-save-master-sched" data-item-id="${it.id}" title="Save Schedule Changes">
                            <i class="fa-solid fa-check text-success"></i>
                        </button>
                        <a href="${it.url}" class="btn btn-light border" title="Go to Board">
                            <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i>
                        </a>
                    </div>
                </td>
            `);

            $tr.find('.btn-sched-breakdown').on('click', function (e) {
                e.stopPropagation();
                openCalendarTaskBreakdown($(this).data('proj-name'));
            });

            $tbody.append($tr);
        });

        // Date Change Handler
        $('.master-sched-start, .master-sched-due').on('change', function () {
            const itemId = $(this).data('item-id');
            const $row = $(`#row-master-sched-${itemId}`);
            const startVal = $row.find('.master-sched-start').val();
            const dueVal = $row.find('.master-sched-due').val();

            if (startVal && dueVal) {
                const dur = calculateDays(startVal, dueVal);
                $row.find(`#master-dur-${itemId}`).html(`<i class="fa-regular fa-clock me-1 text-primary"></i> ${dur}d`);

                let target = ALL_PROJECTS.find(p => p.id === itemId) || ALL_TASKS.find(t => t.id === itemId);
                if (target) {
                    target.startDate = startVal;
                    target.dueDate = dueVal;
                    showMasterToast(`Updated timeline for "${target.title}" (${dur} days)`);
                }
            }
        });

        // Priority Change Handler
        $('.master-sched-priority').on('change', function () {
            const itemId = $(this).data('item-id');
            const priorityVal = $(this).val();
            let target = ALL_PROJECTS.find(p => p.id === itemId) || ALL_TASKS.find(t => t.id === itemId);
            if (target) {
                target.priority = priorityVal;
                showMasterToast(`Priority for "${target.title}" updated to ${priorityVal}`);
            }
        });

        // Preset Buttons
        $('.btn-master-preset').on('click', function () {
            const itemId = $(this).data('item-id');
            const addDays = parseInt($(this).data('days'), 10);
            const $row = $(`#row-master-sched-${itemId}`);
            const startVal = $row.find('.master-sched-start').val() || '2026-09-01';

            const sDate = new Date(startVal);
            sDate.setDate(sDate.getDate() + addDays);
            const newDueStr = sDate.toISOString().split('T')[0];

            $row.find('.master-sched-due').val(newDueStr).trigger('change');
        });

        // Save Single Item
        $('.btn-save-master-sched').on('click', function () {
            const itemId = $(this).data('item-id');
            let target = ALL_PROJECTS.find(p => p.id === itemId) || ALL_TASKS.find(t => t.id === itemId);
            if (target) {
                showMasterToast(`Schedule saved for "${target.title}"!`);
                renderMasterCalendar();
                renderMasterTimeline();
            }
        });
    }

    /* -------------------------------------------------------------------------- */
    /* 6. RENDER DELIVERY ROADMAP CARDS                                          */
    /* -------------------------------------------------------------------------- */
    function renderRoadmapCards() {
        const $container = $('#roadmapProjectsContainer').empty();
        const projFilter = $('#selectMasterProject').val();

        const projects = ALL_PROJECTS.filter(p => projFilter === 'all' || p.projectName === projFilter);

        $.each(projects, function (_, proj) {
            const childTasks = ALL_TASKS.filter(t => t.projectName === proj.projectName || t.projectName === proj.title);
            const doneCount = childTasks.filter(t => t.status === 'completed').length;
            const totalCount = childTasks.length;

            const $card = $(`
                <div class="p-3 border rounded-4 bg-light-subtle shadow-2xs">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge-icon-sm ${proj.badgeClass} p-1.5 rounded-2"><i class="${proj.icon}"></i></span>
                            <a href="javascript:void(0)" class="fw-bold text-dark fs-6 text-decoration-none btn-roadmap-open-breakdown" data-proj-id="${proj.id}">${proj.title}</a>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-sm btn-outline-primary fs-8 py-0.5 px-2 rounded-2 btn-roadmap-open-breakdown" data-proj-id="${proj.id}" title="View Deliverables Breakdown">
                                <i class="fa-solid fa-list-check me-1"></i> Breakdown
                            </button>
                            <span class="badge ${proj.progress === 100 ? 'bg-success' : 'bg-primary'}">${proj.status === 'completed' ? 'Delivered' : 'On Track'} (${proj.progress}%)</span>
                        </div>
                    </div>
                    <div class="progress mb-2 cursor-pointer btn-roadmap-open-breakdown" data-proj-id="${proj.id}" style="height: 10px;" title="Click to view task breakdown">
                        <div class="progress-bar ${proj.progress === 100 ? 'bg-success' : 'bg-primary'}" style="width: ${proj.progress}%;"></div>
                    </div>
                    <div class="d-flex flex-wrap align-items-center justify-content-between fs-8 text-muted">
                        <span><i class="fa-regular fa-calendar me-1"></i> ${formatShortDate(proj.startDate)} - ${formatShortDate(proj.dueDate)}</span>
                        <span>Lead: ${proj.lead} &bull; <strong class="text-primary">${doneCount}/${totalCount} Tasks Complete</strong></span>
                    </div>
                </div>
            `);

            $card.find('.btn-roadmap-open-breakdown').on('click', function (e) {
                e.stopPropagation();
                openCalendarTaskBreakdown(proj.id);
            });

            $container.append($card);
        });
    }

    /* -------------------------------------------------------------------------- */
    /* 7. RESET & MONTH NAVIGATION                                                */
    /* -------------------------------------------------------------------------- */
    $('#btnSyncAllMaster').on('click', function () {
        ALL_PROJECTS = JSON.parse(JSON.stringify(DEFAULT_MASTER_PROJECTS));
        ALL_TASKS = JSON.parse(JSON.stringify(DEFAULT_MASTER_TASKS));
        renderMasterCalendar();
        renderMasterTimeline();
        renderMasterTimelineSchedulerTable();
        renderRoadmapCards();
        showMasterToast('All project and task schedules reset to defaults.');
    });

    $('#btnMasterPrevMonth').on('click', function () {
        $('#masterCalendarMonthTitle').text('August 2026');
        showMasterToast('Showing August 2026 calendar view');
    });

    $('#btnMasterToday').on('click', function () {
        $('#masterCalendarMonthTitle').text('September 2026');
        renderMasterCalendar();
        showMasterToast('Reset to Current Month: September 2026');
    });

    $('#btnMasterNextMonth').on('click', function () {
        $('#masterCalendarMonthTitle').text('October 2026');
        showMasterToast('Showing October 2026 calendar view');
    });

    // Add New Schedule Entry Form Submission
    $('#newEntryForm').on('submit', function (e) {
        e.preventDefault();
        const type = $('#entryType').val();
        const title = $('#entryTitle').val();
        const project = $('#entryProject').val();
        const start = $('#entryStartDate').val();
        const due = $('#entryDueDate').val();
        const priority = $('#entryPriority').val();
        const status = $('#entryStatus').val();

        const newId = 'entry-' + Date.now();
        const newItem = {
            id: newId,
            type: type,
            title: title,
            projectName: project,
            category: type === 'project' ? 'New Project' : 'General Task',
            badgeClass: 'badge-progress',
            icon: type === 'project' ? 'fa-solid fa-folder-tree' : 'fa-solid fa-check',
            status: status,
            progress: status === 'completed' ? 100 : status === 'in-progress' ? 50 : 0,
            priority: priority,
            lead: 'Jenno Wilson',
            assignee: 'Jenno Wilson',
            leadAvatar: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=80&q=80',
            avatar: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=80&q=80',
            startDate: start,
            dueDate: due,
            est: '16h',
            due: formatShortDate(due),
            desc: `Created entry: ${title}`,
            url: type === 'project' ? 'KanbanProject.php' : 'KanbanTask.php'
        };

        if (type === 'project') {
            ALL_PROJECTS.push(newItem);
        } else {
            ALL_TASKS.push(newItem);
        }

        $('#newEntryModal').modal('hide');
        $('#newEntryForm')[0].reset();
        renderMasterCalendar();
        renderMasterTimeline();
        renderMasterTimelineSchedulerTable();
        renderRoadmapCards();
        showMasterToast(`Added new ${type}: "${title}"!`);
    });

    // Initial Boot
    renderMasterCalendar();
    renderMasterTimeline();
    renderMasterTimelineSchedulerTable();
    renderRoadmapCards();
});
