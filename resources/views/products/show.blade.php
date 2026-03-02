@extends('layouts.app')

@section('content')
{{-- Hero --}}
<section class="py-16 md:py-20 bg-[#1E3A8A] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm text-white/80 mb-4">
            <a href="{{ route('products') }}" class="hover:text-white transition-colors">Products</a>
            <span class="mx-2">/</span>
            <span class="text-white">{{ $product->title }}</span>
        </nav>
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold">{{ $product->title }}</h1>
        @if($product->tagline)
        <p class="mt-3 text-lg md:text-xl text-white/90 max-w-3xl">{{ $product->tagline }}</p>
        @elseif($product->short_description)
        <p class="mt-3 text-lg text-white/90 max-w-3xl">{{ Str::limit($product->short_description, 180) }}</p>
        @endif
    </div>
</section>

{{-- Featured image + intro --}}
@if($product->featured_image)
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl overflow-hidden shadow-xl">
            <img src="{{ asset('uploads/' . $product->featured_image) }}" alt="{{ $product->title }}"
                class="w-full h-auto object-cover max-h-[28rem]">
        </div>
    </div>
</section>
@endif

{{-- Main description (CKEditor content) --}}
@if($product->description)
<section class="py-12 bg-white border-t border-gray-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none prose-headings:text-[#1E3A8A] prose-a:text-[#E85D04] prose-img:rounded-xl">
            {!! $product->description !!}
        </div>
    </div>
</section>
@endif

{{-- Gallery --}}
@if($product->images && count($product->images) > 0)
<section class="py-12 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-[#1E3A8A] mb-6">Product Gallery</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($product->images as $img)
            <div class="rounded-xl overflow-hidden shadow-md bg-white aspect-square">
                <img src="{{ asset('uploads/' . $img) }}" alt="{{ $product->title }}"
                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- General Applications --}}
@if($product->applications && count($product->applications) > 0)
<section class="py-12 bg-white border-t border-gray-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-[#1E3A8A] mb-6">General Applications</h2>
        <ul class="grid sm:grid-cols-2 gap-3">
            @foreach($product->applications as $app)
            <li class="flex items-center gap-3 text-gray-700">
                <span class="flex-shrink-0 w-6 h-6 rounded-full bg-[#E85D04]/20 flex items-center justify-center">
                    <svg class="w-4 h-4 text-[#E85D04]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </span>
                {{ $app }}
            </li>
            @endforeach
        </ul>
    </div>
</section>
@endif

{{-- Related Blogs (ref: image + orange panel with title, points, READ MORE) --}}
@if(isset($relatedBlogs) && $relatedBlogs->isNotEmpty())
<section class="py-16 bg-[#F8FAFC] border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl md:text-3xl font-bold text-[#1E3A8A] mb-2">Related Blogs</h2>
        <p class="text-gray-600 mb-10">Latest news and updates related to {{ $product->title }}.</p>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($relatedBlogs as $blog)
            <a href="{{ route('blog.show', $blog->slug) }}" class="group block rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 bg-white">
                {{-- Top: image (~65% visual weight) --}}
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
                {{-- Bottom: orange panel with title, points, READ MORE --}}
                <div class="relative bg-[#C2410C] text-white p-6 rounded-b-2xl overflow-hidden" style="border-radius: 0 0 1rem 1rem;">
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
<section class="py-16 bg-[#1E3A8A] text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl font-bold">Need specifications or a quote?</h2>
        <p class="mt-2 text-white/90">Contact our team for product details, technical specs, and dealer enquiries.</p>
        <a href="{{ route('contact') }}" class="inline-flex mt-6 px-8 py-4 bg-[#E85D04] hover:bg-[#D35400] text-white font-semibold rounded-lg transition-colors">
            Enquire Now
        </a>
    </div>
</section>
@endsection
