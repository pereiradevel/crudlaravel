<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class FuncionarioController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->isDono()) {
            $funcionarios = User::where('nivel_acesso', 'funcionario')->get();
        } else {
            $funcionarios = User::where('nivel_acesso', 'funcionario')->where('escola_id', $user->escola_id)->get();
        }
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
            'cargo' => ['nullable', 'string', 'max:100'],
        ]);
        $data['password'] = Hash::make($data['password']);
        $data['nivel_acesso'] = 'funcionario';
        $data['escola_id'] = Auth::user()->escola_id;
        User::create($data);
        return redirect()->back()->with('sucesso', 'Funcionário cadastrado');
    }

    public function update(Request $request, $id)
    {
        $func = User::findOrFail($id);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'cargo' => ['nullable', 'string', 'max:100'],
        ]);
        $func->update($data);
        return redirect()->back()->with('sucesso', 'Funcionário atualizado');
    }

    public function destroy($id)
    {
        $func = User::findOrFail($id);
        $func->delete();
        return redirect()->back()->with('sucesso', 'Funcionário removido');
    }

    public function show($id)
    {
        $func = User::findOrFail($id);
        return response()->json($func);
    }
}
