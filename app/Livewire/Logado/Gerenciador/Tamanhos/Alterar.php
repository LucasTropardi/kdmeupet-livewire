<?php

namespace App\Livewire\Logado\Gerenciador\Tamanhos;

use App\Models\Tamanho;
use App\Models\Especie;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Alterar extends Component
{
    public Tamanho $size;
    public string $tamanho = '';
    public int $especie_id;
    public $especies;

    #[Layout('layouts.app')]

    public function mount($id): void
    {
        $this->size = Tamanho::findOrFail($id);
        $this->especies = Especie::all();

        $this->tamanho = $this->size->tamanho;
        $this->especie_id = $this->size->especie_id;
    }

    public function render(): View
    {
        return view('livewire.logado.gerenciador.tamanhos.alterar');
    }

    public function alterar(): void
    {
        $rules = [
            'tamanho' => ['required', 'string', 'max:191'],
            'especie_id' => ['required'],
        ];

        $validated = $this->validate($rules);

        $this->size->update($validated);
        session()->flash('update_success', 'Tamanho atualizado com sucesso!');
        $this->redirect(route('lista.tamanhos'));
    }
}

