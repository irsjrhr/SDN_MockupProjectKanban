<?php
/**
 * Master Module Sidebar Bridge
 * Forwards to centralized layouts/sidebar.php
 */

$basePath = isset($basePath) ? $basePath : '../';
$currentModule = 'master';
$currentPage = isset($currentPage) ? $currentPage : 'dashboard';

include __DIR__ . '/../layouts/sidebar.php';
