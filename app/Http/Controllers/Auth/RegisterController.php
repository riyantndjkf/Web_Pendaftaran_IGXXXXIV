<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Throwable;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register_single_form');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input Dasar
        $request->validate([
            'nama_tim' => ['required', 'string', 'max:255', 'unique:teams,nama_tim'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'asal_sekolah' => ['required', 'string', 'max:255'],
            'members.*.nama_lengkap' => ['required', 'string', 'max:255'],
            'members.*.email' => ['required', 'string', 'email', 'max:255', 'distinct', 'unique:members,email'],
            'members.*.kontak' => ['required', 'string', 'max:20'],
            'members.*.path_foto_ktm' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'foto_bukti_pembayaran' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ], [
            'nama_tim.unique' => 'Nama tim ini sudah terdaftar.',
            'members.*.email.unique' => 'Email anggota ini sudah digunakan.',
            'members.*.email.distinct' => 'Setiap anggota harus memiliki email yang berbeda.',
        ]);

        try {
            // 2. Gunakan Transaksi Database
            // Ini memastikan semua proses (buat tim, buat anggota, upload file) berhasil,
            // atau semuanya akan dibatalkan (rollback) jika ada satu saja yang gagal.
            $team = DB::transaction(function () use ($request) {

                // 3. Penanganan Upload File Bukti Pembayaran
                try {
                    $buktiPembayaranPath = $request->file('foto_bukti_pembayaran')->store('bukti_pembayaran', 'public');
                } catch (Throwable $e) {
                    // Log error untuk investigasi admin
                    Log::error('File Upload Failed: ' . $e->getMessage());
                    // Kirim pesan error yang jelas ke pengguna
                    throw ValidationException::withMessages([
                        'foto_bukti_pembayaran' => 'Gagal mengunggah bukti pembayaran. Silakan coba lagi.'
                    ]);
                }

                // Membuat tim baru
                $newTeam = Team::create([
                    'nama_tim' => $request->nama_tim,
                    'password' => bcrypt($request->password),
                    'asal_sekolah' => $request->asal_sekolah,
                    'foto_bukti_pembayaran' => $buktiPembayaranPath,
                    // Tambahkan field lain jika ada
                ]);

                // Membuat anggota tim
                foreach ($request->members as $memberData) {
                    try {
                        $ktmPath = $memberData['path_foto_ktm']->store('ktm', 'public');
                    } catch (Throwable $e) {
                        Log::error('KTM Upload Failed: ' . $e->getMessage());
                        throw ValidationException::withMessages([
                            'members.0.path_foto_ktm' => 'Gagal mengunggah salah satu file KTM. Pastikan semua file valid.'
                        ]);
                    }

                    $newTeam->members()->create([
                        'nama_lengkap' => $memberData['nama_lengkap'],
                        'email' => $memberData['email'],
                        'kontak' => $memberData['kontak'],
                        'path_foto_ktm' => $ktmPath,
                    ]);
                }
                
                return $newTeam;
            });

            // 4. Proses setelah berhasil
            // (Opsional: Login otomatis atau kirim email notifikasi)
            // auth()->login($team->user); // Jika ada relasi ke user

            return redirect()->route('home')->with('success', 'Pendaftaran tim ' . $team->nama_tim . ' berhasil!');

        } catch (ValidationException $e) {
            // Jika ada error validasi dari dalam transaksi, lempar kembali
            throw $e;
        } catch (Throwable $e) {
            // 5. Menangkap semua error lain yang mungkin terjadi
            Log::error('Registration Error: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan tak terduga saat pendaftaran. Silakan hubungi panitia jika masalah berlanjut.');
        }
    }
}