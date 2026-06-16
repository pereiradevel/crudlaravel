@extends('layouts.app')

@yield('page_title', 'Gestão de Funcionários')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h2 class="text-xl font-bold text-slate-800">Funcionários Cadastrados</h2>
        <p class="text-xs text-slate-400 mt-1">Veja e gerencie a equipe de professores, diretores e coordenadores escolares.</p>
    </div>
    @if(in_array(auth()->user()->role, ['owner', 'admin']))
    <div>
        <a href="{{ route('staff.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm shadow-md shadow-indigo-600/10 active:scale-[0.98] transition-all duration-200">
            <i class="bx bx-plus text-lg"></i>
            Novo Funcionário
        </a>
    </div>
    @endif
</div>

<!-- Staff Table Card -->
<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Nome</th>
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Cargo</th>
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">E-mail</th>
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Telefone</th>
                    @if(in_array(auth()->user()->role, ['owner', 'admin']))
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400 text-right">Ações</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($staff as $member)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-sm">
                                {{ strtoupper(substr($member->nome, 0, 2)) }}
                            </div>
                            <span class="text-sm font-semibold text-slate-700">{{ $member->nome }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 text-slate-700">
                            {{ $member->cargo }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-600">{{ $member->email }}</td>
                    <td class="px-6 py-4 text-sm text-slate-500">{{ $member->telefone ?? 'Não informado' }}</td>
                    @if(in_array(auth()->user()->role, ['owner', 'admin']))
                    <td class="px-6 py-4 text-right">
                        <div class="inline-flex items-center gap-2">
                            <!-- Edit Button -->
                            <a href="{{ route('staff.edit', $member->id) }}" class="p-1.5 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 transition-all duration-200" title="Editar Funcionário">
                                <i class="bx bx-edit-alt text-lg"></i>
                            </a>

                            <!-- Delete Form (with confirmation) -->
                            <form action="{{ route('staff.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover este funcionário permanentemente?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-all duration-200" title="Excluir Funcionário">
                                    <i class="bx bx-trash text-lg"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="{{ in_array(auth()->user()->role, ['owner', 'admin']) ? 5 : 4 }}" class="px-6 py-8 text-center text-sm text-slate-400">
                        Nenhum funcionário cadastrado.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($staff->hasPages())
    <div class="px-6 py-4 border-t border-slate-100">
        {{ $staff->links() }}
    </div>
    @endif
</div>
@endsection
