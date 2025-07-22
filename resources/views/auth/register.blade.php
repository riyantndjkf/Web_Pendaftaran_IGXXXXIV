<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Awal Industrial Games</title>
    <!-- Memastikan Poppins dimuat -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Memuat Tailwind CSS yang sudah dikompilasi oleh Vite -->
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Custom scrollbar for better aesthetics */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #2d3748; /* bg-gray-800 */
        }
        ::-webkit-scrollbar-thumb {
            background: #4a5568; /* bg-gray-700 */
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a0aec0; /* bg-gray-400 */
        }
    </style>
</head>
<body class="bg-[#14191A] text-white">

    <!-- Header -->
    <header class="bg-[#0D1B2E] p-4">
        <nav class="flex justify-between items-center">
            <div class="flex items-center">
                <img src="{{ asset('images/logo_ig.png') }}" alt="Industrial Games Logo">
            </div>
            <ul class="flex space-x-10">
                <li><a href="#" class="hover:text-gray-300 font-bold">HOME</a></li>
                <li><a href="#" class="hover:text-gray-300 font-bold">ABOUT US</a></li>
                <li><a href="#" class="hover:text-gray-300 font-bold">FAQ</a></li>
                <li><a href="#" class="hover:text-gray-300 font-bold">GUIDEBOOK</a></li>
                <li><a href="#" class="hover:text-gray-300 font-bold border border-gray-500 px-3 py-1 rounded-md bg-gray-500">ACCOUNT</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content - Initial Registration Form -->
    <main class="flex-grow flex items-center justify-center py-12 px-4 relative min-h-screen" style="background-image: url('{{ asset('images/Background_Registration.png') }}'); background-size: cover; background-position: center;">
        <!-- Overlay untuk background agar konten lebih menonjol -->
        <div class="absolute inset-0 bg-black bg-opacity-10"></div>

        <!-- PERUBAHAN DI SINI: Mengubah max-w-md menjadi max-w-4xl -->
        <div class="relative z-10 w-full max-w-4xl flex flex-col items-center">
            <!-- Tulisan "REGISTRATION" sebagai gambar -->
            <img src="{{ asset('images/Registration_Tulisan.png') }}" alt="Registration" class="mx-auto w-auto h-24 md:h-32 mb-6 mt-28">

            <form action="#" method="POST" class="space-y-8 w-full">

                <!-- Tombol Single Package dan Bundling Package -->
                <!-- PERUBAHAN DI SINI: Menghapus mb-64 -->
                <div class="flex flex-row space-x-4 justify-center w-full mt-4 mb-32">
                    <!-- PERUBAHAN DI SINI: Menambahkan href -->
                    <a class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-4 px-32 rounded-full text-xl transition duration-300 shadow-lg hover:shadow-xl text-center">
                        Single Package
                    </a>
                    <!-- PERUBAHAN DI SINI: Menambahkan href -->
                    <a class="bg-[#956238] hover:bg-[#A57248] text-white font-bold py-4 px-32 rounded-full text-xl transition duration-300 shadow-lg hover:shadow-xl text-center">
                        Bundling Package
                    </a>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
<footer class="bg-[#120803] py-10">
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
                    <!-- Contoh: -->
                    <!-- <img src="{{ asset('images/sponsor1.png') }}" alt="Sponsor 1" class="h-12"> -->
                    <!-- <img src="{{ asset('images/sponsor2.png') }}" alt="Sponsor 2" class="h-12"> -->
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
