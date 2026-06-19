@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-xl py-12">
    <div class="mb-8 rounded-3xl bg-white/90 border border-slate-100 p-8 shadow-2xl shadow-slate-200/40">
        <div class="mb-6 text-center">
            <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-3xl bg-emerald-500 text-white text-3xl shadow-lg shadow-emerald-500/20">
                S
            </div>
            <h1 class="text-3xl font-bold text-slate-900">Registro de Acesso</h1>
            <p class="text-sm text-slate-500 mt-2">Crie sua conta para acessar o sistema sem o fluxo de login anterior.</p>
        </div>

        <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Nome Completo</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required
                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100 @error('name') border-rose-400 focus:ring-rose-100 @enderror"
                    placeholder="Ex: João da Silva">
                @error('name')
                <p class="mt-2 text-xs text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">E-mail</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100 @error('email') border-rose-400 focus:ring-rose-100 @enderror"
                    placeholder="Ex: joao@escola.com">
                @error('email')
                <p class="mt-2 text-xs text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Senha</label>
                    <input id="password" name="password" type="password" required
                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100 @error('password') border-rose-400 focus:ring-rose-100 @enderror"
                        placeholder="Mínimo 6 caracteres">
                    @error('password')
                    <p class="mt-2 text-xs text-rose-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Confirmar senha</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100"
                        placeholder="Repita a senha">
                </div>
            </div>

            <div class="flex flex-col gap-3 pt-2 border-t border-slate-100 sm:flex-row sm:items-center sm:justify-between">
                <span class="text-xs text-slate-500">Ao criar sua conta, você terá acesso ao painel e aos cadastros.</span>
                <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 hover:bg-indigo-500 transition-all">
                    Registrar conta
                </button>
            </div>
            <p class="mt-4 text-center text-sm text-slate-500">Já possui conta? <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Entrar</a></p>
        </form>
    </div>
</div>
@endsection
