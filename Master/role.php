<?php
$pageTitle = 'Role Management - Master - Syncboard';
$currentPage = 'role';
$currentModule = 'master';
$basePath = '../';
include __DIR__ . '/../layouts/header.php';
?>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary">
                        <i class="fa-solid fa-user-shield fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Role Management</h1>
                        <span class="text-muted fs-7">Define user access levels and system permissions</span>
                    </div>
                </div>

                <button class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-plus"></i> Add New Role
                </button>
            </section>

            <!-- Role Content Table -->
            <div class="view-wrapper flex-grow-1 p-4">
                <div class="card shadow-sm border rounded-4 overflow-hidden bg-white">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr class="fs-8 text-uppercase text-muted">
                                    <th class="ps-4">Role Name</th>
                                    <th>Description</th>
                                    <th>Users Count</th>
                                    <th>Status</th>
                                    <th class="pe-4 text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody class="fs-7">
                                <tr>
                                    <td class="ps-4 fw-bold text-dark"><i class="fa-solid fa-crown text-warning me-2"></i> Super Admin</td>
                                    <td class="text-secondary">Full access across all modules and settings</td>
                                    <td><span class="badge bg-light text-dark border">2 Users</span></td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">Active</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border"><i class="fa-solid fa-pen-to-square"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold text-dark"><i class="fa-solid fa-user-tie text-primary me-2"></i> Project Manager</td>
                                    <td class="text-secondary">Can create, manage, assign tasks and view reports</td>
                                    <td><span class="badge bg-light text-dark border">4 Users</span></td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">Active</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border"><i class="fa-solid fa-pen-to-square"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold text-dark"><i class="fa-solid fa-laptop-code text-info me-2"></i> Developer</td>
                                    <td class="text-secondary">Assigned to projects, can edit assigned tasks</td>
                                    <td><span class="badge bg-light text-dark border">15 Users</span></td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">Active</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border"><i class="fa-solid fa-pen-to-square"></i></button>
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

