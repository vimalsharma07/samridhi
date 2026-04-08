@extends('layouts.app')

@section('content')
{{-- banner-product-category.png — /products/{slug} (single product category) --}}
<section class="relative min-h-[280px] md:min-h-[340px] flex items-center overflow-hidden text-white">
    <div class="absolute inset-0 bg-[#1a1a1a]">
        <img src="{{ asset('images/banner-product-category.png') }}" alt="Steel manufacturing" class="absolute inset-0 w-full h-full object-cover object-center" fetchpriority="high" decoding="async">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-black/82 via-black/55 to-black/25 pointer-events-none" aria-hidden="true"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/45 to-transparent pointer-events-none" aria-hidden="true"></div>
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 lg:py-20">
        <nav class="flex flex-wrap items-center gap-2 text-sm text-white/85 mb-6 drop-shadow">
            <a href="{{ route('products') }}" class="hover:text-white transition-colors">Products</a>
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-white font-medium">{{ $product->title }}</span>
        </nav>
        <div class="max-w-3xl">
            <p class="text-[#F48C06] font-bold uppercase tracking-[0.18em] text-xs sm:text-sm drop-shadow">Product category</p>
            <h1 class="mt-3 text-3xl md:text-4xl lg:text-5xl font-bold leading-tight drop-shadow-[0_2px_20px_rgba(0,0,0,0.5)]">{{ $product->title }}</h1>
            @if($product->tagline)
            <p class="mt-4 text-lg md:text-xl text-white/95 drop-shadow-md">{{ $product->tagline }}</p>
            @elseif($product->short_description)
            <p class="mt-4 text-lg text-white/95 drop-shadow-md">{{ Str::limit($product->short_description, 220) }}</p>
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

{{-- FAQs --}}
@php $productFaqs = $product->faqsForDisplay(); @endphp
@if(count($productFaqs) > 0)
<style>
    .product-faq details > summary { list-style: none; }
    .product-faq details > summary::-webkit-details-marker { display: none; }
    .product-faq details[open] .product-faq-chevron { transform: rotate(180deg); }
    .product-faq details[open] > summary { border-bottom-color: rgb(229 231 235); }
</style>
<section class="relative py-14 md:py-20 bg-white">
    <div class="absolute inset-0 bg-[linear-gradient(180deg,#F8FAFC_0%,#ffffff_55%)] pointer-events-none" aria-hidden="true"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-10 lg:gap-14 items-start">
            <div class="lg:col-span-4">
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-10 h-1 rounded-full bg-[#E85D04]"></span>
                    <span class="text-[#E85D04] font-bold uppercase tracking-widest text-sm">Help</span>
                </div>
                <h2 class="text-2xl md:text-3xl font-bold text-[#1E3A8A] leading-tight">Frequently asked questions</h2>
                <p class="mt-4 text-gray-600 leading-relaxed">Quick answers about {{ $product->title }}. For detailed specs or pricing, reach out to our team.</p>
                <a href="{{ route('contact') }}" class="mt-6 inline-flex items-center gap-2 text-[#E85D04] font-semibold hover:text-[#D35400] transition-colors">
                    Still have questions?
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="lg:col-span-8 space-y-3 product-faq">
                @foreach($productFaqs as $i => $faq)
                <details class="group rounded-2xl border border-gray-200 bg-white shadow-sm hover:shadow-md hover:border-[#E85D04]/25 transition-all duration-300 overflow-hidden" @if($i === 0) open @endif>
                    <summary class="flex cursor-pointer items-center justify-between gap-4 px-5 py-4 text-left font-semibold text-[#1E3A8A] text-base sm:text-lg border-b border-transparent">
                        <span class="pr-2">{{ $faq['q'] }}</span>
                        <span class="product-faq-chevron flex-shrink-0 w-10 h-10 rounded-full bg-[#1E3A8A]/8 text-[#1E3A8A] flex items-center justify-center transition-transform duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </summary>
                    <div class="px-5 pb-5 pt-0 text-gray-600 text-sm sm:text-base leading-relaxed border-t border-gray-100">
                        <p class="pt-4">{{ $faq['a'] }}</p>
                    </div>
                </details>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

{{-- Related Blogs --}}
@if(isset($relatedBlogs) && $relatedBlogs->isNotEmpty())
<section class="py-14 md:py-20 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 mb-8">
            <span class="w-10 h-1 rounded-full bg-[#E85D04]"></span>
            <h2 class="text-2xl md:text-3xl font-bold text-[#1E3A8A]">Related Blogs</h2>
        </div>
        <p class="text-gray-600 mb-8 -mt-4">Latest news and updates related to {{ $product->title }}.</p>
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
