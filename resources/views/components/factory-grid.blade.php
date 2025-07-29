@props(['factories'])

<div class="relative">
    <!-- SVG Container for Arrows -->
    <svg id="connectionArrows" class="absolute inset-0 pointer-events-none z-10" style="width: 100%; height: 100%;">
    </svg>

    <div class="grid grid-cols-4 gap-2" id="factoryGrid">
        @foreach($factories as $index => $factory)
            <div class="p-3 aspect-square flex flex-col items-center justify-center relative factory-item {{ $factory['unlocked'] ? '' : 'locked-initial' }}"
                data-unlocked="{{ $factory['unlocked'] ? 'true' : 'false' }}" data-index="{{ $index }}"
                onclick="showFactoryInfo({{ $index }}, {{ json_encode($factory) }})">

                <div
                    class="bg-white rounded-lg p-3 aspect-square flex flex-col items-center justify-center relative border-2 border-gray-300 hover:border-blue-400 transition cursor-pointer">
                    <x-fas-plus class="w-10 h-10 text-red-500" />

                    @if($factory['unlocked'] && isset($factory['level']))
                        <div
                            class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                            {{ $factory['level'] }}
                        </div>
                    @endif
                </div>

                <img src="{{ asset('icons/icon_pekerja.svg') }}" alt="icon pekerja"
                    onclick="event.stopPropagation(); showWorkerModal({{ $index }}, {{ json_encode($factory) }})"
                    class="cursor-pointer hover:scale-110 transition-transform">
            </div>
        @endforeach
    </div>
</div>

<!-- Factory Info Modal -->
<div id="factoryInfoModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-full mx-4 relative transform scale-90 opacity-0 transition-all duration-200">
        <div class="text-left mb-4">
            <h3 id="machineTitle" class="font-bold text-lg text-black mb-2">machine A info :</h3>
            <div id="machineLevel" class="text-sm text-gray-600 mb-1">level 1</div>
            <div id="machineCapacity" class="text-sm text-gray-600 mb-1">Kapasitas: 5</div>
            <div id="machineTime" class="text-sm text-gray-600 mb-3">waktu : 6 menit</div>
        </div>

        <div id="machinePrice" class="text-green-600 font-bold text-2xl mb-4">$3000</div>

        <div id="ownedButtons" class="hidden space-y-3">
            <button onclick="showUpgradeModal()"
                class="w-full bg-green-500 text-white py-3 rounded-lg font-bold hover:bg-green-600 transition">
                UPGRADE
            </button>
            <button onclick="showConnectModal()"
                class="w-full bg-blue-500 text-white py-3 rounded-lg font-bold hover:bg-blue-600 transition">
                CONNECT
            </button>
            <button onclick="showSellModal()"
                class="w-full bg-red-500 text-white py-3 rounded-lg font-bold hover:bg-red-600 transition">
                SELL
            </button>
        </div>

        <button id="buyButton" onclick="buyMachine()"
            class="w-full bg-green-500 text-white py-3 rounded-lg font-bold hover:bg-green-600 transition">
            BUY
        </button>
    </div>
</div>

