<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::with('turma')->get();
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        $turmas = Turma::all();
        return view('alunos.create', compact('turmas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:alunos',
            'turma_id' => 'required|exists:turmas,id',
        ]);

        Aluno::create($request->all());

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno criado com sucesso!');
    }

    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    public function edit(Aluno $aluno)
    {
        $turmas = Turma::all();
        return view('alunos.edit', compact('aluno', 'turmas'));
    }

    public function update(Request $request, Aluno $aluno)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:alunos,email,' . $aluno->id,
            'turma_id' => 'required|exists:turmas,id',
        ]);

        $aluno->update($request->all());

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno removido com sucesso!');
    }
}