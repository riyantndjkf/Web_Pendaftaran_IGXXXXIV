<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Bundle Tim</title>
    @vite('resources/css/app.css')
    <style>
        body { background-color: #f0f2f5; font-family: sans-serif; }
        .form-container { background-color: #fff; }
        .form-input { border: 1px solid #d1d5db; }
        .btn { padding: 0.75rem 1.5rem; border-radius: 0.5rem; font-weight: bold; cursor: pointer; transition: background-color 0.3s; }
        .btn-primary { background-color: #4f46e5; color: white; }
        .btn-secondary { background-color: #6b7280; color: white; }
        .form-step { display: none; }
        .form-step.active { display: block; }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-4xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800">FORMULIR REGISTRASI BUNDLE</h1>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops! Ada beberapa kesalahan:</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="bundle-form" action="{{ route('register.bundle.store') }}" method="POST" enctype="multipart/form-data" class="form-container rounded-lg p-6 md:p-8 shadow-lg">
            @csrf
            
            <!-- STEP 1: ASAL SEKOLAH & TIM 1 -->
            <div class="form-step active" data-step="1">
                <div class="mb-8 p-4 border rounded-lg bg-gray-50">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Langkah 1: Informasi Umum & Tim Pertama</h2>
                    <div>
                        <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-1">Asal Sekolah (untuk semua tim)</label>
                        <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}" class="form-input w-full rounded-md p-2">
                    </div>
                </div>
                @include('auth.partials.team_form', ['team_index' => 0])
                <div class="mt-8 flex justify-end">
                    <button type="button" class="btn btn-primary next-btn">Next &raquo;</button>
                </div>
            </div>

            <!-- STEP 2: TIM 2 -->
            <div class="form-step" data-step="2">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Langkah 2: Informasi Tim Kedua</h2>
                @include('auth.partials.team_form', ['team_index' => 1])
                <div class="mt-8 flex justify-between">
                    <button type="button" class="btn btn-secondary prev-btn">&laquo; Previous</button>
                    <button type="button" class="btn btn-primary next-btn">Next &raquo;</button>
                </div>
            </div>

            <!-- STEP 3: TIM 3 & BUKTI BAYAR -->
            <div class="form-step" data-step="3">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Langkah 3: Informasi Tim Ketiga & Pembayaran</h2>
                @include('auth.partials.team_form', ['team_index' => 2])
                <div class="mt-6 pt-6 border-t">
                    <label for="foto_bukti_pembayaran" class="block text-sm font-medium text-gray-700 mb-1">Upload Bukti Pembayaran</label>
                    <input type="file" id="foto_bukti_pembayaran" name="foto_bukti_pembayaran" class="form-input w-full rounded-md p-1">
                </div>
                <div class="mt-8 flex justify-between">
                    <button type="button" class="btn btn-secondary prev-btn">&laquo; Previous</button>
                    <button type="submit" class="btn btn-primary">Daftarkan Semua Tim</button>
                </div>
            </div>
        </form>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('bundle-form');
    const nextButtons = document.querySelectorAll('.next-btn');
    const prevButtons = document.querySelectorAll('.prev-btn');
    const steps = document.querySelectorAll('.form-step');
    let currentStep = 1;

    // Fungsi untuk menampilkan langkah tertentu
    function showStep(stepNumber) {
        steps.forEach(step => {
            step.classList.remove('active');
            if (parseInt(step.dataset.step) === stepNumber) {
                step.classList.add('active');
            }
        });
    }

    // Fungsi untuk memvalidasi input pada langkah saat ini
    function validateStep(stepNumber) {
        const currentStepElement = document.querySelector(`.form-step[data-step="${stepNumber}"]`);
        const inputs = currentStepElement.querySelectorAll('input[type="text"], input[type="password"], input[type="email"], textarea, input[type="file"]');
        for (const input of inputs) {
            // Kita hanya cek jika inputnya tidak memiliki value
            if (!input.value) {
                // Kita beri highlight pada field yang kosong
                input.style.borderColor = 'red';
                return false; // Validasi gagal
            }
            // Kembalikan border ke normal jika sudah diisi
            input.style.borderColor = ''; 
        }
        return true; // Validasi berhasil
    }

    nextButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Validasi langkah saat ini sebelum pindah
            if (validateStep(currentStep)) {
                if (currentStep < steps.length) {
                    currentStep++;
                    showStep(currentStep);
                }
            } else {
                alert('Harap isi semua field yang wajib di langkah ini sebelum melanjutkan.');
            }
        });
    });

    prevButtons.forEach(button => {
        button.addEventListener('click', () => {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    // Tambahkan event listener pada form submit untuk validasi langkah terakhir
    form.addEventListener('submit', function(event) {
        if (!validateStep(currentStep)) {
            event.preventDefault(); // Hentikan pengiriman form jika validasi gagal
            alert('Harap isi semua field yang wajib di langkah terakhir ini.');
        }
    });
});
</script>

</body>
</html>
