<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-700 dark:text-gray-300 leading-tight text-center">
        {{ __('Detalhes da publicação') }}
    </h2>
</x-slot>

<div x-data="{ open: false }" class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 dark:bg-gray-900">
        <div class="bg-gray-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-600 dark:text-gray-100">
            <div class="bg-blue-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-500 dark:text-gray-100">
                <div class="p-4 sm:p-8 bg-white sm:rounded-lg dark:bg-gray-800 dark:text-gray-100">
                    <h2 class="font-semibold text-2xl text-gray-700 dark:text-gray-300 leading-tight text-center mb-6">
                        {{ $adocao->adNome }}
                    </h2>


                    <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">
                        <div class="col-span-12 md:col-span-6 mt-4">
                            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                <div class="flex flex-col pb-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Data de publicação</dt>
                                    <dd class="text-lg font-semibold">{{ $adocao->adDataCadastro }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Espécie</dt>
                                    <dd class="text-lg font-semibold">{{ $adocao->especie->esNome }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Raça</dt>
                                    <dd class="text-lg font-semibold">{{ $adocao->raca->racaNome }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Tamanho</dt>
                                    <dd class="text-lg font-semibold">{{ $adocao->tamanho->tamanho }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Cor</dt>
                                    <dd class="text-lg font-semibold">{{ $adocao->cor->cor }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Idade</dt>
                                    <dd class="text-lg font-semibold">{{ $adocao->adIdade }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Descrição</dt>
                                    <dd class="text-lg font-semibold">{{ $adocao->adDescricao }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Contato Preferencial</dt>
                                    <dd class="text-lg font-semibold">{{ $adocao->adContato }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Endereço</dt>
                                    <dd class="text-lg font-semibold">{{ $adocao->adEndereco }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Cadastrado por</dt>
                                    <dd class="text-lg font-semibold">{{ $adocao->user->nome . ' ' . $adocao->user->sobrenome }}</dd>
                                </div>
                            </dl>
                        </div>
                        <div class="col-span-12 md:col-span-6 mt-4">

                            <div class="flex justify-center items-center mb-2">
                                <img src="{{ asset('storage/uploads/adocoes/' . $adocao->adImagem) }}" alt="Imagem do animal" class="imagem-animal  rounded-lg">
                            </div>
                            @if ($countMensagem > 0)

                                <h2 class="font-semibold text-xl text-gray-700 dark:text-gray-300 leading-tight text-center mb-3">
                                    {{ __('Comentários') }}
                                </h2>
                                @foreach ($mensagens as $mensagem)
                                    <div class="block w-full mb-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                        <h5 class="mb-2 text-xl font-medium tracking-tight text-gray-900 dark:text-white">{{ $mensagem->user->nome . ' ' . $mensagem->user->sobrenome }} em {{ Carbon\Carbon::parse($mensagem->dataMensagem)->format('d/m/Y \à\s H:i') }}</h5>
                                        <p class="font-normal text-gray-700 dark:text-gray-400 break-words">{{ $mensagem->admConteudo }}</p>
                                        @if($mensagem->user_id === Auth::user()->id || $mensagem->adocao->user_id === Auth::user()->id || Auth::user()->nivel === 'admin')
                                            <div class="flex justify-end mt-2">
                                                <x-external-button route="" class="excluir-mensagem" x-on:click.prevent="$wire.setMensagemId({{ $mensagem->id }}); $wire.open = true;">
                                                    <i class="fa-solid fa-trash-can leading-tight text-gray-600 dark:text-gray-400" title="Finalizar"></i>
                                                </x-external-button>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach

                                <div class="rounded mb-4 mt-4">
                                    {{ $mensagens->links() }}
                                </div>
                            @endif

                            <form wire:submit="escreverMensagem">
                                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                                        <label for="comment" class="sr-only">Escreva um comentário</label>
                                        <textarea id="comment" wire:model="admConteudo" rows=@if($countMensagem > 0)"2" @else "4" @endif class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Escreva um comentário..." required></textarea>
                                    </div>
                                    <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                                        <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                            ENVIAR
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-6">
                        @if ($adocao->user_id !== Auth::user()->id || Auth::user()->nivel === 'admin')
                            <x-external-button route="{{ route('interesse-cadastrar', $adocao->id) }}" class="uppercase text-white dark:text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-4">
                                {{ __('Eu quero') }}
                            </x-external-button>
                        @endif
                        @if ($adocao->user_id === Auth::user()->id || Auth::user()->nivel === 'admin')
                            @if($countInteresses > 0)
                                <x-external-button route="{{ route('lista.interesses', $adocao->id) }}" class="uppercase text-white dark:text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-4">
                                    {{ __('Interesses') }}
                                </x-external-button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.partials.toast.toast')
    @include('livewire.partials.modals.modal-excluir-mensagem-adocao')
</div>

