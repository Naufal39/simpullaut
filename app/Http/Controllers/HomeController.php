<?php

namespace App\Http\Controllers;

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
        $user = auth()->user();
        // Ambil hanya data hinterland sesuai region user yang login
        $tabs = \App\Models\HinterlandTab::where('region', $user->region)->get();
        return view('home', compact('tabs', 'user'));
    }
}
