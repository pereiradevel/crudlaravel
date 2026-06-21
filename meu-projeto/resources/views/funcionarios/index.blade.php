<x-app-layout>

<div class="space-y-8">
    <section class="rounded-3xl border border-white/10 bg-slate-950/80 p-8 shadow-2xl shadow-violet-500/10 backdrop-blur-xl transition-all">
        <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div class="min-w-0">
                <p class="text-sm uppercase tracking-[0.35em] text-violet-300 truncate">Funcionários</p>
                <h1 class="mt-2 text-3xl font-semibold text-white truncate">Gerencie o time</h1>
                <p class="mt-2 text-slate-400">Administre funcionários, cargos e informações de contato.</p>
            </div>
            <a href="{{ route('funcionarios.create') }}" class="inline-flex items-center justify-center rounded-full bg-violet-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-violet-500/20 transition hover:bg-violet-400">
                + Novo Funcionário
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
            <table class="min-w-full border-collapse border-spacing-0 text-sm text-slate-200">
                <thead class="bg-slate-950/90 text-slate-300">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold rounded-tl-3xl">Nome</th>
                        <th class="px-6 py-4 text-left font-semibold">Cargo</th>
                        <th class="px-6 py-4 text-left font-semibold">Email</th>
                        <th class="px-6 py-4 text-center font-semibold rounded-tr-3xl">Ações</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-800/60 bg-slate-900/40">
                    @foreach($funcionarios as $funcionario)
                    <tr class="hover:bg-slate-950/50 transition">
                        <td class="px-6 py-4 font-medium text-white">{{ $funcionario->nome }}</td>
                        <td class="px-6 py-4 text-slate-300">{{ $funcionario->cargo }}</td>
                        <td class="px-6 py-4 text-slate-300">{{ $funcionario->email }}</td>

                        <td class="px-6 py-4 text-center">
                            <div class="inline-flex flex-wrap items-center justify-center gap-2">
                                <a href="{{ route('funcionarios.show', $funcionario->id) }}" class="rounded-full border border-white/10 bg-emerald-500/90 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-emerald-400">Ver</a>
                                <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="rounded-full border border-white/10 bg-amber-500/90 px-3 py-1.5 text-xs font-semibold text-slate-950 transition hover:bg-amber-400">Editar</a>
                                <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')" class="inline-block">
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