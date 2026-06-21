<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'ano',
        'periodo',
    ];

    // relação com alunos
    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }
}