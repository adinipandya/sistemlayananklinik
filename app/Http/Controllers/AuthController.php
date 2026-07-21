<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Notification;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'nik'      => 'required|digits:16|unique:users,nik',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        $lastPatient = User::whereNotNull('no_rm')
            ->orderByDesc('id')
            ->first();

        $nextNumber = $lastPatient
            ? ((int) substr($lastPatient->no_rm, 2)) + 1
            : 1;

        $noRM = 'RM' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        User::create([

            'name' => $request->name,

            'nik' => $request->nik,

            'email' => $request->email,

            'password' => bcrypt($request->password),

            'role' => 'pasien',

            'status' => 'Aktif',

            'no_rm' => $noRM

        ]);


        return redirect('/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect('/admin');
            }

            if ($user->role == 'dokter') {
                return redirect('/dokter');
            }

            if ($user->role == 'pasien') {
                return redirect('/pasien');
            }
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
