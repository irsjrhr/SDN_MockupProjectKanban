<?php
/**
 * ==============================================================================
 * UNIFIED PROJECT DOMAIN SELECTOR BAR FOR MONITORING MODULE
 * Location: /Monitoring/_domain_selector.php
 * ==============================================================================
 * Displays the project domain switcher and active status indicators.
 */
?>
<div class="card shadow-sm border-0 rounded-4 bg-white mb-4 overflow-hidden">
    <div class="p-3 bg-light-subtle border-bottom d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-3 p-2 bg-primary-subtle text-primary d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="fa-solid fa-network-wired fs-5"></i>
            </div>
            <div>
                <span class="fs-8 text-uppercase fw-bold text-muted d-block">Target Scope & Domain Context</span>
                <span id="currentActiveDomainBadge" class="fs-7 fw-bold text-dark">
                    <i class="fa-solid fa-globe text-primary me-1"></i> All Project Domains (Aggregate)
                </span>
            </div>
        </div>

        <div class="d-flex flex-wrap align-items-center gap-2 ms-auto">
            <label for="projectDomainSelect" class="fs-8 fw-bold text-muted mb-0 d-none d-md-inline">Select Project Domain:</label>
            <div class="input-group input-group-sm" style="min-width: 280px; max-width: 380px;">
                <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-link"></i></span>
                <select id="projectDomainSelect" class="form-select form-select-sm border-start-0 ps-0 fw-semibold">
                    <option value="all" selected>🌐 All Project Domains (Aggregate View)</option>
                    <option value="api-core">🔗 api-core.enterprise.internal (Middleware Project)</option>
                    <option value="company-org">🔗 company.org (Company Website)</option>
                    <option value="promo-campaign">🔗 promo.campaign.io (Landing Campaign)</option>
                    <option value="api-mobile">🔗 api-mobile.enterprise.internal (Mobile CRM App)</option>
                    <option value="telemetry-hub">🔗 telemetry-hub.internal (Analytics Tool)</option>
                </select>
            </div>

            <button type="button" id="btnScanAllSsl" class="btn btn-sm btn-outline-primary rounded-3 px-3 fw-semibold d-flex align-items-center gap-1.5">
                <i class="fa-solid fa-shield-halved"></i> Scan All SSL
            </button>
        </div>
    </div>
</div>
