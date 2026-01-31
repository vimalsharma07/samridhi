@extends('layouts.app')

@section('content')
<section class="py-20 bg-[#1E3A8A] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold">About Samridhi</h1>
        <p class="mt-2 text-white/90">Company Overview, Management, Vision & Mission</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-4 gap-8">
            <aside class="space-y-2">
                <a href="{{ route('about', 'overview') }}" class="block px-4 py-3 rounded-lg {{ $page === 'overview' ? 'bg-[#E85D04] text-white' : 'hover:bg-gray-100 text-gray-700' }}">Company Overview</a>
                <a href="{{ route('about', 'management') }}" class="block px-4 py-3 rounded-lg {{ $page === 'management' ? 'bg-[#E85D04] text-white' : 'hover:bg-gray-100 text-gray-700' }}">Management</a>
                <a href="{{ route('about', 'vision') }}" class="block px-4 py-3 rounded-lg {{ $page === 'vision' ? 'bg-[#E85D04] text-white' : 'hover:bg-gray-100 text-gray-700' }}">Vision & Mission</a>
                <a href="{{ route('about', 'awards') }}" class="block px-4 py-3 rounded-lg {{ $page === 'awards' ? 'bg-[#E85D04] text-white' : 'hover:bg-gray-100 text-gray-700' }}">Awards & Recognition</a>
                <a href="{{ route('about', 'csr') }}" class="block px-4 py-3 rounded-lg {{ $page === 'csr' ? 'bg-[#E85D04] text-white' : 'hover:bg-gray-100 text-gray-700' }}">CSR</a>
            </aside>
            <div class="lg:col-span-3 prose prose-lg max-w-none">
                @if($page === 'overview')
                <h2 class="text-2xl font-bold text-[#1E3A8A]">Company Overview</h2>
                <p class="mt-4 text-gray-600">Samridhi Pipes Industries Ltd is renowned for manufacturing high-quality HR Pipes, GI Pipes, GP Pipes, MS Pipes, HR Coils, and Billets that exemplify precision engineering and enduring strength. Established with a vision to contribute to India's infrastructure growth, we have grown into a trusted name in the steel pipe manufacturing industry.</p>
                <p class="mt-4 text-gray-600">Our state-of-the-art manufacturing facilities are equipped with the latest technology, ensuring consistent quality and timely delivery. We serve diverse industries including agriculture, infrastructure, construction, and power sectors across India and beyond.</p>
                <div class="mt-8 grid sm:grid-cols-2 gap-6">
                    <div class="p-6 rounded-xl bg-[#F8FAFC]">
                        <h3 class="font-bold text-[#1E3A8A]">Our Journey</h3>
                        <p class="mt-2 text-gray-600 text-sm">From a modest beginning to becoming one of the leading steel pipe manufacturers, our journey reflects our commitment to excellence and innovation.</p>
                    </div>
                    <div class="p-6 rounded-xl bg-[#F8FAFC]">
                        <h3 class="font-bold text-[#1E3A8A]">Core Values</h3>
                        <p class="mt-2 text-gray-600 text-sm">Integrity, Quality, Innovation, and Customer Focus form the cornerstone of everything we do.</p>
                    </div>
                </div>
                @elseif($page === 'management')
                <h2 class="text-2xl font-bold text-[#1E3A8A]">Management</h2>
                <p class="mt-4 text-gray-600">Our leadership team brings decades of combined experience in the steel industry. Guided by a vision of sustainable growth and industry leadership, they steer Samridhi Pipes towards new milestones.</p>
                <p class="mt-4 text-gray-600">The management is committed to maintaining the highest standards of corporate governance, transparency, and stakeholder value creation.</p>
                @elseif($page === 'vision')
                <h2 class="text-2xl font-bold text-[#1E3A8A]">Vision & Mission</h2>
                <div class="mt-6 p-6 rounded-xl bg-[#1E3A8A]/5 border border-[#1E3A8A]/10">
                    <h3 class="font-bold text-[#1E3A8A]">Vision</h3>
                    <p class="mt-2 text-gray-600">To achieve sustainable growth and industry leadership through geographical and value-added product portfolio expansion. To relentlessly work to ensure that every stakeholder benefits in our growth journey.</p>
                </div>
                <div class="mt-6 p-6 rounded-xl bg-[#E85D04]/5 border border-[#E85D04]/10">
                    <h3 class="font-bold text-[#E85D04]">Mission</h3>
                    <p class="mt-2 text-gray-600">To meet the highest standards of customer expectations in terms of quality products, service, experience and trust.</p>
                </div>
                @elseif($page === 'awards')
                <h2 class="text-2xl font-bold text-[#1E3A8A]">Awards & Recognition</h2>
                <p class="mt-4 text-gray-600">Samridhi Pipes has been recognized by industry bodies and customers for our commitment to quality and excellence. Our certifications and accolades reflect our dedication to maintaining the highest standards.</p>
                <ul class="mt-6 space-y-3 text-gray-600">
                    <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-[#E85D04]"></span> ISI Certified Products</li>
                    <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-[#E85D04]"></span> BS Standards Compliance</li>
                    <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-[#E85D04]"></span> Industry Excellence Awards</li>
                </ul>
                @else
                <h2 class="text-2xl font-bold text-[#1E3A8A]">Corporate Social Responsibility</h2>
                <p class="mt-4 text-gray-600">At Samridhi Pipes, we believe in giving back to the community. Our CSR initiatives focus on education, healthcare, environmental sustainability, and community development.</p>
                <p class="mt-4 text-gray-600">We regularly organize blood donation camps, health awareness programs, and support local educational institutions. Our commitment to sustainability drives our efforts in reducing environmental impact and promoting recycling.</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
