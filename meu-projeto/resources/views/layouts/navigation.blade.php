<!-- Sidebar Navigation -->
<div x-data="{ sidebarOpen: true }" class="flex">
    <!-- Sidebar -->
    <aside :class="{ 'w-64': sidebarOpen, 'w-20': !sidebarOpen, 'hidden md:flex': window.innerWidth < 768 }" class="hidden md:flex fixed left-0 top-0 h-screen transition-all duration-300 ease-in-out z-40 border-r border-white/10 bg-slate-950/95 shadow-2xl shadow-slate-950/50 backdrop-blur-xl flex-col">
        
        <!-- Sidebar Content -->
        <div class="flex flex-col h-full">
            <!-- Logo/Header -->
            <div class="p-6 flex items-center justify-between">
                <a href="{{ route('dashboard') }}" :class="{ 'block': sidebarOpen, 'hidden': !sidebarOpen }" class="block">
                    <div class="text-xl font-bold bg-gradient-to-r from-cyan-400 via-violet-400 to-fuchsia-400 bg-clip-text text-transparent">
                        SAE
                    </div>
                </a>
                <button @click="sidebarOpen = !sidebarOpen" class="p-1.5 hover:bg-slate-800 rounded-lg transition">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-3 space-y-2 overflow-y-auto">
                
                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/30' : 'text-slate-400 hover:bg-slate-800/50 border border-transparent' }} transition group">
                    <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path>
                        <path d="M3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6z"></path>
                        <path d="M14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                    </svg>
                    <span :class="{ 'block': sidebarOpen, 'hidden': !sidebarOpen }" class="block ms-3 font-medium">Dashboard</span>
                </a>

                <!-- Separator -->
                <div :class="{ 'block': sidebarOpen, 'hidden': !sidebarOpen }" class="hidden my-3 border-t border-white/10"></div>

                <!-- Alunos -->
                <a href="{{ route('alunos.index') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('alunos.*') ? 'bg-fuchsia-500/20 text-fuchsia-300 border border-fuchsia-500/30' : 'text-slate-400 hover:bg-slate-800/50 border border-transparent' }} transition group">
                    <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM9 10a6 6 0 1112 0v1h1v-1a7 7 0 00-14 0v1h1v-1z"></path>
                    </svg>
                    <span :class="{ 'block': sidebarOpen, 'hidden': !sidebarOpen }" class="block ms-3 font-medium whitespace-nowrap overflow-hidden text-ellipsis">Alunos</span>
                </a>

                <!-- Turmas -->
                <a href="{{ route('turmas.index') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('turmas.*') ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/30' : 'text-slate-400 hover:bg-slate-800/50 border border-transparent' }} transition group">
                    <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17 6a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V6z"></path>
                        <path d="M7 8h6v3H7V8z"></path>
                    </svg>
                    <span :class="{ 'block': sidebarOpen, 'hidden': !sidebarOpen }" class="block ms-3 font-medium whitespace-nowrap overflow-hidden text-ellipsis">Turmas</span>
                </a>

                <!-- Funcionários -->
                <a href="{{ route('funcionarios.index') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('funcionarios.*') ? 'bg-violet-500/20 text-violet-300 border border-violet-500/30' : 'text-slate-400 hover:bg-slate-800/50 border border-transparent' }} transition group">
                    <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v2h8v-2zM16 11a2 2 0 100-4 2 2 0 000 4z"></path>
                    </svg>
                    <span :class="{ 'block': sidebarOpen, 'hidden': !sidebarOpen }" class="block ms-3 font-medium text-sm whitespace-nowrap overflow-hidden text-ellipsis">Equipe</span>
                </a>

                <!-- Usuários -->
                <a href="{{ route('users.index') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('users.*') ? 'bg-pink-500/20 text-pink-300 border border-pink-500/30' : 'text-slate-400 hover:bg-slate-800/50 border border-transparent' }} transition group">
                    <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path>
                    </svg>
                    <span :class="{ 'block': sidebarOpen, 'hidden': !sidebarOpen }" class="block ms-3 font-medium whitespace-nowrap overflow-hidden text-ellipsis">Usuários</span>
                </a>
            </nav>

            <!-- User Profile Section -->
            <div class="p-4 border-t border-white/10">
                <div class="flex items-center gap-3 px-3 py-3 rounded-lg hover:bg-slate-800/50 transition cursor-pointer group">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-fuchsia-500 to-violet-600 flex items-center justify-center flex-shrink-0">
                        <span class="text-white font-bold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <div :class="{ 'block': sidebarOpen, 'hidden': !sidebarOpen }" class="hidden flex-1 min-w-0">
                        <p class="text-sm font-semibold text-slate-200 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-slate-400 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-2 text-sm text-slate-400 hover:text-rose-400 hover:bg-rose-500/10 rounded-lg transition border border-transparent hover:border-rose-500/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span :class="{ 'block': sidebarOpen, 'hidden': !sidebarOpen }" class="hidden ms-3 font-medium">Sair</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Mobile Menu Button (Fixed) -->
    <button @click="$dispatch('toggle-sidebar')" class="fixed bottom-6 left-6 z-50 md:hidden p-3 rounded-full bg-gradient-to-br from-cyan-500 to-violet-600 text-white shadow-lg hover:shadow-xl transition hover:scale-110">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
</div>
