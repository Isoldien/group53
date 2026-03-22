@extends("layouts.admin", ["title" => "User Management"])

@section("content")

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-100 dark:bg-red-900/30 border-l-4 border-red-500 text-red-700 dark:text-red-300 rounded-r-lg">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 dark:bg-green-900/30 border-l-4 border-green-500 text-green-700 dark:text-green-300 rounded-r-lg">
            {{ session('success') }}
        </div>
    @endif
    <div class="mt-8 bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-x-auto">
        <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 flex justify-between items-center">
            <h2 class="font-bold text-gray-800 dark:text-gray-200 text-xl">Quick User Management</h2>
        </div>

        <!-- Filter and Search Form -->
        <div class="p-6">
            <form action="{{ route('allUsers') }}" method="GET" class="mb-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Search Input -->
                    <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                        <input type="text" name="search" class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all" placeholder="Search by Name or Email" value="{{ request('search') }}">
                    </div>

                    <!-- Role Filter -->
                    <select name="role" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all">
                        <option value="">All Roles</option>
                        <option value="{{ \App\enums\UserRole::Admin->value }}" {{ request('role') === \App\enums\UserRole::Admin->value ? 'selected' : '' }}>Admin</option>
                        <option value="{{ \App\enums\UserRole::Customer->value }}" {{ request('role') === \App\enums\UserRole::Customer->value ? 'selected' : '' }}>Customer</option>
                    </select>

                    <!-- Submit Button -->
                    <button type="submit" class="px-4 py-2 bg-gray-800 dark:bg-gray-600 text-white rounded-lg hover:bg-gray-900 transition-colors">
                        Apply Filters
                    </button>
                </div>
            </form>

            <!-- Users Table -->
            <table class="w-full text-left">
                <thead>
                <tr class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider border-b border-gray-100 dark:border-gray-700">
                    <th class="pb-3 px-2">User ID</th>
                    <th class="pb-3 px-2">Name</th>
                    <th class="pb-3 px-2">Email</th>
                    <th class="pb-3 px-2">Orders</th>
                    <th class="pb-3 px-2">Reviews</th>
                    <th class="pb-3 px-2">Role</th>
                    <th class="pb-3 px-2 text-right">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse($users as $user)
                    <tr class="text-sm hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                        <td class="py-4 px-2 text-gray-500">#{{ $user->user_id }}</td>
                        <td class="py-4 px-2 font-medium text-gray-900 dark:text-white">{{ $user->name ?? 'N/A' }}</td>
                        <td class="py-4 px-2 text-gray-600 dark:text-gray-400">{{ $user->email }}</td>
                        <td class="py-4 px-2 text-gray-600 dark:text-gray-400">{{ $user->orders_count ?? 0 }}</td>
                        <td class="py-4 px-2 text-gray-600 dark:text-gray-400">{{ $user->reviews_count ?? 0 }}</td>
                        <td class="py-4 px-2 text-gray-600 dark:text-gray-400">{{ \App\enums\UserRole::from($user->role->value)->name }}</td>
                        <td class="py-4 px-2 text-right">
                            <a href="{{ route('editUser', $user->user_id) }}" class="text-blue-600 hover:text-blue-800 transition-colors font-bold px-3 py-1 rounded border border-blue-200 dark:border-blue-900/50 hover:bg-blue-50 dark:hover:bg-blue-900/20">
                                Edit
                            </a>
                                <form action="{{ route('admin.users.destroy', $user->user_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to ban and delete this user? An email will be sent to them.');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-800 font-bold px-3 py-1 rounded border border-red-200 dark:border-red-900/50 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors">Ban / Delete</button>
                                </form>

                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="py-6 text-center text-gray-500">No users found.</td></tr>
                @endforelse
                </tbody>
            </table>
            <div class="mt-4">{{ $users->appends(request()->query())->links() }}</div>
        </div>
    </div>

@endsection
