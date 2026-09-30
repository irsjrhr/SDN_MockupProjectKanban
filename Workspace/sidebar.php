<?php
/**
 * Workspace Module Sidebar Bridge
 * Forwards to centralized layouts/sidebar.php
 */

$basePath = isset($basePath) ? $basePath : '../';
$currentModule = 'workspace';
$currentPage = isset($currentPage) ? $currentPage : 'kanban';

include __DIR__ . '/../layouts/sidebar.php';
