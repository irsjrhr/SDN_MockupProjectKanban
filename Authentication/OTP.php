<?php
/**
 * ==============================================================================
 * SYNCBOARD - 2FA & 6-DIGIT OTP VERIFICATION
 * Location: /Authentication/OTP.php
 * ==============================================================================
 * 2-Column Split Layout for OTP Verification:
 * - Left Column: Interactive 6-box OTP input with auto-advance, backspace handler,
 *   paste support, countdown timer, and quick demo code auto-fill.
 * - Right Column: Multi-Factor Authentication & Zero-Trust security showcase.
 * - Submit Action: Split curtain animation verifying OTP and redirecting to Workspace.
 */

$APPNAME = "SDN - Project Management";
$pageTitle = $APPNAME . " | Verifikasi OTP";
$basePath = '../';
$targetEmail = isset($_GET['email']) && !empty($_GET['email']) ? htmlspecialchars($_GET['email']) : 'sophia.carter@syncboard.internal';
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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

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
                <i class="fa-solid fa-shield-check text-success fs-2"></i>
            </div>
            <h3 class="fw-extrabold text-white text-uppercase tracking-wider mb-2" id="portalStatusTitle">
                VERIFYING SECURITY CODE...
            </h3>
            <p class="text-white-50 fs-7 mb-3" id="portalStatusSub">
                Validating cryptographic token and opening authenticated session...
            </p>
            <div class="spinner-border text-primary" role="status" style="width: 2rem; height: 2rem;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <!-- 2-Column Split Card Container -->
        <div class="auth-split-card" id="authSplitCard">

            <!-- =============================================================== -->
            <!-- KOLOM KIRI: FORM VERIFIKASI OTP (Curtain Left)                 -->
            <!-- =============================================================== -->
            <div class="auth-curtain-left" id="authColLeft">
                <div class="auth-form-container">

                    <!-- Back Navigation Link -->
                    <a href="Login.php" class="text-decoration-none text-muted fs-8 fw-bold mb-4 d-inline-flex align-items-center gap-2 hover-primary transition-all">
                        <i class="fa-solid fa-arrow-left fs-9"></i> Kembali ke Halaman Login
                    </a>

                    <!-- Brand Header -->
                    <div class="mb-4">
                        <div class="auth-brand-badge mb-3">
                            <i class="fa-solid fa-shield-halved text-primary fs-5"></i>
                        </div>
                        <h1 class="h3 fw-extrabold text-dark mb-1">Verifikasi Kode OTP</h1>
                        <p class="text-muted fs-7 mb-2">
                            Masukkan 6-digit kode verifikasi yang telah dikirimkan ke email Anda:
                        </p>
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-8 px-2.5 py-1.5 rounded-pill">
                                <i class="fa-solid fa-envelope me-1"></i> <span id="targetOtpEmail"><?= $targetEmail ?></span>
                            </span>
                            <button type="button" class="btn btn-sm btn-outline-primary fs-9 py-1 px-2.5 rounded-pill fw-bold" id="btnDemoOtpFill">
                                <i class="fa-solid fa-wand-magic-sparkles me-1"></i> Demo Fill (849201)
                            </button>
                        </div>
                    </div>

                    <!-- Alert Feedback Box -->
                    <div id="otpAlert" class="alert alert-danger fs-7 py-2 px-3 rounded-3 d-none mb-3"></div>

                    <!-- Main OTP Form -->
                    <form id="otpForm" novalidate>
                        <input type="hidden" id="otpRedirectTarget" value="<?= $basePath ?>Workspace/KanbanProject.php">

                        <!-- 6-Box Individual OTP Inputs -->
                        <div class="mb-4">
                            <label class="form-label fs-7 fw-bold text-dark mb-2 text-center d-block">6-Digit One-Time Password</label>
                            <div class="otp-inputs-wrapper" id="otpInputGroup">
                                <input type="text" class="otp-box" maxlength="1" data-index="0" autofocus pattern="[0-9]*" inputmode="numeric" required autocomplete="off">
                                <input type="text" class="otp-box" maxlength="1" data-index="1" pattern="[0-9]*" inputmode="numeric" required autocomplete="off">
                                <input type="text" class="otp-box" maxlength="1" data-index="2" pattern="[0-9]*" inputmode="numeric" required autocomplete="off">
                                <input type="text" class="otp-box" maxlength="1" data-index="3" pattern="[0-9]*" inputmode="numeric" required autocomplete="off">
                                <input type="text" class="otp-box" maxlength="1" data-index="4" pattern="[0-9]*" inputmode="numeric" required autocomplete="off">
                                <input type="text" class="otp-box" maxlength="1" data-index="5" pattern="[0-9]*" inputmode="numeric" required autocomplete="off">
                            </div>
                        </div>

                        <!-- Resend OTP Timer Controls -->
                        <div class="text-center mb-4">
                            <div id="resendOtpCountdownText" class="fs-8 text-muted">
                                Tidak menerima kode? Kirim ulang dalam <span class="fw-bold text-primary font-monospace" id="otpCountdownTimer">01:30</span>
                            </div>
                            <button type="button" class="btn btn-link text-primary text-decoration-none fs-8 fw-bold p-0 d-none" id="btnResendOtp">
                                <i class="fa-solid fa-rotate-right me-1"></i> Kirim Ulang Kode OTP Sekarang
                            </button>
                            <div id="resendToastMsg" class="fs-8 text-success mt-1" style="display: none;"></div>
                        </div>

                        <!-- Submit Verification Button -->
                        <button type="submit" class="btn btn-primary w-100 py-2.5 rounded-3 fw-bold fs-7 shadow-sm d-flex align-items-center justify-content-center gap-2" id="btnSubmitOtp">
                            <span>Verifikasi & Lanjutkan</span>
                            <i class="fa-solid fa-circle-check fs-8"></i>
                        </button>
                    </form>

                    <!-- Footer Help -->
                    <div class="text-center text-muted fs-8 mt-4 pt-3 border-top">
                        <span>Bukan email Anda? <a href="ForgotPassword.php" class="text-primary text-decoration-none fw-semibold">Ganti Email</a></span>
                    </div>

                </div>
            </div>

            <!-- =============================================================== -->
            <!-- KOLOM KANAN: SLIDESHOW SHOWCASE (Curtain Right)                -->
            <!-- =============================================================== -->
            <div class="auth-curtain-right" id="authColRight">
                
                <!-- Ambient Glow Orbs -->
                <div class="slide-glow-orb bg-primary" style="top: 10%; right: 10%;"></div>
                <div class="slide-glow-orb bg-success" style="bottom: 10%; left: 10%;"></div>

                <div class="auth-slideshow-container">

                    <!-- Top Bar Badges -->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-white bg-opacity-10 text-white border border-white border-opacity-10 px-2.5 py-1.5 rounded-pill fs-8">
                                <i class="fa-solid fa-fingerprint text-success me-1"></i> 2FA / MFA Guard
                            </span>
                            <span class="badge bg-primary bg-opacity-20 text-primary border border-primary border-opacity-20 px-2.5 py-1.5 rounded-pill fs-8">
                                <span class="dot dot-progress me-1"></span> Session Protected
                            </span>
                        </div>
                        <span class="text-white-50 fs-8 font-monospace">Crypto Key: #ED25519</span>
                    </div>

                    <!-- Security Showcase Card -->
                    <div class="my-auto">
                        <div class="auth-slide-card mb-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="badge bg-success text-white p-2 rounded-3">
                                        <i class="fa-solid fa-shield-halved fs-7"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-white fw-bold mb-0">Two-Factor Authentication</h6>
                                        <small class="text-white-50 fs-9">Time-based One-Time Password (TOTP)</small>
                                    </div>
                                </div>
                                <span class="badge bg-success-subtle text-success fs-8">Active Enforced</span>
                            </div>

                            <!-- Visual Step Flow Preview -->
                            <div class="p-3 rounded-3 bg-black bg-opacity-40 border border-white border-opacity-10 mb-3 font-monospace">
                                <div class="d-flex align-items-center justify-content-between py-1.5 border-bottom border-white border-opacity-10 text-white fs-8">
                                    <span class="text-white-50">CHALLENGE:</span>
                                    <span class="text-info fw-bold">6-Digit Hash Token</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between py-1.5 border-bottom border-white border-opacity-10 text-white fs-8">
                                    <span class="text-white-50">EXPIRATION:</span>
                                    <span class="text-warning fw-bold">10 Minutes Window</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between pt-1.5 text-white fs-8">
                                    <span class="text-white-50">PROTECTION:</span>
                                    <span class="text-success fw-bold"><i class="fa-solid fa-lock me-1"></i> Anti-Brute-Force Enabled</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between text-white fs-8">
                                <span><i class="fa-solid fa-circle-check text-success me-1"></i> Real-time Device Binding</span>
                                <span><i class="fa-solid fa-shield-virus text-info me-1"></i> Zero Leakage</span>
                            </div>
                        </div>

                        <h4 class="text-white fw-extrabold mb-2">Keamanan Sesi Dua Arah</h4>
                        <p class="text-white-50 fs-7 mb-0">
                            Setiap sesi kerja SDN Syncboard dilindungi oleh protokol verifikasi multi-faktor untuk mencegah akses tidak sah pada portofolio dan telemetri domain server.
                        </p>
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
    <!-- Authentication Controller & Split Curtain Script -->
    <script src="<?= $basePath ?>assets/js/auth.js"></script>
</body>

</html>
