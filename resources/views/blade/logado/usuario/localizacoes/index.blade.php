<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Locais das publicações de animais') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
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
            <script>
                window.addEventListener('popstate', function(event) {
                    location.reload();
                });
            </script>
        </div>
    </div>
</x-app-layout>
