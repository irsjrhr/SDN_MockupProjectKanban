<?php
/**
 * ==============================================================================
 * SYNCBOARD - WHITEBOARD & SKETCHING STUDIO (BOARD)
 * Location: /Workspace/Board.php
 * ==============================================================================
 * Interactive collaborative digital whiteboard studio.
 * Supports freehand sketches, highlighter, vector shapes, sticky notes,
 * multi-project & multi-task relations, and JSON/PNG export & import.
 */

$pageTitle = 'Whiteboard & Sketching Studio';
$currentPage = 'board';
$currentModule = 'workspace';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Project', 'url' => 'KanbanProject.php'],
    ['title' => 'Workspace', 'url' => '#'],
    ['title' => 'Whiteboard Studio', 'url' => '']
];

include __DIR__ . '/../layouts/header.php';
?>

<!-- =========================================================================== -->
<!-- 1. WHITEBOARD STUDIO HEADER & GLOBAL ACTIONS                                -->
<!-- =========================================================================== -->
<section class="p-4 bg-white border-bottom d-flex flex-wrap align-items-center justify-content-between gap-3">
    <div class="d-flex align-items-center gap-3">
        <div class="p-3 bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 52px; height: 52px;">
            <i class="fa-solid fa-chalkboard-user fs-3"></i>
        </div>
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <h1 class="h4 fw-extrabold text-dark mb-0">Whiteboard & Sketching Studio</h1>
                <span class="badge bg-indigo-subtle text-indigo border border-indigo-subtle fs-8 px-2 py-0.5 rounded-2 fw-semibold">
                    <i class="fa-solid fa-pen-ruler me-1"></i> Interactive Canvas
                </span>
            </div>
            <p class="text-muted fs-8 mb-0 mt-0.5">
                Papan coret digital kolaboratif untuk arsitektur, diagram, wireframe UI, dan sticky notes yang terhubung ke multi-project dan task.
            </p>
        </div>
    </div>

    <div class="d-flex align-items-center gap-2 flex-wrap">
        <!-- Import .board file -->
        <label class="btn btn-outline-secondary btn-sm px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-1.5 mb-0 cursor-pointer" title="Import file .board JSON">
            <i class="fa-solid fa-file-import"></i>
            <span>Import Board</span>
            <input type="file" class="d-none input-board-import-file" accept=".board,.json">
        </label>

        <!-- Manage Relations -->
        <button class="btn btn-outline-primary btn-sm px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-1.5" data-bs-toggle="modal" data-bs-target="#manageLinksModal">
            <i class="fa-solid fa-link"></i>
            <span>Relasi Project & Task</span>
        </button>

        <!-- New Board Modal Trigger -->
        <button class="btn btn-primary btn-sm px-3.5 py-2 fw-semibold rounded-3 d-flex align-items-center gap-1.5 shadow-sm" data-bs-toggle="modal" data-bs-target="#newBoardModal">
            <i class="fa-solid fa-plus"></i>
            <span>Board Baru</span>
        </button>
    </div>
</section>

