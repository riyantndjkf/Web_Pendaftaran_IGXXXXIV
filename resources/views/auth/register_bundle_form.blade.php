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

    .form-step {
        display: none;
        animation: fadeIn 0.3s ease-in-out;
    }

    .form-step.active {
        display: block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<div class="flex items-center justify-center min-h-screen p-4 bg-white text-black">
    <div class="w-full max-w-4xl mx-auto bg-white">
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

            <!-- STEP 1 -->
            <div class="form-step active" data-step="1">
                <div class="mb-8 p-4 border rounded-lg bg-gray-50">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Langkah 1: Informasi Umum & Tim Pertama</h2>
                    <div>
                        <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-1">Asal Sekolah (untuk semua tim)</label>
                        <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}" class="form-input">
                    </div>
                </div>
                @include('auth.partials.team_form', ['team_index' => 0])
                <div class="mt-8 flex justify-end">
                    <button type="button" class="btn btn-primary next-btn">Next &raquo;</button>
                </div>
            </div>

            <!-- STEP 2 -->
            <div class="form-step" data-step="2">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Langkah 2: Informasi Tim Kedua</h2>
                @include('auth.partials.team_form', ['team_index' => 1])
                <div class="mt-8 flex justify-between">
                    <button type="button" class="btn btn-secondary prev-btn">&laquo; Previous</button>
                    <button type="button" class="btn btn-primary next-btn">Next &raquo;</button>
                </div>
            </div>

            <!-- STEP 3 -->
            <div class="form-step" data-step="3">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Langkah 3: Informasi Tim Ketiga & Pembayaran</h2>
                @include('auth.partials.team_form', ['team_index' => 2])
                <div class="mt-6 pt-6 border-t">
                    <label for="foto_bukti_pembayaran" class="block text-sm font-medium text-gray-700 mb-1">Upload Bukti Pembayaran</label>
                    <input type="file" id="foto_bukti_pembayaran" name="foto_bukti_pembayaran" class="form-input">
                </div>
                <div class="mt-8 flex justify-between">
                    <button type="button" class="btn btn-secondary prev-btn">&laquo; Previous</button>
                    <button type="submit" class="btn btn-primary">Daftarkan Semua Tim</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('bundle-form');
    const nextButtons = document.querySelectorAll('.next-btn');
    const prevButtons = document.querySelectorAll('.prev-btn');
    const steps = document.querySelectorAll('.form-step');
    let currentStep = 1;

    function showStep(stepNumber) {
        steps.forEach(step => {
            step.classList.remove('active');
            if (parseInt(step.dataset.step) === stepNumber) {
                step.classList.add('active');
            }
        });
    }

    function validateStep(stepNumber) {
        const currentStepElement = document.querySelector(`.form-step[data-step="${stepNumber}"]`);
        const inputs = currentStepElement.querySelectorAll('input[type="text"], input[type="password"], input[type="email"], textarea, input[type="file"]');
        for (const input of inputs) {
            if (!input.value) {
                input.style.borderColor = 'red';
                return false;
            }
            input.style.borderColor = '';
        }
        return true;
    }

    nextButtons.forEach(button => {
        button.addEventListener('click', () => {
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

    form.addEventListener('submit', function(event) {
        if (!validateStep(currentStep)) {
            event.preventDefault();
            alert('Harap isi semua field yang wajib di langkah terakhir ini.');
        }
    });

    showStep(currentStep);
});
</script>
@endsection