<?php

namespace App\Livewire\Logado\Gerenciador\Racas;

use App\Models\Raca;
use App\Models\Especie;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Cadastrar extends Component
{
    public string $racaNome = '';
    public int $especie_id;
    public $especies;

    #[Layout('layouts.app')]

    public function mount()
    {
        $this->especies = Especie::all();
    }

    public function render():View
    {
        return view('livewire.logado.gerenciador.racas.cadastrar');
    }

    public function cadastrar(): void
    {
        $validated = $this->validate([
            'racaNome' => ['required', 'string', 'max:191', 'unique:'.Raca::class],
            'especie_id' => ['required'],
        ]);

        if (Raca::create($validated)) {
            session()->flash('new_success', 'Raça cadastrada com sucesso!');
            $this->redirect(route('lista.racas'));
        }
    }
}
