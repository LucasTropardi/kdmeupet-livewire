<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-700 dark:text-gray-300 leading-tight text-center">
        {{ __('Detalhes da publicação') }}
    </h2>
</x-slot>

<div x-data="{ open: false }" class="py-8">
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

                                <h2 class="font-semibold text-xl text-gray-700 dark:text-gray-300 leading-tight text-center mt-4 mb-3">
                                    {{ __('Comentários') }}
                                </h2>
                                @foreach ($mensagens as $mensagem)
                                    <div class="block w-full mb-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                        <h5 class="mb-2 text-xl font-medium tracking-tight text-gray-900 dark:text-white">{{ $mensagem->user->nome . ' ' . $mensagem->user->sobrenome }} em {{ Carbon\Carbon::parse($mensagem->dataMensagem)->format('d/m/Y \à\s H:i') }}</h5>
                                        <p class="font-normal text-gray-700 dark:text-gray-400 break-words">{{ $mensagem->admConteudo }}</p>
                                    </div>
                                @endforeach

                                <div class="rounded mb-4 mt-4">
                                    {{ $mensagens->links() }}
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

