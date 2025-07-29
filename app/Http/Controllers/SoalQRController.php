<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoalQR;
use Illuminate\Support\Facades\Log;

class SoalQRController extends Controller
{
    public function show($id)
    {
        // Cegah akses tanpa QR
        if (!session()->get("akses_soal_$id")) {
            abort(403, "Akses soal hanya bisa dilakukan melalui QR Scan.");
        }

        $soal = SoalQR::findOrFail($id);

        // Cek apakah peserta sudah pernah membuka soal ini sebelumnya
        $pernahAkses = session()->get("pernah_akses_$id", false);

        // Tandai bahwa soal sudah pernah diakses
        session()->put("pernah_akses_$id", true);

        return view('rally-2.question', compact('soal', 'pernahAkses'));
    }

    public function submit(Request $request, $id)
    {
        $soal = SoalQR::findOrFail($id);

        // Fungsi normalisasi jawaban
        $normalize = function ($str) {
            $str = trim(strtolower($str));
            $str = preg_replace('/^\$+|\$+$/', '', $str); // hilangkan tanda $
            $str = str_replace(['\mathrm{', '\mathrm', '{', '}', '_'], '', $str); // hilangkan LaTeX formatting
            $str = preg_replace('/\^\{(.+?)\}/', '$1', $str); // ubah ^{3-} jadi 3-
            $str = str_replace(['^', '−', '–'], ['','-','-'], $str); // hilangkan ^, ubah minus unicode ke ASCII
            return $str;
        };

        // Normalisasi input user dan jawaban benar
        $jawabanUser = $normalize($request->input('jawaban'));
        $jawabanBenar = $normalize($soal->jawaban_benar);

        // Logging untuk debug
        Log::info("JAWABAN USER: " . $jawabanUser);
        Log::info("JAWABAN BENAR: " . $jawabanBenar);
        
        // Perbandingan
        $status = $jawabanUser === $jawabanBenar ? 'benar' : 'salah';

        return response()->json([
            'status' => $status,
            'reward' => $status === 'benar' ? $soal->reward_amount : null
        ]);
    }
}