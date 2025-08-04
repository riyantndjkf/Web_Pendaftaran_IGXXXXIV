{{-- File ini berisi formulir untuk satu tim --}}
{{-- Variabel $team_index akan dikirim dari view utama --}}

<div class="member-card bg-white/ backdrop-blur-md rounded-2xl p-6 text-white border border-white/30">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <label for="team_{{ $team_index }}_nama" class="block text-sm font-medium text-white mb-1">Nama Tim</label>
            <input type="text" id="team_{{ $team_index }}_nama" name="teams[{{$team_index}}][nama_tim]" value="{{ old('teams.'.$team_index.'.nama_tim') }}" class="form-input w-full rounded-md p-2 bg-white/70 text-black" required>
        </div>
        <div>
            <label for="team_{{ $team_index }}_password" class="block text-sm font-medium text-white mb-1">Password Tim</label>
            <input type="password" id="team_{{ $team_index }}_password" name="teams[{{$team_index}}][password]" class="form-input w-full rounded-md p-2 bg-white/70 text-black" required>
        </div>
    </div>

    <h4 class="text-2xl text-white mb-4">INFORMASI ANGGOTA</h4>
    @for ($m = 0; $m < 3; $m++)
    <div class="border-t border-white/30 py-4">
        <h5 class="text-lg font-semibold text-white mb-2">{{ $m == 0 ? 'Ketua Tim' : 'Anggota ' . ($m + 1) }}</h5>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
            <div>
                <label for="member_{{ $team_index }}_{{ $m }}_nama" class="block text-sm font-medium text-white mb-1">Nama Lengkap</label>
                <input type="text" id="member_{{ $team_index }}_{{ $m }}_nama" name="teams[{{$team_index}}][members][{{$m}}][nama_lengkap]" value="{{ old('teams.'.$team_index.'.members.'.$m.'.nama_lengkap') }}" class="form-input w-full rounded-md p-2 bg-white/70 text-black" required>
            </div>
            <div>
                <label for="member_{{ $team_index }}_{{ $m }}_email" class="block text-sm font-medium text-white mb-1">Email</label>
                <input type="email" id="member_{{ $team_index }}_{{ $m }}_email" name="teams[{{$team_index}}][members][{{$m}}][email]" value="{{ old('teams.'.$team_index.'.members.'.$m.'.email') }}" class="form-input w-full rounded-md p-2 bg-white/70 text-black" required>
            </div>
            <div class="md:col-span-2">
                <label for="member_{{ $team_index }}_{{ $m }}_alamat" class="block text-sm font-medium text-white mb-1">Alamat Lengkap</label>
                <textarea id="member_{{ $team_index }}_{{ $m }}_alamat" name="teams[{{$team_index}}][members][{{$m}}][alamat]" rows="2" class="form-input w-full rounded-md p-2 bg-white/70 text-black" required>{{ old('teams.'.$team_index.'.members.'.$m.'.alamat') }}</textarea>
            </div>
            <div>
                <label for="member_{{ $team_index }}_{{ $m }}_telepon" class="block text-sm font-medium text-white mb-1">Nomor Telepon/WA</label>
                <input type="text" id="member_{{ $team_index }}_{{ $m }}_telepon" name="teams[{{$team_index}}][members][{{$m}}][nomor_telepon]" value="{{ old('teams.'.$team_index.'.members.'.$m.'.nomor_telepon') }}" class="form-input w-full rounded-md p-2 bg-white/70 text-black" required>
            </div>
            <div>
                <label for="member_{{ $team_index }}_{{ $m }}_kartu" class="block text-sm font-medium text-white mb-1">Upload Kartu Pelajar</label>
                <input type="file" id="member_{{ $team_index }}_{{ $m }}_kartu" name="teams[{{$team_index}}][members][{{$m}}][kartu_pelajar]" class="form-input w-full rounded-md p-1 bg-white/70 text-black file:mr-4 file:py-1 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" required>
            </div>
            <div>
                <label for="member_{{ $team_index }}_{{ $m }}_penyakit" class="block text-sm font-medium text-white mb-1">Riwayat Penyakit (Isi "-" jika tidak ada)</label>
                <input type="text" id="member_{{ $team_index }}_{{ $m }}_penyakit" name="teams[{{$team_index}}][members][{{$m}}][riwayat_penyakit]" value="{{ old('teams.'.$team_index.'.members.'.$m.'.riwayat_penyakit', '-') }}" class="form-input w-full rounded-md p-2 bg-white/70 text-black">
            </div>
            <div>
                <label for="member_{{ $team_index }}_{{ $m }}_alergi" class="block text-sm font-medium text-white mb-1">Alergi (Isi "-" jika tidak ada)</label>
                <input type="text" id="member_{{ $team_index }}_{{ $m }}_alergi" name="teams[{{$team_index}}][members][{{$m}}][alergi]" value="{{ old('teams.'.$team_index.'.members.'.$m.'.alergi', '-') }}" class="form-input w-full rounded-md p-2 bg-white/70 text-black">
            </div>
        </div>
    </div>
    @endfor
</div>
