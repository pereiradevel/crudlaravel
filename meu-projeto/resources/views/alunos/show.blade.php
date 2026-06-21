<x-app-layout>

<div class="space-y-8">
    <section class="rounded-3xl border border-white/10 bg-slate-950/80 p-8 shadow-2xl shadow-fuchsia-500/10 backdrop-blur-xl">
        <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.35em] text-fuchsia-400">Detalhes</p>
                <h1 class="mt-2 text-3xl font-semibold text-white">{{ $aluno->nome }}</h1>
                <p class="mt-2 text-slate-400">Informações completas do aluno</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('alunos.edit', $aluno->id) }}" class="inline-flex items-center justify-center rounded-full bg-amber-500 px-5 py-3 text-sm font-semibold text-slate-950 shadow-lg shadow-amber-500/20 transition hover:bg-amber-400">
                    Editar
                </a>
                <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este aluno?')" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-full bg-rose-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-rose-500/20 transition hover:bg-rose-400">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    </section>

    <section class="rounded-3xl border border-white/10 bg-slate-950/80 p-8 shadow-2xl shadow-fuchsia-500/10 backdrop-blur-xl space-y-6">
        <div>
            <p class="text-sm font-semibold text-fuchsia-300 mb-2">Nome</p>
            <p class="text-lg text-white">{{ $aluno->nome }}</p>
        </div>

        <div class="border-t border-white/10 pt-6">
            <p class="text-sm font-semibold text-fuchsia-300 mb-2">Email</p>
            <p class="text-base text-slate-300">{{ $aluno->email }}</p>
        </div>

        <div class="border-t border-white/10 pt-6">
            <p class="text-sm font-semibold text-fuchsia-300 mb-2">Telefone</p>
            <p class="text-base text-slate-300">{{ $aluno->telefone }}</p>
        </div>

        <div class="border-t border-white/10 pt-6">
            <p class="text-sm font-semibold text-fuchsia-300 mb-2">Data de Nascimento</p>
            <p class="text-base text-slate-300">{{ $aluno->data_nascimento }}</p>
        </div>

        <div class="border-t border-white/10 pt-6">
            <p class="text-sm font-semibold text-fuchsia-300 mb-2">Turma</p>
            <p class="text-base text-slate-300">{{ $aluno->turma->nome ?? '-' }}</p>
        </div>
    </section>

    <a href="{{ route('alunos.index') }}" class="inline-flex items-center justify-center rounded-full border border-white/10 bg-slate-900/75 px-5 py-3 text-sm font-semibold text-slate-200 transition hover:bg-slate-800">
        ← Voltar à lista
    </a>
</div>

</x-app-layout>