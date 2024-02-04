<?php

namespace App\Livewire\Logado\Gerenciador\Tamanhos;

use App\Models\Tamanho;
use App\Models\Especie;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Cadastrar extends Component
{
    public string $tamanho = '';
    public int $especie_id;
    public $especies;

    #[Layout('layouts.app')]

    public function mount()
    {
        $this->especies = Especie::all();
    }

    public function render():View
    {
        return view('livewire.logado.gerenciador.tamanhos.cadastrar');
    }

    public function cadastrar(): void
    {
        $validated = $this->validate([
            'tamanho' => ['required', 'string', 'max:191'],
            'especie_id' => ['required'],
        ]);

        if (Tamanho::create($validated)) {
            session()->flash('new_success', 'Tamanho cadastrado com sucesso!');
            $this->redirect(route('lista.tamanhos'));
        }
    }
}
