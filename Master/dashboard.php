<?php
$pageTitle = 'Master Dashboard - Syncboard';
$currentPage = 'dashboard';
$currentModule = 'master';
$basePath = '../';
include __DIR__ . '/../layouts/header.php';
?>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-dark">
                        <i class="fa-regular fa-compass fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Master Administration</h1>
                        <span class="text-muted fs-7">Control access rights, system roles, and user directory</span>
                    </div>
                </div>
            </section>

            <!-- Master Dashboard Content -->
            <div class="view-wrapper flex-grow-1 p-4">
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Total Users</span>
                                    <h3 class="h4 fw-extrabold mb-0">28</h3>
                                </div>
                                <div class="stat-icon bg-primary-subtle text-primary rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-users-gear fs-4"></i>
                                </div>
                            </div>
                            <span class="fs-8 text-success fw-semibold"><i class="fa-solid fa-circle-check"></i> 26 Active accounts</span>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Total Roles</span>
                                    <h3 class="h4 fw-extrabold text-primary mb-0">5</h3>
                                </div>
                                <div class="stat-icon bg-info-subtle text-info rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-user-shield fs-4"></i>
                                </div>
                            </div>
                            <span class="fs-8 text-muted fw-semibold">Admin, PM, Dev, QA, Viewer</span>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Permissions</span>
                                    <h3 class="h4 fw-extrabold text-success mb-0">32</h3>
                                </div>
                                <div class="stat-icon bg-success-subtle text-success rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-key fs-4"></i>
                                </div>
                            </div>
                            <span class="fs-8 text-muted fw-semibold">Granular system access rules</span>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card shadow-sm border rounded-4 p-3 bg-white">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-1">Security Health</span>
                                    <h3 class="h4 fw-extrabold text-success mb-0">99.8%</h3>
                                </div>
                                <div class="stat-icon bg-warning-subtle text-warning rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-shield-halved fs-4"></i>
                                </div>
                            </div>
                            <span class="fs-8 text-success fw-semibold"><i class="fa-solid fa-lock"></i> 2FA Enforced</span>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-12 col-lg-8">
                        <div class="card shadow-sm border rounded-4 p-4 bg-white">
                            <h2 class="h6 fw-bold mb-3">Quick Navigation</h2>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <a href="role.php" class="card text-decoration-none border rounded-3 p-3 text-center h-100 hover-shadow">
                                        <i class="fa-solid fa-user-shield fs-2 text-primary mb-2"></i>
                                        <h3 class="h6 fw-bold text-dark mb-1">Role Management</h3>
                                        <span class="text-muted fs-8">Configure access groups</span>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="permission.php" class="card text-decoration-none border rounded-3 p-3 text-center h-100 hover-shadow">
                                        <i class="fa-solid fa-key fs-2 text-warning mb-2"></i>
                                        <h3 class="h6 fw-bold text-dark mb-1">Permissions</h3>
                                        <span class="text-muted fs-8">Assign matrix capabilities</span>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="users.php" class="card text-decoration-none border rounded-3 p-3 text-center h-100 hover-shadow">
                                        <i class="fa-solid fa-users-gear fs-2 text-success mb-2"></i>
                                        <h3 class="h6 fw-bold text-dark mb-1">Users Directory</h3>
                                        <span class="text-muted fs-8">Manage active accounts</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="card shadow-sm border rounded-4 p-4 bg-white">
                            <h2 class="h6 fw-bold mb-3">Audit Log Summary</h2>
                            <div class="d-flex flex-column gap-3 fs-7">
                                <div>
                                    <span class="fw-bold text-dark">Role 'Developer' modified</span>
                                    <span class="d-block fs-8 text-muted">10 mins ago by Super Admin</span>
                                </div>
                                <div>
                                    <span class="fw-bold text-dark">User 'Daniel Johnson' assigned to Dev Team</span>
                                    <span class="d-block fs-8 text-muted">1 hour ago by Super Admin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
include __DIR__ . '/../layouts/footer.php';
?>

