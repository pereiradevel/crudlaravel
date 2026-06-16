<!DOCTYPE html>
<html lang="pt-BR" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar | SAE — Gestão Escolar Inteligente</title>
    
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
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .animated-bg {
            background: linear-gradient(135deg, #0f172a 0%, #022c22 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="h-full flex items-center justify-center animated-bg p-6 overflow-hidden">

    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-emerald-500 text-navy-950 font-bold text-3xl shadow-lg shadow-emerald-500/20 mb-3">
                S
            </div>
            <h1 class="text-2xl font-bold text-white tracking-tight">SAE Escolar</h1>
            <p class="text-sm text-slate-400 mt-1">Gestão Escolar Inteligente e Descomplicada</p>
        </div>

        <div class="glass-card rounded-3xl p-8 shadow-2xl relative overflow-hidden">
            <div class="absolute -top-12 -left-12 w-24 h-24 rounded-full bg-emerald-500/10 blur-xl"></div>
            <div class="absolute -bottom-12 -right-12 w-24 h-24 rounded-full bg-indigo-500/10 blur-xl"></div>

            <h2 class="text-lg font-semibold text-white mb-6 flex items-center gap-2">
                <i class="bx bx-lock-alt text-emerald-400"></i>
                Bem-vindo de volta! Faça login para gerenciar a sua escola
            </h2>

            @if(session('info'))
            <div class="mb-4 p-3.5 rounded-xl border border-emerald-500/20 bg-emerald-500/10 text-emerald-300 text-xs flex items-center gap-2">
                <i class="bx bxs-info-circle text-base"></i>
                <span>{{ session('info') }}</span>
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Endereço de E-mail</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                            <i class="bx bx-envelope text-lg"></i>
                        </span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-200 text-sm"
                            placeholder="exemplo@sae.com">
                    </div>
                    @error('email')
                    <p class="text-xs text-rose-400 mt-1.5 flex items-center gap-1">
                        <i class="bx bxs-error-circle"></i>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Senha</label>
                        <a href="#" class="text-xs text-emerald-400 hover:underline">Esqueceu a sua senha?</a>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                            <i class="bx bx-key text-lg"></i>
                        </span>
                        <input id="password" type="password" name="password" required
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-200 text-sm"
                            placeholder="Digite sua senha">
                    </div>
                    @error('password')
                    <p class="text-xs text-rose-400 mt-1.5 flex items-center gap-1">
                        <i class="bx bxs-error-circle"></i>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded bg-white/5 border border-white/10 text-emerald-500 focus:ring-0 focus:ring-offset-0 focus:outline-none accent-emerald-500">
                        <span class="text-xs text-slate-300">Lembrar de mim</span>
                    </label>
                </div>

                <button type="submit" 
                    class="w-full py-3.5 rounded-xl bg-emerald-500 text-navy-950 font-bold hover:bg-emerald-400 active:scale-[0.98] transition-all duration-200 shadow-lg shadow-emerald-500/20 flex items-center justify-center gap-2 text-sm mt-2">
                    <span>Entrar no Painel</span>
                    <i class="bx bx-right-arrow-alt text-xl"></i>
                </button>
            </form>
        </div>
    </div>

</body>
</html>
