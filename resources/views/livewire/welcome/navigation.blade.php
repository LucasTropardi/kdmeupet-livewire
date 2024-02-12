<nav x-data="{ open: false }" class="fixed top-0 w-full bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" wire:navigate>
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('publico.achados')" :active="request()->routeIs('publico.achados')" wire:navigate>
                        {{ __('Achados') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('publico.perdidos')" :active="request()->routeIs('publico.perdidos')" wire:navigate>
                        {{ __('Perdidos') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('publico.adotar')" :active="request()->routeIs('publico.adotar')" wire:navigate>
                        {{ __('Adotar') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('publico.parcerias')" :active="request()->routeIs('publico.parcerias')" wire:navigate>
                        {{ __('Parcerias') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('publico.localizacoes')" :active="request()->routeIs('publico.localizacoes')" wire:navigate>
                        {{ __('Localizações') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{{ json_encode(['name' => '<span class=\'fa-regular fa-circle-user text-2xl\'></span>']) }}" x-html="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('register')" wire:navigate>
                            {{ __('Cadastre-se') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <x-dropdown-link :href="route('login')" wire:navigate>
                            {{ __('Entrar') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('publico.achados')" :active="request()->routeIs('publico.achados')" wire:navigate>
                {{ __('Achados') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('publico.perdidos')" :active="request()->routeIs('publico.perdidos')" wire:navigate>
                {{ __('Perdidos') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('publico.adotar')" :active="request()->routeIs('publico.adotar')" wire:navigate>
                {{ __('Adotar') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('publico.parcerias')" :active="request()->routeIs('publico.parcerias')" wire:navigate>
                {{ __('Parcerias') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('register')" wire:navigate>
                    {{ __('Cadastre-se') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <x-responsive-nav-link :href="route('register')" wire:navigate>
                    {{ __('Entrar') }}
                </x-responsive-nav-link>
            </div>
        </div>
    </div>
</nav>
{{-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-end z-10">
    @auth
        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Register</a>
        @endif
    @endauth
</div> --}}
