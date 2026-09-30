/**
 * SDN Mockup Project Kanban - Documentation & Version Tracker Store
 * Centralized localStorage data store and modal handlers for BRD, FSD, ERD, PRD, Blueprints & TrackingVersion.
 */

const DOC_STORAGE_KEY = 'syncboard_tracked_docs';

const INITIAL_TRACKED_DOCS = [
    // ---------------------- BRD DOCUMENTS ----------------------
    {
        id: 'DOC-BRD-001',
        code: 'DOC-BRD-001',
        type: 'BRD',
        project: 'Middleware Project',
        title: 'Core Architecture & API Gateway Specifications',
        description: 'High-level business requirement for enterprise multi-tenant API routing, load-balancer routing, and gateway security boundaries.',
        latestVersion: 'v2.4.0',
        author: 'Sarah Chen',
        authorRole: 'Tech Lead',
        authorAvatar: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=100&q=80',
        updatedAt: '30 Sep 2026',
        status: 'Approved',
        fileName: 'BRD_Middleware_Gateway_v2.4.pdf',
        fileSize: '2.4 MB PDF',
        revisions: [
            {
                version: 'v2.4.0',
                isLatest: true,
                date: '30 Sep 2026',
                author: 'Sarah Chen',
                authorRole: 'Tech Lead',
                title: 'Add OAuth2 Token Refresh & Rate Limiter Redis Integration',
                summary: 'Updated Section 2.1 to mandate Bearer JWT PKCE rotation and added Section 4.5 sliding-window rate limiting of 500 req/min.',
                hash: 'sha256:e3b0c44298fc1c14',
                fileSize: '2.4 MB PDF'
            },
            {
                version: 'v2.3.0',
                isLatest: false,
                date: '22 Sep 2026',
                author: 'Jenno Wilson',
                authorRole: 'Principal Architect',
                title: 'Telemetry & Latency Metric Capture Standard',
                summary: 'Standardized Prometheus scraping metrics and structured JSON logging format across all gateway endpoints.',
                hash: 'sha256:7f83b1657ff1fc53',
                fileSize: '2.1 MB PDF'
            },
            {
                version: 'v2.0.0',
                isLatest: false,
                date: '01 Sep 2026',
                author: 'Sarah Chen',
                authorRole: 'Tech Lead',
                title: 'Initial Production Architecture V2 Release',
                summary: 'Migrated monolithic routing into containerized microservice proxies with health check probes.',
                hash: 'sha256:1a84c98d66ab2144',
                fileSize: '1.9 MB PDF'
            }
        ]
    },
    {
        id: 'DOC-BRD-002',
        code: 'DOC-BRD-002',
        type: 'BRD',
        project: 'E-Commerce Platform',
        title: 'Payment Gateway Integration & Settlement Flow',
        description: 'Business requirements and compliance specifications for multi-vendor checkout, escrow settlement, and automated refund rules.',
        latestVersion: 'v1.1.0',
        author: 'Sophia Carter',
        authorRole: 'Business Analyst',
        authorAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80',
        updatedAt: '24 Sep 2026',
        status: 'In Review',
        fileName: 'BRD_Payment_Integration_v1.1.docx',
        fileSize: '1.1 MB DOCX',
        revisions: [
            {
                version: 'v1.1.0',
                isLatest: true,
                date: '24 Sep 2026',
                author: 'Sophia Carter',
                authorRole: 'Business Analyst',
                title: 'QRIS & Virtual Account Payment Gateway Specification',
                summary: 'Added webhook notification specifications for instant settlement and multi-bank VA generation.',
                hash: 'sha256:4b912ad8ef109922',
                fileSize: '1.1 MB DOCX'
            },
            {
                version: 'v1.0.0',
                isLatest: false,
                date: '10 Sep 2026',
                author: 'Sophia Carter',
                authorRole: 'Business Analyst',
                title: 'Initial Payment Workflow Draft',
                summary: 'Credit card 3D Secure verification and standard invoice checkout flow.',
                hash: 'sha256:1198fba4399bcca0',
                fileSize: '950 KB DOCX'
            }
        ]
    },
    {
        id: 'DOC-BRD-003',
        code: 'DOC-BRD-003',
        type: 'BRD',
        project: 'Middleware Project',
        title: 'User Auth & Role-Based Access Control (RBAC) Requirements',
        description: 'Business requirement specifications for enterprise Single Sign-On (SSO), MFA enforcement, and hierarchical access matrix.',
        latestVersion: 'v1.2.0',
        author: 'Michael Anderson',
        authorRole: 'Security Consultant',
        authorAvatar: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=100&q=80',
        updatedAt: '22 Sep 2026',
        status: 'Approved',
        fileName: 'BRD_User_Authentication_Flow.pdf',
        fileSize: '3.0 MB PDF',
        revisions: [
            {
                version: 'v1.2.0',
                isLatest: true,
                date: '22 Sep 2026',
                author: 'Michael Anderson',
                authorRole: 'Security Consultant',
                title: 'Mandatory TOTP Multi-Factor Authentication',
                summary: 'Introduced strict hardware/app authenticator requirement for SuperAdmin and Auditor privileges.',
                hash: 'sha256:77bc330911fe8811',
                fileSize: '3.0 MB PDF'
            },
            {
                version: 'v1.0.0',
                isLatest: false,
                date: '05 Sep 2026',
                author: 'Michael Anderson',
                authorRole: 'Security Consultant',
                title: 'Initial RBAC Matrix Baseline',
                summary: 'Standard 4-tier permission model and password policy requirements.',
                hash: 'sha256:88fa2b1077ee4411',
                fileSize: '2.5 MB PDF'
            }
        ]
    },
    {
        id: 'DOC-BRD-004',
        code: 'DOC-BRD-004',
        type: 'BRD',
        project: 'Core Enterprise',
        title: 'Initial Requirements Scope & Compliance Baseline',
        description: 'High-level business scope and regulatory compliance checklist for audit logging and data residency.',
        latestVersion: 'v0.9.0',
        author: 'Sophia Carter',
        authorRole: 'Business Analyst',
        authorAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80',
        updatedAt: '15 Sep 2026',
        status: 'Archived',
        fileName: 'BRD_Draft_Scope_Compliance.docx',
        fileSize: '900 KB DOCX',
        revisions: [
            {
                version: 'v0.9.0',
                isLatest: true,
                date: '15 Sep 2026',
                author: 'Sophia Carter',
                authorRole: 'Business Analyst',
                title: 'Pre-production Scope Archive',
                summary: 'Archived legacy project scope draft replaced by Modular BRD releases.',
                hash: 'sha256:22fa44bb88cc1100',
                fileSize: '900 KB DOCX'
            }
        ]
    },

    // ---------------------- FSD DOCUMENTS ----------------------
    {
        id: 'DOC-FSD-001',
        code: 'DOC-FSD-001',
        type: 'FSD',
        project: 'Syncboard Project',
        title: 'Task Management & State Machine Engine',
        description: 'Functional technical logic for Kanban drag-and-drop state transitions, concurrency locks, and real-time socket events.',
        latestVersion: 'v1.3.0',
        author: 'James Wilson',
        authorRole: 'Senior Frontend Engineer',
        authorAvatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=100&q=80',
        updatedAt: '20 Sep 2026',
        status: 'Approved',
        fileName: 'FSD_Task_Management_Module.pdf',
        fileSize: '1.8 MB PDF',
        revisions: [
            {
                version: 'v1.3.0',
                isLatest: true,
                date: '20 Sep 2026',
                author: 'James Wilson',
                authorRole: 'Senior Frontend Engineer',
                title: 'Optimistic UI Updates & Offline Fallback Queue',
                summary: 'Implemented instant drag feedback with local indexedDB sync and socket broadcast reconciliation.',
                hash: 'sha256:55ab22ee77889911',
                fileSize: '1.8 MB PDF'
            },
            {
                version: 'v1.0.0',
                isLatest: false,
                date: '02 Sep 2026',
                author: 'James Wilson',
                authorRole: 'Senior Frontend Engineer',
                title: 'Kanban Column State Machine Specification',
                summary: 'Defines valid state transitions from Backlog -> In Progress -> Review -> Done.',
                hash: 'sha256:33cd44ee99001122',
                fileSize: '1.5 MB PDF'
            }
        ]
    },
    {
        id: 'DOC-FSD-002',
        code: 'DOC-FSD-002',
        type: 'FSD',
        project: 'Middleware Project',
        title: 'JWT Authentication & Role-Based Access Control (RBAC)',
        description: 'Detailed functional specifications on token claims, expiration hooks, user permissions hierarchy, and SSO identity provider bridge.',
        latestVersion: 'v2.1.0',
        author: 'Alex Rivera',
        authorRole: 'Backend Lead',
        authorAvatar: 'https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=100&q=80',
        updatedAt: '28 Sep 2026',
        status: 'Approved',
        fileName: 'FSD_JWT_RBAC_Specification.pdf',
        fileSize: '1.8 MB PDF',
        revisions: [
            {
                version: 'v2.1.0',
                isLatest: true,
                date: '28 Sep 2026',
                author: 'Alex Rivera',
                authorRole: 'Backend Lead',
                title: 'Add Multi-Tenancy Department Claims into JWT Payload',
                summary: 'Extended JWT payload with department_id and org_slug for granular tenant data isolation and auditing.',
                hash: 'sha256:9c82b4a155ee2298',
                fileSize: '1.8 MB PDF'
            },
            {
                version: 'v2.0.0',
                isLatest: false,
                date: '10 Sep 2026',
                author: 'Alex Rivera',
                authorRole: 'Backend Lead',
                title: 'Initial Functional RBAC Specification',
                summary: 'Base role definitions for Admin, Developer, Viewer, and Auditor permission sets.',
                hash: 'sha256:4d76f8e219ba8800',
                fileSize: '1.5 MB PDF'
            }
        ]
    },
    {
        id: 'DOC-FSD-003',
        code: 'DOC-FSD-003',
        type: 'FSD',
        project: 'Middleware Project',
        title: 'Webhook Dispatcher & Exponential Backoff Engine',
        description: 'Functional specification for asynchronous outbound webhook dispatching with HMAC signature verification and jitter retry policy.',
        latestVersion: 'v1.0.0',
        author: 'Sarah Chen',
        authorRole: 'Tech Lead',
        authorAvatar: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=100&q=80',
        updatedAt: '18 Sep 2026',
        status: 'In Review',
        fileName: 'FSD_Webhook_Dispatcher.pdf',
        fileSize: '1.4 MB PDF',
        revisions: [
            {
                version: 'v1.0.0',
                isLatest: true,
                date: '18 Sep 2026',
                author: 'Sarah Chen',
                authorRole: 'Tech Lead',
                title: 'Initial Webhook Dispatch Architecture',
                summary: 'Standardized 5-stage exponential backoff with dead-letter queue (DLQ) dumping.',
                hash: 'sha256:66ba88cc44332211',
                fileSize: '1.4 MB PDF'
            }
        ]
    },

    // ---------------------- ERD DOCUMENTS ----------------------
    {
        id: 'DOC-ERD-004',
        code: 'DOC-ERD-004',
        type: 'ERD',
        project: 'Middleware Project',
        title: 'Master PostgreSQL Schema, Partitioning & Foreign Keys',
        description: 'Complete database entity relationship diagram, composite indexing schemes, TimescaleDB telemetry tables, and migration rules.',
        latestVersion: 'v3.0.1',
        author: 'Jenno Wilson',
        authorRole: 'Principal Architect',
        authorAvatar: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&q=80',
        updatedAt: '25 Sep 2026',
        status: 'Approved',
        fileName: 'ERD_PostgreSQL_Schema_v3.0.1.svg',
        fileSize: '4.2 MB SVG / PDF',
        revisions: [
            {
                version: 'v3.0.1',
                isLatest: true,
                date: '25 Sep 2026',
                author: 'Jenno Wilson',
                authorRole: 'Principal Architect',
                title: 'Partition tbl_middleware_logs by Monthly Range',
                summary: 'Implemented monthly declarative table partitioning on created_at timestamp for 4x query speedup on telemetry scans.',
                hash: 'sha256:65ea41b233bb9900',
                fileSize: '4.2 MB SVG / PDF'
            },
            {
                version: 'v3.0.0',
                isLatest: false,
                date: '05 Sep 2026',
                author: 'Jenno Wilson',
                authorRole: 'Principal Architect',
                title: 'Major PostgreSQL 16 Schema Baseline',
                summary: 'Complete rewrite of foreign keys with ON DELETE CASCADE rules and audit trigger functions.',
                hash: 'sha256:11bb77ff99aa3322',
                fileSize: '4.0 MB SVG'
            }
        ]
    },
    {
        id: 'DOC-ERD-002',
        code: 'DOC-ERD-002',
        type: 'ERD',
        project: 'E-Commerce Platform',
        title: 'Analytics Data Warehouse Star Schema & Fact Tables',
        description: 'Dimensional model for business intelligence, customer lifetime value (LTV) fact tables, and inventory turnover dimensions.',
        latestVersion: 'v1.2.0',
        author: 'David Kim',
        authorRole: 'Data Engineer',
        authorAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80',
        updatedAt: '21 Sep 2026',
        status: 'Approved',
        fileName: 'ERD_Analytics_Star_Schema.png',
        fileSize: '3.5 MB PNG',
        revisions: [
            {
                version: 'v1.2.0',
                isLatest: true,
                date: '21 Sep 2026',
                author: 'David Kim',
                authorRole: 'Data Engineer',
                title: 'Add Daily Cohort Retention Fact Table',
                summary: 'Optimized schema for fast cohort retention analysis across marketing campaign touchpoints.',
                hash: 'sha256:99bb88aa22334455',
                fileSize: '3.5 MB PNG'
            },
            {
                version: 'v1.0.0',
                isLatest: false,
                date: '08 Sep 2026',
                author: 'David Kim',
                authorRole: 'Data Engineer',
                title: 'Initial Star Schema Design',
                summary: 'Fact tables for sales orders and dimensions for product SKU, store branch, and customer.',
                hash: 'sha256:3344556677889900',
                fileSize: '3.1 MB PNG'
            }
        ]
    },

    // ---------------------- PRD DOCUMENTS ----------------------
    {
        id: 'DOC-PRD-003',
        code: 'DOC-PRD-003',
        type: 'PRD',
        project: 'Company Website',
        title: 'CMS Multi-Language & Technical Documentation Blog Engine',
        description: 'Product requirements for dynamic internationalization (i18n), SEO open-graph tags, and headless markdown publishing pipeline.',
        latestVersion: 'v1.5.0',
        author: 'Jessica Taylor',
        authorRole: 'Product Owner',
        authorAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80',
        updatedAt: '29 Sep 2026',
        status: 'Approved',
        fileName: 'PRD_CMS_Multilingual_Blog.docx',
        fileSize: '3.1 MB DOCX',
        revisions: [
            {
                version: 'v1.5.0',
                isLatest: true,
                date: '29 Sep 2026',
                author: 'Jessica Taylor',
                authorRole: 'Product Owner',
                title: 'Algolia Search Integration & Dark Mode Auto-Switch',
                summary: 'Added criteria for fuzzy text search indexing, keyboard shortcuts (Cmd+K), and OS theme detection.',
                hash: 'sha256:88fa2b1077ee4411',
                fileSize: '3.1 MB DOCX'
            },
            {
                version: 'v1.4.2',
                isLatest: false,
                date: '15 Sep 2026',
                author: 'Jessica Taylor',
                authorRole: 'Product Owner',
                title: 'Multilingual i18n URL Routing Specification',
                summary: 'Configured sub-path localization (/id/, /en/, /ja/) with fallback locales and automatic geo-redirects.',
                hash: 'sha256:32bb19ac44ff8899',
                fileSize: '2.8 MB PDF'
            }
        ]
    },
    {
        id: 'DOC-PRD-002',
        code: 'DOC-PRD-002',
        type: 'PRD',
        project: 'Syncboard Project',
        title: 'Real-time Collaborative Kanban & Sprint Planning Board',
        description: 'Product requirement roadmap for visual sprint columns, story estimation poker, and automated WIP limit guardrails.',
        latestVersion: 'v2.0.0',
        author: 'Jessica Taylor',
        authorRole: 'Product Owner',
        authorAvatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80',
        updatedAt: '27 Sep 2026',
        status: 'Approved',
        fileName: 'PRD_Syncboard_Kanban_v2.0.pdf',
        fileSize: '2.9 MB PDF',
        revisions: [
            {
                version: 'v2.0.0',
                isLatest: true,
                date: '27 Sep 2026',
                author: 'Jessica Taylor',
                authorRole: 'Product Owner',
                title: 'Epic Breakdown & Multi-Assignee Avatar Support',
                summary: 'Enabled subtask hierarchies and multi-member assignments with custom role tags.',
                hash: 'sha256:778899aabbccdde0',
                fileSize: '2.9 MB PDF'
            },
            {
                version: 'v1.0.0',
                isLatest: false,
                date: '01 Sep 2026',
                author: 'Jessica Taylor',
                authorRole: 'Product Owner',
                title: 'Initial Kanban Product Specification',
                summary: 'Standard board layout and simple drag-and-drop card features.',
                hash: 'sha256:1122334455667788',
                fileSize: '2.2 MB PDF'
            }
        ]
    },

    // ---------------------- BLUEPRINT DOCUMENTS ----------------------
    {
        id: 'DOC-BLU-005',
        code: 'DOC-BLU-005',
        type: 'Blueprint',
        project: 'Mobile CRM Application',
        title: 'AWS Cloud Infrastructure, Multi-AZ Kubernetes & VPC Topology',
        description: 'Network topology blueprints, AWS EKS cluster deployment diagrams, Cloudflare WAF routing, and Disaster Recovery multi-region failover.',
        latestVersion: 'v1.1.0',
        author: 'Marcus Vance',
        authorRole: 'DevOps Architect',
        authorAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80',
        updatedAt: '24 Sep 2026',
        status: 'Approved',
        fileName: 'Blueprint_AWS_MultiAZ_EKS.drawio.pdf',
        fileSize: '5.6 MB DrawIO / PDF',
        revisions: [
            {
                version: 'v1.1.0',
                isLatest: true,
                date: '24 Sep 2026',
                author: 'Marcus Vance',
                authorRole: 'DevOps Architect',
                title: 'Add Redis Cluster Sentinel & Read Replicas Topology',
                summary: 'High availability design with 3 master nodes and automatic failover sentinel quorum across eu-west-1a/b/c.',
                hash: 'sha256:55aa33dd88cc1100',
                fileSize: '5.6 MB DrawIO / PDF'
            },
            {
                version: 'v1.0.0',
                isLatest: false,
                date: '02 Sep 2026',
                author: 'Marcus Vance',
                authorRole: 'DevOps Architect',
                title: 'Initial Multi-AZ Cloud Architecture Blueprint',
                summary: 'VPC subnets, NAT gateways, ALB load balancers, and EC2 node groups configuration.',
                hash: 'sha256:8811cc4422bb9911',
                fileSize: '5.2 MB PDF'
            }
        ]
    },
    {
        id: 'DOC-BLU-002',
        code: 'DOC-BLU-002',
        type: 'Blueprint',
        project: 'Core Enterprise',
        title: 'CI/CD Automated Deployment Pipeline & Blue-Green Rollout',
        description: 'GitHub Actions workflow architecture, automated integration testing containers, ArgoCD GitOps sync, and canary traffic routing.',
        latestVersion: 'v1.0.0',
        author: 'Marcus Vance',
        authorRole: 'DevOps Architect',
        authorAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80',
        updatedAt: '19 Sep 2026',
        status: 'In Review',
        fileName: 'Blueprint_GitOps_ArgoCD_Pipeline.pdf',
        fileSize: '3.8 MB PDF',
        revisions: [
            {
                version: 'v1.0.0',
                isLatest: true,
                date: '19 Sep 2026',
                author: 'Marcus Vance',
                authorRole: 'DevOps Architect',
                title: 'Initial GitOps & Blue-Green Deployment Blueprint',
                summary: 'Defines canary threshold metrics and automated rollback triggers via Prometheus alerts.',
                hash: 'sha256:445566778899aabb',
                fileSize: '3.8 MB PDF'
            }
        ]
    }
];

