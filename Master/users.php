<?php
$pageTitle = 'Users - Master - Syncboard';
$currentPage = 'users';
$currentModule = 'master';
$basePath = '../';
include __DIR__ . '/../layouts/header.php';
?>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-success">
                        <i class="fa-solid fa-users-gear fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Users Directory</h1>
                        <span class="text-muted fs-7">Manage active user accounts and role memberships</span>
                    </div>
                </div>

                <button class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-user-plus"></i> Add User
                </button>
            </section>

            <!-- Users Content Table -->
            <div class="view-wrapper flex-grow-1 p-4">
                <div class="card shadow-sm border rounded-4 overflow-hidden bg-white">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr class="fs-8 text-uppercase text-muted">
                                    <th class="ps-4">User</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th class="pe-4 text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody class="fs-7">
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80" alt="Sophia Carter" class="avatar-sm rounded-circle">
                                            <span class="fw-bold text-dark">Sophia Carter</span>
                                        </div>
                                    </td>
                                    <td class="text-secondary">sophia.carter@syncboard.internal</td>
                                    <td><span class="badge bg-primary-subtle text-primary">Project Manager</span></td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">Active</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-sm btn-light text-danger border"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80" alt="Daniel Johnson" class="avatar-sm rounded-circle">
                                            <span class="fw-bold text-dark">Daniel Johnson</span>
                                        </div>
                                    </td>
                                    <td class="text-secondary">daniel.johnson@syncboard.internal</td>
                                    <td><span class="badge bg-info-subtle text-info">Developer</span></td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">Active</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-sm btn-light text-danger border"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80" alt="James Wilson" class="avatar-sm rounded-circle">
                                            <span class="fw-bold text-dark">James Wilson</span>
                                        </div>
                                    </td>
                                    <td class="text-secondary">james.wilson@syncboard.internal</td>
                                    <td><span class="badge bg-info-subtle text-info">Developer</span></td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success">Active</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-light border"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-sm btn-light text-danger border"><i class="fa-solid fa-trash"></i></button>
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

