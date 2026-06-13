<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('escolas', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('codigo')->unique();
        $table->date('plano_expira_em'); // Controle de Expiração do SaaS
        $table->boolean('ativo')->default(true);
        $table->timestamps();
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escolas');
    }
};
