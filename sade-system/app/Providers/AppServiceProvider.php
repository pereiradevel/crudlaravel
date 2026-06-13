<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; // <-- Faltava essa linha!
use App\Models\User;                 // <-- Faltava essa linha também para identificar o $user

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('dono', fn($user) => $user->nivel_acesso === 'dono');
        Gate::define('admin', fn($user) => $user->nivel_acesso === 'admin' || $user->nivel_acesso === 'dono');
        }
    }