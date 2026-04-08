@extends('layouts.app')

@section('content')
{{-- banner-quality.png — /quality --}}
<section class="relative min-h-[300px] sm:min-h-[360px] md:min-h-[400px] flex items-center overflow-hidden text-white">
    <div class="absolute inset-0 bg-[#1a1a1a]">
        <img src="{{ asset('images/banner-quality.png') }}" alt="Quality — strength, ductility, welding and machinability" class="absolute inset-0 w-full h-full object-cover object-center" fetchpriority="high" decoding="async">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-black/78 via-black/45 to-transparent pointer-events-none" aria-hidden="true"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-black/20 pointer-events-none" aria-hidden="true"></div>
    <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-[#E85D04]/10 to-transparent pointer-events-none" aria-hidden="true"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20 lg:py-24">
        <div class="max-w-2xl lg:max-w-[48%]">
            <p class="inline-flex items-center gap-2 text-[#F48C06] font-bold uppercase tracking-[0.22em] text-xs sm:text-sm drop-shadow-md">
                <span class="w-8 h-0.5 bg-[#E85D04] rounded-full" aria-hidden="true"></span>
                Quality
            </p>
            <h1 class="mt-5 text-3xl sm:text-4xl md:text-5xl lg:text-[2.75rem] font-bold leading-[1.15] tracking-tight drop-shadow-[0_2px_24px_rgba(0,0,0,0.45)]">
                Excellence in <span class="text-[#F48C06]">Every Step</span>
            </h1>
            <p class="mt-6 text-base sm:text-lg md:text-xl text-white/95 leading-relaxed drop-shadow-md border-l-4 border-[#E85D04]/90 pl-5 sm:pl-6">
                Rigorous quality control, international standards, and a commitment to delivering the finest steel pipes and tubes.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="#control" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-[#E85D04] hover:bg-[#D35400] text-white font-semibold text-sm shadow-lg shadow-black/20 transition-colors">
                    Explore quality
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
        'control' => ['title' => 'Quality Control', 'id' => 'control', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4'],
        'standards' => ['title' => 'Quality Standards', 'id' => 'standards', 'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
        'process' => ['title' => 'Our Process', 'id' => 'process', 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'],
        'certifications' => ['title' => 'Certifications', 'id' => 'certifications', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
    ];
@endphp

<section class="py-16 lg:py-20 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-4 gap-10 lg:gap-12">
            <aside class="lg:sticky lg:top-28 self-start order-2 lg:order-1">
                <nav class="rounded-2xl bg-white p-2 shadow-lg shadow-gray-200/50 border border-gray-100 overflow-hidden">
                    @foreach($sections as $sec)
                    <a href="#{{ $sec['id'] }}" data-section="{{ $sec['id'] }}" class="quality-nav flex items-center gap-3 px-4 py-3.5 rounded-xl text-gray-600 transition-all duration-300 hover:bg-[#1E3A8A]/5 hover:text-[#1E3A8A]">
                        <span class="flex-shrink-0 w-9 h-9 rounded-lg bg-gray-100 flex items-center justify-center transition-colors duration-300 quality-nav-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $sec['icon'] }}"/></svg>
                        </span>
                        <span class="font-medium text-sm">{{ $sec['title'] }}</span>
                    </a>
                    @endforeach
                </nav>
            </aside>

            <div class="lg:col-span-3 space-y-20 lg:space-y-28 order-1 lg:order-2">
                {{-- Quality Control --}}
                <div id="control" class="scroll-mt-24 scroll-reveal">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="w-12 h-12 rounded-xl bg-[#1E3A8A] text-white flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        </span>
                        <h2 class="text-3xl font-bold text-[#1E3A8A]">Quality Control</h2>
                    </div>
                    <p class="text-gray-600 text-lg leading-relaxed">Our quality control process encompasses every stage of production—from raw material inspection to final product testing. Qualified professionals conduct rigorous checks to ensure compliance with national and international standards.</p>
                    <p class="mt-5 text-gray-600 text-lg leading-relaxed">We believe that quality is built into the process, not inspected in. That is why we integrate checks at each critical stage and maintain documented procedures for traceability and continuous improvement.</p>
                    <div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach([
                            ['title' => 'Raw Material', 'desc' => 'Incoming material tested for composition, dimensions & surface quality', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                            ['title' => 'Production', 'desc' => 'In-process checks at forming, welding & finishing stages', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z'],
                            ['title' => 'Safety', 'desc' => 'Workplace safety & product safety standards maintained', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                            ['title' => 'Delivery', 'desc' => 'Final inspection & documentation before dispatch', 'icon' => 'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4'],
                        ] as $item)
                        <div class="group p-6 rounded-2xl bg-white border border-gray-100 shadow-md hover:shadow-xl hover:border-[#E85D04]/20 transition-all duration-300 hover:-translate-y-1">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#E85D04] to-[#F48C06] text-white flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/></svg>
                            </div>
                            <h3 class="font-bold text-[#1E3A8A]">{{ $item['title'] }}</h3>
                            <p class="mt-2 text-gray-600 text-sm">{{ $item['desc'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Quality Standards --}}
                <div id="standards" class="scroll-mt-24 scroll-reveal">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="w-12 h-12 rounded-xl bg-[#1E3A8A] text-white flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        </span>
                        <h2 class="text-3xl font-bold text-[#1E3A8A]">Quality Standards</h2>
                    </div>
                    <p class="text-gray-600 text-lg leading-relaxed mb-8">Samridhi Pipes adheres to ISI, BS, and other international standards. Our products are manufactured using high-grade raw materials and undergo comprehensive testing before dispatch.</p>
                    <div class="space-y-4">
                        @foreach([
                            ['badge' => 'ISI', 'title' => 'Indian Standards Institute', 'desc' => 'Our products meet the Bureau of Indian Standards (BIS) specifications for steel pipes and tubes, ensuring reliability for the Indian market.'],
                            ['badge' => 'BS', 'title' => 'British Standards', 'desc' => 'Compliance with British Standards for dimensions, mechanical properties, and testing methods for global acceptance.'],
                            ['badge' => 'ASTM', 'title' => 'International Standards', 'desc' => 'Where required, we align with ASTM and other international norms for export and specialized applications.'],
                        ] as $std)
                        <div class="flex items-start gap-4 p-6 rounded-2xl bg-white border border-gray-100 shadow-md hover:shadow-lg hover:border-[#1E3A8A]/20 transition-all duration-300">
                            <span class="flex-shrink-0 w-14 h-14 rounded-xl bg-[#E85D04]/10 text-[#E85D04] font-bold text-lg flex items-center justify-center">{{ $std['badge'] }}</span>
                            <div>
                                <h3 class="font-bold text-[#1E3A8A]">{{ $std['title'] }}</h3>
                                <p class="mt-1 text-gray-600">{{ $std['desc'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Our Process --}}
                <div id="process" class="scroll-mt-24 scroll-reveal">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="w-12 h-12 rounded-xl bg-[#1E3A8A] text-white flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        </span>
                        <h2 class="text-3xl font-bold text-[#1E3A8A]">Our Process</h2>
                    </div>
                    <p class="text-gray-600 text-lg leading-relaxed mb-10">From raw material to finished product, we follow a structured, traceable process that ensures consistent quality and meets customer specifications every time.</p>
                    <div class="space-y-0">
                        @foreach([
                            ['step' => '01', 'title' => 'Material Selection', 'desc' => 'Only certified raw materials from approved suppliers are used. Chemical and physical properties are verified before use.'],
                            ['step' => '02', 'title' => 'Manufacturing', 'desc' => 'Controlled forming, welding, and finishing operations with in-line checks and documented parameters.'],
                            ['step' => '03', 'title' => 'Testing & Inspection', 'desc' => 'Dimensional, mechanical, and surface quality tests as per applicable standards. Test certificates maintained.'],
                            ['step' => '04', 'title' => 'Dispatch', 'desc' => 'Final release after quality approval. Proper packing and documentation for safe delivery.'],
                        ] as $i => $step)
                        <div class="flex gap-6">
                            <div class="flex flex-col items-center">
                                <span class="flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-[#1E3A8A] to-[#2563EB] text-white font-bold text-sm flex items-center justify-center shadow-md">{{ $step['step'] }}</span>
                                @if($i < 3)
                                <div class="w-0.5 h-16 bg-[#1E3A8A]/20 mt-1 rounded-full"></div>
                                @endif
                            </div>
                            <div class="pb-12">
                                <div class="p-6 rounded-2xl bg-white border border-gray-100 shadow-md hover:shadow-lg hover:border-[#1E3A8A]/20 transition-all duration-300">
                                    <h3 class="font-bold text-[#1E3A8A] text-lg">{{ $step['title'] }}</h3>
                                    <p class="mt-2 text-gray-600">{{ $step['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Certifications --}}
                <div id="certifications" class="scroll-mt-24 scroll-reveal">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="w-12 h-12 rounded-xl bg-[#1E3A8A] text-white flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </span>
                        <h2 class="text-3xl font-bold text-[#1E3A8A]">Certifications & Compliance</h2>
                    </div>
                    <p class="text-gray-600 text-lg leading-relaxed mb-8">Our commitment to quality is backed by relevant certifications and regular audits. We maintain documentation and test certificates for traceability and customer assurance.</p>
                    <ul class="space-y-4">
                        @foreach(['ISI Certified Products', 'BS Standards Compliance', 'Industry Excellence Awards', 'Documented Quality Management', 'Third-party Audit Ready'] as $cert)
                        <li class="flex items-center gap-4 p-4 rounded-xl bg-white border border-gray-100 shadow-sm hover:shadow-md hover:border-[#E85D04]/30 transition-all duration-300 group">
                            <span class="flex-shrink-0 w-10 h-10 rounded-full bg-[#E85D04]/10 text-[#E85D04] flex items-center justify-center group-hover:bg-[#E85D04] group-hover:text-white transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </span>
                            <span class="text-gray-700 font-medium">{{ $cert }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
(function() {
    var navLinks = document.querySelectorAll('.quality-nav');
    var sections = document.querySelectorAll('[id="control"], [id="standards"], [id="process"], [id="certifications"]');

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
            var icon = link.querySelector('.quality-nav-icon');
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
