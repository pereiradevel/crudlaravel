@extends('layouts.app')

@yield('page_title', 'Editar Aluno')

@section('content')
<div class="mb-6 flex items-center gap-3">
    <a href="{{ route('students.index') }}" class="p-2 rounded-xl text-slate-500 hover:text-slate-700 hover:bg-slate-100 transition-colors">
        <i class="bx bx-left-arrow-alt text-2xl"></i>
    </a>
    <div>
        <h2 class="text-xl font-bold text-slate-800">Editar Aluno: {{ $student->nome }}</h2>
        <p class="text-xs text-slate-400 mt-1">Atualize os dados cadastrais ou mude a turma vinculada do aluno.</p>
    </div>
</div>

<div class="max-w-2xl bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <form action="{{ route('students.update', $student->id) }}" method="POST" class="p-8 space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Nome -->
            <div class="sm:col-span-2">
                <label for="nome" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Nome Completo</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $student->nome) }}" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm @error('nome') border-rose-400 focus:ring-rose-400/20 @enderror"
                    placeholder="Ex: Carlos de Oliveira Santos">
                @error('nome')
                <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1"><i class="bx bxs-error-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Matrícula -->
            <div>
                <label for="matricula" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Código de Matrícula</label>
                <input type="text" name="matricula" id="matricula" value="{{ old('matricula', $student->matricula) }}" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm @error('matricula') border-rose-400 focus:ring-rose-400/20 @enderror"
                    placeholder="Ex: ALU2026102">
                @error('matricula')
                <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1"><i class="bx bxs-error-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Data de Nascimento -->
            <div>
                <label for="data_nascimento" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Data de Nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento', $student->data_nascimento->format('Y-m-d')) }}" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm @error('data_nascimento') border-rose-400 focus:ring-rose-400/20 @enderror">
                @error('data_nascimento')
                <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1"><i class="bx bxs-error-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Turma (Dropdown) -->
            <div class="sm:col-span-2">
                <label for="turma_id" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Turma Vinculada</label>
                <select name="turma_id" id="turma_id" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-600/20 focus:border-indigo-600 transition-all text-sm @error('turma_id') border-rose-400 focus:ring-rose-400/20 @enderror">
                    @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}" {{ old('turma_id', $student->turma_id) == $turma->id ? 'selected' : '' }}>
                        {{ $turma->nome_turma }} ({{ $turma->periodo }} - {{ $turma->ano }})
                    </option>
                    @endforeach
                </select>
                @error('turma_id')
                <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1"><i class="bx bxs-error-circle"></i> {{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
            <a href="{{ route('students.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-50 active:scale-[0.98] transition-all duration-200">
                Cancelar
            </a>
            <button type="submit" class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm shadow-md shadow-indigo-600/10 active:scale-[0.98] transition-all duration-200">
                Atualizar Aluno
            </button>
        </div>
    </form>
</div>
@endsection
