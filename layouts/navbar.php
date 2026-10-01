<?php
/**
 * ==============================================================================
 * UNIFIED TOP NAVBAR NAVIGATION COMPONENT
 * Location: /layouts/navbar.php
 * ==============================================================================
 * Centralized top header navigation component.
 * Accepts:
 *   - $basePath        : relative path to root (e.g. '../', '../../', './')
 *   - $breadcrumbs     : array of ['title' => '...', 'url' => '...'] or auto-generated
 *   - $currentModule   : 'workspace' | 'master' | 'monitoring' | 'setting'
 *   - $pageTitle       : current page title string
 */

$basePath = isset($basePath) ? $basePath : '../';
$currentModule = isset($currentModule) ? ucfirst($currentModule) : 'Workspace';

// Generate default breadcrumb if not provided
if (!isset($breadcrumbs) || !is_array($breadcrumbs)) {
    $breadcrumbs = [
        ['title' => $currentModule, 'url' => '#']
    ];
    if (!empty($pageTitle)) {
        $breadcrumbs[] = ['title' => $pageTitle, 'url' => ''];
    }
}
?>

<header class="top-navbar bg-white border-bottom px-4 d-flex align-items-center justify-content-between">
    <div class="navbar-left d-flex align-items-center gap-3">
        <button class="btn btn-light d-md-none" id="sidebarToggleBtn" aria-label="Toggle Sidebar">
            <i class="fa-solid fa-bars"></i>
        </button>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 fs-7">
                <?php foreach ($breadcrumbs as $index => $bc): ?>
                    <?php if ($index === count($breadcrumbs) - 1 || empty($bc['url'])): ?>
                        <li class="breadcrumb-item active fw-semibold text-dark" aria-current="page"><?= htmlspecialchars($bc['title']) ?></li>
                    <?php else: ?>
                        <li class="breadcrumb-item"><a href="<?= htmlspecialchars($bc['url']) ?>" class="text-muted text-decoration-none"><?= htmlspecialchars($bc['title']) ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ol>
        </nav>
    </div>

    <div class="navbar-right d-flex align-items-center gap-3">
        <button class="btn btn-light btn-nav-icon rounded-circle position-relative" title="Notifications">
            <i class="fa-regular fa-bell"></i>
            <span class="notification-dot position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger p-1"></span>
        </button>
        <button class="btn btn-light btn-nav-icon rounded-circle" title="Messages">
            <i class="fa-regular fa-comment-dots"></i>
        </button>

        <div class="dropdown">
            <div class="user-profile-menu d-flex align-items-center gap-2 p-1 rounded-pill cursor-pointer" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../assets/img/user.jpg" alt="Irshandy Juniar Hardadi" class="avatar-md rounded-circle">
                <div class="user-meta d-flex flex-column d-none d-sm-flex">
                    <span class="user-name fw-bold fs-7 lh-1">Irshandy Juniar Hardadi</span>
                    <span class="user-email text-muted fs-8">irshandy.hardadi@sdn.id</span>
                </div>
                <i class="fa-solid fa-chevron-down text-muted fs-8 ms-1"></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 fs-7 py-1">
                <li><a class="dropdown-item py-2" href="#"><i class="fa-regular fa-user me-2 text-primary"></i> Profile</a></li>
                <li><a class="dropdown-item py-2" href="<?= $basePath ?>Setting/general.php"><i class="fa-solid fa-gear me-2 text-secondary"></i> Master Settings</a></li>
                <li><hr class="dropdown-divider my-1"></li>
                <li><a class="dropdown-item py-2 text-danger" href="<?= $basePath ?>Authentication/Login.php"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</header>
