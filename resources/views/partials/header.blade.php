<header class="fixed top-0 left-0 right-0 z-50 bg-white/98 backdrop-blur-md shadow-sm border-b border-gray-100 transition-all duration-300" id="main-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <a href="{{ route('home') }}" class="flex items-center group">
                <img src="{{ asset('images/logo.png') }}" alt="Samridhi - Build a Strong Future" class="h-14 md:h-16 w-auto object-contain" />
            </a>

            <nav class="hidden xl:flex items-center gap-1">

                <div class="dropdown relative">
                    <a href="{{ route('about', 'overview') }}" class="px-4 py-2 text-gray-700 hover:text-[#E85D04] font-medium transition-colors rounded-lg hover:bg-[#E85D04]/5 flex items-center gap-1">
                        About Us <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="dropdown-menu absolute top-full left-0 mt-1 w-56 py-2 bg-white rounded-xl shadow-xl border border-gray-100">
                        <a href="{{ route('about', 'overview') }}" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">Company Overview</a>
                        <a href="{{ route('about', 'management') }}" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">Management</a>
                        <a href="{{ route('about', 'vision') }}" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">Vision & Mission</a>
                        <a href="{{ route('about', 'awards') }}" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">Awards & Recognition</a>
                        <a href="{{ route('about', 'csr') }}" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">CSR</a>
                    </div>
                </div>

                <div class="dropdown relative">
                    <a href="{{ route('products') }}" class="px-4 py-2 text-gray-700 hover:text-[#E85D04] font-medium transition-colors rounded-lg hover:bg-[#E85D04]/5 flex items-center gap-1">
                        Products <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="dropdown-menu absolute top-full left-0 mt-1 w-64 py-2 bg-white rounded-xl shadow-xl border border-gray-100">
                        <a href="{{ route('products') }}#hr-pipes" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">HR Pipes & Tubes</a>
                        <a href="{{ route('products') }}#gi-pipes" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">GI Pipes (Galvanized)</a>
                        <a href="{{ route('products') }}#gp-pipes" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">GP Pipes</a>
                        <a href="{{ route('products') }}#cr-pipes" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">CR Pipes (Cold Rolled)</a>
                        <a href="{{ route('products') }}#coils" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">Slit Coils</a>
                        <a href="{{ route('products') }}#scaffolding" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">Scaffolding Systems</a>
                        <a href="{{ route('products') }}#billets" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">M.S. Billets</a>
                    </div>
                </div>

                <div class="dropdown relative">
                    <a href="{{ route('quality') }}" class="px-4 py-2 text-gray-700 hover:text-[#E85D04] font-medium transition-colors rounded-lg hover:bg-[#E85D04]/5 flex items-center gap-1">
                        Quality <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="dropdown-menu absolute top-full left-0 mt-1 w-48 py-2 bg-white rounded-xl shadow-xl border border-gray-100">
                        <a href="{{ route('quality', 'control') }}" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">Quality Control</a>
                        <a href="{{ route('quality', 'standards') }}" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">Quality Standards</a>
                    </div>
                </div>

                <a href="{{ route('investors') }}" class="px-4 py-2 text-gray-700 hover:text-[#E85D04] font-medium transition-colors rounded-lg hover:bg-[#E85D04]/5">Investors</a>
                <a href="{{ route('clients') }}" class="px-4 py-2 text-gray-700 hover:text-[#E85D04] font-medium transition-colors rounded-lg hover:bg-[#E85D04]/5">Clients</a>
                <a href="{{ route('careers') }}" class="px-4 py-2 text-gray-700 hover:text-[#E85D04] font-medium transition-colors rounded-lg hover:bg-[#E85D04]/5">Careers</a>
                <a href="{{ route('blog') }}" class="px-4 py-2 text-gray-700 hover:text-[#E85D04] font-medium transition-colors rounded-lg hover:bg-[#E85D04]/5">Blogs</a>

                <div class="dropdown relative">
                    <a href="{{ route('contact') }}" class="px-4 py-2 text-gray-700 hover:text-[#E85D04] font-medium transition-colors rounded-lg hover:bg-[#E85D04]/5 flex items-center gap-1">
                        Contact <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="dropdown-menu absolute top-full right-0 left-auto mt-1 w-48 py-2 bg-white rounded-xl shadow-xl border border-gray-100">
                        <a href="{{ route('contact') }}" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">Contact Us</a>
                        <a href="{{ route('contact', 'dealers') }}" class="block px-5 py-2.5 text-gray-700 hover:bg-[#E85D04]/5 hover:text-[#E85D04]">Dealer Enquiry</a>
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="ml-4 px-6 py-2.5 bg-[#E85D04] hover:bg-[#D35400] text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg shadow-[#E85D04]/25">
                    Enquire Now
                </a>
            </nav>

            <button id="mobile-menu-btn" class="xl:hidden p-2 rounded-lg text-gray-700 hover:bg-gray-100" aria-label="Toggle menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="xl:hidden hidden absolute top-full left-0 right-0 bg-white border-b shadow-xl max-h-[85vh] overflow-y-auto">
        <div class="px-4 py-6 space-y-1">
            <a href="{{ route('home') }}" class="block py-3 px-4 text-gray-700 hover:bg-[#E85D04]/10 hover:text-[#E85D04] rounded-lg font-medium">Home</a>
            <div class="border-t pt-3 mt-3">
                <p class="px-4 py-1 text-xs font-semibold text-gray-500 uppercase">About Us</p>
                <a href="{{ route('about', 'overview') }}" class="block py-2.5 px-6 text-gray-700 hover:text-[#E85D04]">Company Overview</a>
                <a href="{{ route('about', 'management') }}" class="block py-2.5 px-6 text-gray-700 hover:text-[#E85D04]">Management</a>
                <a href="{{ route('about', 'vision') }}" class="block py-2.5 px-6 text-gray-700 hover:text-[#E85D04]">Vision & Mission</a>
                <a href="{{ route('about', 'awards') }}" class="block py-2.5 px-6 text-gray-700 hover:text-[#E85D04]">Awards</a>
                <a href="{{ route('about', 'csr') }}" class="block py-2.5 px-6 text-gray-700 hover:text-[#E85D04]">CSR</a>
            </div>
            <div class="border-t pt-3">
                <p class="px-4 py-1 text-xs font-semibold text-gray-500 uppercase">Products</p>
                <a href="{{ route('products') }}#hr-pipes" class="block py-2.5 px-6 text-gray-700 hover:text-[#E85D04]">HR Pipes & Tubes</a>
                <a href="{{ route('products') }}#gi-pipes" class="block py-2.5 px-6 text-gray-700 hover:text-[#E85D04]">GI Pipes</a>
                <a href="{{ route('products') }}#gp-pipes" class="block py-2.5 px-6 text-gray-700 hover:text-[#E85D04]">GP Pipes</a>
                <a href="{{ route('products') }}#billets" class="block py-2.5 px-6 text-gray-700 hover:text-[#E85D04]">Billets</a>
                <a href="{{ route('products') }}#scaffolding" class="block py-2.5 px-6 text-gray-700 hover:text-[#E85D04]">Scaffolding</a>
            </div>
            <div class="border-t pt-3">
                <a href="{{ route('quality') }}" class="block py-3 px-4 text-gray-700 hover:bg-[#E85D04]/10 hover:text-[#E85D04] rounded-lg font-medium">Quality</a>
                <a href="{{ route('investors') }}" class="block py-3 px-4 text-gray-700 hover:bg-[#E85D04]/10 hover:text-[#E85D04] rounded-lg font-medium">Investors</a>
                <a href="{{ route('clients') }}" class="block py-3 px-4 text-gray-700 hover:bg-[#E85D04]/10 hover:text-[#E85D04] rounded-lg font-medium">Clients</a>
                <a href="{{ route('careers') }}" class="block py-3 px-4 text-gray-700 hover:bg-[#E85D04]/10 hover:text-[#E85D04] rounded-lg font-medium">Careers</a>
                <a href="{{ route('blog') }}" class="block py-3 px-4 text-gray-700 hover:bg-[#E85D04]/10 hover:text-[#E85D04] rounded-lg font-medium">Blogs</a>
            </div>
            <div class="border-t pt-3">
                <a href="{{ route('contact') }}" class="block py-3 px-4 text-gray-700 hover:bg-[#E85D04]/10 hover:text-[#E85D04] rounded-lg font-medium">Contact Us</a>
                <a href="{{ route('contact', 'dealers') }}" class="block py-3 px-4 text-gray-700 hover:bg-[#E85D04]/10 hover:text-[#E85D04] rounded-lg font-medium">Dealer Enquiry</a>
            </div>
            <a href="{{ route('contact') }}" class="block py-4 mt-4 text-center bg-[#E85D04] text-white font-semibold rounded-lg">Enquire Now</a>
        </div>
    </div>
</header>
<div class="h-20"></div>
