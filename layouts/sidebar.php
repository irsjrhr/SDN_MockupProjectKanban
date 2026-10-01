<?php
/**
 * ==============================================================================
 * UNIFIED SIDEBAR & RAIL NAVIGATION COMPONENT
 * Location: /layouts/sidebar.php
 * ==============================================================================
 * Centralized layout component for all modules (Workspace, Master, Monitoring, Setting).
 * Accepts:
 *   - $currentModule : 'workspace' | 'master' | 'monitoring' | 'setting'
 *   - $currentPage   : e.g. 'kanban', 'brd', 'fsd', 'dashboard', 'role', etc.
 *   - $basePath      : relative path back to project root (e.g. '../', '../../', './')
 *   - $sidebarMenu   : (optional) custom override menu array
 */

// 1. Resolve Base Path dynamically if not set
if (!isset($basePath)) {
    // Default fallback
    $basePath = '../';
}

$currentModule = isset($currentModule) ? strtolower($currentModule) : 'workspace';
$currentPage = isset($currentPage) ? strtolower($currentPage) : '';

// 2. Icon Rail Navigation Menu Array (Far-Left Navigation)
$railMenu = [
    [
        'title' => 'Master',
        'url'   => $basePath . 'Master/dashboard.php',
        'icon'  => 'fa-regular fa-compass fs-5',
        'key'   => 'master',
        'active'=> ($currentModule === 'master')
    ],
    [
        'title' => 'Workspace',
        'url'   => $basePath . 'Workspace/KanbanProject.php',
        'icon'  => 'fa-solid fa-layer-group fs-5',
        'key'   => 'workspace',
        'active'=> ($currentModule === 'workspace')
    ],
    [
        'title' => 'Monitoring',
        'url'   => $basePath . 'Monitoring/dashboard.php',
        'icon'  => 'fa-solid fa-sliders fs-5',
        'key'   => 'monitoring',
        'active'=> ($currentModule === 'monitoring')
    ],
];

// Rail Bottom Settings Button
$railBottomMenu = [
    'title' => 'Settings',
    'url'   => $basePath . 'Setting/general.php',
    'icon'  => 'fa-solid fa-gear fs-5',
    'key'   => 'setting',
    'active'=> ($currentModule === 'setting')
];

