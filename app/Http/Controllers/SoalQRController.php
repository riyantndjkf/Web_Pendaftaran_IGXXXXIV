<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoalQR;
use Illuminate\Support\Facades\Log;

class SoalQRController extends Controller
{
    public function show($id)
    {
        if (!session()->get("akses_soal_$id")) {
            abort(403, "Akses soal hanya bisa dilakukan melalui QR scan.");
        }

        $soal = SoalQR::findOrFail($id);
        return view('rally-2.question', compact('soal'));
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

        // Perbandingan
        $status = $jawabanUser === $jawabanBenar ? 'benar' : 'salah';

        return response()->json([
            'status' => $status,
            'reward' => $status === 'benar' ? $soal->reward_amount : null
        ]);
    }
}