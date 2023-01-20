<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contribuir com uma resposta ') }}
            </h2>
            <Link class="font-semibold text-xl text-blue-400" href="{{ route('resposta.index', $ebd->id) }}">Voltar</Link>
        </div>
    </x-slot>
    <div class="p-12">

    </div>
</x-app-layout>
