@extends('layouts.app')

@section('title', 'Usuários')

@section('content')
<div class="max-w-5xl mx-auto p-6" x-data="{ modalCriar:false, modalEditar:false, editId:null, editName:'', editEmail:'', editNivel:'admin' }">
    @if(session('sucesso'))<div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded text-sm text-emerald-700">{{ session('sucesso') }}</div>@endif
    <div class="flex items-center justify-between mb-4"><h1 class="text-2xl font-bold">Usuários</h1><button @click="modalCriar=true" class="bg-indigo-600 text-white px-4 py-2 rounded">+ Novo Usuário</button></div>
    <div class="bg-white rounded-lg shadow p-4">
        <table class="w-full text-left text-sm">
            <thead class="text-slate-500 text-xs uppercase font-semibold"><tr><th class="p-3">Nome</th><th>E-mail</th><th>Nível</th><th class="text-right">Ações</th></tr></thead>
            <tbody class="divide-y">@forelse($usuarios as $u)<tr><td class="p-3 font-medium">{{ $u->name }}</td><td>{{ $u->email }}</td><td>{{ $u->nivel_acesso }}</td><td class="p-3 text-right"><button @click="fetch('/usuarios/{{ $u->id }}').then(res=>res.json()).then(data=>{ editId = data.id; editName = data.name; editEmail = data.email; editNivel = data.nivel_acesso; modalEditar = true; })" class="text-slate-700 mr-3">✏️ Editar</button><form method="POST" action="{{ route('usuarios.destroy', $u->id) }}" class="inline">@csrf @method('DELETE')<button class="text-red-600">Excluir</button></form></td></tr>@empty<tr><td colspan="4" class="p-6 text-center text-slate-400">Nenhum usuário.</td></tr>@endforelse</tbody>
        </table>
    </div>

    <div x-show="modalCriar" x-cloak class="fixed inset-0 bg-slate-900/40 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg w-full max-w-md p-6">
            <h3 class="font-bold mb-4">Novo Usuário</h3>
            <form method="POST" action="{{ route('usuarios.store') }}">@csrf<div class="mb-3"><label class="block text-sm">Nome</label><input name="name" required class="w-full p-2 border rounded"></div><div class="mb-3"><label class="block text-sm">E-mail</label><input name="email" required class="w-full p-2 border rounded"></div><div class="mb-3"><label class="block text-sm">Senha</label><input name="password" required class="w-full p-2 border rounded" type="password"></div><div class="mb-3"><label class="block text-sm">Nível</label><select name="nivel_acesso" class="w-full p-2 border rounded"><option value="admin">Admin</option><option value="funcionario">Funcionário</option></select></div><div class="flex justify-end gap-2"><button type="button" @click="modalCriar=false" class="px-3 py-2">Cancelar</button><button type="submit" class="bg-indigo-600 text-white px-3 py-2 rounded">Salvar</button></div></form>
        </div>
    </div>

    <div x-show="modalEditar" x-cloak class="fixed inset-0 bg-slate-900/40 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg w-full max-w-md p-6">
            <h3 class="font-bold mb-4">Editar Usuário</h3>
            <form x-bind:action="'/usuarios/' + editId" method="POST">@csrf<input type="hidden" name="_method" value="PUT"><div class="mb-3"><label class="block text-sm">Nome</label><input x-model="editName" name="name" required class="w-full p-2 border rounded"></div><div class="mb-3"><label class="block text-sm">E-mail</label><input x-model="editEmail" name="email" required class="w-full p-2 border rounded"></div><div class="mb-3"><label class="block text-sm">Nível</label><select x-model="editNivel" name="nivel_acesso" class="w-full p-2 border rounded"><option value="admin">Admin</option><option value="funcionario">Funcionário</option></select></div><div class="flex justify-end gap-2"><button type="button" @click="modalEditar=false" class="px-3 py-2">Cancelar</button><button type="submit" class="bg-indigo-600 text-white px-3 py-2 rounded">Salvar</button></div></form>
        </div>
    </div>
</div>
@endsection
