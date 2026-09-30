<?php
/**
 * Setting Module Sidebar Configuration
 * Defines Settings array data and delegates to root sidebar.php
 */

$basePath = isset($basePath) ? $basePath : '../';
$currentModule = 'setting';
$currentPage = isset($currentPage) ? $currentPage : 'general';

$sidebarMenu = [
    'header' => [
        'title' => 'Master Settings',
        'subtitle' => 'Global Workspace Configuration'
    ],
    'sections' => [
        [
            'section_title' => 'Personal Account',
            'add_button' => false,
            'items' => [
                [
                    'title' => 'Account Information',
                    'url' => $basePath . 'Setting/account.php',
                    'icon' => 'fa-regular fa-id-badge',
                    'active' => ($currentPage === 'setting-account' || $currentPage === 'account')
                ],
                [
                    'title' => 'Account Security',
                    'url' => $basePath . 'Setting/account-security.php',
                    'icon' => 'fa-solid fa-user-shield',
                    'active' => ($currentPage === 'setting-account-security' || $currentPage === 'account-security')
                ],
            ]
        ],
        [
            'section_title' => 'General Settings',
            'add_button' => false,
            'items' => [
                [
                    'title' => 'Workspace & Branding',
                    'url' => $basePath . 'Setting/general.php',
                    'icon' => 'fa-solid fa-sliders',
                    'active' => ($currentPage === 'setting-general' || $currentPage === 'general')
                ],
                [
                    'title' => 'Kanban & Workflows',
                    'url' => $basePath . 'Setting/kanban.php',
                    'icon' => 'fa-solid fa-table-columns',
                    'active' => ($currentPage === 'setting-kanban' || $currentPage === 'kanban')
                ],
            ]
        ],
        [
            'section_title' => 'Communication & Alerts',
            'add_button' => false,
            'items' => [
                [
                    'title' => 'Notifications & Webhooks',
                    'url' => $basePath . 'Setting/notifications.php',
                    'icon' => 'fa-solid fa-bell',
                    'active' => ($currentPage === 'setting-notifications' || $currentPage === 'notifications')
                ],
                [
                    'title' => 'Integrations & API',
                    'url' => $basePath . 'Setting/integrations.php',
                    'icon' => 'fa-solid fa-plug',
                    'active' => ($currentPage === 'setting-integrations' || $currentPage === 'integrations')
                ],
            ]
        ],
        [
            'section_title' => 'Security & Governance',
            'add_button' => false,
            'items' => [
                [
                    'title' => 'Security & Authentication',
                    'url' => $basePath . 'Setting/security.php',
                    'icon' => 'fa-solid fa-shield-halved',
                    'active' => ($currentPage === 'setting-security' || $currentPage === 'security')
                ],
            ]
        ]
    ]
];

include __DIR__ . '/../sidebar.php';
