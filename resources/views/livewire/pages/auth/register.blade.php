<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $nome = '';
    public string $sobrenome = '';
    public string $telefone = '';
    public string $endereco = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'nome' => ['required', 'string', 'max:191'],
            'sobrenome' => ['required', 'string', 'max:191'],
            'telefone' => ['required', 'string', 'max:15'],
            'endereco' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register">
        <!-- Nome -->
        <div>
            <x-input-label for="nome" :value="__('Nome')" />
            <x-text-input wire:model="nome" id="nome" class="block mt-1 w-full" type="text" name="nome" required autofocus autocomplete="nome" />
            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
        </div>

        <!-- Sobrenome -->
        <div class="mt-4">
            <x-input-label for="sobrenome" :value="__('Sobrenome')" />
            <x-text-input wire:model="sobrenome" id="sobrenome" class="block mt-1 w-full" type="text" name="sobrenome" required autocomplete="sobrenome" />
            <x-input-error :messages="$errors->get('sobrenome')" class="mt-2" />
        </div>

        <!-- Endereço -->
        <div class="mt-4">
            <x-input-label for="endereco" :value="__('Endereço')" />
            <x-text-input wire:model="endereco" id="endereco" class="block mt-1 w-full" type="text" name="endereco" required autocomplete="endereco" />
            <x-input-error :messages="$errors->get('endereco')" class="mt-2" />
        </div>

        <!-- Telefone -->
        <div class="mt-4">
            <x-input-label for="telefone" :value="__('Telefone')" />
            <x-text-input wire:model="telefone" id="telefone" class="block mt-1 w-full" type="text" name="telefone" required autocomplete="telefone" />
            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme a Senha')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-3">
            <a class="mt-4 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Já possui cadastro?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Salvar') }}
            </x-primary-button>
        </div>
    </form>
</div>
