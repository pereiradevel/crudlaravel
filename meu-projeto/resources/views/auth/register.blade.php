<x-guest-layout>

<div class="min-h-screen flex">

    <!-- LADO ESQUERDO (SAE ROXO) -->
    <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-violet-700 via-purple-700 to-fuchsia-700 relative items-center justify-center">

        <!-- bolhas decorativas -->
        <div class="absolute top-20 left-20 w-40 h-40 bg-white/10 rounded-full"></div>
        <div class="absolute bottom-20 right-20 w-52 h-52 bg-white/10 rounded-full"></div>
        <div class="absolute top-1/2 left-1/2 w-24 h-24 bg-white/10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>

        <div class="text-center text-white z-10 px-10">

            <div class="w-28 h-28 mx-auto bg-white/15 rounded-full flex items-center justify-center mb-8">
                <i class='bx bxs-school text-6xl'></i>
            </div>

            <h1 class="text-6xl font-bold tracking-wide">SAE</h1>

            <p class="text-xl mt-2 font-light">
                Sistema Administrativo Escolar
            </p>

            <div class="w-32 h-1 bg-white/30 mx-auto my-8 rounded-full"></div>

            <p class="text-purple-100 max-w-md mx-auto leading-7 text-sm">
                Cadastre novos usuários para acessar a plataforma e gerenciar toda a rotina escolar com segurança e praticidade.
            </p>

        </div>
    </div>

    <!-- LADO DIREITO (REGISTRO) -->
    <div class="w-full lg:w-1/2 flex items-center justify-center bg-gray-50 px-10 py-10">

        <div class="w-full max-w-md">

            <!-- TÍTULO -->
            <div class="text-center mb-10">
                <h2 class="text-4xl font-bold text-gray-800">REGISTRO</h2>
                <p class="text-gray-500 mt-2">Crie uma conta institucional</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- NOME -->
                <div>
                    <label for="name" class="text-sm text-gray-600">Nome completo</label>

                    <div class="relative mt-2">
                        <i class='bx bx-user absolute left-4 top-1/2 -translate-y-1/2 text-gray-400'></i>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Digite seu nome"
                            class="w-full h-12 pl-12 rounded-md bg-gray-100 border-0 focus:ring-2 focus:ring-violet-500">
                    </div>

                    @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

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
                            autocomplete="username"
                            placeholder="email@escola.com"
                            class="w-full h-12 pl-12 rounded-md bg-gray-100 border-0 focus:ring-2 focus:ring-violet-500">
                    </div>

                    @error('email')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
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
                            autocomplete="new-password"
                            placeholder="********"
                            class="w-full h-12 pl-12 rounded-md bg-gray-100 border-0 focus:ring-2 focus:ring-violet-500">
                    </div>

                    @error('password')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CONFIRMAR SENHA -->
                <div>
                    <label for="password_confirmation" class="text-sm text-gray-600">Confirmar senha</label>

                    <div class="relative mt-2">
                        <i class='bx bx-shield-quarter absolute left-4 top-1/2 -translate-y-1/2 text-gray-400'></i>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="********"
                            class="w-full h-12 pl-12 rounded-md bg-gray-100 border-0 focus:ring-2 focus:ring-violet-500">
                    </div>
                </div>

                <!-- BOTÃO -->
                <button
                    type="submit"
                    class="w-full h-12 bg-violet-700 hover:bg-violet-800 text-white font-semibold rounded-md transition shadow-md">
                    Criar conta
                </button>

                <!-- LINK LOGIN -->
                <p class="text-center text-sm text-gray-600">
                    Já possui uma conta?
                    <a href="{{ route('login') }}" class="text-violet-600 hover:text-violet-800 font-medium">
                        Entrar
                    </a>
                </p>
            </form>

            <!-- FOOTER -->
            <p class="text-center text-xs text-gray-500 mt-10">
                © {{ date('Y') }} SAE - Sistema Administrativo Escolar
            </p>

        </div>
    </div>

</div>

</x-guest-layout>