<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Perguntas da EBD') }}
            </h2>
            <Link class="font-semibold text-xl text-blue-400" href="{{ route('ebd.create') }}">Nova EBD</Link>
        </div>

    </x-slot>

    {{ $ebdPermitidas  }}
    <hr>
    {{ \Carbon\Carbon::now()->startOfWeek(Carbon::SUNDAY)  }}

    <div class="p-12">
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
