<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAE - Cadastrar Nova Conta</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4 md:p-8">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-4xl flex overflow-hidden min-h-[600px]">
        
        <div class="hidden md:flex md:w-1/2 bg-indigo-950 text-white p-12 flex-col justify-between bg-gradient-to-br from-indigo-950 to-slate-950">
            <div>
                <div class="flex items-center gap-2 mb-8">
                    <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                    <span class="text-xl font-bold tracking-wider">SAE</span>
                </div>
                <h1 class="text-3xl font-extrabold leading-tight">Comece a modernizar sua gestão escolar.</h1>
                <p class="mt-4 text-indigo-200 text-sm leading-relaxed">Crie sua conta administrativa para vincular-se à sua instituição e ter controle completo sobre turmas, matrículas e relatórios.</p>
            </div>
            <div class="text-xs text-indigo-300">
                Criando uma conta corporativa protegida por criptografia de ponta.
            </div>
        </div>

        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Criar Conta Administrativa</h2>
                <p class="text-sm text-gray-500 mt-1">Já possui conta? <a href="{{ route('login') }}" class="text-indigo-600 hover:underline font-medium">Faça login</a></p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-4 rounded-r-md">
                    <ul class="text-xs text-red-700 list-disc pl-4 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="school_code" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider">Código de Identificação da Escola</label>
                    <input type="text" name="school_code" id="school_code" value="{{ old('school_code') }}" required 
                           class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-sm font-mono tracking-widest uppercase focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white"
                           placeholder="EX: ESC-9981">
                </div>

                <div>
                    <label for="name" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider">Nome Completo</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required 
                           class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white"
                           placeholder="Seu nome completo">
                </div>

                <div>
                    <label for="email" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider">E-mail Institucional</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required 
                           class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white"
                           placeholder="seuemail@escola.com">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider">Senha</label>
                        <input type="password" name="password" id="password" required 
                               class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white"
                               placeholder="Mín. 8 caracteres">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider">Confirmar Senha</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required 
                               class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white"
                               placeholder="Repita a senha">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                            class="w-full bg-indigo-950 text-white py-2.5 px-4 rounded-lg font-medium text-sm hover:bg-indigo-900 transition duration-200 shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Concluir Cadastro
                    </button>
                </div>
            </form>
        </div>

    </div>

</body>
</html>