<!-- Buy Confirmation Modal -->
<div id="buyConfirmModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 max-w-sm mx-4 transform scale-90 opacity-0 transition-all duration-200">
        <div class="text-center">
            <h3 class="text-xl font-bold text-black mb-4">Do you want to buy a machine?</h3>

            <div id="confirmPrice" class="text-green-600 font-bold text-2xl mb-6">$3000</div>

            <div class="flex space-x-3">
                <button onclick="hideBuyConfirm()"
                    class="flex-1 bg-gray-400 text-white py-3 rounded-lg font-bold hover:bg-gray-500 transition">
                    CANCEL
                </button>
                <button onclick="confirmBuy()"
                    class="flex-1 bg-green-500 text-white py-3 rounded-lg font-bold hover:bg-green-600 transition">
                    BUY
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Upgrade Modal -->
<div id="upgradeModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 max-w-sm mx-4 transform scale-90 opacity-0 transition-all duration-200">
        <div class="text-center">
            <h3 class="text-xl font-bold text-black mb-2">Do you want to upgrade?</h3>
            <div id="upgradeFromTo" class="text-gray-600 mb-4">level 1 → level 2</div>

            <div class="text-left mb-4 space-y-1">
                <div id="upgradeCapacity" class="text-sm text-gray-600">Kapasitas: 6 unit</div>
                <div id="upgradeTime" class="text-sm text-gray-600">waktu: 4 menit</div>
            </div>

            <div id="upgradePrice" class="text-green-600 font-bold text-2xl mb-6">$4000</div>

            <div class="flex space-x-3">
                <button onclick="hideUpgradeModal()"
                    class="flex-1 bg-gray-400 text-white py-3 rounded-lg font-bold hover:bg-gray-500 transition">
                    CANCEL
                </button>
                <button onclick="confirmUpgrade()"
                    class="flex-1 bg-green-500 text-white py-3 rounded-lg font-bold hover:bg-green-600 transition">
                    UPGRADE
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Worker Modal -->
<div id="workerModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-full mx-4 transform scale-90 opacity-0 transition-all duration-200">
        <div class="text-center">
            <h3 id="workerTitle" class="text-xl font-bold text-black mb-4">Hire worker</h3>
            <div id="workerPrice" class="text-green-600 font-bold text-2xl mb-6">$ 1000</div>

            <div class="flex space-x-3">
                <button id="hireButton" onclick="confirmHire()"
                    class="flex-1 bg-green-500 text-white py-3 rounded-lg font-bold hover:bg-green-600 transition">
                    HIRE
                </button>
                <button id="layoffButton" onclick="showLayoffConfirm()"
                    class="flex-1 bg-red-500 text-white py-3 rounded-lg font-bold hover:bg-red-600 transition">
                    LAYOFF
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Layoff Confirmation Modal -->
<div id="layoffConfirmModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 max-w-sm mx-4 transform scale-90 opacity-0 transition-all duration-200">
        <div class="text-center">
            <h3 class="text-xl font-bold text-black mb-4">Do you want to layoff the worker?</h3>

            <div id="layoffCost" class="text-red-600 font-bold text-2xl mb-6">-$500</div>

            <div class="flex space-x-3">
                <button onclick="hideLayoffConfirm()"
                    class="flex-1 bg-gray-400 text-white py-3 rounded-lg font-bold hover:bg-gray-500 transition">
                    CANCEL
                </button>
                <button onclick="confirmLayoff()"
                    class="flex-1 bg-red-500 text-white py-3 rounded-lg font-bold hover:bg-red-600 transition">
                    LAYOFF
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Connect Modal -->
<div id="connectModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 max-w-sm mx-4 transform scale-90 opacity-0 transition-all duration-200">
        <div class="text-center">
            <h3 class="text-xl font-bold text-black mb-4">Connect to Factory</h3>
            <p class="text-gray-600 mb-4">Choose factory to connect:</p>

            <div id="factoryList" class="space-y-2 mb-6 max-h-48 overflow-y-auto">
            </div>

            <button onclick="hideConnectModal()"
                class="w-full bg-gray-400 text-white py-3 rounded-lg font-bold hover:bg-gray-500 transition">
                CANCEL
            </button>
        </div>
    </div>
</div>

