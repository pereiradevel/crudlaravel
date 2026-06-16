<!DOCTYPE html>
<html lang="pt-BR" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'SAE — Gestão Escolar Inteligente') }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        navy: {
                            50: '#f4f5f8',
                            100: '#e9ebf0',
                            200: '#c7ccd9',
                            300: '#a5adc3',
                            400: '#626f96',
                            500: '#1f3169',
                            600: '#1c2c5f',
                            700: '#17254f',
                            800: '#131e3f',
                            900: '#0f1833',
                            950: '#0a1022',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .hover-lift {
            transition: all 0.2s ease-in-out;
        }
        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px -6px rgba(99, 102, 241, 0.12);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.25);
        }

        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body class="h-full text-slate-800 antialiased flex">

    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 flex flex-col w-64 bg-navy-900 text-white shadow-xl">
        <div class="flex items-center justify-between h-20 px-6 border-b border-navy-800">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 font-semibold text-lg tracking-wider">
                <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-emerald-500 text-navy-950 font-bold text-xl shadow-md shadow-emerald-500/20">
                    S
                </div>
                <span class="font-bold">SAE <span class="text-emerald-400 font-normal">Escolar</span></span>
            </a>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-300 hover:bg-navy-800 hover:text-white' }}">
                <i class="bx bxs-dashboard text-xl"></i>
                <span class="font-medium text-sm">Painel Principal</span>
            </a>

            @if(auth()->user()->role === 'owner')
            <a href="{{ route('users.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('users.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-300 hover:bg-navy-800 hover:text-white' }}">
                <i class="bx bxs-user-account text-xl"></i>
                <span class="font-medium text-sm">Controle de Usuários</span>
            </a>
            @endif

            <a href="{{ route('staff.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('staff.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-300 hover:bg-navy-800 hover:text-white' }}">
                <i class="bx bxs-briefcase text-xl"></i>
                <span class="font-medium text-sm">Equipe Escolar</span>
            </a>

            <a href="{{ route('turmas.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('turmas.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-300 hover:bg-navy-800 hover:text-white' }}">
                <i class="bx bxs-graduation text-xl"></i>
                <span class="font-medium text-sm">Turmas</span>
            </a>

            <a href="{{ route('students.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('students.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-300 hover:bg-navy-800 hover:text-white' }}">
                <i class="bx bxs-user-detail text-xl"></i>
                <span class="font-medium text-sm">Alunos</span>
            </a>
        </nav>

        <div class="p-4 border-t border-navy-800 bg-navy-950/40">
            <div class="flex items-center gap-3 px-3 py-2">
                <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-navy-800 text-indigo-400 font-bold border border-navy-700">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                </div>
                <div class="flex-1 overflow-hidden">
                    <p class="text-sm font-semibold truncate">{{ auth()->user()->name }}</p>
                    <span class="text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded-full bg-navy-800 text-indigo-300 inline-block border border-navy-700">
                        {{ auth()->user()->role === 'owner' ? 'Gestor Dono' : (auth()->user()->role === 'admin' ? 'Administrador' : 'Leitor Comum') }}
                    </span>
                </div>
            </div>
            
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="flex items-center justify-center w-full gap-2 px-4 py-2.5 text-sm font-medium text-rose-400 hover:text-white hover:bg-rose-500 rounded-xl transition-all duration-200">
                    <i class="bx bx-log-out text-lg"></i>
                    <span>Sair do Sistema</span>
                </button>
            </form>
        </div>
    </aside>

    <div id="main-content" class="flex-1 flex flex-col min-h-screen ml-64 transition-all duration-300">
        <header class="flex items-center justify-between h-20 px-8 bg-white border-b border-slate-100 shadow-sm shadow-slate-100/40">
            <div class="flex items-center gap-4">
                <h1 class="text-xl font-bold text-slate-800">@yield('page_title', 'Painel')</h1>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-xs text-slate-400 font-medium hidden sm:inline-block">
                    <i class="bx bx-calendar align-middle text-sm mr-1"></i>
                    {{ now()->translatedFormat('d \d\e F \d\e Y') }}
                </span>
                <div class="h-8 w-[1px] bg-slate-200 hidden sm:block"></div>
                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100 flex items-center gap-1.5 shadow-sm">
                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                    Conexão Segura
                </span>
            </div>
        </header>

        <main class="flex-1 p-8 overflow-y-auto">
            @if(session('success'))
            <div class="mb-6 flex items-center justify-between p-4 rounded-xl border border-emerald-100 bg-emerald-50/70 text-emerald-800 shadow-sm">
                <div class="flex items-center gap-3">
                    <i class="bx bxs-check-circle text-xl text-emerald-500"></i>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            </div>
            @endif

            @if(session('error'))
            <div class="mb-6 flex items-center justify-between p-4 rounded-xl border border-rose-100 bg-rose-50/70 text-rose-800 shadow-sm">
                <div class="flex items-center gap-3">
                    <i class="bx bxs-error-circle text-xl text-rose-500"></i>
                    <span class="text-sm font-medium">{{ session('error') }}</span>
                </div>
            </div>
            @endif

            @if(session('info'))
            <div class="mb-6 flex items-center justify-between p-4 rounded-xl border border-blue-100 bg-blue-50/70 text-blue-800 shadow-sm">
                <div class="flex items-center gap-3">
                    <i class="bx bxs-info-circle text-xl text-blue-500"></i>
                    <span class="text-sm font-medium">{{ session('info') }}</span>
                </div>
            </div>
            @endif

            @yield('content')
        </main>
        
        <footer class="py-4 px-8 text-center text-xs text-slate-400 bg-white border-t border-slate-100">
            SAE Escolar — Gestão Inteligente e Simplificada. Todos os direitos reservados.
        </footer>
    </div>
</body>
</html>
