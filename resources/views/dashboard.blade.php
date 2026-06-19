@extends('layouts.app')

@section('content')
@php
    $currentUser = auth()->user();
@endphp
<div class="mb-8 p-6 bg-gradient-to-r from-navy-500 to-indigo-950 rounded-2xl text-white shadow-md shadow-navy-100 relative overflow-hidden">
    <div class="absolute -top-12 -right-12 w-48 h-48 rounded-full bg-emerald-500/10 blur-2xl"></div>
    <div class="relative z-10">
        <h2 class="text-2xl font-bold">Olá, {{ $currentUser ? $currentUser->name : 'visitante' }}!</h2>
        <p class="text-sm text-slate-300 mt-1.5">Acompanhe as principais informações da sua instituição de ensino de forma simples e rápida.</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <a href="{{ route('students.index') }}" class="block hover-lift bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between group">
        <div>
            <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Total de Alunos</span>
            <span class="block text-3xl font-bold text-slate-800 mt-2">{{ $students_count }}</span>
            <span class="inline-flex items-center text-xs text-indigo-500 font-medium mt-3 group-hover:underline">
                Visualizar Alunos <i class="bx bx-chevron-right text-sm ml-0.5"></i>
            </span>
        </div>
        <div class="w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-3xl transition-colors group-hover:bg-indigo-600 group-hover:text-white">
            <i class="bx bxs-user-detail"></i>
        </div>
    </a>

    <a href="{{ route('turmas.index') }}" class="block hover-lift bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between group">
        <div>
            <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Total de Turmas</span>
            <span class="block text-3xl font-bold text-slate-800 mt-2">{{ $turmas_count }}</span>
            <span class="inline-flex items-center text-xs text-emerald-500 font-medium mt-3 group-hover:underline">
                Gerenciar Turmas <i class="bx bx-chevron-right text-sm ml-0.5"></i>
            </span>
        </div>
        <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-3xl transition-colors group-hover:bg-emerald-500 group-hover:text-white">
            <i class="bx bxs-graduation"></i>
        </div>
    </a>

    <a href="{{ route('staff.index') }}" class="block hover-lift bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between group">
        <div>
            <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Equipe Escolar</span>
            <span class="block text-3xl font-bold text-slate-800 mt-2">{{ $staff_count }}</span>
            <span class="inline-flex items-center text-xs text-amber-500 font-medium mt-3 group-hover:underline">
                Ver Equipe <i class="bx bx-chevron-right text-sm ml-0.5"></i>
            </span>
        </div>
        <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-3xl transition-colors group-hover:bg-amber-500 group-hover:text-white">
            <i class="bx bxs-briefcase"></i>
        </div>
    </a>

    <a href="{{ route('users.index') }}" class="block hover-lift bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between group">
        <div>
            <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Contas de Usuários</span>
            <span class="block text-3xl font-bold text-slate-800 mt-2">{{ $users_count }}</span>
            <span class="inline-flex items-center text-xs text-slate-500 font-medium mt-3 group-hover:underline">
                Gerenciar Contas <i class="bx bx-chevron-right text-sm ml-0.5"></i>
            </span>
        </div>
        <div class="w-14 h-14 rounded-2xl bg-slate-50 text-slate-600 flex items-center justify-center text-3xl transition-colors group-hover:bg-slate-700 group-hover:text-white">
            <i class="bx bxs-user-account"></i>
        </div>
    </a>

</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm lg:col-span-2">
        <h3 class="text-base font-bold text-slate-800 mb-5 flex items-center gap-2">
            <i class="bx bx-rocket text-indigo-500 text-xl"></i>
            Ações Rápidas
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            
            <a href="{{ route('students.create') }}" class="p-4 rounded-xl border border-slate-100 hover:bg-slate-50 transition-colors flex items-center gap-3">
                <span class="w-9 h-9 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center text-lg">
                    <i class="bx bx-user-plus"></i>
                </span>
                <div>
                    <span class="block text-sm font-semibold text-slate-700">Matricular Aluno</span>
                    <span class="text-[11px] text-slate-400">Registrar novo aluno e associar à turma</span>
                </div>
            </a>

            <a href="{{ route('turmas.create') }}" class="p-4 rounded-xl border border-slate-100 hover:bg-slate-50 transition-colors flex items-center gap-3">
                <span class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg">
                    <i class="bx bx-folder-plus"></i>
                </span>
                <div>
                    <span class="block text-sm font-semibold text-slate-700">Criar Nova Turma</span>
                    <span class="text-[11px] text-slate-400">Registrar nova turma e período de aula</span>
                </div>
            </a>

            <a href="{{ route('staff.create') }}" class="p-4 rounded-xl border border-slate-100 hover:bg-slate-50 transition-colors flex items-center gap-3">
                <span class="w-9 h-9 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center text-lg">
                    <i class="bx bx-plus-circle"></i>
                </span>
                <div>
                    <span class="block text-sm font-semibold text-slate-700">Adicionar Funcionário</span>
                    <span class="text-[11px] text-slate-400">Cadastrar professores ou coordenadores</span>
                </div>
            </a>

            <a href="{{ route('users.create') }}" class="p-4 rounded-xl border border-slate-100 hover:bg-slate-50 transition-colors flex items-center gap-3">
                <span class="w-9 h-9 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center text-lg">
                    <i class="bx bx-shield-plus"></i>
                </span>
                <div>
                    <span class="block text-sm font-semibold text-slate-700">Cadastrar Gestor</span>
                    <span class="text-[11px] text-slate-400">Liberar acesso administrativo para outra pessoa</span>
                </div>
            </a>

        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <h3 class="text-base font-bold text-slate-800 mb-5 flex items-center gap-2">
            <i class="bx bx-shield-quarter text-emerald-500 text-xl"></i>
            Suas Informações
        </h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between py-2 border-b border-slate-50">
                <span class="text-xs text-slate-400 font-medium">Nome</span>
                <span class="text-sm font-semibold text-slate-700">{{ $currentUser ? $currentUser->name : 'Visitante' }}</span>
            </div>
            <div class="flex items-center justify-between py-2 border-b border-slate-50">
                <span class="text-xs text-slate-400 font-medium">E-mail</span>
                <span class="text-sm font-medium text-slate-700">{{ $currentUser ? $currentUser->email : 'Não autenticado' }}</span>
            </div>
            <div class="flex items-center justify-between py-2 border-b border-slate-50">
                <span class="text-xs text-slate-400 font-medium">Nível de Acesso</span>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider {{ $currentUser ? ($currentUser->role === 'owner' ? 'bg-indigo-50 text-indigo-700 border border-indigo-100' : ($currentUser->role === 'admin' ? 'bg-emerald-50 text-emerald-700 border border-emerald-100' : 'bg-slate-100 text-slate-600')) : 'bg-slate-100 text-slate-600' }}">
                    {{ $currentUser ? ($currentUser->role === 'owner' ? 'Dono' : ($currentUser->role === 'admin' ? 'Admin' : 'Comum')) : 'Público' }}
                </span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="text-xs text-slate-400 font-medium">Acesso em</span>
                <span class="text-xs font-semibold text-slate-500">{{ now()->format('d/m/Y H:i') }}</span>
            </div>
        </div>
    </div>

<div class="mt-8 rounded-2xl border border-slate-100 bg-slate-50 p-6 text-slate-700 shadow-sm">
    <p class="text-base font-semibold">Olá, {{ $currentUser->name }}!</p>
    <p class="text-sm text-slate-500 mt-1">Você está logado e pode acessar o painel completo.</p>
</div>
</div>
@endsection
