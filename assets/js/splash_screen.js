/**
 * ==============================================================================
 * UNIFIED SPLASH SCREEN & CURTAIN SLIDE CONTROLLER (JQUERY)
 * Location: /assets/js/splash_screen.js
 * ==============================================================================
 * Mengontrol animasi pembuka splash screen (split-curtain doors),
 * progress loading indicator, durasi minimum tampilan, transisi antar halaman,
 * serta Error Handling / Stuck Bypass Protection (termasuk Browser Back Navigation).
 */

// ==============================================================================
// KONFIGURASI TIMING & VARIABEL UTAMA (SEMUA KAPITAL DI AWAL SCRIPT)
// ==============================================================================
const SPLASH_DURATION = 250;          // Durasi minimal (ms) splash screen tampil agar loader terlihat elegan
const SPLASH_STUCK_TIMEOUT = 900;     // Durasi (ms) sebelum tombol darurat "Lewati Loading" dimunculkan jika loading lambat
const SPLASH_HARD_MAX_TIMEOUT = 2200; // Batas waktu maksimal mutlak (ms) paksa buka jika aset eksternal/CDN macet
const SPLASH_FADEOUT_DELAY = 650;     // Durasi (ms) menunggu animasi CSS tirai terbuka penuh sebelum di-hide
const SPLASH_TRANSITION_DELAY = 220;  // Durasi (ms) animasi tirai menutup saat navigasi link internal
const SPLASH_SELECTOR = '#appSplashScreen, .splash_screen'; // Selector DOM elemen splash screen

