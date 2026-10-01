/**
 * ==============================================================================
 * SYNCBOARD - UNIFIED AUTHENTICATION & MULTI-SCREEN CONTROLLER
 * Location: /assets/js/auth.js
 * ==============================================================================
 * Handles:
 * 1. Login Form Submit & Password Visibility Toggle
 * 2. Forgot Password Submission & Routing to OTP with Target Email
 * 3. 6-Box OTP Verification:
 *    - Auto-advance on input
 *    - Backspace auto-focus reversal
 *    - Clipboard paste distribution across boxes
 *    - Resend countdown timer & toast feedback
 *    - Demo OTP auto-fill button
 * 4. Split Curtain Opening & Closing Transition Animation across all auth views
 */

$(document).ready(function () {

    // =========================================================================
    // 1. HELPER: TRIGGER 2-COLUMN SPLIT CURTAIN ANIMATION
    // =========================================================================
    function triggerCurtainTransition(statusTitle, statusSub, targetUrl) {
        const $authWrapper = $('#authWrapper');
        const $colLeft = $('#authColLeft');
        const $colRight = $('#authColRight');
        const $portalTitle = $('#portalStatusTitle');
        const $portalSub = $('#portalStatusSub');

        $authWrapper.addClass('curtain-active');
        $colLeft.addClass('curtain-slide-left');
        $colRight.addClass('curtain-slide-right');

        setTimeout(function () {
            if (statusTitle) $portalTitle.html(statusTitle);
            if (statusSub) $portalSub.text(statusSub);

            setTimeout(function () {
                window.location.href = targetUrl;
            }, 600);
        }, 750);
    }

    // =========================================================================
    // 2. LOGIN PAGE CONTROLLER
    // =========================================================================
    // Password Visibility Toggle
    $('#togglePasswordBtn').on('click', function () {
        const $pwd = $('#inputPassword');
        const $icon = $(this).find('i');
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
            $icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            $pwd.attr('type', 'password');
            $icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });

    // Login Form Submit
    $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        const $submitBtn = $('#btnSubmitLogin');
        const email = $('#inputEmail').val().trim();
        const password = $('#inputPassword').val().trim();

        if (!email || !password) {
            $('#loginAlert').html('<i class="fa-solid fa-circle-exclamation me-1"></i> Mohon isi username/email dan password.').removeClass('d-none');
            return;
        }

        $('#loginAlert').addClass('d-none');
        $submitBtn.prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin me-2"></i> Memproses...');

        const targetUrl = $('#loginRedirectTarget').val() || '../Workspace/KanbanProject.php';
        triggerCurtainTransition(
            '<i class="fa-solid fa-circle-check text-success me-2"></i> LOGIN BERHASIL',
            'Membuka Dashboard Workspace & Live Telemetry...',
            targetUrl
        );
    });

    // =========================================================================
    // 3. FORGOT PASSWORD CONTROLLER
    // =========================================================================
    $('#forgotPasswordForm').on('submit', function (e) {
        e.preventDefault();
        const $submitBtn = $('#btnSubmitForgot');
        const email = $('#inputResetEmail').val().trim();

        if (!email) {
            $('#forgotAlert').html('<i class="fa-solid fa-circle-exclamation me-1"></i> Silakan masukkan alamat email terdaftar Anda.').removeClass('d-none');
            return;
        }

        $('#forgotAlert').addClass('d-none');
        $submitBtn.prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin me-2"></i> Mengirim Kode...');

        const targetUrl = 'OTP.php?email=' + encodeURIComponent(email);
        triggerCurtainTransition(
            '<i class="fa-solid fa-paper-plane text-primary me-2"></i> KODE TERKIRIM',
            `Kode verifikasi OTP 6-digit berhasil dikirimkan ke ${email}...`,
            targetUrl
        );
    });

    // =========================================================================
    // 4. OTP 6-BOX VERIFICATION CONTROLLER
    // =========================================================================
    const $otpBoxes = $('.otp-box');

    if ($otpBoxes.length) {
        // Auto-advance on input & backspace handling
        $otpBoxes.each(function (index) {
            const $this = $(this);

            $this.on('input', function (e) {
                const val = $(this).val().replace(/[^0-9]/g, '');
                $(this).val(val);

                if (val.length >= 1) {
                    $(this).addClass('is-filled');
                    if (index < $otpBoxes.length - 1) {
                        $otpBoxes.eq(index + 1).focus();
                    }
                } else {
                    $(this).removeClass('is-filled');
                }
            });

            $this.on('keydown', function (e) {
                // Backspace navigation
                if (e.key === 'Backspace' && !$(this).val() && index > 0) {
                    $otpBoxes.eq(index - 1).focus().val('').removeClass('is-filled');
                }
            });

            // Handle Paste full 6-digit code
            $this.on('paste', function (e) {
                e.preventDefault();
                const pasteData = (e.originalEvent.clipboardData || window.clipboardData).getData('text').trim().replace(/[^0-9]/g, '');
                if (pasteData.length > 0) {
                    for (let i = 0; i < $otpBoxes.length && i < pasteData.length; i++) {
                        $otpBoxes.eq(i).val(pasteData[i]).addClass('is-filled');
                    }
                    const nextIndex = Math.min(pasteData.length, $otpBoxes.length - 1);
                    $otpBoxes.eq(nextIndex).focus();
                }
            });
        });

        // Demo OTP auto-fill button (849201)
        $('#btnDemoOtpFill').on('click', function () {
            const demoCode = '849201';
            for (let i = 0; i < demoCode.length; i++) {
                $otpBoxes.eq(i).val(demoCode[i]).addClass('is-filled');
            }
            $otpBoxes.last().focus();
            $('#otpAlert').addClass('d-none');
        });

        // Resend Countdown Timer (90 seconds)
        let countdownSeconds = 90;
        let countdownInterval = setInterval(function () {
            countdownSeconds--;
            const mins = String(Math.floor(countdownSeconds / 60)).padStart(2, '0');
            const secs = String(countdownSeconds % 60).padStart(2, '0');
            $('#otpCountdownTimer').text(`${mins}:${secs}`);

            if (countdownSeconds <= 0) {
                clearInterval(countdownInterval);
                $('#resendOtpCountdownText').addClass('d-none');
                $('#btnResendOtp').removeClass('d-none');
            }
        }, 1000);

        // Resend Button Click Action
        $('#btnResendOtp').on('click', function () {
            $(this).addClass('d-none');
            $('#resendOtpCountdownText').removeClass('d-none');
            countdownSeconds = 90;
            $('#otpCountdownTimer').text('01:30');

            // Reset and restart countdown
            countdownInterval = setInterval(function () {
                countdownSeconds--;
                const mins = String(Math.floor(countdownSeconds / 60)).padStart(2, '0');
                const secs = String(countdownSeconds % 60).padStart(2, '0');
                $('#otpCountdownTimer').text(`${mins}:${secs}`);

                if (countdownSeconds <= 0) {
                    clearInterval(countdownInterval);
                    $('#resendOtpCountdownText').addClass('d-none');
                    $('#btnResendOtp').removeClass('d-none');
                }
            }, 1000);

            $('#resendToastMsg').html('<i class="fa-solid fa-circle-check text-success me-1"></i> Kode OTP baru berhasil dikirim ulang!').fadeIn().delay(3000).fadeOut();
        });

        // OTP Form Submit
        $('#otpForm').on('submit', function (e) {
            e.preventDefault();
            const $submitBtn = $('#btnSubmitOtp');
            let enteredCode = '';

            $otpBoxes.each(function () {
                enteredCode += $(this).val().trim();
            });

            if (enteredCode.length < 6) {
                $('#otpAlert').html('<i class="fa-solid fa-circle-exclamation me-1"></i> Mohon masukkan 6 digit kode OTP secara lengkap.').removeClass('d-none');
                $otpBoxes.each(function () {
                    if (!$(this).val()) $(this).addClass('is-invalid');
                });
                return;
            }

            $('#otpAlert').addClass('d-none');
            $otpBoxes.removeClass('is-invalid');
            $submitBtn.prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin me-2"></i> Memverifikasi...');

            const targetUrl = $('#otpRedirectTarget').val() || '../Workspace/KanbanProject.php';
            triggerCurtainTransition(
                '<i class="fa-solid fa-circle-check text-success me-2"></i> VERIFIKASI BERHASIL',
                'Otorisasi sesi aman terkonfirmasi. Membuka Workspace...',
                targetUrl
            );
        });
    }
});
