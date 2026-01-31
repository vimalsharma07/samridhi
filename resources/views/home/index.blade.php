@extends('layouts.app')

@section('content')

{{-- Hero Slider --}}
<section class="relative h-[90vh] min-h-[600px] overflow-hidden" id="hero">
    <div class="hero-slide active absolute inset-0 flex items-center" style="background: linear-gradient(135deg, #1E3A8A 0%, #1D4ED8 100%);">
        <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.3\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/svg%3E');"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="max-w-3xl">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight opacity-0 animate-fade-in-left">
                    High <span class="text-[#F48C06]">Tensile</span> Strength in Every Pipe
                </h1>
                <p class="mt-6 text-xl text-white/90 opacity-0 animate-fade-in-left animation-delay-200">
                    Engineered for Strength and Resilience. India's leading manufacturer of HR Pipes, GI Pipes, MS Pipes, and Billets.
                </p>
                <div class="mt-10 flex flex-wrap gap-4 opacity-0 animate-fade-in-left animation-delay-300">
                    <a href="{{ route('products') }}" class="inline-flex items-center px-8 py-4 bg-[#E85D04] hover:bg-[#D35400] text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Explore Products <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-lg border border-white/30 transition-all duration-300">
                        Dealer Enquiry
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-slide absolute inset-0 flex items-center" style="background: linear-gradient(135deg, #E85D04 0%, #F48C06 100%);">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="max-w-3xl ml-auto text-right">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight opacity-0 animate-fade-in-right">
                    New Heights <span class="text-[#1E3A8A]">Modern</span> Builds
                </h1>
                <p class="mt-6 text-xl text-white/95 opacity-0 animate-fade-in-right animation-delay-200">
                    Consistent Quality. Premium Finish. Unparalleled performance in agriculture, infrastructure & construction.
                </p>
                <div class="mt-10 flex flex-wrap gap-4 justify-end opacity-0 animate-fade-in-right animation-delay-300">
                    <a href="{{ route('about', 'overview') }}" class="inline-flex items-center px-8 py-4 bg-[#1E3A8A] hover:bg-[#1D4ED8] text-white font-semibold rounded-lg transition-all duration-300">
                        About Us
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-slide absolute inset-0 flex items-center" style="background: linear-gradient(135deg, #1E3A8A 60%, #0F172A 100%);">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight opacity-0 animate-fade-in-up">
                Infrastructure <span class="text-[#F48C06]">Backbone</span> of Bharat
            </h1>
            <p class="mt-6 text-xl text-white/90 max-w-2xl mx-auto opacity-0 animate-fade-in-up animation-delay-200">
                Contributing to strengthen the backbone of India's economy. 18+ years of precision engineering excellence.
            </p>
            <div class="mt-10 opacity-0 animate-fade-in-up animation-delay-300">
                <a href="{{ route('clients') }}" class="inline-flex items-center px-8 py-4 bg-[#E85D04] hover:bg-[#D35400] text-white font-semibold rounded-lg transition-all duration-300">
                    Our Clients
                </a>
            </div>
        </div>
    </div>
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-2" id="hero-dots"></div>
</section>

{{-- Marquee --}}
<section class="py-4 bg-[#E85D04] text-white overflow-hidden">
    <div class="flex animate-marquee whitespace-nowrap">
        @foreach(array_merge(
            ['ENGINEERED FOR STRENGTH & RESILIENCE', 'NEW HEIGHTS MODERN BUILDS', 'CONSISTENT QUALITY PREMIUM FINISH', 'UNPARALLELED PERFORMANCE IN AGRICULTURE', 'INFRASTRUCTURE BACKBONE OF BHARAT', '18+ YEARS OF EXCELLENCE'],
            ['ENGINEERED FOR STRENGTH & RESILIENCE', 'NEW HEIGHTS MODERN BUILDS', 'CONSISTENT QUALITY PREMIUM FINISH', 'UNPARALLELED PERFORMANCE', 'INFRASTRUCTURE BACKBONE'])
        as $item)
        <span class="mx-10 text-base font-semibold">{{ $item }}</span>
        <span class="mx-2">•</span>
        @endforeach
    </div>
</section>

{{-- About Preview --}}
<section class="py-24 bg-white scroll-reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-[#E85D04] font-bold uppercase tracking-widest text-sm">About Samridhi</span>
                <h2 class="mt-4 text-4xl font-bold text-[#1E3A8A]">A Legacy of Steel Excellence</h2>
                <p class="mt-6 text-gray-600 text-lg leading-relaxed">
                    Samridhi Pipes Industries is renowned for manufacturing high-quality HR Pipes, GI Pipes, GP Pipes, MS Pipes, HR Coils, and Billets that exemplify precision engineering and enduring strength. With over 18 years of industry leadership, we uphold the highest standards of customer expectations in quality, service, experience, and trust.
                </p>
                <div class="mt-10 grid sm:grid-cols-2 gap-6">
                    <div class="p-6 rounded-2xl bg-[#1E3A8A]/5 border border-[#1E3A8A]/10 hover-lift">
                        <h3 class="font-bold text-[#1E3A8A] text-lg">Vision</h3>
                        <p class="mt-2 text-gray-600 text-sm">Sustainable growth through geographical expansion and value-added product portfolio.</p>
                    </div>
                    <div class="p-6 rounded-2xl bg-[#E85D04]/5 border border-[#E85D04]/10 hover-lift">
                        <h3 class="font-bold text-[#E85D04] text-lg">Mission</h3>
                        <p class="mt-2 text-gray-600 text-sm">Meet highest standards in quality products, service, experience and trust.</p>
                    </div>
                </div>
                <a href="{{ route('about', 'overview') }}" class="inline-flex mt-8 px-8 py-4 bg-[#E85D04] hover:bg-[#D35400] text-white font-semibold rounded-lg transition-colors">Read More</a>
            </div>
            <div class="relative">
                <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl" style="background: linear-gradient(135deg, #1E3A8A 0%, #2563EB 100%);">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-white/10 text-[200px] font-bold">SP</div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-10 bg-gradient-to-t from-black/80 to-transparent">
                        <p class="text-white text-2xl font-bold">18+ Years</p>
                        <p class="text-white/90 mt-1">Rich industry experience</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Products Showcase --}}
<section class="py-24 bg-[#F8FAFC] scroll-reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <span class="text-[#E85D04] font-bold uppercase tracking-widest text-sm">Our Products</span>
            <h2 class="mt-4 text-4xl font-bold text-[#1E3A8A]">Comprehensive Steel Solutions</h2>
            <p class="mt-4 text-gray-600 text-lg">Full range of steel products for agriculture, infrastructure, construction, power, and industrial applications.</p>
        </div>
        <div class="mt-16 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['title' => 'HR Pipes & Tubes', 'desc' => 'Hot Rolled pipes for structural & mechanical applications', 'link' => route('products').'#hr-pipes', 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'],
                ['title' => 'GI Pipes', 'desc' => 'Hot Dipped Galvanized pipes for corrosion resistance', 'link' => route('products').'#gi-pipes', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                ['title' => 'GP Pipes', 'desc' => 'Pre Galvanized pipes with premium finish', 'link' => route('products').'#gp-pipes', 'icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z'],
                ['title' => 'M.S. Billets', 'desc' => 'Mild Steel billets for forging and rolling', 'link' => route('products').'#billets', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
            ] as $product)
            <a href="{{ $product['link'] }}" class="group block p-8 rounded-2xl bg-white shadow-lg hover:shadow-xl transition-all duration-500 border border-gray-100 hover:border-[#E85D04]/30 hover-lift scroll-reveal">
                <div class="w-16 h-16 rounded-xl bg-[#E85D04]/10 flex items-center justify-center text-[#E85D04] group-hover:bg-[#E85D04] group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $product['icon'] }}"/></svg>
                </div>
                <h3 class="mt-6 text-xl font-bold text-[#1E3A8A]">{{ $product['title'] }}</h3>
                <p class="mt-2 text-gray-600 text-sm">{{ $product['desc'] }}</p>
                <span class="inline-flex mt-4 text-[#E85D04] font-semibold text-sm group-hover:underline">Know More →</span>
            </a>
            @endforeach
        </div>
        <div class="mt-12 text-center">
            <a href="{{ route('products') }}" class="inline-flex px-8 py-4 bg-[#1E3A8A] hover:bg-[#1D4ED8] text-white font-semibold rounded-lg transition-colors">View All Products</a>
        </div>
    </div>
</section>

{{-- Why Choose Us --}}
<section class="py-24 bg-[#1E3A8A] text-white scroll-reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <span class="text-[#F48C06] font-bold uppercase tracking-widest text-sm">Why Samridhi</span>
            <h2 class="mt-4 text-4xl font-bold">With a heritage spanning over 18 years</h2>
            <p class="mt-4 text-white/90 text-lg">We are the ultimate one-stop shop for all welded steel tubes. Driven by skills and determination towards a bright future.</p>
        </div>
        <div class="mt-16 grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                ['title' => 'Quality Assurance', 'desc' => 'Compliance with ISI, BS standards. International codes for manufacturing & construction.'],
                ['title' => 'Pan India Presence', 'desc' => 'Strong network of 800+ distributors, dealers and retailers across India.'],
                ['title' => 'Reputed Suppliers', 'desc' => 'Long-standing relationships ensuring uninterrupted, cost-effective raw material supply.'],
                ['title' => 'Cost-effective Solutions', 'desc' => 'Operations designed to be cost-effective, sustainable and environmentally responsible.'],
            ] as $item)
            <div class="text-center p-8 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 transition-colors scroll-reveal">
                <div class="w-16 h-16 mx-auto rounded-full bg-[#F48C06]/20 flex items-center justify-center">
                    <svg class="w-8 h-8 text-[#F48C06]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="mt-6 font-bold text-lg">{{ $item['title'] }}</h3>
                <p class="mt-2 text-white/80 text-sm">{{ $item['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Industries --}}
<section class="py-24 bg-white scroll-reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <span class="text-[#E85D04] font-bold uppercase tracking-widest text-sm">Industries We Serve</span>
            <h2 class="mt-4 text-4xl font-bold text-[#1E3A8A]">Trusted Across Sectors</h2>
        </div>
        <div class="mt-16 grid grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach(['Agriculture', 'Infrastructure', 'Power', 'Construction'] as $industry)
            <div class="text-center p-10 rounded-2xl bg-[#F8FAFC] hover:bg-[#1E3A8A] hover:text-white transition-all duration-300 group scroll-reveal">
                <div class="w-20 h-20 mx-auto rounded-2xl bg-[#E85D04]/10 group-hover:bg-[#F48C06]/20 flex items-center justify-center">
                    <svg class="w-10 h-10 text-[#E85D04] group-hover:text-[#F48C06]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h3 class="mt-6 font-bold text-[#1E3A8A] group-hover:text-white text-lg">{{ $industry }}</h3>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-20 bg-gradient-to-r from-[#E85D04] via-[#F48C06] to-[#E85D04] text-white scroll-reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-6 gap-8">
            @foreach([
                ['value' => '18+', 'label' => 'Years Experience'],
                ['value' => '701K', 'label' => 'MT Capacity'],
                ['value' => '132K', 'label' => 'MT Tube Mill'],
                ['value' => '700+', 'label' => 'Team Members'],
                ['value' => '800+', 'label' => 'Dealers'],
                ['value' => '360K', 'label' => 'MT GP/CR Mill'],
            ] as $stat)
            <div class="text-center scroll-reveal">
                <div class="text-4xl lg:text-5xl font-bold">{{ $stat['value'] }}</div>
                <div class="mt-1 text-white/95 font-medium">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Clients --}}
<section class="py-24 bg-[#F8FAFC] scroll-reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <span class="text-[#E85D04] font-bold uppercase tracking-widest text-sm">Trusted Partners</span>
            <h2 class="mt-4 text-4xl font-bold text-[#1E3A8A]">Our Esteemed Clients</h2>
        </div>
        <div class="mt-16 grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-6">
            @foreach(['Rudran Infra', 'Vajra Simha', 'LCP Projects', 'Midhani', 'Agri Gold', 'Chourasia', 'Fabex Steel', 'Shankara', 'Savera', 'KMS', 'Metalkraft', 'Aparna'] as $client)
            <div class="p-6 rounded-xl bg-white shadow-md flex items-center justify-center h-24 hover:shadow-lg transition-shadow scroll-reveal">
                <span class="text-[#1E3A8A] font-semibold text-sm text-center">{{ $client }}</span>
            </div>
            @endforeach
        </div>
        <div class="mt-12 text-center">
            <a href="{{ route('clients') }}" class="inline-flex text-[#E85D04] font-semibold hover:underline">View All Clients →</a>
        </div>
    </div>
</section>

{{-- News & Events --}}
<section class="py-24 bg-white scroll-reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div>
                <span class="text-[#E85D04] font-bold uppercase tracking-widest text-sm">News & Events</span>
                <h2 class="mt-4 text-4xl font-bold text-[#1E3A8A]">Latest Updates</h2>
            </div>
            <a href="{{ route('blog') }}" class="px-6 py-3 border-2 border-[#E85D04] text-[#E85D04] font-semibold rounded-lg hover:bg-[#E85D04] hover:text-white transition-colors">View All</a>
        </div>
        <div class="mt-16 grid md:grid-cols-3 gap-8">
            @foreach([
                ['date' => '15 Jan 2025', 'title' => 'North-East Build Expo 2025', 'excerpt' => 'Samridhi Pipes showcased latest innovations at the prestigious expo.'],
                ['date' => '10 Jan 2025', 'title' => 'Blood Donation Camp 2025', 'excerpt' => 'Annual CSR initiative - 200+ units donated at our manufacturing facility.'],
                ['date' => '05 Jan 2025', 'title' => 'New Tube Mill Commissioning', 'excerpt' => 'Expansion of capacity to meet growing demand across India.'],
            ] as $news)
            <article class="rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover-lift scroll-reveal">
                <div class="h-48 bg-gradient-to-br from-[#1E3A8A] to-[#2563EB] flex items-center justify-center">
                    <span class="text-white/20 text-6xl font-bold">SP</span>
                </div>
                <div class="p-6 bg-white">
                    <p class="text-[#E85D04] font-semibold text-sm">{{ $news['date'] }}</p>
                    <h3 class="mt-2 text-xl font-bold text-[#1E3A8A]">{{ $news['title'] }}</h3>
                    <p class="mt-2 text-gray-600 text-sm">{{ $news['excerpt'] }}</p>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA / Contact --}}
<section class="py-24 bg-[#1E3A8A] scroll-reveal">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold text-white">Looking for Premium Steel Pipes?</h2>
        <p class="mt-4 text-xl text-white/90">Get in touch with our team for product enquiries, dealer network, or technical specifications.</p>
        <div class="mt-10 flex flex-wrap justify-center gap-4">
            <a href="{{ route('contact') }}" class="inline-flex px-10 py-4 bg-[#E85D04] hover:bg-[#D35400] text-white font-semibold rounded-lg transition-colors">Contact Us</a>
            <a href="{{ route('contact', 'dealers') }}" class="inline-flex px-10 py-4 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-lg border border-white/30 transition-colors">Dealer Enquiry</a>
        </div>
        <div class="mt-16 grid sm:grid-cols-3 gap-8 text-white/90">
            <div><p class="font-bold text-white">Toll Free</p><p class="mt-1">1800 123 4567</p></div>
            <div><p class="font-bold text-white">Email</p><p class="mt-1">info@samridhipipes.com</p></div>
            <div><p class="font-bold text-white">Address</p><p class="mt-1">Hyderabad, Telangana</p></div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileBtn && mobileMenu) mobileBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));

    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const href = a.getAttribute('href');
            if (href === '#') return;
            const target = document.querySelector(href);
            if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth' }); mobileMenu?.classList.add('hidden'); }
        });
    });


    const slides = document.querySelectorAll('.hero-slide');
    const dotsContainer = document.getElementById('hero-dots');
    if (slides.length > 1 && dotsContainer) {
        slides.forEach((_, i) => {
            const dot = document.createElement('button');
            dot.className = 'w-2 h-2 rounded-full transition-all ' + (i === 0 ? 'bg-white w-8' : 'bg-white/50 hover:bg-white/80');
            dot.addEventListener('click', () => goToSlide(i));
            dotsContainer.appendChild(dot);
        });
        let current = 0;
        function goToSlide(i) {
            slides[current].classList.remove('active');
            current = (i + slides.length) % slides.length;
            slides[current].classList.add('active');
            dotsContainer.querySelectorAll('button').forEach((d, j) => { d.className = 'w-2 h-2 rounded-full transition-all ' + (j === current ? 'bg-white w-8' : 'bg-white/50'); });
        }
        setInterval(() => goToSlide(current + 1), 5000);
    }
});
</script>
@endpush
@endsection
