<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::orderBy('nome')->paginate(10);
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cargo' => ['required', 'string', 'max:255'],
            'telefone' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255', 'unique:staff,email'],
        ], [
            'nome.required' => 'O nome do funcionário é obrigatório.',
            'cargo.required' => 'O cargo do funcionário é obrigatório.',
            'email.required' => 'O e-mail do funcionário é obrigatório.',
            'email.email' => 'Por favor, informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado para outro funcionário.',
        ]);

        Staff::create($data);

        return redirect()->route('staff.index')
            ->with('success', 'Sucesso! O funcionário foi cadastrado com sucesso.');
    }

    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cargo' => ['required', 'string', 'max:255'],
            'telefone' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255', 'unique:staff,email,' . $staff->id],
        ], [
            'nome.required' => 'O nome do funcionário é obrigatório.',
            'cargo.required' => 'O cargo do funcionário é obrigatório.',
            'email.required' => 'O e-mail do funcionário é obrigatório.',
            'email.email' => 'Por favor, informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado para outro funcionário.',
        ]);

        $staff->update($data);

        return redirect()->route('staff.index')
            ->with('success', 'Sucesso! Os dados do funcionário foram atualizados.');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staff.index')
            ->with('success', 'Sucesso! O funcionário foi removido do sistema.');
    }
}
