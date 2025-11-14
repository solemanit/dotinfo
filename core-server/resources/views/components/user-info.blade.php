@props(['user'])

<div class="p-4 mb-4 bg-white rounded-lg shadow">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <div class="flex items-center justify-center w-12 h-12 text-xl font-bold text-white rounded-full bg-linear-to-r from-blue-500 to-purple-600">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div>
                <h3 class="font-semibold text-gray-900">{{ $user->name }}</h3>
                <p class="text-sm text-gray-600">{{ $user->email }}</p>
            </div>
        </div>
        <div>
            <span class="px-3 py-1 rounded-full text-xs font-semibold
                @if($user->isAdmin()) bg-red-100 text-red-800
                @else bg-blue-100 text-blue-800
                @endif">
                {{ ucfirst($user->role) }}
            </span>
        </div>
    </div>
</div>
