<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contribuir com a EBD do Dia') . " : " . \Carbon\Carbon::parse($ebd->data_ebd)->format("d/m/Y") }}
            </h2>
            <Link class="font-semibold text-xl text-blue-400" href="{{ route('resposta.index', $ebd->id) }}">Voltar</Link>
        </div>
    </x-slot>

    <div class="p-12">

        <div class="p-4 bg-gray-300 rounded-md mt-2 flex flex-row">
            <div class="basis-32">
                <img class="w-32" src="{{ asset('/images/' . $pergunta->classe . '.png')  }}" />
            </div>
            <div class="flex flex-col">
                <span class="text-sm italic text-gray-500">Pergunta {{  $pergunta->numero }} para a classe {{ $pergunta->classe  }}</span>
                <div class="text-2xl">
                    {{ $pergunta->pergunta }}
                </div>
                <span class="text-sm italic text-gray-500">Texto de Referenciua</span>
                <div class="text-xl">
                    {{ $pergunta->texto_referencia }}
                </div>
            </div>
        </div>

        <x-splade-form class="mt-2" action="{{ route('resposta.store', ['ebd' => $ebd->id, 'pergunta' => $pergunta->id ] ) }}" method="POST" >
            <x-splade-textarea name="resposta" label="Resposta" autosize />
            <x-splade-submit  class="mt-3" :label="__('Salvar')" />
        </x-splade-form>

        <div class="mt-2">
            <div class="p-4 bg-gray-300 rounded-md mt-2 text-2xl">Respostas</div>
            @foreach($respostas as $resposta)
                <div class="p-4 bg-gray-200 rounded-md mt-2">
                    {{ $resposta->resposta  }}
                    <div class="text-sm italic">
                        Contribuição de&nbsp;:{{ $resposta->user->name }}&nbsp;em:&nbsp;{{ \Carbon\Carbon::parse($resposta->created_at)->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i:s') }}
                    </div>
                </div>

            @endforeach
        </div>

    </div>
</x-app-layout>
