<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<header class="bg-[#0D1B2E] fixed top-0 left-0 right-0 z-50 shadow-md text-white font-poppins font-semibold">
    
    {{-- Kontainer Utama Navbar --}}
    <div class="container flex items-center justify-between py-3 px-6 max-w-screen-xl mx-auto">

        {{-- BAGIAN KIRI: LOGO (SATU GAMBAR) --}}
        <a href="{{ url('/') }}" class="flex items-center">
            {{-- Ubah class h-10 (mobile) dan lg:h-12 (desktop) sesuai selera --}}
            <img src="{{ asset('images/Logo_Industrial_Games.png') }}" alt="Logo Industrial Games" class="h-5 lg:h-12 w-auto">
        </a>

        {{-- BAGIAN KANAN: Navigasi --}}
        <div class="flex items-center">

            {{-- MENU DESKTOP (Tampil di layar besar, sembunyi di mobile) --}}
            <nav id="navbar-menu" class="hidden lg:flex lg:items-center lg:space-x-8">
                <a href="{{ url('/') }}" class="hover:text-gray-300">HOME</a>
                <a href="{{ url('/aboutus') }}" class="hover:text-gray-300">ABOUT US</a>
                <a href="{{ url('/faq') }}" class="hover:text-gray-300">FAQ</a>
                <a href="{{ asset('files/guidebook.pdf') }}" target="_blank" class="hover:text-gray-300">GUIDEBOOK</a>
                
                @auth
                    {{-- Menu jika user sudah login --}}
                    <a href="{{ route("peserta.rally") }}" class="hover:text-gray-300">RALLY</a>
                    <a href="{{ route('peserta.account-detail') }}" class="bg-gray-500 px-3 py-1 rounded-md hover:bg-gray-600 border border-gray-400 text-white">ACCOUNT</a>
                @else
                    {{-- Menu jika user belum login --}}
                    <a href="{{ route('login') }}" class="hover:text-gray-300">LOGIN</a>
                    <a href="{{ route('register') }}" class="ml-2 px-3 py-1 border border-white rounded hover:bg-white hover:text-[#0D1B2E] transition">REGISTER</a>
                @endauth
            </nav>

            {{-- TOMBOL HAMBURGER (Tampil di mobile, sembunyi di layar besar) --}}
            <button id="navbar-toggle" class="lg:hidden text-white focus:outline-none ml-6">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

        </div>
    </div>

    {{-- MENU MOBILE DROPDOWN (Sembunyi secara default) --}}
    <div id="mobile-menu" class="lg:hidden hidden bg-[#0D1B2E] px-6 pb-4">
        <div class="flex flex-col space-y-3 pt-3 border-t border-gray-700">
            <a href="{{ url('/') }}" class="hover:text-gray-300">HOME</a>
            <a href="{{ url('/aboutus') }}" class="hover:text-gray-300">ABOUT US</a>
            <a href="{{ url('/faq') }}" class="hover:text-gray-300">FAQ</a>
            <a href="{{ asset('files/guidebook.pdf') }}" target="_blank" class="hover:text-gray-300">GUIDEBOOK</a>
            
            @auth
                {{-- Menu jika user sudah login --}}
                <a href="{{ route("peserta.rally") }}" class="hover:text-gray-300">RALLY</a>
                <a href="{{ route('peserta.account-detail') }}" class="hover:text-gray-300">ACCOUNT</a>
            @else
                {{-- Menu jika user belum login --}}
                <a href="{{ route('login') }}" class="hover:text-gray-300">LOGIN</a>
                <a href="{{ route('register') }}" class="hover:text-gray-300">REGISTER</a>
            @endauth
        </div>
    </div>
</header>

{{-- Script untuk toggle menu mobile --}}
<script>
    document.getElementById('navbar-toggle').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>