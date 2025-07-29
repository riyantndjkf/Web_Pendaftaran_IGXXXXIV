<h2>Ambil Komponen</h2>
@foreach ($posKomponen as $id => $isi)
    <form action="{{ route('klaim.pos', $id) }}" method="POST">@csrf
        <button type="submit">Ambil dari Pos {{ $id }}</button>
        ({{ implode(', ', array_map(fn($v,$k) => "$k: $v", $isi, array_keys($isi))) }})
    </form>
@endforeach