(function ($) {
    'use strict';

    /**
     * Objek Controller Splash Screen menggunakan jQuery
     */
    const SplashScreen = {
        // Status apakah splash screen sudah ditutup
        isDismissed: false,

        // Timer references
        stuckTimer: null,
        hardMaxTimer: null,
        safetyResetTimer: null,

        /**
         * Inisialisasi awal saat halaman mulai dimuat
         */
        init: function () {
            const self = this;
            const $splash = $(SPLASH_SELECTOR);

            // Cek apakah elemen splash screen ada di DOM
            if (!$splash.length) {
                return;
            }

            // Cek apakah navigasi adalah back/forward (Bfcache)
            try {
                const navEntries = performance.getEntriesByType && performance.getEntriesByType('navigation');
                const navType = navEntries && navEntries.length ? navEntries[0].type : '';
                const legacyType = performance.navigation ? performance.navigation.type : 0;
                if (navType === 'back_forward' || legacyType === 2) {
                    this.dismiss(true);
                    return;
                }
            } catch (e) {}

            // Set state awal: tampilkan tirai dan reset status dismissal
            $splash.css('display', 'flex').removeClass('loaded');
            $('#splashStuckHandler').hide();
            this.isDismissed = false;

            // Catat waktu mulai render untuk kalkulasi minimum durasi
            const startTime = Date.now();

            // Jadwalkan kemunculan tombol darurat & auto-fallback
            this.scheduleStuckProtection();

            // Fungsi eksekusi pembukaan tirai splash screen dengan proteksi durasi minimal
            const executeDismissal = function () {
                const elapsed = Date.now() - startTime;
                const remainingDelay = Math.max(0, SPLASH_DURATION - elapsed);

                // Jalankan animasi buka tirai setelah sisa durasi terpenuhi
                setTimeout(function () {
                    self.dismiss(false);
                }, remainingDelay);
            };

            // Jika status dokumen sudah selesai dimuat (complete/cache)
            if (document.readyState === 'complete') {
                executeDismissal();
            } else {
                // Tunggu seluruh resource (gambar, font, css) selesai di-load oleh window
                $(window).one('load', function () {
                    executeDismissal();
                });
            }

            // Aktifkan proteksi spesifik untuk Back/Forward Navigation & transisi halaman
            this.bindNavigationGuards();
            this.bindLinkTransitions();
            this.bindErrorHandling();
        },

        /**
         * Menjadwalkan tombol "Lewati Loading" dan hard safety timeout
         */
        scheduleStuckProtection: function () {
            const self = this;

            // Bersihkan timer lama jika ada
            clearTimeout(this.stuckTimer);
            clearTimeout(this.hardMaxTimer);

            // 1. Timer untuk memunculkan tombol darurat jika loading > SPLASH_STUCK_TIMEOUT
            this.stuckTimer = setTimeout(function () {
                if (!self.isDismissed) {
                    $('#splashStuckHandler').fadeIn(200);
                }
            }, SPLASH_STUCK_TIMEOUT);

            // 2. Hard timeout: paksa buka layar otomatis jika > SPLASH_HARD_MAX_TIMEOUT
            this.hardMaxTimer = setTimeout(function () {
                if (!self.isDismissed) {
                    self.dismiss(true);
                }
            }, SPLASH_HARD_MAX_TIMEOUT);
        },

        /**
         * Membuka tirai (split-doors) dan menyembunyikan splash screen
         * @param {boolean} force - Jika true, langsung buka seketika tanpa delay tirai (berguna saat stuck / browser back)
         */
        dismiss: function (force) {
            // Hindari eksekusi ganda jika sudah ditutup
            if (this.isDismissed) {
                return;
            }
            this.isDismissed = true;

            // Bersihkan timer proteksi
            clearTimeout(this.stuckTimer);
            clearTimeout(this.hardMaxTimer);
            clearTimeout(this.safetyResetTimer);

            const $splash = $(SPLASH_SELECTOR);
            if (!$splash.length) {
                return;
            }

            // Sembunyikan tombol stuck handler
            $('#splashStuckHandler').hide();

            // Jika force dismiss (tombol lewati / back button browser / fatal error)
            if (force) {
                $splash.addClass('loaded').css({
                    'opacity': '0',
                    'visibility': 'hidden',
                    'display': 'none',
                    'pointer-events': 'none'
                });
                return;
            }

            // Normal smooth dismissal: Menambahkan class 'loaded' untuk memicu animasi CSS slide tirai
            $splash.addClass('loaded');

            // Setelah animasi geser tirai selesai (SPLASH_FADEOUT_DELAY), ubah display menjadi none
            setTimeout(function () {
                $splash.css({
                    'display': 'none',
                    'pointer-events': 'none'
                });
            }, SPLASH_FADEOUT_DELAY);
        },

        /**
         * Menampilkan kembali splash screen secara manual (berguna saat reload / aksi ajax tertentu)
         */
        show: function () {
            const $splash = $(SPLASH_SELECTOR);
            if ($splash.length) {
                this.isDismissed = false;
                $('#splashStuckHandler').hide();
                $splash.removeClass('loaded').css({
                    'display': 'flex',
                    'opacity': '',
                    'visibility': '',
                    'pointer-events': 'all'
                });
                this.scheduleStuckProtection();
            }
        },

        /**
         * Proteksi spesifik untuk Browser Back/Forward Cache (Bfcache) & History Navigation
         * Memastikan splash screen tidak macet saat user klik tombol "Back" di browser.
         */
        bindNavigationGuards: function () {
            const self = this;

            // 1. Pageshow Event (Mendeteksi saat halaman dimuat dari Browser Back-Forward Cache)
            window.addEventListener('pageshow', function (event) {
                const navEntry = (window.performance && window.performance.getEntriesByType) 
                    ? window.performance.getEntriesByType('navigation')[0] 
                    : null;
                const isBackForward = event.persisted || (navEntry && navEntry.type === 'back_forward');

                if (isBackForward) {
                    self.dismiss(true);
                } else if (!self.isDismissed) {
                    self.scheduleStuckProtection();
                }
            });

            // 2. Popstate & Hashchange (User klik tombol Back/Forward pada browser navigation)
            window.addEventListener('popstate', function () {
                self.dismiss(true);
            });
            window.addEventListener('hashchange', function () {
                self.dismiss(true);
            });

            // 3. Pagehide: saat halaman disimpan ke snapshot cache browser, pastikan splash screen tertutup
            window.addEventListener('pagehide', function () {
                self.dismiss(true);
            });

            // 4. Tombol Escape keyboard untuk bypass manual cepat
            $(document).on('keydown', function (e) {
                if (e.key === 'Escape' && !self.isDismissed) {
                    self.dismiss(true);
                }
            });

            // 5. Klik di area splash screen ketika stuck button sudah muncul
            $(document).on('click', SPLASH_SELECTOR, function (e) {
                if (!self.isDismissed && $('#splashStuckHandler').is(':visible')) {
                    self.dismiss(true);
                }
            });
        },

        /**
         * Error handling guard: jika ada error JS eksternal fatal yang menghentikan eksekusi,
         * jangan biarkan splash screen menutupi layar user selamanya.
         */
        bindErrorHandling: function () {
            const self = this;

            window.addEventListener('error', function () {
                setTimeout(function () {
                    if (!self.isDismissed) {
                        self.dismiss(true);
                    }
                }, 600);
            });

            window.addEventListener('unhandledrejection', function () {
                setTimeout(function () {
                    if (!self.isDismissed) {
                        self.dismiss(true);
                    }
                }, 600);
            });
        },

        /**
         * Menangani transisi halus antar-halaman saat user mengklik menu navigasi sidebar / navbar
         */
        bindLinkTransitions: function () {
            const self = this;

            // Delegasi event click pada seluruh link di dalam sidebar, sidebar-rail, dan top-navbar
            $(document).on('click', '.sidebar a[href], .sidebar-rail a[href], .top-navbar a[href]', function (e) {
                const $link = $(this);
                const href = $link.attr('href');
                const target = $link.attr('target');

                // Abaikan link kosong, javascript void, mailto, tab baru, modal trigger, accordion toggle, atau subview tab
                if (!href || href === '#' || href.startsWith('javascript:') || href.startsWith('mailto:') || 
                    target === '_blank' || $link.data('bs-toggle') || $link.data('bs-target') || 
                    $link.data('view') || $link.data('subview') || $link.hasClass('dropdown-toggle')) {
                    return;
                }

                // Cek jika link merujuk ke URL halaman yang sama persis
                const currentFullUrl = window.location.href.split('#')[0];
                const targetFullUrl = this.href ? this.href.split('#')[0] : '';
                if (currentFullUrl === targetFullUrl) {
                    return;
                }

                // Jika user menekan Ctrl / Command / Shift (buka tab baru), biarkan default browser bekerja
                if (e.ctrlKey || e.metaKey || e.shiftKey) {
                    return;
                }

                // Tampilkan animasi tirai menutup sesaat sebelum berpindah URL
                const $splash = $(SPLASH_SELECTOR);
                if ($splash.length) {
                    e.preventDefault();
                    self.isDismissed = false;
                    $('#splashStuckHandler').hide();
                    $splash.removeClass('loaded').css({
                        'display': 'flex',
                        'opacity': '1',
                        'visibility': 'visible',
                        'pointer-events': 'all'
                    });
                    self.scheduleStuckProtection();

                    // Safety watchdog: Jika dalam 800ms halaman belum berpindah (e.g. browser cancel atau file download), reset splash
                    clearTimeout(self.safetyResetTimer);
                    self.safetyResetTimer = setTimeout(function () {
                        if (!self.isDismissed) {
                            self.dismiss(true);
                        }
                    }, 800);

                    // Redirect ke URL tujuan setelah transisi tirai menutup (SPLASH_TRANSITION_DELAY)
                    setTimeout(function () {
                        window.location.href = href;
                    }, SPLASH_TRANSITION_DELAY);
                }
            });
        }
    };

    // Jalankan inisialisasi otomatis ketika DOM ready
    $(document).ready(function () {
        SplashScreen.init();
    });

    // Ekspos objek controller ke window global agar dapat dipanggil dari skrip lain
    window.SplashScreen = SplashScreen;

})(typeof jQuery !== 'undefined' ? jQuery : window.$);
