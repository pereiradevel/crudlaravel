<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\UserController;


Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('alunos', AlunoController::class);
    Route::resource('turmas', TurmaController::class);
    Route::resource('funcionarios', FuncionarioController::class);
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';