@extends('auth.layouts.master')

@section('title', 'DotInfo | Register')

@section('content')
    <div class="w-full max-w-md">
        <div class="p-8 bg-white shadow-2xl rounded-2xl">
            <div class="mb-8 text-center">
                <div class="flex items-center justify-center mx-auto mb-4 w-50">
                    <svg xmlns="http://www.w3.org/2000/svg" baseProfile="tiny" version="1.2" viewBox="0 0 456 164"><g fill="#1d1d1b"><path d="M139.33 117.22c-4.64 0-8.81-1.1-12.5-3.29-3.7-2.19-6.63-5.11-8.79-8.75-2.16-3.63-3.24-7.65-3.24-12.03 0-4.7 1.03-8.87 3.1-12.5 2.07-3.64 4.92-6.5 8.56-8.6 3.63-2.1 7.77-3.15 12.41-3.15 3.7 0 7.1.86 10.2 2.59 3.1 1.72 5.6 4.03 7.48 6.91 1.88 2.88 2.82 6.02 2.82 9.4l-4.89-2.44.09-36.48h9.31v44.29c0 4.51-1.08 8.6-3.24 12.27s-5.09 6.55-8.79 8.65c-3.7 2.1-7.87 3.15-12.5 3.15Zm0-8.74c2.88 0 5.48-.71 7.8-2.12s4.14-3.28 5.45-5.6c1.32-2.32 1.98-4.89 1.98-7.71s-.66-5.31-1.98-7.66c-1.32-2.35-3.13-4.22-5.45-5.59-2.32-1.38-4.92-2.07-7.8-2.07s-5.47.69-7.76 2.07-4.11 3.24-5.45 5.59-2.02 4.91-2.02 7.66.67 5.39 2.02 7.71c1.35 2.32 3.17 4.19 5.45 5.6s4.87 2.12 7.76 2.12ZM198.38 117.22c-4.64 0-8.81-1.1-12.5-3.29-3.7-2.19-6.65-5.13-8.84-8.79-2.19-3.67-3.29-7.73-3.29-12.18s1.1-8.49 3.29-12.13 5.14-6.54 8.84-8.7c3.7-2.16 7.87-3.24 12.5-3.24s8.8 1.08 12.5 3.24c3.7 2.16 6.61 5.08 8.75 8.74 2.13 3.67 3.2 7.7 3.2 12.08s-1.07 8.51-3.2 12.18-5.06 6.6-8.79 8.79c-3.73 2.19-7.88 3.29-12.46 3.29Zm0-8.83c2.88 0 5.47-.69 7.76-2.07s4.09-3.24 5.41-5.59c1.32-2.35 1.98-4.9 1.98-7.66s-.66-5.39-1.98-7.71a15.446 15.446 0 0 0-5.41-5.6c-2.29-1.41-4.88-2.12-7.76-2.12s-5.47.71-7.76 2.12-4.12 3.28-5.5 5.6-2.07 4.89-2.07 7.71.69 5.31 2.07 7.66c1.38 2.35 3.21 4.22 5.5 5.59 2.29 1.38 4.87 2.07 7.76 2.07ZM263.07 78.11h-36.11v-8.09h36.11v8.09Zm-9.4 39.21c-3.76 0-6.96-.75-9.59-2.26-2.63-1.5-4.62-3.59-5.97-6.25-1.35-2.66-2.02-5.75-2.02-9.26V58.09h9.31v41.18c0 3.01.83 5.36 2.49 7.05 1.66 1.69 3.87 2.54 6.63 2.54 1.5 0 3.02-.25 4.56-.75s2.87-1.16 4-1.98v8.56c-1.19.75-2.63 1.38-4.33 1.88-1.69.5-3.39.75-5.08.75ZM277.54 61.11c-1.07 0-2.07-.27-3.01-.8s-1.69-1.27-2.26-2.21-.85-1.98-.85-3.1.28-2.16.85-3.1c.56-.94 1.32-1.69 2.26-2.26s1.94-.85 3.01-.85c1.13 0 2.15.28 3.06.85s1.63 1.32 2.16 2.26c.53.94.8 1.97.8 3.1s-.27 2.16-.8 3.1-1.26 1.68-2.16 2.21-1.93.8-3.06.8Zm-4.61 9.13h9.31v46.07h-9.31V70.24ZM314.83 77.83c-3.01 0-5.52.75-7.52 2.26-2.01 1.5-3.51 3.45-4.51 5.83s-1.5 5.02-1.5 7.9v22.28h-9.31V92.88c0-4.51.88-8.57 2.63-12.18 1.75-3.6 4.32-6.47 7.71-8.6 3.39-2.13 7.55-3.2 12.5-3.2s9.32 1.07 12.74 3.2 6.02 5 7.8 8.6c1.79 3.61 2.68 7.63 2.68 12.08v23.32h-9.31V93.91c0-2.88-.52-5.53-1.55-7.95-1.03-2.41-2.57-4.37-4.61-5.88-2.04-1.51-4.62-2.26-7.76-2.26ZM382.02 78.11h-34.23v-8.09h34.23v8.09Zm-16.17 37.98h-9.31V65.22c0-3.26.67-6.17 2.02-8.75 1.35-2.57 3.34-4.61 5.97-6.11s5.86-2.26 9.69-2.26c1.57 0 3.06.14 4.47.42 1.41.28 2.71.7 3.9 1.27v8.84c-1.07-.69-2.24-1.21-3.53-1.55-1.29-.34-2.62-.52-4-.52-2.82 0-5.06.68-6.72 2.02-1.66 1.35-2.49 3.56-2.49 6.63v50.87ZM411.52 117.22c-4.64 0-8.81-1.1-12.5-3.29-3.7-2.19-6.65-5.13-8.84-8.79-2.19-3.67-3.29-7.73-3.29-12.18s1.1-8.49 3.29-12.13c2.19-3.64 5.14-6.54 8.84-8.7 3.7-2.16 7.87-3.24 12.5-3.24s8.8 1.08 12.5 3.24c3.7 2.16 6.61 5.08 8.75 8.74 2.13 3.67 3.2 7.7 3.2 12.08s-1.07 8.51-3.2 12.18-5.06 6.6-8.79 8.79c-3.73 2.19-7.88 3.29-12.46 3.29Zm0-8.83c2.88 0 5.47-.69 7.76-2.07s4.09-3.24 5.41-5.59c1.32-2.35 1.98-4.9 1.98-7.66s-.66-5.39-1.98-7.71a15.446 15.446 0 0 0-5.41-5.6c-2.29-1.41-4.88-2.12-7.76-2.12s-5.47.71-7.76 2.12-4.12 3.28-5.5 5.6-2.07 4.89-2.07 7.71.69 5.31 2.07 7.66c1.38 2.35 3.21 4.22 5.5 5.59 2.29 1.38 4.87 2.07 7.76 2.07Z"/></g><circle cx="43.68" cy="103.47" r="18.86" fill="#1d1d1b"/><path fill="#1d1d1b" d="M105.05 105.74c.05 10.39-1.36 14.44-5.87 17.35-1.89 1.23-4.65 2.5-7.39 1.3-3.7-1.61-5.68-6.35-5.9-14.18-.27-10.54-7.54-31.43-22.25-42.79-9.62-7.43-20.74-9.92-33.42-7.02-2.58.73-5.05 1.85-4.93 3.05.03.14-.3 1.15 2.14 2.32 2.06.99 4.84 1.83 8.43 2.5 13.88 2.56 39.45 8.74 43.38 45.39l.05.28c.11 1.39-.83 2.63-2.2 2.88-1.46.27-2.85-.69-3.12-2.2l-.03-.14a.976.976 0 0 1-.02-.38C70.43 81.4 48.9 76.63 34.66 73.45c-4.35-.95-7.85-1.73-10.11-3.21-3.3-2.12-4.82-4.56-4.47-7.15.59-4.73 7.07-7.07 8.35-7.5l.23-.09c13.52-3.7 26.66.12 38.24 7.69 16.61 10.87 24 35.53 24.31 46.88.18 6.66 1.69 8.54 2.7 9.47s2.73-.31 3.17-.76c1.34-1.4 2.68-3.66 2.63-12.98-.07-18.21-5.73-32.68-16.89-42.99-18.23-16.79-44.66-18.33-54.13-18.3-.29 0-.58 0-.88-.03-.81-.19-1.49-.7-1.82-1.47-.08-.18-.17-.41-.21-.64-.27-1.46.66-2.79 2.11-3.11h.05c.09-.03.29-.01.63-.03l.09-.02c5.25-.28 36.11-.97 58.61 19.76 12.28 11.37 17.74 27.05 17.79 46.77Z"/></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Create an Account </h2>
                <p class="mt-2 text-gray-600"><svg style="width: 18px;display: inline-block;"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                        stroke="currentColor" className="size-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    @if (session('user_country_name'))
                        {{ session('user_country_name') }}
                    @endif |
                    <svg style="width: 18px;display: inline-block;" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
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
                            class="absolute text-gray-900 transition -translate-y-1/2 fa fa-user left-3 top-1/2 group-focus-within:text-gray-600"></i>
                        <input type="text" id="name" name="name" placeholder="Full Name"
                            class="w-full py-3 pl-10 pr-4 transition-all duration-200 bg-gray-100 border border-gray-300 rounded-full outline-none focus:bg-white focus:border-gray-600 focus:ring-2 focus:ring-gray-900">
                    </div>
                    <span id="error-name" class="text-sm text-red-600 error-message"></span>
                </div>

                <div>
                    <div class="relative mt-1 group">
                        <i
                            class="absolute text-gray-900 transition -translate-y-1/2 fa fa-phone left-3 top-1/2 group-focus-within:text-gray-600"></i>
                        <input type="text" id="mobile" name="mobile" placeholder="Mobile Number"
                            class="w-full py-3 pl-10 pr-4 transition-all duration-200 bg-gray-100 border border-gray-300 rounded-full outline-none focus:bg-white focus:border-gray-600 focus:ring-2 focus:ring-gray-900">
                    </div>
                    <span id="error-mobile" class="text-sm text-red-600 error-message"></span>
                </div>

                <div>
                    <div class="relative mt-1 group">
                        <i
                            class="absolute text-gray-900 transition -translate-y-1/2 fa fa-lock left-3 top-1/2 group-focus-within:text-gray-600"></i>
                        <input type="password" id="password" name="password" placeholder="Password"
                            class="w-full py-3 pl-10 pr-10 transition-all duration-200 bg-gray-100 border border-gray-300 rounded-full outline-none focus:bg-white focus:border-gray-600 focus:ring-2 focus:ring-gray-900">
                        <button type="button" onclick="togglePassword('password', this)"
                            class="absolute text-gray-900 transition -translate-y-1/2 right-3 top-1/2 hover:text-gray-700"><i
                                class="fas fa-eye"></i></button>
                    </div>
                    <span id="error-password" class="text-sm text-red-600 error-message"></span>
                </div>

                <div>
                    <div class="relative mt-1 group">
                        <i
                            class="absolute text-gray-900 transition -translate-y-1/2 fa fa-lock left-3 top-1/2 group-focus-within:text-gray-600"></i>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Confirm Password"
                            class="w-full py-3 pl-10 pr-4 transition-all duration-200 bg-gray-100 border border-gray-300 rounded-full outline-none focus:bg-white focus:border-gray-600 focus:ring-2 focus:ring-gray-900">
                    </div>
                </div>

                @if (!app()->environment('local'))
                    <div class="mt-3 cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
                @endif

                <button type="submit" id="submitBtn"
                    class="flex items-center justify-center gap-2 py-3 mx-auto text-white transition-all duration-200 bg-gray-900 rounded-full cursor-pointer w-50 hover:bg-gray-600 focus:ring-2 focus:ring-gray-900 focus:outline-none"><svg
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
    <div id="otpModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/40 backdrop-blur-sm">
        <div class="w-full max-w-md p-8 bg-white shadow-2xl rounded-2xl">
            <div class="mb-6 text-center">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-4 bg-gray-100 rounded-full">
                    <i class="text-3xl text-gray-700 fas fa-key"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">Phone Verification</h3>
                <p class="mt-2 text-gray-600">Enter the 4-digit code sent to your mobile number</p>
            </div>

            <form id="otpForm" class="space-y-5">
                @csrf
                <div class="relative">
                    <input type="text" id="otp" maxlength="4"
                        class="w-full py-3 text-2xl text-center border border-gray-300 rounded-full outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-600"
                        placeholder="----">
                    <span id="error-otp" class="block mt-1 text-sm text-red-600 error-message"></span>
                </div>

                <button type="submit" id="verifyBtn"
                    class="flex items-center justify-center w-full gap-2 py-3 text-white bg-gray-900 rounded-full hover:bg-gray-600 focus:ring-2 focus:ring-gray-900">
                    <i class="fas fa-check"></i> Verify
                </button>

                <button type="button" id="resendBtn" disabled
                    class="flex items-center justify-center w-full gap-2 py-3 mt-2 text-white bg-gray-400 rounded-full cursor-not-allowed">
                    <span id="resendText">Resend OTP <span id="countdown">60</span>s</span>
                </button>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
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
            resendBtn.classList.remove('bg-gray-600', 'hover:bg-gray-700');

            if (countdownTimer) clearInterval(countdownTimer);

            countdownSpan.textContent = remaining;

            countdownTimer = setInterval(() => {
                remaining--;
                countdownSpan.textContent = remaining;
                if (remaining <= 0) {
                    clearInterval(countdownTimer);
                    resendBtn.disabled = false;
                    resendBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                    resendBtn.classList.add('bg-gray-600', 'hover:bg-gray-700');
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
@endpush
