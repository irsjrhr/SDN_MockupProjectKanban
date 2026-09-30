<?php
/**
 * ==============================================================================
 * UNIFIED SCRIPTS & FOOTER COMPONENT
 * Location: /layouts/footer.php
 * ==============================================================================
 * Centralized footer scripts layout component.
 * Accepts:
 *   - $basePath        : relative path to root (e.g. '../', '../../', './')
 *   - $includeTracker  : bool, whether to include doc-tracker.js (default: true)
 */

$basePath = isset($basePath) ? $basePath : '../';
$includeTracker = isset($includeTracker) ? $includeTracker : true;
?>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Bootstrap 5 Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Application Core Script -->
<script src="<?= $basePath ?>assets/js/app.js"></script>
<?php if ($includeTracker): ?>
<!-- Centralized Documentation Tracker & Versioning Script -->
<script src="<?= $basePath ?>assets/js/doc-tracker.js"></script>
<?php endif; ?>
