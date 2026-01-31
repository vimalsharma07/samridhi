@extends('layouts.app')

@section('content')
<section class="py-20 bg-[#1E3A8A] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold">{{ $page === 'dealers' ? 'Dealer Enquiry' : 'Contact Us' }}</h1>
        <p class="mt-2 text-white/90">Get in touch with our team</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16">
            <div>
                <h2 class="text-2xl font-bold text-[#1E3A8A]">Get In Touch</h2>
                <p class="mt-4 text-gray-600">Fill the form and our team will get back to you shortly.</p>
                <div class="mt-12 space-y-8">
                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-xl bg-[#E85D04]/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-[#E85D04]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#1E3A8A]">Phone</h3>
                            <p class="mt-1 text-gray-600">Toll Free: 1800 123 4567</p>
                            <p class="text-gray-600">+91 40 2401 6101</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-xl bg-[#E85D04]/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-[#E85D04]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#1E3A8A]">Email</h3>
                            <p class="mt-1 text-gray-600">info@samridhipipes.com</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-xl bg-[#E85D04]/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-[#E85D04]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#1E3A8A]">Address</h3>
                            <p class="mt-1 text-gray-600">Hyderabad, Telangana 500048</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-8 lg:p-12 rounded-2xl bg-[#1E3A8A] text-white">
                <form class="space-y-6" action="#" method="POST">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-2">Name *</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-[#F48C06]" placeholder="Your Name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Email *</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-[#F48C06]" placeholder="your@email.com">
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-2">Mobile *</label>
                            <input type="tel" name="mobile" required class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-[#F48C06]" placeholder="+91 98765 43210">
                        </div>
                        @if($page === 'dealers')
                        <div>
                            <label class="block text-sm font-medium mb-2">Business Name</label>
                            <input type="text" name="business" class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-[#F48C06]" placeholder="Company Name">
                        </div>
                        @else
                        <div>
                            <label class="block text-sm font-medium mb-2">Product</label>
                            <select name="product" class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-[#F48C06]">
                                <option value="">Select Product</option>
                                <option value="hr-pipes">HR Pipes & Tubes</option>
                                <option value="gi-pipes">GI Pipes</option>
                                <option value="gp-pipes">GP Pipes</option>
                                <option value="billets">M.S. Billets</option>
                                <option value="scaffolding">Scaffolding</option>
                            </select>
                        </div>
                        @endif
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Message</label>
                        <textarea name="message" rows="4" class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-[#F48C06]" placeholder="Your enquiry..."></textarea>
                    </div>
                    <button type="submit" class="w-full sm:w-auto px-10 py-4 bg-[#E85D04] hover:bg-[#D35400] text-white font-semibold rounded-lg transition-colors">
                        Submit Enquiry
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
