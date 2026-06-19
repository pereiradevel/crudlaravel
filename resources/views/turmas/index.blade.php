@extends('layouts.app')

@yield('page_title', 'Gestão de Turmas')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h2 class="text-xl font-bold text-slate-800">Turmas Escolares</h2>
        <p class="text-xs text-slate-400 mt-1">Gerencie os turnos e visualize a lista de alunos matriculados de forma simples e direta.</p>
    </div>
    <div>
        <a href="{{ route('turmas.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm shadow-md shadow-indigo-600/10 active:scale-[0.98] transition-all duration-200">
            <i class="bx bx-plus text-lg"></i>
            Nova Turma
        </a>
    </div>
</div>

<!-- Grid de Cards de Turmas -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    @forelse($turmas as $turma)
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between hover-lift relative overflow-hidden">
        <div>
            <!-- Cabeçalho do Card -->
            <div class="flex items-start justify-between gap-2 mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-base shadow-sm">
                        {{ strtoupper(substr($turma->nome_turma, 0, 2)) }}
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-800">{{ $turma->nome_turma }}</h3>
                        <span class="text-[10px] text-slate-400">Ano Letivo: {{ $turma->ano }}</span>
                    </div>
                </div>
                
                <!-- Badge de Período -->
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider
                    @if($turma->periodo === 'Manhã') bg-sky-50 text-sky-700 border border-sky-100
                    @elseif($turma->periodo === 'Tarde') bg-amber-50 text-amber-700 border border-amber-100
                    @elseif($turma->periodo === 'Noite') bg-purple-50 text-purple-700 border border-purple-100
                    @else bg-emerald-50 text-emerald-700 border border-emerald-100
                    @endif">
                    {{ $turma->periodo }}
                </span>
            </div>

            <!-- Listagem Expansível de Alunos (Apenas HTML/Tailwind) -->
            <details class="group mt-4 border-t border-slate-100 pt-4">
                <summary class="flex items-center justify-between w-full text-xs font-semibold text-slate-500 hover:text-indigo-600 cursor-pointer list-none select-none outline-none transition-all duration-200">
                    <span class="flex items-center gap-2">
                        <i class="bx bx-group text-base text-slate-400 group-open:text-indigo-500"></i>
                        <span>Alunos Matriculados ({{ $turma->students->count() }})</span>
                    </span>
                    <i class="bx bx-chevron-down text-lg transition-transform duration-300 group-open:rotate-180"></i>
                </summary>
                
                <div class="mt-3 space-y-2 max-h-60 overflow-y-auto pr-1">
                    @forelse($turma->students as $student)
                    <div class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 border border-slate-100/50 hover:bg-slate-100/50 transition-colors">
                        <div>
                            <p class="text-xs font-semibold text-slate-700">{{ $student->nome }}</p>
                            <p class="text-[10px] font-mono text-slate-400">Matrícula: {{ $student->matricula }}</p>
                        </div>
                        <span class="text-[10px] text-slate-400">Nasc: {{ $student->data_nascimento->format('d/m/Y') }}</span>
                    </div>
                    @empty
                    <p class="text-xs text-slate-400 italic py-2 text-center">Nenhum aluno matriculado nesta turma.</p>
                    @endforelse
                </div>
            </details>
        </div>

        <!-- Rodapé do Card com Ações -->
        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-end gap-2">
            <!-- Editar -->
            <a href="{{ route('turmas.edit', $turma->id) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold bg-indigo-50 text-indigo-600 hover:bg-indigo-100 transition-colors" title="Editar Turma">
                <i class="bx bx-edit-alt text-sm"></i>
                Editar
            </a>

            <!-- Excluir -->
            <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" onsubmit="return confirm('ATENÇÃO: Ao excluir esta turma, todos os alunos vinculados a ela também serão excluídos permanentemente do sistema. Deseja prosseguir com a exclusão?');" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold bg-rose-50 text-rose-600 hover:bg-rose-100 transition-colors" title="Excluir Turma">
                    <i class="bx bx-trash text-sm"></i>
                    Excluir
                </button>
            </form>
        </div>
    </div>
    @empty
    <div class="col-span-full bg-white rounded-2xl border border-slate-100 p-8 text-center text-sm text-slate-400">
        Nenhuma turma cadastrada no sistema.
    </div>
    @endforelse
</div>

@if($turmas->hasPages())
<div class="bg-white rounded-2xl border border-slate-100 p-4 shadow-sm">
    {{ $turmas->links() }}
</div>
@endif

@endsection
