<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index()
    {
        return view('sesi.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            $request->session()->regenerate();
            return redirect()->route('beranda');
        } else {
            return redirect('/sesi')->with('error', 'Nama atau password yang dimasukkan tidak sesuai');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/sesi');
    }
}
