<!DOCTYPE html>
<html>
<head>
    <title>IGBike Home</title>
    <style>
        .kosong { background-color: #c8e6c9; }       /* Hijau */
        .butuh_grup { background-color: #fff9c4; }   /* Kuning */
        .terisi { background-color: #ffcdd2; }       /* Merah */
        td, th { padding: 8px 12px; }
        form { margin: 0; }
        button[disabled] { opacity: 0.6; cursor: not-allowed; }
    </style>
</head>
<body>
    <h1>Selamat Datang di IGBike</h1>

    @php
        use Illuminate\Support\Facades\DB;

        $tim = session('namaTim') ?? 'TimDemo';
        $uang = DB::table('peserta')->where('namaTim', $tim)->value('uang') ?? 0;
        $posList = DB::table('pos')->get();

        // Ambil 3 kunjungan terakhir tim ini
        $riwayat = DB::table('riwayat_pos')
            ->where('peserta_namaTim', $tim)
            ->orderByDesc('waktu')
            ->limit(3)
            ->pluck('pos_id')
            ->toArray();
    @endphp

    <h3>Halo {{ $tim }}!</h3>
    <p>💰 Uang saat ini: <strong>${{ $uang }}</strong></p>

    <p>Pilih Halaman:</p>
    <ul>
        <li><a href="/produksi">Rakit Sepeda</a></li>
        <li><a href="/jual">Jual Sepeda</a></li>
    </ul>

    <hr>
    <h3>Status Seluruh Pos</h3>
    <table border="1" cellspacing="0">
        <tr>
            <th>Pos</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach ($posList as $pos)
            @php
                $sudahDikunjungiBaruBaruIni = in_array($pos->id, $riwayat);
            @endphp
            <tr class="{{ $pos->status }}">
                <td>{{ $pos->nama }}</td>
                <td><strong>{{ ucfirst(str_replace('_', ' ', $pos->status)) }}</strong></td>
                <td>
                    <form action="{{ route('peserta.pos.pergi', $pos->id) }}" method="POST">
                        @csrf
                        <button type="submit" {{ $sudahDikunjungiBaruBaruIni ? 'disabled' : '' }}>
                            Pergi ke Pos
                        </button>
                        @if ($sudahDikunjungiBaruBaruIni)
                            <small>(Sudah dikunjungi, harus ke 3 pos lain dulu)</small>
                        @endif
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
