<?php

namespace App\Livewire\Logado\Gerenciador\Especies;

use App\Models\Especie;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Cadastrar extends Component
{
    public string $esNome = '';

    #[Layout('layouts.app')]

    public function render():View
    {
        return view('livewire.logado.gerenciador.especies.cadastrar');
    }

    public function cadastrar(): void
    {
        $validated = $this->validate([
            'esNome' => ['required', 'string', 'max:191', 'unique:'.Especie::class],
        ]);

        if (Especie::create($validated)) {
            session()->flash('new_success', 'Espécie cadastrada com sucesso!');
            $this->redirect(route('lista.especies'));
        }
    }
}
