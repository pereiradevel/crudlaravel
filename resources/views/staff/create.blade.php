@extends('layouts.app')

@yield('page_title', 'Cadastrar Funcionário')

@section('content')
<div class="mb-6 flex items-center gap-3">
    <a href="{{ route('staff.index') }}" class="p-2 rounded-xl text-slate-500 hover:text-slate-700 hover:bg-slate-100 transition-colors">
        <i class="bx bx-left-arrow-alt text-2xl"></i>
    </a>
    <div>
        <h2 class="text-xl font-bold text-slate-800">Novo Integrante da Equipe</h2>
        <p class="text-xs text-slate-400 mt-1">Insira os dados do funcionário para cadastrá-lo no SAE.</p>
    </div>
</div>

<div class="max-w-2xl bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <form action="{{ route('staff.store') }}" method="POST" class="p-8 space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Nome -->
            <div class="sm:col-span-2">
                <label for="nome" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Nome Completo</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm @error('nome') border-rose-400 focus:ring-rose-400/20 @enderror"
                    placeholder="Ex: Ana Maria Silva">
                @error('nome')
                <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1"><i class="bx bxs-error-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Cargo -->
            <div>
                <label for="cargo" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Cargo</label>
                <input type="text" name="cargo" id="cargo" value="{{ old('cargo') }}" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm @error('cargo') border-rose-400 focus:ring-rose-400/20 @enderror"
                    placeholder="Ex: Coordenador, Professor">
                @error('cargo')
                <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1"><i class="bx bxs-error-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Telefone -->
            <div>
                <label for="telefone" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Telefone (Opcional)</label>
                <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}"
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm"
                    placeholder="Ex: (11) 98888-8888">
            </div>

            <!-- Email -->
            <div class="sm:col-span-2">
                <label for="email" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">E-mail de Contato</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm @error('email') border-rose-400 focus:ring-rose-400/20 @enderror"
                    placeholder="Ex: ana.silva@sae.com">
                @error('email')
                <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1"><i class="bx bxs-error-circle"></i> {{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
            <a href="{{ route('staff.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-50 active:scale-[0.98] transition-all duration-200">
                Cancelar
            </a>
            <button type="submit" class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm shadow-md shadow-indigo-600/10 active:scale-[0.98] transition-all duration-200">
                Salvar Funcionário
            </button>
        </div>
    </form>
</div>
@endsection
