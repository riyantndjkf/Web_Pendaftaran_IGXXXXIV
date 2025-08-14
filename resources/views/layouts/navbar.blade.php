<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<header class="bg-[#0D1B2E] fixed top-0 left-0 right-0 z-50 shadow-md text-white font-poppins font-semibold">
    <div class="container flex items-center justify-between py-3 px-6 max-w-screen-xl mx-auto font-poppins">
        <a href="{{ url('/') }}" class="flex">
            <img src="{{ asset('images/Logo_Industrial_Games.png') }}" alt="Logo" class="h-10 lg:h-12 w-auto">        </a>

        <button id="navbar-toggle" class="lg:hidden text-white focus:outline-none font-poppins">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        {{-- MENU DESKTOP --}}
        <nav id="navbar-menu" class="hidden lg:flex lg:items-center lg:space-x-10 font-semibold font-poppins">
            <a href="{{ url('/') }}" class="hover:text-gray-300">HOME</a>
            <a href="{{ url('/aboutus') }}" class="hover:text-gray-300">ABOUT US</a>
            <a href="{{ url('/faq') }}" class="hover:text-gray-300">FAQ</a>
            
            {{-- INI YANG DIUBAH --}}
            <a href="{{ asset('files/GuideBook.pdf') }}" target="_blank" class="hover:text-gray-300">GUIDEBOOK</a>
            
            @auth
                <a href="{{ route("peserta.rally") }}" class="hover:text-gray-300">RALLY</a>
                <a href="{{ route('peserta.account-detail') }}" class="bg-gray-500 px-3 py-1 rounded-md hover:bg-gray-600 border border-gray-400 text-white">ACCOUNT</a>
            @else
                <a href="{{ route('login') }}" class="hover:text-gray-300">LOGIN</a>
                <a href="{{ route('register') }}" class="ml-2 px-3 py-1 border border-white rounded hover:bg-white hover:text-[#0D1B2E] transition">REGISTER</a>
            @endauth
        </nav>
    </div>

    {{-- MENU MOBILE --}}
    <div id="mobile-menu" class="lg:hidden hidden px-4 pb-4 font-poppins">
        <div class="flex flex-col space-y-3 font-semibold">
            <a href="{{ url('/') }}" class="hover:text-gray-300">HOME</a>
            <a href="{{ url('/aboutus') }}" class="hover:text-gray-300">ABOUT US</a>
            <a href="{{ url('/faq') }}" class="hover:text-gray-300">FAQ</a>

            {{-- INI JUGA DIUBAH AGAR KONSISTEN --}}
            <a href="{{ asset('files/GuideBook.pdf') }}" target="_blank" class="hover:text-gray-300">GUIDEBOOK</a>

            @auth
                <a href="{{ route("peserta.rally") }}" class="hover:text-gray-300">RALLY</a>
                <a href="{{ route('peserta.account-detail') }}" class="bg-gray-500 px-3 py-1 rounded-md hover:bg-gray-600 border border-gray-400 text-white">ACCOUNT</a>
            @else
                <a href="{{ route('login') }}" class="hover:text-gray-300">LOGIN</a>
                <a href="{{ route('register') }}" class="px-3 py-1 border border-white rounded hover:bg-white hover:text-[#0D1B2E] transition">REGISTER</a>
            @endauth
        </div>
    </div>
</header>

<script>
    document.getElementById('navbar-toggle').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>