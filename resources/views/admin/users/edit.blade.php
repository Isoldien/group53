@extends('layouts.admin', ['title' => 'Edit User'])

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-900 dark:text-white">Edit User - {{ $user->name }}</h1>
            </div>

            <div class="p-6">
                <!-- Display Session Error or Success -->
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

                <!-- Edit User Form -->
                <form action="{{ route('userEdited') }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Name -->
                    <div class="relative">
                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all" required>
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="relative">
                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all" required>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div class="relative">
                        <label for="role" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Role</label>
                        <select name="role" id="role" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all" required>
                            <option value="{{ \App\enums\UserRole::Admin->value }}" {{ old('role', $user->role) === \App\enums\UserRole::Admin->value ? 'selected' : '' }}>Admin</option>
                            <option value="{{ \App\enums\UserRole::Customer->value }}" {{ old('role', $user->role) === \App\enums\UserRole::Customer->value ? 'selected' : '' }}>Customer</option>
                        </select>
                        @error('role')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-colors">
                            Save Changes
                        </button>
                        <a href="{{ route('allUsers') }}" class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg font-semibold transition-colors">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
