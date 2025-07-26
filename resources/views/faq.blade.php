<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industrial Games - FAQ</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite('resources/css/app.css')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding-top: 64px; /* Adjust based on fixed header height */
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
        /* Style for accordion */
        .accordion-item {
            background-color: #1a202c; /* bg-gray-900 */
            border-radius: 10px;
            overflow: hidden;
        }
        .accordion-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem; /* p-6 */
            cursor: pointer;
            background-color: #845729; 
        }
        .accordion-header:hover {
            background-color: #ab7136ff; /* hover:bg-gray-700 */
        }
        .accordion-content {
            background-color: #602C00; /* bg-gray-900 */
            overflow: hidden;
            transition: max-height 0.05s ease-out, padding 0.3s ease-out; /* Add transition for padding */
            max-height: 0; /* Hide by default using max-height */
        }
        .accordion-content.active {
            padding: 1rem; /* p-6 */
            /* max-height akan diatur oleh JavaScript secara dinamis */
        }
        .arrow-icon {
            transition: transform 0.3s ease;
        }
        .accordion-header.active .arrow-icon {
            transform: rotate(180deg);
        }
    </style>
</head>
<body class="bg-[#14191A] text-white">

    <!-- Header / Navigation Bar -->
     <header class="bg-[#0D1B2E] py-2 px-4 fixed top-0 left-0 right-0 z-50">
        <nav class="flex justify-between items-center">
            <!-- PERUBAHAN DI SINI: Mengganti teks dengan gambar logo -->
            <div class="flex items-center">
                <img src="{{ asset('images/Logo_Industrial_Games.png') }}" alt="Industrial Games Logo" class="h-12 w-auto">
            </div>
            <ul class="flex space-x-10 ml-auto">
                <li><a href="{{ url('/') }}" class="hover:text-gray-300 font-bold">HOME</a></li>
                <li><a href="{{ url('/aboutus') }}" class="hover:text-gray-300 font-bold">ABOUT US</a></li>
                <li><a href="{{ url('/faq') }}" class="hover:text-gray-300 font-bold">FAQ</a></li>
                <li><a href="{{ url('/account') }}" class="hover:text-gray-300 font-bold border border-gray-500 px-3 py-1 rounded-md bg-gray-500">ACCOUNT</a></li>
            </ul>
        </nav>
    </header>

    <!-- FAQ Section -->
    <section class="relative py-16 px-4 flex flex-col items-center justify-center min-h-screen" style="background-image: url('{{ asset('images/Background_FAQ.png') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="absolute inset-0 bg-black bg-opacity-0"></div> <!-- Overlay -->
        
        <div class="relative z-10 w-full max-w-4xl h-auto text-center">
            
            <!-- PERUBAHAN DI SINI: Memberikan z-index pada gambar FAQ Tulisan -->
            <img src="{{ asset('images/FAQ_Tulisan.png') }}" alt="Frequently Asked Questions Title" class="mx-auto w-full h-32 sm:h-48 md:h-24 mb-12 relative z-10 mt-48">
            
            <div class="space-y-6">
                <!-- FAQ Item 1 -->
                <div class="accordion-item">
                    <div class="accordion-header text-left font-semibold text-xl">
                        <span>Apa itu IG?</span>
                        <span class="arrow-icon">&#9660;</span> <!-- Down arrow -->
                    </div>
                    <div class="accordion-content text-left text-lg font-semibold">
                        <p>IG (Industrial Games) adalah lomba yang diselenggarakan oleh Teknik Industri Universitas Surabaya di bidang Teknik Industri dalam bentuk permainan/games yang seru dan menantang, serta dikemas dengan konsep yang menarik. Perlombaan ini dikemas dalam bentuk games yang seru, menantang, dan mendidik.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="accordion-item">
                    <div class="accordion-header text-left font-semibold text-xl">
                        <span>Apakah IG XXXIII akan diadakan secara online atau offline?</span>
                        <span class="arrow-icon">&#9660;</span>
                    </div>
                    <div class="accordion-content text-left text-lg font-semibold">
                        <p>Industrial Games XXXIII akan diadakan secara offline selama 2 hari di Universitas Surabaya (Ubaya), Kampus Tenggilis. Peserta akan mengikuti rangkaian permainan yang seru dan menantang untuk mendapatkan pengalaman yang lebih interaktif dan mendalam.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="accordion-item">
                    <div class="accordion-header text-left font-semibold text-xl">
                        <span>Apa saja tahap dalam IG XXXIII?</span>
                        <span class="arrow-icon">&#9660;</span>
                    </div>
                    <div class="accordion-content text-left text-lg font-semibold">
                        <p>Industrial Games XXXIII terdiri dari tiga tahapan utama, yaitu Babak Game Besar, Semifinal, dan Babak Final. Ketiga tahapan ini dirancang untuk mengasah kemampuan analisis, strategi, dan kreativitas peserta dalam memecahkan studi kasus nyata.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="accordion-item">
                    <div class="accordion-header text-left font-semibold text-xl">
                        <span>Apa tema yang diangkat IG XXXIII?</span>
                        <span class="arrow-icon">&#9660;</span>
                    </div>
                    <div class="accordion-content text-left text-lg font-semibold">
                        <p>"Integrated System through Quality and Performance Management for Industrial Growth"</p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="accordion-item">
                    <div class="accordion-header text-left font-semibold text-xl">
                        <span>Apa saja materi yang dipersiapkan untuk mengikuti IG XXXIII?</span>
                        <span class="arrow-icon">&#9660;</span>
                    </div>
                    <div class="accordion-content text-left text-lg font-semibold">
                        <p>Materi seputar teknik industri meliputi MIPA dan Pengetahuan Umum</p>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="accordion-item">
                    <div class="accordion-header text-left font-semibold text-xl">
                        <span>Dimana kita bisa mendapatkan info-info mengenai IG XXXIII?</span>
                        <span class="arrow-icon">&#9660;</span>
                    </div>
                    <div class="accordion-content text-left text-lg font-semibold">
                        <p>Teman-teman bisa nih pantengin terus akun media sosial Industrial Games di :</p>
                        <p>• Instagram : @ig_ubaya</p>
                        <p>• Line : @257saktt</p>
                        <p>• WhatsApp : 085103929088 (Philander)</p>
                        <p>• Email : industrialgames.ubaya@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#120803] pt-8">
        <!-- PERUBAHAN DI SINI: Mengubah grid-cols-1 md:grid-cols-3 menjadi grid-cols-1 md:grid-cols-2 dan menambahkan grid-rows-2 -->
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 px-4">
            <!-- Social Media -->
            <div>
                <h3 class="text-3xl font-bold mb-4 mt-12">OUR SOCIAL MEDIA</h3>
                <ul>
                    <li class="mb-2"><a href="https://www.instagram.com/ig_ubaya" target="_blank" class="flex items-center hover:text-gray-300"><img src="{{ asset('icons/Instagram.png') }}" alt="Instagram" class="w-6 h-6 mr-2">@ig_ubaya</a></li>
                    <li class="mb-2"><a href="https://www.tiktok.com/@ig_ubaya?is_from_webapp=1&sender_device=pc" target="_blank" class="flex items-center hover:text-gray-300"><img src="{{ asset('icons/Tiktok.png') }}" alt="Tiktok" class="w-6 h-6 mr-2">@ig_ubaya</a></li>
                </ul>
            </div>

            <!-- Contact Us -->
            <div>
                <h3 class="text-3xl font-bold mb-4 mt-12">CONTACT US</h3>
                <ul>
                    <li class="mb-2 flex items-center"><img src="{{ asset('icons/Line.png') }}" alt="Line" class="w-6 h-6 mr-2">257saktt (admin)</li>
                    <li class="mb-2 flex items-center"><img src="{{ asset('icons/Whatsapp.png') }}" alt="WhatsApp" class="w-6 h-6 mr-2">085103929088 (Philander)</li>
                    <li class="mb-2 flex items-center"><img src="{{ asset('icons/Whatsapp.png') }}" alt="WhatsApp" class="w-6 h-6 mr-2">081330286135 (Rachel)</li>
                    <li class="mb-2 flex items-center"><img src="{{ asset('icons/Gmail.png') }}" alt="Email" class="w-6 h-6 mr-2">industrialgames.ubaya@gmail.com</li>
                </ul>
            </div>

            <!-- Sponsored By -->
            <!-- PERUBAHAN DI SINI: Menambahkan col-span-full untuk menempati lebar penuh di baris baru -->
            <div class="col-span-full mt-8"> <!-- Menambahkan margin-top untuk jeda dari bagian atas -->
                <h3 class="text-3xl font-bold mb-[200px]">SPONSORED BY:</h3>
                <div class="flex flex-wrap gap-4">
                    <!-- Placeholder for sponsor logos if any -->
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const accordionHeaders = document.querySelectorAll('.accordion-header');

            accordionHeaders.forEach(header => {
                header.addEventListener('click', () => {
                    const accordionContent = header.nextElementSibling;
                    
                    // Close other open accordions
                    accordionHeaders.forEach(otherHeader => {
                        const otherContent = otherHeader.nextElementSibling;
                        if (otherHeader !== header && otherHeader.classList.contains('active')) {
                            otherHeader.classList.remove('active');
                            otherContent.classList.remove('active');
                            otherContent.style.maxHeight = '0'; // Explicitly set max-height to 0
                        }
                    });

                    // Toggle active class on header
                    header.classList.toggle('active');
                    
                    // Toggle content visibility and animate height
                    if (accordionContent.classList.contains('active')) {
                        // If it's active, set to scrollHeight first for smooth collapse, then to 0
                        accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px'; // Set to current height
                        accordionContent.classList.remove('active'); // Remove active class
                        // After a tiny delay, set to 0 to trigger collapse transition
                        setTimeout(() => {
                            accordionContent.style.maxHeight = '0';
                        }, 10); // Small delay
                    } else {
                        accordionContent.classList.add('active');
                        // Set maxHeight to its scrollHeight to trigger the initial transition
                        accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
                        // After the transition starts, set it to a large value to ensure full visibility
                        // This is a common trick to get smooth transitions for unknown heights
                        accordionContent.addEventListener('transitionend', function handler() {
                            accordionContent.removeEventListener('transitionend', handler);
                            accordionContent.style.maxHeight = '2000px'; // Or any sufficiently large value
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
