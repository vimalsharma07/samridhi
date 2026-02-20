@extends('layouts.app')

@section('content')
<section class="py-20 bg-[#1E3A8A] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold">Our Products</h1>
        <p class="mt-2 text-white/90">Comprehensive range of steel pipes, tubes, coils & structures</p>
    </div>
</section>

@php
    $useDb = isset($products) && $products->isNotEmpty();
    if (!$useDb) {
        $products = collect([
            ['id' => 'hr-pipes', 'title' => 'HR Pipes & Tubes', 'short_description' => 'Hot Rolled (HR) pipes and tubes manufactured to meet stringent quality standards. Ideal for structural applications, mechanical engineering, and general purpose use. Available in various sizes and specifications as per ISI and BS standards.', 'description' => null, 'applications' => ['Structural frameworks', 'Mechanical applications', 'Agriculture', 'Furniture'], 'featured_image' => null],
            ['id' => 'gi-pipes', 'title' => 'GI Pipes (Hot Dipped Galvanized)', 'short_description' => 'Galvanized Iron pipes with hot-dip galvanization for superior corrosion resistance. Perfect for water supply, scaffolding, and outdoor applications. Long-lasting durability in harsh environments.', 'description' => null, 'applications' => ['Water supply', 'Scaffolding', 'Agriculture irrigation', 'Outdoor structures'], 'featured_image' => null],
            ['id' => 'gp-pipes', 'title' => 'GP Pipes (Pre Galvanized)', 'short_description' => 'Pre-galvanized pipes with consistent zinc coating for excellent surface finish. Used where aesthetics and corrosion resistance are paramount.', 'description' => null, 'applications' => ['Electrical conduits', 'Indoor applications', 'Furniture', 'Decorative'], 'featured_image' => null],
            ['id' => 'cr-pipes', 'title' => 'CR Pipes (Cold Rolled)', 'short_description' => 'Cold Rolled pipes with precision dimensions and smooth surface finish. Ideal for applications requiring tight tolerances and superior quality.', 'description' => null, 'applications' => ['Automotive', 'Precision engineering', 'High-quality furniture'], 'featured_image' => null],
            ['id' => 'coils', 'title' => 'Slit Coils', 'short_description' => 'HRPO, GP, CRCA, and CRFH slit coils for various industrial applications. Supplied in custom widths as per customer requirements.', 'description' => null, 'applications' => ['Tube making', 'Furniture', 'Automotive', 'Construction'], 'featured_image' => null],
            ['id' => 'scaffolding', 'title' => 'Scaffolding Systems', 'short_description' => 'Complete scaffolding solutions using premium ERW pipes. Safe, durable, and compliant with international safety standards. Used in construction projects nationwide.', 'description' => null, 'applications' => ['Construction', 'Infrastructure', 'Industrial maintenance'], 'featured_image' => null],
            ['id' => 'billets', 'title' => 'M.S. Billets', 'short_description' => 'Mild Steel billets for forging and rolling operations. Consistent quality and chemical composition for downstream processing.', 'description' => null, 'applications' => ['Re-rolling', 'Forging', 'Wire drawing'], 'featured_image' => null],
        ]);
    }
@endphp

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-24">
            @foreach($products as $product)
            @php
                $id = $useDb ? $product->slug : $product['id'];
                $title = $useDb ? $product->title : $product['title'];
                $desc = $useDb ? $product->short_description : $product['short_description'];
                $body = $useDb ? $product->description : ($product['description'] ?? null);
                $apps = $useDb ? ($product->applications ?? []) : ($product['applications'] ?? []);
                $img = $useDb ? $product->featured_image : ($product['featured_image'] ?? null);
            @endphp
            <div id="{{ $id }}" class="scroll-reveal scroll-mt-24">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <span class="text-[#E85D04] font-bold text-sm uppercase">{{ $title }}</span>
                        <h2 class="mt-2 text-3xl font-bold text-[#1E3A8A]">{{ $title }}</h2>
                        @if($desc)
                        <p class="mt-4 text-gray-600">{{ $desc }}</p>
                        @endif
                        @if($body)
                        <div class="mt-4 text-gray-600 prose prose-lg max-w-none">
                            {!! $body !!}
                        </div>
                        @endif
                        @if(!empty($apps))
                        <ul class="mt-6 grid sm:grid-cols-2 gap-2">
                            @foreach($apps as $app)
                            <li class="flex items-center gap-2 text-gray-700"><svg class="w-5 h-5 text-[#E85D04] flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>{{ $app }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div class="h-64 rounded-2xl">
                        @if($img)
                            <div class="h-64 rounded-2xl overflow-hidden shadow-sm bg-white">
                                <img src="{{ asset('uploads/' . $img) }}" alt="{{ $title }}" class="w-full h-full object-cover">
                            </div>
                        @elseif($id === 'hr-pipes' && !$useDb)
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 h-full">
                                <div class="rounded-xl overflow-hidden shadow-sm bg-white">
                                    <img src="{{ asset('images/hr-pipes-1.png') }}" alt="Shiny round steel pipes" class="w-full h-full object-cover">
                                </div>
                                <div class="rounded-xl overflow-hidden shadow-sm bg-white">
                                    <img src="{{ asset('images/hr-pipes-2.png') }}" alt="Square hollow section HR pipes" class="w-full h-full object-cover">
                                </div>
                                <div class="rounded-xl overflow-hidden shadow-sm bg-white hidden md:block">
                                    <img src="{{ asset('images/hr-pipes-3.png') }}" alt="Stacked HR pipes in yard" class="w-full h-full object-cover">
                                </div>
                                <div class="rounded-xl overflow-hidden shadow-sm bg-white hidden md:block">
                                    <img src="{{ asset('images/hr-pipes-4.png') }}" alt="Heavy duty HR pipes bundle" class="w-full h-full object-cover">
                                </div>
                            </div>
                        @else
                            @php
                                $productImages = [
                                    'gi-pipes'     => 'images/hr-pipes-2.png',
                                    'gp-pipes'     => 'images/hr-pipes-1.png',
                                    'cr-pipes'     => 'images/hr-pipes-3.png',
                                    'coils'        => 'images/hr-pipes-4.png',
                                    'scaffolding'  => 'images/hr-pipes-2.png',
                                    'billets'      => 'images/hr-pipes-3.png',
                                ];
                                $imgPath = $productImages[$id] ?? null;
                            @endphp
                            @if($imgPath)
                                <div class="h-64 rounded-2xl overflow-hidden shadow-sm bg-white">
                                    <img src="{{ asset($imgPath) }}" alt="{{ $title }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="h-64 rounded-2xl flex items-center justify-center" style="background: linear-gradient(135deg, #1E3A8A15 0%, #E85D0415 100%);">
                                    <span class="text-6xl font-bold text-[#1E3A8A]/20">SP</span>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="py-16 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl font-bold text-[#1E3A8A]">Need a custom solution?</h2>
        <p class="mt-2 text-gray-600">Contact our technical team for specifications and quotations</p>
        <a href="{{ route('contact') }}" class="inline-flex mt-6 px-8 py-4 bg-[#E85D04] hover:bg-[#D35400] text-white font-semibold rounded-lg transition-colors">Enquire Now</a>
    </div>
</section>
@endsection