<!-- SVG Container for Arrows -->
<svg id="connectionArrows" class="absolute inset-0 pointer-events-none z-10" style="width: 100%; height: 100%;">
</svg>
<div id="sellModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 max-w-sm mx-4 transform scale-90 opacity-0 transition-all duration-200">
        <div class="text-center">
            <h3 class="text-xl font-bold text-black mb-4">Do you want to sell the machine?</h3>

            <div id="sellPrice" class="text-green-600 font-bold text-2xl mb-6">+$2000</div>

            <div class="flex space-x-3">
                <button onclick="hideSellModal()"
                    class="flex-1 bg-gray-400 text-white py-3 rounded-lg font-bold hover:bg-gray-500 transition">
                    CANCEL
                </button>
                <button onclick="confirmSell()"
                    class="flex-1 bg-red-500 text-white py-3 rounded-lg font-bold hover:bg-red-600 transition">
                    SELL
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let selectedFactoryIndex = null;
    let selectedFactory = null;
    let connections = [];

    let factoriesData = @json($factories);
    let selectedWorkerFactoryIndex = null;
    let selectedWorkerFactory = null;

    function showFactoryInfo(index, factory) {
        selectedFactoryIndex = index;
        selectedFactory = factory;

        document.getElementById('machineTitle').textContent = `machine ${String.fromCharCode(65 + index)} info :`;
        document.getElementById('machineLevel').textContent = `level ${factory.level || 1}`;
        document.getElementById('machineCapacity').textContent = `Kapasitas: ${factory.capacity || 5}`;
        document.getElementById('machineTime').textContent = `waktu : ${factory.production_time || 6} menit`;
        document.getElementById('machinePrice').textContent = `$${factory.price || 3000}`;

        const buyButton = document.getElementById('buyButton');
        const ownedButtons = document.getElementById('ownedButtons');

        if (factory.unlocked) {
            if (factory.owned) {
                buyButton.classList.add('hidden');
                ownedButtons.classList.remove('hidden');
            } else {
                buyButton.classList.remove('hidden');
                ownedButtons.classList.add('hidden');
                buyButton.textContent = 'BUY';
                buyButton.className = 'w-full bg-green-500 text-white py-3 rounded-lg font-bold hover:bg-green-600 transition';
                buyButton.disabled = false;
            }
        } else {
            buyButton.classList.remove('hidden');
            ownedButtons.classList.add('hidden');
            buyButton.textContent = 'LOCKED';
            buyButton.className = 'w-full bg-gray-400 text-white py-3 rounded-lg font-bold cursor-not-allowed';
            buyButton.disabled = true;
        }

        showModal('factoryInfoModal');
    }

    function hideFactoryInfo() {
        hideModal('factoryInfoModal', () => {
            selectedFactoryIndex = null;
            selectedFactory = null;
        });
    }

    function buyMachine() {
        if (!selectedFactory || !selectedFactory.unlocked) {
            return;
        }

        document.getElementById('confirmPrice').textContent = `$${selectedFactory.price || 3000}`;
        showModal('buyConfirmModal');
    }

    function hideBuyConfirm() {
        hideModal('buyConfirmModal');
    }

    function confirmBuy() {
        alert('Mesin Berhasil Dibeli!');
        hideBuyConfirm();
        hideFactoryInfo();
    }

    function showUpgradeModal() {
        const currentLevel = selectedFactory.level || 1;
        const nextLevel = currentLevel + 1;
        const upgradePrice = (selectedFactory.price || 3000) + 1000;
        const newCapacity = (selectedFactory.capacity || 5) + 1;
        const newTime = Math.max((selectedFactory.production_time || 6) - 2, 1);

        document.getElementById('upgradeFromTo').textContent = `level ${currentLevel} → level ${nextLevel}`;
        document.getElementById('upgradeCapacity').textContent = `Kapasitas: ${newCapacity} unit`;
        document.getElementById('upgradeTime').textContent = `waktu: ${newTime} menit`;
        document.getElementById('upgradePrice').textContent = `$${upgradePrice}`;

        hideFactoryInfo();
        showModal('upgradeModal');
    }

    function hideUpgradeModal() {
        hideModal('upgradeModal');
    }

    function confirmUpgrade() {
        alert('Mesin Berhasil Diupgrade!');
        hideUpgradeModal();
    }

    function showSellModal() {
        const sellPrice = Math.floor((selectedFactory.price || 3000) * 0.7);
        document.getElementById('sellPrice').textContent = `+$${sellPrice}`;

        hideFactoryInfo();
        showModal('sellModal');
    }

    function hideSellModal() {
        hideModal('sellModal');
    }

    function confirmSell() {
        alert('Mesin Berhasil Dijual!');
        hideSellModal();
    }

    function showConnectModal() {
        populateFactoryList();
        hideFactoryInfo();
        showModal('connectModal');
    }

    function hideConnectModal() {
        hideModal('connectModal');
    }

    function populateFactoryList() {
        const factoryList = document.getElementById('factoryList');
        factoryList.innerHTML = '';

        factoriesData.forEach((factory, index) => {
            if (index !== selectedFactoryIndex && factory.unlocked) {
                const factoryItem = document.createElement('button');
                const isOwned = factory.owned;
                const statusText = isOwned ? `Level ${factory.level || 1}` : 'Not owned';
                const statusColor = isOwned ? 'text-gray-600' : 'text-orange-600';

                factoryItem.className = `w-full p-3 ${isOwned ? 'bg-gray-100 hover:bg-gray-200' : 'bg-orange-50 hover:bg-orange-100'} rounded-lg text-left transition`;
                factoryItem.innerHTML = `
                    <div class="font-semibold">Factory ${String.fromCharCode(65 + index)}</div>
                    <div class="text-sm ${statusColor}">${statusText}</div>
                `;
                factoryItem.onclick = () => connectFactories(selectedFactoryIndex, index);
                factoryList.appendChild(factoryItem);
            }
        });

        if (factoryList.children.length === 0) {
            factoryList.innerHTML = '<p class="text-gray-500 py-4">No available factories to connect</p>';
        }
    }

    function connectFactories(fromIndex, toIndex) {
        const existingConnection = connections.find(conn =>
            (conn.from === fromIndex && conn.to === toIndex) ||
            (conn.from === toIndex && conn.to === fromIndex)
        );

        if (!existingConnection) {
            connections.push({ from: fromIndex, to: toIndex });
            drawConnections();
            alert(`Factory ${String.fromCharCode(65 + fromIndex)} connected to Factory ${String.fromCharCode(65 + toIndex)}!`);
        } else {
            alert('Factories are already connected!');
        }

        hideConnectModal();
    }

    function drawConnections() {
        const svg = document.getElementById('connectionArrows');
        const grid = document.getElementById('factoryGrid');
        const gridRect = grid.getBoundingClientRect();

        svg.innerHTML = '';

        connections.forEach(connection => {
            const fromElement = grid.children[connection.from];
            const toElement = grid.children[connection.to];

            if (fromElement && toElement) {
                const fromRect = fromElement.getBoundingClientRect();
                const toRect = toElement.getBoundingClientRect();

                const fromX = fromRect.left + fromRect.width / 2 - gridRect.left;
                const fromY = fromRect.top + fromRect.height / 2 - gridRect.top;
                const toX = toRect.left + toRect.width / 2 - gridRect.left;
                const toY = toRect.top + toRect.height / 2 - gridRect.top;

                const arrow = document.createElementNS('http://www.w3.org/2000/svg', 'g');

                const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                line.setAttribute('x1', fromX);
                line.setAttribute('y1', fromY);
                line.setAttribute('x2', toX);
                line.setAttribute('y2', toY);
                line.setAttribute('stroke', '#3B82F6');
                line.setAttribute('stroke-width', '3');
                line.setAttribute('marker-end', 'url(#arrowhead)');

                arrow.appendChild(line);
                svg.appendChild(arrow);
            }
        });

        if (!svg.querySelector('#arrowhead')) {
            const defs = document.createElementNS('http://www.w3.org/2000/svg', 'defs');
            const marker = document.createElementNS('http://www.w3.org/2000/svg', 'marker');
            marker.setAttribute('id', 'arrowhead');
            marker.setAttribute('markerWidth', '10');
            marker.setAttribute('markerHeight', '7');
            marker.setAttribute('refX', '9');
            marker.setAttribute('refY', '3.5');
            marker.setAttribute('orient', 'auto');

            const polygon = document.createElementNS('http://www.w3.org/2000/svg', 'polygon');
            polygon.setAttribute('points', '0 0, 10 3.5, 0 7');
            polygon.setAttribute('fill', '#3B82F6');

            marker.appendChild(polygon);
            defs.appendChild(marker);
            svg.appendChild(defs);
        }
    }

    window.addEventListener('resize', drawConnections);

    function showWorkerModal(index, factory) {
        selectedWorkerFactoryIndex = index;
        selectedWorkerFactory = factory;

        if (!factory.unlocked) {
            alert('Factory must be unlocked first!');
            return;
        }

        const workerTitle = document.getElementById('workerTitle');
        const workerPrice = document.getElementById('workerPrice');
        const hireButton = document.getElementById('hireButton');
        const layoffButton = document.getElementById('layoffButton');

        workerTitle.textContent = 'Hire worker';

        workerPrice.textContent = '$ 1000';
        workerPrice.className = 'text-green-600 font-bold text-2xl mb-6';

        const hasWorkers = factory.workers > 0;

        if (hasWorkers) {
            hireButton.classList.remove('hidden');
            layoffButton.classList.remove('hidden');
            hireButton.className = 'flex-1 bg-green-500 text-white py-3 rounded-lg font-bold hover:bg-green-600 transition';
            layoffButton.className = 'flex-1 bg-red-500 text-white py-3 rounded-lg font-bold hover:bg-red-600 transition';
        } else {
            hireButton.classList.remove('hidden');
            layoffButton.classList.add('hidden');
            hireButton.className = 'w-full bg-green-500 text-white py-3 rounded-lg font-bold hover:bg-green-600 transition';
        }

        showModal('workerModal');
    }

    function hideWorkerModal() {
        hideModal('workerModal', () => {
            selectedWorkerFactoryIndex = null;
            selectedWorkerFactory = null;
        });
    }

    function confirmHire() {
        alert('Worker hired successfully!');
        hideWorkerModal();
    }

    function showLayoffConfirm() {
        document.getElementById('layoffCost').textContent = '-$500';

        hideWorkerModal();
        showModal('layoffConfirmModal');
    }

    function hideLayoffConfirm() {
        hideModal('layoffConfirmModal');
    }

    function confirmLayoff() {
        alert('Worker laid off!');
        hideLayoffConfirm();
    }

    function showModal(modalId) {
        const modal = document.getElementById(modalId);
        const modalContent = modal.querySelector('.bg-white');

        modal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.style.transform = 'scale(1)';
            modalContent.style.opacity = '1';
        }, 10);
    }

    function hideModal(modalId, callback = null) {
        const modal = document.getElementById(modalId);
        const modalContent = modal.querySelector('.bg-white');

        modalContent.style.transform = 'scale(0.9)';
        modalContent.style.opacity = '0';

        setTimeout(() => {
            modal.classList.add('hidden');
            if (callback) callback();
        }, 200);
    }

    document.getElementById('factoryInfoModal').addEventListener('click', function (e) {
        if (e.target === this) {
            hideFactoryInfo();
        }
    });

    document.getElementById('buyConfirmModal').addEventListener('click', function (e) {
        if (e.target === this) {
            hideBuyConfirm();
        }
    });

    document.getElementById('upgradeModal').addEventListener('click', function (e) {
        if (e.target === this) {
            hideUpgradeModal();
        }
    });

    document.getElementById('layoffConfirmModal').addEventListener('click', function (e) {
        if (e.target === this) {
            hideLayoffConfirm();
        }
    });

    document.getElementById('workerModal').addEventListener('click', function (e) {
        if (e.target === this) {
            hideWorkerModal();
        }
    });

    document.getElementById('connectModal').addEventListener('click', function (e) {
        if (e.target === this) {
            hideConnectModal();
        }
    });

    document.getElementById('sellModal').addEventListener('click', function (e) {
        if (e.target === this) {
            hideSellModal();
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            if (!document.getElementById('layoffConfirmModal').classList.contains('hidden')) {
                hideLayoffConfirm();
            } else if (!document.getElementById('workerModal').classList.contains('hidden')) {
                hideWorkerModal();
            } else if (!document.getElementById('connectModal').classList.contains('hidden')) {
                hideConnectModal();
            } else if (!document.getElementById('sellModal').classList.contains('hidden')) {
                hideSellModal();
            } else if (!document.getElementById('upgradeModal').classList.contains('hidden')) {
                hideUpgradeModal();
            } else if (!document.getElementById('buyConfirmModal').classList.contains('hidden')) {
                hideBuyConfirm();
            } else if (!document.getElementById('factoryInfoModal').classList.contains('hidden')) {
                hideFactoryInfo();
            }
        }
    });
</script>