<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
        {{ __('Editar parceria') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 dark:bg-gray-900">
        <div class="bg-gray-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-600 dark:text-gray-100">
            <div class="bg-blue-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-500 dark:text-gray-100">
                <div class="p-4 sm:p-8 bg-white sm:rounded-lg dark:bg-gray-800 dark:text-gray-100">
                    <form wire:submit="alterar" enctype="multipart/form-data">
                        <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">
                            <!-- Nome -->
                            <div class="col-span-12 md:col-span-12">
                                <x-input-label for="parNome" :value="__('Nome da parceria')" />
                                <x-text-input wire:model="parNome" id="parNome" class="block mt-1 w-full" type="text" name="parNome" required autofocus autocomplete="parNome" />
                                <x-input-error :messages="$errors->get('parNome')" class="mt-2" />
                            </div>

                            <!-- Data -->
                            <div class="col-span-12 md:col-span-6">
                                <x-input-label for="parDataCadastro" :value="__('Data')" class="mb-1 " />
                                <input
                                    type="text"
                                    wire:model="parDataCadastro"
                                    name="parDataCadastro"
                                    id="parDataCadastro"
                                    class="bg-white dark:bg-gray-900 dark:border-gray-600 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Selecione"
                                >
                            </div>

                            <!-- E-mail -->
                            <div class="col-span-12 md:col-span-6">
                                <x-input-label for="parEmail" :value="__('E-mail')" />
                                <x-text-input wire:model="parEmail" id="parEmail" class="block mt-1 w-full" type="text" name="parEmail" required autocomplete="parEmail" />
                                <x-input-error :messages="$errors->get('parEmail')" class="mt-2" />
                            </div>

                            <!-- Endereço -->
                            <div class="col-span-12 md:col-span-12">
                                <x-input-label for="parEndereco" :value="__('Endereço')" />
                                <x-text-input wire:model="parEndereco" id="parEndereco" class="block mt-1 w-full" type="text" name="parEndereco" required autocomplete="parEndereco" />
                                <x-input-error :messages="$errors->get('parEndereco')" class="mt-2" />
                            </div>

                            <!-- Telefone -->
                            <div class="col-span-12 md:col-span-6">
                                <x-input-label for="parTelefone" :value="__('Telefone')" />
                                <x-text-input wire:model="parTelefone" id="parTelefone" class="block mt-1 w-full" type="text" name="parTelefone" required autocomplete="parTelefone" />
                                <x-input-error :messages="$errors->get('parTelefone')" class="mt-2" />
                            </div>

                            <!-- Foto -->
                            <div class="col-span-12 md:col-span-6">
                                <x-upload-imagem id="anFoto" wire:model="parImagem" class="block mt-2 w-full" />
                            </div>

                            <!-- Descrição -->
                            <div class="col-span-12 md:col-span-12">
                                <x-input-label for="parDescricao" :value="__('Descrição')" class="text-left" />
                                <x-textarea-input class="w-full block mt-1" rows="4" id="parDescricao" type="text" wire:model="parDescricao" :value="old('parDescricao')" autocomplete="parDescricao" required>
                                </x-textarea-input>
                            </div>

                            <!-- Mensagem -->
                            <div class="col-span-12 md:col-span-12">
                                <x-input-label for="parMensagem" :value="__('Mensagem')" />
                                <x-text-input wire:model="parMensagem" id="parMensagem" class="block mt-1 w-full" type="text" name="parMensagem" required autocomplete="parMensagem" />
                                <x-input-error :messages="$errors->get('parMensagem')" class="mt-2" />
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
        flatpickr("#parDataCadastro", {
            dateFormat: "d/m/Y",
            locale: "pt",
        });
    </script>
</div>
