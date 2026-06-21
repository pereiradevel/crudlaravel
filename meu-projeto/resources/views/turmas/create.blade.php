<x-app-layout>

<div class="max-w-2xl space-y-8">
    <section class="rounded-3xl border border-white/10 bg-slate-950/80 p-8 shadow-2xl shadow-cyan-500/10 backdrop-blur-xl">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-cyan-300">Nova Turma</p>
            <h1 class="mt-2 text-3xl font-semibold text-white">Criar turma</h1>
            <p class="mt-2 text-slate-400">Adicione uma nova turma ao sistema com nome e descrição.</p>
        </div>
    </section>

    <form action="{{ route('turmas.store') }}" method="POST" class="space-y-6">
        @csrf

        <section class="rounded-3xl border border-white/10 bg-slate-950/80 p-8 shadow-2xl shadow-cyan-500/10 backdrop-blur-xl space-y-6">
            <div>
                <label class="block text-sm font-semibold text-cyan-300 mb-3">Nome da Turma</label>
                <input type="text" name="nome" placeholder="Ex: Turma A1" value="{{ old('nome') }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition">
                @error('nome')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-cyan-300 mb-3">Descrição</label>
                <textarea name="descricao" placeholder="Descreva a turma..." rows="5" class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/20 transition">{{ old('descricao') }}</textarea>
                @error('descricao')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-1 rounded-full bg-cyan-500 px-5 py-3 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:bg-cyan-400">
                    Salvar Turma
                </button>
                <a href="{{ route('turmas.index') }}" class="flex-1 rounded-full border border-white/10 bg-slate-900/75 px-5 py-3 text-center text-sm font-semibold text-slate-200 transition hover:bg-slate-800">
                    Cancelar
                </a>
            </div>
        </section>
    </form>
</div>

</x-app-layout>