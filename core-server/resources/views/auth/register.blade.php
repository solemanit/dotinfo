    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>DotInfo | Register</title>

        <!-- Tailwind -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
            rel="stylesheet">

        <style>
            body {
                font-family: 'Inter', sans-serif;
                background: url('{{ asset('assets/bg-waves.png') }}') no-repeat center center fixed;
                background-size: cover;
            }

            .backdrop {
                background-color: rgba(0, 0, 0, 0.85);
                backdrop-filter: blur(6px);
            }
        </style>
    </head>

    <body class="flex items-center justify-center min-h-screen p-4">

        <div class="w-full max-w-md">
            <div class="p-8 bg-white shadow-2xl rounded-2xl">

                <div class="mb-8 text-center">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-4 bg-blue-100 rounded-full">
                        <i class="text-3xl text-blue-600 fas fa-user-plus"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Create an Account </h2>
                    <p class="mt-2 text-gray-600"><svg style="width: 18px;display: inline-block;"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" className="size-6">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        @if (session('user_country_name'))
                            {{ session('user_country_name') }}
                        @endif |
                        <svg style="width: 18px;display: inline-block;" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                        </svg> Card ID - @if (session('qr_card_id'))
                            {{ session('qr_card_id') }}
                        @endif
                    </p>
                </div>

                <form id="registrationForm" class="space-y-5">
                    @csrf

                    <div>
                        <div class="relative mt-1 group">
                            <i
                                class="absolute text-gray-500 transition -translate-y-1/2 fa fa-user left-3 top-1/2 group-focus-within:text-blue-600"></i>
                            <input type="text" id="name" name="name" placeholder="Full Name"
                                class="w-full py-3 pl-10 pr-4 transition-all duration-200 bg-gray-100 border border-gray-300 rounded-full outline-none focus:bg-white focus:border-blue-600 focus:ring-2 focus:ring-blue-500">
                        </div>
                        <span id="error-name" class="text-sm text-red-600 error-message"></span>
                    </div>

                    <div>
                        <div class="relative mt-1 group">
                            <i
                                class="absolute text-gray-500 transition -translate-y-1/2 fa fa-phone left-3 top-1/2 group-focus-within:text-blue-600"></i>
                            <input type="text" id="mobile" name="mobile" placeholder="Mobile Number"
                                class="w-full py-3 pl-10 pr-4 transition-all duration-200 bg-gray-100 border border-gray-300 rounded-full outline-none focus:bg-white focus:border-blue-600 focus:ring-2 focus:ring-blue-500">
                        </div>
                        <span id="error-mobile" class="text-sm text-red-600 error-message"></span>
                    </div>

                    <div>
                        <div class="relative mt-1 group">
                            <i
                                class="absolute text-gray-500 transition -translate-y-1/2 fa fa-lock left-3 top-1/2 group-focus-within:text-blue-600"></i>
                            <input type="password" id="password" name="password" placeholder="Password"
                                class="w-full py-3 pl-10 pr-10 transition-all duration-200 bg-gray-100 border border-gray-300 rounded-full outline-none focus:bg-white focus:border-blue-600 focus:ring-2 focus:ring-blue-500">
                            <button type="button" onclick="togglePassword('password', this)"
                                class="absolute text-gray-500 transition -translate-y-1/2 right-3 top-1/2 hover:text-gray-700"><i
                                    class="fas fa-eye"></i></button>
                        </div>
                        <span id="error-password" class="text-sm text-red-600 error-message"></span>
                    </div>

                    <div>
                        <div class="relative mt-1 group">
                            <i
                                class="absolute text-gray-500 transition -translate-y-1/2 fa fa-lock left-3 top-1/2 group-focus-within:text-blue-600"></i>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="Confirm Password"
                                class="w-full py-3 pl-10 pr-4 transition-all duration-200 bg-gray-100 border border-gray-300 rounded-full outline-none focus:bg-white focus:border-blue-600 focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    @if (!app()->environment('local'))
                        <div class="mt-3 cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
                    @endif

                    <button type="submit" id="submitBtn"
                        class="flex items-center justify-center gap-2 py-3 mx-auto text-white transition-all duration-200 bg-blue-500 rounded-full cursor-pointer w-50 hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:outline-none"><svg
                            style="width: 18px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="currentColor"
                            class="icon icon-tabler icons-tabler-filled icon-tabler-circle-check">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" />
                        </svg> Register</button>

                </form>
            </div>
        </div>

        <!-- OTP Modal -->
        <!-- OTP Modal (Blue Register Theme) -->
        <div id="otpModal"
            class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/40 backdrop-blur-sm">
            <div class="w-full max-w-md p-8 bg-white shadow-2xl rounded-2xl">
                <div class="mb-6 text-center">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-4 bg-blue-100 rounded-full">
                        <i class="text-3xl text-blue-700 fas fa-key"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Phone Verification</h3>
                    <p class="mt-2 text-gray-600">Enter the 4-digit code sent to your mobile number</p>
                </div>

                <form id="otpForm" class="space-y-5">
                    @csrf
                    <div class="relative">
                        <input type="text" id="otp" maxlength="4"
                            class="w-full py-3 text-2xl text-center border border-gray-300 rounded-full outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-600"
                            placeholder="----">
                        <span id="error-otp" class="block mt-1 text-sm text-red-600 error-message"></span>
                    </div>

                    <button type="submit" id="verifyBtn"
                        class="flex items-center justify-center w-full gap-2 py-3 text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-check"></i> Verify
                    </button>

                    <button type="button" id="resendBtn" disabled
                        class="flex items-center justify-center w-full gap-2 py-3 mt-2 text-white bg-gray-400 rounded-full cursor-not-allowed">
                        <span id="resendText">Resend OTP <span id="countdown">60</span>s</span>
                    </button>
                </form>
            </div>
        </div>

        <script>
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            const registrationForm = document.getElementById('registrationForm');
            const otpModal = document.getElementById('otpModal');
            const otpForm = document.getElementById('otpForm');
            const resendBtn = document.getElementById('resendBtn');
            const countdownSpan = document.getElementById('countdown');
            const submitBtn = document.getElementById('submitBtn');
            const verifyBtn = document.getElementById('verifyBtn');

            let countdownTimer = null;

            function clearErrors() {
                document.querySelectorAll('span[id^="error-"]').forEach(el => el.textContent = '');
            }

            function showError(field, message) {
                const el = document.getElementById(`error-${field}`);
                if (el) el.textContent = message;
            }

            function startCountdown(seconds) {
                let remaining = seconds;
                resendBtn.disabled = true;
                resendBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
                resendBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700');

                if (countdownTimer) clearInterval(countdownTimer);

                countdownSpan.textContent = remaining;

                countdownTimer = setInterval(() => {
                    remaining--;
                    countdownSpan.textContent = remaining;
                    if (remaining <= 0) {
                        clearInterval(countdownTimer);
                        resendBtn.disabled = false;
                        resendBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                        resendBtn.classList.add('bg-blue-600', 'hover:bg-blue-700');
                        document.getElementById('resendText').textContent = 'Resend';
                    }
                }, 1000);
            }

            registrationForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                clearErrors();
                submitBtn.disabled = true;
                submitBtn.textContent = 'Please wait...';

                const formData = new FormData(registrationForm);

                try {
                    const response = await fetch('{{ route('register') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    const data = await response.json();
                    if (data.success) {
                        otpModal.classList.remove('hidden');
                        startCountdown(60);
                    } else {
                        if (data.errors) {
                            Object.keys(data.errors).forEach(f => showError(f, data.errors[f][0]));
                        } else alert(data.message || 'Registration failed.');
                    }
                } catch (err) {
                    console.error(err);
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Register';
                }
            });

            otpForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                clearErrors();

                const otpValue = document.getElementById('otp').value;
                if (otpValue.length !== 4) {
                    showError('otp', 'Enter 4-digit OTP');
                    return;
                }

                verifyBtn.disabled = true;
                verifyBtn.textContent = 'Verifying...';

                try {
                    const response = await fetch('{{ route('otp.verify') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            otp: otpValue
                        })
                    });

                    const data = await response.json();
                    if (data.success) window.location.href = data.redirect;
                    else showError('otp', data.message);
                } catch (err) {
                    console.error(err);
                } finally {
                    verifyBtn.disabled = false;
                    verifyBtn.textContent = 'Verify';
                }
            });
            resendBtn.addEventListener('click', async () => {
                if (resendBtn.disabled) return;
                resendBtn.disabled = true;
                const originalText = document.getElementById('resendText').textContent;
                document.getElementById('resendText').textContent = 'Sending...';

                try {
                    const response = await fetch('{{ route('otp.resend') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        }
                    });
                    const data = await response.json();

                    if (data.success) {
                        // ✅ New OTP sent — Start a fresh countdown
                        startCountdown(data.remaining_seconds ?? 60);
                        alert(data.message);
                    } else if (data.remaining_seconds) {
                        // ⏳ OTP cooldown running — restart countdown
                        startCountdown(data.remaining_seconds);
                        showError('otp', data.message);
                    } else {
                        alert(data.message);
                    }

                } catch (err) {
                    console.error(err);
                } finally {
                    document.getElementById('resendText').textContent = originalText;
                }
            });

            // restrict OTP input to numbers
            document.getElementById('otp').addEventListener('input', e => {
                e.target.value = e.target.value.replace(/[^0-9]/g, '');
            });

            function togglePassword(id, btn) {
                const input = document.getElementById(id);
                input.type = input.type === 'password' ? 'text' : 'password';
                btn.querySelector('i').classList.toggle('fa-eye');
                btn.querySelector('i').classList.toggle('fa-eye-slash');
            }
        </script>
        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    </body>

    </html>