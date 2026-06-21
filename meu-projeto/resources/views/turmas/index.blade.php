<x-app-layout>

<div class="space-y-8">
    <section class="rounded-3xl border border-white/10 bg-slate-950/80 p-8 shadow-2xl shadow-cyan-500/10 backdrop-blur-xl transition-all">
        <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div class="min-w-0">
                <p class="text-sm uppercase tracking-[0.35em] text-cyan-300 truncate">Turmas</p>
                <h1 class="mt-2 text-3xl font-semibold text-white truncate">Gerencie turmas</h1>
                <p class="mt-2 text-slate-400">Atualize horários, descrições e mantenha as turmas organizadas com facilidade.</p>
            </div>
            <a href="{{ route('turmas.create') }}" class="inline-flex items-center justify-center rounded-full bg-cyan-500 px-5 py-3 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:bg-cyan-400">
                + Nova Turma
            </a>
        </div>

        @if(session('success'))
            <div class="rounded-3xl border border-emerald-500/20 bg-emerald-500/10 p-4 text-emerald-200 shadow-inner shadow-emerald-500/10 mt-6">
                {{ session('success') }}
            </div>
        @endif
    </section>

    <section class="rounded-3xl border border-white/10 bg-slate-900/85 p-0 shadow-2xl shadow-slate-950/20 backdrop-blur-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-slate-200 border-collapse border-spacing-0">
                <thead class="bg-slate-950/90 text-slate-300">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold rounded-tl-3xl">Nome</th>
                        <th class="px-6 py-4 text-left font-semibold">Descrição</th>
                        <th class="px-6 py-4 text-center font-semibold rounded-tr-3xl">Ações</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-800/60 bg-slate-900/40">
                    @foreach($turmas as $turma)
                    <tr class="hover:bg-slate-950/50 transition">
                        <td class="px-6 py-4 font-medium text-white">{{ $turma->nome }}</td>
                        <td class="px-6 py-4 text-slate-300">{{ $turma->descricao }}</td>

                        <td class="px-6 py-4 text-center">
                            <div class="inline-flex flex-wrap items-center justify-center gap-2">
                                <a href="{{ route('turmas.show', $turma->id) }}" class="rounded-full border border-white/10 bg-emerald-500/90 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-emerald-400">Ver</a>
                                <a href="{{ route('turmas.edit', $turma->id) }}" class="rounded-full border border-white/10 bg-amber-500/90 px-3 py-1.5 text-xs font-semibold text-slate-950 transition hover:bg-amber-400">Editar</a>
                                <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-full border border-white/10 bg-rose-500/90 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-rose-400">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>

</x-app-layout>