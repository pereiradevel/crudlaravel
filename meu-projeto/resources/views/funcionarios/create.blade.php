<x-app-layout>

<div class="max-w-2xl space-y-8">
    <section class="rounded-3xl border border-white/10 bg-slate-950/80 p-8 shadow-2xl shadow-violet-500/10 backdrop-blur-xl">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-violet-300">Novo Funcionário</p>
            <h1 class="mt-2 text-3xl font-semibold text-white">Adicionar funcionário</h1>
            <p class="mt-2 text-slate-400">Registre um novo membro da equipe com seus dados.</p>
        </div>
    </section>

    <form action="{{ route('funcionarios.store') }}" method="POST" class="space-y-6">
        @csrf

        <section class="rounded-3xl border border-white/10 bg-slate-950/80 p-8 shadow-2xl shadow-violet-500/10 backdrop-blur-xl space-y-6">
            <div>
                <label class="block text-sm font-semibold text-violet-300 mb-3">Nome do Funcionário</label>
                <input type="text" name="nome" placeholder="Nome completo" value="{{ old('nome') }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition">
                @error('nome')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-violet-300 mb-3">Cargo</label>
                <input type="text" name="cargo" placeholder="Ex: Administrador" value="{{ old('cargo') }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition">
                @error('cargo')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-violet-300 mb-3">Email</label>
                <input type="email" name="email" placeholder="funcionario@email.com" value="{{ old('email') }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition">
                @error('email')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-violet-300 mb-3">Telefone</label>
                <input type="text" name="telefone" placeholder="(00) 00000-0000" value="{{ old('telefone') }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition">
                @error('telefone')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-1 rounded-full bg-violet-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-violet-500/20 transition hover:bg-violet-400">
                    Salvar Funcionário
                </button>
                <a href="{{ route('funcionarios.index') }}" class="flex-1 rounded-full border border-white/10 bg-slate-900/75 px-5 py-3 text-center text-sm font-semibold text-slate-200 transition hover:bg-slate-800">
                    Cancelar
                </a>
            </div>
        </section>
    </form>
</div>

</x-app-layout>