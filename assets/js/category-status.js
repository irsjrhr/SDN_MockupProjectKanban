/**
 * ==============================================================================
 * SYNCBOARD - CATEGORY STATUS WORKSPACE ENGINE
 * Location: /assets/js/category-status.js
 * ==============================================================================
 */

$(document).ready(function () {
    // 1. URL status handling
    const urlParams = new URLSearchParams(window.location.search);
    let activeStatus = urlParams.get('status') || 'all';

    // 2. Filter tabs click
    $('.status-filter-tab').on('click', function (e) {
        e.preventDefault();
        const selectedStatus = $(this).data('status');
        $('.status-filter-tab').removeClass('active');
        $(this).addClass('active');

        // Update URL
        const currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('status', selectedStatus);
        window.history.replaceState({}, '', currentUrl);

        filterCategoryTasks(selectedStatus);
    });

    // 3. Search & Project Filter
    $('#categoryTaskSearch').on('input', function () {
        applyAllFilters();
    });

    $('#categoryProjectFilter, #categoryPriorityFilter').on('change', function () {
        applyAllFilters();
    });

    function applyAllFilters() {
        const query = ($('#categoryTaskSearch').val() || '').toLowerCase();
        const selectedProject = $('#categoryProjectFilter').val() || 'all';
        const selectedPriority = $('#categoryPriorityFilter').val() || 'all';
        const currentTabStatus = $('.status-filter-tab.active').data('status') || 'all';

        $('.task-item-card, .task-table-row').each(function () {
            const taskStatus = $(this).data('task-status');
            const taskProject = $(this).data('task-project');
            const taskPriority = $(this).data('task-priority');
            const taskText = $(this).text().toLowerCase();

            const matchStatus = (currentTabStatus === 'all' || taskStatus === currentTabStatus);
            const matchProject = (selectedProject === 'all' || taskProject === selectedProject);
            const matchPriority = (selectedPriority === 'all' || taskPriority === selectedPriority);
            const matchQuery = !query || taskText.includes(query);

            if (matchStatus && matchProject && matchPriority && matchQuery) {
                $(this).fadeIn(150);
            } else {
                $(this).fadeOut(100);
            }
        });
    }

    function filterCategoryTasks(status) {
        applyAllFilters();
        updateStatusHeader(status);
    }

    function updateStatusHeader(status) {
        const statusMap = {
            'all': { title: 'All Category Tasks', desc: 'Comprehensive task inventory across all pipeline stages' },
            'todo': { title: 'To Do Pipeline', desc: 'Backlog items and prioritized work ready to start' },
            'in-progress': { title: 'In Progress Tasks', desc: 'Active execution tasks currently under development' },
            'review': { title: 'QA & Code Review', desc: 'Deliverables undergoing quality assurance and peer review' },
            'completed': { title: 'Completed Tasks', desc: 'Finished and verified sprint items' }
        };

        if (statusMap[status]) {
            $('#currentStatusTitle').text(statusMap[status].title);
            $('#currentStatusDesc').text(statusMap[status].desc);
        }
    }

    // 4. View Mode Switcher (Grid vs Table)
    $('#btnViewGrid').on('click', function () {
        $('#btnViewGrid').addClass('btn-primary').removeClass('btn-outline-secondary');
        $('#btnViewTable').addClass('btn-outline-secondary').removeClass('btn-primary');
        $('#categoryGridView').fadeIn(150);
        $('#categoryTableView').hide();
    });

    $('#btnViewTable').on('click', function () {
        $('#btnViewTable').addClass('btn-primary').removeClass('btn-outline-secondary');
        $('#btnViewGrid').addClass('btn-outline-secondary').removeClass('btn-primary');
        $('#categoryTableView').fadeIn(150);
        $('#categoryGridView').hide();
    });

    // 5. Change Task Status on Dropdown selection
    $(document).on('click', '.dropdown-set-status', function (e) {
        e.preventDefault();
        const newStatus = $(this).data('new-status');
        const taskId = $(this).data('task-id') || 'SYNC-101';
        const taskTitle = $(this).data('task-title') || 'Selected Task';

        const $parent = $(this).closest('.task-item-card, .task-table-row');
        $parent.attr('data-task-status', newStatus);

        showCategoryToast('Task Status Updated', `<strong>${taskId}</strong>: moved to <strong>${newStatus.toUpperCase()}</strong>.`);
        applyAllFilters();
    });

    // 6. Toast Notification Helper
    function showCategoryToast(title, message) {
        let $container = $('#categoryToastContainer');
        if (!$container.length) {
            $('body').append(`
                <div id="categoryToastContainer" class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1100;"></div>
            `);
            $container = $('#categoryToastContainer');
        }

        const toastId = 'toast_' + Date.now();
        const toastHtml = `
            <div id="${toastId}" class="toast align-items-center border-0 shadow-lg bg-white rounded-3 overflow-hidden" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-primary text-white py-2">
                    <i class="fa-solid fa-layer-group me-2"></i>
                    <strong class="me-auto fs-7">${title}</strong>
                    <small class="text-white-50">Just now</small>
                    <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body fs-7 text-dark py-2 px-3">
                    ${message}
                </div>
            </div>
        `;

        $container.append(toastHtml);
        const toastElement = document.getElementById(toastId);
        const bsToast = new bootstrap.Toast(toastElement, { delay: 4000 });
        bsToast.show();

        $(toastElement).on('hidden.bs.toast', function () {
            $(this).remove();
        });
    }

    // Initialize with current URL status
    if (activeStatus) {
        $(`.status-filter-tab[data-status="${activeStatus}"]`).trigger('click');
    }
});
