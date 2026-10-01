/**
 * ==============================================================================
 * SYNCBOARD - PROJECT DOMAIN MONITORING ENGINE
 * Location: /assets/js/monitoring.js
 * ==============================================================================
 * Real-time telemetry, domain switching, SSL verification scanner,
 * latency ping test, and traffic stream simulation.
 */

$(document).ready(function () {
    // 1. Read URL domain parameter if present
    const urlParams = new URLSearchParams(window.location.search);
    const activeDomainParam = urlParams.get('domain') || 'all';

    // 2. Initialize Project Domain Selector
    const $domainSelector = $('#projectDomainSelect');
    if ($domainSelector.length) {
        $domainSelector.val(activeDomainParam);
        filterMonitoringByDomain(activeDomainParam);

        $domainSelector.on('change', function () {
            const selectedDomain = $(this).val();
            // Update URL without full reload if on the same page
            const currentUrl = new URL(window.location.href);
            if (selectedDomain === 'all') {
                currentUrl.searchParams.delete('domain');
            } else {
                currentUrl.searchParams.set('domain', selectedDomain);
            }
            window.history.replaceState({}, '', currentUrl);
            filterMonitoringByDomain(selectedDomain);
        });
    }

    // 3. Filter Table Rows & Cards by Selected Domain
    function filterMonitoringByDomain(domainKey) {
        if (!domainKey || domainKey === 'all') {
            $('[data-domain-item]').fadeIn(200);
            $('[data-domain-card]').fadeIn(200);
            $('#currentActiveDomainBadge').html('<i class="fa-solid fa-globe text-primary me-1"></i> All Project Domains (Aggregate)');
            $('#activeDomainCounter').text($('[data-domain-item]').length || '5');
        } else {
            $('[data-domain-item]').each(function () {
                const itemDomain = $(this).data('domain-item');
                if (itemDomain === domainKey) {
                    $(this).fadeIn(200);
                } else {
                    $(this).fadeOut(100);
                }
            });

            $('[data-domain-card]').each(function () {
                const cardDomain = $(this).data('domain-card');
                if (cardDomain === domainKey) {
                    $(this).fadeIn(200);
                } else {
                    $(this).fadeOut(100);
                }
            });

            const domainLabel = $domainSelector.find('option:selected').text();
            $('#currentActiveDomainBadge').html('<i class="fa-solid fa-bullseye text-success me-1"></i> ' + domainLabel);
            $('#activeDomainCounter').text('1');
        }
    }

    // 4. Quick Live Ping Test Simulation
    $(document).on('click', '.btn-ping-domain', function (e) {
        e.preventDefault();
        const $btn = $(this);
        const domain = $btn.data('domain') || 'Selected Domain';
        const $badge = $btn.closest('tr, .domain-card').find('.ping-latency-badge');

        const originalHtml = $btn.html();
        $btn.prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin"></i>');

        setTimeout(function () {
            const simulatedLatency = Math.floor(Math.random() * 25) + 15; // 15ms - 40ms
            if ($badge.length) {
                $badge.removeClass('bg-warning-subtle text-warning bg-danger-subtle text-danger')
                      .addClass('bg-success-subtle text-success')
                      .html('<i class="fa-solid fa-bolt me-1"></i> ' + simulatedLatency + 'ms (200 OK)');
            }
            $btn.prop('disabled', false).html(originalHtml);

            showMonitoringToast('Ping Successful', `<strong>${domain}</strong> responded in <strong>${simulatedLatency}ms</strong> with HTTP 200 OK.`);
        }, 600);
    });

    // 5. Scan All SSL Certificates Simulation
    $('#btnScanAllSsl').on('click', function () {
        const $btn = $(this);
        const originalHtml = $btn.html();
        $btn.prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin me-1"></i> Scanning SSL...');

        let count = 0;
        const total = 5;
        const interval = setInterval(function () {
            count++;
            if (count >= total) {
                clearInterval(interval);
                $btn.prop('disabled', false).html(originalHtml);
                showMonitoringToast('SSL Scan Complete', 'All 5 Project Domains verified. 100% TLS 1.3 certificates valid with auto-renewal enabled.');
            }
        }, 300);
    });

    // 6. View Certificate Details Modal Handler
    $(document).on('click', '.btn-view-cert', function (e) {
        e.preventDefault();
        const domain = $(this).data('domain') || 'api-core.enterprise.internal';
        const issuer = $(this).data('issuer') || "Let's Encrypt Authority X3";
        const expiry = $(this).data('expiry') || '82 Days Remaining';
        const tls = $(this).data('tls') || 'TLS 1.3 (RFC 8446)';
        const project = $(this).data('project') || 'Middleware Project';
        const san = $(this).data('san') || `${domain}, *.${domain}`;

        $('#certModalDomainTitle').text(domain);
        $('#certModalProject').text(project);
        $('#certModalIssuer').text(issuer);
        $('#certModalExpiry').text(expiry);
        $('#certModalTls').text(tls);
        $('#certModalSan').text(san);

        const modal = new bootstrap.Modal(document.getElementById('certDetailsModal'));
        modal.show();
    });

    // 7. Toast Notification Helper
    function showMonitoringToast(title, message) {
        let $container = $('#monitoringToastContainer');
        if (!$container.length) {
            $('body').append(`
                <div id="monitoringToastContainer" class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1100;"></div>
            `);
            $container = $('#monitoringToastContainer');
        }

        const toastId = 'toast_' + Date.now();
        const toastHtml = `
            <div id="${toastId}" class="toast align-items-center border-0 shadow-lg bg-white rounded-3 overflow-hidden" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-primary text-white py-2">
                    <i class="fa-solid fa-shield-halved me-2"></i>
                    <strong class="me-auto fs-7">${title}</strong>
                    <small class="text-white-50">Just now</small>
                    <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body fs-7 text-dark py-2 px-3">
                    ${message}
                </div>
            </div>
        `;

        $container.append(toastHtml);
        const toastElement = document.getElementById(toastId);
        const bsToast = new bootstrap.Toast(toastElement, { delay: 4000 });
        bsToast.show();

        $(toastElement).on('hidden.bs.toast', function () {
            $(this).remove();
        });
    }

    // 8. Live Real-Time Ticker Simulator for Telemetry Metrics (subtle jitter)
    if ($('#liveTrafficReqSec').length) {
        setInterval(function () {
            const currentReq = parseInt($('#liveTrafficReqSec').text().replace(/[^0-9]/g, '')) || 185;
            const delta = Math.floor(Math.random() * 9) - 4; // -4 to +4
            const newReq = Math.max(120, currentReq + delta);
            $('#liveTrafficReqSec').html('<i class="fa-solid fa-bolt text-warning me-1"></i> ' + newReq + ' req/sec');
        }, 3000);
    }
});
