<x-app-layout>

<div class="max-w-2xl space-y-8">
    <section class="rounded-3xl border border-white/10 bg-slate-950/80 p-8 shadow-2xl shadow-pink-500/10 backdrop-blur-xl">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-pink-300">Novo Usuário</p>
            <h1 class="mt-2 text-3xl font-semibold text-white">Criar conta</h1>
            <p class="mt-2 text-slate-400">Registre um novo usuário no sistema.</p>
        </div>
    </section>

    <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
        @csrf

        <section class="rounded-3xl border border-white/10 bg-slate-950/80 p-8 shadow-2xl shadow-pink-500/10 backdrop-blur-xl space-y-6">
            <div>
                <label class="block text-sm font-semibold text-pink-300 mb-3">Nome do Usuário</label>
                <input type="text" name="name" placeholder="Nome completo" value="{{ old('name') }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-pink-400 focus:outline-none focus:ring-2 focus:ring-pink-400/20 transition">
                @error('name')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-pink-300 mb-3">Email</label>
                <input type="email" name="email" placeholder="usuario@email.com" value="{{ old('email') }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-pink-400 focus:outline-none focus:ring-2 focus:ring-pink-400/20 transition">
                @error('email')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-pink-300 mb-3">Senha</label>
                <input type="password" name="password" placeholder="••••••••" value="{{ old('password') }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-pink-400 focus:outline-none focus:ring-2 focus:ring-pink-400/20 transition">
                @error('password')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-pink-300 mb-3">Confirmar Senha</label>
                <input type="password" name="password_confirmation" placeholder="••••••••" value="{{ old('password_confirmation') }}"
                       class="w-full rounded-3xl border border-white/10 bg-slate-900/75 px-5 py-3 text-white placeholder-slate-500 focus:border-pink-400 focus:outline-none focus:ring-2 focus:ring-pink-400/20 transition">
                @error('password_confirmation')
                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-1 rounded-full bg-pink-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-pink-500/20 transition hover:bg-pink-400">
                    Criar Usuário
                </button>
                <a href="{{ route('users.index') }}" class="flex-1 rounded-full border border-white/10 bg-slate-900/75 px-5 py-3 text-center text-sm font-semibold text-slate-200 transition hover:bg-slate-800">
                    Cancelar
                </a>
            </div>
        </section>
    </form>
</div>

</x-app-layout>