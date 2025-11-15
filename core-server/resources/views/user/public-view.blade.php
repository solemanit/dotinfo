@extends('user.layouts.master')

@section('title', 'Profile Card')

@push('meta')
<meta name="public-card-url" content="{{ route('public.card.data', ['card_id' => $card_id]) }}">
@endpush

@section('content')
    <!-- Loading State -->
    <div id="loadingState" class="flex flex-col items-center justify-center h-full">
        <div class="spinner"></div>
        <p class="mt-4 text-gray-600">Loading card...</p>
    </div>

    <!-- Main Card Content -->
    <div id="cardContent" class="hidden w-full h-full overflow-y-auto bg-white fade-in">
        <button onclick="shareCard()"
            class="fixed z-50 px-4 py-2 text-sm transition rounded-lg shadow-lg text-dark-900 top-4 right-4 bg-white/90 backdrop-blur-sm hover:bg-white">
            <i class="fa-regular fa-share-alt"></i> Share
        </button>

        <div
            class="relative flex flex-col items-center px-6 pt-24 pb-6 bg-linear-to-b from-gray-800 via-gray-900 to-black">
            <div class="-mt-10 overflow-hidden border-4 border-white rounded-full shadow-lg w-45 h-45">
                <img id="profilePhoto" src="{{ asset('assets/images/avatar/dummy.png') }}" alt="Profile"
                    class="object-cover w-full h-full">
            </div>
            <div class="mt-4 text-center">
                <h1 id="fullName" class="mb-1 text-2xl font-bold text-white">Your Name</h1>
                <p id="designation" class="mb-1 text-gray-100 text-md">Your Designation</p>
                <p id="company" class="mb-1 text-gray-100 text-md">Your Company</p>
            </div>
        </div>

        <div class="px-6 py-4">
            <button onclick="saveContact()"
                class="w-full px-6 py-3 text-lg font-medium text-white transition rounded-lg bg-zinc-900 hover:bg-zinc-800">
                Save Contact
            </button>
        </div>

        <div class="px-6 py-4">
            <h2 class="mb-4 text-lg font-bold text-gray-900">Social Networks</h2>
            <div id="socialLinks" class="flex justify-center gap-6 sm:justify-start"></div>
        </div>

        <div class="px-6 py-4 pb-8">
            <h2 class="mb-4 text-lg font-bold text-gray-900">Contact Info</h2>
            <div id="contactInfo"></div>
        </div>
    </div>

    <!-- Error State -->
    <div id="errorState" class="flex flex-col items-center justify-center hidden h-full px-6 text-center">
        <i class="text-6xl text-red-500 fa-regular fa-exclamation-circle"></i>
        <h2 class="mt-4 text-2xl font-bold text-gray-900">Card Not Found</h2>
        <p class="mt-2 text-gray-600">The digital card you're looking for doesn't exist or hasn't been set up yet.</p>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('main/js/public-digital-card.js') }}"></script>
<script src="{{ asset('main/js/mobile-detect.min.js') }}"></script>
{{-- <script>
    var md = new MobileDetect(window.navigator.userAgent);

    // If NOT mobile (means desktop/tablet), block or redirect
    if (!md.mobile()) {
        // Option 1: Redirect desktop users
        window.location.href = "https://www.dotinfo.app/";
    }
</script> --}}
@endpush
