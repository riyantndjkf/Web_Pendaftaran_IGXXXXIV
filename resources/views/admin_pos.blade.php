<!DOCTYPE html>
<html>

<head>
  <title>Admin Pos {{ $pos->nama }}</title>
</head>

<body>
  <h1>Admin Pos - {{ $pos->nama }}</h1>

  @if (session('success'))
  <p style="color: green;">{{ session('success') }}</p>
  @endif
  @if (session('error'))
  <p style="color: red;">{{ session('error') }}</p>
  @endif

  <p><strong>Status Pos:</strong> {{ ucfirst(str_replace('_', ' ', $pos->status)) }}</p>
  <p><strong>Tipe Pos:</strong> {{ ucfirst($pos->tipe) }}</p>

  <form action="{{ route('admin.overview') }}" method="GET" style="margin-bottom:10px;">
    <button type="submit">⬅️ Kembali ke Halaman Utama Admin</button>
  </form>

  <h3>Tim yang mengunjungi pos ini hari ini:</h3>
  <ul>
    @forelse ($timHariIni as $namaTim)
    <li>{{ $namaTim }}</li>
    @empty
    <li><em>Belum ada tim yang datang</em></li>
    @endforelse
  </ul>

  @if (count($timHariIni) > 0)
  <hr>
  <h3>Beri Komponen</h3>
  <form method="POST" action="{{ route('admin.beri', $pos->id) }}">
    @csrf
    <label for="tim">Pilih Tim:</label>
    <select name="tim" required>
      @foreach ($timHariIni as $tim)
      <option value="{{ $tim }}">{{ $tim }}</option>
      @endforeach
    </select>

    <label for="komponen">Pilih Komponen:</label>
    <select name="komponen" required>
      @foreach ($komponenList as $k)
      <option value="{{ $k }}">{{ $k }}</option>
      @endforeach
    </select>

    <label for="jumlah">Jumlah:</label>
    <input type="number" name="jumlah" min="1" value="1" required>

    <button type="submit">✅ Beri Komponen</button>
  </form>
  @endif

  @if ($pos->tipe === 'single' && count($timHariIni) > 0)
  <hr>
  <h3>Jika Tim Gagal</h3>
  <form method="POST" action="{{ route('admin.gagal', $pos->id) }}">
    @csrf
    <button type="submit" onclick="return confirm('Yakin menyatakan tim gagal dan mengosongkan pos?')">❌ Tandai Gagal</button>
  </form>
  @endif
</body>

</html>