<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Turma extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'turmas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome_turma',
        'periodo',
        'ano',
    ];

    /**
     * Get the students for the class.
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'turma_id');
    }
}
