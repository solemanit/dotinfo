@if(session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
         class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded">
        <span class="block sm:inline">{{ session('success') }}</span>
        <button @click="show = false" class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <span class="text-2xl">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
         class="relative px-4 py-3 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
        <span class="block sm:inline">{{ session('error') }}</span>
        <button @click="show = false" class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <span class="text-2xl">&times;</span>
        </button>
    </div>
@endif
