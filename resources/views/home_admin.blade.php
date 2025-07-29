<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin POS</title>
</head>
<body>
    <h1>Selamat Datang Admin</h1>

    <p>Pilih POS yang ingin kamu kelola:</p>

    <ul>
        <li><a href="{{ route('admin.pos', ['id' => 1]) }}">📍 Admin POS 1</a></li>
        <li><a href="{{ route('admin.pos', ['id' => 2]) }}">📍 Admin POS 2</a></li>
        <li><a href="{{ route('admin.pos', ['id' => 3]) }}">📍 Admin POS 3</a></li>
    </ul>
</body>
</html>
