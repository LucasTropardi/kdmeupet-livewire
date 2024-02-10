<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-700 dark:text-gray-300 leading-tight text-center">
            {{ __('Alterar Cadastro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 dark:bg-gray-900">
            <div class="bg-gray-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-600 dark:text-gray-100">
                <div class="bg-blue-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-500 dark:text-gray-100">
                    <div class="p-4 sm:p-8 bg-white sm:rounded-lg dark:bg-gray-800 dark:text-gray-100">
                        <form action="{{ route('animal.alterar', $animal->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">
                                <!-- User -->
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                <!-- Situação -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label class="mb-1" for="situacao_id" :value="__('Situação*')" />
                                    <x-select name="situacao_id" :options="$situacoes" selected="{{ $animal->situacao_id }}" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-lg shadow-sm" autofocus/>
                                    <x-input-error :messages="$errors->get('situacao_id')" class="mt-2" />
                                </div>

                                <!-- Espécie -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label class="mb-1" for="especie_id" :value="__('Espécie*')" />
                                    <x-select name="especie_id" id="especie_id" :options="$especies" selected="{{ $animal->especie_id }}" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-lg shadow-sm" />
                                    <x-input-error :messages="$errors->get('especie_id')" class="mt-2" />
                                </div>

                                <!-- Raça -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label class="mb-1" for="raca_id" :value="__('Raça*')" />
                                    <x-select name="raca_id" id="raca_id" :options="$racas" selected="{{ $animal->raca_id }}" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-lg shadow-sm" />
                                    <x-input-error :messages="$errors->get('raca_id')" class="mt-2" />
                                </div>

                                <!-- Tamanhos -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label class="mb-1" for="tamanho_id" :value="__('Tamanho*')" />
                                    <x-select name="tamanho_id" id="tamanho_id" :options="$tamanhos" selected="{{ $animal->tamanho_id }}" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-lg shadow-sm" />
                                    <x-input-error :messages="$errors->get('tamanho_id')" class="mt-2" />
                                </div>

                            <!-- Cores -->
                            <div class="col-span-12 md:col-span-6">
                                    <x-input-label class="mb-1" for="cor_id" :value="__('Cores*')" />
                                    <x-select name="cor_id" id="cor_id" :options="$cores" selected="{{ $animal->cor_id }}" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-lg shadow-sm" />
                                    <x-input-error :messages="$errors->get('cor_id')" class="mt-2" />
                                </div>

                                <!-- Data -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label for="anData" :value="__('Data')" class="mb-1 " />
                                    <input
                                        type="text"
                                        name="anData"
                                        id="anData"
                                        value="{{ $dataCadastrada ?? '' }}"
                                        class="bg-white dark:bg-gray-900 dark:border-gray-600 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Selecione"
                                    >
                                </div>

                                <!-- Nome -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label for="anNome" :value="__('Nome')" />
                                    <x-text-input name="anNome" id="anNome" value="{{ $animal->anNome }}" class="block mt-1 w-full" type="text" name="anNome" required autocomplete="anNome" />
                                    <x-input-error :messages="$errors->get('anNome')" class="mt-2" />
                                </div>

                                <!-- Contato -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label for="anContato" :value="__('Contato preferencial')" />
                                    <x-text-input name="anContato" id="anContato" value="{{ $animal->anContato }}" class="block mt-1 w-full" type="text" name="anContato" required autocomplete="anContato" />
                                    <x-input-error :messages="$errors->get('anContato')" class="mt-2" />
                                </div>

                                <!-- Descrição -->
                                <div class="col-span-12 md:col-span-12">
                                    <x-input-label for="anDescricao" :value="__('Descrição*')" class="text-left" />
                                    <x-textarea-input class="w-full block mt-1" rows="4" id="anDescricao" type="text" name="anDescricao" :value="old('anDescricao')" autocomplete="anDescricao" required>{{ $animal->anDescricao }}
                                    </x-textarea-input>
                                </div>

                                <div class="col-span-12 md:col-span-12">
                                    <div class="flex justify-center items-center mb-2">
                                        <img src="{{ asset('storage/uploads/animais/' . $animal->anFoto) }}" alt="Imagem do animal" class="imagem-animal">
                                    </div>
                                </div>

                                <div class="col-span-12 md:col-span-12">
                                    <x-upload-imagem id="anFoto" inputName="anFoto" class="block mt-2 w-full" />
                                </div>

                                <!-- Latitude -->
                                <div class="col-span-12 md:col-span-12">
                                    <x-input-label for="" :value="__('Localização*')" class="mb-2 text-left" />
                                    <div id="map" class="overflow-hidden border-2 border-gray-300 shadow-lg sm:rounded-lg"></div>
                                    <input type="hidden" name="latitude" id="latitude">
                                    <input type="hidden" name="longitude" id="longitude">
                                </div>
                                <!-- Longitude -->

                            </div>
                            <div class="flex items-center justify-end mt-6">
                                <x-primary-button class="text-white dark:text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-4">
                                    {{ __('Alterar') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
        @include('livewire.partials.js.js-mapa-edicao')
        <script>
            flatpickr("#anData", {
                dateFormat: "d/m/Y",
                locale: "pt",
            });
        </script>
    </div>
</x-app-layout>
