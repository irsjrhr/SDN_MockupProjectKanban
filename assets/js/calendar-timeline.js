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
            leadAvatar: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-01',
            dueDate: '2026-09-07',
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
            leadAvatar: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-04',
            dueDate: '2026-09-12',
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
            leadAvatar: 'https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-08',
            dueDate: '2026-09-18',
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
            leadAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-14',
            dueDate: '2026-09-25',
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
            leadAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-01',
            dueDate: '2026-09-09',
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
            leadAvatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-06',
            dueDate: '2026-09-17',
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
            leadAvatar: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-08',
            dueDate: '2026-09-16',
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
            leadAvatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-15',
            dueDate: '2026-09-28',
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
            leadAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-02',
            dueDate: '2026-09-16',
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
            leadAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            startDate: '2026-09-12',
            dueDate: '2026-09-30',
            url: 'KanbanTask.php?project=mobile'
        }
    ];

    let ALL_PROJECTS = JSON.parse(JSON.stringify(DEFAULT_MASTER_PROJECTS));
    let ALL_TASKS = JSON.parse(JSON.stringify(DEFAULT_MASTER_TASKS));

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
                        title: `[${isProj ? 'Project' : 'Task'}] ${it.title} (${formatShortDate(it.startDate)} - ${formatShortDate(it.dueDate)})`
                    });
                    $pill.html(`<i class="${icon} fs-9"></i> <span class="fw-semibold">${isProj ? '⭐ ' : ''}${it.title}</span>`);
                    $pill.on('click', function (e) {
                        e.stopPropagation();
                        window.location.href = it.url;
                    });
                    $cell.append($pill);
                });

                if (dayItems.length > 3) {
                    $cell.append(`<span class="fs-9 text-muted fw-bold">+${dayItems.length - 3} more</span>`);
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
                                <a href="${proj.url}" class="fw-extrabold fs-7 text-dark text-truncate text-decoration-none" title="${proj.title}">${proj.title}</a>
                            </div>
                            <div class="d-flex align-items-center gap-1 mt-1 flex-wrap">
                                <span class="badge ${proj.badgeClass} fs-9">${proj.category}</span>
                                <span class="fs-8 text-muted fw-semibold">${formatShortDate(proj.startDate)} - ${formatShortDate(proj.dueDate)} (${duration}d)</span>
                            </div>
                        </div>

                        <div class="px-2">
                            <div class="timeline-bar-track position-relative" style="height: 22px; border-radius: 999px;">
                                <div class="timeline-bar-fill bg-primary d-flex align-items-center justify-content-between text-white fs-9 fw-bold px-2 text-truncate" 
                                     style="width: ${widthPercent}%; margin-left: ${startMargin}%; height: 100%; border-radius: 999px;">
                                    <span>${duration}d</span>
                                    <span class="badge bg-dark bg-opacity-25 fs-9 py-0.5 px-1.5 rounded-pill">${proj.progress}%</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <img src="${proj.leadAvatar}" class="avatar-xs rounded-circle border border-white" alt="${proj.lead}">
                            <button class="btn btn-sm btn-outline-primary py-0.5 px-2 fs-8 btn-master-adjust-timeline" data-item-id="${proj.id}" title="Adjust Timeline">
                                <i class="fa-solid fa-sliders"></i>
                            </button>
                            <a href="${proj.url}" class="btn btn-sm btn-light border py-0.5 px-2 fs-8" title="Open Project Board">
                                <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i>
                            </a>
                        </div>
                    </div>
                `);

                $list.append($projRow);

                // 2. Child Tasks under this project
                const childTasks = ALL_TASKS.filter(t => t.projectName === proj.projectName);
                $.each(childTasks, function (_, task) {
                    const tStartObj = new Date(task.startDate || '2026-09-01');
                    const tStartDay = Math.min(30, Math.max(1, tStartObj.getDate()));
                    const tDuration = calculateDays(task.startDate || '2026-09-01', task.dueDate || '2026-09-30');
                    const tStartMargin = ((tStartDay - 1) / 30) * 100;
                    const tWidthPercent = Math.max(10, Math.min(100 - tStartMargin, (tDuration / 30) * 100));

                    const $taskRow = $(`
                        <div class="gantt-grid-row gap-3 ps-3 mb-1">
                            <div class="d-flex flex-column" style="min-width: 0;">
                                <div class="d-flex align-items-center gap-1.5">
                                    <span class="badge bg-secondary-subtle text-dark fs-9 px-1 py-0.5">TASK</span>
                                    <span class="fw-bold fs-7 text-dark text-truncate" title="${task.title}">${task.title}</span>
                                </div>
                                <div class="d-flex align-items-center gap-1 mt-1 flex-wrap">
                                    ${statusBadgeMap[task.status] || ''}
                                    <span class="fs-8 text-muted">${formatShortDate(task.startDate)} - ${formatShortDate(task.dueDate)} (${tDuration}d)</span>
                                </div>
                            </div>

                            <div class="px-2">
                                <div class="timeline-bar-track position-relative" style="height: 16px; border-radius: 999px;">
                                    <div class="timeline-bar-fill ${statusClassMap[task.status] || 'timeline-bar-progress'} d-flex align-items-center justify-content-center text-white fs-9 fw-bold px-2 text-truncate" 
                                         style="width: ${tWidthPercent}%; margin-left: ${tStartMargin}%; height: 100%; border-radius: 999px;">
                                        ${tDuration >= 4 ? `${tDuration}d` : ''}
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end gap-2">
                                <img src="${task.leadAvatar}" class="avatar-xs rounded-circle border border-white" alt="${task.lead}">
                                <button class="btn btn-sm btn-outline-secondary py-0.5 px-2 fs-8 btn-master-adjust-timeline" data-item-id="${task.id}" title="Adjust Task Schedule">
                                    <i class="fa-solid fa-sliders"></i>
                                </button>
                            </div>
                        </div>
                    `);
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
                                <span class="fw-bold fs-7 text-dark text-truncate" title="${it.title}">${it.title}</span>
                            </div>
                            <div class="d-flex align-items-center gap-1 mt-1 flex-wrap">
                                ${statusBadgeMap[it.status] || ''}
                                <span class="fs-8 text-muted">${formatShortDate(it.startDate)} - ${formatShortDate(it.dueDate)} (${duration}d) &bull; ${it.projectName}</span>
                            </div>
                        </div>

                        <div class="px-2">
                            <div class="timeline-bar-track position-relative" style="height: ${isProj ? '20px' : '16px'}; border-radius: 999px;">
                                <div class="timeline-bar-fill ${isProj ? 'bg-primary' : statusClassMap[it.status] || 'timeline-bar-progress'} d-flex align-items-center justify-content-center text-white fs-9 fw-bold px-2 text-truncate" 
                                     style="width: ${widthPercent}%; margin-left: ${startMargin}%; height: 100%; border-radius: 999px;">
                                    ${duration >= 4 ? `${duration}d` : ''}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <img src="${it.leadAvatar}" class="avatar-xs rounded-circle border border-white" alt="${it.lead}">
                            <button class="btn btn-sm btn-outline-secondary py-0.5 px-2 fs-8 btn-master-adjust-timeline" data-item-id="${it.id}" title="Adjust Schedule">
                                <i class="fa-solid fa-sliders"></i>
                            </button>
                        </div>
                    </div>
                `);
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
                        <img src="${it.leadAvatar}" class="avatar-xs rounded-circle border" alt="${it.lead}">
                        <div>
                            <a href="${it.url}" class="fw-bold text-dark text-decoration-none d-block">${it.title}</a>
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
                        <button class="btn btn-light border btn-save-master-sched" data-item-id="${it.id}" title="Save Schedule Changes">
                            <i class="fa-solid fa-check text-success"></i>
                        </button>
                        <a href="${it.url}" class="btn btn-light border" title="Go to Board">
                            <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i>
                        </a>
                    </div>
                </td>
            `);

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
            const childTasks = ALL_TASKS.filter(t => t.projectName === proj.projectName);
            const doneCount = childTasks.filter(t => t.status === 'completed').length;
            const totalCount = childTasks.length;

            const $card = $(`
                <div class="p-3 border rounded-4 bg-light-subtle shadow-2xs">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge-icon-sm ${proj.badgeClass} p-1.5 rounded-2"><i class="${proj.icon}"></i></span>
                            <a href="${proj.url}" class="fw-bold text-dark fs-6 text-decoration-none">${proj.title}</a>
                        </div>
                        <span class="badge ${proj.progress === 100 ? 'bg-success' : 'bg-primary'}">${proj.status === 'completed' ? 'Delivered' : 'On Track'} (${proj.progress}%)</span>
                    </div>
                    <div class="progress mb-2" style="height: 10px;">
                        <div class="progress-bar ${proj.progress === 100 ? 'bg-success' : 'bg-primary'}" style="width: ${proj.progress}%;"></div>
                    </div>
                    <div class="d-flex flex-wrap align-items-center justify-content-between fs-8 text-muted">
                        <span><i class="fa-regular fa-calendar me-1"></i> ${formatShortDate(proj.startDate)} - ${formatShortDate(proj.dueDate)}</span>
                        <span>Lead: ${proj.lead} &bull; ${doneCount}/${totalCount} Tasks Complete</span>
                    </div>
                </div>
            `);
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
            leadAvatar: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=80&q=80',
            startDate: start,
            dueDate: due,
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
