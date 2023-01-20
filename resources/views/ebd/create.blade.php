<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Nova EBD') }}
            </h2>
            <Link class="font-semibold text-xl text-blue-400" href="{{ route('ebd.index') }}">Voltar</Link>
        </div>
    </x-slot>

    <div class="p-12">
        <x-splade-form action="{{ route('ebd.store') }}">
            <x-splade-input name="data_ebd" label="Data da EBD" date />
            <x-splade-input name="data_limite" label="Data Limite" date />
            <x-splade-submit  class="mt-3" :label="__('Salvar')" />
        </x-splade-form>
    </div>
</x-app-layout>
