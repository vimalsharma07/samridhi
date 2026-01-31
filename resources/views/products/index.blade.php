@extends('layouts.app')

@section('content')
<section class="py-20 bg-[#1E3A8A] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold">Our Products</h1>
        <p class="mt-2 text-white/90">Comprehensive range of steel pipes, tubes, coils & structures</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-24">
            @foreach([
                ['id' => 'hr-pipes', 'title' => 'HR Pipes & Tubes', 'desc' => 'Hot Rolled (HR) pipes and tubes manufactured to meet stringent quality standards. Ideal for structural applications, mechanical engineering, and general purpose use. Available in various sizes and specifications as per ISI and BS standards.', 'apps' => ['Structural frameworks', 'Mechanical applications', 'Agriculture', 'Furniture']],
                ['id' => 'gi-pipes', 'title' => 'GI Pipes (Hot Dipped Galvanized)', 'desc' => 'Galvanized Iron pipes with hot-dip galvanization for superior corrosion resistance. Perfect for water supply, scaffolding, and outdoor applications. Long-lasting durability in harsh environments.', 'apps' => ['Water supply', 'Scaffolding', 'Agriculture irrigation', 'Outdoor structures']],
                ['id' => 'gp-pipes', 'title' => 'GP Pipes (Pre Galvanized)', 'desc' => 'Pre-galvanized pipes with consistent zinc coating for excellent surface finish. Used where aesthetics and corrosion resistance are paramount.', 'apps' => ['Electrical conduits', 'Indoor applications', 'Furniture', 'Decorative']],
                ['id' => 'cr-pipes', 'title' => 'CR Pipes (Cold Rolled)', 'desc' => 'Cold Rolled pipes with precision dimensions and smooth surface finish. Ideal for applications requiring tight tolerances and superior quality.', 'apps' => ['Automotive', 'Precision engineering', 'High-quality furniture']],
                ['id' => 'coils', 'title' => 'Slit Coils', 'desc' => 'HRPO, GP, CRCA, and CRFH slit coils for various industrial applications. Supplied in custom widths as per customer requirements.', 'apps' => ['Tube making', 'Furniture', 'Automotive', 'Construction']],
                ['id' => 'scaffolding', 'title' => 'Scaffolding Systems', 'desc' => 'Complete scaffolding solutions using premium ERW pipes. Safe, durable, and compliant with international safety standards. Used in construction projects nationwide.', 'apps' => ['Construction', 'Infrastructure', 'Industrial maintenance']],
                ['id' => 'billets', 'title' => 'M.S. Billets', 'desc' => 'Mild Steel billets for forging and rolling operations. Consistent quality and chemical composition for downstream processing.', 'apps' => ['Re-rolling', 'Forging', 'Wire drawing']],
            ] as $product)
            <div id="{{ $product['id'] }}" class="scroll-reveal scroll-mt-24">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <span class="text-[#E85D04] font-bold text-sm uppercase">{{ $product['title'] }}</span>
                        <h2 class="mt-2 text-3xl font-bold text-[#1E3A8A]">{{ $product['title'] }}</h2>
                        <p class="mt-4 text-gray-600">{{ $product['desc'] }}</p>
                        <ul class="mt-6 grid sm:grid-cols-2 gap-2">
                            @foreach($product['apps'] as $app)
                            <li class="flex items-center gap-2 text-gray-700"><svg class="w-5 h-5 text-[#E85D04]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>{{ $app }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="h-64 rounded-2xl flex items-center justify-center" style="background: linear-gradient(135deg, #1E3A8A15 0%, #E85D0415 100%);">
                        <span class="text-6xl font-bold text-[#1E3A8A]/20">SP</span>
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
