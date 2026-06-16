<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use App\Models\Turma;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $metrics = [
            'users_count' => User::count(),
            'staff_count' => Staff::count(),
            'turmas_count' => Turma::count(),
            'students_count' => Student::count(),
        ];

        return view('dashboard', $metrics);
    }
}
