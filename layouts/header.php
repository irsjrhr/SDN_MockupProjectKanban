<?php
/**
 * ==============================================================================
 * UNIFIED HTML HEADER & OPENING LAYOUT COMPONENT
 * Location: /layouts/header.php
 * ==============================================================================
 * Centralized opening HTML structure, HEAD tags, asset stylesheets,
 * app container, sidebar navigation, and top navbar.
 * 
 * Configurable Variables (pass before include):
 *   - $pageTitle       : string, title of the page
 *   - $currentModule   : 'workspace' | 'master' | 'monitoring' | 'setting'
 *   - $currentPage     : active menu key (e.g. 'kanban-task', 'dashboard', 'brd', etc.)
 *   - $basePath        : relative path to project root (e.g. '../', '../../', './')
 *   - $breadcrumbs     : array of ['title' => '...', 'url' => '...']
 *   - $extraCss        : array of custom css urls or custom html snippet
 *   - $hideSidebar     : bool, default false
 *   - $hideNavbar      : bool, default false
 */

// Fallback configuration variables
$basePath = isset($basePath) ? $basePath : '../';
$currentModule = isset($currentModule) ? $currentModule : 'workspace';
$currentPage = isset($currentPage) ? $currentPage : 'dashboard';
$pageTitle = isset($pageTitle) ? $pageTitle : 'Syncboard - Enterprise Project Management';
$hideSidebar = isset($hideSidebar) ? (bool)$hideSidebar : false;
$hideNavbar = isset($hideNavbar) ? (bool)$hideNavbar : false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- FontAwesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Unified Stylesheet -->
    <link rel="stylesheet" href="<?= $basePath ?>assets/css/styles.css">

    <?php if (!empty($extraCss)): ?>
        <?php if (is_array($extraCss)): ?>
            <?php foreach ($extraCss as $cssUrl): ?>
                <link rel="stylesheet" href="<?= $cssUrl ?>">
            <?php endforeach; ?>
        <?php else: ?>
            <?= $extraCss ?>
        <?php endif; ?>
    <?php endif; ?>
</head>

<body class="bg-main">


    <!-- Splash Screen Curtain Loader -->
    <div class="splash_screen" id="appSplashScreen">
        <div class="container_content">
            <div class="content_screen left"></div>
            <div class="content_screen right"></div>
            <div class="splash_center_box">
                <div class="splash_icon_badge mb-3">
                    <img src="<?= $basePath ?>assets/img/sdn.png" alt="SDN Logo" class="w-100 h-100 object-fit-contain" onerror="this.onerror=null; this.src='https://cdn-icons-png.flaticon.com/512/906/906338.png';">
                </div>
                <h4 class="fw-extrabold text-white mb-1 tracking-tight">Syncboard</h4>
                <p class="text-white-50 fs-8 mb-3">Enterprise Project Management</p>
                <div class="splash_loading_bar">
                    <div class="splash_loading_progress"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-container d-flex">
        <?php if (!$hideSidebar): ?>
            <!-- Unified Sidebar Component -->
            <?php include __DIR__ . '/sidebar.php'; ?>
        <?php endif; ?>

        <!-- Main Content Area -->
        <main class="main-content flex-grow-1 d-flex flex-column min-vh-100">
            <?php if (!$hideNavbar): ?>
                <!-- Unified Top Navbar Component -->
                <?php include __DIR__ . '/navbar.php'; ?>
            <?php endif; ?>
