<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAE - Painel do Proprietário</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-950 font-sans antialiased text-slate-100" x-data="{ modalEscola: false }">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-slate-900 text-slate-400 flex flex-col justify-between p-6 border-r border-slate-800">
            <div>
                <div class="flex items-center gap-3 px-2 mb-8">
                    <div class="bg-emerald-500 p-2 rounded-xl text-slate-950 font-black text-xl shadow-lg shadow-emerald-500/20">S</div>
                    <span class="font-bold text-lg text-white tracking-wide">SAE SaaS</span>
                </div>
                
                <nav class="space-y-1">
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-800 text-white font-medium transition">
                        <span>👑 Painel Geral</span>
                    </a>
                </nav>
            </div>
            
            <div class="border-t border-slate-800 pt-4 flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-white truncate">Ícaro Souza</p>
                    <p class="text-xs text-emerald-400 font-medium">Founder / Owner</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="p-2 hover:bg-slate-800 rounded-lg text-slate-500 hover:text-red-400 transition font-bold">
                        ✕
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto p-8 lg:p-12">
            
            @if(session('sucesso'))
                <div class="mb-6 bg-emerald-950 border border-emerald-500/30 p-4 rounded-xl text-sm text-emerald-400 font-medium">
                    ✨ {{ session('sucesso') }}
                </div>
            @endif

            <header class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold tracking-tight text-white">Console do Sistema</h1>
                    <p class="text-sm text-slate-400 mt-1">Gerencie as assinaturas de escolas e licenças administrativas globais.</p>
                </div>
                <button @click="modalEscola = true" class="bg-emerald-500 hover:bg-emerald-400 text-slate-950 px-5 py-2.5 rounded-xl text-sm font-semibold transition shadow-md shadow-emerald-500/10">
                    + Cadastrar Escola & Admin
                </button>
            </header>

            <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div class="bg-slate-900 p-6 rounded-2xl border border-slate-800 flex items-center justify-between">
                    <div>
                        <span class="text-sm font-medium text-slate-500 block">Instituições Ativas</span>
                        <span class="text-3xl font-bold text-white mt-1 block">1</span>
                    </div>
                    <div class="bg-slate-800 text-xl p-3.5 rounded-xl">🏢</div>
                </div>
                <div class="bg-slate-900 p-6 rounded-2xl border border-slate-800 flex items-center justify-between">
                    <div>
                        <span class="text-sm font-medium text-slate-500 block">Faturamento Estimado</span>
                        <span class="text-3xl font-bold text-emerald-400 mt-1 block">R$ 0,00</span>
                    </div>
                    <div class="bg-slate-800 text-xl p-3.5 rounded-xl">💰</div>
                </div>
            </section>

        </main>
    </div>

    <div class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm flex items-center justify-center z-50 p-4" 
         x-show="modalEscola" x-transition x-cloak>
        <div class="bg-slate-900 rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden border border-slate-800" @click.outside="modalEscola = false">
            <div class="p-6 bg-slate-950 border-b border-slate-800 text-white flex justify-between items-center">
                <h3 class="font-bold text-lg text-emerald-400">Configurar Nova Licença Escolar</h3>
                <button @click="modalEscola = false" class="text-slate-500 hover:text-white font-medium">✕</button>
            </div>
            
            <form action="{{ route('dono.escolas.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider">Nome da Instituição</label>
                        <input type="text" name="nome_escola" required placeholder="Ex: Colégio Anglo"
                               class="mt-1.5 block w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-lg text-sm text-white focus:outline-none focus:border-emerald-500 transition">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider">Data de Expiração do Plano</label>
                        <input type="date" name="expira_em" required
                               class="mt-1.5 block w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-lg text-sm text-white focus:outline-none focus:border-emerald-500 transition">
                    </div>
                </div>

                <div class="border-t border-slate-800 my-4 pt-4">
                    <h4 class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-3">Dados do Administrador da Escola</h4>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 uppercase">Nome do Diretor/Gestor</label>
                            <input type="text" name="name_admin" required placeholder="Nome completo"
                                   class="mt-1 block w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-lg text-sm text-white focus:outline-none focus:border-emerald-500 transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 uppercase">E-mail de Login Admin</label>
                            <input type="email" name="email_admin" required placeholder="diretor@escola.com"
                                   class="mt-1 block w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-lg text-sm text-white focus:outline-none focus:border-emerald-500 transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 uppercase">Senha Provisória</label>
                            <input type="password" name="password_admin" required placeholder="Mínimo 8 caracteres"
                                   class="mt-1 block w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-lg text-sm text-white focus:outline-none focus:border-emerald-500 transition">
                        </div>
                    </div>
                </div>

                <div class="pt-2 flex justify-end gap-2 border-t border-slate-800 mt-4">
                    <button type="button" @click="modalEscola = false" class="px-4 py-2 text-xs font-semibold text-slate-400 hover:bg-slate-800 rounded-xl transition">
                        Cancelar
                    </button>
                    <button type="submit" class="bg-emerald-500 hover:bg-emerald-400 text-slate-950 text-xs px-4 py-2 rounded-xl transition font-semibold">
                        Liberar Sistema
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>