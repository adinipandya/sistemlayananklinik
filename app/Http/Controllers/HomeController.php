<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $feedback = Feedback::with('user')
            ->where('status', 'Direspon')
            ->latest()
            ->take(6)
            ->get();

        $totalDokter  = User::where('role', 'dokter')->count();
        $totalPasien  = User::where('role', 'pasien')->count();

        return view('pages.home', compact(
            'feedback',
            'totalDokter',
            'totalPasien'
        ));
    }
}