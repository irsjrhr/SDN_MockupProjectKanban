<?php
/**
 * ==============================================================================
 * UNIFIED HTML FOOTER & CLOSING LAYOUT COMPONENT
 * Location: /layouts/footer.php
 * ==============================================================================
 * Centralized closing HTML tags, application container closing,
 * core script dependencies, and custom scripts.
 * 
 * Configurable Variables (pass before include):
 *   - $basePath        : relative path to root (e.g. '../', '../../', './')
 *   - $includeTracker  : bool, whether to include doc-tracker.js (default: true)
 *   - $extraJs         : array of script paths or custom html script tags
 */

$basePath = isset($basePath) ? $basePath : '../';
$includeTracker = isset($includeTracker) ? (bool)$includeTracker : true;
?>
        </main>
        <!-- /.main-content -->
    </div>
    <!-- /.app-container -->

    <!-- Core Libraries: jQuery & Bootstrap 5 Bundle JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Application Core Script -->
    <script src="<?= $basePath ?>assets/js/app.js"></script>
    <!-- Splash Screen Curtain Animation Controller -->
    <script src="<?= $basePath ?>assets/js/splash_screen.js"></script>

    <?php if ($includeTracker): ?>
    <!-- Centralized Documentation Tracker & Versioning Script -->
    <script src="<?= $basePath ?>assets/js/doc-tracker.js"></script>
    <?php endif; ?>

    <?php if (!empty($extraJs)): ?>
        <?php if (is_array($extraJs)): ?>
            <?php foreach ($extraJs as $jsUrl): ?>
                <script src="<?= $jsUrl ?>"></script>
            <?php endforeach; ?>
        <?php else: ?>
            <?= $extraJs ?>
        <?php endif; ?>
    <?php endif; ?>
</body>

</html>
