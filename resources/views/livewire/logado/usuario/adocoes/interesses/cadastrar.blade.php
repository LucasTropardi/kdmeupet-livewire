<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
        {{ __('Interesse em adotar') }}
    </h2>
</x-slot>

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 dark:bg-gray-900">
        <div class="bg-gray-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-600 dark:text-gray-100">
            <div class="bg-blue-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-500 dark:text-gray-100">
                <div class="p-4 sm:p-8 bg-white sm:rounded-lg dark:bg-gray-800 dark:text-gray-100">
                    <form wire:submit="cadastrar">
                        <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">
                            <!-- Contato -->
                            <div class="col-span-12 md:col-span-12">
                                <x-input-label for="adiContato" :value="__('Contato')" />
                                <x-text-input wire:model="adiContato" id="adiContato" class="block mt-1 w-full" type="text" name="adiContato" required autofocus autocomplete="adiContato" />
                                <x-input-error :messages="$errors->get('adiContato')" class="mt-2" />
                            </div>
                            <!-- Mensagem -->
                            <div class="col-span-12 md:col-span-12">
                                <x-input-label for="adiMensagem" :value="__('Mensagem para o autor da publicação')" />
                                <x-text-input wire:model="adiMensagem" id="adiMensagem" class="block mt-1 w-full" type="text" name="adiMensagem" max="191" required autocomplete="adiMensagem" />
                                <x-input-error :messages="$errors->get('adiMensagem')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button class="text-white dark:text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-4">
                                {{ __('Enviar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
