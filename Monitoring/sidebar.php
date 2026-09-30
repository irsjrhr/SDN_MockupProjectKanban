<?php
/**
 * Monitoring Module Sidebar Bridge
 * Forwards to centralized layouts/sidebar.php
 */

$basePath = isset($basePath) ? $basePath : '../';
$currentModule = 'monitoring';
$currentPage = isset($currentPage) ? $currentPage : 'dashboard';

include __DIR__ . '/../layouts/sidebar.php';
