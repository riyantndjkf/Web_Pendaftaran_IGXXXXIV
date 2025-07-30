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
    @if ($pos->tipe === 'single')
      <hr>
      <h3>Tim Saat Ini</h3>
      <p>{{ $timHariIni[0] }}</p>

      <h3>Hasil:</h3>
      <form method="POST" action="{{ route('admin.menang', [$pos->id, $timHariIni[0]]) }}">
        @csrf
        <button type="submit">🏆 Menang</button>
      </form>

      <form method="POST" action="{{ route('admin.kalah', [$pos->id, $timHariIni[0]]) }}">
        @csrf
        <button type="submit">😞 Kalah</button>
      </form>

      <form method="POST" action="{{ route('admin.gagal', $pos->id) }}">
        @csrf
        <button type="submit" onclick="return confirm('Yakin menyatakan tim gagal dan mengosongkan pos?')">❌ Gagal</button>
      </form>
    @elseif ($pos->tipe === 'battle')
      <hr>
      <h3>Tim Saat Ini</h3>
      @foreach (array_slice($timHariIni, 0, 2) as $tim)
        <div style="margin-bottom: 10px;">
          <p>{{ $tim }}</p>
          <form method="POST" action="{{ route('admin.menang', [$pos->id, $tim]) }}">
            @csrf
            <button type="submit">🏆 Menang</button>
          </form>
          <form method="POST" action="{{ route('admin.kalah', [$pos->id, $tim]) }}">
            @csrf
            <button type="submit">😞 Kalah</button>
          </form>
        </div>
      @endforeach
    @endif
  @endif

</body>

</html>
