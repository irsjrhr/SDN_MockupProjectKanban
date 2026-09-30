<?php
$pageTitle = 'Permissions - Master - Syncboard';
$currentPage = 'permission';
$currentModule = 'master';
$basePath = '../';
include __DIR__ . '/../layouts/header.php';
?>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-warning">
                        <i class="fa-solid fa-key fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Permissions Matrix</h1>
                        <span class="text-muted fs-7">Manage system capabilities and feature flags</span>
                    </div>
                </div>

                <button class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-plus"></i> Add Permission
                </button>
            </section>

            <!-- Permissions Matrix Table -->
            <div class="view-wrapper flex-grow-1 p-4">
                <div class="card shadow-sm border rounded-4 overflow-hidden bg-white">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr class="fs-8 text-uppercase text-muted">
                                    <th class="ps-4">Permission Name</th>
                                    <th>Module</th>
                                    <th>Guard</th>
                                    <th>Admin</th>
                                    <th>Manager</th>
                                    <th>Dev</th>
                                    <th class="pe-4 text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody class="fs-7">
                                <tr>
                                    <td class="ps-4 fw-bold text-dark">projects.create</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Workspace</span></td>
                                    <td><code>web</code></td>
                                    <td><i class="fa-solid fa-check text-success"></i></td>
                                    <td><i class="fa-solid fa-check text-success"></i></td>
                                    <td><i class="fa-solid fa-xmark text-muted"></i></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border"><i class="fa-solid fa-pen"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold text-dark">tasks.update</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Workspace</span></td>
                                    <td><code>web</code></td>
                                    <td><i class="fa-solid fa-check text-success"></i></td>
                                    <td><i class="fa-solid fa-check text-success"></i></td>
                                    <td><i class="fa-solid fa-check text-success"></i></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border"><i class="fa-solid fa-pen"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold text-dark">users.manage</td>
                                    <td><span class="badge bg-dark-subtle text-dark">Master</span></td>
                                    <td><code>web</code></td>
                                    <td><i class="fa-solid fa-check text-success"></i></td>
                                    <td><i class="fa-solid fa-xmark text-muted"></i></td>
                                    <td><i class="fa-solid fa-xmark text-muted"></i></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border"><i class="fa-solid fa-pen"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<?php
include __DIR__ . '/../layouts/footer.php';
?>

