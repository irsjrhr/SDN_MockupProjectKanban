/**
 * ==============================================================================
 * SYNCBOARD - WHITEBOARD & SKETCHING STUDIO ENGINE (board.js)
 * Location: /assets/js/board.js
 * ==============================================================================
 * Interactive HTML5 Whiteboard Studio with Multi-Project & Multi-Task Association,
 * Freehand Drawing, Highlighter, Vector Shapes, Text, Sticky Notes, Undo/Redo,
 * and JSON/PNG Export/Import.
 */

(function ($) {
    'use strict';

    // --------------------------------------------------------------------------
    // 1. DEFAULT MOCKUP BOARD STORAGE & RELATIONAL REPOSITORY
    // --------------------------------------------------------------------------
    const STORAGE_KEY = 'sdn_syncboard_whiteboards';

    const INITIAL_PROJECTS = [
        { id: 'company', name: 'Company Website' },
        { id: 'middleware', name: 'Middleware Project' },
        { id: 'landing', name: 'Landing Page Campaign' },
        { id: 'mobile', name: 'SDN Mobile App' },
        { id: 'hrms', name: 'HRMS Portal' }
    ];

    const INITIAL_TASKS = [
        { id: 'TASK-101', name: 'Design System & Token Architecture', project: 'company' },
        { id: 'TASK-102', name: 'Dual Sidebar Layout Implementation', project: 'company' },
        { id: 'TASK-103', name: 'OAuth2 GitHub Integration', project: 'middleware' },
        { id: 'TASK-104', name: 'API Gateway & Rate Limiter', project: 'middleware' },
        { id: 'TASK-105', name: 'Hero Banner Motion Animation', project: 'landing' },
        { id: 'TASK-106', name: 'PRD & BRD Tracking Matrix', project: 'company' }
    ];

    const INITIAL_BOARDS = [
        {
            id: 'board-arch-01',
            name: 'Microservices & API Gateway Flow',
            description: 'Arsitektur routing request client ke microservices melalui SDN API Gateway.',
            linkedProjects: ['middleware', 'company'],
            linkedTasks: ['TASK-103', 'TASK-104'],
            createdAt: '2026-09-28 10:30',
            updatedAt: '2026-10-01 14:15',
            author: { name: 'James Wilson', role: 'Backend Lead' },
            bgPattern: 'bg-grid-dots',
            stickyNotes: [
                { id: 'note-1', x: 80, y: 120, color: 'sticky-yellow', text: 'Gateway Rate Limiting: 100 req/min per tenant token.' },
                { id: 'note-2', x: 420, y: 130, color: 'sticky-cyan', text: 'JWT Auth Bearer validation via Redis cache cluster.' }
            ],
            drawings: [
                { type: 'rect', x: 60, y: 280, w: 180, h: 90, color: '#3b82f6', width: 3 },
                { type: 'text', x: 85, y: 330, text: 'Client Request', color: '#1e293b', font: '14px Plus Jakarta Sans' },
                { type: 'arrow', x1: 240, y1: 325, x2: 380, y2: 325, color: '#6366f1', width: 3 },
                { type: 'rect', x: 380, y: 260, w: 220, h: 130, color: '#4f46e5', width: 3 },
                { type: 'text', x: 410, y: 310, text: 'SDN API Gateway', color: '#4f46e5', font: 'bold 15px Plus Jakarta Sans' },
                { type: 'text', x: 410, y: 340, text: '• CORS & Auth\n• Rate Limiter', color: '#64748b', font: '12px Plus Jakarta Sans' },
                { type: 'arrow', x1: 600, y1: 325, x2: 740, y2: 325, color: '#10b981', width: 3 },
                { type: 'rect', x: 740, y: 280, w: 180, h: 90, color: '#10b981', width: 3 },
                { type: 'text', x: 760, y: 330, text: 'Internal Services', color: '#047857', font: '14px Plus Jakarta Sans' }
            ]
        },
        {
            id: 'board-ui-02',
            name: 'Kanban Task Drag & Drop UX Wireframe',
            description: 'Sketsa konsep multi-lane drag and drop column, card assignees stack, dan badge status.',
            linkedProjects: ['company', 'landing'],
            linkedTasks: ['TASK-101', 'TASK-102'],
            createdAt: '2026-09-30 09:00',
            updatedAt: '2026-10-01 11:20',
            author: { name: 'Michael Anderson', role: 'UI/UX Designer' },
            bgPattern: 'bg-grid-dots',
            stickyNotes: [
                { id: 'note-3', x: 100, y: 100, color: 'sticky-pink', text: 'Micro-animation lift scale(1.02) saat card di-drag!' },
                { id: 'note-4', x: 400, y: 100, color: 'sticky-green', text: 'Wajib ada feedback suara/vibration saat card drop berhasil.' }
            ],
            drawings: [
                { type: 'rect', x: 80, y: 220, w: 200, h: 320, color: '#94a3b8', width: 2 },
                { type: 'text', x: 110, y: 255, text: 'To Do (3)', color: '#ef4444', font: 'bold 14px Plus Jakarta Sans' },
                { type: 'rect', x: 100, y: 280, w: 160, h: 70, color: '#e2e8f0', width: 1 },
                { type: 'rect', x: 320, y: 220, w: 200, h: 320, color: '#94a3b8', width: 2 },
                { type: 'text', x: 340, y: 255, text: 'In Progress (3)', color: '#3b82f6', font: 'bold 14px Plus Jakarta Sans' },
                { type: 'rect', x: 560, y: 220, w: 200, h: 320, color: '#94a3b8', width: 2 },
                { type: 'text', x: 590, y: 255, text: 'Completed (2)', color: '#10b981', font: 'bold 14px Plus Jakarta Sans' }
            ]
        },
        {
            id: 'board-retro-03',
            name: 'Sprint 14 Retrospective & Brainstorming',
            description: 'Papan diskusi evaluasi sprint, hal yang perlu ditingkatkan, dan action items.',
            linkedProjects: ['company', 'middleware', 'landing'],
            linkedTasks: ['TASK-105', 'TASK-106'],
            createdAt: '2026-10-01 08:30',
            updatedAt: '2026-10-01 16:00',
            author: { name: 'Sophia Carter', role: 'Scrum Master' },
            bgPattern: 'bg-grid-lines',
            stickyNotes: [
                { id: 'note-5', x: 80, y: 140, color: 'sticky-green', text: 'What Went Well:\nDeploy CI/CD stabil, SLA tercapai 98%.' },
                { id: 'note-6', x: 320, y: 140, color: 'sticky-pink', text: 'What Needs Work:\nDokumentasi API perlu selalu up-to-date.' },
                { id: 'note-7', x: 560, y: 140, color: 'sticky-purple', text: 'Action Items:\nTambahkan Swagger auto-gen ke GitHub pipeline.' }
            ],
            drawings: [
                { type: 'circle', x: 200, y: 380, radius: 45, color: '#10b981', width: 3 },
                { type: 'text', x: 175, y: 385, text: 'KUDOS', color: '#10b981', font: 'bold 13px Plus Jakarta Sans' },
                { type: 'arrow', x1: 250, y1: 380, x2: 440, y2: 380, color: '#6366f1', width: 3 },
                { type: 'circle', x: 490, y: 380, radius: 45, color: '#f59e0b', width: 3 },
                { type: 'text', x: 465, y: 385, text: 'ACTION', color: '#d97706', font: 'bold 13px Plus Jakarta Sans' }
            ]
        }
    ];

    // Initialize or read storage
    function getStoredBoards() {
        try {
            const data = localStorage.getItem(STORAGE_KEY);
            if (data) {
                const parsed = JSON.parse(data);
                if (Array.isArray(parsed) && parsed.length > 0) {
                    return parsed;
                }
            }
        } catch (e) {
            console.error('Failed reading board storage:', e);
        }
        localStorage.setItem(STORAGE_KEY, JSON.stringify(INITIAL_BOARDS));
        return INITIAL_BOARDS;
    }

    function saveStoredBoards(boards) {
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(boards));
        } catch (e) {
            console.error('Failed saving board storage:', e);
        }
    }

    // --------------------------------------------------------------------------
    // 2. WHITEBOARD CANVAS CONTROLLER CLASS
    // --------------------------------------------------------------------------
    class WhiteboardStudio {
        constructor(containerEl, options = {}) {
            this.$container = $(containerEl);
            if (!this.$container.length) return;

            this.options = $.extend({
                activeBoardId: null,
                readOnly: false,
                isEmbedded: false,
                filterProject: null,
                filterTask: null
            }, options);

            this.boards = getStoredBoards();
            
            // Determine active board
            let targetBoard = null;
            if (this.options.activeBoardId) {
                targetBoard = this.getBoard(this.options.activeBoardId);
            }
            if (!targetBoard && this.boards.length > 0) {
                targetBoard = this.boards[0];
            }
            this.activeBoard = targetBoard;

            // Canvas states
            this.currentTool = 'pen'; // pen, highlighter, eraser, rect, circle, line, arrow, text, sticky, pan
            this.currentColor = '#4f46e5';
            this.currentWidth = 3;
            this.isDrawing = false;
            this.startX = 0;
            this.startY = 0;
            this.history = [];
            this.historyStep = -1;
            this.zoomScale = 1;

            this.initDOM();
            this.initCanvas();
            this.bindEvents();
            if (this.activeBoard) {
                this.loadBoard(this.activeBoard.id);
            }
            this.renderGallery();
        }

        getBoard(id) {
            return this.boards.find(b => b.id === id);
        }

        initDOM() {
            this.$canvasWrapper = this.$container.find('.board-canvas-wrapper');
            this.canvas = this.$container.find('canvas')[0];
            if (!this.canvas) return;
            this.ctx = this.canvas.getContext('2d');
        }

        initCanvas() {
            if (!this.canvas) return;
            this.resizeCanvas();
            $(window).off('resize.boardStudio_' + (this.$container.attr('id') || 'main'))
                .on('resize.boardStudio_' + (this.$container.attr('id') || 'main'), () => this.resizeCanvas());
        }

        resizeCanvas() {
            if (!this.canvas || !this.$canvasWrapper.length) return;
            const rect = this.$canvasWrapper[0].getBoundingClientRect();
            const width = rect.width || 1200;
            const height = rect.height || 700;

            const dpr = window.devicePixelRatio || 1;
            this.canvas.width = width * dpr;
            this.canvas.height = height * dpr;
            this.canvas.style.width = width + 'px';
            this.canvas.style.height = height + 'px';

            this.ctx.setTransform(1, 0, 0, 1, 0, 0);
            this.ctx.scale(dpr, dpr);
            this.redraw();
        }

        getCanvasCoordinates(e) {
            const rect = this.canvas.getBoundingClientRect();
            let clientX, clientY;
            if (e.touches && e.touches.length > 0) {
                clientX = e.touches[0].clientX;
                clientY = e.touches[0].clientY;
            } else {
                clientX = e.clientX;
                clientY = e.clientY;
            }
            return {
                x: (clientX - rect.left) / this.zoomScale,
                y: (clientY - rect.top) / this.zoomScale
            };
        }

        bindEvents() {
            const self = this;

            // 1. Drawing Mouse & Touch Listeners
            $(this.canvas).off('mousedown.draw touchstart.draw').on('mousedown.draw touchstart.draw', function (e) {
                if (self.options.readOnly) return;
                self.handlePointerDown(e);
            });

            $(window).off('mousemove.draw touchmove.draw').on('mousemove.draw touchmove.draw', function (e) {
                if (!self.isDrawing) return;
                self.handlePointerMove(e);
            });

            $(window).off('mouseup.draw touchend.draw touchcancel.draw').on('mouseup.draw touchend.draw touchcancel.draw', function (e) {
                if (!self.isDrawing) return;
                self.handlePointerUp(e);
            });

            // 2. Toolbar Tools Switching
            this.$container.on('click', '.board-tool-btn[data-tool]', function (e) {
                e.preventDefault();
                const tool = $(this).data('tool');
                self.setTool(tool);
            });

            // 3. Color Swatches
            this.$container.on('click', '.color-swatch-btn', function (e) {
                e.preventDefault();
                self.$container.find('.color-swatch-btn').removeClass('active');
                $(this).addClass('active');
                self.currentColor = $(this).data('color') || '#4f46e5';
            });

            // 4. Stroke Sizes
            this.$container.on('click', '.stroke-size-btn', function (e) {
                e.preventDefault();
                self.$container.find('.stroke-size-btn').removeClass('active');
                $(this).addClass('active');
                self.currentWidth = parseInt($(this).data('size'), 10) || 3;
            });

            // 5. Background Pattern Switcher
            this.$container.on('click', '.btn-board-pattern', function (e) {
                e.preventDefault();
                const pattern = $(this).data('pattern');
                self.setPattern(pattern);
            });

            // 6. Undo / Redo Actions
            this.$container.on('click', '.btn-board-undo', function () { self.undo(); });
            this.$container.on('click', '.btn-board-redo', function () { self.redo(); });

            // 7. Clear Board
            this.$container.on('click', '.btn-board-clear', function () {
                if (confirm('Apakah Anda yakin ingin membersihkan semua coretan di papan ini?')) {
                    self.clearCanvas();
                }
            });

            // 8. Add Sticky Note
            this.$container.on('click', '.btn-add-sticky-note', function () {
                self.createStickyNote();
            });

            // 9. Export PNG
            this.$container.on('click', '.btn-board-export-png', function (e) {
                e.preventDefault();
                self.exportPNG();
            });

            // 10. Export JSON (.board file)
            this.$container.on('click', '.btn-board-export-json', function (e) {
                e.preventDefault();
                self.exportJSON();
            });

            // 11. Fullscreen Toggle
            this.$container.on('click', '.btn-board-fullscreen', function () {
                self.$container.toggleClass('fullscreen');
                const isFull = self.$container.hasClass('fullscreen');
                $(this).find('i').toggleClass('fa-expand', !isFull).toggleClass('fa-compress', isFull);
                setTimeout(() => self.resizeCanvas(), 100);
            });

            // 12. Zoom Controls
            this.$container.on('click', '.btn-zoom-in', function () { self.setZoom(self.zoomScale + 0.15); });
            this.$container.on('click', '.btn-zoom-out', function () { self.setZoom(self.zoomScale - 0.15); });
            this.$container.on('click', '.btn-zoom-reset', function () { self.setZoom(1); });

            // 13. Keyboard Shortcuts (Ctrl+Z, Ctrl+Y)
            $(document).on('keydown.boardShortcuts', function (e) {
                if ($(e.target).is('input, textarea, select')) return;
                if ((e.ctrlKey || e.metaKey) && e.key === 'z') {
                    e.preventDefault();
                    if (e.shiftKey) self.redo();
                    else self.undo();
                } else if ((e.ctrlKey || e.metaKey) && e.key === 'y') {
                    e.preventDefault();
                    self.redo();
                }
            });
        }

        setTool(tool) {
            this.currentTool = tool;
            this.$container.find('.board-tool-btn[data-tool]').removeClass('active');
            this.$container.find(`.board-tool-btn[data-tool="${tool}"]`).addClass('active');

            if (tool === 'pan') {
                this.$canvasWrapper.addClass('panning');
            } else {
                this.$canvasWrapper.removeClass('panning');
            }

            if (tool === 'sticky') {
                this.createStickyNote();
                this.setTool('pen');
            }
        }

        setPattern(pattern) {
            this.$canvasWrapper.removeClass('bg-grid-dots bg-grid-lines bg-blank bg-darkboard')
                .addClass(pattern);
            if (this.activeBoard) {
                this.activeBoard.bgPattern = pattern;
                this.saveCurrentBoard();
            }
        }

        setZoom(scale) {
            this.zoomScale = Math.min(Math.max(scale, 0.5), 2.5);
            this.$container.find('.board-zoom-val').text(Math.round(this.zoomScale * 100) + '%');
            this.redraw();
        }

        handlePointerDown(e) {
            const coords = this.getCanvasCoordinates(e);
            this.isDrawing = true;
            this.startX = coords.x;
            this.startY = coords.y;

            if (this.currentTool === 'pen' || this.currentTool === 'highlighter' || this.currentTool === 'eraser') {
                this.currentPath = [{ x: coords.x, y: coords.y }];
            }
        }

        handlePointerMove(e) {
            const coords = this.getCanvasCoordinates(e);

            if (this.currentTool === 'pen' || this.currentTool === 'highlighter' || this.currentTool === 'eraser') {
                this.currentPath.push({ x: coords.x, y: coords.y });
                this.redraw();
                this.drawPath(this.currentPath, this.currentTool, this.currentColor, this.currentWidth);
            } else if (['rect', 'circle', 'line', 'arrow'].includes(this.currentTool)) {
                this.redraw();
                this.drawShapePreview(this.currentTool, this.startX, this.startY, coords.x, coords.y, this.currentColor, this.currentWidth);
            }
        }

        handlePointerUp(e) {
            if (!this.isDrawing) return;
            this.isDrawing = false;
            const coords = this.getCanvasCoordinates(e);

            if (!this.activeBoard) return;
            if (!this.activeBoard.drawings) this.activeBoard.drawings = [];

            if (this.currentTool === 'pen' || this.currentTool === 'highlighter' || this.currentTool === 'eraser') {
                if (this.currentPath && this.currentPath.length > 1) {
                    this.activeBoard.drawings.push({
                        type: 'freehand',
                        points: this.currentPath,
                        tool: this.currentTool,
                        color: this.currentColor,
                        width: this.currentTool === 'highlighter' ? this.currentWidth * 3.5 : this.currentWidth
                    });
                    this.pushHistory();
                }
            } else if (this.currentTool === 'rect') {
                const w = coords.x - this.startX;
                const h = coords.y - this.startY;
                if (Math.abs(w) > 4 && Math.abs(h) > 4) {
                    this.activeBoard.drawings.push({
                        type: 'rect',
                        x: Math.min(this.startX, coords.x),
                        y: Math.min(this.startY, coords.y),
                        w: Math.abs(w),
                        h: Math.abs(h),
                        color: this.currentColor,
                        width: this.currentWidth
                    });
                    this.pushHistory();
                }
            } else if (this.currentTool === 'circle') {
                const radius = Math.hypot(coords.x - this.startX, coords.y - this.startY) / 2;
                if (radius > 4) {
                    this.activeBoard.drawings.push({
                        type: 'circle',
                        x: (this.startX + coords.x) / 2,
                        y: (this.startY + coords.y) / 2,
                        radius: radius,
                        color: this.currentColor,
                        width: this.currentWidth
                    });
                    this.pushHistory();
                }
            } else if (this.currentTool === 'line' || this.currentTool === 'arrow') {
                if (Math.hypot(coords.x - this.startX, coords.y - this.startY) > 5) {
                    this.activeBoard.drawings.push({
                        type: this.currentTool,
                        x1: this.startX,
                        y1: this.startY,
                        x2: coords.x,
                        y2: coords.y,
                        color: this.currentColor,
                        width: this.currentWidth
                    });
                    this.pushHistory();
                }
            } else if (this.currentTool === 'text') {
                const textInput = prompt('Masukkan teks coretan di whiteboard:', 'Ide Catatan Baru');
                if (textInput && textInput.trim()) {
                    this.activeBoard.drawings.push({
                        type: 'text',
                        x: coords.x,
                        y: coords.y,
                        text: textInput.trim(),
                        color: this.currentColor,
                        font: 'bold 15px Plus Jakarta Sans'
                    });
                    this.pushHistory();
                }
            }

            this.redraw();
            this.saveCurrentBoard();
        }

        drawPath(points, tool, color, width) {
            if (!points || points.length < 2) return;
            this.ctx.save();
            this.ctx.beginPath();
            this.ctx.moveTo(points[0].x, points[0].y);

            for (let i = 1; i < points.length; i++) {
                this.ctx.lineTo(points[i].x, points[i].y);
            }

            this.ctx.lineCap = 'round';
            this.ctx.lineJoin = 'round';

            if (tool === 'highlighter') {
                this.ctx.strokeStyle = color;
                this.ctx.globalAlpha = 0.35;
                this.ctx.lineWidth = width * 3.5;
            } else if (tool === 'eraser') {
                this.ctx.strokeStyle = this.activeBoard && this.activeBoard.bgPattern === 'bg-darkboard' ? '#0f172a' : '#ffffff';
                this.ctx.lineWidth = width * 4;
            } else {
                this.ctx.strokeStyle = color;
                this.ctx.lineWidth = width;
            }

            this.ctx.stroke();
            this.ctx.restore();
        }

        drawShapePreview(tool, x1, y1, x2, y2, color, width) {
            this.ctx.save();
            this.ctx.strokeStyle = color;
            this.ctx.lineWidth = width;
            this.ctx.fillStyle = 'rgba(79, 70, 229, 0.04)';
            this.ctx.lineCap = 'round';
            this.ctx.lineJoin = 'round';

            if (tool === 'rect') {
                this.ctx.strokeRect(Math.min(x1, x2), Math.min(y1, y2), Math.abs(x2 - x1), Math.abs(y2 - y1));
                this.ctx.fillRect(Math.min(x1, x2), Math.min(y1, y2), Math.abs(x2 - x1), Math.abs(y2 - y1));
            } else if (tool === 'circle') {
                const cx = (x1 + x2) / 2;
                const cy = (y1 + y2) / 2;
                const radius = Math.hypot(x2 - x1, y2 - y1) / 2;
                this.ctx.beginPath();
                this.ctx.arc(cx, cy, radius, 0, Math.PI * 2);
                this.ctx.stroke();
                this.ctx.fill();
            } else if (tool === 'line') {
                this.ctx.beginPath();
                this.ctx.moveTo(x1, y1);
                this.ctx.lineTo(x2, y2);
                this.ctx.stroke();
            } else if (tool === 'arrow') {
                this.drawArrow(x1, y1, x2, y2, color, width);
            }
            this.ctx.restore();
        }

        drawArrow(fromx, fromy, tox, toy, color, width) {
            const headlen = Math.max(12, width * 3);
            const dx = tox - fromx;
            const dy = toy - fromy;
            const angle = Math.atan2(dy, dx);

            this.ctx.save();
            this.ctx.strokeStyle = color;
            this.ctx.fillStyle = color;
            this.ctx.lineWidth = width;
            this.ctx.beginPath();
            this.ctx.moveTo(fromx, fromy);
            this.ctx.lineTo(tox, toy);
            this.ctx.stroke();

            // Draw arrowhead
            this.ctx.beginPath();
            this.ctx.moveTo(tox, toy);
            this.ctx.lineTo(tox - headlen * Math.cos(angle - Math.PI / 6), toy - headlen * Math.sin(angle - Math.PI / 6));
            this.ctx.lineTo(tox - headlen * Math.cos(angle + Math.PI / 6), toy - headlen * Math.sin(angle + Math.PI / 6));
            this.ctx.closePath();
            this.ctx.fill();
            this.ctx.restore();
        }

        redraw() {
            if (!this.ctx || !this.canvas) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            if (!this.activeBoard || !this.activeBoard.drawings) return;

            this.activeBoard.drawings.forEach(item => {
                if (item.type === 'freehand') {
                    this.drawPath(item.points, item.tool, item.color, item.width);
                } else if (item.type === 'rect') {
                    this.ctx.save();
                    this.ctx.strokeStyle = item.color;
                    this.ctx.lineWidth = item.width;
                    this.ctx.strokeRect(item.x, item.y, item.w, item.h);
                    this.ctx.restore();
                } else if (item.type === 'circle') {
                    this.ctx.save();
                    this.ctx.strokeStyle = item.color;
                    this.ctx.lineWidth = item.width;
                    this.ctx.beginPath();
                    this.ctx.arc(item.x, item.y, item.radius, 0, Math.PI * 2);
                    this.ctx.stroke();
                    this.ctx.restore();
                } else if (item.type === 'line') {
                    this.ctx.save();
                    this.ctx.strokeStyle = item.color;
                    this.ctx.lineWidth = item.width;
                    this.ctx.beginPath();
                    this.ctx.moveTo(item.x1, item.y1);
                    this.ctx.lineTo(item.x2, item.y2);
                    this.ctx.stroke();
                    this.ctx.restore();
                } else if (item.type === 'arrow') {
                    this.drawArrow(item.x1, item.y1, item.x2, item.y2, item.color, item.width);
                } else if (item.type === 'text') {
                    this.ctx.save();
                    this.ctx.fillStyle = item.color;
                    this.ctx.font = item.font || '14px Plus Jakarta Sans';
                    const lines = (item.text || '').split('\n');
                    lines.forEach((l, idx) => {
                        this.ctx.fillText(l, item.x, item.y + (idx * 20));
                    });
                    this.ctx.restore();
                }
            });
        }

        // ----------------------------------------------------------------------
        // STICKY NOTES ENGINE
        // ----------------------------------------------------------------------
        renderStickyNotes() {
            this.$canvasWrapper.find('.sticky-note').remove();
            if (!this.activeBoard || !this.activeBoard.stickyNotes) return;

            this.activeBoard.stickyNotes.forEach(note => {
                const $note = $(`
                    <div class="sticky-note ${note.color || 'sticky-yellow'}" id="${note.id}" style="left: ${note.x}px; top: ${note.y}px;">
                        <div class="sticky-note-header">
                            <i class="fa-solid fa-thumbtack fs-8"></i>
                            <button class="sticky-note-delete" title="Hapus Note"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                        <textarea class="sticky-note-textarea" placeholder="Tulis catatan coretan...">${note.text || ''}</textarea>
                    </div>
                `);

                this.makeNoteDraggable($note, note);
                this.$canvasWrapper.append($note);
            });
        }

        makeNoteDraggable($note, noteObj) {
            const self = this;
            let isDraggingNote = false;
            let offsetLeft = 0;
            let offsetTop = 0;

            $note.on('mousedown touchstart', function (e) {
                if ($(e.target).is('textarea, button, i')) return;
                isDraggingNote = true;
                const clientX = e.touches ? e.touches[0].clientX : e.clientX;
                const clientY = e.touches ? e.touches[0].clientY : e.clientY;
                offsetLeft = clientX - $note.position().left;
                offsetTop = clientY - $note.position().top;
                $note.css('z-index', 30);
            });

            $(window).on('mousemove touchmove', function (e) {
                if (!isDraggingNote) return;
                const clientX = e.touches ? e.touches[0].clientX : e.clientX;
                const clientY = e.touches ? e.touches[0].clientY : e.clientY;
                const newX = Math.max(0, clientX - offsetLeft);
                const newY = Math.max(0, clientY - offsetTop);
                $note.css({ left: newX + 'px', top: newY + 'px' });
                noteObj.x = newX;
                noteObj.y = newY;
            });

            $(window).on('mouseup touchend touchcancel', function () {
                if (!isDraggingNote) return;
                isDraggingNote = false;
                $note.css('z-index', 20);
                self.saveCurrentBoard();
            });

            // Note Text Edit
            $note.find('textarea').on('input', function () {
                noteObj.text = $(this).val();
                self.saveCurrentBoard();
            });

            // Note Delete
            $note.find('.sticky-note-delete').on('click', function () {
                $note.fadeOut(200, function () {
                    $(this).remove();
                    self.activeBoard.stickyNotes = self.activeBoard.stickyNotes.filter(n => n.id !== noteObj.id);
                    self.saveCurrentBoard();
                });
            });
        }

        createStickyNote() {
            const colors = ['sticky-yellow', 'sticky-cyan', 'sticky-pink', 'sticky-green', 'sticky-purple'];
            const randomColor = colors[Math.floor(Math.random() * colors.length)];
            const noteObj = {
                id: 'note_' + Date.now(),
                x: 100 + Math.random() * 180,
                y: 100 + Math.random() * 140,
                color: randomColor,
                text: 'Catatan cepat whiteboard...'
            };

            if (!this.activeBoard) return;
            if (!this.activeBoard.stickyNotes) this.activeBoard.stickyNotes = [];
            this.activeBoard.stickyNotes.push(noteObj);
            this.renderStickyNotes();
            this.saveCurrentBoard();
            this.pushHistory();
        }

        // ----------------------------------------------------------------------
        // BOARD FILE MANAGEMENT & MULTI-RELATION & GALLERY
        // ----------------------------------------------------------------------
        loadBoard(boardId) {
            const board = this.getBoard(boardId);
            if (!board) return;

            this.activeBoard = board;
            this.options.activeBoardId = boardId;
            this.history = [];
            this.historyStep = -1;

            // Update UI Titles and relation info
            this.$container.find('.board-active-title').text(board.name);
            this.$container.find('.board-active-desc').text(board.description || 'Papan Tulis Kolaboratif');
            
            this.setPattern(board.bgPattern || 'bg-grid-dots');
            this.renderRelations();
            this.renderStickyNotes();
            this.redraw();
            this.pushHistory();

            // Update Gallery Highlight
            $('#boardGalleryContainer').find('.board-card').removeClass('active-board');
            $('#boardGalleryContainer').find(`.board-card[data-board-id="${boardId}"]`).addClass('active-board');
            
            // Dispatch event for other listeners
            $(document).trigger('syncboard:boardLoaded', [board]);
        }

        renderRelations() {
            const $projWrap = this.$container.find('.board-linked-projects').empty();
            const $taskWrap = this.$container.find('.board-linked-tasks').empty();

            if (!this.activeBoard) return;

            if (this.activeBoard.linkedProjects && this.activeBoard.linkedProjects.length) {
                this.activeBoard.linkedProjects.forEach(pid => {
                    const p = INITIAL_PROJECTS.find(item => item.id === pid);
                    const name = p ? p.name : pid;
                    $projWrap.append(`<span class="relation-chip relation-project"><i class="fa-solid fa-folder-tree fs-9"></i> ${name}</span>`);
                });
            } else {
                $projWrap.append('<span class="text-muted fs-8 fst-italic">Semua Project</span>');
            }

            if (this.activeBoard.linkedTasks && this.activeBoard.linkedTasks.length) {
                this.activeBoard.linkedTasks.forEach(tid => {
                    $taskWrap.append(`<span class="relation-chip relation-task"><i class="fa-solid fa-list-check fs-9"></i> ${tid}</span>`);
                });
            } else {
                $taskWrap.append('<span class="text-muted fs-8 fst-italic">Semua Task</span>');
            }
        }

        saveCurrentBoard() {
            if (!this.activeBoard) return;
            this.activeBoard.updatedAt = new Date().toISOString().replace('T', ' ').substring(0, 16);
            saveStoredBoards(this.boards);
        }

        pushHistory() {
            if (!this.activeBoard) return;
            if (this.historyStep < this.history.length - 1) {
                this.history = this.history.slice(0, this.historyStep + 1);
            }
            const snapshot = JSON.stringify(this.activeBoard.drawings || []);
            this.history.push(snapshot);
            this.historyStep = this.history.length - 1;
        }

        undo() {
            if (!this.activeBoard) return;
            if (this.historyStep > 0) {
                this.historyStep--;
                this.activeBoard.drawings = JSON.parse(this.history[this.historyStep]);
                this.redraw();
                this.saveCurrentBoard();
            }
        }

        redo() {
            if (!this.activeBoard) return;
            if (this.historyStep < this.history.length - 1) {
                this.historyStep++;
                this.activeBoard.drawings = JSON.parse(this.history[this.historyStep]);
                this.redraw();
                this.saveCurrentBoard();
            }
        }

        clearCanvas() {
            if (!this.activeBoard) return;
            this.activeBoard.drawings = [];
            this.activeBoard.stickyNotes = [];
            this.renderStickyNotes();
            this.redraw();
            this.pushHistory();
            this.saveCurrentBoard();
        }

        createBoard(data = {}) {
            const newId = 'board_' + Date.now();
            const newBoard = {
                id: newId,
                name: data.name || 'Papan Whiteboard Baru',
                description: data.description || 'Papan coret diagram & sketsa kolaboratif',
                linkedProjects: data.linkedProjects || ['company'],
                linkedTasks: data.linkedTasks || [],
                createdAt: new Date().toISOString().replace('T', ' ').substring(0, 16),
                updatedAt: new Date().toISOString().replace('T', ' ').substring(0, 16),
                author: data.author || { name: 'User Admin', role: 'Team Member' },
                bgPattern: data.bgPattern || 'bg-grid-dots',
                stickyNotes: [
                    { id: 'note_' + Date.now(), x: 100, y: 100, color: 'sticky-yellow', text: 'Catatan pertama di ' + (data.name || 'Whiteboard Baru') }
                ],
                drawings: []
            };

            this.boards.unshift(newBoard);
            saveStoredBoards(this.boards);
            this.loadBoard(newId);
            this.renderGallery();
            
            return newBoard;
        }

        deleteBoard(boardId) {
            if (this.boards.length <= 1) {
                alert('Tidak dapat menghapus board terakhir.');
                return;
            }

            const target = this.getBoard(boardId);
            if (!target) return;

            if (confirm(`Apakah Anda yakin ingin menghapus board "${target.name}"?`)) {
                this.boards = this.boards.filter(b => b.id !== boardId);
                saveStoredBoards(this.boards);

                if (this.activeBoard.id === boardId) {
                    this.loadBoard(this.boards[0].id);
                }
                this.renderGallery();
            }
        }

        renderGallery(filterProject = '') {
            const $container = $('#boardGalleryContainer');
            if (!$container.length) return;

            $container.empty();

            const boardsToShow = this.boards.filter(b => {
                if (!filterProject) return true;
                return b.linkedProjects && b.linkedProjects.includes(filterProject);
            });

            if (boardsToShow.length === 0) {
                $container.html(`
                    <div class="col-12 py-5 text-center text-muted">
                        <i class="fa-solid fa-chalkboard fs-1 mb-3 text-secondary opacity-50"></i>
                        <h6>Tidak ada file board untuk filter project ini.</h6>
                        <p class="fs-8">Klik tombol <strong>Board Baru</strong> untuk membuat whiteboard untuk project ini.</p>
                    </div>
                `);
                return;
            }

            boardsToShow.forEach(board => {
                const isActive = this.activeBoard && this.activeBoard.id === board.id;
                const projectChips = (board.linkedProjects || []).map(pid => {
                    const p = INITIAL_PROJECTS.find(item => item.id === pid);
                    return `<span class="relation-chip relation-project"><i class="fa-solid fa-folder-tree fs-9"></i> ${p ? p.name : pid}</span>`;
                }).join(' ') || '<span class="text-muted fs-9">Semua Project</span>';

                const taskChips = (board.linkedTasks || []).map(tid => {
                    return `<span class="relation-chip relation-task"><i class="fa-solid fa-list-check fs-9"></i> ${tid}</span>`;
                }).join(' ') || '<span class="text-muted fs-9">Semua Task</span>';

                // Determine preview icon
                let iconClass = 'fa-solid fa-chalkboard text-primary';
                if (board.id.includes('arch') || board.name.toLowerCase().includes('arsitektur') || board.name.toLowerCase().includes('api')) {
                    iconClass = 'fa-solid fa-network-wired text-primary';
                } else if (board.id.includes('ui') || board.name.toLowerCase().includes('ui') || board.name.toLowerCase().includes('ux')) {
                    iconClass = 'fa-solid fa-table-columns text-info';
                } else if (board.id.includes('retro') || board.name.toLowerCase().includes('sprint')) {
                    iconClass = 'fa-solid fa-lightbulb text-warning';
                }

                const drawingsCount = (board.drawings || []).length;
                const stickyCount = (board.stickyNotes || []).length;

                const cardHtml = `
                    <div class="col-12 col-md-6 col-xl-4 board-gallery-item" data-projects="${(board.linkedProjects || []).join(',')}">
                        <div class="board-card ${isActive ? 'active-board' : ''} p-3 d-flex flex-column h-100" data-board-id="${board.id}">
                            <div class="board-preview-box rounded-3 mb-3 position-relative ${board.bgPattern || 'bg-grid-dots'}">
                                <div class="board-preview-placeholder">
                                    <i class="${iconClass} fs-1"></i>
                                    <span class="fs-9 fw-semibold text-dark">${board.name}</span>
                                    <span class="fs-9 text-muted">${drawingsCount} elemen • ${stickyCount} sticky notes</span>
                                </div>
                                ${isActive ? '<span class="badge bg-primary position-absolute top-0 end-0 m-2 fs-9 rounded-pill shadow-xs"><i class="fa-solid fa-check me-1"></i> Sedang Dibuka</span>' : ''}
                            </div>
                            <div class="d-flex align-items-start justify-content-between mb-2">
                                <h6 class="fw-bold text-dark mb-0 fs-7 text-truncate" title="${board.name}">${board.name}</h6>
                            </div>
                            <p class="fs-8 text-muted mb-3 flex-grow-1 text-truncate-2">${board.description || 'Papan coretan whiteboard kolaboratif.'}</p>
                            
                            <div class="mb-3">
                                <div class="fs-9 text-muted fw-bold mb-1 text-uppercase">Linked Projects:</div>
                                <div class="d-flex flex-wrap gap-1 mb-1.5">${projectChips}</div>
                                <div class="fs-9 text-muted fw-bold mb-1 text-uppercase">Linked Tasks:</div>
                                <div class="d-flex flex-wrap gap-1">${taskChips}</div>
                            </div>

                            <div class="border-top pt-2.5 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-1.5 fs-9 text-muted">
                                    <i class="fa-regular fa-clock"></i> ${board.updatedAt || 'Baru saja'}
                                </div>
                                <div class="d-flex align-items-center gap-1.5">
                                    <button class="btn btn-outline-danger btn-sm fs-8 py-1 px-2 rounded-2 btn-delete-board" data-board-id="${board.id}" title="Hapus Board">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                    <button class="btn ${isActive ? 'btn-primary' : 'btn-outline-primary'} btn-sm fs-8 py-1 px-2.5 rounded-2 btn-load-board" data-board-id="${board.id}">
                                        ${isActive ? 'Aktif di Canvas' : 'Buka di Canvas'} <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                $container.append(cardHtml);
            });
        }

        // ----------------------------------------------------------------------
        // EXPORT & IMPORT ENGINE
        // ----------------------------------------------------------------------
        exportPNG() {
            if (!this.canvas || !this.activeBoard) return;

            const tempCanvas = document.createElement('canvas');
            tempCanvas.width = this.canvas.width;
            tempCanvas.height = this.canvas.height;
            const tempCtx = tempCanvas.getContext('2d');
            const dpr = window.devicePixelRatio || 1;
            const logicalWidth = tempCanvas.width / dpr;
            const logicalHeight = tempCanvas.height / dpr;

            // 1. Draw Background
            const bgPattern = this.activeBoard.bgPattern || 'bg-grid-dots';
            if (bgPattern === 'bg-darkboard') {
                tempCtx.fillStyle = '#0f172a';
                tempCtx.fillRect(0, 0, tempCanvas.width, tempCanvas.height);
                
                // Darkboard subtle dots
                tempCtx.fillStyle = 'rgba(255, 255, 255, 0.15)';
                for (let x = 0; x < tempCanvas.width; x += 20 * dpr) {
                    for (let y = 0; y < tempCanvas.height; y += 20 * dpr) {
                        tempCtx.fillRect(x, y, 1.2 * dpr, 1.2 * dpr);
                    }
                }
            } else {
                tempCtx.fillStyle = '#ffffff';
                tempCtx.fillRect(0, 0, tempCanvas.width, tempCanvas.height);

                if (bgPattern === 'bg-grid-dots') {
                    tempCtx.fillStyle = '#cbd5e1';
                    for (let x = 0; x < tempCanvas.width; x += 20 * dpr) {
                        for (let y = 0; y < tempCanvas.height; y += 20 * dpr) {
                            tempCtx.fillRect(x, y, 1.2 * dpr, 1.2 * dpr);
                        }
                    }
                } else if (bgPattern === 'bg-grid-lines') {
                    tempCtx.strokeStyle = '#f1f5f9';
                    tempCtx.lineWidth = 1 * dpr;
                    tempCtx.beginPath();
                    for (let x = 0; x < tempCanvas.width; x += 24 * dpr) {
                        tempCtx.moveTo(x, 0);
                        tempCtx.lineTo(x, tempCanvas.height);
                    }
                    for (let y = 0; y < tempCanvas.height; y += 24 * dpr) {
                        tempCtx.moveTo(0, y);
                        tempCtx.lineTo(tempCanvas.width, y);
                    }
                    tempCtx.stroke();
                }
            }

            // 2. Draw Canvas Vector / Freehand Drawings
            tempCtx.drawImage(this.canvas, 0, 0);

            // 3. Render Sticky Notes directly onto the exported image
            if (this.activeBoard.stickyNotes && this.activeBoard.stickyNotes.length > 0) {
                tempCtx.save();
                tempCtx.scale(dpr, dpr);

                const noteColorMap = {
                    'sticky-yellow': { bg: '#fef08a', border: '#facc15', text: '#713f12' },
                    'sticky-cyan': { bg: '#a5f3fc', border: '#67e8f9', text: '#155e75' },
                    'sticky-pink': { bg: '#fbcfe8', border: '#f472b6', text: '#831843' },
                    'sticky-green': { bg: '#bbf7d0', border: '#86efac', text: '#14532d' },
                    'sticky-purple': { bg: '#e9d5ff', border: '#c084fc', text: '#581c87' }
                };

                this.activeBoard.stickyNotes.forEach(note => {
                    const colors = noteColorMap[note.color] || noteColorMap['sticky-yellow'];
                    const noteW = 160;
                    const noteH = 140;
                    const nx = note.x || 50;
                    const ny = note.y || 50;
                    const r = 8;

                    // Note shadow
                    tempCtx.save();
                    tempCtx.shadowColor = 'rgba(0, 0, 0, 0.15)';
                    tempCtx.shadowBlur = 10;
                    tempCtx.shadowOffsetY = 4;

                    // Rounded Rect Path
                    tempCtx.beginPath();
                    tempCtx.moveTo(nx + r, ny);
                    tempCtx.lineTo(nx + noteW - r, ny);
                    tempCtx.quadraticCurveTo(nx + noteW, ny, nx + noteW, ny + r);
                    tempCtx.lineTo(nx + noteW, ny + noteH - r);
                    tempCtx.quadraticCurveTo(nx + noteW, ny + noteH, nx + noteW - r, ny + noteH);
                    tempCtx.lineTo(nx + r, ny + noteH);
                    tempCtx.quadraticCurveTo(nx, ny + noteH, nx, ny + noteH - r);
                    tempCtx.lineTo(nx, ny + r);
                    tempCtx.quadraticCurveTo(nx, ny, nx + r, ny);
                    tempCtx.closePath();

                    tempCtx.fillStyle = colors.bg;
                    tempCtx.fill();
                    tempCtx.restore();

                    // Note border
                    tempCtx.save();
                    tempCtx.strokeStyle = colors.border;
                    tempCtx.lineWidth = 1;
                    tempCtx.stroke();
                    tempCtx.restore();

                    // Pin dot indicator
                    tempCtx.fillStyle = colors.text;
                    tempCtx.beginPath();
                    tempCtx.arc(nx + 14, ny + 14, 3, 0, Math.PI * 2);
                    tempCtx.fill();

                    // Note Text
                    tempCtx.save();
                    tempCtx.fillStyle = colors.text;
                    tempCtx.font = '500 12px "Plus Jakarta Sans", sans-serif';
                    
                    const words = (note.text || '').split(' ');
                    let line = '';
                    let lineY = ny + 32;
                    const maxWidth = noteW - 20;

                    for (let n = 0; n < words.length; n++) {
                        const testLine = line + words[n] + ' ';
                        const metrics = tempCtx.measureText(testLine);
                        if (metrics.width > maxWidth && n > 0) {
                            tempCtx.fillText(line, nx + 10, lineY);
                            line = words[n] + ' ';
                            lineY += 16;
                            if (lineY > ny + noteH - 10) break; // Clip overflow
                        } else {
                            line = testLine;
                        }
                    }
                    if (lineY <= ny + noteH - 10) {
                        tempCtx.fillText(line, nx + 10, lineY);
                    }
                    tempCtx.restore();
                });

                tempCtx.restore();
            }

            // Trigger Download
            try {
                const link = document.createElement('a');
                const safeName = (this.activeBoard.name || 'Whiteboard').replace(/[^a-zA-Z0-9_\u0600-\u06FF-]/g, '_');
                link.download = `${safeName}_Whiteboard.png`;
                link.href = tempCanvas.toDataURL('image/png');
                document.body.appendChild(link);
                link.click();
                link.remove();
            } catch (err) {
                console.error('Failed exporting PNG:', err);
                alert('Gagal mengekspor gambar whiteboard.');
            }
        }

        exportJSON() {
            if (!this.activeBoard) return;

            const exportPayload = {
                app: 'SDN Syncboard Whiteboard Studio',
                version: '1.0',
                exportedAt: new Date().toISOString(),
                board: this.activeBoard
            };

            const jsonStr = JSON.stringify(exportPayload, null, 2);
            const blob = new Blob([jsonStr], { type: 'application/json;charset=utf-8' });
            const url = URL.createObjectURL(blob);

            const link = document.createElement('a');
            const safeName = (this.activeBoard.name || 'Whiteboard').replace(/[^a-zA-Z0-9_\u0600-\u06FF-]/g, '_');
            link.href = url;
            link.download = `${safeName}.board`;
            document.body.appendChild(link);
            link.click();

            setTimeout(() => {
                URL.revokeObjectURL(url);
                link.remove();
            }, 150);
        }

        importJSON(file) {
            if (!file) return;
            const reader = new FileReader();
            const self = this;

            reader.onload = function (evt) {
                try {
                    const parsed = JSON.parse(evt.target.result);
                    let importedBoard = null;

                    if (parsed && parsed.board && parsed.board.name) {
                        importedBoard = parsed.board;
                    } else if (parsed && parsed.name) {
                        importedBoard = parsed;
                    }

                    if (importedBoard) {
                        // Generate fresh ID
                        importedBoard.id = 'board_imp_' + Date.now();
                        importedBoard.updatedAt = new Date().toISOString().replace('T', ' ').substring(0, 16);
                        
                        // Ensure required arrays
                        if (!importedBoard.drawings) importedBoard.drawings = [];
                        if (!importedBoard.stickyNotes) importedBoard.stickyNotes = [];
                        if (!importedBoard.linkedProjects) importedBoard.linkedProjects = ['company'];
                        if (!importedBoard.linkedTasks) importedBoard.linkedTasks = [];

                        self.boards.unshift(importedBoard);
                        saveStoredBoards(self.boards);
                        self.loadBoard(importedBoard.id);
                        self.renderGallery();

                        alert(`Board file "${importedBoard.name}" berhasil di-import dan dibuka di canvas!`);
                    } else {
                        alert('Format file .board tidak valid atau kosong.');
                    }
                } catch (err) {
                    console.error('Import parse error:', err);
                    alert('Gagal membaca file .board JSON. Pastikan format file valid.');
                }
            };

            reader.readAsText(file);
        }
    }

    // Expose Globally
    window.WhiteboardStudio = WhiteboardStudio;
    window.SyncboardBoards = {
        getBoards: getStoredBoards,
        saveBoards: saveStoredBoards,
        projects: INITIAL_PROJECTS,
        tasks: INITIAL_TASKS
    };

    // --------------------------------------------------------------------------
    // 3. GLOBAL DOCUMENT DELEGATION FOR IMPORT, GALLERY & MODALS
    // --------------------------------------------------------------------------
    $(document).ready(function () {
        // Global Import Handler for all input[type="file"].input-board-import-file
        $(document).on('change', '.input-board-import-file', function (e) {
            const file = e.target.files[0];
            if (!file) return;

            if (window.activeWhiteboard) {
                window.activeWhiteboard.importJSON(file);
            } else {
                // Read and save directly
                const reader = new FileReader();
                reader.onload = function (evt) {
                    try {
                        const parsed = JSON.parse(evt.target.result);
                        let b = parsed.board || parsed;
                        if (b && b.name) {
                            b.id = 'board_imp_' + Date.now();
                            const boards = getStoredBoards();
                            boards.unshift(b);
                            saveStoredBoards(boards);
                            location.reload();
                        }
                    } catch (err) {
                        alert('Format file board tidak valid.');
                    }
                };
                reader.readAsText(file);
            }

            // Reset input so same file can be re-imported if needed
            e.target.value = '';
        });

        // Global Gallery Load Board Click
        $(document).on('click', '.btn-load-board', function (e) {
            e.preventDefault();
            const boardId = $(this).data('board-id');
            if (window.activeWhiteboard) {
                window.activeWhiteboard.loadBoard(boardId);
                const $target = $('#standaloneWhiteboardStudio');
                if ($target.length) {
                    $('html, body').animate({ scrollTop: $target.offset().top - 20 }, 300);
                }
            }
        });

        // Global Gallery Delete Board Click
        $(document).on('click', '.btn-delete-board', function (e) {
            e.preventDefault();
            const boardId = $(this).data('board-id');
            if (window.activeWhiteboard) {
                window.activeWhiteboard.deleteBoard(boardId);
            }
        });

        // Auto-initialize on standalone page
        if ($('#standaloneWhiteboardStudio').length) {
            const urlParams = new URLSearchParams(window.location.search);
            const initialBoardId = urlParams.get('board') || null;

            window.activeWhiteboard = new WhiteboardStudio('#standaloneWhiteboardStudio', {
                activeBoardId: initialBoardId
            });
        }
    });

})(jQuery);
