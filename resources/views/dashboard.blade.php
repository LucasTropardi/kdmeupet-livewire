<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <h5 class="mt-2 mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Área de Gerenciamento</h5>
                    <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">
                        <!-- Nome -->
                        <div class="col-span-12 md:col-span-4">
                            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Usuários</h5>
                                <div class="flex justify-center items-center mb-2">
                                    <img src="{{ asset('images/users.png') }}" alt="Logo" width="120">
                                </div>
                                <x-external-button route="{{ route('lista.usuarios') }}" class="text-white uppercase bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                    Acessar
                                </x-external-button>
                            </div>
                        </div>

                        <div class="col-span-12 md:col-span-4">
                            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Usuários</h5>
                                <div class="flex justify-center items-center mb-2">
                                    <img src="{{ asset('images/users.png') }}" alt="Logo" width="120">
                                </div>
                                <x-external-button route="{{ route('lista.usuarios') }}" class="text-white uppercase bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                    Acessar
                                </x-external-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
