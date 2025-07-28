@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#0e0e0e] flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md bg-white/10 backdrop-blur-md rounded-xl shadow-lg p-8 border border-gray-700 text-white">
        <div class="text-center mb-6">
            <h2 class="text-4xl font-extrabold tracking-wider text-[#d6b05b]" style="font-family: 'YourSteampunkFont', serif;">
                LOGIN
            </h2>
            <p class="mt-2 text-sm text-gray-300">
                Belum punya akun? <a href="{{ route('register') }}" class="text-[#d6b05b] hover:underline">Daftar di sini</a>
            </p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Username --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Username</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="username" required
                    class="w-full px-4 py-2 rounded-md border bg-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#d6b05b] focus:border-[#d6b05b] @error('name') border-red-500 @else border-gray-500 @enderror"
                    placeholder="Masukkan Username">
                @error('name')
                    <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                <input id="password" name="password" type="password" required
                    class="w-full px-4 py-2 rounded-md border bg-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#d6b05b] focus:border-[#d6b05b] @error('password') border-red-500 @else border-gray-500 @enderror"
                    placeholder="Masukkan Password">
                @error('password')
                    <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <div>
                <button type="submit"
                        class="w-full py-2 px-4 bg-[#d6b05b] hover:bg-[#b99743] text-black font-semibold rounded-md shadow-md transition duration-200">
                    Masuk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
