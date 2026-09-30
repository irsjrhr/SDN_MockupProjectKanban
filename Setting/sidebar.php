<?php
/**
 * Setting Module Sidebar Bridge
 * Forwards to centralized layouts/sidebar.php
 */

$basePath = isset($basePath) ? $basePath : '../';
$currentModule = 'setting';
$currentPage = isset($currentPage) ? $currentPage : 'general';

include __DIR__ . '/../layouts/sidebar.php';
