<x-guest-layout>

    <div class="text-center">
        <h2 class="text-2xl font-bold">Verifique seu e-mail</h2>

        <p class="mt-2 text-sm text-gray-600">
            Antes de continuar, confira seu e-mail e clique no link de verificação.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mt-4 text-green-600 text-sm text-center">
            Um novo link foi enviado para seu e-mail.
        </div>
    @endif

    <div class="mt-6 flex flex-col gap-3">

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button class="w-full justify-center">
                Reenviar e-mail de verificação
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-sm text-red-500 underline w-full">
                Sair
            </button>
        </form>

    </div>

</x-guest-layout>