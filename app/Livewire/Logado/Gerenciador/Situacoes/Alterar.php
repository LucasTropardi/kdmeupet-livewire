<?php

namespace App\Livewire\Logado\Gerenciador\Situacoes;

use App\Models\Situacao;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Alterar extends Component
{
    public Situacao $situacion;
    public string $situacao = '';

    #[Layout('layouts.app')]

    public function mount($id): void
    {
        $this->situacion = Situacao::findOrFail($id);

        $this->situacao = $this->situacion->situacao;
    }

    public function render(): View
    {
        return view('livewire.logado.gerenciador.situacoes.alterar');
    }

    public function alterar(): void
    {
        $rules = [
            'situacao' => ['required', 'string', 'max:191', Rule::unique(Situacao::class)->ignore($this->situacion->id)],
        ];

        $validated = $this->validate($rules);

        $this->situacion->update($validated);
        session()->flash('update_success', 'Situação atualizada com sucesso!');
        $this->redirect(route('lista.situacoes'));
    }
}
