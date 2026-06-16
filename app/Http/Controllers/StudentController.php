<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('turma')->orderBy('nome')->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $turmas = Turma::orderBy('nome_turma')->get();
        return view('students.create', compact('turmas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'matricula' => ['required', 'string', 'max:255', 'unique:students,matricula'],
            'turma_id' => ['required', 'exists:turmas,id'],
            'data_nascimento' => ['required', 'date', 'before:today'],
        ], [
            'nome.required' => 'O nome completo do aluno é obrigatório.',
            'matricula.required' => 'O código de matrícula é obrigatório.',
            'matricula.unique' => 'Este código de matrícula já está registrado para outro aluno.',
            'turma_id.required' => 'A indicação da turma é obrigatória.',
            'turma_id.exists' => 'A turma selecionada não foi encontrada em nossa base de dados.',
            'data_nascimento.required' => 'A data de nascimento é obrigatória.',
            'data_nascimento.date' => 'Informe uma data de nascimento em formato válido.',
            'data_nascimento.before' => 'A data de nascimento precisa ser uma data no passado.',
        ]);

        Student::create($data);

        return redirect()->route('students.index')
            ->with('success', 'Sucesso! O aluno foi cadastrado e matriculado com segurança.');
    }

    public function edit(Student $student)
    {
        $turmas = Turma::orderBy('nome_turma')->get();
        return view('students.edit', compact('student', 'turmas'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'matricula' => ['required', 'string', 'max:255', Rule::unique('students', 'matricula')->ignore($student->id)],
            'turma_id' => ['required', 'exists:turmas,id'],
            'data_nascimento' => ['required', 'date', 'before:today'],
        ], [
            'nome.required' => 'O nome completo do aluno é obrigatório.',
            'matricula.required' => 'O código de matrícula é obrigatório.',
            'matricula.unique' => 'Este código de matrícula já está registrado para outro aluno.',
            'turma_id.required' => 'A indicação da turma é obrigatória.',
            'turma_id.exists' => 'A turma selecionada não foi encontrada em nossa base de dados.',
            'data_nascimento.required' => 'A data de nascimento é obrigatória.',
            'data_nascimento.date' => 'Informe uma data de nascimento em formato válido.',
            'data_nascimento.before' => 'A data de nascimento precisa ser uma data no passado.',
        ]);

        $student->update($data);

        return redirect()->route('students.index')
            ->with('success', 'Sucesso! Os dados cadastrais do aluno foram atualizados.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Sucesso! O registro do aluno foi removido do sistema.');
    }
}
