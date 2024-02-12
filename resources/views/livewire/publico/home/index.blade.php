<div>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Página Inicial') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <h5 class="mt-2 mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Achados</h5>
                    <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">
                        @if ($countAchados == 0)
                        <div class="col-span-12 md:col-span-12">
                            <h5 class="mt-2 mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Sem animais achados no momento</h5>
                        </div>
                        @endif
                        @foreach($achados as $achado)
                            <div class="col-span-12 md:col-span-4">
                                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <div class="flex justify-center items-center" style="height: 200px;"> <!-- Defina a altura desejada aqui -->
                                        <img class="rounded-t-lg object-cover w-full h-full" src="{{ asset('storage/uploads/animais/' . $achado->anFoto) }}" alt="Imagem do animal" />
                                    </div>
                                    <div class="p-5">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" style="height: 3.5rem;">{{ $achado->anNome }}</h5>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" style="height: 4rem;">{{ $achado->anDescricao }}</p>
                                        <a href="{{ route('publico.animal.ver', $achado->id) }}" class="uppercase inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Detalhes
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ($countAchados > 0)
                            <div class="col-span-12 md:col-span-4">
                                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <div class="flex justify-center items-center" style="height: 200px;"> <!-- Defina a altura desejada aqui -->
                                        <img class="rounded-t-lg object-cover w-full h-full" src="{{ asset('images/ver-mais1.png') }}" alt="Imagem do animal" />
                                    </div>
                                    <div class="p-5">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" style="height: 3.5rem;">Página Achados</h5>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" style="height: 4rem;">Veja todos os animais achados que foram publicados em nosso site</p>
                                        <a href="{{ route('publico.achados') }}" class="uppercase inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Acessar
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <h5 class="mt-2 mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Perdidos</h5>
                    <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">
                        @if ($countPerdidos == 0)
                        <div class="col-span-12 md:col-span-12">
                            <h5 class="mt-2 mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Sem animais perdidos no momento</h5>
                        </div>
                        @endif
                        @foreach($perdidos as $perdido)
                            <div class="col-span-12 md:col-span-4">
                                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <div class="flex justify-center items-center" style="height: 200px;"> <!-- Defina a altura desejada aqui -->
                                        <img class="rounded-t-lg object-cover w-full h-full" src="{{ asset('storage/uploads/animais/' . $perdido->anFoto) }}" alt="Imagem do animal" />
                                    </div>
                                    <div class="p-5">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" style="height: 3.5rem;">{{ $perdido->anNome }}</h5>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" style="height: 4rem;">{{ $perdido->anDescricao }}</p>
                                        <a href="{{ route('publico.animal.ver', $perdido->id) }}" class="uppercase inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Detalhes
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ($countPerdidos > 0)
                            <div class="col-span-12 md:col-span-4">
                                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <div class="flex justify-center items-center" style="height: 200px;"> <!-- Defina a altura desejada aqui -->
                                        <img class="rounded-t-lg object-cover w-full h-full" src="{{ asset('images/ver-mais1.png') }}" alt="Imagem do animal" />
                                    </div>
                                    <div class="p-5">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" style="height: 3.5rem;">Página Perdidos</h5>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" style="height: 4rem;">Veja todos os animais perdidos que foram publicados em nosso site</p>
                                        <a href="{{ route('publico.perdidos') }}" class="uppercase inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Acessar
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <h5 class="mt-2 mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Adoções</h5>
                    <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">
                        @if ($countAdocoes == 0)
                        <div class="col-span-12 md:col-span-12">
                            <h5 class="mt-2 mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Sem animais disponíveis no momento</h5>
                        </div>
                        @endif
                        @foreach($adocoes as $adocao)
                            <div class="col-span-12 md:col-span-4">
                                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <div class="flex justify-center items-center" style="height: 200px;"> <!-- Defina a altura desejada aqui -->
                                        <img class="rounded-t-lg object-cover w-full h-full" src="{{ asset('storage/uploads/adocoes/' . $adocao->adImagem) }}" alt="Imagem do animal" />
                                    </div>
                                    <div class="p-5">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" style="height: 3.5rem;">{{ $adocao->adNome }}</h5>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" style="height: 4rem;">{{ $adocao->adDescricao }}</p>
                                        <a href="{{ route('publico.adocao.ver', $adocao->id) }}" class="uppercase inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Detalhes
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ($countAdocoes > 0)
                            <div class="col-span-12 md:col-span-4">
                                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <div class="flex justify-center items-center" style="height: 200px;"> <!-- Defina a altura desejada aqui -->
                                        <img class="rounded-t-lg object-cover w-full h-full" src="{{ asset('images/ver-mais1.png') }}" alt="Imagem do animal" />
                                    </div>
                                    <div class="p-5">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" style="height: 3.5rem;">Página Adotar</h5>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" style="height: 4rem;">Veja todos os animais disponíveis para adoção em nosso site</p>
                                        <a href="{{ route('publico.adotar') }}" class="uppercase inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Acessar
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <h5 class="mt-2 mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Parcerias</h5>
                    <div class="mt-2 grid grid-cols-12 gap-4 content-center dark:bg-gray-800 dark:text-gray-100">
                        @if ($countParcerias == 0)
                        <div class="col-span-12 md:col-span-12">
                            <h5 class="mt-2 mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Sem parcerias firmadas no momento</h5>
                        </div>
                        @endif
                        @foreach ($parcerias as $parceria)
                            <div class="col-span-12 md:col-span-12">
                                <section class="bg-gray-100 dark:bg-gray-900  rounded-lg">
                                    <div class="py-4 px-4 mx-auto max-w-screen-xl text-center lg:py-4 mb-4">
                                        <div class="flex justify-center items-center mb-4">
                                            <img src="{{ asset('storage/uploads/parceiros/' . $parceria->parImagem) }}" alt="Logo" width="350" class="rounded-full">
                                        </div>
                                        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{ $parceria->parNome }}</h1>
                                        <p class="mb-2 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">{{ $parceria->parDescricao }}</p>
                                        <p class="mb-2 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Telefone: {{ $parceria->parTelefone }} | E-mail: {{ $parceria->parEmail }}</p>
                                        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Endereço: {{ $parceria->parEndereco }}</p>
                                        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">

                                        </div>
                                    </div>
                                </section>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
