<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SAE System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>[x-cloak]{display:none!important}</style>
    @stack('styles')
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">
    <div class="flex h-screen overflow-hidden">
        <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between p-6 z-20">
            <div>
                <div class="flex items-center gap-3 px-2 mb-8">
                    <div class="bg-indigo-600 p-2 rounded-xl text-white font-black text-xl shadow-md shadow-indigo-600/20">S</div>
                    <span class="font-bold text-lg text-white tracking-wide">SAE System</span>
                </div>
                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-indigo-600 text-white font-medium transition shadow-lg shadow-indigo-600/10">📊 Dashboard</a>
                    @can('admin')
                    <div class="pt-4 pb-2 text-xs font-semibold uppercase tracking-wider text-slate-500 px-4">Gestão Escolar</div>
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl bg-slate-800 text-slate-100 font-medium transition">🏫 Turmas</a>
                    <a href="{{ route('alunos.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-slate-800 hover:text-slate-100 transition">🎒 Alunos</a>
                    <a href="{{ route('funcionarios.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-slate-800 hover:text-slate-100 transition">💼 Funcionários</a>
                    <a href="{{ route('usuarios.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-slate-800 hover:text-slate-100 transition">🔑 Usuários</a>
                    @endcan
                </nav>
            </div>
            <div class="border-t border-slate-800 pt-4 flex items-center justify-between">
                <div class="max-w-[150px]">
                    <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-slate-500 capitalize truncate">{{ Auth::user()->cargo ?? Auth::user()->nivel_acesso }}</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" title="Sair do sistema" class="p-2 hover:bg-slate-800 rounded-lg text-slate-400 hover:text-red-400 transition font-bold text-sm">✕</button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto p-8 lg:p-12">
            @if(session('sucesso'))
                <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-xl text-sm text-emerald-700 font-medium shadow-sm transition">✨ {{ session('sucesso') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>
