@extends('layouts.app')

@section('content')
<head>
    <style>
       /* Dalam file output.css */
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Kelas yang akan digunakan di HTML */
.animate-fade-in-down {
    animation: fadeInDown 0.8s ease-out forwards;
}
.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
}
.animate-fade-in {
    animation: fadeIn 0.8s ease-out forwards;
}
.animate-fade-in-scroll {
    opacity: 0; /* Mulai dari tidak terlihat */
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    transform: translateY(20px);
}
.animate-fade-in-scroll.is-visible {
    opacity: 1;
    transform: translateY(0);
}
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer>
     document.addEventListener("DOMContentLoaded", function() {
            const sections = document.querySelectorAll('.animate-fade-in-scroll');

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        // Hapus baris di bawah jika Anda ingin animasi terulang saat di-scroll naik/turun
                        observer.unobserve(entry.target); 
                    }
                });
            }, {
                threshold: 0.2 // Mengatur persentase elemen yang harus terlihat
            });

            sections.forEach(section => {
                observer.observe(section);
            });
        });
</script>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