<!-- =========================================================================== -->
<!-- 2. MAIN WHITEBOARD STUDIO WORKSPACE & CANVAS                                -->
<!-- =========================================================================== -->
<div class="p-4 bg-light-subtle" id="standaloneWhiteboardStudio">

    <div class="board-container mb-4">
        
        <!-- 2.1 Dedicated Top Header Control Bar -->
        <div class="board-header-bar">
            <!-- Left Info & Relations -->
            <div class="board-header-info">
                <div class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-chalkboard text-primary fs-6"></i>
                    <div>
                        <h6 class="fs-7 fw-bold mb-0 text-dark text-truncate board-active-title" style="max-width: 280px;">Microservices & API Gateway Flow</h6>
                    </div>
                </div>

                <!-- Linked Projects & Tasks Preview Chips -->
                <div class="d-none d-lg-flex align-items-center gap-2 ms-2 ps-2 border-start">
                    <span class="fs-9 fw-semibold text-muted">Projects:</span>
                    <div class="board-linked-projects d-flex align-items-center gap-1"></div>
                    <div class="vr mx-1"></div>
                    <span class="fs-9 fw-semibold text-muted">Tasks:</span>
                    <div class="board-linked-tasks d-flex align-items-center gap-1"></div>
                </div>
            </div>

            <!-- Right Controls (Undo/Redo, Grid, Zoom, Export, Fullscreen) -->
            <div class="board-header-controls">
                <!-- Undo / Redo -->
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-outline-secondary btn-sm btn-board-undo" title="Undo (Ctrl+Z)"><i class="fa-solid fa-rotate-left"></i></button>
                    <button class="btn btn-outline-secondary btn-sm btn-board-redo" title="Redo (Ctrl+Y)"><i class="fa-solid fa-rotate-right"></i></button>
                </div>

                <div class="vr mx-1 d-none d-sm-block"></div>

                <!-- Background Grid Switcher Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm rounded-3 d-flex align-items-center gap-1.5" data-bs-toggle="dropdown" title="Pola Grid Latar">
                        <i class="fa-solid fa-border-none text-muted"></i>
                        <span class="fs-8 fw-semibold d-none d-md-inline">Grid</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 fs-8">
                        <li><a class="dropdown-item btn-board-pattern" href="#" data-pattern="bg-grid-dots"><i class="fa-solid fa-ellipsis me-2 text-primary"></i> Dot Grid (Titik)</a></li>
                        <li><a class="dropdown-item btn-board-pattern" href="#" data-pattern="bg-grid-lines"><i class="fa-solid fa-table-cells me-2 text-info"></i> Line Grid (Garis)</a></li>
                        <li><a class="dropdown-item btn-board-pattern" href="#" data-pattern="bg-blank"><i class="fa-regular fa-square me-2 text-secondary"></i> Blank (Polos)</a></li>
                        <li><a class="dropdown-item btn-board-pattern" href="#" data-pattern="bg-darkboard"><i class="fa-solid fa-moon me-2 text-dark"></i> Dark Blackboard</a></li>
                    </ul>
                </div>

                <!-- Zoom Controls -->
                <div class="border rounded-3 d-flex align-items-center bg-white px-1">
                    <button class="btn btn-sm btn-link text-dark p-1 text-decoration-none btn-zoom-out" title="Zoom Out"><i class="fa-solid fa-minus fs-9"></i></button>
                    <span class="fs-9 fw-bold px-1 board-zoom-val">100%</span>
                    <button class="btn btn-sm btn-link text-dark p-1 text-decoration-none btn-zoom-in" title="Zoom In"><i class="fa-solid fa-plus fs-9"></i></button>
                </div>

                <!-- Export Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-primary btn-sm rounded-3 d-flex align-items-center gap-1.5" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-download"></i>
                        <span class="fs-8 fw-semibold d-none d-sm-inline">Export</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 fs-8">
                        <li><a class="dropdown-item btn-board-export-png" href="#"><i class="fa-solid fa-file-image text-success me-2"></i> Export Image (.PNG)</a></li>
                        <li><a class="dropdown-item btn-board-export-json" href="#"><i class="fa-solid fa-file-code text-primary me-2"></i> Export Board File (.board)</a></li>
                    </ul>
                </div>

                <!-- Fullscreen Button -->
                <button class="btn btn-outline-secondary btn-sm rounded-3 btn-board-fullscreen" title="Toggle Fullscreen">
                    <i class="fa-solid fa-expand"></i>
                </button>
            </div>
        </div>

        <!-- 2.2 The HTML5 Canvas Drawing Surface & Unified Floating Bottom Toolbar -->
        <div class="board-canvas-wrapper bg-grid-dots">
            <canvas id="drawingCanvas"></canvas>
            
            <!-- Unified Bottom Floating Toolbox (Tools, Colors, Stroke Width, Clear) -->
            <div class="board-floating-toolbar">
                <button class="board-tool-btn active" data-tool="pen" title="Freehand Pen (P)">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button class="board-tool-btn" data-tool="highlighter" title="Highlighter (H)">
                    <i class="fa-solid fa-highlighter text-warning"></i>
                </button>
                <button class="board-tool-btn" data-tool="eraser" title="Penghapus / Eraser (E)">
                    <i class="fa-solid fa-eraser"></i>
                </button>
                
                <div class="board-tool-divider"></div>

                <button class="board-tool-btn" data-tool="rect" title="Kotak / Rectangle (R)">
                    <i class="fa-regular fa-square"></i>
                </button>
                <button class="board-tool-btn" data-tool="circle" title="Lingkaran / Circle (C)">
                    <i class="fa-regular fa-circle"></i>
                </button>
                <button class="board-tool-btn" data-tool="arrow" title="Panah / Arrow (A)">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
                <button class="board-tool-btn" data-tool="line" title="Garis Lurus / Line (L)">
                    <i class="fa-solid fa-minus"></i>
                </button>

                <div class="board-tool-divider"></div>

                <button class="board-tool-btn" data-tool="text" title="Teks Coretan (T)">
                    <i class="fa-solid fa-font"></i>
                </button>
                <button class="board-tool-btn btn-add-sticky-note" data-tool="sticky" title="Tambah Sticky Note (S)">
                    <i class="fa-solid fa-note-sticky text-warning"></i>
                </button>
                <button class="board-tool-btn" data-tool="pan" title="Select / Pan Canvas">
                    <i class="fa-solid fa-hand"></i>
                </button>

                <div class="board-tool-divider"></div>

                <!-- Integrated Colors Swatches -->
                <button class="color-swatch-btn active" data-color="#4f46e5" style="background-color: #4f46e5;" title="Indigo"></button>
                <button class="color-swatch-btn" data-color="#0284c7" style="background-color: #0284c7;" title="Sky Blue"></button>
                <button class="color-swatch-btn" data-color="#059669" style="background-color: #059669;" title="Emerald Green"></button>
                <button class="color-swatch-btn" data-color="#d97706" style="background-color: #d97706;" title="Amber"></button>
                <button class="color-swatch-btn" data-color="#dc2626" style="background-color: #dc2626;" title="Rose Red"></button>
                <button class="color-swatch-btn" data-color="#0f172a" style="background-color: #0f172a;" title="Dark Slate"></button>

                <div class="board-tool-divider"></div>

                <!-- Stroke Sizes -->
                <button class="stroke-size-btn" data-size="2">2px</button>
                <button class="stroke-size-btn active" data-size="3">3px</button>
                <button class="stroke-size-btn" data-size="6">6px</button>

                <div class="board-tool-divider"></div>

                <!-- Clear Canvas -->
                <button class="board-tool-btn btn-board-clear text-danger" title="Clear Canvas">
                    <i class="fa-regular fa-trash-can"></i>
                </button>
            </div>
        </div>

    </div>

    <!-- ======================================================================= -->
    <!-- 3. BOARD FILES GALLERY & MULTI-RELATION MANAGEMENT                      -->
    <!-- ======================================================================= -->
    <div class="card border rounded-4 bg-white shadow-sm p-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
            <div>
                <h5 class="h6 fw-extrabold text-dark mb-1">
                    <i class="fa-solid fa-folder-tree text-primary me-1.5"></i> Gallery File Board (Multi-Project & Task)
                </h5>
                <p class="fs-8 text-muted mb-0">Daftar papan coret tersimpan. 1 file board dapat dihubungkan ke berbagai project maupun task.</p>
            </div>
            
            <div class="d-flex align-items-center gap-2">
                <!-- Filter Project Dropdown -->
                <select class="form-select form-select-sm fs-8 rounded-3" id="filterGalleryProject" style="width: 180px;">
                    <option value="">Semua Project (All)</option>
                    <option value="company">Company Website</option>
                    <option value="middleware">Middleware Project</option>
                    <option value="landing">Landing Page Campaign</option>
                    <option value="mobile">SDN Mobile App</option>
                    <option value="hrms">HRMS Portal</option>
                </select>
            </div>
        </div>

        <!-- Dynamic Board Gallery Cards Grid Container -->
        <div class="row g-3" id="boardGalleryContainer">
            <!-- Dynamically populated by WhiteboardStudio.renderGallery() -->
        </div>
    </div>

