<?php

namespace App\Livewire\Logado\Gerenciador\Situacoes;

use App\Models\Situacao;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Cadastrar extends Component
{
    public string $situacao = '';

    #[Layout('layouts.app')]

    public function render():View
    {
        return view('livewire.logado.gerenciador.situacoes.cadastrar');
    }

    public function cadastrar(): void
    {
        $validated = $this->validate([
            'situacao' => ['required', 'string', 'max:191', 'unique:'.Situacao::class],
        ]);

        if (Situacao::create($validated)) {
            session()->flash('new_success', 'Situação cadastrada com sucesso!');
            $this->redirect(route('lista.situacoes'));
        }
    }
}
