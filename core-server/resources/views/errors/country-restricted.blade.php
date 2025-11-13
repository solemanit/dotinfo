<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>রেজিস্ট্রেশন সীমাবদ্ধ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-md p-8 text-center bg-white rounded-lg shadow-lg">
            <div class="mb-6">
                <svg class="w-16 h-16 mx-auto text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>

            <h1 class="mb-4 text-2xl font-bold text-gray-800">দুঃখিত!</h1>

            <p class="mb-6 text-gray-600">
                আপনার দেশ ({{ $country ?? 'Unknown' }}) থেকে রেজিস্ট্রেশন বর্তমানে সম্ভব নয়।
            </p>

            <p class="mb-6 text-sm text-gray-500">
                শুধুমাত্র বাংলাদেশ, যুক্তরাষ্ট্র, যুক্তরাজ্য এবং কানাডা থেকে রেজিস্ট্রেশন করা যাবে।
            </p>

            <a href="{{ route('login') }}" class="inline-block px-6 py-3 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                লগইন পেজে ফিরে যান
            </a>
        </div>
    </div>
</body>
</html>
