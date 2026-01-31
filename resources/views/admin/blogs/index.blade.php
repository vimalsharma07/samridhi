@extends('admin.layouts.app')

@section('title', 'Blog Posts')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Blog Posts</h1>
        <p class="mt-1 text-gray-600">Manage news and blog content</p>
    </div>
    <a href="{{ route('admin.blogs.create') }}"
        class="px-4 py-2 bg-[#1E3A8A] hover:bg-[#152a6b] text-white font-semibold rounded-lg transition-colors">
        New Post
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($blogs as $blog)
            <tr>
                <td class="px-6 py-4">
                    <span class="font-medium text-gray-900">{{ $blog->title }}</span>
                </td>
                <td class="px-6 py-4">
                    @if($blog->is_published)
                        <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded">Published</span>
                    @else
                        <span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded">Draft</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-sm text-gray-500">
                    {{ $blog->created_at->format('M d, Y') }}
                </td>
                <td class="px-6 py-4 text-right space-x-2">
                    @if($blog->is_published)
                    <a href="{{ route('blog.show', $blog->slug) }}" target="_blank"
                        class="text-[#1E3A8A] hover:underline text-sm">View</a>
                    @endif
                    <a href="{{ route('admin.blogs.edit', $blog) }}"
                        class="text-[#1E3A8A] hover:underline text-sm">Edit</a>
                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="inline"
                        onsubmit="return confirm('Delete this post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline text-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-12 text-center text-gray-500">No blog posts yet. Create your first post!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    @if ($blogs->hasPages())
    <div class="px-6 py-4 border-t">
        {{ $blogs->links() }}
    </div>
    @endif
</div>
@endsection
