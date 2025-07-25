@extends('layouts.rally-2')

@section('title', 'Rally 2')

@section('content')
    <div class="flex justify-between items-center p-4 bg-yellow-600">
        <div class="text-2xl font-bold text-black">{{ $gameData['timer'] }}</div>
        <button onclick="toggleSideMenu()">
            <x-radix-text-align-justify class="w-10 h-10 text-black" />
        </button>
    </div>

    <div class="flex justify-between items-center px-4 pb-4">
        <div class="flex flex-col bg-[#9ABDF6] w-1/2 rounded-[20px] py-4 px-3 gap-2">
            <div class="rounded text-black text-sm flex items-center justify-between w-full">
                <span class="font-normal text-xl text-black">DEMAND</span>
                <span class="font-normal text-xl text-black">{{ $gameData['demand']['current'] }}</span>
            </div>
            <div class="rounded text-black text-sm flex items-center justify-between w-full">
                <span class="font-normal text-xl text-black">FULLFILED</span>
                <span class="font-normal text-xl text-black">{{ $gameData['demand']['fulfilled'] }}</span>
            </div>
        </div>
        <div class="text-black text-right">
            <div class="font-semibold text-xl text-black">CAPITAL</div>
            <div class="text-green-800 font-bold text-xl">${{ number_format($gameData['capital']) }}</div>
        </div>
    </div>

    <div class="px-4 pb-4">
        <x-factory-grid :factories="$gameData['factories']" />
    </div>

    <div id="lockedOverlayGroup" class="{{ ($gameData['factories_locked'] ?? true) ? '' : 'hidden' }}">
        <div class="absolute inset-0 bg-gray-600 opacity-50 pointer-events-none rounded-lg"></div>

        <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-40">
            <img src="{{ asset('icons/rantai1.svg') }}" alt="Rantai 1"
                class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 -rotate-90 w-[150%] h-auto object-cover opacity-70"
                style="max-width: 150%; max-height: 150%;">
            <img src="{{ asset('icons/rantai2.svg') }}" alt="Rantai 2"
                class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 rotate-90 w-[150%] h-auto object-cover opacity-70"
                style="max-width: 150%; max-height: 150%;">
        </div>

        <div class="absolute inset-0 flex flex-col items-center justify-center gap-4 z-50">
            <img src="{{ asset('icons/icon_lock.svg') }}" alt="icon lock">
            {{-- Buat aja kondisi untuk tampilin button maintenancenya --}}
            <button onclick="showUnlockModal()"
                class="bg-green-500 text-white px-6 text-3xl py-2 rounded-md font-bold hover:bg-green-600 transition">
                UNLOCK
                {{-- ganti jadi ini kalo maintenance --}}
                {{-- MAINTENANCE --}}
            </button>
        </div>
    </div>

    <x-rally-2-sidebar />

    <div id="unlockModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-sm mx-4">
            <div class="text-center">
                <h3 class="text-2xl font-bold text-black mb-4">UNLOCK FACTORY?</h3>
                <div class="flex justify-center">
                    <img src="{{ asset('icons/icon_key.svg') }}" alt="Icon Kunci" />
                    {{-- Ini icon kalo dibagian maintenance --}}
                    {{-- <img src="{{ asset('icons/icon_maintenance.svg') }}" alt="Icon Maintenance" /> --}}
                </div>
                <div class="text-green-600 font-bold text-xl mb-4">${{ number_format($gameData['unlock_cost']) }}</div>
                <div class="flex space-x-3">
                    <button onclick="hideUnlockModal()"
                        class="flex-1 bg-gray-400 text-white py-2 rounded font-bold">CANCEL</button>
                    <button onclick="unlockFactory()"
                        class="flex-1 bg-green-500 text-white py-2 rounded font-bold">UNLOCK</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        window.Laravel = {
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        };

        let areFactoriesLocked = {{ ($gameData['factories_locked'] ?? true) ? 'true' : 'false' }};

        function updateLockedUI() {
            const lockedGroup = document.getElementById('lockedOverlayGroup');
            const factoryItems = document.querySelectorAll('.factory-item');

            if (!areFactoriesLocked) {
                lockedGroup.classList.add('hidden');
                factoryItems.forEach(item => {
                    item.querySelector('div').classList.remove('opacity-50');
                    item.querySelector('div').classList.remove('bg-gray-300');
                    item.querySelector('div').classList.add('bg-white');
                    item.dataset.unlocked = 'true';
                });
            } else {
                lockedGroup.classList.remove('hidden');
                factoryItems.forEach(item => {
                    if (item.dataset.unlocked === 'false') {
                        item.querySelector('div').classList.add('opacity-50');
                        item.querySelector('div').classList.add('bg-gray-300');
                        item.querySelector('div').classList.remove('bg-white');
                    }
                });
            }
        }

        document.addEventListener('DOMContentLoaded', updateLockedUI);


        function showUnlockModal() {
            document.getElementById('unlockModal').classList.remove('hidden');
        }

        function hideUnlockModal() {
            document.getElementById('unlockModal').classList.add('hidden');
        }

        function unlockFactory() {
            hideUnlockModal();

            areFactoriesLocked = false;
            updateLockedUI();
            alert('Factory unlocked successfully!');
        }
    </script>
@endpush