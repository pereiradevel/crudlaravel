<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            // Vincula a turma a uma escola específica (Multi-tenant)
            $table->foreignId('escola_id')->constrained('escolas')->onDelete('cascade');
            $table->string('nome');
            $table->string('periodo'); // Matutino, Vespertino, Noturno
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('turmas');
    }
};