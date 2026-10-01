<?php
/**
 * ==============================================================================
 * SYNCBOARD - ENTERPRISE 2-COLUMN SPLIT CURTAIN LOGIN
 * Location: /Authentication/Login.php
 * ==============================================================================
 * 2-Column Split Layout:
 * - Left Column: Clean, enterprise login form with username, password, remember me, forgot password.
 * - Right Column: Cinematic feature slideshow showcase.
 * - Submit Action: Left curtain slides left, right curtain slides right,
 *   revealing the central portal gateway transition to the workspace.
 */

$APPNAME = "SDN - Project Management";
$pageTitle = $APPNAME . " | Enterprise Sign In";
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= $basePath ?>assets/img/sdnicon.png">
    <link rel="apple-touch-icon" href="<?= $basePath ?>assets/img/sdnicon.png">
    <title><?= htmlspecialchars($pageTitle) ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Unified Stylesheet -->
    <link rel="stylesheet" href="<?= $basePath ?>assets/css/styles.css">
</head>

<body class="bg-dark">

    <!-- Main Auth Viewport Wrapper with 2-Column Split Curtain -->
    <div class="auth-split-wrapper" id="authWrapper">

        <!-- Behind-the-Curtains Portal Reveal (Visible when Left & Right Curtains Slide Away) -->
        <div class="auth-portal-reveal" id="authPortalReveal">
            <div class="portal-pulse-logo mb-3">
                <img src="<?= $basePath ?>assets/img/sdn.png" alt="SDN Logo" style="width: 100%; height: 100%; object-fit: contain;" onerror="this.onerror=null; this.src='https://cdn-icons-png.flaticon.com/512/906/906338.png';">
            </div>
            <h3 class="fw-extrabold text-white text-uppercase tracking-wider mb-2" id="portalStatusTitle">
                ENTERING WORKSPACE...
            </h3>
            <p class="text-white-50 fs-7 mb-3" id="portalStatusSub">
                Authenticating credentials and loading project telemetry...
            </p>
            <div class="spinner-border text-primary" role="status" style="width: 2rem; height: 2rem;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <!-- 2-Column Split Card Container -->
        <div class="auth-split-card" id="authSplitCard">

            <!-- =============================================================== -->
            <!-- KOLOM KIRI: FORM LOGIN (Curtain Left)                          -->
            <!-- =============================================================== -->
            <div class="auth-curtain-left" id="authColLeft">
                <div class="auth-form-container">

                    <!-- Brand Header -->
                    <div class="mb-4">
                        <div class="auth-brand-badge mb-3">
                            <img src="<?= $basePath ?>assets/img/sdn.png" alt="SDN Logo" style="width: 32px; height: 32px; object-fit: contain;" onerror="this.onerror=null; this.src='https://cdn-icons-png.flaticon.com/512/906/906338.png';">
                        </div>
                        <h1 class="h3 fw-extrabold text-dark mb-1">Sign In</h1>
                        <p class="text-muted fs-7 mb-0">Enter your credentials to access your SDN Workspace.</p>
                    </div>

                    <!-- Alert Feedback Box -->
                    <div id="loginAlert" class="alert alert-danger fs-7 py-2 px-3 rounded-3 d-none mb-3"></div>

                    <!-- Main Simple Login Form -->
                    <form id="loginForm" novalidate>
                        <input type="hidden" id="loginRedirectTarget" value="<?= $basePath ?>Workspace/KanbanProject.php">

                        <!-- Username / Email Input -->
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label fs-7 fw-bold text-dark mb-1">Username / Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-muted border-end-0"><i class="fa-solid fa-user fs-7"></i></span>
                                <input type="text" class="form-control border-start-0 ps-0 fs-7" id="inputEmail" placeholder="Masukkan username atau email" value="sophia.carter@syncboard.internal" required autocomplete="username">
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label fs-7 fw-bold text-dark mb-1">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-muted border-end-0"><i class="fa-solid fa-lock fs-7"></i></span>
                                <input type="password" class="form-control border-start-0 border-end-0 ps-0 fs-7" id="inputPassword" placeholder="Masukkan password" value="Syncboard@2026" required autocomplete="current-password">
                                <button class="btn btn-outline-secondary border-start-0 text-muted" type="button" id="togglePasswordBtn" title="Lihat password">
                                    <i class="fa-solid fa-eye fs-7"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Remember Me & Forgot Password Row -->
                        <div class="d-flex align-items-center justify-content-between mb-4 fs-7">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                <label class="form-check-label text-secondary fs-8" for="rememberMe">Ingat saya</label>
                            </div>
                            <a href="ForgotPassword.php" class="fs-8 text-primary text-decoration-none fw-semibold">Lupa password?</a>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 py-2.5 rounded-3 fw-bold fs-7 shadow-sm d-flex align-items-center justify-content-center gap-2" id="btnSubmitLogin">
                            <span>Masuk</span>
                            <i class="fa-solid fa-arrow-right fs-8"></i>
                        </button>
                    </form>

                    <!-- Footer Info -->
                    <div class="text-center text-muted fs-8 mt-4 pt-3 border-top">
                        <span>Belum punya akun? <a href="javascript:void(0)" class="text-primary text-decoration-none fw-semibold" onclick="alert('Silakan hubungi administrator sistem untuk pendaftaran akun baru.')">Hubungi Admin</a></span>
                    </div>

                </div>
            </div>

            <!-- =============================================================== -->
            <!-- KOLOM KANAN: SLIDESHOW SHOWCASE (Curtain Right)                -->
            <!-- =============================================================== -->
            <div class="auth-curtain-right" id="authColRight">
                
                <!-- Ambient Glow Orbs -->
                <div class="slide-glow-orb bg-primary" style="top: 10%; right: 10%;"></div>
                <div class="slide-glow-orb bg-info" style="bottom: 10%; left: 10%;"></div>

                <div class="auth-slideshow-container">

                    <!-- Top Bar Badges -->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-white bg-opacity-10 text-white border border-white border-opacity-10 px-2.5 py-1.5 rounded-pill fs-8">
                                <i class="fa-solid fa-bolt text-warning me-1"></i> SDN Platform v2.6
                            </span>
                            <span class="badge bg-success bg-opacity-20 text-success border border-success border-opacity-20 px-2.5 py-1.5 rounded-pill fs-8">
                                <span class="dot dot-complete me-1"></span> Live Telemetry Active
                            </span>
                        </div>
                        <span class="text-white-50 fs-8 font-monospace">HQ &bull; Cluster ID: #SDN-US-EAST</span>
                    </div>

                    <!-- Carousel Slideshow Showcase -->
                    <div id="authShowcaseCarousel" class="carousel slide carousel-fade my-auto" data-bs-ride="carousel" data-bs-interval="4500">
                        
                        <!-- Carousel Indicators -->
                        <div class="carousel-indicators position-static justify-content-start mb-4">
                            <button type="button" data-bs-target="#authShowcaseCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#authShowcaseCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#authShowcaseCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>

                        <div class="carousel-inner">

                            <!-- SLIDE 1: Enterprise Kanban Project -->
                            <div class="carousel-item active">
                                <div class="auth-slide-card mb-4">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="badge bg-primary text-white p-2 rounded-3">
                                                <i class="fa-solid fa-table-columns fs-7"></i>
                                            </div>
                                            <div>
                                                <h6 class="text-white fw-bold mb-0">Kanban & Portfolio Engine</h6>
                                                <small class="text-white-50 fs-9">Sprint Velocity & Deliverables</small>
                                            </div>
                                        </div>
                                        <span class="badge bg-info-subtle text-info fs-8">4 Columns Active</span>
                                    </div>

                                    <!-- Mockup Image Preview Card -->
                                    <div class="rounded-3 overflow-hidden border border-white border-opacity-10 position-relative mb-3 bg-dark">
                                        <img src="<?= $basePath ?>assets/img/mockup to do project list team.webp" alt="Kanban Preview" class="w-100 object-fit-cover" style="height: 180px;" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&w=800&q=80';">
                                        <div class="position-absolute bottom-0 start-0 end-0 p-2.5 bg-dark bg-opacity-75 backdrop-blur d-flex align-items-center justify-content-between">
                                            <span class="text-white fs-8 fw-semibold"><i class="fa-solid fa-circle-nodes text-primary me-1"></i> Multi-Domain Sync</span>
                                            <span class="badge bg-primary fs-9">94% Sprint Velocity</span>
                                        </div>
                                    </div>

                                    <!-- Interactive Stat Badges -->
                                    <div class="row g-2 text-white">
                                        <div class="col-4">
                                            <div class="p-2 rounded-2 bg-white bg-opacity-5 border border-white border-opacity-10 text-center">
                                                <div class="fs-9 text-white-50">To Do</div>
                                                <div class="fw-bold fs-7 text-warning">14 Tasks</div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="p-2 rounded-2 bg-white bg-opacity-5 border border-white border-opacity-10 text-center">
                                                <div class="fs-9 text-white-50">In Progress</div>
                                                <div class="fw-bold fs-7 text-info">8 Tasks</div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="p-2 rounded-2 bg-white bg-opacity-5 border border-white border-opacity-10 text-center">
                                                <div class="fs-9 text-white-50">Completed</div>
                                                <div class="fw-bold fs-7 text-success">38 Done</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="text-white fw-extrabold mb-2">Streamline Enterprise Workflows</h4>
                                <p class="text-white-50 fs-7 mb-0">
                                    Coordinate high-impact design and development sprints with interactive drag-and-drop boards, status automation, and granular task category filters.
                                </p>
                            </div>

                            <!-- SLIDE 2: Live Domain Telemetry & Health Monitoring -->
                            <div class="carousel-item">
                                <div class="auth-slide-card mb-4">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="badge bg-success text-white p-2 rounded-3">
                                                <i class="fa-solid fa-globe fs-7"></i>
                                            </div>
                                            <div>
                                                <h6 class="text-white fw-bold mb-0">Domain Telemetry & Monitoring</h6>
                                                <small class="text-white-50 fs-9">Live SSL, Latency & Route Health</small>
                                            </div>
                                        </div>
                                        <span class="badge bg-success text-white fs-8"><i class="fa-solid fa-wifi me-1"></i> Live Ping OK</span>
                                    </div>

                                    <!-- Mockup Telemetry Stream Panel -->
                                    <div class="p-3 rounded-3 bg-black bg-opacity-50 border border-white border-opacity-10 font-monospace mb-3">
                                        <div class="d-flex align-items-center justify-content-between mb-2 text-white-50 fs-8">
                                            <span>TARGET FQDN</span>
                                            <span>HTTP STATUS</span>
                                            <span>LATENCY</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between py-1 border-bottom border-white border-opacity-10 text-white fs-8">
                                            <span class="text-info fw-bold"><i class="fa-solid fa-lock text-success me-1"></i> kanban.sdn.internal</span>
                                            <span class="badge bg-success-subtle text-success fs-9">200 OK</span>
                                            <span class="text-success fw-bold">14 ms</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between py-1 border-bottom border-white border-opacity-10 text-white fs-8">
                                            <span class="text-info fw-bold"><i class="fa-solid fa-lock text-success me-1"></i> api.sdn-middleware.internal</span>
                                            <span class="badge bg-success-subtle text-success fs-9">200 OK</span>
                                            <span class="text-success fw-bold">18 ms</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between pt-1 text-white fs-8">
                                            <span class="text-info fw-bold"><i class="fa-solid fa-lock text-success me-1"></i> auth.sso.sdn.internal</span>
                                            <span class="badge bg-success-subtle text-success fs-9">200 OK</span>
                                            <span class="text-success fw-bold">12 ms</span>
                                        </div>
                                    </div>

                                    <!-- Telemetry Metrics Bar -->
                                    <div class="d-flex align-items-center justify-content-between text-white fs-8">
                                        <span><i class="fa-solid fa-shield-halved text-success me-1"></i> TLS 1.3 Valid (342d)</span>
                                        <span><i class="fa-solid fa-server text-primary me-1"></i> 8 Active Nodes</span>
                                        <span class="text-success fw-bold">99.98% Uptime</span>
                                    </div>
                                </div>

                                <h4 class="text-white fw-extrabold mb-2">Live Production Telemetry</h4>
                                <p class="text-white-50 fs-7 mb-0">
                                    Every project is mapped directly to its registered production domain, delivering instant latency checks, SSL expiration inspectors, and server health telemetry.
                                </p>
                            </div>

                            <!-- SLIDE 3: Team Communication & Channels -->
                            <div class="carousel-item">
                                <div class="auth-slide-card mb-4">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="badge bg-info text-white p-2 rounded-3">
                                                <i class="fa-solid fa-comments fs-7"></i>
                                            </div>
                                            <div>
                                                <h6 class="text-white fw-bold mb-0">Team Messages & Huddles</h6>
                                                <small class="text-white-50 fs-9">Contextual Task Embedding</small>
                                            </div>
                                        </div>
                                        <span class="badge bg-primary-subtle text-primary fs-8">6 Online</span>
                                    </div>

                                    <!-- Mockup Chat Thread Preview -->
                                    <div class="p-3 rounded-3 bg-black bg-opacity-40 border border-white border-opacity-10 mb-3">
                                        <div class="d-flex gap-2.5 mb-2.5">
                                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=80&auto=format&fit=crop&q=80" alt="Sophia" class="rounded-circle" style="width: 32px; height: 32px; object-fit: cover;">
                                            <div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="text-white fs-8 fw-bold">Sophia Carter</span>
                                                    <span class="text-white-50 fs-9">09:15 AM</span>
                                                </div>
                                                <p class="text-white-50 fs-8 mb-0">Domain telemetry SSL check has passed for sprint release #402! 🚀</p>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2.5">
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&auto=format&fit=crop&q=80" alt="Michael" class="rounded-circle" style="width: 32px; height: 32px; object-fit: cover;">
                                            <div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="text-white fs-8 fw-bold">Michael Anderson</span>
                                                    <span class="text-white-50 fs-9">09:16 AM</span>
                                                </div>
                                                <p class="text-white-50 fs-8 mb-0">Awesome! Merging the UI updates into production now.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between text-white-50 fs-8">
                                        <span><i class="fa-solid fa-hashtag text-info me-1"></i> #general-workspace</span>
                                        <span><i class="fa-solid fa-phone text-success me-1"></i> HD Voice & Video Enabled</span>
                                    </div>
                                </div>

                                <h4 class="text-white fw-extrabold mb-2">Real-Time Team Sync</h4>
                                <p class="text-white-50 fs-7 mb-0">
                                    Collaborate seamlessly across squad channels, embed live Kanban tasks directly in threads, and initiate instant team huddles without leaving your workspace.
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- Bottom Enterprise Security SLA Footer -->
                    <div class="pt-3 border-top border-white border-opacity-10 d-flex align-items-center justify-content-between text-white-50 fs-8">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fa-solid fa-shield-check text-success"></i>
                            <span>SOC2 Type II &bull; ISO/IEC 27001 Certified</span>
                        </div>
                        <span>SLA 99.99% Guaranteed</span>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Core Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Authentication Controller & 2-Column Split Curtain Animation Script -->
    <script src="<?= $basePath ?>assets/js/auth.js"></script>
</body>

</html>
