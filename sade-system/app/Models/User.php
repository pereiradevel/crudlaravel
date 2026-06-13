<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Escola;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'escola_id',
        'name',
        'email',
        'password',
        'nivel_acesso',
        'cargo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isDono(): bool
    {
        return $this->nivel_acesso === 'dono';
    }
    public function isAdmin(): bool
    {
        return $this->nivel_acesso === 'admin';
    }
    public function inputEscola()
    {
        return $this->belongsTo(Escola::class, 'escola_id');
    }

    public function escola()
    {
        return $this->belongsTo(Escola::class, 'escola_id');
    }
}