@extends('layouts.app')

@section('content')
{{-- Hero: banner image + overlay (text left; artwork on right stays visible) --}}
<section class="relative min-h-[320px] sm:min-h-[380px] md:min-h-[440px] flex items-center overflow-hidden text-white">
    <div class="absolute inset-0 bg-[#1a1a1a]">
        <img src="{{ asset('images/about-hero-banner.png') }}" alt="Samridhi Pipes — steel map of India and coil" class="absolute inset-0 w-full h-full object-cover object-center" fetchpriority="high" decoding="async">
    </div>
    {{-- Readability: darken left/center where copy sits; keep right side of artwork visible --}}
    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/55 to-black/20 pointer-events-none" aria-hidden="true"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-black/30 pointer-events-none" aria-hidden="true"></div>
    <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-[#E85D04]/15 to-transparent pointer-events-none" aria-hidden="true"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 lg:py-28">
        <div class="max-w-2xl lg:max-w-[52%]">
            <p class="inline-flex items-center gap-2 text-[#F48C06] font-bold uppercase tracking-[0.22em] text-xs sm:text-sm drop-shadow-md">
                <span class="w-8 h-0.5 bg-[#E85D04] rounded-full" aria-hidden="true"></span>
                About Samridhi
            </p>
            <h1 class="mt-5 text-3xl sm:text-4xl md:text-5xl lg:text-[2.75rem] font-bold leading-[1.15] tracking-tight drop-shadow-[0_2px_24px_rgba(0,0,0,0.45)]">
                Build a Strong Future <span class="text-[#F48C06]">With Us</span>
            </h1>
            <p class="mt-6 text-base sm:text-lg md:text-xl text-white/95 leading-relaxed drop-shadow-md border-l-4 border-[#E85D04]/90 pl-5 sm:pl-6">
                Company Overview, Leadership, Vision &amp; Mission, and Our Commitment to Excellence.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="#overview" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-[#E85D04] hover:bg-[#D35400] text-white font-semibold text-sm shadow-lg shadow-black/20 transition-colors">
                    Explore sections
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 rounded-xl bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/25 text-white font-semibold text-sm transition-colors">
                    Contact us
                </a>
            </div>
        </div>
    </div>
</section>

@php
    $sections = [
        'overview' => ['title' => 'Company Overview', 'id' => 'overview', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
        'management' => ['title' => 'Management', 'id' => 'management', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
        'vision' => ['title' => 'Vision & Mission', 'id' => 'vision', 'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'],
        'awards' => ['title' => 'Awards & Recognition', 'id' => 'awards', 'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
        'csr' => ['title' => 'CSR', 'id' => 'csr', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
    ];
@endphp

<section class="py-16 lg:py-20 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-4 gap-10 lg:gap-12">
            {{-- Sidebar: sticky nav with icons --}}
            <aside class="lg:sticky lg:top-28 self-start order-2 lg:order-1">
                <nav class="rounded-2xl bg-white p-2 shadow-lg shadow-gray-200/50 border border-gray-100 overflow-hidden">
                    @foreach($sections as $sec)
                    <a href="#{{ $sec['id'] }}" data-section="{{ $sec['id'] }}" class="about-nav flex items-center gap-3 px-4 py-3.5 rounded-xl text-gray-600 transition-all duration-300 hover:bg-[#1E3A8A]/5 hover:text-[#1E3A8A]">
                        <span class="flex-shrink-0 w-9 h-9 rounded-lg bg-gray-100 flex items-center justify-center transition-colors duration-300 about-nav-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $sec['icon'] }}"/></svg>
                        </span>
                        <span class="font-medium text-sm">{{ $sec['title'] }}</span>
                    </a>
                    @endforeach
                </nav>
            </aside>

            <div class="lg:col-span-3 space-y-20 lg:space-y-28 order-1 lg:order-2">
                {{-- Overview --}}
                <div id="overview" class="scroll-mt-24 scroll-reveal">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="w-12 h-12 rounded-xl bg-[#1E3A8A] text-white flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </span>
                        <h2 class="text-3xl font-bold text-[#1E3A8A]">Company Overview</h2>
                    </div>
                    <p class="text-gray-600 text-lg leading-relaxed">Samridhi Pipes Industries Ltd is renowned for manufacturing high-quality HR Pipes, GI Pipes, GP Pipes, MS Pipes, HR Coils, and Billets that exemplify precision engineering and enduring strength. Established with a vision to contribute to India's infrastructure growth, we have grown into a trusted name in the steel pipe manufacturing industry.</p>
                    <p class="mt-5 text-gray-600 text-lg leading-relaxed">Our state-of-the-art manufacturing facilities are equipped with the latest technology, ensuring consistent quality and timely delivery. We serve diverse industries including agriculture, infrastructure, construction, and power sectors across India and beyond.</p>
                    <div class="mt-10 grid sm:grid-cols-2 gap-6">
                        <div class="group p-6 rounded-2xl bg-white border border-gray-100 shadow-md hover:shadow-xl hover:border-[#E85D04]/20 transition-all duration-300 hover:-translate-y-1">
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#E85D04] to-[#F48C06] text-white flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                            </div>
                            <h3 class="font-bold text-[#1E3A8A] text-lg">Our Journey</h3>
                            <p class="mt-2 text-gray-600">From a modest beginning to becoming one of the leading steel pipe manufacturers, our journey reflects our commitment to excellence and innovation.</p>
                        </div>
                        <div class="group p-6 rounded-2xl bg-white border border-gray-100 shadow-md hover:shadow-xl hover:border-[#1E3A8A]/20 transition-all duration-300 hover:-translate-y-1">
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#1E3A8A] to-[#2563EB] text-white flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                            </div>
                            <h3 class="font-bold text-[#1E3A8A] text-lg">Core Values</h3>
                            <p class="mt-2 text-gray-600">Integrity, Quality, Innovation, and Customer Focus form the cornerstone of everything we do.</p>
                        </div>
                    </div>
                </div>

                {{-- Management --}}
                <div id="management" class="scroll-mt-24 scroll-reveal">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="w-12 h-12 rounded-xl bg-[#1E3A8A] text-white flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </span>
                        <h2 class="text-3xl font-bold text-[#1E3A8A]">Management</h2>
                    </div>
                    <div class="rounded-2xl bg-white p-8 shadow-lg shadow-gray-200/50 border border-gray-100">
                        <p class="text-gray-600 text-lg leading-relaxed">Our leadership team brings decades of combined experience in the steel industry. Guided by a vision of sustainable growth and industry leadership, they steer Samridhi Pipes towards new milestones.</p>
                        <p class="mt-5 text-gray-600 text-lg leading-relaxed">The management is committed to maintaining the highest standards of corporate governance, transparency, and stakeholder value creation.</p>
                    </div>
                </div>

                {{-- Vision & Mission --}}
                <div id="vision" class="scroll-mt-24 scroll-reveal">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="w-12 h-12 rounded-xl bg-[#1E3A8A] text-white flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </span>
                        <h2 class="text-3xl font-bold text-[#1E3A8A]">Vision & Mission</h2>
                    </div>
                    <div class="space-y-6">
                        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#1E3A8A]/10 to-[#1E3A8A]/5 border-l-4 border-[#1E3A8A] p-8 shadow-md hover:shadow-lg transition-shadow duration-300">
                            <h3 class="font-bold text-[#1E3A8A] text-xl">Vision</h3>
                            <p class="mt-3 text-gray-600 text-lg leading-relaxed">To achieve sustainable growth and industry leadership through geographical and value-added product portfolio expansion. To relentlessly work to ensure that every stakeholder benefits in our growth journey.</p>
                        </div>
                        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#E85D04]/10 to-[#F48C06]/5 border-l-4 border-[#E85D04] p-8 shadow-md hover:shadow-lg transition-shadow duration-300">
                            <h3 class="font-bold text-[#E85D04] text-xl">Mission</h3>
                            <p class="mt-3 text-gray-600 text-lg leading-relaxed">To meet the highest standards of customer expectations in terms of quality products, service, experience and trust.</p>
                        </div>
                    </div>
                </div>

                {{-- Awards --}}
                <div id="awards" class="scroll-mt-24 scroll-reveal">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="w-12 h-12 rounded-xl bg-[#1E3A8A] text-white flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        </span>
                        <h2 class="text-3xl font-bold text-[#1E3A8A]">Awards & Recognition</h2>
                    </div>
                    <p class="text-gray-600 text-lg leading-relaxed mb-8">Samridhi Pipes has been recognized by industry bodies and customers for our commitment to quality and excellence. Our certifications and accolades reflect our dedication to maintaining the highest standards.</p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-4 p-4 rounded-xl bg-white border border-gray-100 shadow-sm hover:shadow-md hover:border-[#E85D04]/30 transition-all duration-300 group">
                            <span class="flex-shrink-0 w-10 h-10 rounded-full bg-[#E85D04]/10 text-[#E85D04] flex items-center justify-center group-hover:bg-[#E85D04] group-hover:text-white transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </span>
                            <span class="text-gray-700 font-medium">ISI Certified Products</span>
                        </li>
                        <li class="flex items-center gap-4 p-4 rounded-xl bg-white border border-gray-100 shadow-sm hover:shadow-md hover:border-[#E85D04]/30 transition-all duration-300 group">
                            <span class="flex-shrink-0 w-10 h-10 rounded-full bg-[#E85D04]/10 text-[#E85D04] flex items-center justify-center group-hover:bg-[#E85D04] group-hover:text-white transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </span>
                            <span class="text-gray-700 font-medium">BS Standards Compliance</span>
                        </li>
                        <li class="flex items-center gap-4 p-4 rounded-xl bg-white border border-gray-100 shadow-sm hover:shadow-md hover:border-[#E85D04]/30 transition-all duration-300 group">
                            <span class="flex-shrink-0 w-10 h-10 rounded-full bg-[#E85D04]/10 text-[#E85D04] flex items-center justify-center group-hover:bg-[#E85D04] group-hover:text-white transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </span>
                            <span class="text-gray-700 font-medium">Industry Excellence Awards</span>
                        </li>
                    </ul>
                </div>

                {{-- CSR --}}
                <div id="csr" class="scroll-mt-24 scroll-reveal">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="w-12 h-12 rounded-xl bg-[#1E3A8A] text-white flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </span>
                        <h2 class="text-3xl font-bold text-[#1E3A8A]">Corporate Social Responsibility</h2>
                    </div>
                    <div class="rounded-2xl bg-white p-8 shadow-lg shadow-gray-200/50 border border-gray-100">
                        <p class="text-gray-600 text-lg leading-relaxed">At Samridhi Pipes, we believe in giving back to the community. Our CSR initiatives focus on education, healthcare, environmental sustainability, and community development.</p>
                        <p class="mt-5 text-gray-600 text-lg leading-relaxed">We regularly organize blood donation camps, health awareness programs, and support local educational institutions. Our commitment to sustainability drives our efforts in reducing environmental impact and promoting recycling.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
(function() {
    var navLinks = document.querySelectorAll('.about-nav');
    var sections = document.querySelectorAll('[id="overview"], [id="management"], [id="vision"], [id="awards"], [id="csr"]');

    function setActive() {
        var scrollY = window.scrollY;
        var headerOffset = 140;
        var current = '';
        sections.forEach(function(section) {
            var top = section.offsetTop - headerOffset;
            var height = section.offsetHeight;
            if (scrollY >= top && scrollY < top + height) {
                current = section.getAttribute('id');
            }
        });
        if (!current && sections.length) {
            var firstTop = sections[0].offsetTop - headerOffset;
            if (scrollY < firstTop) current = sections[0].getAttribute('id');
            else current = sections[sections.length - 1].getAttribute('id');
        }
        navLinks.forEach(function(link) {
            var isActive = link.getAttribute('data-section') === current;
            link.classList.toggle('bg-[#E85D04]', isActive);
            link.classList.toggle('text-white', isActive);
            link.classList.toggle('hover:bg-[#1E3A8A]/5', !isActive);
            link.classList.toggle('hover:text-[#1E3A8A]', !isActive);
            link.classList.toggle('text-gray-600', !isActive);
            var icon = link.querySelector('.about-nav-icon');
            if (icon) {
                icon.classList.toggle('bg-[#E85D04]/20', isActive);
                icon.classList.toggle('bg-white/20', isActive);
                icon.classList.toggle('bg-gray-100', !isActive);
            }
        });
    }
    setActive();
    window.addEventListener('scroll', function() { requestAnimationFrame(setActive); });
})();
</script>
@endpush
@endsection
