@props(['isOpen' => false])

<div class="fixed top-0 right-0 h-full w-40 bg-gray-200 transform {{ $isOpen ? '' : 'translate-x-full' }} transition-transform duration-300 z-50"
    id="sideMenu">
    <div class="flex justify-end p-4">
        <button onclick="closeSideMenu()" class="text-black text-2xl hover:text-red-500 transition">
            ✕
        </button>
    </div>

    <div class="px-4 space-y-3">
        <a href="{{ route('peserta.rally-2.scanner') }}"
            class="block w-full bg-yellow-400 hover:bg-yellow-500 text-black py-3 px-4 rounded font-bold text-center transition transform hover:scale-105 shadow-md">
            QR SCANNER
        </a>
        <a href="{{ route('peserta.rally-2.events') }}"
            class="block w-full bg-yellow-400 hover:bg-yellow-500 text-black py-3 px-4 rounded font-bold text-center transition transform hover:scale-105 shadow-md">
            EVENT
        </a>
        <a href="{{ route('peserta.rally-2.inventory') }}"
            class="block w-full bg-yellow-400 hover:bg-yellow-500 text-black py-3 px-4 rounded font-bold text-center transition transform hover:scale-105 shadow-md">
            INVENTORY
        </a>
    </div>
</div>

<div class="fixed inset-0 bg-black bg-opacity-50 {{ $isOpen ? '' : 'hidden' }} z-40" id="sideMenuOverlay"
    onclick="closeSideMenu()"></div>

<script>
    function toggleSideMenu() {
        const menu = document.getElementById('sideMenu');
        const overlay = document.getElementById('sideMenuOverlay');

        menu.classList.toggle('translate-x-full');
        overlay.classList.toggle('hidden');
    }

    function closeSideMenu() {
        const menu = document.getElementById('sideMenu');
        const overlay = document.getElementById('sideMenuOverlay');

        menu.classList.add('translate-x-full');
        overlay.classList.add('hidden');
    }

    function openSideMenu() {
        const menu = document.getElementById('sideMenu');
        const overlay = document.getElementById('sideMenuOverlay');

        menu.classList.remove('translate-x-full');
        overlay.classList.remove('hidden');
    }
</script>