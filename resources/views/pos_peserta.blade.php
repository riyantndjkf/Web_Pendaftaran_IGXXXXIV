<h2>POS {{ $id }}</h2>

@if (session('success'))
  <p style="color:green">{{ session('success') }}</p>
@endif
@if (session('error'))
  <p style="color:red">{{ session('error') }}</p>
@endif

<table border="1" cellpadding="10">
  <tr><th>Komponen</th><th>Stok</th><th>Ambil</th></tr>
  @foreach ($komponen as $item)
    <tr>
      <td>{{ $item->komponen }}</td>
      <td>{{ $item->jumlah }}</td>
      <td>
        <form action="{{ route('pos.klaim', $id) }}" method="POST">
          @csrf
          <input type="hidden" name="komponen" value="{{ $item->komponen }}">
          <input type="number" name="jumlah" value="1" min="1" max="{{ $item->jumlah }}">
          <button type="submit">Ambil</button>
        </form>
      </td>
    </tr>
  @endforeach
</table>
