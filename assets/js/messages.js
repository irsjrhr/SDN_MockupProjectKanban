/**
 * ==============================================================================
 * SYNCBOARD - WORKSPACE TEAM MESSAGES ENGINE
 * Location: /assets/js/messages.js
 * ==============================================================================
 */

$(document).ready(function () {
    // 1. Data Store for conversations
    const conversationData = {
        'michael': {
            name: 'Michael Anderson',
            role: 'UI/UX Designer',
            avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
            status: 'online',
            statusText: 'Active now &bull; Local time 09:24 AM',
            project: 'Company Website / Design System',
            messages: [
                { sender: 'incoming', time: '09:12 AM', text: 'Hi! Have you checked the latest typography tokens in the Figma file for the Company Website redesign?' },
                { sender: 'outgoing', time: '09:15 AM', text: 'Yes, looking sleek! The Plus Jakarta Sans font pairing works cleanly with the dark navigation rail.' },
                { sender: 'incoming', time: '09:18 AM', text: 'Great! I am updating the responsive mobile break-points for the investor portal now.', taskRef: { code: 'SYNC-102', title: 'Investor Portal Wireframe', status: 'To Do', badge: 'bg-primary' } },
                { sender: 'incoming', time: '09:20 AM', text: 'Let me know if you need new iconography for the telemetry monitoring gauges!' }
            ]
        },
        'sophia': {
            name: 'Sophia Carter',
            role: 'Graphic Designer & Lead',
            avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80',
            status: 'online',
            statusText: 'Active now &bull; Lead Reviewer',
            project: 'Middleware Project & Landing Campaign',
            messages: [
                { sender: 'incoming', time: 'Yesterday', text: 'We finalized the sprint scope for the Middleware API Gateway release.' },
                { sender: 'outgoing', time: 'Yesterday', text: 'Awesome, all subtasks for JWT revocation are in progress.' },
                { sender: 'incoming', time: '08:45 AM', text: 'Please make sure the landing page lead form includes reCAPTCHA before QA testing begins today.' }
            ]
        },
        'daniel': {
            name: 'Daniel Johnson',
            role: 'Frontend Developer',
            avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
            status: 'busy',
            statusText: 'In a meeting &bull; Busy',
            project: 'Mobile CRM App',
            messages: [
                { sender: 'incoming', time: '08:30 AM', text: 'Hey, I pushed the SQLite offline sync queue changes to `feature/mobile-sync` branch.' },
                { sender: 'outgoing', time: '08:40 AM', text: 'Got it, I will run the telemetry ping benchmark on node01 to test response latency.' }
            ]
        },
        'james': {
            name: 'James Wilson',
            role: 'Backend Programmer',
            avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
            status: 'offline',
            statusText: 'Last seen 45 mins ago',
            project: 'Master DB Cluster & Ingestion',
            messages: [
                { sender: 'outgoing', time: 'Yesterday', text: 'How is the MySQL Group Replication cluster holding up with the 2.4M req/day traffic load?' },
                { sender: 'incoming', time: 'Yesterday', text: 'Everything is at 99.99% uptime. The TimescaleDB compression policies kicked in smoothly at 02:00 UTC.' }
            ]
        },
        'general': {
            name: '#general-workspace',
            role: 'Company-Wide Announcements',
            avatar: 'https://cdn-icons-png.flaticon.com/512/906/906338.png',
            status: 'online',
            statusText: '14 Team Members &bull; Public Channel',
            project: 'Syncboard Enterprise',
            messages: [
                { sender: 'incoming', author: 'Sophia Carter', time: '08:00 AM', text: '🚀 Welcome to the new sprint cycle! All project domain telemetry monitoring is now active.' },
                { sender: 'incoming', author: 'Michael Anderson', time: '08:15 AM', text: 'Please check your assigned tasks under the Category Status pipeline before daily standup.' }
            ]
        },
        'middleware': {
            name: '#middleware-core',
            role: 'Core API Gateway & Backend Sync',
            avatar: 'https://cdn-icons-png.flaticon.com/512/906/906338.png',
            status: 'online',
            statusText: '6 Developers &bull; Project Channel',
            project: 'api-core.enterprise.internal',
            messages: [
                { sender: 'incoming', author: 'James Wilson', time: '09:00 AM', text: 'Node01 health metrics: 24% CPU utilization, 82 days remaining on TLS 1.3 certificate.' }
            ]
        }
    };

    // 2. Read URL params
    const urlParams = new URLSearchParams(window.location.search);
    let activeKey = urlParams.get('user') || urlParams.get('channel') || 'michael';

    // 3. Switch conversation handler
    function loadConversation(key) {
        activeKey = key;
        const conv = conversationData[key] || conversationData['michael'];

        // Update active class in sidebar
        $('.chat-user-item, .chat-channel-item').removeClass('active');
        $(`[data-chat-key="${key}"]`).addClass('active');

        // Update header
        $('#chatRecipientName').text(conv.name);
        $('#chatRecipientRole').text(conv.role);
        $('#chatRecipientStatus').html(`<span class="status-indicator ${conv.status} position-static d-inline-block me-1" style="width: 8px; height: 8px;"></span> ${conv.statusText}`);
        $('#chatRecipientAvatar').attr('src', conv.avatar);
        $('#chatRecipientProjectBadge').text(conv.project);

        // Render messages
        const $thread = $('#chatMessagesThread');
        $thread.empty();

        conv.messages.forEach(function (msg) {
            appendMessageToUI(msg);
        });

        scrollChatToBottom();
    }

    function appendMessageToUI(msg) {
        const isOutgoing = msg.sender === 'outgoing';
        const alignClass = isOutgoing ? 'justify-content-end' : 'justify-content-start';
        const bubbleClass = isOutgoing ? 'outgoing' : 'incoming';

        let taskCardHtml = '';
        if (msg.taskRef) {
            taskCardHtml = `
                <div class="card border rounded-3 p-2.5 my-2 bg-white text-dark shadow-sm">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="badge ${msg.taskRef.badge || 'bg-primary'} fs-8">${msg.taskRef.code}</span>
                        <span class="badge bg-light text-dark border fs-8">${msg.taskRef.status}</span>
                    </div>
                    <span class="fw-bold fs-7 d-block">${msg.taskRef.title}</span>
                    <a href="KanbanProject.php" class="fs-8 text-primary text-decoration-none mt-1 d-inline-block">
                        <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> View in Kanban Board
                    </a>
                </div>
            `;
        }

        const authorHtml = (!isOutgoing && msg.author) ? `<span class="fs-8 fw-bold text-primary d-block mb-1">${msg.author}</span>` : '';

        const msgHtml = `
            <div class="d-flex ${alignClass} mb-3 animate__animated animate__fadeIn">
                <div class="chat-bubble ${bubbleClass} p-3 shadow-sm">
                    ${authorHtml}
                    <div class="chat-text fs-7">${escapeHtml(msg.text)}</div>
                    ${taskCardHtml}
                    <div class="text-end mt-1">
                        <small class="fs-8 text-muted">${msg.time} ${isOutgoing ? '<i class="fa-solid fa-check-double text-white-50 ms-1"></i>' : ''}</small>
                    </div>
                </div>
            </div>
        `;

        $('#chatMessagesThread').append(msgHtml);
    }

    function scrollChatToBottom() {
        const threadElem = document.getElementById('chatMessagesThread');
        if (threadElem) {
            threadElem.scrollTop = threadElem.scrollHeight;
        }
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // 4. Click event on users and channels
    $('.chat-user-item, .chat-channel-item').on('click', function () {
        const key = $(this).data('chat-key');
        const isChannel = $(this).hasClass('chat-channel-item');

        const currentUrl = new URL(window.location.href);
        if (isChannel) {
            currentUrl.searchParams.delete('user');
            currentUrl.searchParams.set('channel', key);
        } else {
            currentUrl.searchParams.delete('channel');
            currentUrl.searchParams.set('user', key);
        }
        window.history.replaceState({}, '', currentUrl);

        loadConversation(key);
    });

    // 5. Send message action
    $('#chatSendMessageForm').on('submit', function (e) {
        e.preventDefault();
        const $input = $('#chatMessageInput');
        const text = $input.val().trim();
        if (!text) return;

        const newMsg = {
            sender: 'outgoing',
            time: 'Just now',
            text: text
        };

        if (conversationData[activeKey]) {
            conversationData[activeKey].messages.push(newMsg);
        }

        appendMessageToUI(newMsg);
        $input.val('');
        scrollChatToBottom();

        // Simulate instant AI / Team Auto-Reply after 1.2 seconds
        setTimeout(function () {
            const replies = [
                "Received! I will verify this on the sprint dashboard right away.",
                "Sounds great! Checking the telemetry and documentation link now.",
                "Noted with thanks! I'll update the Kanban status accordingly.",
                "Awesome progress! Let me know if you need assistance with deployment."
            ];
            const randomReply = replies[Math.floor(Math.random() * replies.length)];
            const incomingReply = {
                sender: 'incoming',
                author: conversationData[activeKey]?.name || 'Team Lead',
                time: 'Just now',
                text: randomReply
            };

            if (conversationData[activeKey]) {
                conversationData[activeKey].messages.push(incomingReply);
            }
            appendMessageToUI(incomingReply);
            scrollChatToBottom();
        }, 1200);
    });

    // 6. Search conversations filter
    $('#chatSearchInput').on('input', function () {
        const query = $(this).val().toLowerCase();
        $('.chat-user-item, .chat-channel-item').each(function () {
            const text = $(this).text().toLowerCase();
            if (text.includes(query)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    // Initial load
    loadConversation(activeKey);
});
