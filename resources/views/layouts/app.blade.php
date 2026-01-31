<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $metaDescription ?? 'Samridhi - Build a Strong Future. Top Steel Pipe Manufacturer. HR Pipes, GI Pipes, MS Pipes, and Billets. Engineered for Strength & Resilience.' }}">
    <meta name="keywords" content="steel pipes, HR pipes, GI pipes, MS pipes, pipe manufacturer, billets, steel tubes">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Samridhi - Build a Strong Future | Top Steel Pipe Manufacturer' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-orange': '#E85D04',
                        'brand-orange-light': '#F48C06',
                        'brand-blue': '#1E3A8A',
                        'brand-blue-light': '#2563EB',
                        'brand-offwhite': '#F8FAFC',
                    }
                }
            }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
        * { font-family: 'DM Sans', system-ui, sans-serif; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeInLeft { from { opacity: 0; transform: translateX(-40px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes fadeInRight { from { opacity: 0; transform: translateX(40px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes marquee { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
        @keyframes shimmer { 0% { background-position: -200% 0; } 100% { background-position: 200% 0; } }
        .animate-fade-in-up { animation: fadeInUp 0.9s cubic-bezier(0.16,1,0.3,1) forwards; }
        .animate-fade-in-left { animation: fadeInLeft 0.9s cubic-bezier(0.16,1,0.3,1) forwards; opacity: 1 !important; }
        .animate-fade-in-right { animation: fadeInRight 0.9s cubic-bezier(0.16,1,0.3,1) forwards; opacity: 1 !important; }
        .animate-fade-in { animation: fadeIn 0.8s ease-out forwards; }
        .animate-marquee { animation: marquee 35s linear infinite; display: flex; width: max-content; }
        .animate-marquee:hover { animation-play-state: paused; }
        .animate-float { animation: float 4s ease-in-out infinite; }
        .animation-delay-100 { animation-delay: 100ms; }
        .animation-delay-200 { animation-delay: 200ms; }
        .animation-delay-300 { animation-delay: 300ms; }
        .animation-delay-400 { animation-delay: 400ms; }
        .animation-delay-500 { animation-delay: 500ms; }
        .dropdown:hover .dropdown-menu { opacity: 1; visibility: visible; transform: translateY(0); }
        .dropdown-menu { opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s ease; }
        .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .hover-lift:hover { transform: translateY(-8px); box-shadow: 0 20px 40px -15px rgba(0,0,0,0.2); }
        .hero-slide { display: none; }
        .hero-slide.active { display: flex; animation: fadeIn 1s ease; }
    </style>
</head>
<body class="antialiased text-gray-900" style="background-color: #F8FAFC;">
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in-up');
                        entry.target.classList.remove('opacity-0');
                    }
                });
            }, { threshold: 0.1 });
            document.querySelectorAll('.scroll-reveal').forEach(el => {
                el.classList.add('opacity-0');
                observer.observe(el);
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
