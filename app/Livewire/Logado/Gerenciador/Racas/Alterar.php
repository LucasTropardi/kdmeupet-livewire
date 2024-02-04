<?php

namespace App\Livewire\Logado\Gerenciador\Racas;

use App\Models\Raca;
use App\Models\Especie;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Alterar extends Component
{
    public Raca $raca;
    public string $racaNome = '';
    public int $especie_id;
    public $especies;

    #[Layout('layouts.app')]

    public function mount($id): void
    {
        $this->raca = Raca::findOrFail($id);
        $this->especies = Especie::all();

        $this->racaNome = $this->raca->racaNome;
        $this->especie_id = $this->raca->especie_id;
    }

    public function render(): View
    {
        return view('livewire.logado.gerenciador.racas.alterar');
    }

    public function alterar(): void
    {
        $rules = [
            'racaNome' => ['required', 'string', 'max:191', Rule::unique(Raca::class)->ignore($this->raca->id)],
            'especie_id' => ['required'],
        ];

        $validated = $this->validate($rules);

        $this->raca->update($validated);
        session()->flash('update_success', 'Raça atualizada com sucesso!');
        $this->redirect(route('lista.racas'));
    }
}
