@php $detect = app(App\Helpers\Device::class) @endphp

@if(!$detect->isMobile())
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
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-4 bg-gradient-to-br from-blue-900 to-blue-700">

    <div class="w-full max-w-md">
        <div class="p-8 bg-white shadow-2xl rounded-2xl">

            <div class="mb-8 text-center">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-4 bg-blue-100 rounded-full">
                    <i class="text-3xl text-blue-700 fas fa-user-plus"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Create an Account</h2>

                <p class="mt-2 text-gray-600">
                    <svg style="width: 18px;display: inline-block;" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg> @if (session('user_country_name')){{ session('user_country_name') }}@endif |

                    <svg style="width: 18px;display: inline-block;" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg> Card ID - @if (session('qr_card_id')){{ session('qr_card_id') }}@endif
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                {{-- Name --}}
                <div>
                    <div class="relative mt-1 group">
                        <i class="absolute text-gray-500 transition -translate-y-1/2 fa fa-user left-3 top-1/2 group-focus-within:text-blue-600"></i>
                        <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}"
                            class="w-full py-3 pl-10 pr-4 transition-all duration-200 bg-gray-100 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-full outline-none focus:bg-white focus:border-blue-600 focus:ring-2 focus:ring-blue-600">
                    </div>
                    @error('name')<span class="text-sm text-red-600">{{ $message }}</span>@enderror
                </div>

                {{-- Email --}}
                <div>
                    <div class="relative mt-1 group">
                        <i class="absolute text-gray-500 transition -translate-y-1/2 fa fa-envelope left-3 top-1/2 group-focus-within:text-blue-600"></i>
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                            class="w-full py-3 pl-10 pr-4 transition-all duration-200 bg-gray-100 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-full outline-none focus:bg-white focus:border-blue-600 focus:ring-2 focus:ring-blue-600">
                    </div>
                    @error('email')<span class="text-sm text-red-600">{{ $message }}</span>@enderror
                </div>

                {{-- Password --}}
                <div>
                    <div class="relative mt-1 group">
                        <i class="absolute text-gray-500 transition -translate-y-1/2 fa fa-lock left-3 top-1/2 group-focus-within:text-blue-600"></i>
                        <input type="password" name="password" id="regPassword" placeholder="Password"
                            class="w-full py-3 pl-10 pr-10 transition-all duration-200 bg-gray-100 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-full outline-none focus:bg-white focus:border-blue-600 focus:ring-2 focus:ring-blue-600">
                        <button type="button" onclick="togglePassword('regPassword', this)" class="absolute text-gray-500 transition -translate-y-1/2 right-3 top-1/2 hover:text-gray-700"><i class="fas fa-eye"></i></button>
                    </div>
                    @error('password')<span class="text-sm text-red-600">{{ $message }}</span>@enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <div class="relative mt-1 group">
                        <i class="absolute text-gray-500 transition -translate-y-1/2 fa fa-lock left-3 top-1/2 group-focus-within:text-blue-600"></i>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password"
                            class="w-full py-3 pl-10 pr-4 transition-all duration-200 bg-gray-100 border border-gray-300 rounded-full outline-none focus:bg-white focus:border-blue-600 focus:ring-2 focus:ring-blue-600">
                    </div>
                </div>

                @if (!app()->environment('local'))
                    <div class="mt-3 cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
                @endif

                <button type="submit"
                    class="flex items-center justify-center gap-2 py-3 mx-auto text-white transition-all duration-200 bg-blue-900 rounded-full cursor-pointer w-50 hover:bg-blue-800 focus:ring-2 focus:ring-blue-600 focus:outline-none"><svg style="width: 18px;" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" /></svg>
                    Register
                </button>

            </form>
        </div>
    </div>

    <script>
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
@endif
