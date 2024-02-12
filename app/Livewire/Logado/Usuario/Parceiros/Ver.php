<?php

namespace App\Livewire\Logado\Usuario\Parceiros;

use App\Models\Parceria;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Ver extends Component
{
    public $parceriaId;
    public $open = false;
    public $parceria;
    public $parDataCadastro = false;
    public $parNome;
    public $parEmail;
    public $parTelefone;
    public $parEndereco;
    public $parImagem;
    public $parDescricao;
    public $parMensagem;

    #[Layout('layouts.app')]

    public function mount($id)
    {
        $this->parceria = Parceria::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.logado.usuario.parceiros.ver');
    }

    public function setParceriaId($parceriaId)
    {
        $this->parceriaId = $parceriaId;
    }

    public function aprovar()
    {
        $parceria = Parceria::findOrFail($this->parceriaId);
        if ($parceria->update([
            'parAprovado' => 1,
        ])) {
            session()->flash('update_success', 'Parceria aprovada!');
            return redirect(route('parceiros.gerenciador'));
        }
    }
}
