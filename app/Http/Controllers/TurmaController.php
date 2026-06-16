<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::with('students')->orderBy('nome_turma')->paginate(10);
        return view('turmas.index', compact('turmas'));
    }

    public function create()
    {
        return view('turmas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome_turma' => ['required', 'string', 'max:255'],
            'periodo' => ['required', Rule::in(['Manhã', 'Tarde', 'Noite', 'Integral'])],
            'ano' => ['required', 'integer', 'min:2000', 'max:2100'],
        ], [
            'nome_turma.required' => 'O nome da turma é obrigatório.',
            'periodo.required' => 'O turno ou período é obrigatório.',
            'periodo.in' => 'Por favor, selecione um período válido (Manhã, Tarde, Noite ou Integral).',
            'ano.required' => 'O ano letivo é obrigatório.',
            'ano.integer' => 'O ano letivo deve ser informado como um número inteiro.',
            'ano.min' => 'O ano deve ser igual ou superior a 2000.',
            'ano.max' => 'O ano deve ser igual ou inferior a 2100.',
        ]);

        Turma::create($data);

        return redirect()->route('turmas.index')
            ->with('success', 'Sucesso! A turma foi criada e registrada com segurança.');
    }

    public function edit(Turma $turma)
    {
        return view('turmas.edit', compact('turma'));
    }

    public function update(Request $request, Turma $turma)
    {
        $data = $request->validate([
            'nome_turma' => ['required', 'string', 'max:255'],
            'periodo' => ['required', Rule::in(['Manhã', 'Tarde', 'Noite', 'Integral'])],
            'ano' => ['required', 'integer', 'min:2000', 'max:2100'],
        ], [
            'nome_turma.required' => 'O nome da turma é obrigatório.',
            'periodo.required' => 'O turno ou período é obrigatório.',
            'periodo.in' => 'Por favor, selecione um período válido (Manhã, Tarde, Noite ou Integral).',
            'ano.required' => 'O ano letivo é obrigatório.',
            'ano.integer' => 'O ano letivo deve ser informado como um número inteiro.',
            'ano.min' => 'O ano deve ser igual ou superior a 2000.',
            'ano.max' => 'O ano deve ser igual ou inferior a 2100.',
        ]);

        $turma->update($data);

        return redirect()->route('turmas.index')
            ->with('success', 'Sucesso! Os dados da turma foram atualizados.');
    }

    public function destroy(Turma $turma)
    {
        $turma->delete();

        return redirect()->route('turmas.index')
            ->with('success', 'Sucesso! A turma e todas as matrículas associadas foram removidas.');
    }
}
