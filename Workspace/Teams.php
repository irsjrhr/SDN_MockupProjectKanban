<?php
$currentPage = 'teams';
$currentModule = 'workspace';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams Master List - Syncboard</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body class="bg-main">
    <div class="app-container d-flex">
        <!-- Sidebar Navigation Component -->
        <?php include __DIR__ . '/../layouts/sidebar.php'; ?>

        <!-- Main Content Area -->
        <main class="main-content flex-grow-1 d-flex flex-column min-vh-100">
            <!-- Top Header Navbar -->
            <header class="top-navbar bg-white border-bottom px-4 d-flex align-items-center justify-content-between">
                <div class="navbar-left d-flex align-items-center gap-3">
                    <button class="btn btn-light d-md-none" id="sidebarToggleBtn">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 fs-7">
                            <li class="breadcrumb-item text-muted"><a href="KanbanProject.php" class="text-muted text-decoration-none">Workspace</a></li>
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Teams</li>
                        </ol>
                    </nav>
                </div>

                <div class="navbar-right d-flex align-items-center gap-3">
                    <button class="btn btn-light btn-nav-icon rounded-circle position-relative" title="Notifications">
                        <i class="fa-regular fa-bell"></i>
                        <span class="notification-dot position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger p-1"></span>
                    </button>
                    <button class="btn btn-light btn-nav-icon rounded-circle" title="Messages">
                        <i class="fa-regular fa-comment-dots"></i>
                    </button>

                    <div class="dropdown">
                        <div class="user-profile-menu d-flex align-items-center gap-2 p-1 rounded-pill cursor-pointer" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&q=80" alt="Jenno Wilson" class="avatar-md rounded-circle">
                            <div class="user-meta d-flex flex-column d-none d-sm-flex">
                                <span class="user-name fw-bold fs-7 lh-1">Jenno Wilson</span>
                                <span class="user-email text-muted fs-8">jeno.sonn@gmail.com</span>
                            </div>
                            <i class="fa-solid fa-chevron-down text-muted fs-8 ms-1"></i>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li><a class="dropdown-menu-item dropdown-item fs-7" href="#"><i class="fa-regular fa-user me-2"></i> Profile</a></li>
                            <li><a class="dropdown-menu-item dropdown-item fs-7" href="../Setting/"><i class="fa-solid fa-gear me-2"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-menu-item dropdown-item text-danger fs-7" href="#"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </header>

            <!-- Page Header Banner -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary">
                        <i class="fa-solid fa-users fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Teams Master List</h1>
                        <span class="text-muted fs-7">Manage team members, roles, project assignments, and workload</span>
                    </div>
                </div>

                <div class="project-actions-area d-flex align-items-center gap-3">
                    <button class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#inviteMemberModal">
                        <i class="fa-solid fa-user-plus"></i> Add Team Member
                    </button>
                </div>
            </section>

            <!-- Main Content Area -->
            <div class="view-wrapper flex-grow-1 p-4">
                <!-- Filters Toolbar -->
                <div class="card shadow-sm border rounded-4 p-3 bg-white mb-4">
                    <div class="row g-3 align-items-center justify-content-between">
                        <div class="col-12 col-md-5">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" class="form-control border-start-0 fs-7" placeholder="Search member name, email, or role...">
                            </div>
                        </div>
                        <div class="col-12 col-md-7 d-flex flex-wrap align-items-center justify-content-md-end gap-2">
                            <select class="form-select form-select-sm fs-7 w-auto">
                                <option value="">All Roles</option>
                                <option value="pm">Project Manager</option>
                                <option value="dev">Developer</option>
                                <option value="designer">Designer</option>
                                <option value="qa">QA Engineer</option>
                            </select>
                            <select class="form-select form-select-sm fs-7 w-auto">
                                <option value="">All Statuses</option>
                                <option value="online">Online</option>
                                <option value="busy">Busy</option>
                                <option value="offline">Offline</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Teams Master Table Card -->
                <div class="card shadow-sm border rounded-4 overflow-hidden bg-white">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                <tr>
                                    <th class="ps-4" style="width: 40px;">
                                        <input class="form-check-input" type="checkbox">
                                    </th>
                                    <th>Member Name</th>
                                    <th>Email / Contact</th>
                                    <th>Role & Department</th>
                                    <th>Assigned Projects</th>
                                    <th>Active Tasks</th>
                                    <th>Status</th>
                                    <th class="pe-4 text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody class="fs-7">
                                <tr>
                                    <td class="ps-4">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2.5">
                                            <div class="user-avatar-wrap position-relative">
                                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80" alt="Sophia Carter" class="avatar-md rounded-circle">
                                                <span class="status-indicator online"></span>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark d-block">Sophia Carter</span>
                                                <span class="text-muted fs-8">Project Manager</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-secondary d-block">sophia.carter@syncboard.company</span>
                                        <span class="text-muted fs-8">+1 (555) 234-8921</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary fw-semibold">Product Management</span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-1">
                                            <span class="badge bg-light text-dark border">Middleware</span>
                                            <span class="badge bg-light text-dark border">Company Web</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fw-bold text-dark">5 Tasks</span>
                                            <div class="progress flex-grow-1" style="height: 6px; width: 60px;">
                                                <div class="progress-bar bg-success" style="width: 80%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success px-2 py-1">Active / Online</span>
                                    </td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-light border" title="Edit Member"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-light text-danger border" title="Remove Member"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="ps-4">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2.5">
                                            <div class="user-avatar-wrap position-relative">
                                                <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=80&q=80" alt="James Wilson" class="avatar-md rounded-circle">
                                                <span class="status-indicator busy"></span>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark d-block">James Wilson</span>
                                                <span class="text-muted fs-8">Lead Backend Programmer</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-secondary d-block">james.wilson@syncboard.company</span>
                                        <span class="text-muted fs-8">+1 (555) 482-1920</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info-subtle text-info fw-semibold">Engineering</span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-1">
                                            <span class="badge bg-light text-dark border">Middleware</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fw-bold text-dark">8 Tasks</span>
                                            <div class="progress flex-grow-1" style="height: 6px; width: 60px;">
                                                <div class="progress-bar bg-warning" style="width: 60%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning px-2 py-1">Busy</span>
                                    </td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-light border" title="Edit Member"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-light text-danger border" title="Remove Member"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="ps-4">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2.5">
                                            <div class="user-avatar-wrap position-relative">
                                                <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=80&q=80" alt="Michael Anderson" class="avatar-md rounded-circle">
                                                <span class="status-indicator online"></span>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark d-block">Michael Anderson</span>
                                                <span class="text-muted fs-8">UI/UX Designer</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-secondary d-block">michael.anderson@syncboard.company</span>
                                        <span class="text-muted fs-8">+1 (555) 912-4412</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning-subtle text-warning fw-semibold">Design Studio</span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-1">
                                            <span class="badge bg-light text-dark border">Company Web</span>
                                            <span class="badge bg-light text-dark border">Landing Page</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fw-bold text-dark">4 Tasks</span>
                                            <div class="progress flex-grow-1" style="height: 6px; width: 60px;">
                                                <div class="progress-bar bg-success" style="width: 75%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success px-2 py-1">Active / Online</span>
                                    </td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-light border" title="Edit Member"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-light text-danger border" title="Remove Member"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="ps-4">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2.5">
                                            <div class="user-avatar-wrap position-relative">
                                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80" alt="Daniel Johnson" class="avatar-md rounded-circle">
                                                <span class="status-indicator offline"></span>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-dark d-block">Daniel Johnson</span>
                                                <span class="text-muted fs-8">Frontend Developer</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-secondary d-block">daniel.johnson@syncboard.company</span>
                                        <span class="text-muted fs-8">+1 (555) 762-3841</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info-subtle text-info fw-semibold">Engineering</span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-1">
                                            <span class="badge bg-light text-dark border">Middleware</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fw-bold text-dark">6 Tasks</span>
                                            <div class="progress flex-grow-1" style="height: 6px; width: 60px;">
                                                <div class="progress-bar bg-info" style="width: 50%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary px-2 py-1">Offline</span>
                                    </td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-light border" title="Edit Member"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-light text-danger border" title="Remove Member"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Table Footer Pagination -->
                    <div class="card-footer bg-white border-top p-3 d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <span class="text-muted fs-7">Showing <strong>1-4</strong> of <strong>4</strong> Team Members</span>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Invite Team Member Modal -->
    <div class="modal fade" id="inviteMemberModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg p-2">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">Add New Team Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fs-7 fw-semibold">Full Name *</label>
                            <input type="text" class="form-control fs-7" placeholder="e.g. Alex Morgan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-7 fw-semibold">Email Address *</label>
                            <input type="email" class="form-control fs-7" placeholder="alex@syncboard.company" required>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label class="form-label fs-7 fw-semibold">Role *</label>
                                <select class="form-select fs-7" required>
                                    <option value="Project Manager">Project Manager</option>
                                    <option value="Frontend Developer">Frontend Developer</option>
                                    <option value="Backend Programmer">Backend Programmer</option>
                                    <option value="UI/UX Designer">UI/UX Designer</option>
                                    <option value="QA Engineer">QA Engineer</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fs-7 fw-semibold">Department</label>
                                <select class="form-select fs-7">
                                    <option value="Engineering">Engineering</option>
                                    <option value="Design Studio">Design Studio</option>
                                    <option value="Product Management">Product Management</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-outline-secondary px-3 fs-7" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary px-4 fs-7 fw-semibold">Add Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Application Script -->
    <script src="../assets/js/app.js"></script>
</body>

</html>
