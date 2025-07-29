@extends('layouts.rally-2')

@section('title', 'Claim Envelope - Rally 2')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-yellow-700 px-4 py-10">
        <div class="bg-white text-gray-800 p-10 rounded-2xl shadow-2xl text-center max-w-lg w-full">
            <h1 class="text-3xl font-bold text-green-600 mb-2">🎉 Selamat!</h1>
            <p class="text-lg text-gray-700 mb-4">Kamu mendapatkan</p>
            <p class="text-4xl font-extrabold text-green-700 mb-4">${{ $envelope->reward_amount }}</p>
            <p class="text-sm text-gray-500 italic mb-8">Lokasi: {{ $envelope->deskripsi_lokasi }}</p>

            {{-- Tombol scan lagi --}}
            <div class="mt-6">
                <a href="{{ route('rally-2.scanner') }}"
                class="inline-block bg-green-600 hover:bg-green-700 text-black font-semibold py-2 px-6 rounded-lg transition">
                    🔄 Scan Lagi
                </a>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fade-in 0.8s ease-out;
        }
    </style>
@endsection