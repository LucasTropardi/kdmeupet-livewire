<?php

namespace App\Livewire\Logado\Gerenciador\Cores;

use App\Models\Cor;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Cadastrar extends Component
{
    public string $cor = '';

    #[Layout('layouts.app')]

    public function render():View
    {
        return view('livewire.logado.gerenciador.cores.cadastrar');
    }

    public function cadastrar(): void
    {
        $validated = $this->validate([
            'cor' => ['required', 'string', 'max:191', 'unique:'.Cor::class],
        ]);

        if (Cor::create($validated)) {
            session()->flash('new_success', 'Cor cadastrada com sucesso!');
            $this->redirect(route('lista.cores'));
        }
    }
}
