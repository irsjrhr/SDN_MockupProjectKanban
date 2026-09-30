<?php
$currentPage = 'setting-account';
$currentModule = 'setting';
$basePath = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information - Settings - Syncboard</title>

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
                            <li class="breadcrumb-item text-muted"><a href="general.php" class="text-muted text-decoration-none">Settings</a></li>
                            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Account Information</li>
                        </ol>
                    </nav>
                </div>
                <div class="navbar-right d-flex align-items-center gap-2">
                    <button class="btn btn-outline-secondary fs-7 rounded-3 px-3" id="btnDiscardProfile">Discard</button>
                    <button class="btn btn-primary fs-7 rounded-3 px-3 shadow-sm" id="btnSaveProfile"><i class="fa-solid fa-check me-1"></i> Save Changes</button>
                </div>
            </header>

            <!-- Page Header -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary">
                        <i class="fa-regular fa-id-badge fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Account Information</h1>
                        <span class="text-muted fs-7">Manage your personal profile, credentials, security, and account preferences</span>
                    </div>
                </div>

                <div class="project-actions-area d-flex align-items-center gap-2">
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 fs-7 fw-semibold rounded-pill">
                        <i class="fa-solid fa-shield-check me-1"></i> Verified Account
                    </span>
                </div>
            </section>

            <!-- Content Area -->
            <div class="view-wrapper flex-grow-1 p-4">
                <div class="row g-4">
                    <!-- Left Column: Primary Profile & Credentials Form -->
                    <div class="col-12 col-xl-8">

                        <!-- 1. Profile Details & Avatar Card -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4">
                            <h2 class="h6 fw-bold mb-1 text-dark">Profile Details</h2>
                            <p class="text-muted fs-7 mb-4">Informasi profil publik Anda yang terlihat oleh anggota tim di seluruh Workspace.</p>

                            <!-- Avatar Upload Section -->
                            <div class="d-flex flex-wrap align-items-center gap-4 mb-4 pb-4 border-bottom">
                                <div class="position-relative">
                                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=150&q=80" alt="Irshandy Juniar Hardadi" class="rounded-circle border border-3 border-white shadow-sm" style="width: 88px; height: 88px; object-fit: cover;" id="userAvatarPreview">
                                    <label for="avatarFileInput" class="btn btn-primary btn-sm position-absolute bottom-0 end-0 rounded-circle border shadow-sm p-1.5" style="cursor: pointer;" title="Change Photo">
                                        <i class="fa-solid fa-camera fs-8 text-white"></i>
                                    </label>
                                    <input type="file" id="avatarFileInput" class="d-none" accept="image/*">
                                </div>
                                <div class="flex-grow-1">
                                    <h3 class="h6 fw-bold mb-1">Foto Profil Akun</h3>
                                    <p class="text-muted fs-8 mb-2">Format yang didukung: JPG, PNG, WEBP atau GIF. Maksimal ukuran 3MB.</p>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-outline-primary btn-sm rounded-3 fs-8" onclick="$('#avatarFileInput').click()">
                                            <i class="fa-solid fa-cloud-arrow-up me-1"></i> Upload Foto Baru
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm rounded-3 fs-8" id="btnRemoveAvatar">
                                            <i class="fa-regular fa-trash-can me-1"></i> Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Basic Fields Form -->
                            <form id="accountProfileForm">
                                <div class="row g-3 mb-3">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fs-7 fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control fs-7 rounded-3" id="inputFullName" value="Irshandy Juniar Hardadi" required>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fs-7 fw-bold">Username / Display Handle <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light fs-7">@</span>
                                            <input type="text" class="form-control fs-7 rounded-end-3" id="inputUsername" value="irshandy" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fs-7 fw-bold">Alamat Email <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light fs-7"><i class="fa-regular fa-envelope text-muted"></i></span>
                                            <input type="email" class="form-control fs-7" id="inputEmail" value="jeno.sonn@gmail.com" required>
                                            <span class="input-group-text bg-success-subtle text-success fs-8 fw-semibold border-start-0 rounded-end-3">Verified</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fs-7 fw-bold">Nomor Telepon / WhatsApp</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light fs-7"><i class="fa-solid fa-phone text-muted"></i></span>
                                            <input type="text" class="form-control fs-7 rounded-end-3" id="inputPhone" value="+62 812-3456-7890">
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fs-7 fw-bold">Job Title / Role</label>
                                        <input type="text" class="form-control fs-7 rounded-3" id="inputJobTitle" value="Lead Fullstack Engineer & Tech Lead">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fs-7 fw-bold">Departemen / Divisi</label>
                                        <select class="form-select fs-7 rounded-3" id="selectDepartment">
                                            <option value="Engineering" selected>Engineering & Product Development</option>
                                            <option value="UIUX">UI/UX Design Systems</option>
                                            <option value="Product">Product Management</option>
                                            <option value="DevOps">DevOps & Cloud Infrastructure</option>
                                            <option value="Marketing">Marketing & Growth</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fs-7 fw-bold">Biografi Singkat</label>
                                    <textarea class="form-control fs-7 rounded-3" rows="3" id="inputBio" placeholder="Ceritakan keahlian, peran, atau deskripsi singkat mengenai Anda...">Fullstack Developer & System Architect specialized in high-throughput enterprise systems, modern web microservices, and interactive UI/UX.</textarea>
                                    <span class="fs-8 text-muted">Maksimal 250 karakter. Ditampilkan pada kartu anggota tim dan dashboard.</span>
                                </div>
                            </form>
                        </div>

                        <!-- 2. Skills, Expertise & Project Contributions -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4">
                            <h2 class="h6 fw-bold mb-1 text-dark">Keahlian & Spesialisasi Teknis</h2>
                            <p class="text-muted fs-7 mb-3">Tag keahlian yang membantu rekan tim mengenali spesialisasi Anda di berbagai proyek.</p>

                            <div class="mb-3">
                                <label class="form-label fs-7 fw-bold">Keahlian Utama (Skills & Tags)</label>
                                <div class="d-flex flex-wrap gap-2 mb-2" id="skillTagsContainer">
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 fs-8 rounded-pill d-inline-flex align-items-center gap-1">
                                        System Architecture <i class="fa-solid fa-xmark cursor-pointer fs-9" onclick="$(this).parent().remove()"></i>
                                    </span>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 fs-8 rounded-pill d-inline-flex align-items-center gap-1">
                                        PHP & Laravel <i class="fa-solid fa-xmark cursor-pointer fs-9" onclick="$(this).parent().remove()"></i>
                                    </span>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 fs-8 rounded-pill d-inline-flex align-items-center gap-1">
                                        RESTful APIs <i class="fa-solid fa-xmark cursor-pointer fs-9" onclick="$(this).parent().remove()"></i>
                                    </span>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 fs-8 rounded-pill d-inline-flex align-items-center gap-1">
                                        UI/UX Design Systems <i class="fa-solid fa-xmark cursor-pointer fs-9" onclick="$(this).parent().remove()"></i>
                                    </span>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 fs-8 rounded-pill d-inline-flex align-items-center gap-1">
                                        JavaScript / jQuery <i class="fa-solid fa-xmark cursor-pointer fs-9" onclick="$(this).parent().remove()"></i>
                                    </span>
                                </div>
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control fs-7 rounded-start-3" id="inputNewSkill" placeholder="Ketik keahlian baru lalu tekan Enter / Tambah...">
                                    <button class="btn btn-outline-primary fs-8 rounded-end-3 px-3" type="button" id="btnAddSkill"><i class="fa-solid fa-plus me-1"></i> Tambah Tag</button>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Account Security Banner Card -->
                        <div class="card shadow-sm border rounded-4 p-4 bg-gradient text-white mb-4" style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-circle bg-danger bg-opacity-25 text-danger p-3 d-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                                        <i class="fa-solid fa-user-shield fs-4"></i>
                                    </div>
                                    <div>
                                        <h3 class="h6 fw-bold mb-1 text-white">Password & Keamanan Akun</h3>
                                        <span class="text-white-50 fs-8">Kelola kata sandi, Autentikasi 2FA, Passkeys biometrik, dan sesi login perangkat.</span>
                                    </div>
                                </div>
                                <a href="account-security.php" class="btn btn-primary btn-sm px-3 py-2 rounded-3 fw-semibold shadow-sm d-flex align-items-center gap-1.5">
                                    <span>Buka Account Security</span> <i class="fa-solid fa-arrow-right fs-8"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column: Account Status, Preferences & Linked Apps -->
                    <div class="col-12 col-xl-4">

                        <!-- Preferences & Localization -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4 mb-4">
                            <h3 class="h6 fw-bold mb-3 text-dark"><i class="fa-solid fa-sliders text-primary me-2"></i>Preferensi Akun</h3>

                            <div class="mb-3">
                                <label class="form-label fs-7 fw-bold">Bahasa Antarmuka (Language)</label>
                                <select class="form-select fs-7 rounded-3" id="selectLanguage">
                                    <option value="id" selected>Bahasa Indonesia (ID)</option>
                                    <option value="en">English (US)</option>
                                    <option value="ja">日本語 (Japanese)</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fs-7 fw-bold">Zona Waktu (Timezone)</label>
                                <select class="form-select fs-7 rounded-3" id="selectTimezone">
                                    <option value="wib" selected>(GMT+07:00) Asia/Jakarta (WIB)</option>
                                    <option value="wita">(GMT+08:00) Asia/Makassar (WITA)</option>
                                    <option value="wit">(GMT+09:00) Asia/Jayapura (WIT)</option>
                                    <option value="utc">(GMT+00:00) UTC Universal Time</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fs-7 fw-bold">Format Tanggal</label>
                                <select class="form-select fs-7 rounded-3" id="selectDateFormat">
                                    <option value="dd-mm-yyyy" selected>DD/MM/YYYY (Contoh: 30/09/2026)</option>
                                    <option value="yyyy-mm-dd">YYYY-MM-DD (Contoh: 2026-09-30)</option>
                                    <option value="mm-dd-yyyy">MM/DD/YYYY (Contoh: 09/30/2026)</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fs-7 fw-bold">Tema Tampilan (Theme)</label>
                                <div class="btn-group w-100 btn-group-sm" id="themeSelector">
                                    <button class="btn btn-outline-secondary active fs-8 py-1.5" data-theme="light"><i class="fa-solid fa-sun me-1"></i> Light</button>
                                    <button class="btn btn-outline-secondary fs-8 py-1.5" data-theme="dark"><i class="fa-solid fa-moon me-1"></i> Dark</button>
                                    <button class="btn btn-outline-secondary fs-8 py-1.5" data-theme="auto"><i class="fa-solid fa-circle-half-stroke me-1"></i> Auto</button>
                                </div>
                            </div>
                        </div>

                        <!-- Connected Social & Work Accounts -->
                        <div class="card shadow-sm border rounded-4 bg-white p-4">
                            <h3 class="h6 fw-bold mb-3 text-dark"><i class="fa-solid fa-link text-primary me-2"></i>Akun Terhubung (OAuth)</h3>

                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex align-items-center justify-content-between p-2.5 bg-light rounded-3">
                                    <div class="d-flex align-items-center gap-2.5">
                                        <i class="fa-brands fa-google fs-5 text-danger"></i>
                                        <div>
                                            <span class="fw-bold text-dark fs-7 d-block">Google Workspace</span>
                                            <span class="fs-8 text-muted">jeno.sonn@gmail.com</span>
                                        </div>
                                    </div>
                                    <span class="badge bg-success-subtle text-success fs-8">Connected</span>
                                </div>

                                <div class="d-flex align-items-center justify-content-between p-2.5 bg-light rounded-3">
                                    <div class="d-flex align-items-center gap-2.5">
                                        <i class="fa-brands fa-github fs-5 text-dark"></i>
                                        <div>
                                            <span class="fw-bold text-dark fs-7 d-block">GitHub Account</span>
                                            <span class="fs-8 text-muted">@irshandy-dev</span>
                                        </div>
                                    </div>
                                    <span class="badge bg-success-subtle text-success fs-8">Connected</span>
                                </div>

                                <div class="d-flex align-items-center justify-content-between p-2.5 bg-light rounded-3">
                                    <div class="d-flex align-items-center gap-2.5">
                                        <i class="fa-brands fa-microsoft fs-5 text-primary"></i>
                                        <div>
                                            <span class="fw-bold text-dark fs-7 d-block">Microsoft 365</span>
                                            <span class="fs-8 text-muted">Belum terhubung</span>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm fs-8 py-0.5 px-2 rounded-2" onclick="showAccountToast('Menghubungkan ke Microsoft Azure AD...')">Connect</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Toast Notification Container -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1090;">
        <div id="accountLiveToast" class="toast align-items-center text-bg-dark border-0 rounded-3 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body d-flex align-items-center gap-2 fs-7">
                    <i class="fa-solid fa-circle-check text-success fs-6"></i>
                    <span id="accountToastMsg">Perubahan informasi akun berhasil disimpan!</span>
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

    <!-- Account Information Page Scripts -->
    <script>
    $(document).ready(function () {
        window.showAccountToast = function (msg) {
            $('#accountToastMsg').text(msg);
            const toastEl = document.getElementById('accountLiveToast');
            if (toastEl) {
                const toast = bootstrap.Toast.getOrCreateInstance(toastEl);
                toast.show();
            }
        };

        // 1. Avatar Upload & Preview Handler
        $('#avatarFileInput').on('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    $('#userAvatarPreview').attr('src', event.target.result);
                    showAccountToast('Foto profil berhasil diperbarui!');
                };
                reader.readAsDataURL(file);
            }
        });

        $('#btnRemoveAvatar').on('click', function () {
            $('#userAvatarPreview').attr('src', 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=150&q=80');
            showAccountToast('Foto profil dikembalikan ke default.');
        });

        // 2. Add New Skill Tag
        function addSkillTag(skillName) {
            if (!skillName) return;
            const $tag = $(`
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 fs-8 rounded-pill d-inline-flex align-items-center gap-1">
                    ${skillName} <i class="fa-solid fa-xmark cursor-pointer fs-9" onclick="$(this).parent().remove()"></i>
                </span>
            `);
            $('#skillTagsContainer').append($tag);
            showAccountToast(`Tag keahlian "${skillName}" ditambahkan!`);
        }

        $('#btnAddSkill').on('click', function () {
            const skill = $('#inputNewSkill').val().trim();
            if (skill) {
                addSkillTag(skill);
                $('#inputNewSkill').val('');
            }
        });

        $('#inputNewSkill').on('keypress', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                const skill = $(this).val().trim();
                if (skill) {
                    addSkillTag(skill);
                    $(this).val('');
                }
            }
        });

        // 3. Save Profile Changes
        $('#btnSaveProfile').on('click', function () {
            const fullName = $('#inputFullName').val();
            const email = $('#inputEmail').val();

            if (!fullName || !email) {
                showAccountToast('Nama lengkap dan email tidak boleh kosong.');
                return;
            }

            showAccountToast('Informasi akun berhasil disimpan!');
        });

        $('#btnDiscardProfile').on('click', function () {
            $('#inputFullName').val('Irshandy Juniar Hardadi');
            $('#inputUsername').val('irshandy');
            $('#inputEmail').val('jeno.sonn@gmail.com');
            $('#inputPhone').val('+62 812-3456-7890');
            showAccountToast('Perubahan dibatalkan.');
        });

        // 4. Theme Selector Buttons
        $('#themeSelector .btn').on('click', function () {
            $('#themeSelector .btn').removeClass('active');
            $(this).addClass('active');
            const theme = $(this).data('theme');
            showAccountToast(`Tema tampilan disetel ke: ${theme.toUpperCase()}`);
        });
    });
    </script>
</body>

</html>
