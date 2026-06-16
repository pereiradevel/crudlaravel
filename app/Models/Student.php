<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'matricula',
        'turma_id',
        'data_nascimento',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data_nascimento' => 'date',
    ];

    /**
     * Get the class (turma) that the student belongs to.
     */
    public function turma(): BelongsTo
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }
}
