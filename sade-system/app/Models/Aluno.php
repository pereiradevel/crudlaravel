<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'turma_id',
        'escola_id',
        'nome',
        'matricula',
        'data_nascimento',
    ];

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }
}
