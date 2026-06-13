<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DonoController;


// Autenticação Pública
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Grupo Protegido por Login
Route::middleware(['auth'])->group(function () {

    // ÁREA DO DONO (SaaS Admin Global)
    Route::middleware(['can:dono'])->prefix('dono')->group(function () {
        Route::get('/dashboard', [DonoController::class, 'index'])->name('dono.dashboard');
        Route::post('/escolas', [DonoController::class, 'cadastrarEscola'])->name('dono.escolas.store');
    });

    // ÁREA ADMINISTRATIVA DA ESCOLA (Acessível por Admin ou Dono)
    Route::middleware(['can:admin'])->group(function () {
        
        // 1. CRUD de Turmas (Já Funcional)
        Route::get('/dashboard', [TurmaController::class, 'index'])->name('dashboard');
        Route::post('/turmas', [TurmaController::class, 'store'])->name('turmas.store');
        Route::delete('/turmas/{id}', [TurmaController::class, 'destroy'])->name('turmas.destroy');
        Route::put('/turmas/{id}', [TurmaController::class, 'update'])->name('turmas.update');
        Route::get('/turmas/{id}', [TurmaController::class, 'show']);
        Route::get('/turmas/{id}/alunos', [TurmaController::class, 'getAlunos']);

        // 2. CRUD de Alunos (Estrutura pronta para os próximos passos)
        Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos.index');
        Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');
        Route::get('/alunos/{id}', [AlunoController::class, 'show']);
        Route::put('/alunos/{id}', [AlunoController::class, 'update'])->name('alunos.update');
        Route::delete('/alunos/{id}', [AlunoController::class, 'destroy'])->name('alunos.destroy');

        // 3. CRUD de Funcionários
        Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
        Route::post('/funcionarios', [FuncionarioController::class, 'store'])->name('funcionarios.store');
        Route::get('/funcionarios/{id}', [FuncionarioController::class, 'show']);
        Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update'])->name('funcionarios.update');
        Route::delete('/funcionarios/{id}', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');

        // 4. CRUD de Usuários do Sistema (Acessos Admin/Secretaria)
        Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
        Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
        Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
        Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
        Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
    });
});