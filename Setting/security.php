<?php
$currentPage = 'setting-security';
$currentModule = 'setting';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security & Governance Master - Syncboard</title>

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
                            <li class="breadcrumb-item text-muted"><a href="general.php" class="text-muted text-decoration-none">Master Settings</a></li>
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Security & Access</li>
                        </ol>
                    </nav>
                </div>
                <div class="navbar-right d-flex align-items-center gap-2">
                    <button class="btn btn-primary fs-7 rounded-3 px-3"><i class="fa-solid fa-shield me-1"></i> Update Security Policy</button>
                </div>
            </header>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-danger">
                        <i class="fa-solid fa-shield-halved fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Master Security & Authentication</h1>
                        <span class="text-muted fs-7">Manage two-factor authentication rules, session timeouts, password complexity, and IP restrictions</span>
                    </div>
                </div>
            </section>

            <!-- Content Area -->
            <div class="view-wrapper flex-grow-1 p-4">
                <div class="row g-4">
                    <div class="col-12 col-xl-8">
                        <!-- Two-Factor Authentication -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h2 class="h6 fw-bold mb-1 text-dark">Two-Factor Authentication (2FA)</h2>
                                    <p class="text-muted fs-7 mb-0">Require all developers and managers to provide a secondary TOTP code (Google Authenticator / Authy).</p>
                                </div>
                                <div class="form-check form-switch fs-4">
                                    <input class="form-check-input" type="checkbox" id="twoFaSwitch" checked>
                                </div>
                            </div>
                            <div class="p-3 bg-light rounded-3 border">
                                <span class="badge bg-success-subtle text-success mb-2">Enforcement Active</span>
                                <p class="text-muted fs-8 mb-0">All members with "Admin", "Tech Lead", and "Developer" roles are required to have 2FA enabled before accessing production telemetry or database schemas.</p>
                            </div>
                        </div>

                        <!-- Session Security -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4">
                            <h2 class="h6 fw-bold mb-1 text-dark">Session & Access Controls</h2>
                            <p class="text-muted fs-7 mb-4">Define inactivity policies to minimize risk of unauthorized access.</p>

                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="form-label fs-7 fw-bold">Inactivity Session Timeout</label>
                                    <select class="form-select fs-7 rounded-3">
                                        <option value="15">15 Minutes</option>
                                        <option value="30">30 Minutes</option>
                                        <option value="60" selected>1 Hour (Recommended)</option>
                                        <option value="480">8 Hours (Full Shift)</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label fs-7 fw-bold">Max Concurrent Logins / User</label>
                                    <select class="form-select fs-7 rounded-3">
                                        <option value="1">1 Session (Strict)</option>
                                        <option value="2" selected>2 Sessions (Desktop & Mobile)</option>
                                        <option value="unlimited">Unlimited Sessions</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Audit Log Retention -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4">
                            <h2 class="h6 fw-bold mb-1 text-dark">Audit Trail & Compliance</h2>
                            <p class="text-muted fs-7 mb-4">Preserve changes and activity histories for compliance auditing.</p>

                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="form-label fs-7 fw-bold">Audit Log Retention Duration</label>
                                    <select class="form-select fs-7 rounded-3">
                                        <option value="90">90 Days</option>
                                        <option value="180">180 Days</option>
                                        <option value="365" selected>1 Year (SOC2 Standard)</option>
                                        <option value="indefinite">Indefinite / Permanent</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label fs-7 fw-bold">Telemetry Granularity Retention</label>
                                    <select class="form-select fs-7 rounded-3">
                                        <option value="30" selected>30 Days (Per-minute IOPS / RAM)</option>
                                        <option value="90">90 Days</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security Score / Summary -->
                    <div class="col-12 col-xl-4">
                        <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-success-subtle text-success mb-3 p-3" style="width: 80px; height: 80px; margin: 0 auto;">
                                <i class="fa-solid fa-shield-check fs-1"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-1 text-dark">Security Health: 98%</h3>
                            <span class="badge bg-success mb-3">Enterprise Grade Compliance</span>
                            <p class="text-muted fs-8 mb-0">All high-risk configurations adhere to industry standard zero-trust architecture.</p>
                        </div>

                        <div class="card shadow-sm border rounded-4 bg-white p-4">
                            <h3 class="h6 fw-bold mb-3 text-dark"><i class="fa-solid fa-list-check text-primary me-2"></i>Security Checklist</h3>
                            <ul class="list-unstyled fs-8 mb-0 d-flex flex-column gap-2">
                                <li class="text-success"><i class="fa-solid fa-check-circle me-1"></i> 2FA Enforced for Admins</li>
                                <li class="text-success"><i class="fa-solid fa-check-circle me-1"></i> SSL / TLS 1.3 Strict Mode</li>
                                <li class="text-success"><i class="fa-solid fa-check-circle me-1"></i> SQL Injection & Rate Limiting</li>
                                <li class="text-success"><i class="fa-solid fa-check-circle me-1"></i> Auditable Trait Logging Active</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
