<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
        {{ __('Editar usuário') }}
    </h2>
</x-slot>

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 dark:bg-gray-900">
        <div class="bg-gray-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-600 dark:text-gray-100">
            <div class="bg-blue-300 shadow sm:rounded-lg p-1.5 dark:bg-gray-500 dark:text-gray-100">
                <div class="p-4 sm:p-8 bg-white sm:rounded-lg dark:bg-gray-800 dark:text-gray-100">
                    <form wire:submit="alterar">
                        <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">
                            <!-- Nome -->
                            <div class="col-span-12 md:col-span-6">
                                <x-input-label for="nome" :value="__('Nome')" />
                                <x-text-input wire:model="nome" id="nome" class="block mt-1 w-full" type="text" name="nome" required autofocus autocomplete="nome" />
                                <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                            </div>

                            <!-- Sobrenome -->
                            <div class="col-span-12 md:col-span-6">
                                <x-input-label for="sobrenome" :value="__('Sobrenome')" />
                                <x-text-input wire:model="sobrenome" id="sobrenome" class="block mt-1 w-full" type="text" name="sobrenome" required autocomplete="sobrenome" />
                                <x-input-error :messages="$errors->get('sobrenome')" class="mt-2" />
                            </div>

                            <!-- Telefone -->
                            <div class="mt-4 col-span-12 md:col-span-6">
                                <x-input-label for="telefone" :value="__('Telefone')" />
                                <x-text-input wire:model="telefone" id="telefone" class="block mt-1 w-full" type="text" name="telefone" maxlength="15" required autocomplete="telefone" />
                                <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
                            </div>

                            <!-- Endereço -->
                            <div class="mt-4 col-span-12 md:col-span-6">
                                <x-input-label for="endereco" :value="__('Endereço')" />
                                <x-text-input wire:model="endereco" id="endereco" class="block mt-1 w-full" type="text" name="endereco" maxlength="191" required autocomplete="endereco" />
                                <x-input-error :messages="$errors->get('endereco')" class="mt-2" />
                            </div>

                            <!-- nivel -->
                            <div class="mt-4 col-span-12 md:col-span-6">
                                <x-input-label for="nivel" :value="__('Nível de acesso')" class="mb-1 " />
                                <select wire:model="nivel" id="nivel" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="user" {{ $nivel === 'user' ? 'selected' : '' }}>Usuário</option>
                                    <option value="admin" {{ $nivel === 'admin' ? 'selected' : '' }}>Gerenciador</option>
                                </select>
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4 col-span-12 md:col-span-6">
                                <x-input-label for="email" :value="__('E-mail')" />
                                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4 col-span-12 md:col-span-6">
                                <x-input-label for="password" :value="__('Senha')" />

                                <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4 col-span-12 md:col-span-6">
                                <x-input-label for="password_confirmation" :value="__('Confirme a senha')" />

                                <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                                                type="password"
                                                name="password_confirmation" autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                        </div>
                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button class="text-white dark:text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-4">
                                {{ __('Salvar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
