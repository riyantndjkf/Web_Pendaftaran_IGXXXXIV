<!DOCTYPE html>
<html>

<head>
    <title>IGBike Home</title>
</head>

<body>
    <h1>Selamat Datang di IGBike</h1>

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <p>Pilih Halaman:</p>
    <ul>
        <li><a href="{{ route('pos.show', 1) }}">Pos 1</a></li>
        <li><a href="{{ route('pos.show', 2) }}">Pos 2</a></li>
        <li><a href="{{ route('pos.show', 3) }}">Pos 3</a></li>
        <li><a href="/produksi">Rakit Sepeda</a></li>
        <li><a href="/jual">Jual Sepeda</a></li>
        <li><a href="/admin/pos/1">Admin Pos 1</a></li>
        <li><a href="/admin/pos/2">Admin Pos 2</a></li>
        <li><a href="/admin/pos/3">Admin Pos 3</a></li>
    </ul>
</body>