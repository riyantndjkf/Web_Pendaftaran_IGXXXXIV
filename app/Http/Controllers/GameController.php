<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $gameData = [
            'timer' => '25:33',
            'demand' => [
                'current' => 35,
                'fulfilled' => 0
            ],
            'capital' => 100000,
            'factories' => [
                ['unlocked' => true, 'active' => true, 'owned' => true, 'workers' => 5],
                ['unlocked' => true, 'active' => true, 'owned' => true, 'workers' => 3],
                ['unlocked' => true, 'active' => true, 'owned' => true, 'workers' => 4],
                ['unlocked' => true, 'active' => true, 'owned' => true, 'workers' => 2],
                ['unlocked' => true, 'active' => true],
                ['unlocked' => true, 'active' => true],
                ['unlocked' => true, 'active' => true],
                ['unlocked' => true, 'active' => true],
                ['unlocked' => true, 'active' => true],
                ['unlocked' => true, 'active' => true],
                ['unlocked' => true, 'active' => true],
                ['unlocked' => false, 'active' => false],
                ['unlocked' => false, 'active' => false],
                ['unlocked' => false, 'active' => false],
                ['unlocked' => false, 'active' => false],
            ],
            'unlock_cost' => 100000,
            'show_unlock_modal' => false
        ];

        return view('rally-2.index', compact('gameData'));
    }

    public function unlock(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Factory unlocked successfully!'
        ]);
    }

    public function scanner()
    {
        return view('rally-2.scanner');
    }

    public function events()
    {
        return view('rally-2.events');
    }

    public function inventory()
    {
        return view('rally-2.inventory');
    }

    public function question()
    {
        return view('rally-2.question');
    }
}