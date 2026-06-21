<x-guest-layout>

    <div class="mb-4 text-center">
        <h2 class="text-2xl font-bold">Esqueceu sua senha?</h2>
        <p class="text-sm text-gray-500">
            Informe seu e-mail e enviaremos um link para redefinir sua senha.
        </p>
    </div>

    @if (session('status'))
        <div class="mb-4 text-green-600 text-sm text-center">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" class="block mt-1 w-full"
                          type="email" name="email" required autofocus />
        </div>

        <div class="mt-4">
            <x-primary-button class="w-full justify-center">
                Enviar link de redefinição
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>