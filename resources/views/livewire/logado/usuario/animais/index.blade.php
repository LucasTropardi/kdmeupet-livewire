<div>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Lista de animais
        </h2>
    </x-slot>

    <div x-data="{ open: false }" class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6 mt-2">
                        <x-external-button route="{{ route('animal.criar') }}" class="text-white uppercase bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            <span class="fa-solid fa-plus mr-1"></span>
                            Novo animal
                        </x-external-button>
                    </div>
                    @if ($countAnimais > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto text-sm text-left rtl:text-right text-gray-700 dark:text-gray-300">
                                <thead class="text-xl text-gray-800 dark:text-gray-200 uppercase bg-gray-100 dark:bg-gray-700">
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <th class="p-4">Nome</th>
                                        <th class="p-4">Situação</th>
                                        <th class="sm:table-cell hidden">Especie</th>
                                        <th class="sm:table-cell hidden">Raça</th>
                                        <th class="sm:table-cell hidden">Data</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tbody>
                                        @foreach ($animais as $animal)
                                            <tr class="odd:bg-white dark:odd:bg-gray-800 even:bg-gray-100 dark:even:bg-gray-700 hover:bg-yellow-50 dark:hover:bg-gray-600 hover:border-yellow-100 border-b dark:border-none text-base font-medium">
                                                <td class="p-4">{{ $animal->anNome }}</td>
                                                <td class="p-4">{{ $animal->situacao->situacao }}</td>
                                                <td class="sm:table-cell hidden">{{ $animal->especie->esNome }}</td>
                                                <td class="sm:table-cell hidden">{{ $animal->raca->racaNome }}</td>
                                                <td class="sm:table-cell hidden">{{ \Carbon\Carbon::parse($animal->anData)->format('d/m/Y') }}</td>
                                                <td class="text-center p-4 space-x-2 flex flex-col items-center justify-center sm:flex-row sm:space-x-2 space-y-2 sm:space-y-0">
                                                    <x-external-button route="{{ route('animal.ver', $animal->id) }}" title="Visualizar" class="text-green-600 hover:text-white border border-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center ml-2 sm:ml-0 me-0.5 mb-0 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-500 dark:focus:ring-green-700" >
                                                        <i class="fa-solid fa-eye ml-0.5"></i>
                                                    </x-external-button>
                                                    <x-external-button route="{{ route('animal.editar', $animal->id) }}" title="Editar animal" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center ml-2 sm:ml-0 me-0.5 mb-0 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" >
                                                        <i class="fa-solid fa-pencil ml-0.5"></i>
                                                    </x-external-button>
                                                    <x-external-button route="" title="Finalizar publicação" class="finalizar-publicacao text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 sm:px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" x-on:click.prevent="$wire.setAnimalId({{ $animal->id }}); $wire.open = true;">
                                                        <i class="fa-solid fa-power-off ml-1 sm:ml-0" title="Finalizar"></i>
                                                    </x-external-button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="rounded mb-4 mt-4">
                                {{ $animais->links() }}
                            </div>
                        </div>
                    @else
                        <div class="col-span-12 md:col-span-12">
                            <h5 class="mt-12 mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Sem animais cadastrados no momento</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('livewire.partials.modals.modal-finalizar-publicacao')
        @include('livewire.partials.toast.toast')
    </div>
</div>