</div>

<!-- =========================================================================== -->
<!-- 4. MODALS: NEW BOARD & MANAGE RELATIONS                                     -->
<!-- =========================================================================== -->

<!-- Modal 1: New Board -->
<div class="modal fade" id="newBoardModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header border-bottom pb-3">
                <h5 class="modal-title h6 fw-extrabold text-dark d-flex align-items-center gap-2">
                    <i class="fa-solid fa-plus-circle text-primary"></i> Buat Whiteboard Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formCreateNewBoard">
                <div class="modal-body p-4">
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-8">
                            <label class="form-label fs-8 fw-bold text-dark">Nama / Judul Board <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-3 fs-7" id="newBoardTitle" placeholder="Contoh: Database ERD Draft v2" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label fs-8 fw-bold text-dark">Latar Belakang Canvas</label>
                            <select class="form-select rounded-3 fs-7" id="newBoardPattern">
                                <option value="bg-grid-dots">Dot Grid (Titik-titik)</option>
                                <option value="bg-grid-lines">Line Grid (Kotak Garis)</option>
                                <option value="bg-blank">Blank (Putih Polos)</option>
                                <option value="bg-darkboard">Dark Blackboard</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fs-8 fw-bold text-dark">Deskripsi Singkat</label>
                        <textarea class="form-control rounded-3 fs-7" id="newBoardDesc" rows="2" placeholder="Catatan atau tujuan coretan board ini..."></textarea>
                    </div>

                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label fs-8 fw-bold text-dark">Hubungkan ke Project</label>
                            <div class="d-flex flex-column gap-2 p-3 border rounded-3 bg-light" id="newBoardProjectsList">
                                <div class="form-check fs-8">
                                    <input class="form-check-input check-new-proj" type="checkbox" value="company" id="npProj1" checked>
                                    <label class="form-check-label fw-semibold" for="npProj1">Company Website</label>
                                </div>
                                <div class="form-check fs-8">
                                    <input class="form-check-input check-new-proj" type="checkbox" value="middleware" id="npProj2">
                                    <label class="form-check-label fw-semibold" for="npProj2">Middleware Project</label>
                                </div>
                                <div class="form-check fs-8">
                                    <input class="form-check-input check-new-proj" type="checkbox" value="landing" id="npProj3">
                                    <label class="form-check-label fw-semibold" for="npProj3">Landing Page Campaign</label>
                                </div>
                                <div class="form-check fs-8">
                                    <input class="form-check-input check-new-proj" type="checkbox" value="mobile" id="npProj4">
                                    <label class="form-check-label fw-semibold" for="npProj4">SDN Mobile App</label>
                                </div>
                                <div class="form-check fs-8">
                                    <input class="form-check-input check-new-proj" type="checkbox" value="hrms" id="npProj5">
                                    <label class="form-check-label fw-semibold" for="npProj5">HRMS Portal</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label fs-8 fw-bold text-dark">Hubungkan ke Task</label>
                            <div class="d-flex flex-column gap-2 p-3 border rounded-3 bg-light" id="newBoardTasksList">
                                <div class="form-check fs-8">
                                    <input class="form-check-input check-new-task" type="checkbox" value="TASK-101" id="npTask1">
                                    <label class="form-check-label" for="npTask1">TASK-101: Design System</label>
                                </div>
                                <div class="form-check fs-8">
                                    <input class="form-check-input check-new-task" type="checkbox" value="TASK-102" id="npTask2">
                                    <label class="form-check-label" for="npTask2">TASK-102: Dual Sidebar Layout</label>
                                </div>
                                <div class="form-check fs-8">
                                    <input class="form-check-input check-new-task" type="checkbox" value="TASK-103" id="npTask3">
                                    <label class="form-check-label" for="npTask3">TASK-103: OAuth2 GitHub</label>
                                </div>
                                <div class="form-check fs-8">
                                    <input class="form-check-input check-new-task" type="checkbox" value="TASK-104" id="npTask4">
                                    <label class="form-check-label" for="npTask4">TASK-104: API Gateway</label>
                                </div>
                                <div class="form-check fs-8">
                                    <input class="form-check-input check-new-task" type="checkbox" value="TASK-105" id="npTask5">
                                    <label class="form-check-label" for="npTask5">TASK-105: Hero Motion Animation</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top pt-2.5">
                    <button type="button" class="btn btn-outline-secondary btn-sm px-3 fs-8" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm px-4 fs-8 fw-semibold">
                        <i class="fa-solid fa-check me-1"></i> Buat & Buka Board
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 2: Manage Relations -->
<div class="modal fade" id="manageLinksModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header border-bottom pb-3">
                <h5 class="modal-title h6 fw-extrabold text-dark d-flex align-items-center gap-2">
                    <i class="fa-solid fa-link text-primary"></i> Kelola Asosiasi Project & Task
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <p class="fs-8 text-muted mb-3">Tautkan file board aktif ini (<strong id="modalActiveBoardTitle"></strong>) ke beberapa Project dan Task sekaligus agar mudah diakses dari Kanban tab.</p>
                
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <h6 class="fs-8 fw-bold text-uppercase text-muted mb-2">Projects Terhubung:</h6>
                        <div class="d-flex flex-column gap-2 p-3 border rounded-3 bg-light" id="manageModalProjectsList">
                            <!-- Populated dynamically -->
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <h6 class="fs-8 fw-bold text-uppercase text-muted mb-2">Tasks Terhubung:</h6>
                        <div class="d-flex flex-column gap-2 p-3 border rounded-3 bg-light" id="manageModalTasksList">
                            <!-- Populated dynamically -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top pt-2.5">
                <button type="button" class="btn btn-outline-secondary btn-sm px-3 fs-8" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary btn-sm px-4 fs-8 fw-semibold" id="btnSaveLinks">
                    <i class="fa-solid fa-save me-1"></i> Simpan Relasi
                </button>
            </div>
        </div>
    </div>
