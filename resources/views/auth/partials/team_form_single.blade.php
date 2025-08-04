<div class="border-t py-4">
    <h5 class="font-semibold text-white mb-2">{{ $index == 0 ? 'Ketua Tim' : 'Anggota ' . ($index + 1) }}</h5>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 text-white">
        <div>
            <label for="member_{{ $index }}_nama" class="block text-sm font-medium text-white mb-1">Nama Lengkap</label>
            <input type="text" id="member_{{ $index }}_nama" name="members[{{$index}}][nama_lengkap]" value="{{ old('members.'.$index.'.nama_lengkap') }}" class="form-input w-full rounded-md p-2 text-white bg-transparent border border-white" required>
        </div>
        <div>
            <label for="member_{{ $index }}_email" class="block text-sm font-medium text-white mb-1">Email</label>
            <input type="email" id="member_{{ $index }}_email" name="members[{{$index}}][email]" value="{{ old('members.'.$index.'.email') }}" class="form-input w-full rounded-md p-2 text-white bg-transparent border border-white" required>
        </div>
        <div class="md:col-span-2">
            <label for="member_{{ $index }}_alamat" class="block text-sm font-medium text-white mb-1">Alamat Lengkap</label>
            <textarea id="member_{{ $index }}_alamat" name="members[{{$index}}][alamat]" rows="2" class="form-input w-full rounded-md p-2 text-white bg-transparent border border-white" required>{{ old('members.'.$index.'.alamat') }}</textarea>
        </div>
        <div>
            <label for="member_{{ $index }}_telepon" class="block text-sm font-medium text-white mb-1">Nomor Telepon/WA</label>
            <input type="text" id="member_{{ $index }}_telepon" name="members[{{$index}}][nomor_telepon]" value="{{ old('members.'.$index.'.nomor_telepon') }}" class="form-input w-full rounded-md p-2 text-white bg-transparent border border-white" required>
        </div>
        <div>
            <label for="member_{{ $index }}_kartu" class="block text-sm font-medium text-white mb-1">Upload Kartu Pelajar</label>
            <input type="file" id="member_{{ $index }}_kartu" name="members[{{$index}}][kartu_pelajar]" class="form-input w-full rounded-md p-1 text-white bg-transparent border border-white" required>
        </div>
        <div>
            <label for="member_{{ $index }}_penyakit" class="block text-sm font-medium text-white mb-1">Riwayat Penyakit</label>
            <input type="text" id="member_{{ $index }}_penyakit" name="members[{{$index}}][riwayat_penyakit]" value="{{ old('members.'.$index.'.riwayat_penyakit', '-') }}" class="form-input w-full rounded-md p-2 text-white bg-transparent border border-white">
        </div>
        <div>
            <label for="member_{{ $index }}_alergi" class="block text-sm font-medium text-white mb-1">Alergi</label>
            <input type="text" id="member_{{ $index }}_alergi" name="members[{{$index}}][alergi]" value="{{ old('members.'.$index.'.alergi', '-') }}" class="form-input w-full rounded-md p-2 text-white bg-transparent border border-white">
        </div>
    </div>
</div>
