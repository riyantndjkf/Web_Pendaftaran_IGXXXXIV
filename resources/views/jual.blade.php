<h2>Jual Sepeda - Sesi {{ $sesi }}</h2>
<form action="{{ route('jual.sepeda') }}" method="POST">
    @csrf
    @foreach ($harga as $jenis => $h)
        <div>
            {{ ucfirst($jenis) }} (stok: {{ $stok->$jenis ?? 0 }}) - Harga: ${{ $h }}
            <input type="number" name="{{ $jenis }}" value="0" min="0" max="{{ $stok->$jenis ?? 0 }}">
        </div>
    @endforeach
    <button type="submit">Jual</button>
</form>
