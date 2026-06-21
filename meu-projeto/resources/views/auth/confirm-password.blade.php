<x-guest-layout>

    <div class="text-center mb-4">
        <h2 class="text-2xl font-bold">Confirmar senha</h2>
        <p class="text-sm text-gray-500">
            Esta área é protegida. Confirme sua senha para continuar.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div>
            <x-input-label for="password" value="Senha atual" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password" name="password" required />
        </div>

        <div class="mt-4">
            <x-primary-button class="w-full justify-center">
                Confirmar
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>