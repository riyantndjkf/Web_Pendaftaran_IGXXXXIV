@extends('layouts.rally-2')

@section('title', 'Events - Rally 2')

@section('content')
    <div class="flex justify-between items-center p-4 bg-yellow-600">
        <a href="{{ route('peserta.rally-2.index') }}" class="text-black text-2xl">
            <x-ri-arrow-left-s-line class="w-10 h-10 text-black" />
        </a>
        <div class="text-xl font-bold text-black">EVENTS</div>
        <button onclick="toggleSideMenu()">
            <x-radix-text-align-justify class="w-10 h-10 text-black" />
        </button>
    </div>

    <div class="p-4">
        <div class="bg-white rounded-lg mb-4 text-black p-5">
            <h1 class="font-bold text-[50px]">SESI 1</h1>
            <div class="flex flex-col gap-2">
                <h3 class="font-bold text-xl">Diskon inventory cost (25%)</h3>
                <h3 class="font-bold text-xl">Reward jawab soal x1.5</h3>
            </div>
        </div>
    </div>

    <x-rally-2-sidebar />
@endsection