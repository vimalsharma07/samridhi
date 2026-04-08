@extends('layouts.app')

@section('content')
{{-- banner-careers.png — /careers --}}
<section class="relative min-h-[280px] sm:min-h-[320px] md:min-h-[380px] flex items-center overflow-hidden text-white">
    <div class="absolute inset-0 bg-[#1a1a1a]">
        <img src="{{ asset('images/banner-careers.png') }}" alt="Samridhi Pipes team" class="absolute inset-0 w-full h-full object-cover object-center" fetchpriority="high" decoding="async">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/55 to-black/35 pointer-events-none" aria-hidden="true"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-transparent to-black/25 pointer-events-none" aria-hidden="true"></div>
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-20">
        <div class="max-w-3xl">
            <p class="inline-flex items-center gap-2 text-[#F48C06] font-bold uppercase tracking-[0.2em] text-xs sm:text-sm drop-shadow">
                <span class="w-8 h-0.5 bg-[#E85D04] rounded-full" aria-hidden="true"></span>
                Join us
            </p>
            <h1 class="mt-4 text-3xl sm:text-4xl md:text-5xl font-bold leading-tight drop-shadow-[0_2px_24px_rgba(0,0,0,0.5)]">Careers</h1>
            <p class="mt-4 text-base sm:text-lg md:text-xl text-white/95 max-w-2xl drop-shadow-md border-l-4 border-[#E85D04]/90 pl-5">
                Join our team of 700+ professionals — grow with a leading steel pipe manufacturer.
            </p>
            <a href="mailto:careers@samridhipipes.com" class="mt-8 inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-[#E85D04] hover:bg-[#D35400] text-white font-semibold text-sm shadow-lg shadow-black/25 transition-colors">
                Send your resume
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </a>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            <h2 class="text-2xl font-bold text-[#1E3A8A]">Build Your Career with Samridhi</h2>
            <p class="text-gray-600">At Samridhi Pipes, we believe our people are our greatest asset. We offer a dynamic work environment, opportunities for growth, and a culture that values innovation and excellence.</p>
            <h3 class="text-xl font-bold text-[#1E3A8A] mt-12">Why Join Us?</h3>
            <ul class="space-y-3 text-gray-600">
                <li>Growth opportunities in a leading steel manufacturing company</li>
                <li>Competitive compensation and benefits</li>
                <li>Safe and modern work environment</li>
                <li>Training and development programs</li>
            </ul>
            <div class="mt-12 p-8 rounded-2xl bg-[#F8FAFC]">
                <h3 class="text-xl font-bold text-[#1E3A8A]">Current Openings</h3>
                <p class="mt-2 text-gray-600">We are always looking for talented individuals. Send your resume to <a href="mailto:careers@samridhipipes.com" class="text-[#E85D04] font-semibold">careers@samridhipipes.com</a></p>
            </div>
        </div>
    </div>
</section>
@endsection
