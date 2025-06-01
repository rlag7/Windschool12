@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-[#002E5B] text-white min-h-[500px] flex items-center justify-center text-center px-4 py-20 md:py-32">
        <div class="max-w-3xl">
            <h2 class="uppercase tracking-widest text-sm md:text-base mb-2 text-yellow-400 font-medium">Start Vandaag</h2>
            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mb-6">Rijschool voor Iedereen</h1>
            <a href="#inschrijven" class="inline-block bg-[#FDE428] text-[#222] font-bold text-lg px-6 py-3 md:px-8 md:py-4 rounded shadow hover:bg-yellow-300 transition">
                Plan een Gratis Proefles
            </a>
        </div>
    </section>

    <!-- Info Section -->
    <section class="bg-white py-16 px-4 text-center">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl md:text-3xl font-bold text-[#002E5B] mb-4">Welkom bij Rijschool Vierkante Wielen</h2>
            <p class="text-gray-700 text-base md:text-lg">Wij zijn dé rijschool in Utrecht, gespecialiseerd in jongeren met een fysieke beperking. Met elektrisch rijden, persoonlijke begeleiding en moderne methodes helpen we jou aan je rijbewijs.</p>
        </div>
    </section>

    <!-- Diensten -->
    <section id="diensten" class="bg-gray-100 py-16 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-[#002E5B] mb-12">Onze Diensten</h2>
            <div class="grid gap-8 md:grid-cols-3">
                <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                    <h3 class="text-lg md:text-xl font-semibold text-[#002E5B] mb-2">Individuele Rijlessen</h3>
                    <p class="text-gray-600 text-sm md:text-base">Aangepaste lessen op jouw niveau met professionele instructeurs.</p>
                </div>
                <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                    <h3 class="text-lg md:text-xl font-semibold text-[#002E5B] mb-2">Elektrische Lesauto’s</h3>
                    <p class="text-gray-600 text-sm md:text-base">Milieubewust en stil rijden in moderne voertuigen.</p>
                </div>
                <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                    <h3 class="text-lg md:text-xl font-semibold text-[#002E5B] mb-2">Theorie Ondersteuning</h3>
                    <p class="text-gray-600 text-sm md:text-base">Complete begeleiding voor het theorie-examen.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section id="inschrijven" class="bg-[#FDE428] py-12 px-4 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-xl md:text-2xl font-bold text-[#002E5B] mb-4">Klaar om te starten?</h2>
            <a href="{{ route('register') }}" class="bg-[#002E5B] text-white px-6 py-3 md:px-8 md:py-4 font-bold rounded hover:bg-blue-800 transition">
                Inschrijven
            </a>
        </div>
    </section>
@endsection
