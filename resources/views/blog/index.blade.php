@extends('layouts.app')

@section('content')
<section class="py-20 bg-[#1E3A8A] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold">News & Events</h1>
        <p class="mt-2 text-white/90">Latest updates from Samridhi Pipes</p>
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
