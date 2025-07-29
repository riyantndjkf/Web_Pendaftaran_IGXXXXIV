@extends('layouts.app')

@section('content')
<style>
    .form-container {
        background-color: #ffffff;
        border-radius: 0.75rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                    0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .form-input {
        border: 1px solid #d1d5db;
        background-color: #f9fafb;
        padding: 0.5rem 0.75rem;
        width: 100%;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        line-height: 1.25rem;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .form-input:focus {
        border-color: #6366f1;
        outline: none;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        background-color: #ffffff;
    }

    .btn {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
        text-align: center;
    }

    .btn:hover {
        transform: translateY(-1px);
    }

    .btn-primary {
        background-color: #4f46e5;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #4338ca;
    }

    .btn-secondary {
        background-color: #6b7280;
        color: white;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #4b5563;
    }
</style>
<div class="bg-gray-100 flex items-center justify-center min-h-screen p-4 text-black">
    <div class="w-full max-w-4xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800">FORMULIR REGISTRASI TIM</h1>
        </div>

        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="form-container rounded-lg p-6 md:p-8 shadow-lg">
            @csrf

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <strong class="font-bold">Registrasi Gagal! Harap periksa kembali data Anda:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-700 border-b pb-2 mb-6">Informasi Tim</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nama_tim" class="block text-sm font-medium text-gray-700 mb-1">Nama Tim</label>
                        <input type="text" id="nama_tim" name="nama_tim" value="{{ old('nama_tim') }}" class="form-input" required>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Tim</label>
                        <input type="password" id="password" name="password" class="form-input" required>
                    </div>
                    <div class="md:col-span-2">
                        <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-1">Asal Sekolah</label>
                        <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}" class="form-input" required>
                    </div>
                </div>
            </div>

            <h2 class="text-2xl font-semibold text-gray-700 border-b pb-2 mb-6">Informasi Anggota</h2>
            @for ($i = 0; $i < 3; $i++)
                @include('auth.partials.team_form_single', ['index' => $i])
            @endfor

            <div class="mt-6 pt-6 border-t">
                <label for="foto_bukti_pembayaran" class="block text-sm font-medium text-gray-700 mb-1">Upload Bukti Pembayaran</label>
                <input type="file" id="foto_bukti_pembayaran" name="foto_bukti_pembayaran" class="form-input file:mr-4 file:py-1 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" required>
                @error('foto_bukti_pembayaran') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mt-8 flex items-center justify-center">
                <button type="submit" class="btn btn-primary">
                    Daftarkan Tim
                </button>
            </div>
        </form>
    </div>
</div>
@endsection