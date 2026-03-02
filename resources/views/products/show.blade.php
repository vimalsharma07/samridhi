@extends('layouts.app')

@section('content')
{{-- Hero with breadcrumb --}}
<section class="relative py-14 md:py-20 bg-gradient-to-br from-[#1E3A8A] via-[#1D3A8F] to-[#152a6b] text-white overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#E85D04] rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-sm text-white/80 mb-6">
            <a href="{{ route('products') }}" class="hover:text-white transition-colors">Products</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-white font-medium">{{ $product->title }}</span>
        </nav>
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-14 items-center">
            <div>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight">{{ $product->title }}</h1>
                @if($product->tagline)
                <p class="mt-4 text-lg md:text-xl text-white/90">{{ $product->tagline }}</p>
                @elseif($product->short_description)
                <p class="mt-4 text-lg text-white/90">{{ Str::limit($product->short_description, 200) }}</p>
                @endif
            </div>
            @if($product->featured_image)
            <div class="relative order-first lg:order-none">
                <div class="rounded-2xl overflow-hidden shadow-2xl ring-2 ring-white/10">
                    <img src="{{ asset('uploads/' . $product->featured_image) }}" alt="{{ $product->title }}"
                        class="w-full h-auto object-cover max-h-80 lg:max-h-96">
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

{{-- Product Overview: two-column on large (description + highlights) --}}
@if($product->description || $product->short_description)
<section class="py-14 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-10 lg:gap-12">
            <div class="lg:col-span-8">
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-10 h-1 rounded-full bg-[#E85D04]"></span>
                    <h2 class="text-2xl md:text-3xl font-bold text-[#1E3A8A]">Product Overview</h2>
                </div>
                <div class="prose prose-lg max-w-none prose-headings:text-[#1E3A8A] prose-headings:font-bold prose-a:text-[#E85D04] prose-img:rounded-xl prose-p:text-gray-600 prose-li:text-gray-600">
                    @if($product->description)
                    {!! $product->description !!}
                    @else
                    <p class="text-gray-600">{{ $product->short_description }}</p>
                    @endif
                </div>
            </div>
            <div class="lg:col-span-4">
                <div class="lg:sticky lg:top-28 space-y-6">
                    @if($product->short_description && $product->description)
                    <div class="p-6 rounded-2xl bg-[#F8FAFC] border border-gray-100">
                        <h3 class="font-bold text-[#1E3A8A] mb-2">At a glance</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ Str::limit($product->short_description, 160) }}</p>
                    </div>
                    @endif
                    <div class="p-6 rounded-2xl bg-[#1E3A8A] text-white">
                    <h3 class="font-bold text-lg mb-4">Interested in this product?</h3>
                    <p class="text-white/90 text-sm mb-4">Get specifications, pricing, or connect with our team.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 w-full px-4 py-3 bg-[#E85D04] hover:bg-[#D35400] text-white font-semibold rounded-lg transition-colors">
                        Enquire Now
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- Gallery --}}
@if($product->images && count($product->images) > 0)
<section class="py-14 md:py-20 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 mb-8">
            <span class="w-10 h-1 rounded-full bg-[#E85D04]"></span>
            <h2 class="text-2xl md:text-3xl font-bold text-[#1E3A8A]">Product Gallery</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($product->images as $img)
            <div class="rounded-xl overflow-hidden shadow-md bg-white group">
                <img src="{{ asset('uploads/' . $img) }}" alt="{{ $product->title }}"
                    class="w-full aspect-square object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- General Applications: icon cards --}}
@if($product->applications && count($product->applications) > 0)
<section class="py-14 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 mb-8">
            <span class="w-10 h-1 rounded-full bg-[#E85D04]"></span>
            <h2 class="text-2xl md:text-3xl font-bold text-[#1E3A8A]">General Applications</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($product->applications as $app)
            <div class="flex items-center gap-4 p-4 rounded-xl bg-[#F8FAFC] border border-gray-100 hover:border-[#E85D04]/30 hover:shadow-md transition-all duration-300 group">
                <span class="flex-shrink-0 w-12 h-12 rounded-xl bg-[#E85D04]/10 text-[#E85D04] flex items-center justify-center group-hover:bg-[#E85D04] group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </span>
                <span class="font-medium text-gray-800 text-sm">{{ $app }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Related Blogs --}}
@if(isset($relatedBlogs) && $relatedBlogs->isNotEmpty())
<section class="py-14 md:py-20 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 mb-8">
            
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($relatedBlogs as $blog)
            <a href="{{ route('blog.show', $blog->slug) }}" class="group block rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 bg-white">
                <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                    @if($blog->featured_image)
                    <img src="{{ asset('uploads/' . $blog->featured_image) }}" alt="{{ $blog->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-[#1E3A8A] to-[#2563EB] flex items-center justify-center">
                        <span class="text-white/20 text-5xl font-bold">SP</span>
                    </div>
                    @endif
                </div>
                <div class="relative bg-[#C2410C] text-white p-6 rounded-b-2xl overflow-hidden">
                    <div class="absolute bottom-0 right-0 w-24 h-24 bg-white/5 rounded-tl-full"></div>
                    <h3 class="text-xl font-bold text-white relative">{{ $blog->product_detail_title ?? $blog->title }}</h3>
                    @php $points = $blog->product_detail_points_array; @endphp
                    @if(count($points) > 0)
                    <ul class="mt-4 space-y-2 text-white/95 text-sm relative">
                        @foreach(array_slice($points, 0, 5) as $point)
                        <li class="flex items-start gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-white flex-shrink-0 mt-1.5"></span>
                            <span>{{ $point }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <p class="mt-4 text-white/95 text-sm relative">{{ \Illuminate\Support\Str::limit($blog->excerpt ?? strip_tags($blog->content), 150) }}</p>
                    @endif
                    <span class="mt-5 inline-flex items-center gap-2 px-4 py-2.5 bg-white text-[#C2410C] font-semibold rounded-lg text-sm shadow-md group-hover:bg-gray-50 transition-colors relative">
                        READ MORE
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </span>
                </div>
            </a>
            @endforeach
        </div>
        <div class="mt-10 text-center">
            <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 text-[#1E3A8A] font-semibold hover:text-[#E85D04] transition-colors">
                View all News & Events
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="py-16 md:py-20 bg-gradient-to-br from-[#1E3A8A] to-[#152a6b] text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-bold">Need specifications or a quote?</h2>
        <p class="mt-3 text-lg text-white/90">Contact our team for product details, technical specs, and dealer enquiries.</p>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-[#E85D04] hover:bg-[#D35400] text-white font-semibold rounded-lg transition-colors shadow-lg shadow-[#E85D04]/25">
                Enquire Now
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="{{ route('products') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-lg border border-white/30 transition-colors">
                View All Products
            </a>
        </div>
    </div>
</section>
@endsection
