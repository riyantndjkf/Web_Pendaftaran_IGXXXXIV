<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Tim</title>
    @vite('resources/css/app.css')
    <style>
        body { background-color: #f0f2f5; font-family: sans-serif; }
        .form-container { background-color: #fff; }
        .form-input { border: 1px solid #d1d5db; }
        .btn-submit { background-color: #4f46e5; color: white; }
        .member-card { border: 1px solid #e5e7eb; border-radius: 0.5rem; padding: 1.5rem; margin-bottom: 1.5rem; }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
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
                        <input type="text" id="nama_tim" name="nama_tim" value="{{ old('nama_tim') }}" class="form-input w-full rounded-md p-2" required>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Tim</label>
                        <input type="password" id="password" name="password" class="form-input w-full rounded-md p-2" required>
                    </div>
                    <div class="md:col-span-2">
                        <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-1">Asal Sekolah</label>
                        <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}" class="form-input w-full rounded-md p-2" required>
                    </div>
                </div>
            </div>

            <h2 class="text-2xl font-semibold text-gray-700 border-b pb-2 mb-6">Informasi Anggota</h2>
            @for ($i = 0; $i < 3; $i++)
                @include('auth.partials.team_form_single', ['index' => $i])
            @endfor

            <!-- ===== BLOK BUKTI PEMBAYARAN ===== -->
            <div class="mt-6 pt-6 border-t">
                <label for="foto_bukti_pembayaran" class="block text-sm font-medium text-gray-700 mb-1">Upload Bukti Pembayaran</label>
                <input type="file" id="foto_bukti_pembayaran" name="foto_bukti_pembayaran" class="form-input w-full rounded-md p-1 file:mr-4 file:py-1 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" required>
                @error('foto_bukti_pembayaran') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <!-- ===== BATAS BLOK ===== -->

            <div class="mt-8 flex items-center justify-center">
                <button type="submit" class="btn-submit font-bold py-3 px-10 rounded-lg">
                    Daftarkan Tim
                </button>
            </div>
        </form>
    </div>
</body>
</html>
