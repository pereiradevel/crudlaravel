@extends('layouts.app')

@section('content')
<div class="mb-6 flex items-center gap-3">
    <a href="{{ route('users.index') }}" class="p-2 rounded-xl text-slate-500 hover:text-slate-700 hover:bg-slate-100 transition-colors">
        <i class="bx bx-left-arrow-alt text-2xl"></i>
    </a>
    <div>
        <h2 class="text-xl font-bold text-slate-800">Novo Usuário Administrativo</h2>
        <p class="text-xs text-slate-400 mt-1">Crie um novo login para acessar o sistema administrativo.</p>
    </div>
</div>

<div class="max-w-2xl bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <form action="{{ route('users.store') }}" method="POST" class="p-8 space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="sm:col-span-2">
                <label for="name" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Nome Completo</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm @error('name') border-rose-400 focus:ring-rose-400/20 @enderror"
                    placeholder="Ex: João da Silva">
                @error('name')
                <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1"><i class="bx bxs-error-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="email" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Endereço de E-mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm @error('email') border-rose-400 focus:ring-rose-400/20 @enderror"
                    placeholder="Ex: joao@sae.com">
                @error('email')
                <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1"><i class="bx bxs-error-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="role" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Nível de Acesso</label>
                <select name="role" id="role" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm @error('role') border-rose-400 focus:ring-rose-400/20 @enderror">
                    <option value="" disabled selected>Selecione um nível de acesso</option>
                    <option value="owner" {{ old('role') === 'owner' ? 'selected' : '' }}>Gestor Dono (Acesso total)</option>
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrador (Gerencia Cadastros)</option>
                    <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>Comum (Apenas leitura)</option>
                </select>
                @error('role')
                <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1"><i class="bx bxs-error-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Senha</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm @error('password') border-rose-400 focus:ring-rose-400/20 @enderror"
                    placeholder="Mínimo 6 caracteres">
                @error('password')
                <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1"><i class="bx bxs-error-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Confirmar Senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm"
                    placeholder="Repita a senha">
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
            <a href="{{ route('users.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-50 active:scale-[0.98] transition-all duration-200">
                Cancelar
            </a>
            <button type="submit" class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm shadow-md shadow-indigo-600/10 active:scale-[0.98] transition-all duration-200">
                Salvar Usuário
            </button>
        </div>
    </form>
</div>
@endsection