// 3. Centralized Module Menu Definitions
if (!isset($sidebarMenu)) {
    switch ($currentModule) {
        // ---------------------------------------------------------------------
        // MASTER MODULE
        // ---------------------------------------------------------------------
        case 'master':
            $sidebarMenu = [
                'header' => [
                    'title' => 'Master Admin',
                    'subtitle' => 'System Control & Management'
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
                                'active' => in_array($currentPage, ['master-dashboard', 'dashboard'])
                            ],
                            [
                                'title' => 'Role Management',
                                'url' => $basePath . 'Master/role.php',
                                'icon' => 'fa-solid fa-user-shield',
                                'active' => in_array($currentPage, ['master-role', 'role'])
                            ],
                            [
                                'title' => 'Permission',
                                'url' => $basePath . 'Master/permission.php',
                                'icon' => 'fa-solid fa-key',
                                'active' => in_array($currentPage, ['master-permission', 'permission'])
                            ],
                            [
                                'title' => 'Users List',
                                'url' => $basePath . 'Master/users.php',
                                'icon' => 'fa-solid fa-users-gear',
                                'active' => in_array($currentPage, ['master-users', 'users'])
                            ],
                        ]
                    ]
                ]
            ];
            break;

        // ---------------------------------------------------------------------
        // MONITORING MODULE
        // ---------------------------------------------------------------------
        case 'monitoring':
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
                                'active' => in_array($currentPage, ['monitoring-dashboard', 'dashboard', 'overview'])
                            ],
                            [
                                'title' => 'Server & Specs',
                                'url' => $basePath . 'Monitoring/servers.php',
                                'icon' => 'fa-solid fa-server',
                                'active' => in_array($currentPage, ['monitoring-servers', 'servers'])
                            ],
                            [
                                'title' => 'Traffic & Network',
                                'url' => $basePath . 'Monitoring/traffic.php',
                                'icon' => 'fa-solid fa-chart-line',
                                'active' => in_array($currentPage, ['monitoring-traffic', 'traffic'])
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
                                'active' => in_array($currentPage, ['monitoring-database', 'database'])
                            ],
                            [
                                'title' => 'Domains & SSL',
                                'url' => $basePath . 'Monitoring/domains.php',
                                'icon' => 'fa-solid fa-globe',
                                'active' => in_array($currentPage, ['monitoring-domains', 'domains'])
                            ],
                        ]
                    ]
                ]
            ];
            break;

        // ---------------------------------------------------------------------
        // SETTING MODULE
        // ---------------------------------------------------------------------
        case 'setting':
        case 'settings':
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
                                'active' => in_array($currentPage, ['setting-account', 'account'])
                            ],
                            [
                                'title' => 'Account Security',
                                'url' => $basePath . 'Setting/account-security.php',
                                'icon' => 'fa-solid fa-user-shield',
                                'active' => in_array($currentPage, ['setting-account-security', 'account-security'])
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
                                'active' => in_array($currentPage, ['setting-general', 'general'])
                            ],
                            [
                                'title' => 'Kanban & Workflows',
                                'url' => $basePath . 'Setting/kanban.php',
                                'icon' => 'fa-solid fa-table-columns',
                                'active' => in_array($currentPage, ['setting-kanban', 'kanban'])
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
                                'active' => in_array($currentPage, ['setting-notifications', 'notifications'])
                            ],
                            [
                                'title' => 'Integrations & API',
                                'url' => $basePath . 'Setting/integrations.php',
                                'icon' => 'fa-solid fa-plug',
                                'active' => in_array($currentPage, ['setting-integrations', 'integrations'])
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
                                'active' => in_array($currentPage, ['setting-security', 'security'])
                            ],
                        ]
                    ]
                ]
            ];
            break;

        // ---------------------------------------------------------------------
        // WORKSPACE MODULE (DEFAULT)
        // ---------------------------------------------------------------------
        case 'workspace':
        default:
            $isDocActive = in_array($currentPage, ['brd', 'fsd', 'erd', 'prd', 'blueprints', 'documentation', 'tracking-version', 'version-tracking']);
            $isKanbanTaskActive = in_array($currentPage, ['kanban', 'kanban-task', 'project-company', 'project-middleware', 'project-landing']);

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
                                'open' => $isKanbanTaskActive,
                                'active' => $isKanbanTaskActive,
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
                                'open' => $isDocActive,
                                'active' => $isDocActive,
                                'submenu' => [
                                    [
                                        'title' => 'BRD',
                                        'url' => $basePath . 'Workspace/Documentation/BRD.php',
                                        'icon' => 'fa-solid fa-file-invoice fs-7 text-primary',
                                        'active' => ($currentPage === 'brd')
                                    ],
                                    [
                                        'title' => 'FSD',
                                        'url' => $basePath . 'Workspace/Documentation/FSD.php',
                                        'icon' => 'fa-solid fa-file-code fs-7 text-success',
                                        'active' => ($currentPage === 'fsd')
                                    ],
                                    [
                                        'title' => 'PRD',
                                        'url' => $basePath . 'Workspace/Documentation/PRD.php',
                                        'icon' => 'fa-solid fa-rectangle-list fs-7 text-info',
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
                                        'icon' => 'fa-solid fa-cubes-stacked fs-7 text-danger',
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
                                'title' => 'SLA Tracking',
                                'url' => $basePath . 'Workspace/SLA.php',
                                'icon' => 'fa-solid fa-stopwatch-20',
                                'active' => in_array($currentPage, ['sla', 'sla-tracking', 'sla-management'])
                            ],
                            // [
                            //     'title' => 'Messages',
                            //     'url' => $basePath . 'Workspace/Messages.php',
                            //     'icon' => 'fa-solid fa-comments',
                            //     'active' => in_array($currentPage, ['messages', 'chat', 'direct-message'])
                            // ],
                        ]
                    ]
                ],
                'categories' => [
                    ['name' => 'To Do', 'dot_class' => 'dot-todo', 'count' => 3, 'filter' => 'todo', 'url' => $basePath . 'Workspace/CategoryStatus.php?status=todo', 'active' => ($currentPage === 'category-todo' || ($currentPage === 'category-status' && isset($_GET['status']) && $_GET['status'] === 'todo'))],
                    ['name' => 'In Progress', 'dot_class' => 'dot-progress', 'count' => 3, 'filter' => 'in-progress', 'url' => $basePath . 'Workspace/CategoryStatus.php?status=in-progress', 'active' => ($currentPage === 'category-in-progress' || ($currentPage === 'category-status' && isset($_GET['status']) && $_GET['status'] === 'in-progress'))],
                    ['name' => 'Review', 'dot_class' => 'dot-review', 'count' => 3, 'filter' => 'review', 'url' => $basePath . 'Workspace/CategoryStatus.php?status=review', 'active' => ($currentPage === 'category-review' || ($currentPage === 'category-status' && isset($_GET['status']) && $_GET['status'] === 'review'))],
                    ['name' => 'Completed', 'dot_class' => 'dot-complete', 'count' => 2, 'filter' => 'completed', 'url' => $basePath . 'Workspace/CategoryStatus.php?status=completed', 'active' => ($currentPage === 'category-completed' || ($currentPage === 'category-status' && isset($_GET['status']) && $_GET['status'] === 'completed'))],
                ],
                'messages' => [
                    ['id' => 'michael', 'name' => 'Michael Anderson', 'role' => 'UI/UX Designer', 'status' => 'online', 'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80', 'url' => $basePath . 'Workspace/Messages.php?user=michael'],
                    ['id' => 'sophia', 'name' => 'Sophia Carter', 'role' => 'Graphic Designer', 'status' => 'online', 'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80', 'url' => $basePath . 'Workspace/Messages.php?user=sophia'],
                    ['id' => 'daniel', 'name' => 'Daniel Johnson', 'role' => 'Frontend Developer', 'status' => 'busy', 'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80', 'url' => $basePath . 'Workspace/Messages.php?user=daniel'],
                    ['id' => 'james', 'name' => 'James Wilson', 'role' => 'Backend Programmer', 'status' => 'offline', 'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80', 'url' => $basePath . 'Workspace/Messages.php?user=james'],
                ]
            ];
            break;
    }
}
?>

