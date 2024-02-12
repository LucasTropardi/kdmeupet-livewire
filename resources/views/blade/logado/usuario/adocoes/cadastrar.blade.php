<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-700 dark:text-gray-300 leading-tight text-center">
            {{ __('Novo animal para adoção') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 dark:bg-gray-900">
            <div class="bg-gray-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-600 dark:text-gray-100">
                <div class="bg-blue-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-500 dark:text-gray-100">
                    <div class="p-4 sm:p-8 bg-white sm:rounded-lg dark:bg-gray-800 dark:text-gray-100">
                        <form action="{{ route('adocao.cadastrar') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">
                                <!-- User -->
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                <!-- Espécie -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label class="mb-1" for="especie_id" :value="__('Espécie')" />
                                    <x-select name="especie_id" id="especie_id" :options="$especies" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-lg shadow-sm" />
                                    <x-input-error :messages="$errors->get('especie_id')" class="mt-2" />
                                </div>

                                <!-- Raça -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label class="mb-1" for="raca_id" :value="__('Raça')" />
                                    <x-select name="raca_id" id="raca_id" :options="$racas" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-lg shadow-sm" />
                                    <x-input-error :messages="$errors->get('raca_id')" class="mt-2" />
                                </div>

                                <!-- Tamanhos -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label class="mb-1" for="tamanho_id" :value="__('Tamanho')" />
                                    <x-select name="tamanho_id" id="tamanho_id" :options="$tamanhos" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-lg shadow-sm" />
                                    <x-input-error :messages="$errors->get('tamanho_id')" class="mt-2" />
                                </div>

                                <!-- Cores -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label class="mb-1" for="cor_id" :value="__('Cor')" />
                                    <x-select name="cor_id" id="cor_id" :options="$cores" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-lg shadow-sm" />
                                    <x-input-error :messages="$errors->get('cor_id')" class="mt-2" />
                                </div>

                                <!-- Data -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label for="adDataCadastro" :value="__('Data')" class="mb-1 " />
                                    <input
                                        type="text"
                                        name="adDataCadastro"
                                        id="adDataCadastro"
                                        value="{{ $hoje }}"
                                        class="bg-white dark:bg-gray-900 dark:border-gray-600 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Selecione"
                                    >
                                </div>

                                <!-- Nome -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label for="adNome" :value="__('Nome')" />
                                    <x-text-input name="adNome" id="adNome" class="block mt-1 w-full" type="text" name="adNome" required autocomplete="adNome" />
                                    <x-input-error :messages="$errors->get('adNome')" class="mt-2" />
                                </div>

                                <!-- Idade -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label for="adIdade" :value="__('Idade')" />
                                    <x-text-input name="adIdade" id="adIdade" class="block mt-1 w-full" type="text" name="adIdade" required autocomplete="adIdade" />
                                    <x-input-error :messages="$errors->get('adIdade')" class="mt-2" />
                                </div>

                                <!-- Contato -->
                                <div class="col-span-12 md:col-span-6">
                                    <x-input-label for="adContato" :value="__('Contato preferencial')" />
                                    <x-text-input name="adContato" id="adContato" class="block mt-1 w-full" type="text" name="adContato" required autocomplete="adContato" />
                                    <x-input-error :messages="$errors->get('adContato')" class="mt-2" />
                                </div>

                                <!-- Endereço -->
                                <div class="col-span-12 md:col-span-12">
                                    <x-input-label for="adEndereco" :value="__('Endereço')" />
                                    <x-text-input name="adEndereco" id="adEndereco" class="block mt-1 w-full" type="text" name="adEndereco" required autocomplete="adEndereco" />
                                    <x-input-error :messages="$errors->get('adEndereco')" class="mt-2" />
                                </div>

                                <div class="col-span-12 md:col-span-12">
                                    <x-upload-imagem id="adImagem" inputName="adImagem" class="block mt-2 w-full" required />
                                </div>

                                <!-- Descrição -->
                                <div class="col-span-12 md:col-span-12">
                                    <x-input-label for="adDescricao" :value="__('Descrição')" class="text-left" />
                                    <x-textarea-input class="w-full block mt-1" rows="3" id="adDescricao" type="text" name="adDescricao" :value="old('adDescricao')" autocomplete="adDescricao" required>
                                    </x-textarea-input>
                                </div>

                            </div>
                            <div class="flex items-center justify-end mt-6">
                                <x-primary-button class="text-white dark:text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-4">
                                    {{ __('Cadastrar') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script>
            flatpickr("#adDataCadastro", {
                dateFormat: "d/m/Y",
                locale: "pt",
            });
        </script>
    </div>
</x-app-layout>
