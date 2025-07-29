<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
class BundleRegistrationController extends Controller
{
    /**
     * Menampilkan formulir registrasi multi-langkah untuk paket bundle.
     */
    public function create()
    {
        return view('auth.register_bundle_form');
    }

    /**
     * Menyimpan data dari formulir registrasi bundle.
     */
    public function store(Request $request)
    {
        // 1. Validasi semua data yang masuk, termasuk bukti pembayaran
        $validator = Validator::make($request->all(), [
            'asal_sekolah' => ['required', 'string', 'max:255'],
            'foto_bukti_pembayaran' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'], // Validasi bukti bayar
            
            'teams'               => ['required', 'array', 'size:3'],
            'teams.*.nama_tim'    => ['required', 'string', 'distinct', 'unique:teams,nama_tim'],
            'teams.*.password'    => ['required', 'string', 'min:8'],
            
            'teams.*.members'                 => ['required', 'array', 'size:3'],
            'teams.*.members.*.nama_lengkap'  => ['required', 'string', 'max:255'],
            'teams.*.members.*.alamat'        => ['required', 'string'],
            'teams.*.members.*.nomor_telepon' => ['required', 'string', 'max:20'],
            'teams.*.members.*.email'         => ['required', 'email', 'distinct', 'unique:members,email'],
            'teams.*.members.*.kartu_pelajar' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            // 2. Simpan file bukti pembayaran terlebih dahulu
            $buktiPembayaranFile = $request->file('foto_bukti_pembayaran');
            $namaSekolahSlug = Str::slug($request->asal_sekolah);
            $pathBuktiPembayaran = $buktiPembayaranFile->storeAs(
                'public/bukti_pembayaran',
                "{$namaSekolahSlug}_" . time() . ".{$buktiPembayaranFile->getClientOriginalExtension()}"
            );

            // 3. Lakukan perulangan untuk setiap tim dari formulir
            foreach ($request->teams as $teamKey => $teamData) {
                // Siapkan data untuk membuat tim
                $teamCreateData = [
                    'nama_tim' => $teamData['nama_tim'],
                    'password' => $teamData['password'],
                    'asal_sekolah' => $request->asal_sekolah,
                ];

                // 4. HANYA untuk tim pertama, tambahkan path bukti pembayaran
                if ($teamKey == 0) {
                    $teamCreateData['foto_bukti_pembayaran'] = $pathBuktiPembayaran;
                }

                $team = Team::create($teamCreateData);
                User::create([
                    'name' => $teamData['nama_tim'],
                    'role' => 'peserta',
                    'password' => bcrypt($teamData['password']),
                ]);
                // 5. Proses anggota tim seperti biasa
                foreach ($teamData['members'] as $memberKey => $memberData) {
                    $file = $memberData['kartu_pelajar'];
                    $namaTimSlug = Str::slug($teamData['nama_tim']);
                    $fileName = "{$namaTimSlug}_member_" . ($memberKey + 1) . "_" . time() . ".{$file->getClientOriginalExtension()}";
                    $path = $file->storeAs('public/kartu_pelajar', $fileName);

                    $team->members()->create([
                        'status' => ($memberKey == 0) ? 'ketua' : 'anggota',
                        'nama_lengkap' => $memberData['nama_lengkap'],
                        'alamat' => $memberData['alamat'],
                        'nomor_telepon' => $memberData['nomor_telepon'],
                        'email' => $memberData['email'],
                        'riwayat_penyakit' => $memberData['riwayat_penyakit'] ?? '-',
                        'alergi' => $memberData['alergi'] ?? '-',
                        'path_kartu_pelajar' => $path,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('register')->with('success', 'Registrasi bundle berhasil!');

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Registrasi Bundle Gagal: ' . $th->getMessage());
            return back()->with('error', 'Terjadi kesalahan pada server. Silakan coba lagi.');
        }
    }
}