</div>

<?php
$extraJs = [
    $basePath . 'assets/js/board.js'
];
include __DIR__ . '/../layouts/footer.php';
?>

<script>
$(document).ready(function () {
    // Gallery Filter by Project
    $('#filterGalleryProject').on('change', function () {
        const val = $(this).val();
        if (window.activeWhiteboard) {
            window.activeWhiteboard.renderGallery(val);
        }
    });

    // Handle Create New Board
    $('#formCreateNewBoard').on('submit', function (e) {
        e.preventDefault();
        const title = $('#newBoardTitle').val().trim();
        const desc = $('#newBoardDesc').val().trim();
        const pattern = $('#newBoardPattern').val();
        
        const projs = [];
        $('.check-new-proj:checked').each(function () { projs.push($(this).val()); });
        if (projs.length === 0) projs.push('company');

        const tasks = [];
        $('.check-new-task:checked').each(function () { tasks.push($(this).val()); });

        if (window.activeWhiteboard) {
            window.activeWhiteboard.createBoard({
                name: title,
                description: desc,
                bgPattern: pattern,
                linkedProjects: projs,
                linkedTasks: tasks
            });

            $('#newBoardModal').modal('hide');
            $('#formCreateNewBoard')[0].reset();

            // Smooth scroll to canvas
            $('html, body').animate({ scrollTop: $('#standaloneWhiteboardStudio').offset().top - 20 }, 300);
        }
    });

    // Populate Manage Relations Modal on open
    $('#manageLinksModal').on('show.bs.modal', function () {
        if (!window.activeWhiteboard || !window.activeWhiteboard.activeBoard) return;
        const b = window.activeWhiteboard.activeBoard;
        $('#modalActiveBoardTitle').text(b.name);

        const allProjects = (window.SyncboardBoards && window.SyncboardBoards.projects) ? window.SyncboardBoards.projects : [
            { id: 'company', name: 'Company Website' },
            { id: 'middleware', name: 'Middleware Project' },
            { id: 'landing', name: 'Landing Page Campaign' },
            { id: 'mobile', name: 'SDN Mobile App' },
            { id: 'hrms', name: 'HRMS Portal' }
        ];

        const allTasks = (window.SyncboardBoards && window.SyncboardBoards.tasks) ? window.SyncboardBoards.tasks : [
            { id: 'TASK-101', name: 'Design System & Token Architecture' },
            { id: 'TASK-102', name: 'Dual Sidebar Layout Implementation' },
            { id: 'TASK-103', name: 'OAuth2 GitHub Integration' },
            { id: 'TASK-104', name: 'API Gateway & Rate Limiter' },
            { id: 'TASK-105', name: 'Hero Banner Motion Animation' }
        ];

        const $projList = $('#manageModalProjectsList').empty();
        allProjects.forEach(p => {
            const isChecked = (b.linkedProjects || []).includes(p.id) ? 'checked' : '';
            $projList.append(`
                <div class="form-check fs-8">
                    <input class="form-check-input check-edit-proj" type="checkbox" value="${p.id}" id="editProj_${p.id}" ${isChecked}>
                    <label class="form-check-label fw-semibold" for="editProj_${p.id}">${p.name}</label>
                </div>
            `);
        });

        const $taskList = $('#manageModalTasksList').empty();
        allTasks.forEach(t => {
            const isChecked = (b.linkedTasks || []).includes(t.id) ? 'checked' : '';
            $taskList.append(`
                <div class="form-check fs-8">
                    <input class="form-check-input check-edit-task" type="checkbox" value="${t.id}" id="editTask_${t.id}" ${isChecked}>
                    <label class="form-check-label" for="editTask_${t.id}">${t.id}: ${t.name}</label>
                </div>
            `);
        });
    });

    // Handle Save Relations
    $('#btnSaveLinks').on('click', function () {
        if (!window.activeWhiteboard || !window.activeWhiteboard.activeBoard) return;
        const projs = [];
        $('.check-edit-proj:checked').each(function () { projs.push($(this).val()); });
        const tasks = [];
        $('.check-edit-task:checked').each(function () { tasks.push($(this).val()); });

        window.activeWhiteboard.activeBoard.linkedProjects = projs;
        window.activeWhiteboard.activeBoard.linkedTasks = tasks;
        window.activeWhiteboard.saveCurrentBoard();
        window.activeWhiteboard.renderRelations();
        window.activeWhiteboard.renderGallery();

        $('#manageLinksModal').modal('hide');
    });
});
</script>
