<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Funcionario;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'alunos' => Aluno::count(),
            'turmas' => Turma::count(),
            'funcionarios' => Funcionario::count(),
            'users' => User::count(),
        ]);
    }
}