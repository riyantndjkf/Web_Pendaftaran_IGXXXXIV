@props(['factories'])

<div class="grid grid-cols-4 gap-2" id="factoryGrid">
    @foreach($factories as $index => $factory)
        <div class="p-3 aspect-square flex flex-col items-center justify-center relative factory-item {{ $factory['unlocked'] ? '' : 'locked-initial' }}"
            data-unlocked="{{ $factory['unlocked'] ? 'true' : 'false' }}">
            <div
                class="bg-white rounded-lg p-3 aspect-square flex flex-col items-center justify-center relative border-2 border-gray-300">
                <x-fas-plus class="w-10 h-10 text-red-500" />
            </div>
            <img src="{{ asset('icons/icon_pekerja.svg') }}" alt="icon pekerja">
        </div>
    @endforeach
</div>