@extends("layouts.app")

@section("content")
  <section class="relative h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/Background_Industrial_Games.png') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-5 flex flex-col justify-start items-center text-center pt-20 p-4">
            <img src="{{ asset('images/Industrial_Games_Tulisan.png') }}" alt="Industrial Games Title" class="w-auto h-24 sm:h-32 md:h-44 mb-1s">
            <p class="text-xl md:text-3xl font-semibold mb-14">Integrated System through Quality & Performance<br>Management for Industrial Growth</p>
            <a href="{{ url('/register') }}" class="bg-[#956238] hover:bg-[#A57248] text-white font-bold py-6 px-24 rounded-full text-2xl md:text-4xl transition duration-300">REGISTER NOW</a>
            <p class="text-3xl md:text-5xl mt-28 font-bold">WIN A TOTAL OF <br>100++ MILLIONS</span></p>
        </div>
    </section>

    <!-- Poster Section -->
    <!-- PERUBAHAN DI SINI: Menambahkan kelas h-screen -->
    <section class="bg-[#14191A] py-16 flex justify-center items-center relative h-screen" style="background-image: url('{{ asset('images/Background_Poster.png') }}'); background-size: cover; background-position: center;">
        <div class="container mx-auto text-center p-4">
            <img src="{{ asset('images/POSTER_IG.png') }}" alt="Industrial Games XXXIV Poster" class="mx-auto w-[500px] max-w-xl h-auto shadow-lg rounded-lg">
        </div>
    </section>

    <section class="bg-[#14191A] py-16 relative" style="background-image: url('{{ asset('images/Background_Timeline.png') }}'); background-size: cover; background-position: center;">
        <div class="container mx-auto text-center p-4">
            <img src="{{ asset('images/Timeline_Tulisan.png') }}" alt="Timeline" class="mx-auto w-auto h-24 sm:h-32 mb-16">

            <img src="{{ asset('images/Timeline.png') }}" alt="Timeline Content" class="mx-auto w-full max-w-5xl h-auto">
        </div>
    </section>

        <!-- Prizes Section -->
<section class="bg-[#14191A] py-32 relative flex flex-col justify-start items-center" style="background-image: url('{{ asset('images/Background_Prizes.png') }}'); background-size: cover; background-position: center;">
        <div class="container mx-auto text-center p-4">
            <!-- Mengurangi margin-bottom pada tulisan Prizes menjadi mb-0 -->
            <img src="{{ asset('images/Prizes_Tulisan.png') }}" alt="Prizes" class="mx-auto w-auto h-36 sm:h-42 mb-0">
        </div>
        <!-- Menaikkan gambar Prizes lebih jauh dengan mt-[-6rem] -->
<img src="{{ asset('images/Prizes.png') }}" alt="Prizes Content" class="w-full h-auto mt-4 mb-20">
    </section>



    <script>
        let currentSlide = 0;
        const slides = document.getElementById('carouselSlides');
        const totalSlides = slides ? slides.children.length : 0;

        function moveSlide(direction) {
            currentSlide += direction;
            if (currentSlide < 0) {
                currentSlide = totalSlides - 1;
            } else if (currentSlide >= totalSlides) {
                currentSlide = 0;
            }
            slides.style.transform = `translateX(${-currentSlide * 100}%)`;
        }

        // Optional: Auto-play carousel
        // setInterval(() => {
        //     moveSlide(1);
        // }, 5000); // Change image every 5 seconds
    </script>
@endsection