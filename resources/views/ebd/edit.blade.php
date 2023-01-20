<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Alterar EBD') }}
            </h2>
            <Link class="font-semibold text-xl text-blue-400" href="{{ route('ebd.index') }}">Voltar</Link>
        </div>
    </x-slot>

    <div class="p-4">
        <div class="flex justify-start">
            <div class="p-4 bg-gray-300 flex-col rounded-md">
                <span class="text-sm text-gray-500">Data da EBD</span>
                <div class="text-2xl">
                    {{ \Carbon\Carbon::parse($ebd->data_ebd)->format("d/m/Y")  }}
                </div>
            </div>
            <div class="ml-2 p-4 bg-gray-300 flex-col rounded-md">
                <span class="text-sm text-gray-500">Data Limite</span>
                <div class="text-2xl">
                    {{ \Carbon\Carbon::parse($ebd->data_limite)->format("d/m/Y")  }}
                </div>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="bg-gray-300 p-4 rounded-md">
            <Link class="font-semibold text-xl text-blue-500" href="{{ route('pergunta.create', $ebd->id) }}">Nova Pergunta</Link>
        </div>

        <x-splade-table :for="$perguntas" class="mt-2">
            @cell('alterar', $pergunta)
                <Link href="{{ route('pergunta.edit', ["ebd" => $pergunta->ebd_id, "pergunta" => $pergunta->id ]) }}">Alterar</Link>
            @endcell

        </x-splade-table>

    </div>





</x-app-layout>