<!-- 1. Primary Far-Left Icon Rail Navigation -->
<aside class="sidebar-rail d-flex flex-column align-items-center justify-content-between py-3" id="sidebarRail">
    <div class="rail-top d-flex flex-column align-items-center gap-3 w-100">
        <!-- Brand Logo Icon Top -->
        <a href="<?= $basePath ?>Workspace/KanbanProject.php" class="rail-brand-icon d-flex align-items-center justify-content-center rounded-3 shadow-sm mb-1 text-decoration-none overflow-hidden" title="Syncboard App">
            <img src="<?= $basePath ?>assets/img/sdn.png" alt="SDN Logo" class="w-100 h-100 object-fit-contain p-1" onerror="this.onerror=null; this.src='https://cdn-icons-png.flaticon.com/512/906/906338.png';">
        </a>

        <!-- Main Navigation Module Icons -->
        <nav class="rail-nav d-flex flex-column align-items-center gap-2 w-100 px-2">
            <?php foreach ($railMenu as $item): ?>
                <a href="<?= htmlspecialchars($item['url']) ?>" 
                    class="rail-item rounded-3 d-flex align-items-center justify-content-center <?= $item['active'] ? 'active' : '' ?>"
                    data-bs-toggle="tooltip" 
                    data-bs-placement="right" 
                    title="<?= htmlspecialchars($item['title']) ?>">
                    <i class="<?= $item['icon'] ?>"></i>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>

    <!-- Bottom Settings Icon Button -->
    <div class="rail-bottom d-flex flex-column align-items-center gap-2 w-100 px-2">
        <a href="<?= htmlspecialchars($railBottomMenu['url']) ?>" 
            class="rail-item rounded-3 d-flex align-items-center justify-content-center <?= $railBottomMenu['active'] ? 'active' : '' ?>"
            id="btnRailSettings" 
            data-bs-toggle="tooltip" 
            data-bs-placement="right" 
            title="<?= htmlspecialchars($railBottomMenu['title']) ?>">
            <i class="<?= $railBottomMenu['icon'] ?>"></i>
        </a>
    </div>
</aside>

