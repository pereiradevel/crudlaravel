<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAE - Login Administrativo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 h-screen flex items-center justify-center p-4 md:p-0">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-4xl flex overflow-hidden min-h-[550px]">
        
        <div class="hidden md:flex md:w-1/2 bg-indigo-950 text-white p-12 flex-col justify-between relative bg-gradient-to-br from-indigo-950 to-slate-900">
            <div>
                <div class="flex items-center gap-2 mb-8">
                    <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                    <span class="text-xl font-bold tracking-wider">SAE</span>
                </div>
                <h1 class="text-3xl font-extrabold leading-tight">Sistema Administrativo Escolar</h1>
                <p class="mt-4 text-indigo-200 text-sm leading-relaxed">Gerencie matrículas, histórico escolar, turmas, notas e a secretaria da sua instituição em uma única plataforma integrada.</p>
            </div>
            <div class="text-xs text-indigo-300">
                &copy; {{ date('Y') }} SAE. Painel de Controle Educacional.
            </div>
        </div>

        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Acesso ao Painel</h2>
                <p class="text-sm text-gray-500 mt-1">Insira o código da escola e suas credenciais administrativas.</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-md">
                    <ul class="text-xs text-red-700 list-disc pl-4 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="school_code" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider">Código da Escola</label>
                    <input type="text" name="school_code" id="school_code" 
                           value="{{ old('school_code') }}" 
                           required 
                           class="mt-1 block w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm font-mono tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white uppercase"
                           placeholder="EX: COL-1234">
                </div>

                <div>
                    <label for="email" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider">E-mail Corporativo</label>
                    <input type="email" name="email" id="email" 
                           value="{{ old('email') }}" 
                           required 
                           class="mt-1 block w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white"
                           placeholder="seuemail@instituicao.com">
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1">
                        <label for="password" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider">Senha</label>
                        <a href="#" class="text-xs text-indigo-600 hover:underline">Esqueceu a senha?</a>
                    </div>
                    <input type="password" name="password" id="password" 
                           required 
                           class="block w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white"
                           placeholder="••••••••">
                </div>

                <div class="flex items-center pt-1">
                    <input type="checkbox" name="remember" id="remember" 
                           class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded-md">
                    <label for="remember" class="ml-2 block text-sm text-gray-600 select-none">Manter conectado neste navegador</label>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                            class="w-full bg-indigo-950 text-white py-3 px-4 rounded-lg font-medium text-sm hover:bg-indigo-900 transition duration-200 shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Entrar no SAE
                    </button>
                </div>
            </form>
        </div>

    </div>

</body>
</html>