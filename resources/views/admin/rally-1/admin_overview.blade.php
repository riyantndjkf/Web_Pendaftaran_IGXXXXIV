<!DOCTYPE html>
<html>
<head>
    <title>Admin Overview</title>
    <style>
        .kosong { background-color: #c8e6c9; }       /* Hijau */
        .butuh_grup { background-color: #fff9c4; }   /* Kuning */
        .terisi { background-color: #ffcdd2; }       /* Merah */
        td, th { padding: 8px 12px; }
    </style>
</head>
<body>
    <h1>Dashboard Admin - Semua Pos</h1>
    <table border="1">
        <tr>
            <th>Nama Pos</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach ($posList as $pos)
            <tr class="{{ $pos->status }}">
                <td>{{ $pos->nama }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $pos->status)) }}</td>
                <td><a href="{{ route('admin.pos', $pos->id) }}">Kelola Pos</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>
