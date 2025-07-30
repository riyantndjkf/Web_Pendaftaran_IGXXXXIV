@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

@if (session('error'))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 4000)" 
        class="fixed top-5 right-5 z-50 bg-red-600 text-white px-4 py-3 rounded shadow-lg transition-opacity"
    >
        {{ session('error') }}
    </div>
@endif

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-xl rounded-lg p-10 w-full max-w-md text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Dashboard</h2>
        <p class="text-gray-600 mb-6">You are logged in!</p>

        <div class="flex flex-col gap-4">
            <a href="{{ route('admin.rally-1.index') }}" class="bg-green-500 text-white font-semibold py-3 rounded-lg hover:bg-green-600 transition duration-200">
                🚩 Rally-1
            </a>
            <a href="{{ route('admin.rally-2.index') }}" class="bg-yellow-500 text-white font-semibold py-3 rounded-lg hover:bg-yellow-600 transition duration-200">
                🏁 Rally-2
            </a>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="mt-6">
            @csrf
            <button type="submit" class="bg-red-600 w-full text-white py-2 rounded-lg hover:bg-red-700 transition duration-200">
                🔓 Logout
            </button>
        </form>
    </div>
</div>
@endsection
