<x-app-layout>

<div class="max-w-2xl space-y-8">
    <section class="rounded-3xl border border-white/10 bg-slate-950/80 p-8 shadow-2xl shadow-violet-500/10 backdrop-blur-xl">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-violet-300">Editar Funcionário</p>
            <h1 class="mt-2 text-3xl font-semibold text-white">Atualizar informações</h1>
            <p class="mt-2 text-slate-400">Modifique os dados do funcionário e salve as mudanças.</p>
        </div>
    </section>

    <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <section class="rounded-3xl border border-white/10 bg-slate-950/80 p-8 shadow-2xl shadow-violet-500/10 backdrop-blur-xl space-y-6">
            <div>
                <label class="block text-sm font-semibold text-violet-300 mb-3">Nome do Funcionário</label>
                <input type="text" name="nome" value="{{ $funcionario->nome }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition">
                @error('nome')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-violet-300 mb-3">Cargo</label>
                <input type="text" name="cargo" value="{{ $funcionario->cargo }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition">
                @error('cargo')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-violet-300 mb-3">Email</label>
                <input type="email" name="email" value="{{ $funcionario->email }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition">
                @error('email')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-violet-300 mb-3">Telefone</label>
                <input type="text" name="telefone" value="{{ $funcionario->telefone }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/20 transition">
                @error('telefone')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-1 rounded-full bg-violet-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-violet-500/20 transition hover:bg-violet-400">
                    Atualizar Funcionário
                </button>
                <a href="{{ route('funcionarios.index') }}" class="flex-1 rounded-full border border-white/10 bg-slate-900/75 px-5 py-3 text-center text-sm font-semibold text-slate-200 transition hover:bg-slate-800">
                    Cancelar
                </a>
            </div>
        </section>
    </form>
</div>

</x-app-layout>