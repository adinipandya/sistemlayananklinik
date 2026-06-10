<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // REGISTER
    public function register(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'nik' => 'required|unique:users',

            'no_hp' => 'required',

            'password' => 'required|min:6'

        ]);

        User::create([

            'name' => $request->name,

            'nik' => $request->nik,

            'no_hp' => $request->no_hp,

            'password' => Hash::make($request->password),

            'role' => 'pasien',

            'status' => 'Menunggu'

        ]);

        return redirect('/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(
            'email',
            'password'
        );

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

        return back()->with(
            'error',
            'Email atau password salah'
        );
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
