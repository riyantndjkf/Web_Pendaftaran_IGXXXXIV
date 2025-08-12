<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
                 return view('admin.home'); // contoh route admin
            case 'penpos':
                 return view('admin.home'); // contoh route penpos
            case 'peserta':
                return view('peserta.home'); // tetap di halaman peserta
            default:
                abort(403, 'Unauthorized role');
        }
           
        }

    public function account()
{
    $user = Auth::user();

    $team = Team::with('members')->where('nama_tim', $user->name)->first();

    return view('peserta.account', [
        'team' => $team
    ]);
}

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
