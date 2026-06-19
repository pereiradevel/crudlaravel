@extends('layouts.app')

@yield('page_title', 'Editar Turma')

@section('content')
<div class="mb-6 flex items-center gap-3">
    <a href="{{ route('turmas.index') }}" class="p-2 rounded-xl text-slate-500 hover:text-slate-700 hover:bg-slate-100 transition-colors">
        <i class="bx bx-left-arrow-alt text-2xl"></i>
    </a>
    <div>
        <h2 class="text-xl font-bold text-slate-800">Editar Turma: {{ $turma->nome_turma }}</h2>
        <p class="text-xs text-slate-400 mt-1">Atualize as informações de identificação ou turno da turma.</p>
    </div>
</div>

<div class="max-w-2xl bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <form action="{{ route('turmas.update', $turma->id) }}" method="POST" class="p-8 space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Nome da Turma -->
            <div class="sm:col-span-2">
                <label for="nome_turma" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Nome da Turma</label>
                <input type="text" name="nome_turma" id="nome_turma" value="{{ old('nome_turma', $turma->nome_turma) }}" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm @error('nome_turma') border-rose-400 focus:ring-rose-400/20 @enderror"
                    placeholder="Ex: 3º Ano Ensino Médio A, 5ª Série B">
                @error('nome_turma')
                <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1"><i class="bx bxs-error-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Período -->
            <div>
                <label for="periodo" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Período / Turno</label>
                <select name="periodo" id="periodo" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm @error('periodo') border-rose-400 focus:ring-rose-400/20 @enderror">
                    <option value="Manhã" {{ old('periodo', $turma->periodo) === 'Manhã' ? 'selected' : '' }}>Manhã</option>
                    <option value="Tarde" {{ old('periodo', $turma->periodo) === 'Tarde' ? 'selected' : '' }}>Tarde</option>
                    <option value="Noite" {{ old('periodo', $turma->periodo) === 'Noite' ? 'selected' : '' }}>Noite</option>
                    <option value="Integral" {{ old('periodo', $turma->periodo) === 'Integral' ? 'selected' : '' }}>Integral</option>
                </select>
                @error('periodo')
                <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1"><i class="bx bxs-error-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Ano -->
            <div>
                <label for="ano" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Ano Letivo</label>
                <input type="number" name="ano" id="ano" value="{{ old('ano', $turma->ano) }}" min="2000" max="2100" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm @error('ano') border-rose-400 focus:ring-rose-400/20 @enderror"
                    placeholder="Ex: 2026">
                @error('ano')
                <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1"><i class="bx bxs-error-circle"></i> {{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
            <a href="{{ route('turmas.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-50 active:scale-[0.98] transition-all duration-200">
                Cancelar
            </a>
            <button type="submit" class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm shadow-md shadow-indigo-600/10 active:scale-[0.98] transition-all duration-200">
                Atualizar Turma
            </button>
        </div>
    </form>
</div>
@endsection
