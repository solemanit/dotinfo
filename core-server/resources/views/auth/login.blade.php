<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>DotInfo | Login</title>

    <!-- Tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .spinner {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="flex items-center justify-center h-screen p-4 bg-gradient-to-br from-blue-900 to-blue-700">

    <div class="w-full max-w-md">
        <div class="p-8 bg-white shadow-2xl rounded-2xl animate-fadeIn">
            <div class="mb-8 text-center">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-4 bg-blue-100 rounded-full">
                    <i class="text-3xl text-blue-700 fas fa-id-card"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">@if (session('user_country_name')){{ session('user_country_name') }}@endif</h2>
                <p class="mt-2 text-gray-600">Sign in to access your dashboard</p>
            </div>

            {{-- Login Form --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                {{-- Email/Mobile --}}
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Email or Mobile</label>
                    <input type="text" name="login" value="{{ old('login') }}" autofocus
                        class="w-full px-4 py-3 border rounded-lg @error('login') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="{{ session('is_bd_user') ? 'you@example.com or 01XXXXXXXXX' : 'you@example.com' }}">

                    @error('login')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="relative">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="authPassword"
                        class="w-full px-4 py-3 pr-12 border rounded-lg @error('password') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="••••••••">

                    <button type="button" onclick="togglePassword('authPassword', this)"
                        class="absolute text-gray-500 right-3 top-10 hover:text-gray-700">
                        <i class="fas fa-eye"></i>
                    </button>

                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Turnstile Captcha --}}
                @if (!app()->environment('local'))
                    <div class="mt-3 cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
                    @error('captcha')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                @endif
                {{-- Remember Me --}}
                <div class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2">
                    <span class="text-sm text-gray-600">Remember me</span>
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="flex items-center justify-center w-full gap-2 py-3 font-medium text-white transition bg-blue-900 rounded-lg hover:bg-blue-800">
                    <span>Sign In</span>
                </button>
            </form>

            {{-- Forgot Password --}}
            @if (Route::has('password.request'))
                <p class="mt-6 text-sm text-center text-gray-600">
                    <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:underline">
                        Forgot password?
                    </a>
                </p>
            @endif

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
    {{-- Turnstile Script --}}
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
</body>

</html>
