/**
 * ==============================================================================
 * UNIFIED SPLASH SCREEN & CURTAIN SLIDE CONTROLLER (JQUERY)
 * Location: /splash_screen.js
 * ==============================================================================
 * Mengontrol animasi pembuka splash screen (split-curtain doors),
 * progress loading indicator, durasi minimum tampilan, serta transisi antar halaman.
 */

// ==============================================================================
// KONFIGURASI TIMING & VARIABEL UTAMA (SEMUA KAPITAL DI AWAL SCRIPT)
// ==============================================================================
const SPLASH_DURATION = 800;         // Durasi minimal (ms) splash screen tampil agar loader terlihat elegan
const SPLASH_MAX_TIMEOUT = 2000;     // Batas waktu maksimal (ms) fallback penutupan jika aset eksternal lambat
const SPLASH_FADEOUT_DELAY = 850;    // Durasi (ms) menunggu animasi CSS tirai terbuka penuh sebelum di-hide
const SPLASH_TRANSITION_DELAY = 280; // Durasi (ms) animasi tirai menutup saat navigasi link internal
const SPLASH_SELECTOR = '#appSplashScreen, .splash_screen'; // Selector DOM elemen splash screen

(function ($) {
    'use strict';

    /**
     * Objek Controller Splash Screen menggunakan jQuery
     */
    const SplashScreen = {
        // Status apakah splash screen sudah ditutup
        isDismissed: false,

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

            // Set state awal: tampilkan tirai dan reset status dismissal
            $splash.css('display', 'flex').removeClass('loaded');
            this.isDismissed = false;

            // Catat waktu mulai render untuk kalkulasi minimum durasi
            const startTime = Date.now();

            // Fungsi eksekusi pembukaan tirai splash screen dengan proteksi durasi minimal
            const executeDismissal = function () {
                const elapsed = Date.now() - startTime;
                const remainingDelay = Math.max(0, SPLASH_DURATION - elapsed);

                // Jalankan animasi buka tirai setelah sisa durasi terpenuhi
                setTimeout(function () {
                    self.dismiss();
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

                // Fallback otomatis: jika ada aset eksternal yang macet, paksa buka setelah batas SPLASH_MAX_TIMEOUT
                setTimeout(function () {
                    if (!self.isDismissed) {
                        self.dismiss();
                    }
                }, SPLASH_MAX_TIMEOUT);
            }

            // Aktifkan event listener untuk transisi halus saat klik link menu
            this.bindLinkTransitions();
        },

        /**
         * Membuka tirai (split-doors) dan menyembunyikan splash screen
         */
        dismiss: function () {
            // Hindari eksekusi ganda jika sudah ditutup
            if (this.isDismissed) {
                return;
            }
            this.isDismissed = true;

            const $splash = $(SPLASH_SELECTOR);
            if (!$splash.length) {
                return;
            }

            // Menambahkan class 'loaded' untuk memicu animasi CSS slide tirai kiri dan kanan
            $splash.addClass('loaded');

            // Setelah animasi geser tirai selesai (SPLASH_FADEOUT_DELAY), ubah display menjadi none
            setTimeout(function () {
                $splash.css('display', 'none');
            }, SPLASH_FADEOUT_DELAY);
        },

        /**
         * Menampilkan kembali splash screen secara manual (berguna saat reload / aksi ajax tertentu)
         */
        show: function () {
            const $splash = $(SPLASH_SELECTOR);
            if ($splash.length) {
                this.isDismissed = false;
                $splash.removeClass('loaded').css('display', 'flex');
            }
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

                // Abaikan link kosong, javascript void, mailto, tab baru, modal trigger, atau accordion toggle
                if (!href || href === '#' || href.startsWith('javascript:') || href.startsWith('mailto:') || 
                    target === '_blank' || $link.data('bs-toggle') || $link.data('bs-target') || $link.hasClass('dropdown-toggle')) {
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
                    $splash.css('display', 'flex').removeClass('loaded');

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
