<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Nova Igrejas') }}
            </h2>
            <Link class="font-semibold text-xl text-blue-400" href="{{ route('igreja.index') }}">Voltar</Link>
        </div>
    </x-slot>

    <div class="p-12">
        <x-splade-form action="{{ route('igreja.store') }}">
            <x-splade-input name="codigo" label="Codigo" number />
            <x-splade-input name="nome" label="Nome" />
            <x-splade-submit  class="mt-3" :label="__('Salvar')" />
        </x-splade-form>
    </div>
</x-app-layout>
