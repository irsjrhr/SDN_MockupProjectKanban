<?php
/**
 * Workspace Module Sidebar Configuration
 * Defines Workspace array data and delegates to root sidebar.php
 */

$basePath = isset($basePath) ? $basePath : '../';
$currentModule = 'workspace';
$currentPage = isset($currentPage) ? $currentPage : 'kanban';

$sidebarMenu = [
    'header' => [
        'title' => 'Team Workspace',
        'subtitle' => 'Syncboard.Company'
    ],
    'sections' => [
        [
            'section_title' => 'Navigate Project',
            'add_button' => true,
            'items' => [
                [
                    'title' => 'Dashboard',
                    'url' => $basePath . 'Workspace/dashboard.php',
                    'icon' => 'fa-solid fa-chart-pie',
                    'active' => ($currentPage === 'dashboard')
                ],
                [
                    'title' => 'Kanban Project',
                    'url' => $basePath . 'Workspace/KanbanProject.php',
                    'icon' => 'fa-solid fa-layer-group',
                    'active' => in_array($currentPage, ['kanban-project', 'kanban-master'])
                ],
                [
                    'title' => 'Kanban Task',
                    'url' => '#',
                    'icon' => 'fa-solid fa-table-columns',
                    'has_submenu' => true,
                    'open' => in_array($currentPage, ['kanban', 'kanban-task', 'project-company', 'project-middleware', 'project-landing']),
                    'active' => in_array($currentPage, ['kanban', 'kanban-task', 'project-company', 'project-middleware', 'project-landing']),
                    'submenu' => [
                        [
                            'title' => 'Company Website',
                            'url' => $basePath . 'Workspace/KanbanTask.php?project=company',
                            'badge_class' => 'badge-company',
                            'badge_icon' => 'fa-solid fa-play fa-rotate-270',
                            'active' => ($currentPage === 'project-company')
                        ],
                        [
                            'title' => 'Middleware Project',
                            'url' => $basePath . 'Workspace/KanbanTask.php',
                            'badge_class' => 'badge-ecommerce',
                            'badge_icon' => 'fa-solid fa-bag-shopping',
                            'active' => ($currentPage === 'kanban' || $currentPage === 'project-middleware' || $currentPage === 'kanban-task')
                        ],
                        [
                            'title' => 'Landing Page Campaign',
                            'url' => $basePath . 'Workspace/KanbanTask.php?project=landing',
                            'badge_class' => 'badge-landing',
                            'badge_icon' => 'fa-solid fa-play fa-rotate-270',
                            'active' => ($currentPage === 'project-landing')
                        ],
                    ]
                ],
                [
                    'title' => 'Calendar & Timeline',
                    'url' => $basePath . 'Workspace/CalendarTimeline.php',
                    'icon' => 'fa-solid fa-calendar-days',
                    'active' => in_array($currentPage, ['calendar-timeline', 'timeline', 'calendar'])
                ],

                [
                    'title' => 'Documentation',
                    'url' => '#',
                    'icon' => 'fa-solid fa-book-bookmark',
                    'has_submenu' => true,
                    'open' => in_array($currentPage, ['brd', 'fsd', 'erd', 'prd', 'blueprints', 'documentation', 'tracking-version', 'version-tracking']),
                    'active' => in_array($currentPage, ['brd', 'fsd', 'erd', 'prd', 'blueprints', 'documentation', 'tracking-version', 'version-tracking']),
                    'submenu' => [
                        [
                            'title' => 'BRD',
                            'url' => $basePath . 'Workspace/Documentation/BRD.php',
                            'icon' => 'fa-regular fa-file-code fs-7 text-primary',
                            'active' => ($currentPage === 'brd')
                        ],
                        [
                            'title' => 'FSD',
                            'url' => $basePath . 'Workspace/Documentation/FSD.php',
                            'icon' => 'fa-regular fa-file-code fs-7 text-success',
                            'active' => ($currentPage === 'fsd')
                        ],
                        [
                            'title' => 'PRD',
                            'url' => $basePath . 'Workspace/Documentation/PRD.php',
                            'icon' => 'fa-regular fa-file-lines fs-7 text-info',
                            'active' => ($currentPage === 'prd')
                        ],
                        [
                            'title' => 'ERD',
                            'url' => $basePath . 'Workspace/Documentation/ERD.php',
                            'icon' => 'fa-solid fa-diagram-project fs-7 text-warning',
                            'active' => ($currentPage === 'erd')
                        ],
                        [
                            'title' => 'Blueprints',
                            'url' => $basePath . 'Workspace/Documentation/Blueprints.php',
                            'icon' => 'fa-solid fa-map-location-dot fs-7 text-danger',
                            'active' => ($currentPage === 'blueprints')
                        ],
                        [
                            'title' => 'Tracking Version',
                            'url' => $basePath . 'Workspace/Documentation/TrackingVersion.php',
                            'icon' => 'fa-solid fa-code-compare fs-7 text-primary',
                            'active' => ($currentPage === 'tracking-version' || $currentPage === 'version-tracking')
                        ]
                    ]
                ],
                [
                    'title' => 'Teams',
                    'url' => $basePath . 'Workspace/Teams.php',
                    'icon' => 'fa-solid fa-user-group',
                    'active' => ($currentPage === 'teams')
                ],
                [
                    'title' => 'Settings',
                    'url' => $basePath . 'Workspace/Setting.php',
                    'icon' => 'fa-solid fa-gear',
                    'active' => ($currentPage === 'settings')
                ],
            ]
        ]
    ],
    'categories' => [
        ['name' => 'To Do', 'dot_class' => 'dot-todo', 'count' => 3, 'filter' => 'todo'],
        ['name' => 'In Progres', 'dot_class' => 'dot-progress', 'count' => 3, 'filter' => 'in-progress'],
        ['name' => 'Review', 'dot_class' => 'dot-review', 'count' => 3, 'filter' => 'review'],
        ['name' => 'Completed', 'dot_class' => 'dot-complete', 'count' => 2, 'filter' => 'completed'],
    ],
    'messages' => [
        ['name' => 'Michael Anderson', 'role' => 'UI/UX Designer', 'status' => 'online', 'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80'],
        ['name' => 'Sophia Carter', 'role' => 'Graphic Designer', 'status' => 'online', 'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80'],
        ['name' => 'Daniel Johnson', 'role' => 'Frontend Developer', 'status' => 'busy', 'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80'],
        ['name' => 'James Wilson', 'role' => 'Backend Programmer', 'status' => 'offline', 'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80'],
    ]
];

include __DIR__ . '/../sidebar.php';
