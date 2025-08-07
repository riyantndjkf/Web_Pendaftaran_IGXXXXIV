<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Throwable;

class BundleRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register_bundle_form');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input Dasar
        $request->validate([
            'asal_sekolah' => ['required', 'string', 'max:255'],
            'foto_bukti_pembayaran' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'teams' => ['required', 'array', 'size:3'],
            'teams.*.nama_tim' => ['required', 'string', 'max:255', 'distinct', 'unique:teams,nama_tim'],
            'teams.*.password' => ['required', 'string', 'min:8'],
            'teams.*.members' => ['required', 'array', 'size:3'],
            'teams.*.members.*.nama_lengkap' => ['required', 'string', 'max:255'],
            'teams.*.members.*.email' => ['required', 'string', 'email', 'max:255', 'distinct', 'unique:members,email'],
            'teams.*.members.*.kontak' => ['required', 'string', 'max:20'],
            'teams.*.members.*.path_foto_ktm' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ], [
            'teams.*.nama_tim.distinct' => 'Nama tim dalam satu pendaftaran bundle tidak boleh sama.',
            'teams.*.nama_tim.unique' => 'Salah satu nama tim sudah terdaftar.',
            'teams.*.members.*.email.distinct' => 'Email setiap anggota di semua tim harus unik.',
            'teams.*.members.*.email.unique' => 'Salah satu email anggota sudah digunakan.',
        ]);

        // 2. Pengecekan Duplikasi Email Antar Tim dalam Request yang Sama
        $allMemberEmails = Arr::flatten(Arr::pluck($request->teams, 'members.*.email'));
        if (count($allMemberEmails) !== count(array_unique($allMemberEmails))) {
            throw ValidationException::withMessages([
                'teams.0.members.0.email' => 'Terdapat duplikasi email anggota di antara tim yang Anda daftarkan. Harap gunakan email yang berbeda untuk setiap anggota.'
            ]);
        }

        try {
            // 3. Gunakan Transaksi Database
            DB::transaction(function () use ($request) {

                // Penanganan Upload File Bukti Pembayaran
                try {
                    $buktiPembayaranPath = $request->file('foto_bukti_pembayaran')->store('bukti_pembayaran', 'public');
                } catch (Throwable $e) {
                    Log::error('File Upload Failed: ' . $e->getMessage());
                    throw ValidationException::withMessages(['foto_bukti_pembayaran' => 'Gagal mengunggah bukti pembayaran. Silakan coba lagi.']);
                }

                // Looping untuk setiap tim dalam bundle
                foreach ($request->teams as $teamIndex => $teamData) {
                    $newTeam = Team::create([
                        'nama_tim' => $teamData['nama_tim'],
                        'password' => bcrypt($teamData['password']),
                        'asal_sekolah' => $request->asal_sekolah,
                        'foto_bukti_pembayaran' => $buktiPembayaranPath,
                        // Tambahkan field lain jika ada
                    ]);

                    // Looping untuk setiap anggota dalam tim
                    foreach ($teamData['members'] as $memberIndex => $memberData) {
                        try {
                            $ktmPath = $memberData['path_foto_ktm']->store('ktm', 'public');
                        } catch (Throwable $e) {
                            Log::error('KTM Upload Failed: ' . $e->getMessage());
                            throw ValidationException::withMessages([
                                "teams.{$teamIndex}.members.{$memberIndex}.path_foto_ktm" => "Gagal mengunggah KTM untuk anggota di Tim " . ($teamIndex + 1)
                            ]);
                        }

                        $newTeam->members()->create([
                            'nama_lengkap' => $memberData['nama_lengkap'],
                            'email' => $memberData['email'],
                            'kontak' => $memberData['kontak'],
                            'path_foto_ktm' => $ktmPath,
                        ]);
                    }
                }
            });

            return redirect()->route('home')->with('success', 'Pendaftaran 3 tim berhasil!');

        } catch (ValidationException $e) {
            throw $e;
        } catch (Throwable $e) {
            Log::error('Bundle Registration Error: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan tak terduga saat pendaftaran. Silakan hubungi panitia jika masalah berlanjut.');
        }
    }
}