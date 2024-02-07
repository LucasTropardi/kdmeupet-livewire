<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
        {{ __('Novo animal') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 dark:bg-gray-900">
        <div class="bg-gray-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-600 dark:text-gray-100">
            <div class="bg-blue-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-500 dark:text-gray-100">
                <div class="p-4 sm:p-8 bg-white sm:rounded-lg dark:bg-gray-800 dark:text-gray-100">
                    <form action="{{ route('animal.cadastrar') }}" method="post" enctype="multipart/form-data">
                        <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">

                            <!-- Situação -->
                            <div class="col-span-12 md:col-span-6">
                                <x-input-label for="situacao_id" :value="__('Situação')" class="mb-1 " />
                                <select wire:model="situacao_id" id="situacao_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autofocus required>
                                    <option value="">--- Selecione ---</option>
                                    @foreach ($situacoes as $situacao)
                                        <option value="{{ $situacao->id }}">{{ $situacao->situacao }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Espécie -->
                            <div class="col-span-12 md:col-span-6">
                                <x-input-label for="especie_id" :value="__('Espécie')" class="mb-1 " />
                                <select wire:model="especie_id" id="especie_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="">--- Selecione ---</option>
                                    @foreach ($especies as $especie)
                                        <option value="{{ $especie->id }}">{{ $especie->esNome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Raça -->
                            <div class="col-span-12 md:col-span-6">
                                <x-input-label for="raca_id" :value="__('Raça')" class="mb-1 " />
                                <select wire:model="raca_id" id="raca_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="">--- Selecione ---</option>
                                    @foreach ($racas as $raca)
                                        <option value="{{ $raca->id }}">{{ $raca->racaNome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tamanho -->
                            <div class="col-span-12 md:col-span-6">
                                <x-input-label for="tamanho_id" :value="__('Tamanho')" class="mb-1 " />
                                <select wire:model="tamanho_id" id="tamanho_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="">--- Selecione ---</option>
                                    @foreach ($tamanhos as $tamanho)
                                        <option value="{{ $tamanho->id }}">{{ $tamanho->tamanho }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Cor -->
                            <div class="col-span-12 md:col-span-6">
                                <x-input-label for="cor_id" :value="__('Cor')" class="mb-1 " />
                                <select wire:model="cor_id" id="cor_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="">--- Selecione ---</option>
                                    @foreach ($cores as $cor)
                                        <option value="{{ $cor->id }}">{{ $cor->cor }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Data -->
                            <div class="col-span-12 md:col-span-6">
                                <x-input-label for="anData" :value="__('Data')" class="mb-1 " />
                                <input
                                    type="date"
                                    wire:model="anData"
                                    class="bg-white dark:bg-gray-900 dark:border-gray-600 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date"
                                >
                            </div>

                            <!-- Nome -->
                            <div class="col-span-12 md:col-span-6">
                                <x-input-label for="anNome" :value="__('Nome')" />
                                <x-text-input wire:model="anNome" id="anNome" class="block mt-1 w-full" type="text" name="anNome" required autocomplete="anNome" />
                                <x-input-error :messages="$errors->get('anNome')" class="mt-2" />
                            </div>

                            <!-- Contato -->
                            <div class="col-span-12 md:col-span-6">
                                <x-input-label for="anContato" :value="__('Contato preferencial')" />
                                <x-text-input wire:model="anContato" id="anContato" class="block mt-1 w-full" type="text" name="anContato" required autocomplete="anContato" />
                                <x-input-error :messages="$errors->get('anContato')" class="mt-2" />
                            </div>

                            <!-- Descrição -->
                            <div class="col-span-12 md:col-span-12">
                                <x-input-label for="anDescricao" :value="__('Descrição*')" class="text-left" />
                                <x-textarea-input class="w-full block mt-1" rows="4" id="anDescricao" type="text" name="anDescricao" :value="old('anDescricao')" autocomplete="anDescricao" required>
                                </x-textarea-input>
                            </div>

                            <div class="col-span-12 md:col-span-12">
                                <input id="anFoto" type="file" class="block mt-2 w-full" onchange="updateAnFoto(this)">
                            </div>

                            <!-- Latitude -->
                            <div class="col-span-12 md:col-span-12">
                                <x-input-label for="" :value="__('Localização*')" class="mb-2 text-left" />
                                <div id="map" class="overflow-hidden border-2 border-gray-300 shadow-lg sm:rounded-lg"></div>
                                <input type="hidden" name="latitude" wire:model="latitude">
                                <input type="hidden" name="longitude" wire:model="longitude">
                            </div>
                            <!-- Longitude -->

                        </div>
                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button type="submit" class="inline-flex items-center text-white dark:text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-4">
                                {{ __('Cadastrar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <script src="{{ asset('js/mapa-cadastro.js') }}"></script>
</div>
