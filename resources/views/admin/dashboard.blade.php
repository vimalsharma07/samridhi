@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
    <p class="mt-1 text-gray-600">Welcome back, {{ auth()->user()->name }}</p>
</div>

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold text-gray-700">Total Blog Posts</h3>
        <p class="mt-2 text-3xl font-bold text-[#1E3A8A]">{{ $blogCount ?? 0 }}</p>
    </div>
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold text-gray-700">Published Posts</h3>
        <p class="mt-2 text-3xl font-bold text-green-600">{{ $publishedCount ?? 0 }}</p>
    </div>
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold text-gray-700">Quick Actions</h3>
        <div class="mt-3 space-y-2">
            <a href="{{ route('admin.settings.index') }}" class="block text-[#1E3A8A] hover:underline">Update Website Settings</a>
            <a href="{{ route('admin.blogs.create') }}" class="block text-[#1E3A8A] hover:underline">Create New Blog Post</a>
        </div>
    </div>
</div>
@endsection
