<header class="bg-[#0D1B2E] fixed top-0 left-0 right-0 z-50 shadow-md text-white">
    <div class="container mx-auto flex items-center justify-between py-3 px-4">
        <a href="{{ url('/') }}" class="flex items-center space-x-2">
            <img src="{{ asset('images/Logo_Industrial_Games.png') }}" alt="Logo" class="h-12 w-auto">
        </a>


        <!-- Main Menu -->
        <nav id="navbar-menu" class="hidden lg:flex lg:items-center lg:space-x-10 font-semibold">
            @auth
               <a href="{{ route('peserta.home') }}" class="hover:text-gray-300">HOME</a>
            @else
                <a href="{{ route('qhome') }}" class="hover:text-gray-300">HOME</a>
            @endauth
            

            <a href="{{ url('/aboutus') }}" class="hover:text-gray-300">ABOUT US</a>
            <a href="{{ url('/faq') }}" class="hover:text-gray-300">FAQ</a>

            @auth
                <a href="{{ route("peserta.rally") }}" class="hover:text-gray-300">RALLY</a>
                <a href="{{ route('peserta.account-detail') }}" class="bg-gray-500 px-3 py-1 rounded-md hover:bg-gray-600 border border-gray-400 text-white">ACCOUNT</a>
                
            @else
                <a href="{{ route('login') }}" class="hover:text-gray-300">LOGIN</a>
                <a href="{{ route('register') }}" class="ml-2 px-3 py-1 border border-white rounded hover:bg-white hover:text-[#0D1B2E] transition">REGISTER</a>
            @endauth
        </nav>
    </div>

   
</header>

<script>
    document.getElementById('navbar-toggle').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
