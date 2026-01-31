@extends('layouts.app')

@section('content')
<section class="py-20 bg-[#1E3A8A] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold">Investors</h1>
        <p class="mt-2 text-white/90">Corporate governance, financial info & announcements</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <a href="#" class="block p-8 rounded-2xl bg-[#F8FAFC] hover:bg-[#1E3A8A] hover:text-white transition-all duration-300 group">
                <svg class="w-12 h-12 text-[#E85D04] group-hover:text-[#F48C06]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <h3 class="mt-4 font-bold text-lg">Financial Info</h3>
                <p class="mt-2 text-gray-600 group-hover:text-white/90 text-sm">Annual reports, quarterly results</p>
            </a>
            <a href="#" class="block p-8 rounded-2xl bg-[#F8FAFC] hover:bg-[#1E3A8A] hover:text-white transition-all duration-300 group">
                <svg class="w-12 h-12 text-[#E85D04] group-hover:text-[#F48C06]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                <h3 class="mt-4 font-bold text-lg">Corporate Governance</h3>
                <p class="mt-2 text-gray-600 group-hover:text-white/90 text-sm">Policies & committees</p>
            </a>
            <a href="#" class="block p-8 rounded-2xl bg-[#F8FAFC] hover:bg-[#1E3A8A] hover:text-white transition-all duration-300 group">
                <svg class="w-12 h-12 text-[#E85D04] group-hover:text-[#F48C06]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                <h3 class="mt-4 font-bold text-lg">Announcements</h3>
                <p class="mt-2 text-gray-600 group-hover:text-white/90 text-sm">Latest updates</p>
            </a>
            <a href="{{ route('contact') }}" class="block p-8 rounded-2xl bg-[#F8FAFC] hover:bg-[#1E3A8A] hover:text-white transition-all duration-300 group">
                <svg class="w-12 h-12 text-[#E85D04] group-hover:text-[#F48C06]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <h3 class="mt-4 font-bold text-lg">Investor Contact</h3>
                <p class="mt-2 text-gray-600 group-hover:text-white/90 text-sm">Get in touch</p>
            </a>
        </div>
    </div>
</section>
@endsection
