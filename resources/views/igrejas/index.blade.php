<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Igrejas') }}
            </h2>
            <Link class="font-semibold text-xl text-blue-400" href="{{ route('igreja.create') }}">Nova Igreja</Link>
        </div>

    </x-slot>

    <div class="p-12">
        <x-splade-table :for="$igrejas">
            @cell('alterar', $igreja)
                <Link href="{{ route('igreja.edit', $igreja->id ) }}">Alterar</Link>
            @endcell

        </x-splade-table>
    </div>
</x-app-layout>
