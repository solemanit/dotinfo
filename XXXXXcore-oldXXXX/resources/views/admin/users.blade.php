<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-4 text-lg font-semibold">All Users</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">ID</th>
                                    <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Name</th>
                                    <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Email</th>
                                    <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Joined</th>
                                    <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $user->id }}</td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">{{ $user->name }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $user->email }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap">
                                            @if($user->is_active)
                                                <span class="px-2 py-1 text-xs text-green-800 bg-green-100 rounded-full">Active</span>
                                            @else
                                                <span class="px-2 py-1 text-xs text-red-800 bg-red-100 rounded-full">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $user->created_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap">
                                            <form method="POST" action="{{ route('admin.users.toggle', $user->id) }}" class="inline">
                                                @csrf
                                                <button type="submit" class="text-blue-600 hover:text-blue-900">
                                                    {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No users found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
