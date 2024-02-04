<?php

namespace App\Livewire\Logado\Gerenciador\Usuarios;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Illuminate\Validation\Rules;
use Livewire\Component;

class Cadastrar extends Component
{
    public string $nome = '';
    public string $sobrenome = '';
    public string $telefone = '';
    public string $endereco = '';
    public string $nivel = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    #[Layout('layouts.app')]

    public function render():View
    {
        return view('livewire.logado.gerenciador.usuarios.cadastrar');
    }

    public function cadastrar(): void
    {
        $validated = $this->validate([
            'nome' => ['required', 'string', 'max:191'],
            'sobrenome' => ['required', 'string', 'max:191'],
            'telefone' => ['required', 'string', 'max:15'],
            'endereco' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:191', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        session()->flash('new_success', 'Usuário cadastrado com sucesso!');

        $this->redirect(route('lista.usuarios'));
    }
}
