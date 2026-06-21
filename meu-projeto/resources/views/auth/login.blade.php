<x-guest-layout>
    <div class="min-h-screen flex">

        <!-- LADO ESQUERDO -->
        <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-violet-700 via-purple-700 to-fuchsia-700 relative items-center justify-center">
            <div class="absolute top-20 left-20 w-40 h-40 bg-white/10 rounded-full"></div>
            <div class="absolute bottom-20 right-20 w-52 h-52 bg-white/10 rounded-full"></div>
            <div class="absolute top-1/2 left-1/2 w-24 h-24 bg-white/10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>

            <div class="text-center text-white z-10 px-10">
                <div class="w-28 h-28 mx-auto bg-white/15 rounded-full flex items-center justify-center mb-8">
                    <i class='bx bxs-school text-6xl'></i>
                </div>

                <h1 class="text-6xl font-bold tracking-wide">SAE</h1>
                <p class="text-xl mt-2 font-light">Sistema Administrativo Escolar</p>
                <div class="w-32 h-1 bg-white/30 mx-auto my-8 rounded-full"></div>

                <p class="text-purple-100 max-w-md mx-auto leading-7 text-sm">
                    Gerencie alunos, professores, turmas, notas e toda a rotina escolar em uma única plataforma moderna.
                </p>
            </div>
        </div>

        <!-- LADO DIREITO -->
        <div class="w-full lg:w-1/2 flex items-center justify-center bg-gray-50 px-10 py-10">
            <div class="w-full max-w-md">

                <div class="text-center mb-10">
                    <h2 class="text-4xl font-bold text-gray-800">LOGIN</h2>
                    <p class="text-gray-500 mt-2">Acesse sua conta institucional</p>
                </div>

                <!-- ALERTA DE ERRO / SUCESSO -->
                @if (session('status'))
                    <div class="mb-5 rounded-lg border border-green-200 bg-green-50 text-green-700 px-4 py-3 text-sm">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-5 rounded-lg border border-red-200 bg-red-50 text-red-700 px-4 py-3 text-sm">
                        <div class="font-semibold mb-1">Não foi possível entrar:</div>
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- EMAIL -->
                    <div>
                        <label for="email" class="text-sm text-gray-600">E-mail</label>
                        <div class="relative mt-2">
                            <i class='bx bx-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400'></i>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="email@escola.com"
                                class="w-full h-12 pl-12 rounded-md bg-gray-100 border-0 focus:ring-2 focus:ring-violet-500"
                            >
                        </div>
                    </div>

                    <!-- SENHA -->
                    <div>
                        <label for="password" class="text-sm text-gray-600">Senha</label>
                        <div class="relative mt-2">
                            <i class='bx bx-lock-alt absolute left-4 top-1/2 -translate-y-1/2 text-gray-400'></i>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="********"
                                class="w-full h-12 pl-12 rounded-md bg-gray-100 border-0 focus:ring-2 focus:ring-violet-500"
                            >
                        </div>
                    </div>

                    <!-- OPÇÕES -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-gray-600">
                            <input type="checkbox" name="remember" class="accent-violet-600">
                            Lembrar-me
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-violet-600 hover:text-violet-800">
                                Esqueceu a senha?
                            </a>
                        @endif
                    </div>

                    <!-- BOTÃO -->
                    <button
                        type="submit"
                        class="w-full h-12 bg-violet-700 hover:bg-violet-800 text-white font-semibold rounded-md transition shadow-md">
                        Entrar
                    </button>

                    <!-- LINK REGISTRO -->
                    @if (Route::has('register'))
                        <p class="text-center text-sm text-gray-600">
                            Não possui conta?
                            <a href="{{ route('register') }}" class="text-violet-600 hover:text-violet-800 font-medium">
                                Criar conta
                            </a>
                        </p>
                    @endif
                </form>

                <p class="text-center text-xs text-gray-500 mt-10">
                    © {{ date('Y') }} SAE - Sistema Administrativo Escolar
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>