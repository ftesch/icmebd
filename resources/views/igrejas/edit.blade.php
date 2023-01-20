<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Alterar Igrejas') }}
            </h2>
            <Link class="font-semibold text-xl text-blue-400" href="{{ route('igreja.index') }}">Voltar</Link>
        </div>
    </x-slot>

    <div class="p-12">
        <x-splade-form :default="$igreja" action="{{ route('igreja.update', $igreja->id)  }}" method="PUT">
            <x-splade-input name="codigo" label="Codigo" number />
            <x-splade-input name="nome" label="Nome" />
            <x-splade-submit  class="mt-3" :label="__('Salvar')" />
        </x-splade-form>

        <div class="bg-gray-300 mt-2 p-4 text-xl rounded-md">
            Cadastrar um membro
        </div>
        <x-splade-form class="mt-2" action="{{ route('membro.store', $igreja->id)  }}" method="POST">
            <x-splade-input name="name" label="Nome"  />
            <x-splade-input name="email" label="Email" email />
            <x-splade-select name="role" label="Perfil">
                <option value="MEMBRO">Membro</option>
                <option value="REVISOR">Revisor</option>
                <option value="SECRETARIO">Secretário</option>
                <option value="PASTOR">Pastor ou Ungido</option>
            </x-splade-select>

            <x-splade-submit  class="mt-3" :label="__('Salvar')" />
        </x-splade-form>

        <div class="bg-gray-300 mt-2 p-4 text-xl rounded-md">
            Membros
        </div>
        <x-splade-table class="mt-2" :for="$membros">
            @cell('alterar', $membro)
                <x-splade-form class="p-none" action="{{ route('membro.destroy', $membro->id ) }}" method="DELETE">
                    <x-splade-submit class="bg-red-400">
                        <x-fas-circle-minus class="w-5 h-5" />
                    </x-splade-submit>
                </x-splade-form>
            @endcell
        </x-splade-table>

    </div>
</x-app-layout>
