<x-app-layout>

<div class="space-y-8">
    <section class="rounded-3xl border border-white/10 bg-slate-950/80 p-8 shadow-2xl shadow-fuchsia-500/10 backdrop-blur-xl">
        <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold uppercase tracking-[0.35em] text-fuchsia-400">Painel Escolar</p>
                <h1 class="mt-4 text-3xl font-semibold tracking-tight text-white sm:text-4xl">Controle moderno de alunos, turmas e colaboradores</h1>
                <p class="mt-4 max-w-2xl text-slate-300">Resumo visual com indicadores dinâmicos e navegação imediata para as principais áreas do sistema.</p>
            </div>

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                <div class="animate-card rounded-[1.75rem] border border-white/10 bg-slate-900/75 p-5 shadow-xl shadow-fuchsia-500/10 backdrop-blur-xl">
                    <p class="text-sm uppercase tracking-[0.28em] text-slate-400">Alun.</p>
                    <p class="mt-6 text-4xl font-semibold text-white"><span data-counter-target="{{ $alunos }}">0</span></p>
                </div>

                <div class="animate-card rounded-[1.75rem] border border-white/10 bg-slate-900/75 p-5 shadow-xl shadow-cyan-500/10 backdrop-blur-xl">
                    <p class="text-sm uppercase tracking-[0.28em] text-slate-400">Turm.</p>
                    <p class="mt-6 text-4xl font-semibold text-white"><span data-counter-target="{{ $turmas }}">0</span></p>
                </div>

                <div class="animate-card rounded-[1.75rem] border border-white/10 bg-slate-900/75 p-5 shadow-xl shadow-violet-500/10 backdrop-blur-xl">
                    <p class="text-sm uppercase tracking-[0.28em] text-slate-400">Funci.</p>
                    <p class="mt-6 text-4xl font-semibold text-white"><span data-counter-target="{{ $funcionarios }}">0</span></p>
                </div>

                <div class="animate-card rounded-[1.75rem] border border-white/10 bg-slate-900/75 p-5 shadow-xl shadow-pink-500/10 backdrop-blur-xl">
                    <p class="text-sm uppercase tracking-[0.28em] text-slate-400">Usua.</p>
                    <p class="mt-6 text-4xl font-semibold text-white"><span data-counter-target="{{ $users }}">0</span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <a href="{{ route('alunos.index') }}" class="group rounded-3xl border border-white/10 bg-gradient-to-br from-fuchsia-500/80 via-violet-500/25 to-slate-900/70 p-6 text-white shadow-2xl shadow-fuchsia-500/15 transition hover:-translate-y-1 hover:bg-fuchsia-500/90">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-slate-200/80">Gerenciar</p>
                    <h2 class="mt-3 text-xl font-semibold">Alunos</h2>
                </div>
                <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-white/10 text-2xl">👨‍🎓</div>
            </div>
            <p class="mt-4 text-sm text-slate-200/80">Veja lista, cadastro e detalhes dos alunos.</p>
        </a>

        <a href="{{ route('turmas.index') }}" class="group rounded-3xl border border-white/10 bg-gradient-to-br from-cyan-500/80 via-emerald-500/20 to-slate-900/70 p-6 text-white shadow-2xl shadow-cyan-500/15 transition hover:-translate-y-1 hover:bg-cyan-500/90">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-slate-200/80">Gerenciar</p>
                    <h2 class="mt-3 text-xl font-semibold">Turmas</h2>
                </div>
                <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-white/10 text-2xl">🏫</div>
            </div>
            <p class="mt-4 text-sm text-slate-200/80">Controle a distribuição e horários das turmas.</p>
        </a>

        <a href="{{ route('funcionarios.index') }}" class="group rounded-3xl border border-white/10 bg-gradient-to-br from-violet-500/80 via-purple-500/25 to-slate-900/70 p-6 text-white shadow-2xl shadow-violet-500/15 transition hover:-translate-y-1 hover:bg-violet-500/90">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-slate-200/80">Gerenciar</p>
                    <h2 class="mt-3 text-xl font-semibold">Funcionários</h2>
                </div>
                <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-white/10 text-2xl">👨‍💼</div>
            </div>
            <p class="mt-4 text-sm text-slate-200/80">Acesse dados e atualize perfis de colaboradores.</p>
        </a>

        <a href="{{ route('users.index') }}" class="group rounded-3xl border border-white/10 bg-gradient-to-br from-pink-500/80 via-rose-500/25 to-slate-900/70 p-6 text-white shadow-2xl shadow-pink-500/15 transition hover:-translate-y-1 hover:bg-pink-500/90">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-slate-200/80">Gerenciar</p>
                    <h2 class="mt-3 text-xl font-semibold">Usuários</h2>
                </div>
                <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-white/10 text-2xl">👤</div>
            </div>
            <p class="mt-4 text-sm text-slate-200/80">Administre contas de acesso e permissões.</p>
        </a>
    </section>
</div>

</x-app-layout>