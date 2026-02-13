@extends('admin.layouts.app')

@section('title', 'Edit Blog Post')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Edit Blog Post</h1>
    <p class="mt-1 text-gray-600">Update {{ $blog->title }}</p>
</div>

<form method="POST" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data"
    class="bg-white rounded-xl shadow p-6 space-y-6">
    @csrf
    @method('PUT')

    @if ($errors->any())
    <div class="p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
        <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
            placeholder="Blog post title">
    </div>

    <div>
        <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
        <textarea name="excerpt" id="excerpt" rows="2"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
            placeholder="Short summary for listing pages">{{ old('excerpt', $blog->excerpt) }}</textarea>
    </div>

    <div>
        <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
        @if($blog->featured_image)
        <div class="mb-2">
            <img src="{{ asset('uploads/' . $blog->featured_image) }}" alt="" class="h-24 rounded-lg object-cover">
        </div>
        @endif
        <input type="file" name="featured_image" id="featured_image" accept="image/*"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent">
        <p class="mt-1 text-sm text-gray-500">Leave empty to keep current image</p>
    </div>

    <div>
        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
        <textarea name="content" id="content" rows="15">{{ old('content', $blog->content) }}</textarea>
    </div>

    <div>
        <label class="flex items-center">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $blog->is_published) ? 'checked' : '' }}
                class="rounded border-gray-300 text-[#1E3A8A] focus:ring-[#1E3A8A]">
            <span class="ml-2 text-sm text-gray-700">Published</span>
        </label>
    </div>

    <div class="flex gap-3">
        <button type="submit"
            class="px-6 py-2 bg-[#1E3A8A] hover:bg-[#152a6b] text-white font-semibold rounded-lg transition-colors">
            Update Post
        </button>
        <a href="{{ route('admin.blogs.index') }}"
            class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
            Cancel
        </a>
    </div>
</form>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/ckeditor4@4.25.1/ckeditor.js"></script>
<script>
(function() {
    function initCKEditor() {
        if (typeof CKEDITOR !== 'undefined' && document.getElementById('content')) {
            CKEDITOR.replace('content', {
                height: 400,
                filebrowserUploadUrl: '{{ route("admin.ckeditor.upload") }}',
                filebrowserUploadMethod: 'form',
                filebrowserImageUploadUrl: '{{ route("admin.ckeditor.upload") }}',
                toolbar: 'Full'
            });
        } else if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initCKEditor);
        } else {
            setTimeout(initCKEditor, 100);
        }
    }
    initCKEditor();
})();
</script>
@endpush
@endsection
