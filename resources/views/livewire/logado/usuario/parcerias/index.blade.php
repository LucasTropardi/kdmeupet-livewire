
<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight text-center">
        {{ __('Nossos parceiros') }}
    </h2>
</x-slot>

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">

                    <div class="col-span-12 md:col-span-12">
                        @foreach ($parcerias as $parceria)
                            <section class="bg-gray-100 dark:bg-gray-900 rounded-lg">
                                <div class="py-4 px-4 mx-auto max-w-screen-xl text-center lg:py-4 mb-4">
                                    <div class="flex justify-center items-center mb-4">
                                        <img src="{{ asset('storage/uploads/parceiros/' . $parceria->parImagem) }}" alt="Logo" width="500" class="rounded-full">
                                    </div>
                                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{ $parceria->parNome }}</h1>
                                    <p class="mb-2 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">{{ $parceria->parDescricao }}</p>
                                    <p class="mb-2 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Telefone: {{ $parceria->parTelefone }} | E-mail: {{ $parceria->parEmail }}</p>
                                    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Endereço: {{ $parceria->parEndereco }}</p>
                                    <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">

                                    </div>
                                </div>
                            </section>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

