<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\StudentController;

// Rota inicial - Redireciona para o login ou dashboard
Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
});

// Rotas de Autenticação (Visitantes)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Rotas Autenticadas (Qualquer nível de acesso)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 1. CRUD de Usuários: Apenas Dono ('owner') tem acesso completo
    Route::middleware(['role:owner'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // 2. CRUDs de Funcionários, Turmas e Alunos
    // Leitura: Permitido para qualquer usuário logado (owner, admin, user)
    Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/turmas', [TurmaController::class, 'index'])->name('turmas.index');
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');

    // Escrita: Apenas Dono ('owner') e Administradores ('admin') podem criar/editar/excluir
    Route::middleware(['role:owner,admin'])->group(function () {
        // Funcionários (Staff)
        Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
        Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
        Route::get('/staff/{staff}/edit', [StaffController::class, 'edit'])->name('staff.edit');
        Route::put('/staff/{staff}', [StaffController::class, 'update'])->name('staff.update');
        Route::delete('/staff/{staff}', [StaffController::class, 'destroy'])->name('staff.destroy');

        // Turmas (Classes)
        Route::get('/turmas/create', [TurmaController::class, 'create'])->name('turmas.create');
        Route::post('/turmas', [TurmaController::class, 'store'])->name('turmas.store');
        Route::get('/turmas/{turma}/edit', [TurmaController::class, 'edit'])->name('turmas.edit');
        Route::put('/turmas/{turma}', [TurmaController::class, 'update'])->name('turmas.update');
        Route::delete('/turmas/{turma}', [TurmaController::class, 'destroy'])->name('turmas.destroy');

        // Alunos (Students)
        Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
        Route::post('/students', [StudentController::class, 'store'])->name('students.store');
        Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
        Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
        Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    });
});
