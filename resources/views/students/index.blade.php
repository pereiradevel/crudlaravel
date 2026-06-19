@extends('layouts.app')

@yield('page_title', 'Gestão de Alunos')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h2 class="text-xl font-bold text-slate-800">Alunos Matriculados</h2>
        <p class="text-xs text-slate-400 mt-1">Veja todos os alunos cadastrados no sistema e suas respectivas turmas.</p>
    </div>
    <div>
        <a href="{{ route('students.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm shadow-md shadow-indigo-600/10 active:scale-[0.98] transition-all duration-200">
            <i class="bx bx-plus text-lg"></i>
            Novo Aluno
        </a>
    </div>
</div>

<!-- Students Table Card -->
<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Nome</th>
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Matrícula</th>
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Turma</th>
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Período</th>
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Data de Nascimento</th>
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400 text-right">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($students as $student)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-sm">
                                {{ strtoupper(substr($student->nome, 0, 2)) }}
                            </div>
                            <span class="text-sm font-semibold text-slate-700">{{ $student->nome }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-600 font-mono">{{ $student->matricula }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                            {{ $student->turma->nome_turma ?? 'Sem turma' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        @if($student->turma)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider
                            @if($student->turma->periodo === 'Manhã') bg-sky-50 text-sky-700 border border-sky-100
                            @elseif($student->turma->periodo === 'Tarde') bg-amber-50 text-amber-700 border border-amber-100
                            @elseif($student->turma->periodo === 'Noite') bg-purple-50 text-purple-700 border border-purple-100
                            @else bg-emerald-50 text-emerald-700 border border-emerald-100
                            @endif">
                            {{ $student->turma->periodo }}
                        </span>
                        @else
                        <span class="text-xs text-slate-400">Não Vinculado</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-500">{{ $student->data_nascimento->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <div class="inline-flex items-center gap-2">
                            <!-- Edit Button -->
                            <a href="{{ route('students.edit', $student->id) }}" class="p-1.5 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 transition-all duration-200" title="Editar Aluno">
                                <i class="bx bx-edit-alt text-lg"></i>
                            </a>

                            <!-- Delete Form (with confirmation) -->
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Você confirma a remoção permanente deste aluno do sistema? Esta ação não pode ser desfeita.');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-all duration-200" title="Excluir Aluno">
                                    <i class="bx bx-trash text-lg"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-sm text-slate-400">
                        Nenhum aluno cadastrado.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($students->hasPages())
    <div class="px-6 py-4 border-t border-slate-100">
        {{ $students->links() }}
    </div>
    @endif
</div>
@endsection
