<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
        {{ __('Editar raça') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 dark:bg-gray-900">
        <div class="bg-gray-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-600 dark:text-gray-100">
            <div class="bg-blue-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-500 dark:text-gray-100">
                <div class="p-4 sm:p-8 bg-white sm:rounded-lg dark:bg-gray-800 dark:text-gray-100">
                    <form wire:submit="alterar">
                        <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">
                            <!-- Raça -->
                            <div class="col-span-12 md:col-span-6">
                                <x-input-label for="racaNome" :value="__('Raça')" />
                                <x-text-input wire:model="racaNome" id="racaNome" class="block mt-1 w-full" type="text" name="racaNome" required autofocus autocomplete="racaNome" />
                                <x-input-error :messages="$errors->get('racaNome')" class="mt-2" />
                            </div>

                            <!-- Espécie -->
                            <div class="col-span-12 md:col-span-6">
                                <x-input-label for="especie_id" :value="__('Espécie')" class="mb-1 " />
                                <select wire:model="especie_id" id="especie_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="admin">--- Selecione ---</option>
                                    @foreach ($especies as $especie)
                                        <option value="{{ $especie->id }}">{{ $especie->esNome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-4">
                                {{ __('Salvar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
