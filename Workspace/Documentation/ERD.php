<?php
$pageTitle = 'ERD List - Documentation - Syncboard';
$currentPage = 'erd';
$currentModule = 'workspace';
$basePath = '../../';
$breadcrumbs = [
    ['title' => 'Workspace', 'url' => '../KanbanProject.php'],
    ['title' => 'Documentation', 'url' => '#'],
    ['title' => 'ERD', 'url' => '']
];
include __DIR__ . '/../../layouts/header.php';
?>


            <!-- Page Header Banner -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-warning">
                        <i class="fa-solid fa-diagram-project fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">ERD Master List</h1>
                        <span class="text-muted fs-7">Entity Relationship Diagrams, Database Schemas, & Data Models</span>
                    </div>
                </div>

                <div class="project-actions-area d-flex align-items-center gap-3">
                    <button class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#uploadDocModal">
                        <i class="fa-solid fa-cloud-arrow-up"></i> Upload New ERD
                    </button>
                </div>
            </section>

            <!-- Main Master Table Content -->
                <!-- Filters & Search Toolbar -->
                <div class="card shadow-sm border rounded-4 p-3 bg-white mb-4">
                    <div class="row g-3 align-items-center justify-content-between">
                        <div class="col-12 col-md-5">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" id="docSearchInput" class="form-control border-start-0 fs-7" placeholder="Search ERD schema, diagram title, project, author...">
                            </div>
                        </div>
                        <div class="col-12 col-md-7 d-flex flex-wrap align-items-center justify-content-md-end gap-2">
                            <select id="docStatusFilter" class="form-select form-select-sm fs-7 w-auto">
                                <option value="">All Statuses</option>
                                <option value="Approved">Approved</option>
                                <option value="In Review">In Review</option>
                                <option value="Draft">Draft</option>
                                <option value="Archived">Archived</option>
                            </select>
                            <select id="docSortFilter" class="form-select form-select-sm fs-7 w-auto">
                                <option value="newest">Sort: Newest</option>
                                <option value="oldest">Sort: Oldest</option>
                                <option value="title">Sort: Title A-Z</option>
                            </select>
                            <a href="TrackingVersion.php" class="btn btn-sm btn-outline-warning text-dark rounded-3 d-flex align-items-center gap-1.5 fs-7">
                                <i class="fa-solid fa-timeline text-dark"></i> Track Versioning
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Master Table Card -->
                <div class="card shadow-sm border rounded-4 overflow-hidden bg-white">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                <tr>
                                    <th class="ps-4" style="width: 40px;">
                                        <input class="form-check-input" type="checkbox" id="selectAllDocs">
                                    </th>
                                    <th><i class="fa-solid fa-diagram-project text-warning me-1.5 opacity-75"></i> Diagram & Schema Name</th>
                                    <th><i class="fa-solid fa-code-branch text-indigo me-1.5 opacity-75"></i> Version</th>
                                    <th><i class="fa-regular fa-user text-secondary me-1.5 opacity-75"></i> Author</th>
                                    <th><i class="fa-solid fa-hard-drive text-secondary me-1.5 opacity-75"></i> File Size</th>
                                    <th><i class="fa-regular fa-clock text-secondary me-1.5 opacity-75"></i> Last Updated</th>
                                    <th><i class="fa-solid fa-shield-halved text-secondary me-1.5 opacity-75"></i> Status</th>
                                    <th class="pe-4 text-end"><i class="fa-solid fa-sliders text-secondary me-1.5 opacity-75"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody class="fs-7">
                                <!-- Populated dynamically by DocTracker.initDocListPage('ERD') -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Table Footer Pagination -->
                    <div class="card-footer bg-white border-top p-3 d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <span class="text-muted fs-7" id="showingDocCount">Showing <strong>0</strong> ERD Diagrams</span>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
            </div>

    <!-- Upload Document Modal -->
    <div class="modal fade" id="uploadDocModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg p-2">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">Upload ERD Diagram</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fs-7 fw-semibold">Diagram Title *</label>
                            <input type="text" class="form-control fs-7" placeholder="e.g. ERD - Database Module" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-7 fw-semibold">Upload File (PNG, SVG, PDF, Draw.io) *</label>
                            <input type="file" class="form-control fs-7">
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label class="form-label fs-7 fw-semibold">Initial Version</label>
                                <input type="text" class="form-control fs-7" placeholder="v1.0" value="v1.0.0">
                            </div>
                            <div class="col-6">
                                <label class="form-label fs-7 fw-semibold">Status</label>
                                <select class="form-select fs-7">
                                    <option value="approved">Approved</option>
                                    <option value="review" selected>In Review</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-7 fw-semibold">Description / Schema Summary</label>
                            <textarea class="form-control fs-7" rows="3" placeholder="Add entity relationship and database schema summary..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-outline-secondary px-3 fs-7" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary px-4 fs-7 fw-semibold">Upload ERD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
$extraJs = "<script>$(document).ready(function () { window.initDocListPage('ERD'); });</script>";
include __DIR__ . '/../../layouts/footer.php';
?>

