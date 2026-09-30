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
            </div>
        </div>
    </div>