    <!-- Splash Screen Curtain Loader -->
    <div class="splash_screen" id="appSplashScreen">
        <div class="container_content">
            <div class="content_screen left"></div>
            <div class="content_screen right"></div>
            <div class="splash_center_box">
                <div class="splash_icon_badge mb-3">
                    <img src="<?= $basePath ?>assets/img/sdn.png" alt="SDN Logo" class="w-100 h-100 object-fit-contain" onerror="this.onerror=null; this.src='https://cdn-icons-png.flaticon.com/512/906/906338.png';">
                </div>
                <h4 class="fw-extrabold text-white text-center mb-1 tracking-tight"> 
                    <?= 
                    strtoupper($APPNAME);
                    ?>
                </h4>
                <p class="text-white-50 fs-8 mb-3"> Manage project with your team </p>
                <div class="splash_loading_bar">
                    <div class="splash_loading_progress"></div>
                </div>

                <!-- Emergency Stuck Bypass Trigger -->
                <div class="splash_stuck_handler mt-3 text-center" id="splashStuckHandler" style="display: none;">
                    <button type="button" class="btn btn-sm btn-outline-light rounded-pill px-3.5 py-1.5 fs-8 fw-semibold shadow d-inline-flex align-items-center gap-2" id="btnDismissSplashForce" onclick="if(window.SplashScreen) window.SplashScreen.dismiss(true); else { document.getElementById('appSplashScreen').classList.add('loaded'); document.getElementById('appSplashScreen').style.display='none'; }">
                        <i class="fa-solid fa-bolt-lightning text-warning"></i>
                        <span>Lewati Loading (Buka Halaman)</span>
                    </button>
                    <span class="d-block text-white-50 fs-9 mt-1.5 opacity-75">Halaman belum terbuka? Klik tombol di atas untuk langsung masuk.</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Instant Native Anti-Stuck & Back/Forward Navigation Guard Script -->
    <script>
    (function () {
        function forceDismissSplash() {
            var el = document.getElementById('appSplashScreen');
            if (el) {
                el.classList.add('loaded');
                el.style.opacity = '0';
                el.style.visibility = 'hidden';
                el.style.display = 'none';
                el.style.pointerEvents = 'none';
            }
            if (window.SplashScreen) {
                window.SplashScreen.isDismissed = true;
            }
        }

        // 1. Cek instan saat script dieksekusi apakah navigasi adalah back_forward (Bfcache / History Back)
        try {
            var navEntries = performance.getEntriesByType && performance.getEntriesByType('navigation');
            var navType = navEntries && navEntries.length ? navEntries[0].type : '';
            var legacyType = performance.navigation ? performance.navigation.type : 0;
            if (navType === 'back_forward' || legacyType === 2) {
                forceDismissSplash();
            }
        } catch (e) {}

        // 2. Event pageshow: jika halaman di-restore dari Back-Forward Cache browser
        window.addEventListener('pageshow', function (event) {
            if (event.persisted) {
                forceDismissSplash();
            }
        });

        // 3. Event popstate: saat tombol Back/Forward browser ditekan
        window.addEventListener('popstate', function () {
            forceDismissSplash();
        });

        // 4. Event pagehide: pastikan state splash screen tidak tersimpan dalam keadaan aktif di cache
        window.addEventListener('pagehide', function () {
            forceDismissSplash();
        });
    })();
    </script>