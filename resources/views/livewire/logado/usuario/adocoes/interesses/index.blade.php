<div>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Lista de interesses
        </h2>
    </x-slot>

    <div x-data="{ open: false }" class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="overflow-x-auto">
                        <table class="w-full table-auto text-sm text-left rtl:text-right text-gray-700 dark:text-gray-300">
                            <thead class="text-xl text-gray-800 dark:text-gray-200 uppercase bg-gray-100 dark:bg-gray-700">
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <th class="p-4">Interessado</th>
                                    <th class="p-4 sm:table-cell hidden">Contato</th>
                                    <th class="p-4">Mensagem</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tbody>
                                    @foreach ($interesses as $interesse)
                                        <tr class="odd:bg-white dark:odd:bg-gray-800 even:bg-gray-100 dark:even:bg-gray-700 hover:bg-yellow-50 dark:hover:bg-gray-600 hover:border-yellow-100 border-b dark:border-none text-base font-medium">
                                            <td class="p-4">{{ $interesse->user->nome . ' ' . $interesse->user->sobrenome }}</td>
                                            <td class="p-4 sm:table-cell hidden">{{ $interesse->adiContato }}</td>
                                            <td class="p-4">{{ $interesse->adiMensagem }}</td>
                                            <td class="text-center p-4 space-x-2 flex flex-col items-center justify-center sm:flex-row sm:space-x-2 space-y-2 sm:space-y-0">
                                                <x-external-button route="" title="Finalizar interesse" class="finalizar-interesse text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 sm:px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" x-on:click.prevent="$wire.setAdocaoInteresseId({{ $interesse->id }}); $wire.open = true;">
                                                    <i class="fa-solid fa-power-off ml-1 sm:ml-0" title="Excluir"></i>
                                                </x-external-button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="rounded mb-4 mt-4">
                            {{ $interesses->links() }}
                        </div>
                        <div class="flex justify-end">
                            <x-external-button route="{{ route('adocao.ver', $adocao->id) }}" class="uppercase text-white dark:text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-4">
                                {{ __('Voltar') }}
                            </x-external-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('livewire.partials.modals.modal-finalizar-interesse')
        @include('livewire.partials.toast.toast')
    </div>
</div>
