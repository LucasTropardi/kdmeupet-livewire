<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-700 dark:text-gray-300 leading-tight text-center">
        {{ __('Detalhes da parceria') }}
    </h2>
</x-slot>

<div x-data="{ open: false }" class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 dark:bg-gray-900">
        <div class="bg-gray-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-600 dark:text-gray-100">
            <div class="bg-blue-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-500 dark:text-gray-100">
                <div class="p-4 sm:p-8 bg-white sm:rounded-lg dark:bg-gray-800 dark:text-gray-100">
                    <h2 class="font-semibold text-2xl text-gray-700 dark:text-gray-300 leading-tight text-center mb-6">
                        {{ $parceria->parNome }}
                    </h2>

                    <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">
                        <div class="col-span-12 md:col-span-6 mt-4">
                            <div class="flex justify-center items-center mb-2">
                                <img src="{{ asset('storage/uploads/parceiros/' . $parceria->parImagem) }}" alt="Imagem do animal" class="imagem-animal rounded-lg">
                            </div>
                            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">

                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Descrição</dt>
                                    <dd class="text-lg font-semibold">{{ $parceria->parDescricao }}</dd>
                                </div>


                            </dl>

                        </div>
                        <div class="col-span-12 md:col-span-6 mt-4 sm:ml-2">
                            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                <div class="flex flex-col pb-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Data de cadastro</dt>
                                    <dd class="text-lg font-semibold">{{ $parceria->parDataCadastro }}</dd>
                                </div>
                                <div class="flex flex-col py-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Situação</dt>
                                    <dd class="text-lg font-semibold">
                                        @if ($parceria->parAprovado == 1)
                                            Ativa
                                        @else
                                            Em análise
                                        @endif
                                    </dd>
                                </div>

                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Endereço</dt>
                                    <dd class="text-lg font-semibold">{{ $parceria->parEndereco }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Telefone</dt>
                                    <dd class="text-lg font-semibold">{{ $parceria->parTelefone }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">E-mail</dt>
                                    <dd class="text-lg font-semibold">{{ $parceria->parEmail }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Cadastrado por</dt>
                                    <dd class="text-lg font-semibold">{{ $parceria->user->nome . ' ' . $parceria->user->sobrenome }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Mensagem</dt>
                                    <dd class="text-lg font-semibold">{{ $parceria->parMensagem }}</dd>
                                </div>
                            </dl>
                        </div>

                    </div>
                    @if($parceria->parAprovado == 0 && Auth::user()->nivel === 'admin')
                        <x-external-button route="" title="Aprovar parceria" class="aprovar-parceria uppercase text-white dark:text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" x-on:click.prevent="$wire.setParceriaId({{ $parceria->id }}); $wire.open = true;">
                            Aprovar
                        </x-external-button>
                    @endif
                </div>
            </div>
        </div>
        @include('livewire.partials.modals.modal-aprovar-parceria')
    </div>
</div>

