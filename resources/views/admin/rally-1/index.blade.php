@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-yellow-400 mb-6">👋 Selamat Datang, Admin</h1>

    <div class="bg-gray-800 rounded-lg p-6 shadow-lg text-white">
        <p class="text-lg mb-4">Silakan pilih POS yang ingin kamu kelola:</p>

        <ul class="space-y-3">
            <li>
                <a href="{{ route('admin.pos', ['id' => 1]) }}"
                   class="block px-5 py-3 bg-blue-600 hover:bg-blue-700 rounded-md shadow text-white font-medium transition">
                    📍 Admin POS 1
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pos', ['id' => 2]) }}"
                   class="block px-5 py-3 bg-green-600 hover:bg-green-700 rounded-md shadow text-white font-medium transition">
                    📍 Admin POS 2
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pos', ['id' => 3]) }}"
                   class="block px-5 py-3 bg-purple-600 hover:bg-purple-700 rounded-md shadow text-white font-medium transition">
                    📍 Admin POS 3
                </a>
            </li>
        </ul>
    </div>
</div>
@endsection
