<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
            'asal_sekolah' => ['required', 'string', 'max:255'], // <-- TAMBAHAN
            'members' => ['required', 'array', 'size:3'],
            'members.*.nama_lengkap' => ['required', 'string', 'max:255'],
            'members.*.email' => ['required', 'email', 'distinct', 'unique:members,email'],
            'members.*.kartu_pelajar' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            // 2. BUAT TEAM: TAMBAHKAN 'asal_sekolah'
            $team = Team::create([
                'nama_tim' => $request->nama_tim,
                'password' => $request->password,
                'asal_sekolah' => $request->asal_sekolah, // <-- TAMBAHAN
            ]);

            // Logika untuk anggota tetap sama
            foreach ($request->members as $index => $memberData) {
                $file = $memberData['kartu_pelajar'];
                $namaTimSlug = Str::slug($request->nama_tim);
                $fileName = "{$namaTimSlug}_" . ($index + 1) . ".{$file->getClientOriginalExtension()}";
                $path = $file->storeAs('public/kartu_pelajar', $fileName);

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
            $this->guard()->login($team);
            return $this->registered($request, $team) ?: redirect($this->redirectPath());

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Registrasi Gagal: ' . $th->getMessage());
            return redirect('register')->with('error', 'Terjadi kesalahan saat registrasi, silakan coba lagi.')->withInput();
        }
    }
    
    // Method validator() dan create() di bawah ini tidak terpakai oleh alur kita.
    protected function validator(array $data){/*...*/}
    protected function create(array $data){/*...*/}
}