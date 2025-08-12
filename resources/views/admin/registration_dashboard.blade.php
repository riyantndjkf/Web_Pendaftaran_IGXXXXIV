<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Verifikasi Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #1a202c; color: #e2e8f0; }
        .card { background-color: #2d3748; }
        .verified { border-left: 5px solid #48bb78; }
        .unverified { border-left: 5px solid #f6e05e; }
    </style>
</head>
<body class="antialiased">
    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-3xl font-bold text-white mb-6">Dashboard Verifikasi Pendaftaran</h1>

        @if(session('success'))
            <div class="bg-green-600 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-8">
            @forelse ($teams as $team)
                <div class="card rounded-lg shadow-lg p-6 {{ $team->ver_bukti_bayar ? 'verified' : 'unverified' }}">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                        <div>
                            <h2 class="text-2xl font-bold">{{ $team->nama_tim }}</h2>
                            <p class="text-gray-400">{{ $team->asal_sekolah }}</p>
                            <p class="mt-1 font-semibold text-lg {{ $team->ver_bukti_bayar ? 'text-green-400' : 'text-yellow-400' }}">
                                Status: {{ $team->ver_bukti_bayar ? 'Verified' : 'Unverified' }}
                            </p>
                        </div>
                        <div class="flex space-x-2 mt-4 md:mt-0">
                            @if(!$team->ver_bukti_bayar)
                                <form action="{{ route('admin.regis.verify', $team) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                        Verify
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('admin.regis.unverify', $team) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                                        Set as Unverified
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>

                    <hr class="my-6 border-gray-600">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Bukti Pembayaran</h3>
                            @if($team->foto_bukti_pembayaran)
                                <a href="{{ asset('storage/' . str_replace('public/', '', $team->foto_bukti_pembayaran)) }}" target="_blank">
                                    <img src="{{ asset('storage/' . str_replace('public/', '', $team->foto_bukti_pembayaran)) }}" alt="Bukti Pembayaran" class="rounded-lg max-w-full h-auto max-h-96 object-contain">
                                </a>
                            @else
                                <p class="text-gray-400">Tidak ada bukti pembayaran.</p>
                            @endif
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold mb-2">Anggota Tim</h3>
                            <div class="space-y-4">
                                @foreach($team->members as $member)
                                    <div class="bg-gray-800 p-4 rounded">
                                        <div class="flex justify-between items-center mb-2">
                                            <div>
                                                <p class="font-bold text-lg">{{ $member->nama_lengkap }}</p>
                                                <p class="text-sm text-gray-400">{{ $member->email }}</p>
                                            </div>
                                            @if ($member->path_kartu_pelajar)
                                                <a href="{{ asset('storage/' . str_replace('public/', '', $member->path_kartu_pelajar)) }}" target="_blank" class="text-blue-400 hover:underline text-sm font-semibold ml-4 flex-shrink-0">
                                                    Lihat Kartu
                                                </a>
                                            @endif
                                        </div>
                                        <div class="text-sm text-gray-300 space-y-1 mt-3 pt-3 border-t border-gray-700">
                                            <p><span class="font-semibold text-gray-400">Alamat:</span> {{ $member->alamat ?: '-' }}</p>
                                            <p><span class="font-semibold text-gray-400">Telepon:</span> {{ $member->nomor_telepon ?: '-' }}</p>
                                            {{-- PENAMBAHAN DATA ALERGI DAN RIWAYAT PENYAKIT --}}
                                            <p><span class="font-semibold text-gray-400">Alergi:</span> {{ $member->alergi ?: 'Tidak ada' }}</p>
                                            <p><span class="font-semibold text-gray-400">Riwayat Penyakit:</span> {{ $member->riwayat_penyakit ?: 'Tidak ada' }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card rounded-lg shadow-lg p-6 text-center">
                    <p class="text-xl">Belum ada tim yang mendaftar.</p>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>