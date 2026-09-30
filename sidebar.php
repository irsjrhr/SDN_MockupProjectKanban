<?php
/**
 * Root Sidebar Bridge
 * Forwards to centralized layouts/sidebar.php
 */

$basePath = isset($basePath) ? $basePath : './';
$currentModule = isset($currentModule) ? $currentModule : 'workspace';
$currentPage = isset($currentPage) ? $currentPage : '';

include __DIR__ . '/layouts/sidebar.php';
