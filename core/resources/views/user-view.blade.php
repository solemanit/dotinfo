<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="public-card-url" content="{{ route('public.card.data', ['card_id' => $card_id]) }}">
    <meta name="storage-path" content="{{ asset('storage') }}">
    <title>Digital Business Card</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        html,
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        * {
            -webkit-tap-highlight-color: transparent;
        }

        /* Splash Screen */
        #splashScreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out;
        }

        #splashScreen.hide {
            opacity: 0;
            pointer-events: none;
        }

        .splash-logo {
            width: 120px;
            height: 120px;
            background: white;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: logoFloat 2s ease-in-out infinite;
            margin-bottom: 30px;
        }

        .splash-logo svg {
            width: 70px;
            height: 70px;
        }

        .splash-text {
            color: white;
            font-size: 28px;
            font-weight: 800;
            letter-spacing: 1px;
            margin-bottom: 10px;
            animation: fadeInUp 1s ease-out;
        }

        .splash-tagline {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            font-weight: 500;
            animation: fadeInUp 1s ease-out 0.2s backwards;
        }

        .splash-loader {
            margin-top: 40px;
            display: flex;
            gap: 8px;
        }

        .splash-loader span {
            width: 12px;
            height: 12px;
            background: white;
            border-radius: 50%;
            animation: bounce 1.4s ease-in-out infinite;
        }

        .splash-loader span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .splash-loader span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes logoFloat {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 80%, 100% {
                transform: scale(0);
                opacity: 0.5;
            }
            40% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Loading spinner */
        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #1d1d1d;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>

<body class="flex items-center justify-center h-screen p-0 bg-gray-100">
    <!-- Loading State -->
    <div id="loadingState" class="flex flex-col items-center justify-center h-full">
        <div class="spinner"></div>
        <p class="mt-4 text-gray-600">Loading card...</p>
    </div>

    <!-- Main Card Content -->
    <div id="cardContent" class="hidden w-full h-full overflow-y-auto bg-white fade-in">
        <button onclick="shareCard()"
            class="fixed z-50 px-4 py-2 text-sm transition rounded-lg shadow-lg text-dark-900 top-4 right-4 bg-white/90 backdrop-blur-sm hover:bg-white">
            <i class="fas fa-share-alt"></i> Share
        </button>

        <div class="relative flex flex-col items-center px-6 pt-24 pb-6 bg-gradient-to-b from-gray-700 via-gray-900 to-black">
            <div class="-mt-10 overflow-hidden border-4 border-white rounded-full shadow-lg w-45 h-45">
                <img id="profilePhoto" src="https://via.placeholder.com/300" alt="Profile"
                    class="object-cover w-full h-full">
            </div>
            <div class="mt-4 text-center">
                <h1 id="fullName" class="mb-1 text-2xl font-bold text-white">Your Name</h1>
                <p id="title" class="mb-1 text-gray-100 text-md">Your Title</p>
            </div>
        </div>

        <div class="px-6 py-4">
            <button onclick="saveContact()"
                class="w-full px-6 py-3 text-lg font-medium text-white transition rounded-lg bg-zinc-900 hover:bg-zinc-800">
                Save Contact
            </button>
        </div>

        <div class="px-6 py-4">
            <h2 class="mb-4 text-lg font-bold text-gray-900">Social networks</h2>
            <div id="socialLinks" class="flex justify-center gap-6 sm:justify-start"></div>
        </div>

        <div class="px-6 py-4 pb-8">
            <h2 class="mb-4 text-lg font-bold text-gray-900">Contact info.</h2>
            <div id="contactInfo"></div>
        </div>
    </div>

    <!-- Error State -->
    <div id="errorState" class="flex flex-col items-center justify-center hidden h-full px-6 text-center">
        <i class="text-6xl text-red-500 fas fa-exclamation-circle"></i>
        <h2 class="mt-4 text-2xl font-bold text-gray-900">Card Not Found</h2>
        <p class="mt-2 text-gray-600">The digital card you're looking for doesn't exist or hasn't been set up yet.</p>
    </div>

    <script src="{{ asset('assets/js/public-digital-card.js') }}"></script>
</body>

</html>
