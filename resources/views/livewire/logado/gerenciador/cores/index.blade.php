<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Lista de cores
        </h2>
    </x-slot>

    <div x-data="{ open: false }" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6 mt-2">
                        <x-external-button route="{{ route('cor.cadastrar') }}" class="text-white uppercase bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            <span class="fa-solid fa-plus mr-1"></span>
                            Nova cor
                        </x-external-button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto text-sm text-left rtl:text-right text-gray-700 dark:text-gray-300">
                            <thead class="text-xl text-gray-800 dark:text-gray-200 uppercase bg-gray-100 dark:bg-gray-700">
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <th class="p-4 text-center">Id</th>
                                    <th class="p-4">Cor</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tbody>
                                    @foreach ($cores as $cor)
                                        <tr class="odd:bg-white dark:odd:bg-gray-800 even:bg-gray-100 dark:even:bg-gray-700 hover:bg-yellow-50 dark:hover:bg-gray-600 hover:border-yellow-100 border-b dark:border-none text-base font-medium">
                                            <td class="p-4 text-center">{{ $cor->id }}</td>
                                            <td class="p-4">{{ $cor->cor }}</td>
                                            <td class="text-center p-4 space-x-2 flex flex-col items-center justify-center sm:flex-row sm:space-x-2 space-y-2 sm:space-y-0">
                                                <x-external-button route="{{ route('cor.alterar', $cor->id) }}" title="Editar cor" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center ml-1 sm:ml-0 me-0.5 mb-0 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" >
                                                    <i class="fa-solid fa-pencil ml-0.5"></i>
                                                </x-external-button>
                                                <x-external-button route="" title="Excluir cor" class="excluir-cor text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 sm:px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" x-on:click.prevent="$wire.setCorId({{ $cor->id }}); $wire.open = true;">
                                                    <i class="fa-regular fa-trash-can ml-1 sm:ml-0" title="Excluir"></i>
                                                </x-external-button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="rounded mb-4 mt-4">
                            {{ $cores->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('livewire.partials.modals.modal-excluir-cor')
        @include('livewire.partials.toast.toast')
    </div>
</div>
