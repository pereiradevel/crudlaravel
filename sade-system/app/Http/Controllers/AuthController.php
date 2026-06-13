<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // Tenta logar apenas com e-mail e senha
    if (\Illuminate\Support\Facades\Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        
        // Se for dono, vai pro painel do dono, se não, vai pro dashboard normal
        if (\Illuminate\Support\Facades\Auth::user()->nivel_acesso === 'dono') {
            return redirect()->route('dono.dashboard');
        }
        
        return redirect()->route('dashboard');
    }

    return back()->withErrors(['email' => 'As credenciais informadas estão incorretas.'])->withInput();
}
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}