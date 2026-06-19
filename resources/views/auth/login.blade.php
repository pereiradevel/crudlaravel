@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-xl py-12">
    <div class="mb-8 rounded-3xl bg-white/90 border border-slate-100 p-8 shadow-2xl shadow-slate-200/40">
        <div class="mb-6 text-center">
            <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-3xl bg-indigo-600 text-white text-3xl shadow-lg shadow-indigo-500/20">
                <i class="bx bx-lock-open"></i>
            </div>
            <h1 class="text-3xl font-bold text-slate-900">Entrar no Sistema</h1>
            <p class="text-sm text-slate-500 mt-2">Use seu e-mail e senha para acessar o dashboard.</p>
        </div>

        <form action="{{ route('login.attempt') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">E-mail</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100 @error('email') border-rose-400 focus:ring-rose-100 @enderror"
                    placeholder="Ex: joao@escola.com">
                @error('email')
                <p class="mt-2 text-xs text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Senha</label>
                <input id="password" name="password" type="password" required
                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100 @error('password') border-rose-400 focus:ring-rose-100 @enderror"
                    placeholder="Sua senha">
                @error('password')
                <p class="mt-2 text-xs text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-3 pt-2 border-t border-slate-100 sm:flex-row sm:items-center sm:justify-between">
                <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 hover:bg-indigo-500 transition-all">
                    Entrar
                </button>
                <a href="{{ route('register') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">Não tem conta? Registre-se</a>
            </div>
        </form>
    </div>
</div>
@endsection
