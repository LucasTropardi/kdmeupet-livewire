<?php

namespace App\Livewire\Logado\Gerenciador\Especies;

use App\Models\Especie;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Alterar extends Component
{
    public Especie $especie;
    public string $esNome = '';

    #[Layout('layouts.app')]

    public function mount($id): void
    {
        $this->especie = Especie::findOrFail($id);

        $this->esNome = $this->especie->esNome;
    }

    public function render(): View
    {
        return view('livewire.logado.gerenciador.especies.alterar');
    }

    public function alterar(): void
    {
        $rules = [
            'esNome' => ['required', 'string', 'max:191', Rule::unique(Especie::class)->ignore($this->especie->id)],
        ];

        $validated = $this->validate($rules);

        $this->especie->update($validated);
        session()->flash('update_success', 'Espécie atualizada com sucesso!');
        $this->redirect(route('lista.especies'));
    }
}
