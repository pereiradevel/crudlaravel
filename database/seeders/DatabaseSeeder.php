<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Staff;
use App\Models\Turma;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Dono SAE',
            'email' => 'dono@sae.com',
            'password' => Hash::make('senha123'),
            'role' => 'owner',
        ]);

        User::create([
            'name' => 'Admin SAE',
            'email' => 'admin@sae.com',
            'password' => Hash::make('senha123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Administrador',
            'email' => 'adm@sae.com',
            'password' => Hash::make('23112009'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Usuário Comum',
            'email' => 'user@sae.com',
            'password' => Hash::make('senha123'),
            'role' => 'user',
        ]);

        Staff::create([
            'nome' => 'Maria Silva',
            'cargo' => 'Diretora',
            'telefone' => '(11) 98888-8888',
            'email' => 'maria.silva@sae.com',
        ]);

        Staff::create([
            'nome' => 'João Souza',
            'cargo' => 'Coordenador',
            'telefone' => '(11) 97777-7777',
            'email' => 'joao.souza@sae.com',
        ]);

        Staff::create([
            'nome' => 'Ana Costa',
            'cargo' => 'Professora de Matemática',
            'telefone' => '(11) 96666-6666',
            'email' => 'ana.costa@sae.com',
        ]);

        $turma1 = Turma::create([
            'nome_turma' => '1º Ano A',
            'periodo' => 'Manhã',
            'ano' => 2026,
        ]);

        $turma2 = Turma::create([
            'nome_turma' => '2º Ano B',
            'periodo' => 'Tarde',
            'ano' => 2026,
        ]);

        $turma3 = Turma::create([
            'nome_turma' => '3º Ano C',
            'periodo' => 'Noite',
            'ano' => 2026,
        ]);

        $turma4 = Turma::create([
            'nome_turma' => '4º Ano D',
            'periodo' => 'Integral',
            'ano' => 2026,
        ]);

        Student::create([
            'nome' => 'Carlos Oliveira',
            'matricula' => 'ALU2026001',
            'turma_id' => $turma1->id,
            'data_nascimento' => '2015-04-12',
        ]);

        Student::create([
            'nome' => 'Mariana Santos',
            'matricula' => 'ALU2026002',
            'turma_id' => $turma1->id,
            'data_nascimento' => '2015-08-22',
        ]);

        Student::create([
            'nome' => 'Pedro Rocha',
            'matricula' => 'ALU2026003',
            'turma_id' => $turma2->id,
            'data_nascimento' => '2014-02-15',
        ]);

        Student::create([
            'nome' => 'Beatriz Lima',
            'matricula' => 'ALU2026004',
            'turma_id' => $turma3->id,
            'data_nascimento' => '2013-11-30',
        ]);

        Student::create([
            'nome' => 'Lucas Alencar',
            'matricula' => 'ALU2026005',
            'turma_id' => $turma4->id,
            'data_nascimento' => '2012-07-19',
        ]);
    }
}
