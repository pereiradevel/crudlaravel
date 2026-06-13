<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->isDono()) {
            $alunos = Aluno::with('turma')->get();
        } else {
            $alunos = Aluno::where('escola_id', $user->escola_id)->with('turma')->get();
        }
        $turmas = Turma::where('escola_id', $user->escola_id)->get();
        return view('alunos.index', compact('alunos', 'turmas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'turma_id' => ['required', 'exists:turmas,id'],
            'matricula' => ['nullable', 'string', 'max:100'],
            'data_nascimento' => ['nullable', 'date'],
        ]);
        $data['escola_id'] = Auth::user()->escola_id;
        Aluno::create($data);
        return redirect()->back()->with('sucesso', 'Aluno cadastrado');
    }

    public function update(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        $this->authorize('update', $aluno);
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'turma_id' => ['required', 'exists:turmas,id'],
            'matricula' => ['nullable', 'string', 'max:100'],
            'data_nascimento' => ['nullable', 'date'],
        ]);
        $aluno->update($data);
        return redirect()->back()->with('sucesso', 'Aluno atualizado');
    }

    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
        $this->authorize('delete', $aluno);
        $aluno->delete();
        return redirect()->back()->with('sucesso', 'Aluno removido');
    }

    public function show($id)
    {
        $aluno = Aluno::findOrFail($id);
        return response()->json($aluno);
    }
}

