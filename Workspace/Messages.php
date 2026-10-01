<?php
$pageTitle = 'Team Messages & Communication Hub - Syncboard';
$currentPage = 'messages';
$currentModule = 'workspace';
$basePath = '../';
$breadcrumbs = [
    ['title' => 'Workspace', 'url' => 'KanbanProject.php'],
    ['title' => 'Team Messages', 'url' => '']
];
$extraJs = [$basePath . 'assets/js/messages.js'];
include __DIR__ . '/../layouts/header.php';
?>

            <!-- Page Title Section -->
            <section class="project-header p-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="project-title-area d-flex align-items-center gap-3">
                    <div class="project-icon-badge rounded-3 d-flex align-items-center justify-content-center text-white bg-primary shadow-sm" style="width: 48px; height: 48px;">
                        <i class="fa-solid fa-comments fs-4"></i>
                    </div>
                    <div>
                        <h1 class="project-title h3 fw-extrabold mb-0">Team Messages & Project Channels</h1>
                        <span class="text-muted fs-7">Real-time team collaboration, direct messages, project group chats, and task attachments</span>
                    </div>
                </div>

                <div class="project-actions-area d-flex align-items-center gap-2">
                    <a href="Teams.php" class="btn btn-outline-secondary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 fs-7">
                        <i class="fa-solid fa-user-group"></i> Team Directory
                    </a>
                    <button class="btn btn-primary px-3 py-2 fw-semibold rounded-3 d-flex align-items-center gap-2 fs-7" data-bs-toggle="modal" data-bs-target="#newConversationModal">
                        <i class="fa-solid fa-pen-to-square"></i> New Chat
                    </button>
                </div>
            </section>

            <!-- Main Content Area -->
            <div class="view-wrapper flex-grow-1 p-4">

                <!-- Chat Master Container Card -->
                <div class="card shadow-sm border rounded-4 bg-white overflow-hidden chat-container d-flex flex-row">

                    <!-- 1. LEFT SIDEBAR: CHANNELS & DIRECT MESSAGES -->
                    <div class="chat-sidebar border-end d-flex flex-column bg-light-subtle">
                        <!-- Search Box -->
                        <div class="p-3 border-bottom bg-white">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" id="chatSearchInput" class="form-control bg-light border-start-0 ps-0 fs-7" placeholder="Search conversations...">
                            </div>
                        </div>

                        <!-- Scrollable Conversations List -->
                        <div class="flex-grow-1 overflow-y-auto p-2">
                            <!-- Project Channels Section -->
                            <div class="px-2 py-1 mb-1 d-flex align-items-center justify-content-between">
                                <span class="fs-8 text-uppercase fw-bold text-muted">Project Channels</span>
                                <span class="badge bg-light text-dark border fs-8">2 Active</span>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-3">
                                <div class="chat-channel-item d-flex align-items-center justify-content-between px-2.5 py-2 rounded-3 cursor-pointer" data-chat-key="general">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-3 p-1.5 bg-primary-subtle text-primary d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;">
                                            <i class="fa-solid fa-hashtag fs-7"></i>
                                        </div>
                                        <div>
                                            <span class="fw-bold fs-7 text-dark d-block">general-workspace</span>
                                            <span class="fs-8 text-muted">Welcome to sprint cycle!</span>
                                        </div>
                                    </div>
                                    <span class="badge bg-primary rounded-pill fs-8">2</span>
                                </div>

                                <div class="chat-channel-item d-flex align-items-center justify-content-between px-2.5 py-2 rounded-3 cursor-pointer" data-chat-key="middleware">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-3 p-1.5 bg-info-subtle text-info d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;">
                                            <i class="fa-solid fa-hashtag fs-7"></i>
                                        </div>
                                        <div>
                                            <span class="fw-bold fs-7 text-dark d-block">middleware-core</span>
                                            <span class="fs-8 text-muted">Node01 telemetry health</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Direct Messages Section -->
                            <div class="px-2 py-1 mb-1 d-flex align-items-center justify-content-between">
                                <span class="fs-8 text-uppercase fw-bold text-muted">Direct Messages</span>
                                <span class="badge bg-success-subtle text-success fs-8">3 Online</span>
                            </div>
                            <div class="d-flex flex-column gap-1">
                                <!-- Michael -->
                                <div class="chat-user-item active d-flex align-items-center justify-content-between px-2.5 py-2 rounded-3" data-chat-key="michael">
                                    <div class="d-flex align-items-center gap-2.5">
                                        <div class="user-avatar-wrap position-relative">
                                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80" class="avatar-sm rounded-circle" alt="Michael">
                                            <span class="status-indicator online"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold fs-7 text-dark">Michael Anderson</span>
                                            <span class="fs-8 text-muted">UI/UX Designer</span>
                                        </div>
                                    </div>
                                    <small class="fs-8 text-muted">09:20 AM</small>
                                </div>

                                <!-- Sophia -->
                                <div class="chat-user-item d-flex align-items-center justify-content-between px-2.5 py-2 rounded-3" data-chat-key="sophia">
                                    <div class="d-flex align-items-center gap-2.5">
                                        <div class="user-avatar-wrap position-relative">
                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80" class="avatar-sm rounded-circle" alt="Sophia">
                                            <span class="status-indicator online"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold fs-7 text-dark">Sophia Carter</span>
                                            <span class="fs-8 text-muted">Graphic Designer & Lead</span>
                                        </div>
                                    </div>
                                    <small class="fs-8 text-muted">08:45 AM</small>
                                </div>

                                <!-- Daniel -->
                                <div class="chat-user-item d-flex align-items-center justify-content-between px-2.5 py-2 rounded-3" data-chat-key="daniel">
                                    <div class="d-flex align-items-center gap-2.5">
                                        <div class="user-avatar-wrap position-relative">
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80" class="avatar-sm rounded-circle" alt="Daniel">
                                            <span class="status-indicator busy"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold fs-7 text-dark">Daniel Johnson</span>
                                            <span class="fs-8 text-muted">Frontend Developer</span>
                                        </div>
                                    </div>
                                    <small class="fs-8 text-muted">08:40 AM</small>
                                </div>

                                <!-- James -->
                                <div class="chat-user-item d-flex align-items-center justify-content-between px-2.5 py-2 rounded-3" data-chat-key="james">
                                    <div class="d-flex align-items-center gap-2.5">
                                        <div class="user-avatar-wrap position-relative">
                                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80" class="avatar-sm rounded-circle" alt="James">
                                            <span class="status-indicator offline"></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold fs-7 text-dark">James Wilson</span>
                                            <span class="fs-8 text-muted">Backend Programmer</span>
                                        </div>
                                    </div>
                                    <small class="fs-8 text-muted">Yesterday</small>
                                </div>
                            </div>
                        </div>

                        <!-- Current User Bar Bottom -->
                        <div class="p-2.5 border-top bg-white d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <div class="user-avatar-wrap position-relative">
                                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=80&q=80" class="avatar-sm rounded-circle border" alt="Current User">
                                    <span class="status-indicator online"></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="fw-bold fs-7 text-dark">Irshandy (You)</span>
                                    <span class="fs-8 text-success fw-semibold">Online &bull; Available</span>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-icon-sm text-muted rounded-3" title="Chat Settings"><i class="fa-solid fa-gear"></i></button>
                        </div>
                    </div>

                    <!-- 2. RIGHT / MAIN: CONVERSATION PANEL -->
                    <div class="flex-grow-1 d-flex flex-column bg-white">

                        <!-- Active Recipient Header -->
                        <div class="p-3 border-bottom d-flex align-items-center justify-content-between bg-white">
                            <div class="d-flex align-items-center gap-3">
                                <img id="chatRecipientAvatar" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80" class="avatar-md rounded-circle border shadow-sm" alt="Recipient">
                                <div>
                                    <h2 class="h6 fw-bold mb-0 text-dark" id="chatRecipientName">Michael Anderson</h2>
                                    <div class="d-flex align-items-center gap-2 fs-8 text-muted mt-0.5">
                                        <span id="chatRecipientRole">UI/UX Designer</span>
                                        <span>&bull;</span>
                                        <span id="chatRecipientStatus" class="text-success fw-semibold"><span class="status-indicator online position-static d-inline-block me-1" style="width: 8px; height: 8px;"></span> Active now</span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary-subtle text-primary fs-8 d-none d-md-inline" id="chatRecipientProjectBadge">
                                    Company Website / Design System
                                </span>
                                <button class="btn btn-sm btn-outline-secondary rounded-3 px-2.5" title="Start Audio Call" data-bs-toggle="modal" data-bs-target="#callModal">
                                    <i class="fa-solid fa-phone"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-secondary rounded-3 px-2.5" title="Start Video Call" data-bs-toggle="modal" data-bs-target="#callModal">
                                    <i class="fa-solid fa-video"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Chat Messages Thread Feed -->
                        <div class="flex-grow-1 p-4 overflow-y-auto" id="chatMessagesThread" style="background-color: #fafbfd;">
                            <!-- Dynamically loaded via assets/js/messages.js -->
                        </div>

                        <!-- Message Input Area -->
                        <div class="p-3 border-top bg-white">
                            <form id="chatSendMessageForm">
                                <div class="input-group mb-2">
                                    <input type="text" id="chatMessageInput" class="form-control fs-7 py-2.5 ps-3" placeholder="Type a message or press '/' for commands..." required autocomplete="off">
                                    <button class="btn btn-primary px-4 fw-semibold d-flex align-items-center gap-1.5 fs-7" type="submit">
                                        <span>Send</span> <i class="fa-solid fa-paper-plane"></i>
                                    </button>
                                </div>

                                <div class="d-flex align-items-center justify-content-between fs-8 text-muted">
                                    <div class="d-flex align-items-center gap-3">
                                        <button type="button" class="btn btn-link p-0 text-muted fs-7 text-decoration-none" title="Attach Document"><i class="fa-solid fa-paperclip"></i></button>
                                        <button type="button" class="btn btn-link p-0 text-muted fs-7 text-decoration-none" title="Insert Code Snippet"><i class="fa-solid fa-code"></i></button>
                                        <button type="button" class="btn btn-link p-0 text-muted fs-7 text-decoration-none" title="Insert Kanban Task Reference"><i class="fa-solid fa-list-check"></i></button>
                                        <button type="button" class="btn btn-link p-0 text-muted fs-7 text-decoration-none" title="Emoji Picker"><i class="fa-regular fa-face-smile"></i></button>
                                    </div>
                                    <span>Press <kbd class="bg-light text-dark border">Enter ↵</kbd> to send</span>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Modal: Start Call Simulation -->
            <div class="modal fade" id="callModal" tabindex="-1" aria-labelledby="callModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-4 border-0 shadow-lg text-center p-4">
                        <div class="mb-3">
                            <div class="d-inline-block position-relative">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&q=80" class="rounded-circle border border-4 border-primary shadow" style="width: 90px; height: 90px;" alt="Call">
                                <span class="spinner-grow spinner-grow-sm text-primary position-absolute top-0 end-0"></span>
                            </div>
                        </div>
                        <h4 class="h5 fw-bold mb-1">Calling Michael Anderson...</h4>
                        <span class="text-muted fs-7 mb-4 d-block">Connecting WebRTC secure audio/video channel</span>

                        <div class="d-flex justify-content-center gap-3">
                            <button type="button" class="btn btn-light rounded-circle p-3 shadow-sm border" title="Mute Microphone"><i class="fa-solid fa-microphone-slash fs-5 text-muted"></i></button>
                            <button type="button" class="btn btn-light rounded-circle p-3 shadow-sm border" title="Toggle Camera"><i class="fa-solid fa-video fs-5 text-muted"></i></button>
                            <button type="button" class="btn btn-danger rounded-circle p-3 shadow-sm" data-bs-dismiss="modal" title="End Call"><i class="fa-solid fa-phone-slash fs-5"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal: New Conversation -->
            <div class="modal fade" id="newConversationModal" tabindex="-1" aria-labelledby="newConversationLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-4 border-0 shadow-lg">
                        <div class="modal-header bg-light border-bottom p-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-3 p-2 bg-primary-subtle text-primary">
                                    <i class="fa-solid fa-pen-to-square fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="modal-title h6 fw-bold mb-0" id="newConversationLabel">Start New Conversation</h5>
                                    <span class="text-muted fs-8">Direct message or project group channel</span>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 fs-7">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Select Team Member or Channel</label>
                                <select class="form-select fs-7">
                                    <option value="michael">Michael Anderson (UI/UX Designer)</option>
                                    <option value="sophia">Sophia Carter (Graphic Designer)</option>
                                    <option value="daniel">Daniel Johnson (Frontend Developer)</option>
                                    <option value="james">James Wilson (Backend Programmer)</option>
                                    <option value="general">#general-workspace Channel</option>
                                    <option value="middleware">#middleware-core Channel</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Initial Message</label>
                                <textarea class="form-control fs-7" rows="3" placeholder="Write message..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer bg-light border-top p-3">
                            <button type="button" class="btn btn-secondary btn-sm px-3 rounded-3" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary btn-sm px-3 rounded-3" data-bs-dismiss="modal" onclick="alert('Conversation opened!')">Start Chat</button>
                        </div>
                    </div>
                </div>
            </div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
