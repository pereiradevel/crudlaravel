<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        return view('funcionarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cargo' => 'required',
            'email' => 'required|email|unique:funcionarios',
        ]);

        Funcionario::create($request->all());

        return redirect()->route('funcionarios.index')
            ->with('success', 'Funcionário criado com sucesso!');
    }

    public function show(Funcionario $funcionario)
    {
        return view('funcionarios.show', compact('funcionario'));
    }

    public function edit(Funcionario $funcionario)
    {
        return view('funcionarios.edit', compact('funcionario'));
    }

    public function update(Request $request, Funcionario $funcionario)
    {
        $request->validate([
            'nome' => 'required',
            'cargo' => 'required',
            'email' => 'required|email|unique:funcionarios,email,' . $funcionario->id,
        ]);

        $funcionario->update($request->all());

        return redirect()->route('funcionarios.index')
            ->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();

        return redirect()->route('funcionarios.index')
            ->with('success', 'Funcionário deletado com sucesso!');
    }
}