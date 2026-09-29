<?php
/**
 * Monitoring Module Sidebar Configuration
 * Defines Monitoring array data and delegates to root sidebar.php
 */

$basePath = isset($basePath) ? $basePath : '../';
$currentModule = 'monitoring';
$currentPage = isset($currentPage) ? $currentPage : 'dashboard';

$sidebarMenu = [
    'header' => [
        'title' => 'Project Monitoring',
        'subtitle' => 'Live Telemetry & Production'
    ],
    'sections' => [
        [
            'section_title' => 'Live Infrastructure',
            'add_button' => false,
            'items' => [
                [
                    'title' => 'Monitoring Overview',
                    'url' => $basePath . 'Monitoring/dashboard.php',
                    'icon' => 'fa-solid fa-gauge-high',
                    'active' => ($currentPage === 'monitoring-dashboard' || $currentPage === 'dashboard')
                ],
                [
                    'title' => 'Server & Specs',
                    'url' => $basePath . 'Monitoring/servers.php',
                    'icon' => 'fa-solid fa-server',
                    'active' => ($currentPage === 'monitoring-servers' || $currentPage === 'servers')
                ],
                [
                    'title' => 'Traffic & Network',
                    'url' => $basePath . 'Monitoring/traffic.php',
                    'icon' => 'fa-solid fa-chart-line',
                    'active' => ($currentPage === 'monitoring-traffic' || $currentPage === 'traffic')
                ],
            ]
        ],
        [
            'section_title' => 'Database & Domains',
            'add_button' => false,
            'items' => [
                [
                    'title' => 'Production Tables',
                    'url' => $basePath . 'Monitoring/database.php',
                    'icon' => 'fa-solid fa-database',
                    'active' => ($currentPage === 'monitoring-database' || $currentPage === 'database')
                ],
                [
                    'title' => 'Domains & SSL',
                    'url' => $basePath . 'Monitoring/domains.php',
                    'icon' => 'fa-solid fa-globe',
                    'active' => ($currentPage === 'monitoring-domains' || $currentPage === 'domains')
                ],
            ]
        ]
    ]
];

include __DIR__ . '/../sidebar.php';