<!-- 2. Secondary Panel Sidebar Navigation -->
<aside class="sidebar bg-white border-end d-flex flex-column" id="nav_project_sidebar">
    <?php if (isset($sidebarMenu['header'])): ?>
    <div class="sidebar-header p-3 border-bottom">
        <div class="dropdown">
            <div class="workspace-selector d-flex align-items-center justify-content-between p-2 rounded cursor-pointer" id="workspaceDropdownToggle" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="workspace-brand d-flex align-items-center gap-2">
                    <div class="brand-info d-flex flex-column">
                        <span class="workspace-title fw-bold"><?= htmlspecialchars($sidebarMenu['header']['title']) ?></span>
                        <span class="workspace-sub text-muted"><?= htmlspecialchars($sidebarMenu['header']['subtitle']) ?></span>
                    </div>
                </div>
                <i class="fa-solid fa-chevron-down dropdown-arrow text-muted fs-8"></i>
            </div>
            <ul class="dropdown-menu w-100 shadow-sm border" aria-labelledby="workspaceDropdownToggle">
                <li><h6 class="dropdown-header fs-8 text-uppercase">Switch Module</h6></li>
                <li><a class="dropdown-item fs-7 fw-semibold <?= $currentModule === 'workspace' ? 'active' : '' ?>" href="<?= $basePath ?>Workspace/KanbanProject.php"><i class="fa-solid fa-layer-group me-2 text-primary"></i> Team Workspace</a></li>
                <li><a class="dropdown-item fs-7 <?= $currentModule === 'master' ? 'active' : '' ?>" href="<?= $basePath ?>Master/dashboard.php"><i class="fa-regular fa-compass me-2 text-muted"></i> Master Management</a></li>
                <li><a class="dropdown-item fs-7 <?= $currentModule === 'monitoring' ? 'active' : '' ?>" href="<?= $basePath ?>Monitoring/dashboard.php"><i class="fa-solid fa-sliders me-2 text-muted"></i> Project Monitoring</a></li>
                <li><a class="dropdown-item fs-7 <?= $currentModule === 'setting' ? 'active' : '' ?>" href="<?= $basePath ?>Setting/general.php"><i class="fa-solid fa-gear me-2 text-muted"></i> Master Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item fs-7 text-primary" href="#"><i class="fa-solid fa-plus me-2"></i> Create Workspace</a></li>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    <div class="sidebar-scrollable flex-grow-1 p-3 overflow-y-auto">
        <!-- Navigation Sections -->
        <?php if (!empty($sidebarMenu['sections'])): ?>
            <?php foreach ($sidebarMenu['sections'] as $secIndex => $sec): ?>
                <div class="sidebar-section mb-4">
                    <div class="section-header d-flex align-items-center justify-content-between px-1 mb-2">
                        <span class="section-title text-uppercase fw-bold text-muted fs-8"><?= htmlspecialchars($sec['section_title']) ?></span>
                        <?php if (!empty($sec['add_button'])): ?>
                        <button class="btn btn-sm btn-icon-xs text-muted p-0 border-0" title="Add Item" id="btnAddSectionItem_<?= $secIndex ?>">
                            <i class="fa-solid fa-plus fs-7"></i>
                        </button>
                        <?php endif; ?>
                    </div>

                    <ul class="nav flex-column nav-list">
                        <?php foreach ($sec['items'] as $item): ?>
                            <?php if (!empty($item['has_submenu'])): ?>
                                <li class="nav-item has-submenu <?= !empty($item['open']) ? 'open' : '' ?>">
                                    <a href="#" 
                                       class="nav-link d-flex align-items-center justify-content-between px-2.5 py-2 rounded <?= !empty($item['active']) ? 'text-dark fw-semibold active' : 'text-secondary' ?>"
                                       onclick="event.preventDefault(); event.stopPropagation(); this.closest('.has-submenu').classList.toggle('open');">
                                        <span class="d-flex align-items-center gap-3">
                                            <i class="<?= $item['icon'] ?> icon"></i>
                                            <span class="nav-text"><?= htmlspecialchars($item['title']) ?></span>
                                        </span>
                                        <i class="fa-solid fa-chevron-down submenu-arrow fs-8 text-muted"></i>
                                    </a>
                                    <ul class="submenu list-unstyled ps-4 my-1">
                                        <?php foreach ($item['submenu'] as $sub): ?>
                                            <li class="py-1">
                                                <a href="<?= htmlspecialchars($sub['url']) ?>" 
                                                   class="submenu-link <?= !empty($sub['view']) ? 'nav-view-link' : '' ?> d-flex align-items-center gap-2 px-2 py-1.5 <?= !empty($sub['active']) ? 'active text-dark fw-bold' : 'text-secondary' ?> text-decoration-none rounded fs-7"
                                                   <?= !empty($sub['view']) ? 'data-view="' . htmlspecialchars($sub['view']) . '"' : '' ?>
                                                   <?= !empty($sub['subview']) ? 'data-subview="' . htmlspecialchars($sub['subview']) . '"' : '' ?>>
                                                    <?php if (!empty($sub['badge_class'])): ?>
                                                        <span class="badge-icon-sm <?= $sub['badge_class'] ?>"><i class="<?= $sub['badge_icon'] ?>"></i></span>
                                                    <?php elseif (!empty($sub['icon'])): ?>
                                                        <i class="<?= $sub['icon'] ?>"></i>
                                                    <?php endif; ?>
                                                    <span><?= htmlspecialchars($sub['title']) ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?= htmlspecialchars($item['url']) ?>" 
                                       class="nav-link <?= !empty($item['view']) ? 'nav-view-link' : '' ?> d-flex align-items-center gap-3 px-2.5 py-2 rounded <?= !empty($item['active']) ? 'active text-dark fw-semibold' : 'text-secondary' ?>"
                                       <?= !empty($item['view']) ? 'data-view="' . htmlspecialchars($item['view']) . '"' : '' ?>>
                                        <i class="<?= $item['icon'] ?> icon"></i>
                                        <span class="nav-text"><?= htmlspecialchars($item['title']) ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- Categories Section (if defined) -->
        <?php if (!empty($sidebarMenu['categories'])): ?>
            <div class="sidebar-section mb-4">
                <div class="section-header px-1 mb-2 d-flex align-items-center justify-content-between">
                    <span class="section-title text-uppercase fw-bold text-muted fs-8">Categories</span>
                    <a href="<?= $basePath ?>Workspace/CategoryStatus.php?status=all" class="fs-8 text-decoration-none text-muted" title="View All Category Statuses">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
                <ul class="list-unstyled category-list d-flex flex-column gap-1 mb-0">
                    <?php foreach ($sidebarMenu['categories'] as $cat): ?>
                        <li>
                            <a href="<?= htmlspecialchars($cat['url'] ?? $basePath . 'Workspace/CategoryStatus.php?status=' . $cat['filter']) ?>" 
                               class="category-item d-flex align-items-center px-2.5 py-1.5 rounded text-decoration-none <?= !empty($cat['active']) ? 'bg-light text-dark fw-bold border' : '' ?>" 
                               data-filter-status="<?= $cat['filter'] ?>">
                                <span class="dot <?= $cat['dot_class'] ?> me-2"></span>
                                <span class="category-name flex-grow-1 fs-7 fw-medium <?= !empty($cat['active']) ? 'text-dark fw-bold' : 'text-secondary' ?>"><?= htmlspecialchars($cat['name']) ?></span>
                                <span class="category-count badge rounded-pill bg-light text-dark fs-8 border"><?= $cat['count'] ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Messages Section (if defined) -->
        <?php if (!empty($sidebarMenu['messages'])): ?>
            <div class="sidebar-section mb-2">
                <div class="section-header px-1 mb-2 d-flex align-items-center justify-content-between">
                    <span class="section-title text-uppercase fw-bold text-muted fs-8">Message</span>
                    <a href="<?= $basePath ?>Workspace/Messages.php" class="fs-8 text-decoration-none text-muted" title="Open Team Messages Hub">
                        <i class="fa-solid fa-comments"></i>
                    </a>
                </div>
                <ul class="list-unstyled team-list d-flex flex-column gap-1 mb-0">
                    <?php foreach ($sidebarMenu['messages'] as $msg): ?>
                        <li>
                            <a href="<?= htmlspecialchars($msg['url'] ?? $basePath . 'Workspace/Messages.php?user=' . ($msg['id'] ?? '')) ?>" 
                               class="team-item d-flex align-items-center gap-2.5 px-2.5 py-1.5 rounded text-decoration-none">
                                <div class="user-avatar-wrap position-relative">
                                    <img src="<?= htmlspecialchars($msg['avatar']) ?>" alt="<?= htmlspecialchars($msg['name']) ?>" class="avatar-sm rounded-circle">
                                    <span class="status-indicator <?= $msg['status'] ?>"></span>
                                </div>
                                <div class="team-info d-flex flex-column">
                                    <span class="team-name fw-semibold fs-7 text-dark"><?= htmlspecialchars($msg['name']) ?></span>
                                    <span class="team-role text-muted fs-8"><?= htmlspecialchars($msg['role']) ?></span>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</aside>
