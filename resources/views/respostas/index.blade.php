<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Perguntas da EBD') }}
            </h2>
        </div>

    </x-slot>
    <div class="p-12">
        @foreach($ebdPermitidas as $ebd)
            <div class="p-4 bg-gray-300 grid grid-cols-2 rounded-md">
                <div>
                    <span class="text-sm text-gray-500">Data da EBD</span>
                    <div class="text-2xl">
                        {{ \Carbon\Carbon::parse($ebd->data_ebd)->format('d/m/Y') }}
                    </div>
                </div>
                <div>
                    <span class="text-sm text-gray-500">Quantidade de Respostas</span>
                    <div class="text-2xl">
                        {{ $ebd->respostas_count  }}
                    </div>

                </div>
            </div>

            @foreach($ebd->perguntas as $pergunta)
                <div class="p-4 flex flex-row gap-x-2 rounded-md mt-2  bg-gray-200" >
                    <div class="basis-32">
                        <img class="w-32" src="{{ asset('/images/' . $pergunta->classe . '.png')  }}" />
                    </div>
                    <div class="basis-14">
                        <span class="text-sm text-gray-500">Número</span>
                        <div class="text-2xl text-center font-bold">
                            {{ $pergunta->numero}}
                        </div>
                    </div>
                    <div class="basis-full">
                        <span class="text-sm text-gray-500">Pergunta</span>
                        <div class="text-xl">
                            {{ $pergunta->pergunta }}
                        </div>
                        <div class="text-sm">
                            {{ $pergunta->texto_referencia }}
                        </div>
                        <div class="text-sm italic">
                            Quantidade de Respostas:{{ $pergunta->respostas->count() }}
                        </div>
                    </div>
                    <div class="basis-32 flex justify-end">
                        <Link class="flex flex-row text-sm text-blue-500" href="{{ route('resposta.create', ['ebd' => $pergunta->ebd_id, 'pergunta' => $pergunta->id]) }}" >
                            <x-fas-circle-plus class="w-5 h-5" /> <span class="ml-2">Contribuir</span>
                        </Link>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>

    <div class="p-12">
        <div class="text-2xl">
            Outras EBDs
        </div>
        <x-splade-table :for="$ebds">
            @cell('data_ebd', $ebd)
            {{ \Carbon\Carbon::parse($ebd->data_ebd)->format("d/m/Y")  }}
            @endcell
            @cell('data_limite', $ebd)
            {{ \Carbon\Carbon::parse($ebd->data_limite)->format("d/m/Y")  }}
            @endcell
            @cell('alterar', $ebd)
                Ver respostas
            @endcell

        </x-splade-table>
    </div>
</x-app-layout>
