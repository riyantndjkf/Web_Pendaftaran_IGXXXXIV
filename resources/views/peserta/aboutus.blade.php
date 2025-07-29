@extends("layouts.app")

@section("content")
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding-top: 56px; /* Adjust based on fixed header height */
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #2d3748;
        }
        ::-webkit-scrollbar-thumb {
            background: #4a5568;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a0aec0;
        }
        /* Style for carousel */
        .carousel-container {
            position: relative;
            width: 100%;
            max-width: 600px; /* Adjust as needed */
            margin: 0 auto;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            background-color: white; /* White box for images */
        }
        .carousel-slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .carousel-slide {
            min-width: 100%;
            box-sizing: border-box;
        }
        .carousel-slide img {
            width: 100%;
            height: auto;
            display: block;
        }
        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 1.5rem;
            border-radius: 5px;
            z-index: 10;
        }
        .carousel-button.left {
            left: 10px;
        }
        .carousel-button.right {
            right: 10px;
        }
    </style>
   

    <!-- What is IG Section -->
<section class="relative py-16 px-4 flex flex-col items-center justify-center min-h-screen" style="background-image: url('{{ asset('images/Background_WhatIsIg.png') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="absolute inset-0 bg-black bg-opacity-70"></div> <!-- Overlay -->
        
        <div class="relative z-10 w-full max-w-4xl text-center">
            <!-- "WHAT IS IG" as an image -->
            <img src="{{ asset('images/WhatIsIg_Tulisan.png') }}" alt="What is IG" class="mx-auto w-auto h-16 sm:h-24 md:h-32 mb-8">
            
            <!-- White box with images carousel -->
            <div class="carousel-container mb-8">
                <div class="carousel-slides" id="carouselSlides">
                    <!-- Placeholder images for carousel -->
                    <div class="carousel-slide"><img src="images/DOKUM_1.jpg" alt="Carousel Image 1"></div>
                    <div class="carousel-slide"><img src="images/DOKUM_2.jpg" alt="Carousel Image 2"></div>
                    <div class="carousel-slide"><img src="images/DOKUM_3.jpg" alt="Carousel Image 3"></div>
                </div>
                <button class="carousel-button left" onclick="moveSlide(-1)">&#10094;</button>
                <button class="carousel-button right" onclick="moveSlide(1)">&#10095;</button>
            </div>

            <p class="text-xl md:text-2xl font-semibold leading-relaxed border border-[#602C00] px-3 py-1 rounded-md bg-[#602C00] mt-8">
                IG (Industrial Games) adalah lomba bidang Teknik Industri yang berbentuk permainan/games untuk siswa-siswi SMA/SMK sederajat di seluruh Indonesia yang diselenggarakan oleh Teknik Industri Universitas Surabaya.
            </p>
        </div>
    </section>

    <!-- Join Now Section -->
    <section class="relative py-16 px-4 flex flex-col items-center justify-center min-h-screen" style="background-image: url('{{ asset('images/Background_JoinNow.png') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="absolute inset-0 bg-black bg-opacity-70"></div> <!-- Overlay -->
        
        <div class="relative z-10 w-full max-w-4xl text-center">
            <!-- "JOIN NOW" as an image -->
            <img src="{{ asset('images/JoinNow_Tulisan.png') }}" alt="Join Now" class="mx-auto w-auto h-16 sm:h-24 md:h-32 mb-12">
            
            <img src="{{ asset('images/JoinNow_Images.png') }}" alt="Industrial Games Overview" class="mx-auto w-full h-auto object-cover border-8 border-[#D4A373] rounded-lg mb-8">
            
        </div>
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