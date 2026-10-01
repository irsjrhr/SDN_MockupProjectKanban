<?php
/**
 * ==============================================================================
 * SYNCBOARD - FORGOT PASSWORD & RECOVERY PAGE
 * Location: /Authentication/ForgotPassword.php
 * ==============================================================================
 * 2-Column Split Layout for Password Recovery:
 * - Left Column: Clean, enterprise recovery form with email / username input.
 * - Right Column: Cinematic security & zero-trust protection showcase.
 * - Submit Action: Split curtain animation dispatching OTP code to OTP.php.
 */

$APPNAME = "SDN - Project Management";
$pageTitle = $APPNAME . " | Lupa Password";
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= $basePath ?>assets/img/sdn.png">
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
                <i class="fa-solid fa-paper-plane text-primary fs-2"></i>
            </div>
            <h3 class="fw-extrabold text-white text-uppercase tracking-wider mb-2" id="portalStatusTitle">
                DISPATCHING OTP CODE...
            </h3>
            <p class="text-white-50 fs-7 mb-3" id="portalStatusSub">
                Generating 6-digit security token and sending to your mailbox...
            </p>
            <div class="spinner-border text-primary" role="status" style="width: 2rem; height: 2rem;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <!-- 2-Column Split Card Container -->
        <div class="auth-split-card" id="authSplitCard">

            <!-- =============================================================== -->
            <!-- KOLOM KIRI: FORM LUPA PASSWORD (Curtain Left)                  -->
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
                            <i class="fa-solid fa-key text-primary fs-5"></i>
                        </div>
                        <h1 class="h3 fw-extrabold text-dark mb-1">Lupa Password?</h1>
                        <p class="text-muted fs-7 mb-0">
                            Masukkan email terdaftar Anda. Kami akan mengirimkan 6 digit kode verifikasi OTP untuk mereset kata sandi.
                        </p>
                    </div>

                    <!-- Alert Feedback Box -->
                    <div id="forgotAlert" class="alert alert-danger fs-7 py-2 px-3 rounded-3 d-none mb-3"></div>

                    <!-- Main Forgot Password Form -->
                    <form id="forgotPasswordForm" novalidate>
                        <input type="hidden" id="forgotRedirectTarget" value="OTP.php">

                        <!-- Email / Username Input -->
                        <div class="mb-3">
                            <label for="inputResetEmail" class="form-label fs-7 fw-bold text-dark mb-1">Email / Username Terdaftar</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-muted border-end-0"><i class="fa-solid fa-envelope fs-7"></i></span>
                                <input type="email" class="form-control border-start-0 ps-0 fs-7" id="inputResetEmail" placeholder="nama@perusahaan.com" value="sophia.carter@syncboard.internal" required autocomplete="email">
                            </div>
                        </div>

                        <!-- Security Notice Card -->
                        <div class="p-3 bg-light rounded-3 border mb-4 d-flex align-items-start gap-2.5">
                            <i class="fa-solid fa-circle-info text-primary mt-0.5 fs-7"></i>
                            <div class="fs-8 text-secondary lh-sm">
                                Kode verifikasi OTP berlaku selama <strong>10 menit</strong>. Pastikan memeriksa folder Inbox atau Spam email Anda.
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 py-2.5 rounded-3 fw-bold fs-7 shadow-sm d-flex align-items-center justify-content-center gap-2" id="btnSubmitForgot">
                            <span>Kirim Kode OTP</span>
                            <i class="fa-solid fa-paper-plane fs-8"></i>
                        </button>
                    </form>

                    <!-- Footer Navigation -->
                    <div class="text-center text-muted fs-8 mt-4 pt-3 border-top">
                        <span>Ingat kata sandi Anda? <a href="Login.php" class="text-primary text-decoration-none fw-semibold">Masuk di sini</a></span>
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
                                <i class="fa-solid fa-shield-halved text-info me-1"></i> Zero-Trust Security
                            </span>
                            <span class="badge bg-success bg-opacity-20 text-success border border-success border-opacity-20 px-2.5 py-1.5 rounded-pill fs-8">
                                <span class="dot dot-complete me-1"></span> Automated 2FA Guard
                            </span>
                        </div>
                        <span class="text-white-50 fs-8 font-monospace">Auth Node #02 &bull; TLS 1.3</span>
                    </div>

                    <!-- Security Showcase Card -->
                    <div class="my-auto">
                        <div class="auth-slide-card mb-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="badge bg-primary text-white p-2 rounded-3">
                                        <i class="fa-solid fa-lock fs-7"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-white fw-bold mb-0">Multi-Factor Account Recovery</h6>
                                        <small class="text-white-50 fs-9">End-to-End Cryptographic Token</small>
                                    </div>
                                </div>
                                <span class="badge bg-success-subtle text-success fs-8">256-bit AES</span>
                            </div>

                            <!-- Visual Step Flow Preview -->
                            <div class="p-3 rounded-3 bg-black bg-opacity-40 border border-white border-opacity-10 mb-3">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="badge bg-primary rounded-circle" style="width: 24px; height: 24px; display: flex; align-items: center; justify-content: center;">1</div>
                                        <span class="text-white fs-8 fw-semibold">Input Email Terdaftar</span>
                                    </div>
                                    <span class="badge bg-primary-subtle text-primary fs-9">Tahap 1</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="badge bg-secondary rounded-circle" style="width: 24px; height: 24px; display: flex; align-items: center; justify-content: center;">2</div>
                                        <span class="text-white-50 fs-8">Verifikasi 6-Digit OTP</span>
                                    </div>
                                    <span class="badge bg-dark text-white-50 fs-9">Tahap 2</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="badge bg-secondary rounded-circle" style="width: 24px; height: 24px; display: flex; align-items: center; justify-content: center;">3</div>
                                        <span class="text-white-50 fs-8">Set Kata Sandi Baru</span>
                                    </div>
                                    <span class="badge bg-dark text-white-50 fs-9">Tahap 3</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between text-white fs-8">
                                <span><i class="fa-solid fa-circle-check text-success me-1"></i> Email Domain Verified</span>
                                <span><i class="fa-solid fa-bolt text-warning me-1"></i> Instant Delivery (0.4s)</span>
                            </div>
                        </div>

                        <h4 class="text-white fw-extrabold mb-2">Perlindungan Identitas Akun</h4>
                        <p class="text-white-50 fs-7 mb-0">
                            Seluruh permintaan pemulihan kata sandi divalidasi menggunakan token enkripsi sekali pakai (OTP) untuk memastikan integritas dan keamanan data proyek Anda.
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