/**
 * Main DocTracker Manager Object
 */
window.DocTracker = {
    /**
     * Get all documents from localStorage or initialize
     */
    getAllDocs: function () {
        try {
            const raw = localStorage.getItem(DOC_STORAGE_KEY);
            if (raw) {
                const parsed = JSON.parse(raw);
                if (Array.isArray(parsed) && parsed.length > 0) {
                    return parsed;
                }
            }
        } catch (e) {
            console.error('Error loading tracked docs from localStorage', e);
        }
        // Save initial default
        this.saveAllDocs(INITIAL_TRACKED_DOCS);
        return INITIAL_TRACKED_DOCS;
    },

    /**
     * Save all documents array to localStorage
     */
    saveAllDocs: function (docs) {
        try {
            localStorage.setItem(DOC_STORAGE_KEY, JSON.stringify(docs));
        } catch (e) {
            console.error('Error saving tracked docs to localStorage', e);
        }
    },

    /**
     * Get docs filtered by type: 'BRD', 'FSD', 'ERD', 'PRD', 'Blueprint'
     */
    getDocsByType: function (type) {
        const all = this.getAllDocs();
        if (!type || type.toLowerCase() === 'all') return all;
        return all.filter(d => d.type.toUpperCase() === type.toUpperCase());
    },

    /**
     * Get single doc by its code (e.g. DOC-BRD-001)
     */
    getDocByCode: function (code) {
        const all = this.getAllDocs();
        return all.find(d => d.code === code || d.id === code);
    },

    /**
     * Update doc metadata and optionally bump version
     */
    updateDoc: function (code, data, bumpInfo) {
        const all = this.getAllDocs();
        const docIndex = all.findIndex(d => d.code === code || d.id === code);
        if (docIndex === -1) return null;

        const doc = all[docIndex];

        // Update core metadata
        if (data.title) doc.title = data.title;
        if (data.project) doc.project = data.project;
        if (data.status) doc.status = data.status;
        if (data.description !== undefined) doc.description = data.description;
        if (data.author) doc.author = data.author;
        if (data.fileName) doc.fileName = data.fileName;

        const todayDate = 'Today, ' + new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        doc.updatedAt = todayDate;

        // If version bump is requested
        if (bumpInfo && bumpInfo.isBump) {
            const bumpType = bumpInfo.bumpType || 'patch'; // 'patch', 'minor', 'major'
            const prevVer = doc.latestVersion || 'v1.0.0';
            const cleanVer = prevVer.replace(/^v/i, '');
            const parts = cleanVer.split('.');
            let major = parseInt(parts[0]) || 1;
            let minor = parseInt(parts[1]) || 0;
            let patch = parseInt(parts[2]) || 0;

            if (bumpType === 'major') {
                major += 1;
                minor = 0;
                patch = 0;
            } else if (bumpType === 'minor') {
                minor += 1;
                patch = 0;
            } else {
                patch += 1;
            }

            const newVerTag = `v${major}.${minor}.${patch}`;

            // Mark previous revisions as archived
            if (Array.isArray(doc.revisions)) {
                doc.revisions.forEach(r => r.isLatest = false);
            } else {
                doc.revisions = [];
            }

            const newRevision = {
                version: newVerTag,
                isLatest: true,
                date: 'Today',
                author: bumpInfo.author || doc.author || 'Jenno Wilson',
                authorRole: bumpInfo.authorRole || 'Contributor',
                title: bumpInfo.title || `Release ${newVerTag} - Updated specifications`,
                summary: bumpInfo.changelog || 'Updated documentation specifications and revisions.',
                hash: 'sha256:' + Math.random().toString(16).substring(2, 18),
                fileSize: bumpInfo.fileSize || doc.fileSize || '2.4 MB PDF'
            };

            doc.revisions.unshift(newRevision);
            doc.latestVersion = newVerTag;
        }

        all[docIndex] = doc;
        this.saveAllDocs(all);
        return doc;
    },

    /**
     * Create new document entry
     */
    createDoc: function (newDoc) {
        const all = this.getAllDocs();
        const code = newDoc.code || `DOC-${newDoc.type.toUpperCase()}-${String(all.length + 1).padStart(3, '0')}`;
        const initialVer = newDoc.version || 'v1.0.0';
        
        const docObj = {
            id: code,
            code: code,
            type: newDoc.type || 'BRD',
            project: newDoc.project || 'Middleware Project',
            title: newDoc.title || 'Untitled Document',
            description: newDoc.description || 'No description provided.',
            latestVersion: initialVer,
            author: newDoc.author || 'Jenno Wilson',
            authorRole: 'Author',
            authorAvatar: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&q=80',
            updatedAt: 'Today',
            status: newDoc.status || 'In Review',
            fileName: newDoc.fileName || `${code}_${newDoc.title.replace(/\s+/g, '_')}_${initialVer}.pdf`,
            fileSize: newDoc.fileSize || '2.0 MB PDF',
            revisions: [
                {
                    version: initialVer,
                    isLatest: true,
                    date: 'Today',
                    author: newDoc.author || 'Jenno Wilson',
                    authorRole: 'Author',
                    title: `Initial baseline release (${initialVer})`,
                    summary: newDoc.description || 'Initial specification publication.',
                    hash: 'sha256:' + Math.random().toString(16).substring(2, 18),
                    fileSize: newDoc.fileSize || '2.0 MB PDF'
                }
            ]
        };

        all.unshift(docObj);
        this.saveAllDocs(all);
        return docObj;
    },

    /**
     * Delete document
     */
    deleteDoc: function (code) {
        let all = this.getAllDocs();
        all = all.filter(d => d.code !== code && d.id !== code);
        this.saveAllDocs(all);
        return true;
    },

    /**
     * Helper badge classes for status
     */
    getStatusBadge: function (status) {
        const s = (status || '').toLowerCase();
        if (s === 'approved') return '<span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 rounded-pill fs-8 d-inline-flex align-items-center gap-1.5 fw-semibold"><i class="fa-solid fa-circle-check"></i> Approved</span>';
        if (s === 'in review' || s === 'review') return '<span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle px-2.5 py-1 rounded-pill fs-8 d-inline-flex align-items-center gap-1.5 fw-semibold"><i class="fa-solid fa-hourglass-half"></i> In Review</span>';
        if (s === 'draft') return '<span class="badge bg-info-subtle text-info-emphasis border border-info-subtle px-2.5 py-1 rounded-pill fs-8 d-inline-flex align-items-center gap-1.5 fw-semibold"><i class="fa-solid fa-pencil"></i> Draft</span>';
        return '<span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2.5 py-1 rounded-pill fs-8 d-inline-flex align-items-center gap-1.5 fw-semibold"><i class="fa-solid fa-box-archive"></i> Archived</span>';
    },

    /**
     * Helper icon for file extension and doc type
     */
    getFileIcon: function (fileName, type) {
        const fn = (fileName || '').toLowerCase();
        const t = (type || '').toUpperCase();

        if (fn.endsWith('.pdf')) {
            return `
                <div class="doc-icon-box doc-icon-pdf shadow-xs" title="PDF Document">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>
            `;
        }
        if (fn.endsWith('.doc') || fn.endsWith('.docx')) {
            return `
                <div class="doc-icon-box doc-icon-word shadow-xs" title="Word Document">
                    <i class="fa-solid fa-file-word"></i>
                </div>
            `;
        }
        if (fn.endsWith('.svg') || fn.endsWith('.drawio') || fn.endsWith('.png') || t === 'ERD') {
            return `
                <div class="doc-icon-box doc-icon-diagram shadow-xs" title="Entity Diagram / Schema">
                    <i class="fa-solid fa-diagram-project"></i>
                </div>
            `;
        }
        if (t === 'FSD' || fn.endsWith('.json') || fn.endsWith('.js') || fn.endsWith('.ts')) {
            return `
                <div class="doc-icon-box doc-icon-code shadow-xs" title="Functional Specification / Code">
                    <i class="fa-solid fa-file-code"></i>
                </div>
            `;
        }
        if (t === 'BLUEPRINTS' || t === 'BLUEPRINT') {
            return `
                <div class="doc-icon-box doc-icon-blueprint shadow-xs" title="System Architecture / Blueprint">
                    <i class="fa-solid fa-cubes-stacked"></i>
                </div>
            `;
        }
        if (t === 'BRD') {
            return `
                <div class="doc-icon-box doc-icon-word shadow-xs" title="Business Requirements Document">
                    <i class="fa-solid fa-file-invoice"></i>
                </div>
            `;
        }
        if (t === 'PRD') {
            return `
                <div class="doc-icon-box doc-icon-default shadow-xs" title="Product Requirements Document">
                    <i class="fa-solid fa-rectangle-list"></i>
                </div>
            `;
        }
        return `
            <div class="doc-icon-box doc-icon-default shadow-xs" title="Document File">
                <i class="fa-solid fa-file-lines"></i>
            </div>
        `;
    },

    /**
     * Show live toast alert
     */
    showToast: function (message, type) {
        let toastEl = document.getElementById('docGlobalToast');
        if (!toastEl) {
            $('body').append(`
                <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1090;">
                    <div id="docGlobalToast" class="toast align-items-center text-bg-dark border-0 shadow-lg rounded-3" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body d-flex align-items-center gap-2 fs-7 py-2.5">
                                <i class="fa-solid fa-circle-check text-success fs-6" id="toastIcon"></i>
                                <span id="toastMessage">Action completed successfully.</span>
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            `);
            toastEl = document.getElementById('docGlobalToast');
        }

        $('#toastMessage').text(message);
        if (type === 'error') {
            $('#toastIcon').attr('class', 'fa-solid fa-circle-exclamation text-danger fs-6');
        } else if (type === 'info') {
            $('#toastIcon').attr('class', 'fa-solid fa-circle-info text-info fs-6');
        } else {
            $('#toastIcon').attr('class', 'fa-solid fa-circle-check text-success fs-6');
        }

        const toast = new bootstrap.Toast(toastEl, { delay: 3500 });
        toast.show();
    },

    /**
     * Calculate next semantic version tag
     */
    getNextVersionPreview: function (currentVer, bumpType) {
        const cleanVer = (currentVer || 'v1.0.0').replace(/^v/i, '');
        const parts = cleanVer.split('.');
        let major = parseInt(parts[0]) || 1;
        let minor = parseInt(parts[1]) || 0;
        let patch = parseInt(parts[2]) || 0;

        if (bumpType === 'major') return `v${major + 1}.0.0`;
        if (bumpType === 'minor') return `v${major}.${minor + 1}.0`;
        return `v${major}.${minor}.${patch + 1}`;
    }
};

