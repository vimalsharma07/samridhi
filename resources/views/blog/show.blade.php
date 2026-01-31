@extends('layouts.app')

@section('content')
<section class="py-20 bg-[#1E3A8A] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-[#F48C06] font-semibold text-sm">{{ $blog->published_at?->format('d M Y') ?? $blog->created_at->format('d M Y') }}</p>
        <h1 class="text-4xl font-bold mt-2">{{ $blog->title }}</h1>
        @if($blog->excerpt)
        <p class="mt-2 text-white/90">{{ $blog->excerpt }}</p>
        @endif
    </div>
</section>

<article class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($blog->featured_image)
        <img src="{{ asset('uploads/' . $blog->featured_image) }}" alt="{{ $blog->title }}"
            class="w-full rounded-2xl shadow-lg mb-8 object-cover h-96">
        @endif
        <div class="prose prose-lg max-w-none prose-headings:text-[#1E3A8A] prose-a:text-[#E85D04]">
            {!! $blog->content !!}
        </div>
        <div class="mt-12 pt-8 border-t">
            <a href="{{ route('blog') }}" class="text-[#1E3A8A] font-semibold hover:text-[#E85D04] transition-colors">
                ← Back to News & Events
            </a>
        </div>
    </div>
</article>
@endsection
