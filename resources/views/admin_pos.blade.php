<h2>ADMIN POS {{ $id }}</h2>

@if (session('success'))
  <p style="color:green">{{ session('success') }}</p>
@endif
@if (session('error'))
  <p style="color:red">{{ session('error') }}</p>
@endif

<table>
  <tr><th>Komponen</th><th>Stok Sekarang</th><th>Tambah</th></tr>
  @foreach($komponenList as $komponen)
    <tr>
      <td>{{ $komponen }}</td>
      <td>{{ $stok[$komponen] ?? 0 }}</td>
      <td>
        <form action="{{ route('admin.tambah', $id) }}" method="POST">
          @csrf
          <input type="hidden" name="komponen" value="{{ $komponen }}">
          <input type="number" name="jumlah" min="1" value="1">
          <button type="submit">+ Tambah</button>
        </form>
      </td>
    </tr>
  @endforeach
</table>
