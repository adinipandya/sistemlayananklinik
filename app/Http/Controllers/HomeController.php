<?php

namespace App\Http\Controllers;

use App\Models\Feedback;

class HomeController
{
    public function index()
    {
        $feedback = Feedback::with('user')
            ->where('status', 'Direspon')
            ->latest()
            ->take(6)
            ->get();

        return view(
            'pages.home',
            compact('feedback')
        );
    }
}