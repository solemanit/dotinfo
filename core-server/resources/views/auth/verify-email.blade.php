<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Email Verification</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="text-gray-800 bg-gray-50">

    <div class="flex flex-col items-center justify-center min-h-screen px-4 py-8">

        <div class="max-w-xl px-5 mb-5 text-center">
            <h2 class="mb-3 text-3xl font-bold text-gray-900 sm:text-4xl">Check Your Inbox</h2>
            <p class="text-gray-600">
                We’ve sent a verification link to
                <p class="font-semibold text-gray-900">{{ auth()->user()->email }}</p>.
                Please check your inbox and also your spam folder.
            </p>
        </div>

        <div class="w-full max-w-md p-8 bg-white border border-gray-200 shadow-sm rounded-2xl">

            <!-- Flash Messages -->
            @foreach (['success', 'info', 'error'] as $msg)
                @if (session($msg))
                    <div
                        class="p-3 mb-4 text-sm text-white {{ $msg == 'success' ? 'bg-green-500' : ($msg == 'info' ? 'bg-blue-500' : 'bg-red-500') }} rounded-lg">
                        {{ session($msg) }}
                    </div>
                @endif
            @endforeach

            <form method="POST" action="{{ route('verification.resend-or-update') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email Address</label>
                    <input id="email" type="email" name="email"
                        value="{{ old('email', auth()->user()->email) }}" required placeholder="Enter email address"
                        class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    <p class="mt-1 text-xs text-gray-500">
                        Leave unchanged to resend verification or enter a new email to update & resend.
                    </p>
                    @error('email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full px-4 py-2 mt-2 font-semibold text-gray-200 bg-gray-700 rounded-lg hover:bg-gray-600 focus:ring-2 focus:ring-gray-500 focus:outline-none">
                    Resend mail
                </button>

            </form>

            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit"
                    class="w-full px-4 py-2 font-semibold text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-2 focus:ring-gray-200 focus:outline-none">
                    Logout
                </button>
            </form>
        </div>

    </div>
</body>

</html>
