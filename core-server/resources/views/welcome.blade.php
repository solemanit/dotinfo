<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Multi-Auth System</title>
</head>
<body class="antialiased text-gray-100 bg-linear-to-br from-indigo-600 to-purple-700">

    <div class="flex flex-col justify-center min-h-screen">
        <div class="container px-6 py-16 mx-auto text-center">
            <!-- Header -->
            <div class="mb-12">
                <h1 class="mb-4 text-5xl font-extrabold leading-tight tracking-tight text-white sm:text-6xl md:text-7xl animate-fadeIn">Welcome to Multi-Auth System</h1>
                <p class="text-lg text-indigo-100 delay-200 sm:text-xl md:text-2xl animate-fadeIn">Advanced Laravel Authentication with Role-Based Access Control</p>
            </div>

            <!-- Auth Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mb-16 animate-fadeIn delay-400">
                @auth
                    <a href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : route('user.dashboard') }}"
                       class="px-8 py-3 font-semibold text-indigo-600 transition transform bg-white rounded-lg shadow-lg hover:bg-indigo-50 hover:-translate-y-1">
                        Go to Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-8 py-3 font-semibold text-white transition transform bg-red-500 rounded-lg shadow-lg hover:bg-red-600 hover:-translate-y-1">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-8 py-3 font-semibold text-indigo-600 transition transform bg-white rounded-lg shadow-lg hover:bg-indigo-50 hover:-translate-y-1">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="px-8 py-3 font-semibold text-white transition transform bg-green-500 rounded-lg shadow-lg hover:bg-green-600 hover:-translate-y-1">
                        Register
                    </a>
                @endauth
            </div>

            <!-- Features Grid -->
            <div class="grid max-w-6xl grid-cols-1 gap-8 mx-auto md:grid-cols-3 animate-fadeIn delay-600">
                <div class="p-8 transition bg-white shadow-2xl rounded-2xl hover:shadow-3xl">
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Secure Authentication</h3>
                    <p class="text-gray-600">Advanced security with Laravel Breeze and role-based access control.</p>
                </div>
                <div class="p-8 transition bg-white shadow-2xl rounded-2xl hover:shadow-3xl">
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Multi-Role System</h3>
                    <p class="text-gray-600">Separate dashboards for Admin and User roles with proper authorization.</p>
                </div>
                <div class="p-8 transition bg-white shadow-2xl rounded-2xl hover:shadow-3xl">
                    <h3 class="mb-2 text-xl font-bold text-gray-900">User Management</h3>
                    <p class="text-gray-600">Admin can manage users, activate/deactivate accounts, and view statistics.</p>
                </div>
            </div>

            <!-- Test Credentials -->
            <div class="max-w-3xl p-10 mx-auto mt-16 bg-white shadow-2xl rounded-2xl animate-fadeIn delay-800">
                <h3 class="mb-6 text-2xl font-bold text-gray-900">Test Credentials</h3>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="pl-4 border-l-4 border-red-500">
                        <h4 class="mb-2 font-bold text-red-600">Admin Account</h4>
                        <p class="text-sm text-gray-600">Email: <span class="font-mono">admin@example.com</span></p>
                        <p class="text-sm text-gray-600">Password: <span class="font-mono">password</span></p>
                    </div>
                    <div class="pl-4 border-l-4 border-blue-500">
                        <h4 class="mb-2 font-bold text-blue-600">User Account</h4>
                        <p class="text-sm text-gray-600">Email: <span class="font-mono">user@example.com</span></p>
                        <p class="text-sm text-gray-600">Password: <span class="font-mono">password</span></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Optional: Tailwind Animations -->
    <style>
        .animate-fadeIn {
            opacity: 0;
            animation: fadeIn 1s forwards;
        }
        .animate-fadeIn.delay-200 { animation-delay: 0.2s; }
        .animate-fadeIn.delay-400 { animation-delay: 0.4s; }
        .animate-fadeIn.delay-600 { animation-delay: 0.6s; }
        .animate-fadeIn.delay-800 { animation-delay: 0.8s; }

        @keyframes fadeIn {
            to { opacity: 1; }
        }
    </style>

</body>
</html>
