<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Komponen;
use App\Models\PoinBabak1;
use App\Models\Sepeda;
use App\Models\Team;
use App\Models\Tteam;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use Psy\Readline\Hoa\Console;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register'); 
    }

    public function register(Request $request)
{
    // 1. VALIDASI DATA: TAMBAHKAN 'asal_sekolah'
    $validator = Validator::make($request->all(), [
        'nama_tim' => ['required', 'string', 'max:255', 'unique:teams,nama_tim'],
        'password' => ['required', 'string', 'min:8'],
        'asal_sekolah' => ['required', 'string', 'max:255'], 
        'members' => ['required', 'array', 'size:3'],
        'members.*.nama_lengkap' => ['required', 'string', 'max:255'],
        'members.*.email' => ['required', 'email', 'distinct', 'unique:members,email'],
        'members.*.kartu_pelajar' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
        'foto_bukti_pembayaran' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    DB::beginTransaction();
    try {
        $buktiPembayaranFile = $request->file('foto_bukti_pembayaran');
        $namaTimSlug = Str::slug($request->nama_tim);
        $pathBuktiPembayaran = $buktiPembayaranFile->storeAs(
            'bukti_pembayaran', // Direktori di dalam storage/app/public
            "{$namaTimSlug}_" . time() . ".{$buktiPembayaranFile->getClientOriginalExtension()}",
            'public' 
        );

        $team = Team::create([
            'nama_tim' => $request->nama_tim,
            'password' => $request->password,
            'asal_sekolah' => $request->asal_sekolah, 
            'foto_bukti_pembayaran' => $pathBuktiPembayaran
        ]);
        
        User::create([
            'name' => $request->nama_tim,
            'role' => 'peserta',
            'password' => bcrypt($request->password),
        ]);
        
        Komponen::create([
            'team_id' => $team->id,
        ]);

        Sepeda::create([
            'team_id' => $team->id,
        ]);

        PoinBabak1::create([
            'sepeda_komponen_peserta_namaTim1' => $team->id,
            'total_poin' => 0,
        ]);

        foreach ($request->members as $index => $memberData) {
            $file = $memberData['kartu_pelajar'];
            $namaTimSlug = Str::slug($request->nama_tim);
            $fileName = "{$namaTimSlug}_" . ($index + 1) . ".{$file->getClientOriginalExtension()}";
            
            // ### PERBAIKAN DI SINI ###
            $path = $file->storeAs('kartu_pelajar', $fileName, 'public');

            $team->members()->create([
                'status' => ($index == 0) ? 'ketua' : 'anggota',
                'nama_lengkap' => $memberData['nama_lengkap'],
                'alamat' => $memberData['alamat'],
                'nomor_telepon' => $memberData['nomor_telepon'],
                'email' => $memberData['email'],
                'riwayat_penyakit' => $memberData['riwayat_penyakit'] ?? '-',
                'alergi' => $memberData['alergi'] ?? '-',
                'path_kartu_pelajar' => $path,
            ]);
        }

        DB::commit();
        event(new Registered($team));
        
        return redirect()->route('register.success');

    } catch (\Throwable $th) {
        DB::rollBack();
        Log::error('Registrasi Gagal: ' . $th->getMessage());
        return redirect('register')->with('error', 'Terjadi kesalahan saat registrasi, silakan coba lagi.')->withInput();
    }
}
    public function success()
    {
        return view('auth.register-success');
    }
}