<?php

namespace App\Livewire\Logado\Gerenciador\Usuarios;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Illuminate\Validation\Rules;
use Livewire\Component;

class Alterar extends Component
{
    public User $usuario;
    public string $nome = '';
    public string $sobrenome = '';
    public string $telefone = '';
    public string $endereco = '';
    public string $email = '';
    public string $nivel = '';
    public string $password = '';
    public string $password_confirmation = '';

    #[Layout('layouts.app')]

    public function mount($id): void
    {
        $this->usuario = User::findOrFail($id);

        $this->nome = $this->usuario->nome;
        $this->sobrenome = $this->usuario->sobrenome;
        $this->telefone = $this->usuario->telefone;
        $this->endereco = $this->usuario->endereco;
        $this->email = $this->usuario->email;
        $this->nivel = $this->usuario->nivel;
    }

    public function render(): View
    {
        return view('livewire.logado.gerenciador.usuarios.alterar');
    }

    public function alterar(): void
    {
        $rules = [
            'nome' => ['required', 'string', 'max:191'],
            'sobrenome' => ['required', 'string', 'max:191'],
            'telefone' => ['required', 'string', 'max:15'],
            'endereco' => ['required', 'string', 'max:191'],
            'nivel' => ['required', 'string', 'in:user,admin'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->usuario->id)],
        ];

        if (!empty($this->password)) {
            $rules['password'] = ['required', 'string', 'confirmed', Rules\Password::defaults()];
            $rules['password_confirmation'] = ['required'];
        }

        $validated = $this->validate($rules);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $this->usuario->update($validated);
        session()->flash('update_success', 'Usuário atualizado com sucesso!');
        $this->redirect(route('lista.usuarios'));
    }
}
