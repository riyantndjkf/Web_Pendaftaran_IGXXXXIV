@extends('layouts.rally-2')

@section('title', 'Question - Rally 2')

@section('content')
    <div class="flex items-center justify-center min-h-screen px-6 py-8">
        <div class="bg-white rounded-2xl p-8 w-full max-w-md mx-auto shadow-2xl">
            <div class="text-left mb-6">
                <span class="text-4xl font-bold text-green-600">$1000</span>
            </div>

            <div class="flex items-start justify-start">
                <p class="text-xl font-bold text-black">Sayur sayur apa yang romantis?</p>
            </div>

            <div class="flex flex-col gap-4 mt-4">
                <button class="w-full p-4 text-left bg-gray-100 rounded-lg border-2" onclick="selectOption(this, false)">
                    <span class="text-lg font-medium text-black">sawi</span>
                </button>

                <button class="w-full p-4 text-left bg-gray-100 rounded-lg border-2" onclick="selectOption(this, false)">
                    <span class="text-lg font-medium text-black">wortel</span>
                </button>
                <button class="w-full p-4 text-left bg-gray-100 rounded-lg border-2" onclick="selectOption(this, false)">
                    <span class="text-lg font-medium text-black">mang adul</span>
                </button>

                <button class="w-full p-4 text-left bg-gray-100 rounded-lg border-2" onclick="selectOption(this, true)">
                    <span class="text-lg font-medium text-black">Toge (together with you)</span>
                </button>
            </div>

            <button id="submitBtn" class="w-full bg-[#FFB886] mt-4 text-black font-bold py-4 px-6 rounded-lg text-lg"
                onclick="submitAnswer()" disabled>
                SUBMIT
            </button>
        </div>
    </div>

    <!-- Modal Jawaban Benar -->
    <div id="correctModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50">
        <div class="bg-amber-100 border-4 border-amber-500 rounded-2xl p-8 max-w-sm mx-4 text-center">
            <div class="flex items-center justify-center mb-4">
                <x-clarity-success-standard-solid class="w-24 h-24 text-green-500" />
            </div>
            <h2 class="text-2xl font-bold text-green-700 mb-2">muantap kelen!!!</h2>
            <div class="flex items-center justify-center mb-4">
                <x-eva-plus-outline class="w-6 h-6 text-green-600" />
                <p class="text-2xl text-green-600 font-semibold">$1000</p>
            </div>
            <button
                class="bg-orange-300 hover:bg-orange-400 text-black font-bold py-3 px-8 rounded-lg transition-colors duration-300"
                onclick="closeModal()">
                LANJUT
            </button>
        </div>
    </div>

    <!-- Modal Jawaban Salah -->
    <div id="wrongModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50">
        <div class="bg-red-50 border-4 border-red-500 rounded-2xl p-8 max-w-sm mx-4 text-center">
            <div class="text-6xl mb-4 text-red-500">✕</div>
            <h2 class="text-2xl font-bold text-red-700 mb-4">Yang bener ae kelen!!</h2>
            <button
                class="bg-orange-300 hover:bg-orange-400 text-black font-bold py-3 px-8 rounded-lg transition-colors duration-300"
                onclick="closeModal()">
                Lanjut
            </button>
        </div>
    </div>

    <script>
        let selectedOption = null;
        let isCorrect = false;


        function selectOption(button, correct) {
            document.querySelectorAll('button[onclick*="selectOption"]').forEach(btn => {
                btn.style.backgroundColor = '';
                btn.style.color = '';

                const span = btn.querySelector('span');
                span.style.color = '';
            });

            button.style.backgroundColor = '#218E00';
            button.style.color = 'white';

            const span = button.querySelector('span');
            span.style.color = 'white';

            selectedOption = button;
            isCorrect = correct;

            document.getElementById('submitBtn').disabled = false;
        }

        function submitAnswer() {
            if (!selectedOption) return;

            if (isCorrect) {
                document.getElementById('correctModal').classList.remove('hidden');
                document.getElementById('correctModal').classList.add('flex', 'items-center', 'justify-center');
            } else {
                document.getElementById('wrongModal').classList.remove('hidden');
                document.getElementById('wrongModal').classList.add('flex', 'items-center', 'justify-center');
            }
        }

        function closeModal() {
            document.getElementById('correctModal').classList.add('hidden');
            document.getElementById('correctModal').classList.remove('flex', 'items-center', 'justify-center');
            document.getElementById('wrongModal').classList.add('hidden');
            document.getElementById('wrongModal').classList.remove('flex', 'items-center', 'justify-center');

            if (!isCorrect) {
                document.querySelectorAll('button[onclick*="selectOption"]').forEach(btn => {
                    btn.style.backgroundColor = '';
                    btn.style.color = '';

                    const span = btn.querySelector('span');
                    span.style.color = '';
                });
                selectedOption = null;
                document.getElementById('submitBtn').disabled = true;
            }
        }

        window.onclick = function (event) {
            const correctModal = document.getElementById('correctModal');
            const wrongModal = document.getElementById('wrongModal');

            if (event.target === correctModal) {
                closeModal();
            }
            if (event.target === wrongModal) {
                closeModal();
            }
        }
    </script>
@endsection