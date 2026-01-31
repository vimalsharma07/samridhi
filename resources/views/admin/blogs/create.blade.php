@extends('admin.layouts.app')

@section('title', 'Create Blog Post')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Create Blog Post</h1>
    <p class="mt-1 text-gray-600">Add a new news or blog article</p>
</div>

<form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data"
    class="bg-white rounded-xl shadow p-6 space-y-6">
    @csrf

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
        <input type="text" name="title" id="title" value="{{ old('title') }}" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
            placeholder="Blog post title">
    </div>

    <div>
        <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
        <textarea name="excerpt" id="excerpt" rows="2"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
            placeholder="Short summary for listing pages">{{ old('excerpt') }}</textarea>
    </div>

    <div>
        <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
        <input type="file" name="featured_image" id="featured_image" accept="image/*"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent">
    </div>

    <div>
        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
        <textarea name="content" id="content" class="ckeditor-content">{{ old('content') }}</textarea>
    </div>

    <div>
        <label class="flex items-center">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }}
                class="rounded border-gray-300 text-[#1E3A8A] focus:ring-[#1E3A8A]">
            <span class="ml-2 text-sm text-gray-700">Publish immediately</span>
        </label>
    </div>

    <div class="flex gap-3">
        <button type="submit"
            class="px-6 py-2 bg-[#1E3A8A] hover:bg-[#152a6b] text-white font-semibold rounded-lg transition-colors">
            Create Post
        </button>
        <a href="{{ route('admin.blogs.index') }}"
            class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
            Cancel
        </a>
    </div>
</form>

@push('scripts')
<script src="https://cdn.ckeditor.com/4.23.0/full/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: '{{ route("admin.ckeditor.upload") }}',
        filebrowserUploadMethod: 'form',
        height: 400,
        toolbar: [
            { name: 'document', items: ['Source'] },
            { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
            { name: 'editing', items: ['Find', 'Replace'] },
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
            { name: 'links', items: ['Link', 'Unlink'] },
            { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] },
            { name: 'styles', items: ['Format', 'Font', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] }
        ]
    });
});
</script>
@endpush
@endsection
