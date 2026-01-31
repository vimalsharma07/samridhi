@extends('layouts.app')

@section('content')
<section class="py-20 bg-[#1E3A8A] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold">Our Clients</h1>
        <p class="mt-2 text-white/90">Trusted by leading names across industries</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-gray-600 max-w-2xl mx-auto mb-16">We are proud to serve a diverse portfolio of clients ranging from government projects to private enterprises. Our commitment to quality has earned us the trust of industry leaders.</p>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-8">
            @foreach(['Rudran Infra Metals', 'Vajra Simha Industries', 'LCP Building Projects', 'Midhani', 'Agri Gold', 'Chourasia Infrastructure', 'Fabex Steel', 'Shankara Buildpro', 'Savera', 'KMS', 'Metalkraft', 'Aparna', 'Suntek Energy', 'epack prefab', 'Kirby Building', 'Pennar Industries'] as $client)
            <div class="p-6 rounded-xl bg-[#F8FAFC] flex items-center justify-center h-28 hover:shadow-lg transition-shadow">
                <span class="text-[#1E3A8A] font-semibold text-center text-sm">{{ $client }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
