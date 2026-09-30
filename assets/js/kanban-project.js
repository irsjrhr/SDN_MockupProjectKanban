/**
 * ==============================================================================
 * MASTER PROJECT KANBAN & TIMELINE SCRIPT
 * Location: /assets/js/kanban-project.js
 * ==============================================================================
 */

$(document).ready(function () {
    const DEFAULT_PROJECTS = [
        {
            id: 'proj-mobile',
            title: 'Mobile CRM Application',
            description: 'Native Flutter mobile app for field agents with offline database sync and biometric authentication.',
            category: 'Mobile Application',
            badgeClass: 'badge-company',
            icon: 'fa-solid fa-mobile-screen',
            status: 'todo',
            progress: 15,
            totalTasks: 14,
            doneTasks: 2,
            priority: 'High',
            priorityClass: 'bg-danger-subtle text-danger',
            lead: 'Daniel Johnson',
            members: [
                'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
                'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80'
            ],
            startDate: '2026-09-01',
            dueDate: '2027-01-15',
            url: 'KanbanTask.php?project=mobile'
        },
        {
            id: 'proj-middleware',
            title: 'Middleware Project',
            description: 'Syncboard core RESTful API architecture, authorization gate, and enterprise microservices.',
            category: 'E-Commerce / API',
            badgeClass: 'badge-ecommerce',
            icon: 'fa-solid fa-bag-shopping',
            status: 'in-progress',
            progress: 65,
            totalTasks: 12,
            doneTasks: 8,
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
            url: 'KanbanTask.php'
        },
        {
            id: 'proj-landing',
            title: 'Landing Page Campaign',
            description: 'Q4 Product launch promotional landing page with high-conversion lead capture and analytics tracking.',
            category: 'Marketing Campaign',
            badgeClass: 'badge-landing',
            icon: 'fa-solid fa-bullhorn',
            status: 'in-progress',
            progress: 40,
            totalTasks: 8,
            doneTasks: 3,
            priority: 'Medium',
            priorityClass: 'bg-warning-subtle text-warning',
            lead: 'Sophia Carter',
            members: [
                'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
                'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80'
            ],
            startDate: '2026-09-01',
            dueDate: '2026-09-20',
            url: 'KanbanTask.php?project=landing'
        },
        {
            id: 'proj-company',
            title: 'Company Website',
            description: 'Corporate redesign, shareholder and investor relations portal, case studies, and blog CMS.',
            category: 'Corporate Web',
            badgeClass: 'badge-company',
            icon: 'fa-solid fa-globe',
            status: 'review',
            progress: 90,
            totalTasks: 10,
            doneTasks: 9,
            priority: 'Medium',
            priorityClass: 'bg-warning-subtle text-warning',
            lead: 'Michael Anderson',
            members: [
                'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=80&q=80',
                'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80'
            ],
            startDate: '2026-09-08',
            dueDate: '2026-10-30',
            url: 'KanbanTask.php?project=company'
        },
        {
            id: 'proj-analytics',
            title: 'Internal Analytics Tool',
            description: 'Real-time telemetry and data lake visualization dashboard for engineering operations.',
            category: 'DevOps & Data',
            badgeClass: 'badge-ecommerce',
            icon: 'fa-solid fa-chart-line',
            status: 'completed',
            progress: 100,
            totalTasks: 10,
            doneTasks: 10,
            priority: 'Normal',
            priorityClass: 'bg-success-subtle text-success',
            lead: 'James Wilson',
            members: [
                'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
                'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80'
            ],
            startDate: '2026-09-01',
            dueDate: '2026-09-25',
            url: 'KanbanTask.php?project=analytics'
        }
    ];

    let MASTER_PROJECTS = JSON.parse(JSON.stringify(DEFAULT_PROJECTS));

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

    function formatDisplayDate(dateStr) {
        if (!dateStr) return '';
        const d = new Date(dateStr);
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        return `${months[d.getMonth()]} ${String(d.getDate()).padStart(2, '0')}, ${d.getFullYear()}`;
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

    // New Task Modal Trigger
    $('#btnNewTask').on('click', function () {
        const taskModalEl = document.getElementById('taskModal');
        if (taskModalEl) {
            const modal = bootstrap.Modal.getOrCreateInstance(taskModalEl);
            modal.show();
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
    /* 4. RENDER PROJECT KANBAN BOARD (DRAG & DROP)                               */
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
            
            const $card = $(`
                <div class="card border rounded-3 p-3 bg-white shadow-sm project-card-item cursor-grab" draggable="true" data-id="${proj.id}">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge ${proj.badgeClass} rounded-pill px-2.5 py-1 fs-8 fw-semibold">
                            <i class="${proj.icon} me-1"></i> ${proj.category}
                        </span>
                        <span class="badge ${proj.priorityClass} rounded-pill px-2 py-0.5 fs-8 fw-semibold">${proj.priority}</span>
                    </div>
                    <h4 class="h6 fw-bold mb-1">
                        <a href="${proj.url}" class="text-dark text-decoration-none">${proj.title}</a>
                    </h4>
                    <p class="text-muted fs-8 mb-3 text-truncate-2">${proj.description}</p>
                    
                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-between fs-8 mb-1">
                            <span class="text-muted"><i class="fa-solid fa-list-check me-1"></i> ${proj.doneTasks}/${proj.totalTasks} Tasks</span>
                            <span class="fw-bold text-dark">${proj.progress}%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar ${proj.progress === 100 ? 'bg-success' : 'bg-primary'}" style="width: ${proj.progress}%;"></div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                        <div class="team-avatars-stack d-flex align-items-center">
                            ${membersHtml}
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="fs-8 text-muted"><i class="fa-regular fa-calendar me-1"></i> ${formatShortDate(proj.dueDate)}</span>
                            <a href="${proj.url}" class="btn btn-sm btn-light border p-1 rounded-2" title="Open Project Task Board">
                                <i class="fa-solid fa-arrow-up-right-from-square fs-8 text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
            `);

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
    /* 4. RENDER PROJECT CALENDAR GRID (SEPTEMBER 2026)                          */
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
                        title: `${proj.title} (${formatShortDate(proj.startDate)} - ${formatShortDate(proj.dueDate)})`
                    });
                    $pill.html(`<i class="${proj.icon} fs-9"></i> <span class="fw-semibold">${proj.title}</span>`);
                    $pill.on('click', function (e) {
                        e.stopPropagation();
                        window.location.href = proj.url;
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
    /* 5. RENDER PROJECT TIMELINE (GANTT BARS)                                    */
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
            const dueObj = new Date(proj.dueDate || '2026-09-30');
            const startDay = Math.min(30, Math.max(1, startObj.getDate()));
            const duration = calculateDays(proj.startDate || '2026-09-01', proj.dueDate || '2026-09-30');

            const startMargin = ((startDay - 1) / 30) * 100;
            const widthPercent = Math.max(12, Math.min(100 - startMargin, (duration / 30) * 100));

            const priorityClass = `badge-priority-${proj.priority ? proj.priority.toLowerCase() : 'medium'}`;
            const membersHtml = proj.members.map(avatar => `<img src="${avatar}" class="avatar-xs rounded-circle me-1" alt="Member">`).join('');

            const $row = $('<div>', { class: 'gantt-grid-row gap-3' });
            $row.html(`
                <!-- Project Title & Date Range -->
                <div class="d-flex flex-column" style="min-width: 0;">
                    <div class="d-flex align-items-center gap-1.5">
                        <i class="${proj.icon} text-primary fs-8"></i>
                        <a href="${proj.url}" class="fw-bold fs-7 text-dark text-truncate text-decoration-none" title="${proj.title}">${proj.title}</a>
                    </div>
                    <div class="d-flex align-items-center gap-1 mt-1 flex-wrap">
                        ${statusBadgeMap[proj.status] || ''}
                        <span class="badge ${proj.badgeClass} fs-9">${proj.category}</span>
                        <span class="fs-8 text-muted fw-semibold">${formatShortDate(proj.startDate)} - ${formatShortDate(proj.dueDate)} (${duration}d)</span>
                    </div>
                </div>

                <!-- Gantt Timeline Bar -->
                <div class="px-2">
                    <div class="timeline-bar-track position-relative" style="height: 20px; border-radius: 999px;">
                        <div class="timeline-bar-fill ${statusClassMap[proj.status] || 'timeline-bar-progress'} d-flex align-items-center justify-content-between text-white fs-9 fw-bold px-2 text-truncate" 
                             style="width: ${widthPercent}%; margin-left: ${startMargin}%; height: 100%; border-radius: 999px;"
                             title="${proj.title}: ${proj.startDate} to ${proj.dueDate} (${duration} days - ${proj.progress}%)">
                            <span>${duration >= 5 ? `${duration}d` : ''}</span>
                            <span class="badge bg-dark bg-opacity-25 fs-9 py-0.5 px-1.5 rounded-pill">${proj.progress}%</span>
                        </div>
                    </div>
                </div>

                <!-- Actions & Lead -->
                <div class="d-flex align-items-center justify-content-end gap-2">
                    <div class="card-assignees">${membersHtml}</div>
                    <button class="btn btn-sm btn-outline-primary py-0.5 px-2 fs-8 btn-proj-adjust-timeline" title="Adjust Project Timeline">
                        <i class="fa-solid fa-sliders"></i>
                    </button>
                    <a href="${proj.url}" class="btn btn-sm btn-light border py-0.5 px-2 fs-8" title="Open Task Board">
                        <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i>
                    </a>
                </div>
            `);

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
    /* 6. RENDER PROJECT TIMELINE SCHEDULER TABLE (INLINE DATE ADJUSTMENT)        */
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

            const $tr = $('<tr>', { id: `row-projschedule-${proj.id}` });
            $tr.html(`
                <!-- Project Title -->
                <td class="py-2.5 px-3">
                    <div class="d-flex align-items-center gap-2">
                        <i class="${proj.icon} text-primary fs-7"></i>
                        <div>
                            <a href="${proj.url}" class="fw-bold text-dark text-decoration-none d-block">${proj.title}</a>
                            <span class="fs-8 text-muted">${proj.lead} &bull; ${proj.doneTasks}/${proj.totalTasks} Tasks (${proj.progress}%)</span>
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
                        <button class="btn btn-light border btn-save-proj-timeline" data-proj-id="${proj.id}" title="Save Timeline Changes">
                            <i class="fa-solid fa-check text-success"></i>
                        </button>
                        <a href="${proj.url}" class="btn btn-light border" title="Go to Task Board">
                            <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i>
                        </a>
                    </div>
                </td>
            `);

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

    // Initial render
    renderProjectKanban();
});
