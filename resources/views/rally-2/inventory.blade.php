@extends('layouts.rally-2')

@section('title', 'INVENTORY - Rally 2')

@section('content')
    <div class="flex justify-between items-center p-4 bg-yellow-600">
        <a href="{{ route('rally-2.index') }}" class="text-black text-2xl">
            <x-ri-arrow-left-s-line class="w-10 h-10 text-black" />
        </a>
        <div class="text-xl font-bold text-black">INVENTORY</div>
        <button onclick="toggleSideMenu()">
            <x-radix-text-align-justify class="w-10 h-10 text-black" />
        </button>
    </div>

    <div class="flex items-center justify-center px-6 py-8">
        <div class="bg-white rounded-2xl p-8 w-full max-w-sm mx-auto shadow-lg">
            <div class="flex items-center justify-center">
                <img src="{{ asset('icons/contoh_sepeda.svg') }}" alt="item inventory?" />
            </div>

            <div class="text-center mb-4">
                <span class="text-lg font-bold text-black">AMOUNT: 6</span>
            </div>

            <div class="flex items-center justify-center gap-6 mb-6">
                <button onclick="decreaseModalQuantity()"
                    class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center text-2xl font-bold text-black hover:bg-gray-300 transition">
                    −
                </button>

                <span id="modalQuantity" class="text-4xl font-bold text-black min-w-[60px] text-center">1</span>

                <button onclick="increaseModalQuantity()"
                    class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center text-2xl font-bold text-black hover:bg-gray-300 transition">
                    +
                </button>
            </div>

            <div class="text-center mb-6">
                <span id="modalPrice" class="text-2xl font-bold text-green-600">$110</span>
            </div>

            <button onclick="sellModalItem()"
                class="w-full bg-green-500 text-white py-4 rounded-xl text-lg font-bold hover:bg-green-600 transition shadow-lg">
                SELL
            </button>
        </div>
    </div>

    <script>
        let modalQuantity = 1;
        const maxModalQuantity = 6;
        const pricePerItem = 110;

        function increaseModalQuantity() {
            if (modalQuantity < maxModalQuantity) {
                modalQuantity++;
                updateModalDisplay();
            }
        }

        function decreaseModalQuantity() {
            if (modalQuantity > 1) {
                modalQuantity--;
                updateModalDisplay();
            }
        }

        function updateModalDisplay() {
            const quantityEl = document.getElementById('modalQuantity');
            const priceEl = document.getElementById('modalPrice');
            if (quantityEl) quantityEl.textContent = modalQuantity;
            if (priceEl) {
                const totalPrice = modalQuantity * pricePerItem;
                priceEl.textContent = '$' + totalPrice;
            }
        }

        function sellModalItem() {
            const totalPrice = modalQuantity * pricePerItem;
            alert(`Sold ${modalQuantity} bicycle(s) for $${totalPrice}!`);
        }
    </script>

    <x-rally-2-sidebar />
@endsection