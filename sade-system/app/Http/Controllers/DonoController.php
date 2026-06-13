<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escola;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DonoController extends Controller
{
    public function index()
    {
        return view('dono.dashboard');
    }

    public function cadastrarEscola(Request $request)
    {
        $request->validate([
            'nome_escola'   => ['required', 'string', 'max:255'],
            'expira_em'     => ['required', 'date', 'after:today'],
            'name_admin'    => ['required', 'string', 'max:255'],
            'email_admin'   => ['required', 'email', 'unique:users,email'],
            'password_admin'=> ['required', 'min:8'],
        ]);

        $escola = Escola::create([
            'nome' => $request->nome_escola,
            'codigo' => 'ESC-' . strtoupper(Str::random(6)),
            'plano_expira_em' => $request->expira_em,
        ]);

        User::create([
            'escola_id' => $escola->id,
            'name' => $request->name_admin,
            'email' => $request->email_admin,
            'password' => Hash::make($request->password_admin),
            'nivel_acesso' => 'admin',
            'cargo' => 'Diretor Geral',
        ]);

        return back()->with('sucesso', "Escola cadastrada com o código: {$escola->codigo}");
    }
}