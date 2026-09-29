<?php
/**
 * Master Module Sidebar Configuration
 * Defines Master array data and delegates to root sidebar.php
 */

$basePath = isset($basePath) ? $basePath : '../';
$currentModule = 'master';
$currentPage = isset($currentPage) ? $currentPage : 'dashboard';

$sidebarMenu = [
    'header' => [
        'title' => 'Master Admin',
        'subtitle' => 'System Control'
    ],
    'sections' => [
        [
            'section_title' => 'Master Data',
            'add_button' => false,
            'items' => [
                [
                    'title' => 'Dashboard',
                    'url' => $basePath . 'Master/dashboard.php',
                    'icon' => 'fa-solid fa-chart-pie',
                    'active' => ($currentPage === 'master-dashboard' || $currentPage === 'dashboard')
                ],
                [
                    'title' => 'Role Management',
                    'url' => $basePath . 'Master/role.php',
                    'icon' => 'fa-solid fa-user-shield',
                    'active' => ($currentPage === 'master-role' || $currentPage === 'role')
                ],
                [
                    'title' => 'Permission',
                    'url' => $basePath . 'Master/permission.php',
                    'icon' => 'fa-solid fa-key',
                    'active' => ($currentPage === 'master-permission' || $currentPage === 'permission')
                ],
                [
                    'title' => 'Users List',
                    'url' => $basePath . 'Master/users.php',
                    'icon' => 'fa-solid fa-users-gear',
                    'active' => ($currentPage === 'master-users' || $currentPage === 'users')
                ],
            ]
        ]
    ]
];

include __DIR__ . '/../sidebar.php';
