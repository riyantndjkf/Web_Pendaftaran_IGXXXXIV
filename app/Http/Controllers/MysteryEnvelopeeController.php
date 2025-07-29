<?php

namespace App\Http\Controllers;

use App\Models\MysteryEnvelope;
use Illuminate\Http\Request;

class MysteryEnvelopeeController extends Controller
{
    public function claim($id)
    {
        // Batasi hanya lewat scan (opsional, seperti soal)
        if (!session()->get("akses_envelope_$id")) {
            abort(403, "Akses hanya bisa dilakukan melalui QR Scan.");
        }

        $envelope = MysteryEnvelope::where('id', $id)->first();

        if (!$envelope) {
            abort(404, "Envelope tidak ditemukan.");
        }

        // Cek apakah tim sudah klaim sebelumnya (opsional)
        if ($envelope->tTeam_id) {
            return redirect()
                ->route('rally-2.scanner') // ganti ini dengan rute tempat peserta diarahkan kembali
                ->with('error', 'Envelope ini sudah diklaim oleh tim lain.');
        }

        // Simpan ke log atau tandai sebagai sudah diklaim (opsional)

        // Kirim tampilan reward
        return view('rally-2.claim-envelope', compact('envelope'));
    }

}
