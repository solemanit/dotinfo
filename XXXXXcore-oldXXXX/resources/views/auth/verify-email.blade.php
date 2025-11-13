<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">

    <div class="max-w-md mx-auto mt-10">

        <!-- Header -->
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-gray-800">Verify Your Email</h2>
            <p class="mt-2 text-sm font-semibold text-orange-600">
                Email verification is required for international users.
            </p>
        </div>

        <!-- Messages -->
        @if(session('success'))
            <div class="p-4 mb-4 border border-green-200 rounded-lg bg-green-50">
                <p class="text-sm text-green-700">✓ {{ session('success') }}</p>
            </div>
        @endif

        @if(session('email-updated'))
            <div class="p-4 mb-4 border border-green-200 rounded-lg bg-green-50">
                <p class="text-sm text-green-700">✓ {{ session('email-updated') }}</p>
            </div>
        @endif

        @if(session('info'))
            <div class="p-4 mb-4 border border-blue-200 rounded-lg bg-blue-50">
                <p class="text-sm text-blue-700">ℹ {{ session('info') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 mb-4 border border-red-200 rounded-lg bg-red-50">
                <p class="text-sm text-red-700">✗ {{ session('error') }}</p>
            </div>
        @endif

        <!-- Current Email -->
        <div class="p-4 mb-6 border border-blue-200 rounded-lg bg-blue-50">
            <p class="text-sm text-gray-700">Current email:</p>
            <p class="mt-1 text-base font-semibold text-gray-900">{{ auth()->user()->email }}</p>
        </div>

        <!-- Change Email Form -->
        <div class="p-6 mb-6 bg-white border border-gray-200 rounded-lg">
            <h3 class="mb-4 text-lg font-semibold text-gray-800">Change Email Address</h3>
            <form method="POST" action="{{ route('verification.update-email') }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">New Email Address</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                        placeholder="Enter new email address"
                    />
                </div>
                <button type="submit" class="w-full px-4 py-2 font-semibold text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700">
                    Update Email & Send Verification
                </button>
            </form>
        </div>

        <!-- Resend Verification & Logout -->
        <div class="flex flex-col gap-4">
            <!-- Resend Verification -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="w-full px-4 py-2 font-semibold text-white transition duration-200 bg-gray-600 rounded-lg hover:bg-gray-700">
                    Resend Verification Email
                </button>
            </form>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full px-4 py-2 font-semibold text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-100">
                    Log Out
                </button>
            </form>
        </div>

    </div>

</body>
</html>
