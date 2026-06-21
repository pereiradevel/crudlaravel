<x-guest-layout>

    <div class="mb-4 text-center">
        <h2 class="text-2xl font-bold">Redefinir senha</h2>
    </div>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" class="block mt-1 w-full"
                          type="email" name="email"
                          value="{{ old('email', $request->email) }}" required />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Nova senha" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password" name="password" required />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Confirmar senha" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password" name="password_confirmation" required />
        </div>

        <div class="mt-4">
            <x-primary-button class="w-full justify-center">
                Salvar nova senha
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>