/**
 * Initialize Document Master List UI (for BRD, FSD, ERD, PRD, Blueprints)
 */
window.initDocListPage = function (currentDocType) {
    const $tbody = $('tbody.fs-7');

    function renderTable() {
        const searchQuery = $('#docSearchInput').val() ? $('#docSearchInput').val().toLowerCase().trim() : '';
        const statusFilter = $('#docStatusFilter').val() || '';
        const sortFilter = $('#docSortFilter').val() || 'newest';

        let docs = DocTracker.getDocsByType(currentDocType);

        // Filter
        docs = docs.filter(doc => {
            const matchSearch = (
                !searchQuery ||
                doc.title.toLowerCase().includes(searchQuery) ||
                doc.code.toLowerCase().includes(searchQuery) ||
                doc.author.toLowerCase().includes(searchQuery) ||
                doc.fileName.toLowerCase().includes(searchQuery) ||
                doc.project.toLowerCase().includes(searchQuery)
            );
            const matchStatus = (
                !statusFilter ||
                doc.status.toLowerCase().replace(/\s+/g, '') === statusFilter.toLowerCase().replace(/\s+/g, '')
            );
            return matchSearch && matchStatus;
        });

        // Sort
        if (sortFilter === 'title') {
            docs.sort((a, b) => a.title.localeCompare(b.title));
        } else if (sortFilter === 'oldest') {
            // Keep original order
        } else {
            // Default newest
        }

        $tbody.empty();

        if (docs.length === 0) {
            $tbody.html(`
                <tr>
                    <td colspan="8" class="text-center py-5 text-muted">
                        <div class="mb-2"><i class="fa-regular fa-folder-open fs-2 text-secondary opacity-50"></i></div>
                        <span class="fw-semibold">No ${currentDocType} documents found matching your criteria.</span>
                        <div class="mt-2">
                            <button class="btn btn-sm btn-outline-primary" onclick="$('#docSearchInput').val(''); $('#docStatusFilter').val(''); window.refreshDocTable();">Reset Filters</button>
                        </div>
                    </td>
                </tr>
            `);
            $('#showingDocCount').text(`Showing 0 of 0 ${currentDocType} Documents`);
            return;
        }

        $('#showingDocCount').html(`Showing <strong>1-${docs.length}</strong> of <strong>${docs.length}</strong> ${currentDocType} Documents`);

        docs.forEach(doc => {
            const revCount = (doc.revisions && doc.revisions.length) ? doc.revisions.length : 1;
            const rowHtml = `
                <tr data-doc-code="${doc.code}">
                    <td class="ps-4">
                        <input class="form-check-input row-check" type="checkbox">
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            ${DocTracker.getFileIcon(doc.fileName, doc.type)}
                            <div>
                                <a href="javascript:void(0)" class="fw-bold text-dark text-decoration-none d-block hover-primary btn-open-detail" data-code="${doc.code}">
                                    ${doc.title}
                                </a>
                                <div class="d-flex flex-wrap align-items-center gap-2 mt-1">
                                    <span class="badge bg-light text-muted border font-mono fs-9 px-2 py-0.5 rounded-2"><i class="fa-solid fa-hashtag me-1 opacity-50"></i>${doc.code}</span>
                                    <span class="text-secondary fs-8 d-inline-flex align-items-center gap-1"><i class="fa-regular fa-file text-muted fs-9"></i> ${doc.fileName}</span>
                                    <span class="badge bg-indigo-subtle text-indigo fs-9 px-2 py-0.5 rounded-2"><i class="fa-solid fa-layer-group me-1"></i>${doc.project}</span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <span class="badge bg-dark bg-gradient text-white font-mono fs-8 px-2 py-1 rounded-2 shadow-xs d-inline-flex align-items-center gap-1 w-fit">
                                <i class="fa-solid fa-code-branch fs-9 text-info"></i> ${doc.latestVersion}
                            </span>
                            <a href="TrackingVersion.php?doc=${doc.code}" class="text-decoration-none fs-8 text-primary fw-medium d-inline-flex align-items-center gap-1 mt-1 hover-underline" title="View Version Trail">
                                <i class="fa-solid fa-clock-rotate-left fs-9"></i> ${revCount} Revision${revCount > 1 ? 's' : ''}
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2.5">
                            <img src="${doc.authorAvatar}" alt="${doc.author}" class="avatar-sm rounded-circle border border-2 border-white shadow-xs">
                            <div>
                                <span class="fw-bold text-dark d-block lh-1 fs-7">${doc.author}</span>
                                <span class="text-muted fs-8 d-flex align-items-center gap-1 mt-0.5">
                                    <i class="fa-regular fa-circle-dot text-secondary fs-9 opacity-50"></i> ${doc.authorRole || 'Contributor'}
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-1.5 text-secondary fs-8">
                            <i class="fa-solid fa-hard-drive text-muted fs-9"></i>
                            <span class="font-mono">${doc.fileSize}</span>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-1.5 text-secondary fs-8">
                            <i class="fa-regular fa-clock text-muted fs-9"></i>
                            <span>${doc.updatedAt}</span>
                        </div>
                    </td>
                    <td>
                        ${DocTracker.getStatusBadge(doc.status)}
                    </td>
                    <td class="pe-4 text-end">
                        <div class="doc-action-group">
                            <button type="button" class="btn btn-sm btn-icon-action btn-view-doc btn-open-detail" data-code="${doc.code}" data-bs-toggle="tooltip" data-bs-title="View Detail & Metadata" title="View Detail & Metadata">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-icon-action btn-edit-doc btn-open-edit" data-code="${doc.code}" data-bs-toggle="tooltip" data-bs-title="Edit & Bump Version" title="Edit & Bump Version">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <a href="TrackingVersion.php?doc=${doc.code}" class="btn btn-sm btn-icon-action btn-track-doc" data-bs-toggle="tooltip" data-bs-title="Track Versioning Trail" title="Track Versioning Trail">
                                <i class="fa-solid fa-timeline"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-icon-action btn-download-doc" data-code="${doc.code}" data-bs-toggle="tooltip" data-bs-title="Download Document" title="Download Document">
                                <i class="fa-solid fa-download"></i>
                            </button>
                            
                            <div class="dropdown d-inline-block">
                                <button class="btn btn-sm btn-icon-action btn-more-doc" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="More Options">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 fs-7 py-1.5">
                                    <li>
                                        <a class="dropdown-item btn-open-detail d-flex align-items-center gap-2 py-2" href="javascript:void(0)" data-code="${doc.code}">
                                            <i class="fa-regular fa-eye text-primary" style="width: 16px;"></i>
                                            <span>Detail & Metadata</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item btn-open-edit d-flex align-items-center gap-2 py-2" href="javascript:void(0)" data-code="${doc.code}">
                                            <i class="fa-solid fa-pen-to-square text-indigo" style="width: 16px;"></i>
                                            <span>Edit & Bump Version</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="TrackingVersion.php?doc=${doc.code}">
                                            <i class="fa-solid fa-timeline text-success" style="width: 16px;"></i>
                                            <span>View in Track Versioning</span>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <a class="dropdown-item btn-download-doc d-flex align-items-center gap-2 py-2" href="javascript:void(0)" data-code="${doc.code}">
                                            <i class="fa-solid fa-download text-secondary" style="width: 16px;"></i>
                                            <span>Download Spec File</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item btn-delete-doc d-flex align-items-center gap-2 py-2 text-danger" href="javascript:void(0)" data-code="${doc.code}">
                                            <i class="fa-solid fa-trash-can" style="width: 16px;"></i>
                                            <span>Delete Document</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
            `;
            $tbody.append(rowHtml);
        });

        // Initialize Bootstrap tooltips
        try {
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            [...tooltipTriggerList].forEach(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        } catch (e) {}
    }

    window.refreshDocTable = renderTable;

    // Filters event listeners
    $('#docSearchInput').on('input', renderTable);
    $('#docStatusFilter').on('change', renderTable);
    $('#docSortFilter').on('change', renderTable);

    // Initial render
    renderTable();

    // Event: Open Detail Modal
    $(document).on('click', '.btn-open-detail', function (e) {
        e.preventDefault();
        const code = $(this).data('code');
        openDetailModal(code);
    });

    // Event: Open Edit Modal
    $(document).on('click', '.btn-open-edit', function (e) {
        e.preventDefault();
        const code = $(this).data('code');
        openEditModal(code);
    });

    // Event: Download mock
    $(document).on('click', '.btn-download-doc', function (e) {
        e.preventDefault();
        const code = $(this).data('code');
        const doc = DocTracker.getDocByCode(code);
        DocTracker.showToast(`Downloading signed specification archive for ${doc.title} (${doc.latestVersion})...`);
    });

    // Event: Delete doc
    $(document).on('click', '.btn-delete-doc', function (e) {
        e.preventDefault();
        const code = $(this).data('code');
        const doc = DocTracker.getDocByCode(code);
        if (confirm(`Are you sure you want to delete "${doc.title}" (${doc.code})?`)) {
            DocTracker.deleteDoc(code);
            renderTable();
            DocTracker.showToast(`Deleted document ${code}.`, 'info');
        }
    });

    // Setup Modals Logic
    setupDetailAndEditModals(currentDocType);
};

/**
 * Setup and bind Detail & Edit Modal functionality
 */
function setupDetailAndEditModals(docType) {
    // Check if Detail Modal exists in DOM, otherwise inject it
    if ($('#modalDocDetail').length === 0) {
        $('body').append(`
            <!-- Document Detail Modal -->
            <div class="modal fade" id="modalDocDetail" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
                        <div class="modal-header bg-light border-bottom p-4">
                            <div class="d-flex align-items-center gap-3">
                                <div id="detailTypeBadge" class="p-3 bg-primary text-white rounded-3 fs-5 fw-bold font-mono">
                                    BRD
                                </div>
                                <div>
                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                        <h5 class="modal-title fw-bold text-dark mb-0" id="detailModalTitle">Document Title</h5>
                                        <span class="badge bg-dark font-mono fs-8" id="detailModalVersion">v1.0.0</span>
                                        <span id="detailModalStatusBadge"></span>
                                    </div>
                                    <span class="text-muted fs-8" id="detailModalSubtitle">Document Code &bull; Project</span>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                            <!-- Metadata grid -->
                            <div class="row g-3 mb-4">
                                <div class="col-sm-6 col-md-3">
                                    <div class="p-3 bg-light rounded-3 border">
                                        <span class="text-muted fs-8 d-block mb-1"><i class="fa-solid fa-code me-1 text-primary"></i> Doc Code</span>
                                        <span class="fw-bold font-mono text-dark fs-7" id="detailCode">DOC-BRD-001</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="p-3 bg-light rounded-3 border">
                                        <span class="text-muted fs-8 d-block mb-1"><i class="fa-solid fa-diagram-project me-1 text-success"></i> Project</span>
                                        <span class="fw-bold text-dark fs-7 text-truncate d-block" id="detailProject">Middleware</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="p-3 bg-light rounded-3 border">
                                        <span class="text-muted fs-8 d-block mb-1"><i class="fa-solid fa-user-pen me-1 text-indigo"></i> Author</span>
                                        <span class="fw-bold text-dark fs-7 text-truncate d-block" id="detailAuthor">Sarah Chen</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="p-3 bg-light rounded-3 border">
                                        <span class="text-muted fs-8 d-block mb-1"><i class="fa-regular fa-clock me-1 text-warning"></i> Updated</span>
                                        <span class="fw-bold text-dark fs-7" id="detailUpdatedAt">Today</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Document Description -->
                            <div class="mb-4">
                                <label class="form-label fs-7 fw-bold text-uppercase text-muted mb-2">Scope & Overview Description</label>
                                <div class="p-3 bg-light-subtle rounded-3 border fs-7 text-secondary lh-base" id="detailDescription">
                                    Document description text...
                                </div>
                            </div>

                            <!-- Latest Revision & Version Summary -->
                            <div class="mb-4">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <label class="form-label fs-7 fw-bold text-uppercase text-muted mb-0">Active Baseline Version Details</label>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle fs-9"><i class="fa-solid fa-circle-check me-1"></i> Current Active</span>
                                </div>
                                <div class="p-3 border rounded-3 bg-white shadow-xs">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-dark font-mono fs-8" id="detailRevVersion">v2.4.0</span>
                                            <span class="fw-bold text-dark fs-7" id="detailRevTitle">Release Title</span>
                                        </div>
                                        <span class="text-muted fs-8 font-mono" id="detailRevHash"><i class="fa-solid fa-fingerprint me-1"></i>sha256:...</span>
                                    </div>
                                    <p class="text-muted fs-8 mb-2" id="detailRevSummary">Changelog notes...</p>
                                    <div class="d-flex align-items-center justify-content-between pt-2 border-top fs-8 text-muted">
                                        <span><i class="fa-regular fa-file-lines me-1"></i> File: <strong id="detailFileName">file.pdf</strong> (<span id="detailFileSize">2.4 MB</span>)</span>
                                        <span id="detailRevMeta">By Sarah Chen &bull; 30 Sep 2026</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Versioning Link Banner -->
                            <div class="card border-primary border-opacity-25 bg-primary bg-opacity-10 rounded-3 p-3">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="fa-solid fa-timeline text-primary fs-4"></i>
                                        <div>
                                            <span class="fw-bold text-dark fs-7 d-block">Track Versioning Integration</span>
                                            <span class="text-muted fs-8" id="detailRevisionsCount">3 historical versions recorded in Track Versioning matrix.</span>
                                        </div>
                                    </div>
                                    <a href="#" id="detailBtnGoTracking" class="btn btn-primary btn-sm px-3 py-1.5 fw-semibold rounded-2">
                                        <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Buka di Track Versioning
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light border-top p-3 d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary fs-7 px-3" data-bs-dismiss="modal">Close</button>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-outline-primary fs-7 px-3" id="detailBtnDownload">
                                    <i class="fa-solid fa-download me-1"></i> Download Asset
                                </button>
                                <button type="button" class="btn btn-primary fs-7 px-3 fw-semibold" id="detailBtnEdit">
                                    <i class="fa-solid fa-pen-to-square me-1"></i> Edit & Bump Version
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `);
    }

    // Check if Edit Modal exists in DOM, otherwise inject it
    if ($('#modalDocEdit').length === 0) {
        $('body').append(`
            <!-- Document Edit & Version Bump Modal -->
            <div class="modal fade" id="modalDocEdit" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
                        <div class="modal-header bg-light border-bottom p-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="p-3 bg-indigo text-white rounded-3 fs-5" style="background: linear-gradient(135deg, #4f46e5, #7c3aed);">
                                    <i class="fa-solid fa-pen-ruler"></i>
                                </div>
                                <div>
                                    <h5 class="modal-title fw-bold text-dark mb-0">Edit Document & Versioning</h5>
                                    <span class="text-muted fs-8">Perbarui spesifikasi dokumen atau release versi baru ke Track Versioning</span>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="formDocEdit">
                            <input type="hidden" id="editDocCode" name="docCode">
                            <div class="modal-body p-4">
                                <!-- Base Document Info -->
                                <div class="row g-3 mb-3">
                                    <div class="col-md-8">
                                        <label class="form-label fs-7 fw-semibold">Document Title *</label>
                                        <input type="text" class="form-control fs-7" id="editDocTitle" required placeholder="e.g. Core Architecture & API Gateway Specifications">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fs-7 fw-semibold">Document Code</label>
                                        <input type="text" class="form-control fs-7 font-mono bg-light" id="editDocCodeDisplay" readonly>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fs-7 fw-semibold">Project Scope *</label>
                                        <select class="form-select fs-7" id="editDocProject" required>
                                            <option value="Middleware Project">Middleware Project</option>
                                            <option value="Syncboard Project">Syncboard Project</option>
                                            <option value="E-Commerce Platform">E-Commerce Platform</option>
                                            <option value="Company Website">Company Website</option>
                                            <option value="Mobile CRM Application">Mobile CRM Application</option>
                                            <option value="Core Enterprise">Core Enterprise</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fs-7 fw-semibold">Approval Status</label>
                                        <select class="form-select fs-7" id="editDocStatus">
                                            <option value="Approved">Approved</option>
                                            <option value="In Review">In Review</option>
                                            <option value="Draft">Draft</option>
                                            <option value="Archived">Archived</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fs-7 fw-semibold">Document Scope & Description</label>
                                    <textarea class="form-control fs-7" rows="3" id="editDocDescription" placeholder="Ringkasan ruang lingkup atau perubahan bisnis..."></textarea>
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label fs-7 fw-semibold">Author Name</label>
                                        <input type="text" class="form-control fs-7" id="editDocAuthor" placeholder="Jenno Wilson">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fs-7 fw-semibold">Replace File Specification (Optional)</label>
                                        <input type="file" class="form-control fs-7" id="editDocFile">
                                    </div>
                                </div>

                                <!-- Version Bump Box Accordion / Toggle -->
                                <div class="card border rounded-3 p-3 bg-light-subtle">
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input cursor-pointer" type="checkbox" role="switch" id="toggleVersionBump" checked>
                                        <label class="form-check-label fw-bold text-dark fs-7 cursor-pointer" for="toggleVersionBump">
                                            <i class="fa-solid fa-code-branch text-primary me-1"></i> Release Versi Baru (Version Bump & Catat ke Track Versioning)
                                        </label>
                                    </div>
                                    <p class="text-muted fs-8 mb-3">
                                        Mengaktifkan opsi ini akan membuat entri rilis versi baru dengan changelog yang langsung terdata di timeline <strong>Track Versioning</strong>.
                                    </p>

                                    <div id="versionBumpFields">
                                        <div class="row g-3 mb-3">
                                            <div class="col-12">
                                                <label class="form-label fs-8 fw-bold text-uppercase text-muted">Pilih Kenaikan Versi (Semantic Versioning)</label>
                                                <div class="d-flex gap-3 flex-wrap">
                                                    <div class="form-check border rounded-3 p-2 px-3 bg-white flex-grow-1">
                                                        <input class="form-check-input" type="radio" name="editBumpType" id="bumpPatch" value="patch" checked>
                                                        <label class="form-check-label fs-8 cursor-pointer" for="bumpPatch">
                                                            <strong class="d-block text-dark">Patch (+0.0.1)</strong>
                                                            <span class="text-muted fs-9" id="previewPatch">Bugfix / Minor Text</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check border rounded-3 p-2 px-3 bg-white flex-grow-1">
                                                        <input class="form-check-input" type="radio" name="editBumpType" id="bumpMinor" value="minor">
                                                        <label class="form-check-label fs-8 cursor-pointer" for="bumpMinor">
                                                            <strong class="d-block text-dark">Minor (+0.1.0)</strong>
                                                            <span class="text-muted fs-9" id="previewMinor">Fitur / Sub-Section Baru</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check border rounded-3 p-2 px-3 bg-white flex-grow-1">
                                                        <input class="form-check-input" type="radio" name="editBumpType" id="bumpMajor" value="major">
                                                        <label class="form-check-label fs-8 cursor-pointer" for="bumpMajor">
                                                            <strong class="d-block text-dark">Major (+1.0.0)</strong>
                                                            <span class="text-muted fs-9" id="previewMajor">Perubahan Arsitektur Masif</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fs-7 fw-semibold">Judul Rilis Versi *</label>
                                            <input type="text" class="form-control fs-7" id="editVersionTitle" placeholder="e.g. Update Section 4 Security & Redis Rate Limiting">
                                        </div>

                                        <div class="mb-0">
                                            <label class="form-label fs-7 fw-semibold">Catatan Changelog / Release Summary *</label>
                                            <textarea class="form-control fs-7 font-mono" rows="3" id="editChangelog" placeholder="Jelaskan butir perubahan revisi dokumen ini..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer bg-light border-top p-3 d-flex justify-content-between">
                                <button type="button" class="btn btn-outline-secondary fs-7 px-3" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary fs-7 px-4 fw-semibold">
                                    <i class="fa-solid fa-floppy-disk me-1"></i> Simpan & Update Versi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        `);
    }

    // Toggle Version bump fields
    $(document).on('change', '#toggleVersionBump', function () {
        if ($(this).is(':checked')) {
            $('#versionBumpFields').slideDown(200);
        } else {
            $('#versionBumpFields').slideUp(200);
        }
    });

    // Handle Form Submit: Edit Document
    $(document).on('submit', '#formDocEdit', function (e) {
        e.preventDefault();

        const code = $('#editDocCode').val();
        const title = $('#editDocTitle').val();
        const project = $('#editDocProject').val();
        const status = $('#editDocStatus').val();
        const description = $('#editDocDescription').val();
        const author = $('#editDocAuthor').val() || 'Jenno Wilson';

        const isBump = $('#toggleVersionBump').is(':checked');
        let bumpInfo = null;

        if (isBump) {
            const bumpType = $('input[name="editBumpType"]:checked').val() || 'patch';
            const versionTitle = $('#editVersionTitle').val() || `Revisi Rilis ${title}`;
            const changelog = $('#editChangelog').val() || 'Pembaruan spesifikasi dan penyesuaian fungsional.';

            bumpInfo = {
                isBump: true,
                bumpType: bumpType,
                title: versionTitle,
                changelog: changelog,
                author: author,
                authorRole: 'Editor / Contributor'
            };
        }

        const updated = DocTracker.updateDoc(code, {
            title: title,
            project: project,
            status: status,
            description: description,
            author: author
        }, bumpInfo);

        if (updated) {
            $('#modalDocEdit').modal('hide');
            if (typeof window.refreshDocTable === 'function') {
                window.refreshDocTable();
            }
            if (isBump) {
                DocTracker.showToast(`Dokumen ${code} berhasil diperbarui ke ${updated.latestVersion} dan dicatat di Track Versioning!`);
            } else {
                DocTracker.showToast(`Metadata dokumen ${code} berhasil diperbarui.`);
            }
        }
    });

    // Handle Form Submit: Upload New Document Modal (if exists)
    $(document).on('submit', '#uploadDocModal form', function (e) {
        e.preventDefault();

        const title = $(this).find('input[type="text"]').first().val();
        const version = $(this).find('input[placeholder="v1.0"]').val() || 'v1.0.0';
        const statusVal = $(this).find('select').val() || 'review';
        let status = 'In Review';
        if (statusVal === 'approved') status = 'Approved';
        if (statusVal === 'draft') status = 'Draft';

        const desc = $(this).find('textarea').val() || 'Dokumen spesifikasi baru.';

        const newDoc = DocTracker.createDoc({
            type: docType,
            title: title,
            version: version.startsWith('v') ? version : 'v' + version,
            status: status,
            description: desc,
            author: 'Jenno Wilson'
        });

        $('#uploadDocModal').modal('hide');
        this.reset();
        if (typeof window.refreshDocTable === 'function') {
            window.refreshDocTable();
        }
        DocTracker.showToast(`Berhasil menambahkan ${docType} baru: ${newDoc.code} (${newDoc.latestVersion})!`);
    });
}

/**
 * Open and fill the Detail Modal
 */
function openDetailModal(code) {
    const doc = DocTracker.getDocByCode(code);
    if (!doc) return;

    $('#detailTypeBadge').text(doc.type);
    $('#detailModalTitle').text(doc.title);
    $('#detailModalVersion').text(doc.latestVersion);
    $('#detailModalStatusBadge').html(DocTracker.getStatusBadge(doc.status));
    $('#detailModalSubtitle').html(`${doc.code} &bull; <span class="fw-semibold text-dark">${doc.project}</span>`);

    $('#detailCode').text(doc.code);
    $('#detailProject').text(doc.project);
    $('#detailAuthor').text(doc.author);
    $('#detailUpdatedAt').text(doc.updatedAt);
    $('#detailDescription').text(doc.description || 'Tidak ada ringkasan deskripsi.');

    const rev = (doc.revisions && doc.revisions.length > 0) ? doc.revisions[0] : {
        version: doc.latestVersion,
        title: 'Initial Release',
        summary: doc.description,
        hash: 'sha256:default',
        author: doc.author,
        date: doc.updatedAt
    };

    $('#detailRevVersion').text(rev.version);
    $('#detailRevTitle').text(rev.title || 'Baseline Release');
    $('#detailRevHash').html(`<i class="fa-solid fa-fingerprint me-1"></i>${rev.hash || 'sha256:e3b0c442'}`);
    $('#detailRevSummary').text(rev.summary || doc.description);
    $('#detailFileName').text(doc.fileName || `${doc.code}.pdf`);
    $('#detailFileSize').text(doc.fileSize || '2.4 MB');
    $('#detailRevMeta').html(`By <strong>${rev.author}</strong> &bull; ${rev.date}`);

    const revCount = (doc.revisions && doc.revisions.length) ? doc.revisions.length : 1;
    $('#detailRevisionsCount').text(`${revCount} histori rilis revisi tersinkronisasi di modul Track Versioning.`);

    $('#detailBtnGoTracking').attr('href', `TrackingVersion.php?doc=${doc.code}`);

    $('#detailBtnDownload').off('click').on('click', function () {
        DocTracker.showToast(`Mengunduh berkas ${doc.fileName} (${doc.latestVersion})...`);
    });

    $('#detailBtnEdit').off('click').on('click', function () {
        $('#modalDocDetail').modal('hide');
        setTimeout(() => {
            openEditModal(doc.code);
        }, 300);
    });

    const modal = new bootstrap.Modal(document.getElementById('modalDocDetail'));
    modal.show();
}

/**
 * Open and fill the Edit Modal
 */
function openEditModal(code) {
    const doc = DocTracker.getDocByCode(code);
    if (!doc) return;

    $('#editDocCode').val(doc.code);
    $('#editDocCodeDisplay').val(doc.code);
    $('#editDocTitle').val(doc.title);
    $('#editDocProject').val(doc.project);
    $('#editDocStatus').val(doc.status);
    $('#editDocDescription').val(doc.description);
    $('#editDocAuthor').val(doc.author);

    // Version Bump fields prefill
    $('#toggleVersionBump').prop('checked', true);
    $('#versionBumpFields').show();

    $('#bumpPatch').prop('checked', true);
    $('#editVersionTitle').val(`Update & Enhancement Specification`);
    $('#editChangelog').val(`Menyesuaikan modul ${doc.title} berdasarkan evaluasi arsitektur terbaru.`);

    // Update semantic previews
    const curVer = doc.latestVersion || 'v1.0.0';
    $('#previewPatch').text(`-> ${DocTracker.getNextVersionPreview(curVer, 'patch')} (Minor fix)`);
    $('#previewMinor').text(`-> ${DocTracker.getNextVersionPreview(curVer, 'minor')} (New sub-feature)`);
    $('#previewMajor').text(`-> ${DocTracker.getNextVersionPreview(curVer, 'major')} (Breaking redesign)`);

    const modal = new bootstrap.Modal(document.getElementById('modalDocEdit'));
    modal.show();
}
