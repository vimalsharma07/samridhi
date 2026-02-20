@extends('admin.layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Add Product</h1>
    <p class="mt-1 text-gray-600">Create a new product for the website</p>
</div>

<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data"
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
            placeholder="e.g. HR Pipes & Tubes">
    </div>

    <div>
        <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
        <textarea name="short_description" id="short_description" rows="2"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
            placeholder="Brief summary (used in listings)">{{ old('short_description') }}</textarea>
    </div>

    <div>
        <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
        <input type="file" name="featured_image" id="featured_image" accept="image/*"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent">
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
        <textarea name="description" id="description" rows="15">{{ old('description') }}</textarea>
        <p class="mt-1 text-sm text-gray-500">Full product description with formatting and images (optional)</p>
    </div>

    <div>
        <label for="applications_text" class="block text-sm font-medium text-gray-700 mb-2">Applications</label>
        <textarea name="applications_text" id="applications_text" rows="4"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent"
            placeholder="One per line, e.g.&#10;Structural frameworks&#10;Mechanical applications&#10;Agriculture">{{ old('applications_text') }}</textarea>
        <p class="mt-1 text-sm text-gray-500">One application per line; shown as bullet points on the product page</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
            <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1E3A8A] focus:border-transparent">
        </div>
        <div class="flex items-end">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                    class="rounded border-gray-300 text-[#1E3A8A] focus:ring-[#1E3A8A]">
                <span class="ml-2 text-sm text-gray-700">Active (show on website)</span>
            </label>
        </div>
    </div>

    <div class="flex gap-3">
        <button type="submit"
            class="px-6 py-2 bg-[#1E3A8A] hover:bg-[#152a6b] text-white font-semibold rounded-lg transition-colors">
            Create Product
        </button>
        <a href="{{ route('admin.products.index') }}"
            class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
            Cancel
        </a>
    </div>
</form>

@push('head-scripts')
<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
@endpush
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var el = document.getElementById('description');
    if (el && typeof CKEDITOR !== 'undefined') {
        CKEDITOR.replace('description', {
            height: 450,
            filebrowserUploadUrl: '{{ route("admin.ckeditor.upload") }}',
            filebrowserUploadMethod: 'form',
            filebrowserImageUploadUrl: '{{ route("admin.ckeditor.upload") }}',
            toolbar: 'Full'
        });
    }
});
</script>
@endpush
@endsection
