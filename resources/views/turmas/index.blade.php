@extends('layouts.app')

@yield('page_title', 'Gestão de Turmas')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h2 class="text-xl font-bold text-slate-800">Turmas Escolares</h2>
        <p class="text-xs text-slate-400 mt-1">Visualize e gerencie as turmas e veja os alunos matriculados em cada uma.</p>
    </div>
    @if(in_array(auth()->user()->role, ['owner', 'admin']))
    <div>
        <a href="{{ route('turmas.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm shadow-md shadow-indigo-600/10 active:scale-[0.98] transition-all duration-200">
            <i class="bx bx-plus text-lg"></i>
            Nova Turma
        </a>
    </div>
    @endif
</div>

<!-- Turmas Table Card -->
<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                    <th class="w-12 px-6 py-4"></th>
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Nome da Turma</th>
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Período</th>
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Ano Letivo</th>
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400">Alunos Matriculados</th>
                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-400 text-right font-medium">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($turmas as $turma)
                <!-- Main Row -->
                <tr class="hover:bg-slate-50/30 transition-colors">
                    <!-- Expand/Collapse Button Column -->
                    <td class="px-6 py-4 text-center">
                        <button onclick="toggleStudents({{ $turma->id }})" class="p-1.5 rounded-lg text-slate-500 hover:text-indigo-600 hover:bg-slate-100 transition-all duration-200" title="Ver Alunos">
                            <i id="icon-{{ $turma->id }}" class="bx bx-chevron-down text-xl align-middle"></i>
                        </button>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-sm">
                                {{ strtoupper(substr($turma->nome_turma, 0, 2)) }}
                            </div>
                            <span class="text-sm font-semibold text-slate-700">{{ $turma->nome_turma }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $turma->periodo === 'Matutino' ? 'bg-sky-50 text-sky-700 border border-sky-100' : 'bg-amber-50 text-amber-700 border border-amber-100' }}">
                            {{ $turma->periodo }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-600">{{ $turma->ano }}</td>
                    <td class="px-6 py-4 text-sm text-slate-500">
                        <span class="font-bold text-slate-700">{{ $turma->students->count() }}</span> alunos
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="inline-flex items-center gap-2">
                            <!-- Toggle View Alunos -->
                            <button onclick="toggleStudents({{ $turma->id }})" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-indigo-50 text-indigo-600 hover:bg-indigo-100 transition-colors flex items-center gap-1">
                                <i class="bx bx-group text-sm"></i> Alunos
                            </button>

                            @if(in_array(auth()->user()->role, ['owner', 'admin']))
                            <!-- Edit -->
                            <a href="{{ route('turmas.edit', $turma->id) }}" class="p-1.5 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 transition-all duration-200" title="Editar Turma">
                                <i class="bx bx-edit-alt text-lg"></i>
                            </a>

                            <!-- Delete -->
                            <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" onsubmit="return confirm('ATENÇÃO: Ao excluir esta turma, todos os alunos vinculados a ela também serão excluídos. Deseja prosseguir?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-all duration-200" title="Excluir Turma">
                                    <i class="bx bx-trash text-lg"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>

                <!-- Collapsible Row for Students -->
                <tr id="students-row-{{ $turma->id }}" class="hidden bg-slate-50/50">
                    <td colspan="6" class="px-10 py-6 border-t border-b border-slate-100 shadow-inner">
                        <div class="p-4 bg-white rounded-xl border border-slate-100 shadow-sm max-w-4xl">
                            <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 flex items-center gap-1.5">
                                <i class="bx bx-group text-emerald-500 text-base"></i>
                                Alunos da Turma: <span class="text-slate-700 font-bold ml-1">{{ $turma->nome_turma }}</span>
                            </h4>

                            @if($turma->students->count() > 0)
                            <div class="overflow-hidden rounded-lg border border-slate-100">
                                <table class="w-full text-left text-xs border-collapse">
                                    <thead>
                                        <tr class="bg-slate-50 border-b border-slate-100">
                                            <th class="px-4 py-3 font-semibold text-slate-400">Nome do Aluno</th>
                                            <th class="px-4 py-3 font-semibold text-slate-400">Matrícula</th>
                                            <th class="px-4 py-3 font-semibold text-slate-400">Data de Nascimento</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-50">
                                        @foreach($turma->students as $student)
                                        <tr>
                                            <td class="px-4 py-3 font-semibold text-slate-700">{{ $student->nome }}</td>
                                            <td class="px-4 py-3 text-slate-600 font-mono">{{ $student->matricula }}</td>
                                            <td class="px-4 py-3 text-slate-500">{{ $student->data_nascimento->format('d/m/Y') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div class="flex items-center gap-2 p-4 rounded-lg bg-slate-50 border border-slate-100 text-slate-400 text-sm">
                                <i class="bx bx-info-circle text-lg text-slate-400"></i>
                                <span>Nenhum aluno matriculado nesta turma até o momento.</span>
                            </div>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-sm text-slate-400">
                        Nenhuma turma cadastrada.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($turmas->hasPages())
    <div class="px-6 py-4 border-t border-slate-100">
        {{ $turmas->links() }}
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    function toggleStudents(turmaId) {
        const row = document.getElementById('students-row-' + turmaId);
        const icon = document.getElementById('icon-' + turmaId);
        
        if (row.classList.contains('hidden')) {
            // Expand with smooth collapse transition if possible
            row.classList.remove('hidden');
            icon.classList.remove('bx-chevron-down');
            icon.classList.add('bx-chevron-up');
        } else {
            // Collapse
            row.classList.add('hidden');
            icon.classList.remove('bx-chevron-up');
            icon.classList.add('bx-chevron-down');
        }
    }
</script>
@endsection
