<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::whereIn('nivel_acesso', ['admin', 'funcionario'])->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
            'nivel_acesso' => ['required', 'in:admin,funcionario'],
        ]);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->back()->with('sucesso', 'Usuário criado');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'nivel_acesso' => ['required', 'in:admin,funcionario'],
        ]);
        $user->update($data);
        return redirect()->back()->with('sucesso', 'Usuário atualizado');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('sucesso', 'Usuário removido');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }
}
