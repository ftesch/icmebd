<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Alterar Pergunta da EBD do dia ')  . " : " . \Carbon\Carbon::parse($ebd->data_ebd)->format("d/m/Y") }}
            </h2>
            <Link class="font-semibold text-xl text-blue-400" href="{{ route('ebd.edit', $ebd->id) }}">Voltar</Link>
        </div>
    </x-slot>
    <div class="p-12">
        <x-splade-form :default="$pergunta" action="{{ route('pergunta.update', ['ebd' => $ebd->id, 'pergunta' => $pergunta->id ] ) }}" method="PUT" >
            <x-splade-input name="numero" label="Numero" number />

            <x-splade-select name="classe" label="Classe">
                <option value="TODOS">Todos</option>
                <option value="CIAS">Crianças, Intermediários e Adolescentes</option>
                <option value="JOVENS">Jovens</option>
                <option value="SENHORAS">Senhoras</option>
                <option value="VARÕES">Varões</option>
            </x-splade-select>

            <x-splade-textarea name="pergunta" label="Pergunta" autosize />
            <x-splade-input name="texto_referencia" label="Texto de Referencia"  />
            <x-splade-textarea name="resposta" label="Resposta" autosize />

            <x-splade-submit  class="mt-3" :label="__('Salvar')" />
        </x-splade-form>
    </div>
</x-app-layout>
