@extends('layouts.app')

@section('title', 'Alunos')

@section('content')
<div class="max-w-6xl mx-auto p-6" x-data="{ modalCriar:false, modalEditar:false, editAlunoId:null, editNome:'', editTurmaId:null }">
    @if(session('sucesso'))<div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded text-sm text-emerald-700">{{ session('sucesso') }}</div>@endif
    <div class="flex items-center justify-between mb-4"><h1 class="text-2xl font-bold">Alunos</h1><button @click="modalCriar = true" class="bg-indigo-600 text-white px-4 py-2 rounded">+ Novo Aluno</button></div>
    <div class="bg-white rounded-lg shadow p-4">
        <table class="w-full text-left text-sm">
            <thead class="text-slate-500 text-xs uppercase font-semibold"><tr><th class="p-3">Nome</th><th>Turma</th><th class="text-right">Ações</th></tr></thead>
            <tbody class="divide-y">@forelse($alunos as $a)<tr><td class="p-3 font-medium">{{ $a->nome }}</td><td>{{ $a->turma->nome }}</td><td class="p-3 text-right"><button @click="fetch('/alunos/{{ $a->id }}').then(res=>res.json()).then(data=>{ editAlunoId = data.id; editNome = data.nome; editTurmaId = data.turma_id; modalEditar = true; })" class="text-slate-700 mr-3">✏️ Editar</button><form method="POST" action="{{ route('alunos.destroy', $a->id) }}" class="inline">@csrf @method('DELETE')<button class="text-red-600">Excluir</button></form></td></tr>@empty<tr><td colspan="3" class="p-6 text-center text-slate-400">Nenhum aluno encontrado.</td></tr>@endforelse</tbody>
        </table>
    </div>

    <div x-show="modalCriar" x-cloak class="fixed inset-0 bg-slate-900/40 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg w-full max-w-md p-6">
            <h3 class="font-bold mb-4">Cadastrar Aluno</h3>
            <form method="POST" action="{{ route('alunos.store') }}">@csrf<div class="mb-3"><label class="block text-sm">Nome</label><input name="nome" required class="w-full p-2 border rounded"></div><div class="mb-3"><label class="block text-sm">Turma</label><select name="turma_id" class="w-full p-2 border rounded">@foreach($turmas as $t)<option value="{{ $t->id }}">{{ $t->nome }}</option>@endforeach</select></div><div class="flex justify-end gap-2"><button type="button" @click="modalCriar=false" class="px-3 py-2">Cancelar</button><button type="submit" class="bg-indigo-600 text-white px-3 py-2 rounded">Salvar</button></div></form>
        </div>
    </div>

    <div x-show="modalEditar" x-cloak class="fixed inset-0 bg-slate-900/40 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg w-full max-w-md p-6">
            <h3 class="font-bold mb-4">Editar Aluno</h3>
            <form x-bind:action="'/alunos/' + editAlunoId" method="POST">@csrf<input type="hidden" name="_method" value="PUT"><div class="mb-3"><label class="block text-sm">Nome</label><input x-model="editNome" name="nome" required class="w-full p-2 border rounded"></div><div class="mb-3"><label class="block text-sm">Turma</label><select x-model="editTurmaId" name="turma_id" class="w-full p-2 border rounded">@foreach($turmas as $t)<option value="{{ $t->id }}">{{ $t->nome }}</option>@endforeach</select></div><div class="flex justify-end gap-2"><button type="button" @click="modalEditar=false" class="px-3 py-2">Cancelar</button><button type="submit" class="bg-indigo-600 text-white px-3 py-2 rounded">Salvar</button></div></form>
        </div>
    </div>
</div>
@endsection
