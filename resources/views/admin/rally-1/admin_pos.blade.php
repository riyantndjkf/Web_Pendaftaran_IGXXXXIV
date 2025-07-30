<!DOCTYPE html>
<html>
<head>
  <title>Admin Pos {{ $pos->nama }}</title>
  <style>
    .status {
      font-weight: bold;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <h1>Admin Pos - {{ $pos->nama }}</h1>

  @if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
  @endif
  @if (session('error'))
    <p style="color: red;">{{ session('error') }}</p>
  @endif

  <p class="status">Status Pos: {{ ucfirst(str_replace('_', ' ', $pos->status)) }}</p>
  <p class="status">Tipe Pos: {{ ucfirst($pos->tipe) }}</p>

  <form action="{{ route('admin.overview') }}" method="GET" style="margin-bottom:10px;">
    <button type="submit">⬅️ Kembali ke Halaman Utama Admin</button>
  </form>

  @if (count($timHariIni) === 0)
    <p><em>Belum ada tim yang datang hari ini.</em></p>
  @else
    <hr>
    <h3>Pilih Tim:</h3>
    <form method="POST" action="{{ route('admin.aksi', $pos->id) }}">
      @csrf
      <label for="nama_tim">Nama Tim:</label>
      <select name="nama_tim" id="nama_tim">
        @foreach ($timHariIni as $tim)
          <option value="{{ $tim }}">{{ $tim }}</option>
        @endforeach
      </select>

      <div style="margin-top: 10px;">
        <button name="action" value="menang" type="submit">🏆 Menang</button>
        <button name="action" value="kalah" type="submit">😞 Kalah</button>
        <button name="action" value="gagal" type="submit" onclick="return confirm('Yakin menyatakan tim gagal dan mengosongkan pos?')">❌ Gagal</button>
      </div>
    </form>
  @endif
</body>
</html>