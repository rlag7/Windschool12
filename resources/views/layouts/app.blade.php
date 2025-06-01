<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Rijschool Vierkante Wielen') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS (via Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Heroicons CDN for icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans bg-gray-100 min-h-screen flex flex-col">

<!-- Header met Alpine.js nav -->
<nav x-data="{ open: false }" class="bg-[#002E5B] text-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- LOGO -->
            <div class="flex-shrink-0">
                <a href="/" class="text-xl md:text-2xl font-bold text-yellow-400">Vierkante Wielen</a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="/" class="hover:text-yellow-300 transition">Home</a>
                <a href="#diensten" class="hover:text-yellow-300 transition">Diensten</a>
                <a href="#inschrijven" class="hover:text-yellow-300 transition">Inschrijven</a>
                <a href="#contact" class="hover:text-yellow-300 transition">Contact</a>
            </div>

            <!-- Auth Buttons Desktop -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="hover:text-yellow-300 font-semibold">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:text-red-300 font-semibold">Uitloggen</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-yellow-300 font-semibold">Inloggen</a>
                    <a href="{{ route('register') }}" class="bg-yellow-400 text-[#002E5B] px-4 py-2 rounded font-bold hover:bg-yellow-300 transition">Registreer</a>
                @endauth
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="focus:outline-none">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div x-show="open" @click.away="open = false" class="md:hidden px-4 pt-2 pb-4 space-y-2 bg-[#002E5B]">
        <a href="/" class="block text-white hover:text-yellow-300">Home</a>
        <a href="#diensten" class="block text-white hover:text-yellow-300">Diensten</a>
        <a href="#inschrijven" class="block text-white hover:text-yellow-300">Inschrijven</a>
        <a href="#contact" class="block text-white hover:text-yellow-300">Contact</a>

        @auth
            <a href="{{ route('dashboard') }}" class="block text-white hover:text-yellow-300">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left text-white hover:text-red-300">Uitloggen</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block text-white hover:text-yellow-300">Inloggen</a>
            <a href="{{ route('register') }}" class="block bg-yellow-400 text-[#002E5B] px-4 py-2 mt-2 rounded font-bold hover:bg-yellow-300 transition">Registreer</a>
        @endauth
    </div>
</nav>

<!-- Main content -->
<main class="flex-grow max-w-7xl mx-auto px-6 py-8 w-full">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-[#002E5B] text-white mt-12">
    <div class="max-w-7xl mx-auto px-6 py-12 grid gap-10 md:grid-cols-3 text-center md:text-left">
        <div>
            <h3 class="text-lg font-bold mb-2">Vierkante Wielen</h3>
            <p class="text-sm">Dé rijschool voor jongeren met een fysieke beperking.</p>
        </div>
        <div>
            <h4 class="font-semibold mb-2">Navigatie</h4>
            <ul class="space-y-1 text-sm">
                <li><a href="/" class="hover:underline">Home</a></li>
                <li><a href="#diensten" class="hover:underline">Diensten</a></li>
                <li><a href="#inschrijven" class="hover:underline">Inschrijven</a></li>
                <li><a href="#contact" class="hover:underline">Contact</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-semibold mb-2">Contactgegevens</h4>
            <ul class="text-sm space-y-1">
                <li>Email: <a href="mailto:info@vierkantewielen.nl" class="hover:underline">info@vierkantewielen.nl</a></li>
                <li>Telefoon: <a href="tel:+31612345678" class="hover:underline">06-12345678</a></li>
                <li>Adres: Rijschoolstraat 1, 1234 AB Utrecht</li>
            </ul>
        </div>
    </div>

    <div class="bg-[#001F3F] text-center py-4 text-sm text-gray-300">
        © {{ now()->year }} Rijschool Vierkante Wielen. Alle rechten voorbehouden.
    </div>
</footer>

<script>
    feather.replace()
</script>
</body>
</html>
