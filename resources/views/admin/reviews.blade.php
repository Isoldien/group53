@extends('layouts.admin', ['title' => 'Manage Reviews'])

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Review Management</h1>
    </div>

    <!-- Reviews Table -->
    <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 flex justify-between items-center">
            <h2 class="font-bold text-gray-800 dark:text-gray-200 text-xl">All Reviews</h2>
        </div>
        <div class="p-6 overflow-x-auto">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('success') }}
                </div>
            @endif
            <table class="w-full text-left">
                <thead>
                    <tr class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider border-b border-gray-100 dark:border-gray-700">
                        <th class="pb-3 px-2">ID</th>
                        <th class="pb-3 px-2">Product</th>
                        <th class="pb-3 px-2">User</th>
                        <th class="pb-3 px-2">Rating</th>
                        <th class="pb-3 px-2">Comment</th>
                        <th class="pb-3 px-2">Date</th>
                        <th class="pb-3 px-2 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse($reviews as $review)
                        <tr class="text-sm hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                            <td class="py-4 px-2 text-gray-500">#{{ $review->review_id }}</td>
                            <td class="py-4 px-2 font-medium text-gray-900 dark:text-white">
                                <a href="{{ route('products.show', $review->product_id) }}" class="hover:underline text-blue-600 dark:text-blue-400" target="_blank">
                                    {{ Str::limit($review->product->product_name ?? 'Deleted Product', 30) }}
                                </a>
                            </td>
                            <td class="py-4 px-2 text-gray-600 dark:text-gray-400">{{ $review->user->name ?? $review->user->full_name ?? 'Guest/Deleted' }}</td>
                            <td class="py-4 px-2">
                                <span class="px-2 py-1 rounded text-xs font-medium {{ $review->rating >= 4 ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300' : ($review->rating == 3 ? 'bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-300' : 'bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-300') }}">
                                    {{ $review->rating }} / 5
                                </span>
                            </td>
                            <td class="py-4 px-2 text-gray-600 dark:text-gray-400">
                                {{ Str::limit($review->comment, 50) }}
                            </td>
                            <td class="py-4 px-2 text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($review->review_date)->format('M d, Y') }}</td>
                            <td class="py-4 px-2 text-right">
                                <form action="{{ route('admin.reviews.destroy', $review->review_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-800 font-bold px-3 py-1 rounded border border-red-200 dark:border-red-900/50 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="py-6 text-center text-gray-500">No reviews found.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">{{ $reviews->links() }}</div>
        </div>
    </div>
</div>
@endsection
