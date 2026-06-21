<x-app-layout>

<div class="max-w-2xl space-y-8">
    <section class="rounded-3xl border border-white/10 bg-slate-950/80 p-8 shadow-2xl shadow-fuchsia-500/10 backdrop-blur-xl">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-fuchsia-400">Editar Aluno</p>
            <h1 class="mt-2 text-3xl font-semibold text-white">Atualizar informações</h1>
            <p class="mt-2 text-slate-400">Modifique os dados do aluno e salve as mudanças.</p>
        </div>
    </section>

    <form action="{{ route('alunos.update', $aluno->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <section class="rounded-3xl border border-white/10 bg-slate-950/80 p-8 shadow-2xl shadow-fuchsia-500/10 backdrop-blur-xl space-y-6">
            <div>
                <label class="block text-sm font-semibold text-fuchsia-300 mb-3">Nome do Aluno</label>
                <input type="text" name="nome" value="{{ $aluno->nome }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition">
                @error('nome')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-fuchsia-300 mb-3">Email</label>
                <input type="email" name="email" value="{{ $aluno->email }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition">
                @error('email')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-fuchsia-300 mb-3">Telefone</label>
                <input type="text" name="telefone" value="{{ $aluno->telefone }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition">
                @error('telefone')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-fuchsia-300 mb-3">Data de Nascimento</label>
                <input type="date" name="data_nascimento" value="{{ $aluno->data_nascimento }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition">
                @error('data_nascimento')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-fuchsia-300 mb-3">Turma</label>
                <select name="turma_id" class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white focus:border-fuchsia-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-400/20 transition">
                    @foreach($turmas as $turma)
                        <option value="{{ $turma->id }}" {{ $aluno->turma_id == $turma->id ? 'selected' : '' }}>{{ $turma->nome }}</option>
                    @endforeach
                </select>
                @error('turma_id')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-1 rounded-full bg-fuchsia-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-fuchsia-500/20 transition hover:bg-fuchsia-400">
                    Atualizar Aluno
                </button>
                <a href="{{ route('alunos.index') }}" class="flex-1 rounded-full border border-white/10 bg-slate-900/75 px-5 py-3 text-center text-sm font-semibold text-slate-200 transition hover:bg-slate-800">
                    Cancelar
                </a>
            </div>
        </section>
    </form>
</div>

</x-app-layout>