@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div x-data="{ modalAlunos: false, modalCriar: false, modalEditar: false, alunosTurma: [], nomeTurma: '', editTurmaId: null, editNome: '', editPeriodo: '' }">
    <header class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-slate-900">Visão Geral Escolar</h1>
            <p class="text-sm text-slate-500 mt-1">Gerenciamento em tempo real da unidade: <span class="text-indigo-600 font-semibold">{{ Auth::user()->escola?->nome ?? 'Administração Central' }}</span></p>
        </div>
        @if(Auth::user()->escola)
        <div class="bg-indigo-50 border border-indigo-100 px-4 py-2 rounded-xl text-xs text-indigo-700 font-medium self-start sm:self-center">Validade do Plano: <span class="font-bold text-indigo-900">{{ \Carbon\Carbon::parse(Auth::user()->escola->plano_expira_em)->format('d/m/Y') }}</span></div>
        @endif
    </header>

    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200/60 flex items-center justify-between">
            <div>
                <span class="text-sm font-medium text-slate-400 block">Alunos Matriculados</span>
                <span class="text-3xl font-bold text-slate-900 mt-1 block">1.248</span>
            </div>
            <div class="bg-blue-50 text-xl p-3.5 rounded-xl">🎒</div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200/60 flex items-center justify-between">
            <div>
                <span class="text-sm font-medium text-slate-400 block">Turmas Cadastradas</span>
                <span class="text-3xl font-bold text-slate-900 mt-1 block">{{ $turmas->count() }}</span>
            </div>
            <div class="bg-emerald-50 text-xl p-3.5 rounded-xl">🏫</div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200/60 flex items-center justify-between">
            <div>
                <span class="text-sm font-medium text-slate-400 block">Corpo de Funcionários</span>
                <span class="text-3xl font-bold text-slate-900 mt-1 block">86</span>
            </div>
            <div class="bg-amber-50 text-xl p-3.5 rounded-xl">💼</div>
        </div>
    </section>

    <section class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center">
            <div>
                <h3 class="font-bold text-lg text-slate-900">Turmas Vigentes</h3>
                <p class="text-xs text-slate-400">Listagem de salas e controle de alunos por período.</p>
            </div>
            <button @click="modalCriar = true" class="bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 rounded-xl text-sm font-medium transition shadow-sm">+ Nova Turma</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 text-slate-400 text-xs font-semibold uppercase border-b border-slate-100">
                        <th class="p-4 pl-6">Identificação da Turma</th>
                        <th class="p-4">Período Letivo</th>
                        <th class="p-4">Alunos Ativos</th>
                        <th class="p-4 pr-6 text-right">Ações de Controle</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($turmas as $turma)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="p-4 pl-6 font-semibold text-slate-900">{{ $turma->nome }}</td>
                        <td class="p-4 text-slate-600"><span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $turma->periodo === 'Matutino' ? 'bg-amber-50 text-amber-700 border border-amber-100' : '' }} {{ $turma->periodo === 'Vespertino' ? 'bg-orange-50 text-orange-700 border border-orange-100' : '' }} {{ $turma->periodo === 'Noturno' ? 'bg-slate-100 text-slate-700 border border-slate-200' : '' }}">{{ $turma->periodo }}</span></td>
                        <td class="p-4 text-slate-500 font-medium">{{ $turma->alunos_count }} matriculados</td>
                        <td class="p-4 pr-6 flex items-center justify-end gap-2">
                            <button @click="fetch('/turmas/{{ $turma->id }}/alunos').then(res => res.json()).then(data => { nomeTurma = data.nome_turma; alunosTurma = data.alunos; modalAlunos = true; })" class="text-indigo-600 hover:text-indigo-900 font-semibold text-xs bg-indigo-50 hover:bg-indigo-100/80 px-3 py-2 rounded-xl transition">👁️ Ver Alunos</button>
                            <button @click="fetch('/turmas/{{ $turma->id}').then(res => res.json()).then(data => { editTurmaId = data.id; editNome = data.nome; editPeriodo = data.periodo; modalEditar = true; })" class="text-slate-700 bg-slate-50 px-3 py-2 rounded-xl text-xs">✏️ Editar</button>
                            <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" onsubmit="return confirm('ATENÇÃO: Você deseja excluir permanentemente a turma {{ $turma->nome }}?')">@csrf @method('DELETE')<button type="submit" class="text-red-600 hover:text-red-800 font-medium text-xs bg-red-50 hover:bg-red-100 px-3 py-2 rounded-xl transition">Excluir</button></form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-12 text-center text-sm text-slate-400 font-medium">Nenhuma turma encontrada. Clique em "+ Nova Turma" para iniciar a organização escolar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center z-50 p-4" x-show="modalAlunos" x-transition x-cloak>
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden border border-slate-100" @click.outside="modalAlunos = false">
            <div class="p-6 bg-slate-950 text-white flex justify-between items-center">
                <div>
                    <h3 class="font-bold text-lg">Alunos Matriculados</h3>
                    <p class="text-xs text-slate-400 mt-0.5" x-text="'Classe: ' + nomeTurma"></p>
                </div>
                <button @click="modalAlunos = false" class="text-slate-400 hover:text-white font-medium text-base">✕</button>
            </div>
            <div class="p-6 max-h-80 overflow-y-auto divide-y divide-slate-100">
                <template x-for="(aluno, index) in alunosTurma" :key="index">
                    <div class="py-3 flex items-center gap-3"><div class="w-7 h-7 bg-indigo-50 rounded-full flex items-center justify-center text-xs font-bold text-indigo-600" x-text="index + 1"></div><p class="text-sm font-semibold text-slate-700" x-text="aluno"></p></div>
                </template>
                <div x-show="alunosTurma.length === 0" class="text-center py-6 text-sm text-slate-400">Nenhum aluno associado a esta turma até o momento.</div>
            </div>
            <div class="p-4 bg-slate-50 border-t border-slate-100 text-right"><button @click="modalAlunos = false" class="bg-slate-900 hover:bg-slate-800 text-white text-xs px-4 py-2 rounded-xl transition font-semibold">Fechar</button></div>
        </div>
    </div>

    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center z-50 p-4" x-show="modalCriar" x-transition x-cloak>
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden border border-slate-100" @click.outside="modalCriar = false">
            <div class="p-6 bg-indigo-950 text-white flex justify-between items-center"><h3 class="font-bold text-lg">Nova Estrutura de Turma</h3><button @click="modalCriar = false" class="text-indigo-300 hover:text-white font-medium">✕</button></div>
            <form action="{{ route('turmas.store') }}" method="POST" class="p-6 space-y-4">@csrf
                <div><label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider">Nome Comercial / Identificador</label><input type="text" name="nome" required placeholder="Ex: 1º Ano B - Fundamental II" class="mt-1.5 block w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition"></div>
                <div><label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider">Período Operacional</label><select name="periodo" required class="mt-1.5 block w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition"><option value="Matutino">Matutino (Manhã)</option><option value="Vespertino">Vespertino (Tarde)</option><option value="Noturno">Noturno (Noite)</option></select></div>
                <div class="pt-2 flex justify-end gap-2 border-t border-slate-100 mt-4"><button type="button" @click="modalCriar = false" class="px-4 py-2 text-xs font-semibold text-slate-500 hover:bg-slate-100 rounded-xl transition">Cancelar</button><button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white text-xs px-4 py-2 rounded-xl transition font-semibold shadow-md shadow-indigo-600/10">Efetivar Cadastro</button></div>
            </form>
        </div>
    </div>

    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center z-50 p-4" x-show="modalEditar" x-transition x-cloak>
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden border border-slate-100" @click.outside="modalEditar = false">
            <div class="p-6 bg-indigo-950 text-white flex justify-between items-center"><h3 class="font-bold text-lg">Editar Turma</h3><button @click="modalEditar = false" class="text-indigo-300 hover:text-white font-medium">✕</button></div>
            <form x-bind:action="'/turmas/' + editTurmaId" method="POST" class="p-6 space-y-4">@csrf
                <input type="hidden" name="_method" value="PUT">
                <div><label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider">Nome Comercial / Identificador</label><input x-model="editNome" type="text" name="nome" required class="mt-1.5 block w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition"></div>
                <div><label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider">Período Operacional</label><select x-model="editPeriodo" name="periodo" required class="mt-1.5 block w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition"><option value="Matutino">Matutino (Manhã)</option><option value="Vespertino">Vespertino (Tarde)</option><option value="Noturno">Noturno (Noite)</option></select></div>
                <div class="pt-2 flex justify-end gap-2 border-t border-slate-100 mt-4"><button type="button" @click="modalEditar = false" class="px-4 py-2 text-xs font-semibold text-slate-500 hover:bg-slate-100 rounded-xl transition">Cancelar</button><button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white text-xs px-4 py-2 rounded-xl transition font-semibold shadow-md shadow-indigo-600/10">Salvar Alterações</button></div>
            </form>
        </div>
    </div>
</div>
@endsection