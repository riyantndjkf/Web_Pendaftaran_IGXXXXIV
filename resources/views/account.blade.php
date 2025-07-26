<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industrial Games - Akun Tim</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite('resources/css/app.css')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding-top: 56px; /* Sesuaikan dengan tinggi header fixed */
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
    </style>
</head>
<body class="bg-[#14191A] text-white">

    <!-- Header / Navigation Bar (Konsisten dengan halaman lain) -->
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

    <!-- Account Section -->
   <section class="relative py-16 px-4 flex flex-col items-center justify-center min-h-screen" style="background-image: url('{{ asset('images/Background_Industrial_Games.png') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="absolute inset-0 bg-black bg-opacity-10"></div> <!-- Overlay -->
        
        <div class="relative z-10 w-full max-w-2xl bg-gray-800 p-8 rounded-lg shadow-xl text-center">
            <h2 class="text-3xl font-bold mb-8 text-yellow-400">Data Tim Anda</h2>
            
            <div class="space-y-6 text-left">
                <!-- Nama Tim -->
                <div class="bg-gray-700 p-4 rounded-md shadow-inner">
                    <p class="text-gray-300 text-lg">Nama Tim:</p>
                    {{-- Mengambil nama tim dari variabel $teamData --}}
                    <p class="text-white text-2xl font-semibold">{{ $teamData['team_name'] ?? 'Nama Tim Belum Tersedia' }}</p>
                </div>

                <!-- Data Peserta -->
                <div class="bg-gray-700 p-4 rounded-md shadow-inner">
                    <p class="text-gray-300 text-lg mb-2">Nama Peserta:</p>
                    <ul class="list-disc list-inside text-white text-xl ml-4 space-y-1">
                        {{-- Melakukan loop untuk setiap peserta --}}
                        @forelse($teamData['participants'] ?? [] as $participant)
                            <li>{{ $participant }}</li>
                        @empty
                            <li>Data Peserta Belum Tersedia</li>
                        @endforelse
                    </ul>
                </div>

                <!-- Status Pembayaran -->
                <div class="bg-gray-700 p-4 rounded-md shadow-inner">
                    <p class="text-gray-300 text-lg">Status Pembayaran:</p>
                    {{-- Menyesuaikan warna teks berdasarkan status pembayaran --}}
                    @php
                        $paymentStatus = $teamData['payment_status'] ?? 'Belum Diketahui';
                        $paymentColorClass = ($paymentStatus == 'Sudah Bayar') ? 'text-green-400' : 'text-red-400';
                    @endphp
                    <p class="{{ $paymentColorClass }} text-2xl font-bold">{{ $paymentStatus }}</p>
                </div>
            </div>

            <div class="mt-10">
                <a href="{{ url('/dashboard') }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-8 rounded-full text-lg transition duration-300 shadow-lg hover:shadow-xl">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </section>

    <!-- Footer (Konsisten dengan halaman lain) -->
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

</body>
</html>
