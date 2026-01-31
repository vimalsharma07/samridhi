@extends('layouts.app')

@section('content')
<section class="py-20 bg-[#1E3A8A] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold">Quality</h1>
        <p class="mt-2 text-white/90">Excellence in every step</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-4 gap-8">
            <aside class="space-y-2">
                <a href="{{ route('quality', 'control') }}" class="block px-4 py-3 rounded-lg {{ $page === 'control' ? 'bg-[#E85D04] text-white' : 'hover:bg-gray-100 text-gray-700' }}">Quality Control</a>
                <a href="{{ route('quality', 'standards') }}" class="block px-4 py-3 rounded-lg {{ $page === 'standards' ? 'bg-[#E85D04] text-white' : 'hover:bg-gray-100 text-gray-700' }}">Quality Standards</a>
            </aside>
            <div class="lg:col-span-3">
                @if($page === 'control')
                <h2 class="text-2xl font-bold text-[#1E3A8A]">Quality Control</h2>
                <p class="mt-4 text-gray-600">Our quality control process encompasses every stage of production - from raw material inspection to final product testing. Qualified professionals conduct rigorous checks to ensure compliance with national and international standards.</p>
                <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach(['Raw Material', 'Production', 'Safety', 'Delivery'] as $item)
                    <div class="p-6 rounded-xl bg-[#F8FAFC] border border-gray-100">
                        <h3 class="font-bold text-[#1E3A8A]">{{ $item }}</h3>
                        <p class="mt-2 text-gray-600 text-sm">Stringent checks at every stage</p>
                    </div>
                    @endforeach
                </div>
                @else
                <h2 class="text-2xl font-bold text-[#1E3A8A]">Quality Standards</h2>
                <p class="mt-4 text-gray-600">Samridhi Pipes adheres to ISI, BS, and other international standards. Our products are manufactured using high-grade raw materials and undergo comprehensive testing before dispatch.</p>
                <ul class="mt-8 space-y-4 text-gray-600">
                    <li class="flex items-center gap-3"><span class="w-10 h-10 rounded-lg bg-[#E85D04]/10 flex items-center justify-center text-[#E85D04] font-bold">ISI</span> Indian Standards Institute Certification</li>
                    <li class="flex items-center gap-3"><span class="w-10 h-10 rounded-lg bg-[#E85D04]/10 flex items-center justify-center text-[#E85D04] font-bold">BS</span> British Standards Compliance</li>
                </ul>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
