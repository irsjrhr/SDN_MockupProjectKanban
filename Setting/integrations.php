<?php
$currentPage = 'setting-integrations';
$currentModule = 'setting';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integrations & API Ecosystem - Syncboard</title>

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
        <?php include __DIR__ . '/sidebar.php'; ?>

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
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Integrations & API</li>
                        </ol>
                    </nav>
                </div>
            </header>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary">
                        <i class="fa-solid fa-plug fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Integrations & Developer APIs</h1>
                        <span class="text-muted fs-7">Connect third-party Git repositories, Figma design files, cloud storage, and generate developer API keys</span>
                    </div>
                </div>
                <button class="btn btn-primary fs-7 rounded-3"><i class="fa-solid fa-key me-1"></i> Generate API Key</button>
            </section>

            <!-- Content Area -->
            <div class="view-wrapper flex-grow-1 p-4">
                <div class="row g-4 mb-4">
                    <!-- GitHub -->
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card shadow-sm border rounded-4 bg-white p-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <i class="fa-brands fa-github fs-1 text-dark"></i>
                                    <span class="badge bg-success-subtle text-success">Active &bull; Synced</span>
                                </div>
                                <h2 class="h6 fw-bold mb-1">GitHub Enterprise</h2>
                                <p class="text-muted fs-8 mb-3">Automatically close tasks when commit messages reference <code>fixes #ID</code> or pull requests are merged.</p>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-secondary btn-sm rounded-3 flex-grow-1">Configure</button>
                                <button class="btn btn-outline-danger btn-sm rounded-3"><i class="fa-solid fa-link-slash"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Figma -->
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card shadow-sm border rounded-4 bg-white p-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <i class="fa-brands fa-figma fs-1 text-danger"></i>
                                    <span class="badge bg-success-subtle text-success">Active &bull; Connected</span>
                                </div>
                                <h2 class="h6 fw-bold mb-1">Figma Workspace</h2>
                                <p class="text-muted fs-8 mb-3">Embed live design prototypes and inspect design components directly inside task sidebars.</p>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-secondary btn-sm rounded-3 flex-grow-1">Manage Tokens</button>
                                <button class="btn btn-outline-danger btn-sm rounded-3"><i class="fa-solid fa-link-slash"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Google Drive -->
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card shadow-sm border rounded-4 bg-white p-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <i class="fa-brands fa-google-drive fs-1 text-warning"></i>
                                    <span class="badge bg-secondary-subtle text-muted">Available</span>
                                </div>
                                <h2 class="h6 fw-bold mb-1">Google Workspace / Drive</h2>
                                <p class="text-muted fs-8 mb-3">Attach documents, spreadsheets, and shared team assets seamlessly from Google Drive.</p>
                            </div>
                            <button class="btn btn-primary btn-sm rounded-3 w-100">Connect Google Drive</button>
                        </div>
                    </div>
                </div>

                <!-- API Keys & Webhooks Section -->
                <div class="card shadow-sm border rounded-4 bg-white overflow-hidden">
                    <div class="card-header bg-white p-3 border-bottom d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="h6 fw-bold mb-0">Active REST API Keys</h2>
                            <span class="text-muted fs-8">Use API keys to access Syncboard programmatically from your CI/CD pipelines</span>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 fs-7">
                            <thead class="table-light fs-8 text-uppercase text-muted fw-bold">
                                <tr>
                                    <th class="ps-4">Key Name</th>
                                    <th>Token Prefix</th>
                                    <th>Permissions</th>
                                    <th>Created Date</th>
                                    <th>Last Used</th>
                                    <th class="pe-4 text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-bold text-dark">Production CI/CD Runner</div>
                                        <div class="text-muted fs-8">Used by GitHub Actions runner</div>
                                    </td>
                                    <td><code>sync_live_9f82...38ab</code></td>
                                    <td><span class="badge bg-primary-subtle text-primary">Full Write Access</span></td>
                                    <td>12 Jan 2026</td>
                                    <td><span class="text-success fs-8">5 mins ago</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-outline-danger rounded-2"><i class="fa-solid fa-trash-can"></i> Revoke</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-bold text-dark">Monitoring Telemetry Ingest</div>
                                        <div class="text-muted fs-8">Pushes server RAM, CPU and traffic stats</div>
                                    </td>
                                    <td><code>sync_telemetry_a41...8921</code></td>
                                    <td><span class="badge bg-secondary-subtle text-dark">Telemetry Only</span></td>
                                    <td>01 Feb 2026</td>
                                    <td><span class="text-success fs-8">Just now</span></td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-outline-danger rounded-2"><i class="fa-solid fa-trash-can"></i> Revoke</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
