<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight text-center">
        {{ __('Locais das publicações de animais') }}
    </h2>
</x-slot>

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 dark:bg-gray-900">
        <div class="bg-gray-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-600 dark:text-gray-100">
            <div class="bg-blue-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-500 dark:text-gray-100">
                <div class="p-4 sm:p-8 bg-white sm:rounded-lg dark:bg-gray-800 dark:text-gray-100">
                    <div id="alert-border-4" class="flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800" role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <form method="GET">
                        <div class="ms-3 text-sm font-medium flex-shrink-0">
                            Caso o mapa não apareça na sua tela,
                                <button class="font-semibold underline hover:no-underline" name="refresh">clique aqui</button>
                            </div>
                        </form>.
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-4" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">
                    <div class="col-span-12 md:col-span-12">
                        <div id="mapa" class="border-gray-500 dark:border-gray-300 mb-6 rounded-lg z-10" style="height: 600px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .leaflet-popup-content-wrapper {
                text-align: center;
                max-width: 300px; /* Defina a largura máxima do conteúdo do popup */
            }
            .leaflet-popup-content img {
                display: block;
                margin: 0 auto;
                width: 200px; /* Defina a largura da imagem */
                height: auto; /* Permite que a altura da imagem seja ajustada automaticamente */
            }
        </style>

        @include('livewire.partials.js.js-mapa-localizacoes')

        @php
            // Recarregar o mapa
            if (isset($_GET['refresh'])) {
                header("Location: /logado-localizacoes");
                exit();
            }
        @endphp
    </div>
    </div>
</div>
