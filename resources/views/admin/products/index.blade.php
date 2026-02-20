@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Products</h1>
        <p class="mt-1 text-gray-600">Manage products shown on the website</p>
    </div>
    <a href="{{ route('admin.products.create') }}"
        class="px-4 py-2 bg-[#1E3A8A] hover:bg-[#152a6b] text-white font-semibold rounded-lg transition-colors">
        Add Product
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Slug</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($products as $product)
            <tr>
                <td class="px-6 py-4">
                    <span class="font-medium text-gray-900">{{ $product->title }}</span>
                </td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $product->slug }}</td>
                <td class="px-6 py-4">
                    @if($product->is_active)
                        <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded">Active</span>
                    @else
                        <span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded">Inactive</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $product->sort_order }}</td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('products') }}#{{ $product->slug }}" target="_blank"
                        class="text-[#1E3A8A] hover:underline text-sm">View</a>
                    <a href="{{ route('admin.products.edit', $product) }}"
                        class="text-[#1E3A8A] hover:underline text-sm">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline"
                        onsubmit="return confirm('Delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline text-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-gray-500">No products yet. Add your first product!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    @if ($products->hasPages())
    <div class="px-6 py-4 border-t">
        {{ $products->links() }}
    </div>
    @endif
</div>
@endsection
