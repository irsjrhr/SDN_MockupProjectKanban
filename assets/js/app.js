/* -------------------------------------------------------------------------- */
/* SYNCBOARD - APPLICATION SCRIPT (JQUERY & BOOTSTRAP 5 VERSION)              */
/* -------------------------------------------------------------------------- */

$(document).ready(function () {
    // Available Team Members
    const TEAM_MEMBERS = [
        { id: 'm1', name: 'Michael Anderson', role: 'UI/UX Designer', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80' },
        { id: 'm2', name: 'Sophia Carter', role: 'Graphic Designer', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80' },
        { id: 'm3', name: 'Daniel Johnson', role: 'Frontend Developer', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80' },
        { id: 'm4', name: 'James Wilson', role: 'Backend Programmer', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80' }
    ];

    // Initial Data matching Mockup with Comprehensive Timeline Schedule
    const INITIAL_TASKS = [
        // --- TO DO ---
        {
            id: 'task-1',
            title: 'Homepage UI Design Draft',
            desc: 'Building the first version of homepage layout focusing on usability and flow.',
            status: 'todo',
            priority: 'high',
            startDate: '2026-09-01',
            dueDate: '2026-09-06',
            progress: 0,
            tags: ['Design UI/UX', 'Frontend'],
            assignees: ['m1', 'm2'],
            subtasks: [
                { text: 'Wireframe hero section', done: false },
                { text: 'Design grid components', done: false },
                { text: 'Create responsive specs', done: false },
                { text: 'Finalize UI kit tokens', done: false }
            ],
            comments: [
                { author: 'Michael Anderson', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', text: 'Initial layout draft started.' }
            ]
        },
        {
            id: 'task-2',
            title: 'Product Detail Wireframe',
            desc: 'Wireframing the product detail page with focus on images and description.',
            status: 'todo',
            priority: 'medium',
            startDate: '2026-09-04',
            dueDate: '2026-09-11',
            progress: 0,
            tags: ['UX', 'Research'],
            assignees: ['m1', 'm3'],
            subtasks: [
                { text: 'Image gallery layout', done: false },
                { text: 'Pricing & CTA hierarchy', done: false },
                { text: 'Reviews tab component', done: false },
                { text: 'Related products slider', done: false }
            ],
            comments: [
                { author: 'Sophia Carter', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80', text: 'Please check high-res product placeholders.' },
                { author: 'Daniel Johnson', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80', text: 'I will prepare the API response mockup.' },
                { author: 'Michael Anderson', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', text: 'Got it, working on it today.' }
            ]
        },
        {
            id: 'task-3',
            title: 'Shopping Cart Structure',
            desc: 'Planning the shopping cart page to ensure user-friendly checkout flow.',
            status: 'todo',
            priority: 'high',
            startDate: '2026-09-08',
            dueDate: '2026-09-16',
            progress: 0,
            tags: ['Backend', 'API'],
            assignees: ['m3', 'm4'],
            subtasks: [
                { text: 'Session cart state sync', done: false },
                { text: 'Promo code discount engine', done: false },
                { text: 'Tax calculation logic', done: false },
                { text: 'Shipping estimator', done: false }
            ],
            comments: [
                { author: 'James Wilson', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80', text: 'Cart API spec is ready.' },
                { author: 'Daniel Johnson', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80', text: 'Awesome!' },
                { author: 'Michael Anderson', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', text: 'Double check mobile cart drawer.' },
                { author: 'Sophia Carter', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80', text: 'Added icons for checkout.' },
                { author: 'James Wilson', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80', text: 'Ready for integration.' }
            ]
        },

        // --- IN PROGRESS ---
        {
            id: 'task-4',
            title: 'User Registration Flow',
            desc: 'Building user account creation system with secure authentication.',
            status: 'in-progress',
            priority: 'urgent',
            startDate: '2026-09-02',
            dueDate: '2026-09-12',
            progress: 50,
            tags: ['Frontend', 'Auth'],
            assignees: ['m1', 'm3'],
            subtasks: [
                { text: 'Form validation logic', done: true },
                { text: 'JWT Auth backend hook', done: false },
                { text: 'Email verification trigger', done: false },
                { text: 'Password reset workflow', done: false }
            ],
            comments: [
                { author: 'Daniel Johnson', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80', text: 'Frontend form state connected.' },
                { author: 'James Wilson', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80', text: 'OAuth 2.0 endpoints updated.' },
                { author: 'Sophia Carter', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80', text: 'Check password visibility toggle.' },
                { author: 'Michael Anderson', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', text: 'UX looks great!' },
                { author: 'Daniel Johnson', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80', text: 'Testing edge cases.' },
                { author: 'James Wilson', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80', text: 'Backend validation added.' },
                { author: 'Michael Anderson', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', text: 'Almost complete.' },
                { author: 'Sophia Carter', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80', text: 'Merged into staging.' }
            ]
        },
        {
            id: 'task-5',
            title: 'Product Catalog Layout',
            desc: 'Creating responsive product grid for better shopping experience.',
            status: 'in-progress',
            priority: 'medium',
            startDate: '2026-09-06',
            dueDate: '2026-09-18',
            progress: 60,
            tags: ['Design UI/UX', 'Frontend'],
            assignees: ['m1', 'm2'],
            subtasks: [
                { text: 'Filter sidebar design', done: true },
                { text: 'Infinite scroll pagination', done: true },
                { text: 'Product card hover effect', done: false },
                { text: 'Quick view modal', done: false }
            ],
            comments: [
                { author: 'Michael Anderson', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', text: 'Grid system aligns with breakpoint specs.' },
                { author: 'Sophia Carter', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80', text: 'Product badges styled.' }
            ]
        },
        {
            id: 'task-6',
            title: 'Payment Gateway Setup',
            desc: 'Integrating payment gateway API to support multiple methods.',
            status: 'in-progress',
            priority: 'urgent',
            startDate: '2026-09-09',
            dueDate: '2026-09-22',
            progress: 75,
            tags: ['Backend', 'API'],
            assignees: ['m3', 'm4'],
            subtasks: [
                { text: 'Stripe webhook listener', done: true },
                { text: 'PayPal checkout JS SDK', done: true },
                { text: 'Credit card vault encryption', done: true },
                { text: 'Transaction log persistence', done: false }
            ],
            comments: [
                { author: 'James Wilson', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80', text: 'Stripe Sandbox tested successfully.' },
                { author: 'Daniel Johnson', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80', text: 'UI payment buttons wired up.' }
            ]
        },

        // --- REVIEW ---
        {
            id: 'task-7',
            title: 'Homepage Responsive Check',
            desc: 'Testing homepage layout across devices to ensure responsiveness.',
            status: 'review',
            priority: 'high',
            startDate: '2026-09-13',
            dueDate: '2026-09-20',
            progress: 50,
            tags: ['QA', 'Frontend'],
            assignees: ['m2', 'm3'],
            subtasks: [
                { text: 'Test iOS Safari 16', done: true },
                { text: 'Test Android Chrome 114', done: true },
                { text: 'Check Tablet landscape mode', done: false },
                { text: 'Check 4K desktop display', done: false }
            ],
            comments: [
                { author: 'Sophia Carter', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80', text: 'Responsive audit report attached.' },
                { author: 'Daniel Johnson', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80', text: 'Fixing hero font scale on mobile.' }
            ]
        },
        {
            id: 'task-8',
            title: 'Product Image Optimization',
            desc: 'Checking optimized images for clarity and performance balance.',
            status: 'review',
            priority: 'medium',
            startDate: '2026-09-15',
            dueDate: '2026-09-24',
            progress: 75,
            tags: ['Media', 'Performance'],
            assignees: ['m1', 'm2'],
            subtasks: [
                { text: 'Convert asset gallery to WebP', done: true },
                { text: 'Set up CDN lazy loading', done: true },
                { text: 'Srcset responsive image sizes', done: true },
                { text: 'Lighthouse performance score 95+', done: false }
            ],
            comments: [
                { author: 'Michael Anderson', avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', text: 'Saved 64% bandwidth on mobile.' }
            ]
        },
        {
            id: 'task-9',
            title: 'Checkout Flow Testing',
            desc: 'Reviewing checkout process to ensure smooth user experience.',
            status: 'review',
            priority: 'urgent',
            startDate: '2026-09-18',
            dueDate: '2026-09-27',
            progress: 75,
            tags: ['QA', 'Backend'],
            assignees: ['m3', 'm4'],
            subtasks: [
                { text: 'End-to-end guest checkout', done: true },
                { text: 'Registered user checkout', done: true },
                { text: 'Failed payment error handling', done: true },
                { text: 'Receipt email notification', done: false }
            ],
            comments: [
                { author: 'Daniel Johnson', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80', text: 'Passed all test scripts.' }
            ]
        },

        // --- COMPLETE ---
        {
            id: 'task-10',
            title: 'Login Page Interface',
            desc: 'Finished building login interface including input validation.',
            status: 'completed',
            priority: 'medium',
            startDate: '2026-09-01',
            dueDate: '2026-09-07',
            progress: 100,
            tags: ['Design UI/UX', 'Frontend'],
            assignees: ['m1', 'm2'],
            subtasks: [
                { text: 'UI layout implementation', done: true },
                { text: 'Client side regex validation', done: true },
                { text: 'Remember me checkbox cookie', done: true },
                { text: 'Accessibility WCAG AAA check', done: true }
            ],
            comments: [
                { author: 'Sophia Carter', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80', text: 'Verified and deployed to production.' }
            ]
        },
        {
            id: 'task-11',
            title: 'Database Schema Setup',
            desc: 'Delivered database setup with tables for users, orders, and items.',
            status: 'completed',
            priority: 'high',
            startDate: '2026-09-01',
            dueDate: '2026-09-05',
            progress: 100,
            tags: ['Backend', 'Database'],
            assignees: ['m3', 'm4'],
            subtasks: [
                { text: 'ERD Diagram approval', done: true },
                { text: 'PostgreSQL migration scripts', done: true },
                { text: 'Foreign key constraints & indexes', done: true },
                { text: 'Database seeders for testing', done: true }
            ],
            comments: [
                { author: 'James Wilson', avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80', text: 'Migrations committed to repo.' }
            ]
        }
    ];

    // Helper functions for dates & timeline
    function parseDate(dateStr) {
        if (!dateStr) return new Date(2026, 8, 1);
        const parts = dateStr.split('-');
        return new Date(parseInt(parts[0]), parseInt(parts[1]) - 1, parseInt(parts[2]));
    }

    function formatDateShort(dateStr) {
        if (!dateStr) return '';
        const d = parseDate(dateStr);
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const day = String(d.getDate()).padStart(2, '0');
        return `${months[d.getMonth()]} ${day}`;
    }

    function calculateDuration(startStr, dueStr) {
        const d1 = parseDate(startStr);
        const d2 = parseDate(dueStr);
        const diffTime = Math.abs(d2 - d1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
        return isNaN(diffDays) ? 1 : diffDays;
    }

    function showLiveToast(msg, type = 'success') {
        $('.timeline-live-toast').remove();
        const icon = type === 'success' ? 'fa-circle-check text-success' : 'fa-circle-info text-primary';
        const $toast = $(`
            <div class="timeline-live-toast card shadow-lg border p-3 rounded-4 bg-white d-flex flex-row align-items-center gap-3">
                <i class="fa-solid ${icon} fs-4"></i>
                <div class="flex-grow-1">
                    <span class="fw-bold fs-7 d-block text-dark">Syncboard Update</span>
                    <span class="text-secondary fs-8">${msg}</span>
                </div>
                <button type="button" class="btn-close fs-8" onclick="$(this).closest('.timeline-live-toast').remove()"></button>
            </div>
        `);
        $('body').append($toast);
        setTimeout(() => {
            $toast.fadeOut(300, function () { $(this).remove(); });
        }, 3500);
    }

    // Main App Controller
    const SyncboardApp = {
        tasks: JSON.parse(localStorage.getItem('syncboard_tasks')) || INITIAL_TASKS,
        currentView: 'kanban',
        activeTagFilter: 'all',
        searchQuery: '',
        activeDetailTaskId: null,
        draggedTaskId: null,

        // Bootstrap Modals
        taskModalBs: new bootstrap.Modal(document.getElementById('taskModal')),
        detailModalBs: new bootstrap.Modal(document.getElementById('detailModal')),

        init() {
            this.bindEvents();
            this.initTooltips();
            this.renderAll();
        },

        initTooltips() {
            $('[data-bs-toggle="tooltip"]').each(function () {
                new bootstrap.Tooltip(this);
            });
        },

        bindEvents() {
            const self = this;

            // Sidebar Toggle Mobile
            $('#sidebarToggleBtn').on('click', function () {
                $('#sidebar, #sidebarRail').toggleClass('show');
            });

            // Rail Navigation Active State Toggle
            $('#sidebarRail').on('click', '.rail-item', function (e) {
                const href = $(this).attr('href');
                if (!href || href === '#') {
                    e.preventDefault();
                }
                $('#sidebarRail .rail-item').removeClass('active');
                $(this).addClass('active');
            });

            // Submenu Toggle (Website, Documentation, etc.)
            $('#nav_project_sidebar').on('click', '.has-submenu > .nav-link', function (e) {
                if (!$(this).attr('onclick')) {
                    e.preventDefault();
                    $(this).closest('.has-submenu').toggleClass('open');
                }
            });

            // Submenu Link Active Highlight
            $('#nav_project_sidebar').on('click', '.submenu-link', function () {
                $('.submenu-link').removeClass('active');
                $(this).addClass('active');
            });

            // View Switching via Sidebar Links
            $('.nav-view-link, #viewTabs .tab-btn').on('click', function (e) {
                // If it's a link without data-view but acts as a parent submenu, let it be handled by submenu toggle
                if ($(this).hasClass('submenu-link') && !$(this).data('view')) return;
                
                const viewTarget = $(this).data('view');
                if (viewTarget) {
                    e.preventDefault();
                    
                    // Update active state in sidebar rail if applicable
                    if ($(this).closest('.nav-item').length > 0) {
                        $('.nav-view-link').removeClass('active text-primary fw-bold bg-primary-subtle');
                        $(this).addClass('active text-primary fw-bold bg-primary-subtle');
                    }
                    
                    $('#viewTabs .tab-btn').removeClass('active');
                    $(`#viewTabs .tab-btn[data-view="${viewTarget}"]`).addClass('active');
                    
                    self.currentView = viewTarget;
                    self.switchView(self.currentView);
                    
                    // Handle subview default activation if specified
                    const subviewTarget = $(this).data('subview');
                    if (subviewTarget) {
                        if (viewTarget === 'calendar') {
                            $(`#calendarSubTabs .cal-subtab-btn[data-subview="${subviewTarget}"]`).trigger('click');
                        } else if (viewTarget === 'board-list' || viewTarget === 'board' || viewTarget === 'list') {
                            $(`#boardListSubTabs .bl-subtab-btn[data-subview="${subviewTarget}"]`).trigger('click');
                        } else if (viewTarget === 'documentation') {
                            // Smooth scroll to the specific documentation box
                            const targetBox = $(`#${subviewTarget}`);
                            if (targetBox.length) {
                                // Add a slight delay to allow view switching to complete
                                setTimeout(() => {
                                    targetBox[0].scrollIntoView({ behavior: 'smooth', block: 'start' });
                                }, 50);
                            }
                        }
                    }
                }
            });

            // Board/List Subtab Switcher (View by Board vs View by List)
            $('#boardListSubTabs').on('click', '.bl-subtab-btn', function (e) {
                e.preventDefault();
                $('#boardListSubTabs .bl-subtab-btn').removeClass('active');
                $(this).addClass('active');

                const subview = $(this).data('subview');
                $('.board-list-subview').removeClass('active');
                if (subview === 'board') {
                    $('#subviewBoardGrid').addClass('active');
                } else if (subview === 'list') {
                    $('#subviewListTable').addClass('active');
                }
            });

            // Calendar Subtab Switcher (View by Calendar vs View by Timeline vs Task Timeline Scheduler)
            $('#calendarSubTabs').on('click', '.cal-subtab-btn', function (e) {
                e.preventDefault();
                $('#calendarSubTabs .cal-subtab-btn').removeClass('active');
                $(this).addClass('active');

                const subview = $(this).data('subview');
                $('.calendar-subview-content').removeClass('active');
                if (subview === 'grid') {
                    $('#subviewGrid').addClass('active');
                } else if (subview === 'timeline') {
                    $('#subviewTimeline').addClass('active');
                } else if (subview === 'schedule-manager') {
                    $('#subviewScheduleManager').addClass('active');
                }
            });

            // Quick Add Task from Calendar Header
            $('#btnQuickAddTaskFromCal').on('click', function () {
                self.openTaskModal(null, 'todo', '2026-09-01', '2026-09-15');
            });

            // Timeline Status Filter
            $('#timelineStatusFilter').on('change', function () {
                const status = $(this).val();
                let filtered = self.getFilteredTasks();
                if (status !== 'all') {
                    filtered = filtered.filter(t => t.status === status);
                }
                self.renderTimelineSchedule(filtered);
                self.renderTimelineSchedulerTable(filtered);
            });

            // Reset / Sync all task timelines to default
            $('#btnSyncAllTimelines').on('click', function () {
                if (confirm('Reset all task timelines to default September 2026 distribution?')) {
                    self.tasks = JSON.parse(JSON.stringify(INITIAL_TASKS));
                    self.saveTasks();
                    self.renderAll();
                    showLiveToast('All task timelines have been reset to default.');
                }
            });

            // Timeline Nav Button in Sidebar
            $('#navTimelineBtn').on('click', function (e) {
                e.preventDefault();
                $('#viewTabs .tab-btn').removeClass('active');
                $('#viewTabs .tab-btn[data-view="calendar"]').addClass('active');
                self.currentView = 'calendar';
                self.switchView('calendar');
                $('#calendarSubTabs .cal-subtab-btn[data-subview="timeline"]').trigger('click');
            });

            // Search Filter
            $('#searchInput').on('input', function () {
                self.searchQuery = $(this).val().toLowerCase().trim();
                $('#btnClearSearch').toggle(self.searchQuery.length > 0);
                self.renderAll();
            });

            $('#btnClearSearch').on('click', function () {
                $('#searchInput').val('');
                self.searchQuery = '';
                $(this).hide();
                self.renderAll();
            });

            // Tag Filter
            $('#filterTag').on('change', function () {
                self.activeTagFilter = $(this).val();
                self.renderAll();
            });

            $('#btnResetFilters').on('click', function () {
                $('#filterTag').val('all');
                self.activeTagFilter = 'all';
                self.renderAll();
            });

            // Category Sidebar Filter Quick Click
            $('.category-item').on('click', function () {
                const status = $(this).data('filter-status');
                $('.tab-btn[data-view="kanban"]').trigger('click');
            });

            // Create Task Triggers
            $('#btnNewTask').on('click', function () {
                self.openTaskModal();
            });

            $('.btn-add-task-col').on('click', function () {
                const status = $(this).data('status');
                self.openTaskModal(null, status);
            });

            // Task Form Submit
            $('#taskForm').on('submit', function (e) {
                e.preventDefault();
                self.handleTaskFormSubmit();
            });

            // Add Subtask Item Input
            $('#btnAddSubtaskInput').on('click', function () {
                self.addSubtaskInputField('');
            });

            // Detail Modal Actions
            $('#btnSendComment').on('click', function () {
                self.handleAddComment();
            });

            $('#newCommentInput').on('keypress', function (e) {
                if (e.key === 'Enter') self.handleAddComment();
            });

            $('#detailStatusSelect').on('change', function () {
                if (!self.activeDetailTaskId) return;
                const task = self.tasks.find(t => t.id === self.activeDetailTaskId);
                if (task) {
                    task.status = $(this).val();
                    self.saveTasks();
                    self.renderAll();
                }
            });

            $('#btnEditTaskFromDetail').on('click', function () {
                const taskId = self.activeDetailTaskId;
                self.detailModalBs.hide();
                self.openTaskModal(taskId);
            });

            $('#btnDeleteTaskFromDetail').on('click', function () {
                if (confirm('Are you sure you want to delete this task?')) {
                    self.tasks = self.tasks.filter(t => t.id !== self.activeDetailTaskId);
                    self.saveTasks();
                    self.detailModalBs.hide();
                    self.renderAll();
                }
            });

            // Drag and Drop Event Binding via jQuery
            $('.task-cards-list').each(function () {
                const $list = $(this);
                const $col = $list.closest('.kanban-column');

                $col.on('dragover', function (e) {
                    e.preventDefault();
                    $col.addClass('drag-over');
                });

                $col.on('dragleave', function () {
                    $col.removeClass('drag-over');
                });

                $col.on('drop', function (e) {
                    e.preventDefault();
                    $col.removeClass('drag-over');
                    const targetStatus = $list.data('status');
                    if (self.draggedTaskId && targetStatus) {
                        const task = self.tasks.find(t => t.id === self.draggedTaskId);
                        if (task && task.status !== targetStatus) {
                            task.status = targetStatus;
                            self.saveTasks();
                            self.renderAll();
                        }
                    }
                });
            });
        },

        saveTasks() {
            localStorage.setItem('syncboard_tasks', JSON.stringify(this.tasks));
        },

        getFilteredTasks() {
            const self = this;
            return this.tasks.filter(task => {
                const matchesSearch = !self.searchQuery ||
                    task.title.toLowerCase().includes(self.searchQuery) ||
                    task.desc.toLowerCase().includes(self.searchQuery);

                const matchesTag = self.activeTagFilter === 'all' ||
                    task.tags.includes(self.activeTagFilter);

                return matchesSearch && matchesTag;
            });
        },

        switchView(viewName) {
            $('.view-content').removeClass('active');
            if (viewName === 'dashboard') $('#viewDashboard').addClass('active');
            else if (viewName === 'kanban') $('#viewKanban').addClass('active');
            else if (viewName === 'list-project' || viewName === 'projects') $('#viewListProject').addClass('active');
            else if (viewName === 'board-list' || viewName === 'board' || viewName === 'list') $('#viewBoardList').addClass('active');
            else if (viewName === 'calendar') $('#viewCalendar').addClass('active');
            else if (viewName === 'timeline') $('#viewTimeline').addClass('active');
            else if (viewName === 'timeline-config') $('#viewTimelineConfig').addClass('active');
            else if (viewName === 'documentation') $('#viewDocumentation').addClass('active');
            else if (viewName === 'teams') $('#viewTeams').addClass('active');
            else if (viewName === 'settings') $('#viewSettings').addClass('active');

            this.renderAll();
        },

        renderAll() {
            const filtered = this.getFilteredTasks();

            // Render Views
            this.renderKanbanColumns(filtered);
            this.renderBoardGrid(filtered);
            this.renderListTable(filtered);
            this.renderCalendar(filtered);
            this.renderTimelineSchedule(filtered);
            this.renderTimelineSchedulerTable(filtered);

            // Update Header & Category Badges
            this.updateCounts();
        },

        updateCounts() {
            const counts = {
                todo: this.tasks.filter(t => t.status === 'todo').length,
                'in-progress': this.tasks.filter(t => t.status === 'in-progress').length,
                review: this.tasks.filter(t => t.status === 'review').length,
                completed: this.tasks.filter(t => t.status === 'completed').length
            };

            const total = this.tasks.length;
            const completionRate = total > 0 ? Math.round((counts.completed / total) * 100) : 0;

            $('#colCountTodo, #countCatTodo').text(counts.todo);
            $('#colCountProgress, #countCatProgress').text(counts['in-progress']);
            $('#colCountReview, #countCatReview').text(counts.review);
            $('#colCountComplete, #countCatComplete').text(counts.completed);

            // Dashboard Stats
            $('#dashTotalTasks').text(total);
            $('#dashCompletedTasks').text(counts.completed);
            $('#dashProgressTasks').text(counts['in-progress']);
            $('#dashCompletionRate').text(`${completionRate}% completion rate`);

            if (total > 0) {
                const todoPct = Math.round((counts.todo / total) * 100);
                const progPct = Math.round((counts['in-progress'] / total) * 100);
                const revPct = Math.round((counts.review / total) * 100);
                const compPct = Math.round((counts.completed / total) * 100);

                $('#dashStatTodo').text(`${counts.todo} tasks (${todoPct}%)`);
                $('#dashStatProgress').text(`${counts['in-progress']} tasks (${progPct}%)`);
                $('#dashStatReview').text(`${counts.review} tasks (${revPct}%)`);
                $('#dashStatComplete').text(`${counts.completed} tasks (${compPct}%)`);

                $('#barTodo').css('width', `${todoPct}%`);
                $('#barProgress').css('width', `${progPct}%`);
                $('#barReview').css('width', `${revPct}%`);
                $('#barComplete').css('width', `${compPct}%`);
            }
        },

        /* -------------------------------------------------------------------------- */
        /* KANBAN VIEW RENDER (JQUERY)                                                */
        /* -------------------------------------------------------------------------- */
        renderKanbanColumns(tasks) {
            const self = this;
            const $lists = {
                todo: $('#colListTodo').empty(),
                'in-progress': $('#colListProgress').empty(),
                review: $('#colListReview').empty(),
                completed: $('#colListComplete').empty()
            };

            $.each(tasks, function (idx, task) {
                const $card = self.createTaskCardElement(task);
                if ($lists[task.status]) {
                    $lists[task.status].append($card);
                }
            });
        },

        createTaskCardElement(task) {
            const self = this;
            const totalSubtasks = task.subtasks ? task.subtasks.length : 0;
            const doneSubtasks = task.subtasks ? task.subtasks.filter(s => s.done).length : 0;
            const progressPercent = totalSubtasks > 0 ? Math.round((doneSubtasks / totalSubtasks) * 100) : (task.progress || 0);

            // Priority and timeline attributes
            const priority = task.priority || 'medium';
            const priorityClass = `badge-priority-${priority}`;
            const priorityLabel = priority.toUpperCase();
            const startShort = formatDateShort(task.startDate || '2026-09-01');
            const dueShort = formatDateShort(task.dueDate || '2026-09-15');
            const durationDays = calculateDuration(task.startDate || '2026-09-01', task.dueDate || '2026-09-15');

            // Tag badges
            const tagsHtml = $.map(task.tags, function (tag) {
                const classMap = {
                    'Design UI/UX': 'tag-design',
                    'Frontend': 'tag-frontend',
                    'Auth': 'tag-auth',
                    'QA': 'tag-qa',
                    'Research': 'tag-research',
                    'Media': 'tag-media',
                    'Performance': 'tag-performance',
                    'Backend': 'tag-backend',
                    'API': 'tag-api',
                    'Database': 'tag-database'
                };
                const tagClass = classMap[tag] || 'tag-default';
                return `<span class="tag-badge ${tagClass}">${tag}</span>`;
            }).join(' ');

            // Assignees
            const assigneesHtml = $.map(task.assignees, function (mId) {
                const member = TEAM_MEMBERS.find(m => m.id === mId);
                return member ? `<img src="${member.avatar}" title="${member.name}" alt="${member.name}">` : '';
            }).join('');

            const $card = $('<div>', {
                class: 'task-card',
                attr: { draggable: true, 'data-id': task.id }
            });

            $card.html(`
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="card-tags">${tagsHtml}</div>
                    <span class="badge ${priorityClass} fs-8 fw-bold">${priorityLabel}</span>
                </div>
                <h4 class="card-title h6 fw-bold mb-1 text-dark">${task.title}</h4>
                <p class="card-desc text-secondary fs-7 mb-2">${task.desc}</p>
                
                <!-- Timeline Range Badge -->
                <div class="d-flex align-items-center justify-content-between fs-8 text-muted mb-3 bg-light-subtle p-1.5 rounded-2 border">
                    <span class="d-inline-flex align-items-center gap-1">
                        <i class="fa-regular fa-calendar-days text-primary"></i> ${startShort} - ${dueShort}
                    </span>
                    <span class="badge bg-white text-dark border fw-bold">${durationDays}d</span>
                </div>

                <div class="card-progress-wrap mb-3">
                    <div class="d-flex justify-content-between align-items-center fs-8 fw-semibold text-muted mb-1">
                        <span>Checklist</span>
                        <span>${doneSubtasks}/${totalSubtasks} (${progressPercent}%)</span>
                    </div>
                    <div class="progress" style="height: 5px;">
                        <div class="progress-bar bg-${self.getStatusBsColor(task.status)}" style="width: ${progressPercent}%;"></div>
                    </div>
                </div>

                <div class="card-footer-area d-flex align-items-center justify-content-between pt-2">
                    <div class="card-assignees">${assigneesHtml}</div>
                    <div class="card-metrics d-flex align-items-center gap-3 fs-8 fw-semibold text-muted">
                        <div class="metric-item"><i class="fa-solid fa-folder-open me-1"></i> ${totalSubtasks}</div>
                        <div class="metric-item"><i class="fa-regular fa-comment-dots me-1"></i> ${task.comments ? task.comments.length : 0}</div>
                    </div>
                </div>
            `);

            // Drag Events
            $card.on('dragstart', function (e) {
                self.draggedTaskId = task.id;
                $(this).addClass('dragging');
                if (e.originalEvent.dataTransfer) {
                    e.originalEvent.dataTransfer.setData('text/plain', task.id);
                }
            });

            $card.on('dragend', function () {
                self.draggedTaskId = null;
                $(this).removeClass('dragging');
            });

            // Card Click Handler
            $card.on('click', function (e) {
                if ($(e.target).closest('.card-menu-btn').length) return;
                self.openDetailModal(task.id);
            });

            return $card;
        },

        getStatusBsColor(status) {
            const map = {
                todo: 'danger',
                'in-progress': 'primary',
                review: 'warning',
                completed: 'success'
            };
            return map[status] || 'primary';
        },

        /* -------------------------------------------------------------------------- */
        /* BOARD GRID VIEW RENDER                                                     */
        /* -------------------------------------------------------------------------- */
        renderBoardGrid(tasks) {
            const self = this;
            const $container = $('#boardGridContainer').empty();

            $.each(tasks, function (idx, task) {
                const $col = $('<div>', { class: 'col-12 col-md-6 col-lg-4 col-xl-3' });
                const $card = self.createTaskCardElement(task);
                $col.append($card);
                $container.append($col);
            });
        },

        /* -------------------------------------------------------------------------- */
        /* LIST TABLE VIEW RENDER                                                     */
        /* -------------------------------------------------------------------------- */
        renderListTable(tasks) {
            const self = this;
            const $tbody = $('#listTableBody').empty();

            $.each(tasks, function (idx, task) {
                const statusBadgeMap = {
                    todo: '<span class="badge badge-todo rounded-pill px-2 py-1 fs-8">To Do</span>',
                    'in-progress': '<span class="badge badge-progress rounded-pill px-2 py-1 fs-8">In Progress</span>',
                    review: '<span class="badge badge-review rounded-pill px-2 py-1 fs-8">Review</span>',
                    completed: '<span class="badge badge-complete rounded-pill px-2 py-1 fs-8">Complete</span>'
                };

                const priorityClass = `badge-priority-${task.priority || 'medium'}`;
                const tagsHtml = $.map(task.tags, t => `<span class="tag-badge tag-default me-1">${t}</span>`).join('');
                
                const assigneesHtml = $.map(task.assignees, mId => {
                    const member = TEAM_MEMBERS.find(m => m.id === mId);
                    return member ? `<img src="${member.avatar}" class="avatar-sm rounded-circle" title="${member.name}" alt="${member.name}">` : '';
                }).join('');

                const totalSubtasks = task.subtasks ? task.subtasks.length : 0;
                const doneSubtasks = task.subtasks ? task.subtasks.filter(s => s.done).length : 0;
                const startShort = formatDateShort(task.startDate || '2026-09-01');
                const dueShort = formatDateShort(task.dueDate || '2026-09-15');

                const $tr = $('<tr>');
                $tr.html(`
                    <td class="py-3 px-4 fw-bold cursor-pointer task-title-cell text-dark">${task.title}</td>
                    <td class="py-3 px-4">${statusBadgeMap[task.status] || ''}</td>
                    <td class="py-3 px-4"><span class="badge ${priorityClass} fs-8">${(task.priority || 'medium').toUpperCase()}</span></td>
                    <td class="py-3 px-4 fs-8 text-muted fw-semibold">${startShort} - ${dueShort}</td>
                    <td class="py-3 px-4">${tagsHtml}</td>
                    <td class="py-3 px-4 fw-semibold text-muted">${doneSubtasks}/${totalSubtasks}</td>
                    <td class="py-3 px-4"><div class="card-assignees">${assigneesHtml}</div></td>
                    <td class="py-3 px-4 text-end">
                        <button class="btn btn-sm btn-light border btn-view-detail" title="View Detail"><i class="fa-regular fa-eye"></i></button>
                    </td>
                `);

                $tr.find('.task-title-cell, .btn-view-detail').on('click', function () {
                    self.openDetailModal(task.id);
                });

                $tbody.append($tr);
            });
        },

        /* -------------------------------------------------------------------------- */
        /* CALENDAR VIEW RENDER (SEPTEMBER 2026 REAL CALENDAR)                        */
        /* -------------------------------------------------------------------------- */
        renderCalendar(tasks) {
            const self = this;
            const $grid = $('#calendarGrid').empty();

            const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            $.each(days, function (i, day) {
                $grid.append(`<div class="text-center fs-8 fw-bold text-muted pb-2 border-bottom">${day}</div>`);
            });

            // September 2026: 30 days. Sep 1 is Tuesday.
            // 2 prev days (Aug 30, Aug 31), 30 days of Sep, 3 next days (Oct 1, 2, 3) = 35 cells.
            for (let i = 1; i <= 35; i++) {
                let dayNum = 0;
                let isCurrentMonth = true;
                let dateStr = '';

                if (i <= 2) {
                    // Aug 30, Aug 31
                    dayNum = 29 + i;
                    isCurrentMonth = false;
                    dateStr = `2026-08-${String(dayNum).padStart(2, '0')}`;
                } else if (i > 32) {
                    // Oct 1, Oct 2, Oct 3
                    dayNum = i - 32;
                    isCurrentMonth = false;
                    dateStr = `2026-10-${String(dayNum).padStart(2, '0')}`;
                } else {
                    // Sep 1 - Sep 30
                    dayNum = i - 2;
                    dateStr = `2026-09-${String(dayNum).padStart(2, '0')}`;
                }

                const $cell = $('<div>', {
                    class: `cal-cell ${isCurrentMonth ? '' : 'bg-light-subtle opacity-75'}`
                });

                const $cellHeader = $(`
                    <div class="cal-cell-header">
                        <span class="cal-date-num ${dayNum === 15 && isCurrentMonth ? 'badge bg-primary text-white p-1 rounded-circle' : ''}">${dayNum}</span>
                        ${isCurrentMonth ? `<button class="btn btn-sm btn-link text-decoration-none cal-cell-add-btn text-muted" title="Add task on Sep ${dayNum}"><i class="fa-solid fa-plus"></i></button>` : ''}
                    </div>
                `);

                $cellHeader.find('.cal-cell-add-btn').on('click', function (e) {
                    e.stopPropagation();
                    self.openTaskModal(null, 'todo', dateStr, dateStr);
                });

                $cell.append($cellHeader);

                // Find tasks that are scheduled on this day
                if (isCurrentMonth) {
                    const thisDate = parseDate(dateStr);
                    const dayTasks = tasks.filter(t => {
                        const start = parseDate(t.startDate || '2026-09-01');
                        const due = parseDate(t.dueDate || '2026-09-15');
                        return start <= thisDate && thisDate <= due;
                    });

                    $.each(dayTasks.slice(0, 3), function (_, task) {
                        const statusClass = `badge-${task.status === 'completed' ? 'complete' : task.status === 'in-progress' ? 'progress' : task.status}`;
                        const $pill = $('<div>', {
                            class: `cal-task-pill ${statusClass} text-truncate d-flex align-items-center gap-1 shadow-2xs`,
                            title: `${task.title} (${task.startDate} to ${task.dueDate})`
                        });
                        $pill.html(`<i class="fa-solid fa-circle fs-9"></i> <span>${task.title}</span>`);
                        $pill.on('click', function (e) {
                            e.stopPropagation();
                            self.openDetailModal(task.id);
                        });
                        $cell.append($pill);
                    });

                    if (dayTasks.length > 3) {
                        $cell.append(`<span class="fs-9 text-muted fw-bold">+${dayTasks.length - 3} more</span>`);
                    }
                }

                $grid.append($cell);
            }
        },

        /* -------------------------------------------------------------------------- */
        /* TIMELINE SCHEDULE (GANTT) RENDER                                           */
        /* -------------------------------------------------------------------------- */
        renderTimelineSchedule(tasks) {
            const self = this;
            const $list = $('#timelineTasksList').empty();

            if (tasks.length === 0) {
                $list.html('<div class="text-center text-muted p-4 fs-7"><i class="fa-regular fa-folder-open me-2"></i> No tasks found matching the filter.</div>');
                return;
            }

            const statusClassMap = {
                todo: 'timeline-bar-todo',
                'in-progress': 'timeline-bar-progress',
                review: 'timeline-bar-review',
                completed: 'timeline-bar-complete'
            };

            const statusBadgeMap = {
                todo: '<span class="badge badge-todo rounded-pill px-2 py-0.5 fs-8 me-1.5">To Do</span>',
                'in-progress': '<span class="badge badge-progress rounded-pill px-2 py-0.5 fs-8 me-1.5">In Progress</span>',
                review: '<span class="badge badge-review rounded-pill px-2 py-0.5 fs-8 me-1.5">Review</span>',
                completed: '<span class="badge badge-complete rounded-pill px-2 py-0.5 fs-8 me-1.5">Complete</span>'
            };

            $.each(tasks, function (idx, task) {
                const startObj = parseDate(task.startDate || '2026-09-01');
                const dueObj = parseDate(task.dueDate || '2026-09-15');
                const startDay = Math.min(30, Math.max(1, startObj.getDate()));
                const dueDay = Math.min(30, Math.max(1, dueObj.getDate()));
                const duration = calculateDuration(task.startDate || '2026-09-01', task.dueDate || '2026-09-15');

                const startMargin = ((startDay - 1) / 30) * 100;
                const widthPercent = Math.max(10, Math.min(100 - startMargin, (duration / 30) * 100));

                const priority = task.priority || 'medium';
                const priorityClass = `badge-priority-${priority}`;

                const assigneesHtml = $.map(task.assignees, mId => {
                    const m = TEAM_MEMBERS.find(mem => mem.id === mId);
                    return m ? `<img src="${m.avatar}" class="avatar-xs rounded-circle me-1" title="${m.name}" alt="${m.name}">` : '';
                }).join('');

                const $row = $('<div>', { class: 'gantt-grid-row gap-3' });
                $row.html(`
                    <!-- Task Title & Date info -->
                    <div class="d-flex flex-column" style="min-width: 0;">
                        <span class="fw-bold fs-7 text-dark text-truncate" title="${task.title}">${task.title}</span>
                        <div class="d-flex align-items-center gap-1 mt-1 flex-wrap">
                            ${statusBadgeMap[task.status] || ''}
                            <span class="badge ${priorityClass} fs-9">${priority.toUpperCase()}</span>
                            <span class="fs-8 text-muted fw-semibold">${formatDateShort(task.startDate)} - ${formatDateShort(task.dueDate)} (${duration}d)</span>
                        </div>
                    </div>

                    <!-- Gantt Timeline Bar -->
                    <div class="px-2">
                        <div class="timeline-bar-track position-relative" style="height: 18px; border-radius: 999px;">
                            <div class="timeline-bar-fill ${statusClassMap[task.status] || 'timeline-bar-progress'} d-flex align-items-center justify-content-center text-white fs-9 fw-bold px-2 text-truncate" 
                                 style="width: ${widthPercent}%; margin-left: ${startMargin}%; height: 100%; border-radius: 999px;"
                                 title="${task.title}: ${task.startDate} to ${task.dueDate} (${duration} days)">
                                ${duration >= 4 ? `${duration} days` : ''}
                            </div>
                        </div>
                    </div>

                    <!-- Actions & Assignees -->
                    <div class="d-flex align-items-center justify-content-end gap-2">
                        <div class="card-assignees">${assigneesHtml}</div>
                        <button class="btn btn-sm btn-outline-secondary py-0.5 px-2 fs-8 btn-quick-adjust-timeline" title="Adjust Timeline Dates">
                            <i class="fa-solid fa-sliders"></i>
                        </button>
                    </div>
                `);

                $row.find('.btn-quick-adjust-timeline').on('click', function (e) {
                    e.stopPropagation();
                    // Switch to Task Timeline Scheduler tab and highlight row
                    $('#calendarSubTabs .cal-subtab-btn[data-subview="schedule-manager"]').trigger('click');
                    setTimeout(() => {
                        const $targetRow = $(`#row-schedule-${task.id}`);
                        if ($targetRow.length) {
                            $targetRow[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                            $targetRow.addClass('table-primary');
                            setTimeout(() => $targetRow.removeClass('table-primary'), 1500);
                        }
                    }, 50);
                });

                $row.on('click', function () {
                    self.openDetailModal(task.id);
                });

                $list.append($row);
            });
        },

        /* -------------------------------------------------------------------------- */
        /* TASK TIMELINE SCHEDULER TABLE RENDER (DIRECT INLINE DATE ADJUSTMENT)      */
        /* -------------------------------------------------------------------------- */
        renderTimelineSchedulerTable(tasks) {
            const self = this;
            const $tbody = $('#timelineSchedulerTableBody').empty();

            if (tasks.length === 0) {
                $tbody.html('<tr><td colspan="8" class="text-center text-muted p-4">No tasks found for timeline scheduling.</td></tr>');
                return;
            }

            const statusBadgeMap = {
                todo: '<span class="badge badge-todo rounded-pill px-2 py-1 fs-8">To Do</span>',
                'in-progress': '<span class="badge badge-progress rounded-pill px-2 py-1 fs-8">In Progress</span>',
                review: '<span class="badge badge-review rounded-pill px-2 py-1 fs-8">Review</span>',
                completed: '<span class="badge badge-complete rounded-pill px-2 py-1 fs-8">Complete</span>'
            };

            $.each(tasks, function (idx, task) {
                const startDateVal = task.startDate || '2026-09-01';
                const dueDateVal = task.dueDate || '2026-09-15';
                const priorityVal = task.priority || 'medium';
                const durationDays = calculateDuration(startDateVal, dueDateVal);

                const $tr = $('<tr>', { id: `row-schedule-${task.id}` });
                $tr.html(`
                    <!-- Task Title -->
                    <td class="py-2.5 px-3">
                        <span class="fw-bold text-dark d-block">${task.title}</span>
                        <span class="fs-8 text-muted">${task.tags.join(', ')}</span>
                    </td>

                    <!-- Status -->
                    <td class="py-2.5 px-2">${statusBadgeMap[task.status] || ''}</td>

                    <!-- Priority Selector -->
                    <td class="py-2.5 px-2">
                        <select class="form-select form-select-sm fs-8 py-1 task-table-priority" data-task-id="${task.id}">
                            <option value="low" ${priorityVal === 'low' ? 'selected' : ''}>Low</option>
                            <option value="medium" ${priorityVal === 'medium' ? 'selected' : ''}>Medium</option>
                            <option value="high" ${priorityVal === 'high' ? 'selected' : ''}>High</option>
                            <option value="urgent" ${priorityVal === 'urgent' ? 'selected' : ''}>Urgent</option>
                        </select>
                    </td>

                    <!-- Start Date Input -->
                    <td class="py-2.5 px-2">
                        <input type="date" class="form-control form-control-sm fs-8 py-1 task-table-start" data-task-id="${task.id}" value="${startDateVal}">
                    </td>

                    <!-- Due Date Input -->
                    <td class="py-2.5 px-2">
                        <input type="date" class="form-control form-control-sm fs-8 py-1 task-table-due" data-task-id="${task.id}" value="${dueDateVal}">
                    </td>

                    <!-- Duration Badge -->
                    <td class="py-2.5 px-2">
                        <span class="badge bg-primary-subtle text-primary fw-bold task-table-duration fs-8">${durationDays}d</span>
                    </td>

                    <!-- Quick Preset Buttons -->
                    <td class="py-2.5 px-2">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-light border timeline-quick-btn btn-preset" data-task-id="${task.id}" data-days="3" title="+3 Days">+3d</button>
                            <button class="btn btn-light border timeline-quick-btn btn-preset" data-task-id="${task.id}" data-days="7" title="+1 Week">+1w</button>
                            <button class="btn btn-light border timeline-quick-btn btn-preset-week" data-task-id="${task.id}" data-week="this" title="Set to Week 1">W1</button>
                        </div>
                    </td>

                    <!-- Action Save Button -->
                    <td class="py-2.5 px-3 text-end">
                        <button class="btn btn-sm btn-primary py-1 px-2 fs-8 fw-semibold btn-save-timeline-row" data-task-id="${task.id}">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Apply
                        </button>
                    </td>
                `);

                // Live date recalculation on change
                const updateRowDuration = () => {
                    const start = $tr.find('.task-table-start').val();
                    const due = $tr.find('.task-table-due').val();
                    const dur = calculateDuration(start, due);
                    $tr.find('.task-table-duration').text(`${dur}d`);
                };

                $tr.find('.task-table-start, .task-table-due').on('change', updateRowDuration);

                // Quick Preset Handler
                $tr.find('.btn-preset').on('click', function () {
                    const days = parseInt($(this).data('days')) || 3;
                    const $startInput = $tr.find('.task-table-start');
                    const $dueInput = $tr.find('.task-table-due');
                    const curStart = parseDate($startInput.val());
                    const newDue = new Date(curStart.getFullYear(), curStart.getMonth(), curStart.getDate() + days - 1);
                    const dueStr = `${newDue.getFullYear()}-${String(newDue.getMonth() + 1).padStart(2, '0')}-${String(newDue.getDate()).padStart(2, '0')}`;
                    $dueInput.val(dueStr);
                    updateRowDuration();
                });

                $tr.find('.btn-preset-week').on('click', function () {
                    $tr.find('.task-table-start').val('2026-09-01');
                    $tr.find('.task-table-due').val('2026-09-07');
                    updateRowDuration();
                });

                // Save Timeline Row Button
                $tr.find('.btn-save-timeline-row').on('click', function () {
                    const startVal = $tr.find('.task-table-start').val();
                    const dueVal = $tr.find('.task-table-due').val();
                    const priorityVal = $tr.find('.task-table-priority').val();

                    task.startDate = startVal;
                    task.dueDate = dueVal;
                    task.priority = priorityVal;

                    self.saveTasks();
                    self.renderAll();
                    showLiveToast(`Timeline for <b>"${task.title}"</b> updated to <b>${formatDateShort(startVal)} - ${formatDateShort(dueVal)}</b>!`);
                });

                $tbody.append($tr);
            });
        },

        /* -------------------------------------------------------------------------- */
        /* TASK MODAL HANDLERS                                                        */
        /* -------------------------------------------------------------------------- */
        openTaskModal(taskId = null, defaultStatus = 'todo', defaultStart = '2026-09-01', defaultDue = '2026-09-15') {
            $('#taskForm')[0].reset();
            $('#subtaskInputsList').empty();
            this.renderMemberSelectorGrid();

            if (taskId) {
                const task = this.tasks.find(t => t.id === taskId);
                if (task) {
                    $('#modalTaskHeading').text('Edit Task');
                    $('#taskId').val(task.id);
                    $('#taskTitle').val(task.title);
                    $('#taskDescription').val(task.desc);
                    $('#taskStatus').val(task.status);
                    $('#taskPriority').val(task.priority || 'medium');
                    $('#taskStartDate').val(task.startDate || '2026-09-01');
                    $('#taskDueDate').val(task.dueDate || '2026-09-15');
                    $('#taskTagsInput').val(task.tags.join(', '));

                    // Check member checkboxes
                    $.each(task.assignees, function (_, mId) {
                        $(`#chk_member_${mId}`).prop('checked', true);
                    });

                    // Populate subtasks
                    if (task.subtasks) {
                        const self = this;
                        $.each(task.subtasks, function (_, st) {
                            self.addSubtaskInputField(st.text, st.done);
                        });
                    }
                }
            } else {
                $('#modalTaskHeading').text('Create New Task');
                $('#taskId').val('');
                $('#taskStatus').val(defaultStatus);
                $('#taskPriority').val('medium');
                $('#taskStartDate').val(defaultStart);
                $('#taskDueDate').val(defaultDue);
                this.addSubtaskInputField('');
                this.addSubtaskInputField('');
            }

            this.taskModalBs.show();
        },

        renderMemberSelectorGrid() {
            const $grid = $('#memberSelectorGrid').empty();
            $.each(TEAM_MEMBERS, function (_, m) {
                const $col = $('<div>', { class: 'col-6' });
                $col.html(`
                    <label class="d-flex align-items-center gap-2 p-2 rounded border cursor-pointer fs-7 bg-white">
                        <input type="checkbox" id="chk_member_${m.id}" value="${m.id}" class="form-check-input mt-0">
                        <img src="${m.avatar}" class="avatar-sm rounded-circle" alt="${m.name}">
                        <span class="fw-medium text-truncate">${m.name}</span>
                    </label>
                `);
                $grid.append($col);
            });
        },

        addSubtaskInputField(text = '', done = false) {
            const $item = $('<div>', { class: 'input-group input-group-sm mb-1' });
            $item.html(`
                <div class="input-group-text bg-white">
                    <input type="checkbox" class="form-check-input mt-0 st-done-check" ${done ? 'checked' : ''}>
                </div>
                <input type="text" class="form-control st-text-input fs-7" placeholder="Subtask item..." value="${text}">
                <button type="button" class="btn btn-outline-danger btn-remove-st"><i class="fa-solid fa-xmark"></i></button>
            `);

            $item.find('.btn-remove-st').on('click', function () {
                $item.remove();
            });

            $('#subtaskInputsList').append($item);
        },

        handleTaskFormSubmit() {
            const id = $('#taskId').val() || 'task-' + Date.now();
            const title = $('#taskTitle').val().trim();
            const desc = $('#taskDescription').val().trim();
            const status = $('#taskStatus').val();
            const priority = $('#taskPriority').val() || 'medium';
            const startDate = $('#taskStartDate').val() || '2026-09-01';
            const dueDate = $('#taskDueDate').val() || '2026-09-15';
            const tagsRaw = $('#taskTagsInput').val();

            const tags = $.map(tagsRaw.split(','), t => t.trim()).filter(t => t.length > 0);

            // Assignees
            const assignees = [];
            $.each(TEAM_MEMBERS, function (_, m) {
                if ($(`#chk_member_${m.id}`).is(':checked')) {
                    assignees.push(m.id);
                }
            });

            // Subtasks
            const subtasks = [];
            $('#subtaskInputsList .input-group').each(function () {
                const text = $(this).find('.st-text-input').val().trim();
                const done = $(this).find('.st-done-check').is(':checked');
                if (text) subtasks.push({ text, done });
            });

            const existingIdx = this.tasks.findIndex(t => t.id === id);
            if (existingIdx > -1) {
                this.tasks[existingIdx] = {
                    ...this.tasks[existingIdx],
                    title,
                    desc,
                    status,
                    priority,
                    startDate,
                    dueDate,
                    tags,
                    assignees,
                    subtasks
                };
                showLiveToast(`Task <b>"${title}"</b> updated successfully!`);
            } else {
                this.tasks.push({
                    id,
                    title,
                    desc,
                    status,
                    priority,
                    startDate,
                    dueDate,
                    progress: 0,
                    tags,
                    assignees,
                    subtasks,
                    comments: []
                });
                showLiveToast(`Task <b>"${title}"</b> created with timeline schedule!`);
            }

            this.saveTasks();
            this.taskModalBs.hide();
            this.renderAll();
        },

        /* -------------------------------------------------------------------------- */
        /* DETAIL MODAL HANDLERS                                                      */
        /* -------------------------------------------------------------------------- */
        openDetailModal(taskId) {
            this.activeDetailTaskId = taskId;
            const task = this.tasks.find(t => t.id === taskId);
            if (!task) return;

            $('#detailTitle').text(task.title);
            $('#detailDesc').text(task.desc);
            $('#detailStatusSelect').val(task.status);

            // Timeline Schedule fields in details
            const startStr = task.startDate || '2026-09-01';
            const dueStr = task.dueDate || '2026-09-15';
            const duration = calculateDuration(startStr, dueStr);
            const priority = task.priority || 'medium';

            $('#detailStartDate').text(formatDateShort(startStr) + ', 2026');
            $('#detailDueDate').text(formatDateShort(dueStr) + ', 2026');
            $('#detailDuration').text(`${duration} Days`);

            const priorityClass = `badge-priority-${priority}`;
            $('#detailPriorityBadge')
                .attr('class', `badge ${priorityClass}`)
                .text(priority.toUpperCase());

            // Tags
            const tagsHtml = $.map(task.tags, t => `<span class="tag-badge tag-default me-1">${t}</span>`).join('');
            $('#detailTags').html(tagsHtml);

            // Assignees
            const assigneesHtml = $.map(task.assignees, mId => {
                const m = TEAM_MEMBERS.find(mem => mem.id === mId);
                return m ? `
                    <div class="d-flex align-items-center gap-2 p-1 rounded bg-light border">
                        <img src="${m.avatar}" class="avatar-sm rounded-circle" alt="${m.name}">
                        <div class="d-flex flex-column">
                            <span class="fw-semibold fs-7">${m.name}</span>
                            <span class="text-muted fs-8">${m.role}</span>
                        </div>
                    </div>
                ` : '';
            }).join('');
            $('#detailAssigneesList').html(assigneesHtml);

            // Render Subtasks Checklist
            this.renderSubtaskChecklist(task);

            // Render Comments
            this.renderComments(task);

            this.detailModalBs.show();
        },

        renderSubtaskChecklist(task) {
            const self = this;
            const total = task.subtasks ? task.subtasks.length : 0;
            const done = task.subtasks ? task.subtasks.filter(s => s.done).length : 0;
            const percent = total > 0 ? Math.round((done / total) * 100) : (task.progress || 0);

            $('#detailSubtaskProgressText').text(`${done} of ${total} completed`);
            $('#detailProgressFill').css('width', `${percent}%`);

            const $list = $('#detailSubtasksChecklist').empty();
            if (task.subtasks) {
                $.each(task.subtasks, function (idx, st) {
                    const $li = $('<li>', {
                        class: `list-group-item d-flex align-items-center gap-2 px-0 py-2 border-0 ${st.done ? 'text-decoration-line-through text-muted' : ''}`
                    });
                    $li.html(`
                        <input type="checkbox" class="form-check-input mt-0" data-idx="${idx}" ${st.done ? 'checked' : ''}>
                        <span>${st.text}</span>
                    `);
                    $list.append($li);
                });
            }

            $list.find('input[type="checkbox"]').on('change', function () {
                const idx = $(this).data('idx');
                task.subtasks[idx].done = $(this).is(':checked');
                self.saveTasks();
                self.renderSubtaskChecklist(task);
                self.renderAll();
            });
        },

        renderComments(task) {
            const $list = $('#commentsList').empty();
            if (task.comments && task.comments.length > 0) {
                $.each(task.comments, function (_, c) {
                    $list.append(`
                        <div class="d-flex gap-2 align-items-start">
                            <img src="${c.avatar}" class="avatar-sm rounded-circle mt-1" alt="${c.author}">
                            <div class="bg-light p-2 rounded-3 fs-7 border flex-grow-1">
                                <span class="fw-bold me-1 text-dark">${c.author}</span>
                                <span class="text-secondary">${c.text}</span>
                            </div>
                        </div>
                    `);
                });
            } else {
                $list.html('<p class="text-muted fs-8 mb-0">No comments yet.</p>');
            }
            $list.scrollTop($list[0].scrollHeight);
        },

        handleAddComment() {
            const text = $('#newCommentInput').val().trim();
            if (!text || !this.activeDetailTaskId) return;

            const task = this.tasks.find(t => t.id === this.activeDetailTaskId);
            if (task) {
                if (!task.comments) task.comments = [];
                task.comments.push({
                    author: 'Jenno Wilson',
                    avatar: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&q=80',
                    text
                });
                $('#newCommentInput').val('');
                this.saveTasks();
                this.renderComments(task);
                this.renderAll();
            }
        }
    };

    // Initialize Syncboard App
    SyncboardApp.init();
});
