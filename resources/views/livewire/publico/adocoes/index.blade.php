
<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight text-center">
        {{ __('Animais para adoção') }}
    </h2>
</x-slot>

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">
                    @if ($adocoesCount == 0)
                        <div class="col-span-12 md:col-span-12">
                            <h5 class="mt-2 mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Sem animais disponíveis no momento</h5>
                        </div>
                    @endif
                    @foreach($adocoes as $adocao)
                        <div class="col-span-12 md:col-span-4">
                            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <div class="flex justify-center items-center" style="height: 200px;">
                                    <img class="rounded-t-lg object-cover w-full h-full" src="{{ asset('storage/uploads/adocoes/' . $adocao->adImagem) }}" alt="Imagem do animal" />
                                </div>
                                <div class="p-5">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" style="height: 3.5rem;">{{ $adocao->adNome }}</h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" style="height: 4rem;">{{ $adocao->adDescricao }}</p>
                                    <a href="{{ route('publico.adocao.ver', $adocao->id) }}" class="uppercase inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Detalhes
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="rounded mb-4 mt-4">
                    {{ $adocoes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

