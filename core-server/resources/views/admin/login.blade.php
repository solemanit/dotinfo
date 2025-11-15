{{-- Admin Login --}}
@extends('auth.layouts.master')

@section('title', 'DotInfo | Admin Login')

@section('content')
    <div class="w-full max-w-md">
        <div class="p-8 bg-white shadow-2xl rounded-2xl animate-fadeIn">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold text-gray-900">Admin Login</h2>
                <p class="mt-2 text-gray-600">Sign in to access admin dashboard</p>
            </div>

            {{-- Login Form --}}
            <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autofocus
                           class="w-full px-4 py-3 border rounded-lg @error('email') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                           placeholder="admin@example.com">

                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="relative">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                    <input type="password"
                           name="password"
                           id="authPassword"
                           required
                           class="w-full px-4 py-3 pr-12 border rounded-lg @error('password') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                           placeholder="••••••••">

                    <button type="button"
                            onclick="togglePassword('authPassword', this)"
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
                    <input type="checkbox"
                           name="remember"
                           id="remember"
                           class="w-4 h-4 text-gray-900 border-gray-300 rounded focus:ring-gray-500">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="flex items-center justify-center w-full gap-2 py-3 font-medium text-white transition bg-gray-900 rounded-lg hover:bg-gray-800">
                    <span>Sign In</span>
                    <i class="fa-regular fa-arrow-right"></i>
                </button>
            </form>

            {{-- Back to Home --}}
            <p class="mt-6 text-sm text-center text-gray-600">
                <a href="{{ route('home') }}" class="font-medium text-gray-600 hover:underline">
                    ← Back to Home
                </a>
            </p>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function togglePassword(id, btn) {
            const input = document.getElementById(id);
            input.type = input.type === 'password' ? 'text' : 'password';
            btn.querySelector('i').classList.toggle('fa-eye');
            btn.querySelector('i').classList.toggle('fa-eye-slash');
        }
    </script>

    {{-- Turnstile Script --}}
    @if (!app()->environment('local'))
        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    @endif
@endpush
