<?php

namespace App\Livewire\Logado\Gerenciador\Cores;

use App\Models\Cor;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Illuminate\Validation\Rules;
use Livewire\Component;

class Alterar extends Component
{
    public Cor $color;
    public string $cor = '';

    #[Layout('layouts.app')]

    public function mount($id): void
    {
        $this->color = Cor::findOrFail($id);

        $this->cor = $this->color->cor;
    }

    public function render(): View
    {
        return view('livewire.logado.gerenciador.cores.alterar');
    }

    public function alterar(): void
    {
        $rules = [
            'cor' => ['required', 'string', 'max:191', Rule::unique(Cor::class)->ignore($this->color->id)],
        ];

        $validated = $this->validate($rules);

        $this->color->update($validated);
        session()->flash('update_success', 'Cor atualizada com sucesso!');
        $this->redirect(route('lista.cores'));
    }
}
