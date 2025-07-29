@if (session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div style="color: red;">{{ session('error') }}</div>
@endif

<h2>Produksi Sepeda</h2>
@foreach ($resep as $jenis => $syarat)
    @php
        $cukup = true;
        foreach ($syarat as $k => $v) {
            if (($data->$k ?? 0) < $v) $cukup = false;
        }
    @endphp
    <form action="{{ route('produksi.sepeda', $jenis) }}" method="POST">@csrf
        <button type="submit" {{ $cukup ? '' : 'disabled' }}>Rakit {{ ucfirst($jenis) }}</button>
    </form>
@endforeach
