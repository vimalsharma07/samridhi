@extends('layouts.app')

@section('content')
{{-- banner-blog.png — /blog --}}
<section class="relative min-h-[260px] sm:min-h-[300px] md:min-h-[340px] flex items-center overflow-hidden text-white">
    <div class="absolute inset-0 bg-[#0a1628]">
        <img src="{{ asset('images/banner-blog.png') }}" alt="News and insights from Samridhi Pipes" class="absolute inset-0 w-full h-full object-cover object-left md:object-center" fetchpriority="high" decoding="async">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/40 to-black/15 pointer-events-none" aria-hidden="true"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/45 to-transparent pointer-events-none" aria-hidden="true"></div>
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-20">
        <div class="max-w-3xl">
            <p class="inline-flex items-center gap-2 text-[#F48C06] font-bold uppercase tracking-[0.2em] text-xs sm:text-sm drop-shadow">
                <span class="w-8 h-0.5 bg-[#E85D04] rounded-full" aria-hidden="true"></span>
                Insights
            </p>
            <h1 class="mt-4 text-3xl sm:text-4xl md:text-5xl font-bold leading-tight drop-shadow-[0_2px_20px_rgba(0,0,0,0.55)]">News &amp; Events</h1>
            <p class="mt-4 text-base sm:text-lg md:text-xl text-white/95 max-w-2xl drop-shadow-md border-l-4 border-[#E85D04]/90 pl-5">
                Latest updates, industry news and stories from Samridhi Pipes.
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($blogs as $blog)
            <a href="{{ route('blog.show', $blog->slug) }}" class="block group">
                <article class="rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="h-48 overflow-hidden">
                        @if($blog->featured_image)
                        <img src="{{ asset('uploads/' . $blog->featured_image) }}" alt="{{ $blog->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                        <div class="h-full bg-gradient-to-br from-[#1E3A8A] to-[#2563EB] flex items-center justify-center">
                            <span class="text-white/20 text-6xl font-bold">SP</span>
                        </div>
                        @endif
                    </div>
                    <div class="p-6 bg-white">
                        <p class="text-[#E85D04] font-semibold text-sm">
                            {{ $blog->published_at?->format('d M Y') ?? $blog->created_at->format('d M Y') }}
                        </p>
                        <h3 class="mt-2 text-xl font-bold text-[#1E3A8A] group-hover:text-[#E85D04] transition-colors">{{ $blog->title }}</h3>
                        <p class="mt-2 text-gray-600">{{ $blog->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($blog->content), 120) }}</p>
                    </div>
                </article>
            </a>
            @empty
            <div class="col-span-full text-center py-16 text-gray-500">
                <p class="text-lg">No blog posts yet. Check back soon!</p>
            </div>
            @endforelse
        </div>
        @if ($blogs->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $blogs->links() }}
        </div>
        @endif
    </div>
</section>
@endsection
