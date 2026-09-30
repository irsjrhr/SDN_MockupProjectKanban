<?php
$currentPage = 'setting-account-security';
$currentModule = 'setting';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Security - Settings - Syncboard</title>

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
                            <li class="breadcrumb-item text-muted"><a href="general.php" class="text-muted text-decoration-none">Settings</a></li>
                            <li class="breadcrumb-item text-muted"><a href="account.php" class="text-muted text-decoration-none">Personal Account</a></li>
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Account Security</li>
                        </ol>
                    </nav>
                </div>
                <div class="navbar-right d-flex align-items-center gap-2">
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1.5 fs-8 fw-semibold rounded-pill">
                        <i class="fa-solid fa-shield-halved me-1"></i> Security Level: High (94%)
                    </span>
                </div>
            </header>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-danger">
                        <i class="fa-solid fa-user-shield fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Account Security & Authentication</h1>
                        <span class="text-muted fs-7">Manage your password, two-factor verification, passkeys, and active login sessions</span>
                    </div>
                </div>

                <div class="project-actions-area d-flex align-items-center gap-2">
                    <a href="account.php" class="btn btn-outline-secondary fs-7 rounded-3 px-3">
                        <i class="fa-regular fa-id-badge me-1"></i> View Account Info
                    </a>
                </div>
            </section>

            <!-- Content Area -->
            <div class="view-wrapper flex-grow-1 p-4">
                <div class="row g-4">
                    <!-- Left Column: Password & 2FA & Passkeys -->
                    <div class="col-12 col-xl-8">

                        <!-- 1. Password Management Card -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                                <div>
                                    <h2 class="h6 fw-bold mb-1 text-dark">Password Akun</h2>
                                    <p class="text-muted fs-7 mb-0">Ubah kata sandi secara berkala untuk menjaga akun Anda tetap terlindungi.</p>
                                </div>
                                <span class="badge bg-light text-muted border fs-8">Terakhir diubah: 12 Juli 2026</span>
                            </div>

                            <form id="passwordSecurityForm">
                                <div class="mb-3">
                                    <label class="form-label fs-7 fw-bold">Password Saat Ini <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control fs-7 rounded-start-3" id="currPasswordInput" placeholder="Masukkan password lama Anda" required>
                                        <button class="btn btn-outline-secondary btn-toggle-pw rounded-end-3" type="button" data-target="#currPasswordInput"><i class="fa-regular fa-eye"></i></button>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fs-7 fw-bold">Password Baru <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="password" class="form-control fs-7 rounded-start-3" id="newPasswordInput" placeholder="Minimal 8 karakter" required>
                                            <button class="btn btn-outline-secondary btn-toggle-pw rounded-end-3" type="button" data-target="#newPasswordInput"><i class="fa-regular fa-eye"></i></button>
                                        </div>
                                        <!-- Strength Indicator -->
                                        <div class="mt-2">
                                            <div class="progress" style="height: 4px;">
                                                <div class="progress-bar bg-success" id="pwStrengthBar" style="width: 85%;"></div>
                                            </div>
                                            <span class="fs-9 text-success fw-semibold mt-1 d-block" id="pwStrengthText">Kekuatan Kata Sandi: Kuat</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label class="form-label fs-7 fw-bold">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="password" class="form-control fs-7 rounded-start-3" id="confirmPasswordInput" placeholder="Ulangi password baru" required>
                                            <button class="btn btn-outline-secondary btn-toggle-pw rounded-end-3" type="button" data-target="#confirmPasswordInput"><i class="fa-regular fa-eye"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Password Policy Checklist -->
                                <div class="p-3 bg-light rounded-3 mb-4 fs-8">
                                    <span class="fw-bold text-dark d-block mb-1.5">Ketentuan Kata Sandi yang Baik:</span>
                                    <div class="row g-1 text-muted">
                                        <div class="col-12 col-sm-6"><i class="fa-solid fa-circle-check text-success me-1"></i> Minimal 8 karakter</div>
                                        <div class="col-12 col-sm-6"><i class="fa-solid fa-circle-check text-success me-1"></i> Mengandung huruf besar & kecil</div>
                                        <div class="col-12 col-sm-6"><i class="fa-solid fa-circle-check text-success me-1"></i> Mengandung setidaknya 1 angka</div>
                                        <div class="col-12 col-sm-6"><i class="fa-solid fa-circle-check text-success me-1"></i> Mengandung simbol unik (!@#$%)</div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-2">
                                    <button type="reset" class="btn btn-outline-secondary fs-7 rounded-3 px-3">Batal</button>
                                    <button type="submit" class="btn btn-primary fs-7 rounded-3 px-4 shadow-sm" id="btnSubmitNewPassword">
                                        <i class="fa-solid fa-key me-1"></i> Simpan Password Baru
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- 2. Two-Factor Authentication (2FA) Card -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <h2 class="h6 fw-bold mb-1 text-dark">Autentikasi Dua Faktor (2FA)</h2>
                                    <p class="text-muted fs-7 mb-0">Tambahkan lapisan keamanan ekstra saat login menggunakan kode verifikasi 6 digit.</p>
                                </div>
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 fs-8 fw-semibold rounded-pill">
                                    <i class="fa-solid fa-check me-1"></i> Aktif (Enabled)
                                </span>
                            </div>

                            <div class="list-group list-group-flush border rounded-3 overflow-hidden mb-3">
                                <!-- TOTP Authenticator App -->
                                <div class="list-group-item d-flex align-items-center justify-content-between p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-3 bg-primary-subtle text-primary p-2.5 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                            <i class="fa-solid fa-mobile-screen-button fs-4"></i>
                                        </div>
                                        <div>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="fw-bold text-dark fs-7">Aplikasi Autentikator (TOTP)</span>
                                                <span class="badge bg-primary fs-9 rounded-pill">Metode Utama</span>
                                            </div>
                                            <span class="text-muted fs-8">Google Authenticator, Microsoft Authenticator, atau 1Password.</span>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-secondary btn-sm fs-8 rounded-3" data-bs-toggle="modal" data-bs-target="#modal2FAQr">
                                        <i class="fa-solid fa-qrcode me-1"></i> Konfigurasi Ulang
                                    </button>
                                </div>

                                <!-- Backup Recovery Codes -->
                                <div class="list-group-item d-flex align-items-center justify-content-between p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-3 bg-light text-secondary p-2.5 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                            <i class="fa-solid fa-shield-halved fs-4"></i>
                                        </div>
                                        <div>
                                            <span class="fw-bold text-dark fs-7">Kode Pemulihan Cadangan (Recovery Codes)</span>
                                            <span class="text-muted fs-8 d-block">8 dari 10 kode cadangan masih tersedia untuk darurat.</span>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-secondary btn-sm fs-8 rounded-3" data-bs-toggle="modal" data-bs-target="#modalRecoveryCodes">
                                        <i class="fa-solid fa-eye me-1"></i> Lihat Kode
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Passkeys & Biometric Hardware Keys -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <h2 class="h6 fw-bold mb-1 text-dark">Passkeys & Kunci Biometrik</h2>
                                    <p class="text-muted fs-7 mb-0">Login instan tanpa password menggunakan Windows Hello, Touch ID, atau kunci fisik YubiKey.</p>
                                </div>
                                <button class="btn btn-outline-primary btn-sm rounded-3 fs-8 fw-semibold" id="btnAddPasskey">
                                    <i class="fa-solid fa-plus me-1"></i> Tambah Passkey
                                </button>
                            </div>

                            <div class="list-group list-group-flush border rounded-3 overflow-hidden">
                                <div class="list-group-item d-flex align-items-center justify-content-between p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-3 bg-info-subtle text-info p-2.5 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="fa-solid fa-fingerprint fs-4"></i>
                                        </div>
                                        <div>
                                            <span class="fw-bold text-dark fs-7">Windows Hello / Touch ID Key</span>
                                            <span class="text-muted fs-8 d-block">Ditambahkan pada 14 Agu 2026 &bull; Terakhir digunakan kemarin</span>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-light border text-danger fs-8 rounded-2 btn-remove-passkey">
                                        <i class="fa-solid fa-trash-can"></i> Hapus
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- 4. Active Sessions & Device Management -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                                <div>
                                    <h2 class="h6 fw-bold mb-1 text-dark">Sesi Login Aktif</h2>
                                    <p class="text-muted fs-7 mb-0">Kelola daftar perangkat yang saat ini memiliki akses ke akun Anda.</p>
                                </div>
                                <button class="btn btn-outline-danger btn-sm fs-8 rounded-3" id="btnRevokeAllOtherSessions">
                                    <i class="fa-solid fa-arrow-right-from-bracket me-1"></i> Logout Semua Sesi Lain
                                </button>
                            </div>

                            <div class="list-group list-group-flush border rounded-3 overflow-hidden">
                                <div class="list-group-item d-flex align-items-center justify-content-between p-3 bg-light-subtle">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-3 bg-primary text-white p-2.5 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                            <i class="fa-solid fa-laptop fs-5"></i>
                                        </div>
                                        <div>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="fw-bold text-dark fs-7">Windows 11 PC &bull; Google Chrome 128</span>
                                                <span class="badge bg-success fs-9 rounded-pill">Sesi Ini</span>
                                            </div>
                                            <span class="text-muted fs-8">Jakarta, Indonesia &bull; IP: 182.253.14.88 &bull; Aktif sekarang</span>
                                        </div>
                                    </div>
                                    <span class="text-success fw-bold fs-8"><i class="fa-solid fa-circle me-1 fs-9"></i> Online</span>
                                </div>

                                <div class="list-group-item d-flex align-items-center justify-content-between p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-3 bg-secondary-subtle text-secondary p-2.5 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                            <i class="fa-solid fa-mobile-screen fs-5"></i>
                                        </div>
                                        <div>
                                            <span class="fw-bold text-dark fs-7">iPhone 15 Pro &bull; Safari Mobile 17.4</span>
                                            <span class="text-muted fs-8 d-block">Jakarta, Indonesia &bull; IP: 114.122.90.12 &bull; 3 jam yang lalu</span>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-light border text-danger fs-8 btn-revoke-session" title="Revoke Session">
                                        <i class="fa-solid fa-xmark"></i> Revoke
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column: Security Score, Activity Log & Danger Zone -->
                    <div class="col-12 col-xl-4">

                        <!-- Security Health Score -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="rounded-circle bg-success-subtle text-success p-3 d-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                                    <i class="fa-solid fa-shield-heart fs-4"></i>
                                </div>
                                <div>
                                    <span class="fs-8 text-uppercase fw-bold text-muted d-block">Security Health</span>
                                    <h3 class="h6 fw-extrabold mb-0 text-dark">Sangat Aman (94/100)</h3>
                                </div>
                            </div>

                            <div class="progress mb-3" style="height: 8px;">
                                <div class="progress-bar bg-success" style="width: 94%;"></div>
                            </div>

                            <ul class="list-group list-group-flush fs-8 mb-3">
                                <li class="list-group-item px-0 py-1.5 d-flex align-items-center justify-content-between border-0">
                                    <span><i class="fa-solid fa-circle-check text-success me-1.5"></i> 2FA Authenticator Aktif</span>
                                    <span class="text-success fw-bold">+40 Pts</span>
                                </li>
                                <li class="list-group-item px-0 py-1.5 d-flex align-items-center justify-content-between border-0">
                                    <span><i class="fa-solid fa-circle-check text-success me-1.5"></i> Password Kompleks</span>
                                    <span class="text-success fw-bold">+30 Pts</span>
                                </li>
                                <li class="list-group-item px-0 py-1.5 d-flex align-items-center justify-content-between border-0">
                                    <span><i class="fa-solid fa-circle-check text-success me-1.5"></i> Passkey Biometrik Terhubung</span>
                                    <span class="text-success fw-bold">+24 Pts</span>
                                </li>
                            </ul>

                            <button class="btn btn-outline-primary btn-sm w-100 rounded-3 fs-8 fw-semibold" onclick="showSecurityToast('Seluruh perlindungan keamanan akun dalam kondisi optimal.')">
                                <i class="fa-solid fa-magnifying-glass me-1"></i> Jalankan Security Audit
                            </button>
                        </div>

                        <!-- Recent Security Activity Log -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4">
                            <h3 class="h6 fw-bold mb-3 text-dark"><i class="fa-solid fa-clock-rotate-left text-primary me-2"></i>Log Aktivitas Keamanan</h3>

                            <div class="d-flex flex-column gap-3 fs-8">
                                <div class="d-flex gap-2.5 pb-2.5 border-bottom">
                                    <i class="fa-solid fa-right-to-bracket text-success fs-7 mt-0.5"></i>
                                    <div>
                                        <span class="fw-bold text-dark d-block">Login Berhasil (Chrome / Windows)</span>
                                        <span class="text-muted">Hari ini, 09:15 WIB &bull; IP: 182.253.14.88</span>
                                    </div>
                                </div>
                                <div class="d-flex gap-2.5 pb-2.5 border-bottom">
                                    <i class="fa-solid fa-fingerprint text-info fs-7 mt-0.5"></i>
                                    <div>
                                        <span class="fw-bold text-dark d-block">Passkey Digunakan</span>
                                        <span class="text-muted">Kemarin, 14:20 WIB &bull; Touch ID</span>
                                    </div>
                                </div>
                                <div class="d-flex gap-2.5">
                                    <i class="fa-solid fa-shield-check text-primary fs-7 mt-0.5"></i>
                                    <div>
                                        <span class="fw-bold text-dark d-block">2FA TOTP Verified</span>
                                        <span class="text-muted">28 Sep 2026, 11:00 WIB</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Danger Zone Card -->
                        <div class="card shadow-sm border border-danger-subtle rounded-4 bg-white p-4">
                            <h3 class="h6 fw-bold mb-2 text-danger"><i class="fa-solid fa-triangle-exclamation me-2"></i>Zona Bahaya Akun</h3>
                            <p class="text-muted fs-8 mb-3">Tindakan ini memiliki dampak permanen terhadap akses dan data Anda di seluruh Workspace.</p>

                            <div class="d-flex flex-column gap-2">
                                <button class="btn btn-outline-secondary btn-sm fs-8 rounded-3 text-start" onclick="showSecurityToast('Mengunduh arsip seluruh data akun (.ZIP)...')">
                                    <i class="fa-solid fa-download me-1.5"></i> Unduh Cadangan Data Akun
                                </button>
                                <button class="btn btn-outline-danger btn-sm fs-8 rounded-3 text-start" data-bs-toggle="modal" data-bs-target="#modalDeactivateAccount">
                                    <i class="fa-solid fa-ban me-1.5"></i> Nonaktifkan / Hapus Akun
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal: 2FA QR Code Setup -->
    <div class="modal fade" id="modal2FAQr" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 p-3">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold fs-6">Konfigurasi 2FA Authenticator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center py-3">
                    <p class="fs-8 text-muted mb-3">Pindai QR code di bawah ini menggunakan aplikasi Authenticator (Google Authenticator / 1Password).</p>
                    <div class="p-3 bg-light rounded-3 d-inline-block mb-3 border">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data=otpauth://totp/Syncboard:irshandy?secret=JBSWY3DPEHPK3PXP&issuer=Syncboard" alt="2FA QR" class="img-fluid rounded-2" style="width: 160px; height: 160px;">
                    </div>
                    <div class="mb-3">
                        <span class="fs-8 text-muted d-block mb-1">Kunci Rahasia Manual:</span>
                        <code class="bg-light p-1.5 rounded-2 fs-7 fw-bold text-primary">JBSWY 3DPEP HPK3 PXPX</code>
                    </div>
                    <div class="text-start">
                        <label class="form-label fs-8 fw-bold text-dark">Masukkan 6-digit kode verifikasi:</label>
                        <input type="text" class="form-control text-center fs-6 fw-bold tracking-wider rounded-3" placeholder="000 000" maxlength="6">
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light fs-7 px-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary fs-7 px-4 fw-semibold" data-bs-dismiss="modal" onclick="showSecurityToast('2FA Authenticator berhasil diverifikasi!')">Verifikasi & Aktifkan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Recovery Codes -->
    <div class="modal fade" id="modalRecoveryCodes" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 p-3">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold fs-6"><i class="fa-solid fa-key text-primary me-2"></i>Kode Pemulihan Cadangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-3">
                    <p class="fs-8 text-muted mb-3">Simpan kode-kode pemulihan ini di tempat yang aman. Setiap kode hanya dapat digunakan satu kali jika Anda kehilangan akses ke perangkat 2FA Anda.</p>
                    <div class="p-3 bg-light rounded-3 font-monospace fs-7 row g-2 mb-3 border">
                        <div class="col-6"><code>8492-4821</code></div>
                        <div class="col-6"><code>9124-7832</code></div>
                        <div class="col-6"><code>3910-1823</code></div>
                        <div class="col-6"><code>5521-9921</code></div>
                        <div class="col-6"><code>1048-2819</code></div>
                        <div class="col-6"><code>7721-3419</code></div>
                        <div class="col-6"><del class="text-muted">4821-0021</del> <span class="badge bg-secondary fs-9">Used</span></div>
                        <div class="col-6"><del class="text-muted">9931-4812</del> <span class="badge bg-secondary fs-9">Used</span></div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary fs-7" onclick="showSecurityToast('Kode pemulihan disalin ke clipboard!')"><i class="fa-regular fa-copy me-1"></i> Salin Semua</button>
                    <button type="button" class="btn btn-primary fs-7 px-4" data-bs-dismiss="modal">Selesai</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Deactivate Account Confirmation -->
    <div class="modal fade" id="modalDeactivateAccount" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 p-3">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold fs-6 text-danger"><i class="fa-solid fa-triangle-exclamation me-2"></i>Konfirmasi Penonaktifan Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-3 fs-7">
                    <p class="text-secondary mb-2">Apakah Anda yakin ingin menonaktifkan akun Anda? Semua akses Anda ke project, tugas, dan workspace akan dibekukan sementara.</p>
                    <div class="mb-3">
                        <label class="form-label fs-8 fw-bold">Ketik <code>CONFIRM</code> untuk melanjutkan:</label>
                        <input type="text" class="form-control fs-7 rounded-3" id="inputConfirmDeactivate" placeholder="CONFIRM">
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light fs-7 px-3" data-bs-dismiss="modal">Batalkan</button>
                    <button type="button" class="btn btn-danger fs-7 px-4 fw-semibold" data-bs-dismiss="modal" onclick="showSecurityToast('Permintaan penonaktifan akun telah diproses.')">Nonaktifkan Akun</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification Container -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1090;">
        <div id="securityLiveToast" class="toast align-items-center text-bg-dark border-0 rounded-3 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body d-flex align-items-center gap-2 fs-7">
                    <i class="fa-solid fa-shield-check text-success fs-6"></i>
                    <span id="securityToastMsg">Pengaturan keamanan akun berhasil diperbarui!</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Application Script -->
    <script src="../assets/js/app.js"></script>

    <!-- Account Security Scripts -->
    <script>
    $(document).ready(function () {
        window.showSecurityToast = function (msg) {
            $('#securityToastMsg').text(msg);
            const toastEl = document.getElementById('securityLiveToast');
            if (toastEl) {
                const toast = bootstrap.Toast.getOrCreateInstance(toastEl);
                toast.show();
            }
        };

        // 1. Password Visibility Toggle
        $('.btn-toggle-pw').on('click', function () {
            const targetId = $(this).data('target');
            const $input = $(targetId);
            const isPassword = $input.attr('type') === 'password';
            $input.attr('type', isPassword ? 'text' : 'password');
            $(this).find('i').toggleClass('fa-eye fa-eye-slash');
        });

        // 2. Submit Password Form
        $('#passwordSecurityForm').on('submit', function (e) {
            e.preventDefault();
            const curr = $('#currPasswordInput').val();
            const newPw = $('#newPasswordInput').val();
            const confPw = $('#confirmPasswordInput').val();

            if (!curr) {
                showSecurityToast('Silakan masukkan password saat ini.');
                return;
            }
            if (newPw.length < 8) {
                showSecurityToast('Password baru minimal harus 8 karakter.');
                return;
            }
            if (newPw !== confPw) {
                showSecurityToast('Konfirmasi password baru tidak cocok.');
                return;
            }

            $('#passwordSecurityForm')[0].reset();
            showSecurityToast('Password akun berhasil diperbarui dengan aman!');
        });

        // 3. Add Passkey
        $('#btnAddPasskey').on('click', function () {
            showSecurityToast('Menghubungkan sensor biometrik WebAuthn / Passkey...');
            setTimeout(() => {
                showSecurityToast('Passkey biometrik baru berhasil didaftarkan!');
            }, 1200);
        });

        $('.btn-remove-passkey').on('click', function () {
            $(this).closest('.list-group-item').fadeOut(300, function () {
                $(this).remove();
                showSecurityToast('Passkey berhasil dihapus.');
            });
        });

        // 4. Revoke Sessions
        $('.btn-revoke-session').on('click', function () {
            $(this).closest('.list-group-item').fadeOut(300, function () {
                $(this).remove();
                showSecurityToast('Sesi perangkat berhasil di-revoke.');
            });
        });

        $('#btnRevokeAllOtherSessions').on('click', function () {
            $('.list-group-item:not(.bg-light-subtle)').fadeOut(300, function () {
                $(this).remove();
            });
            showSecurityToast('Semua sesi perangkat lain telah berhasil dilogout.');
        });
    });
    </script>
</body>

</html>
