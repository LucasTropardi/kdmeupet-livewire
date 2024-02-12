<?php

namespace App\Livewire\Logado\Gerenciador\Adocoes;

use App\Models\Adocao;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    public $adocaoId;
    public $open = false;
    public $id;

    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.logado.gerenciador.adocoes.index', [
            'adocoes' => Adocao::where('adFinalizado', 0)
                ->orderBy('id', 'desc')
                ->paginate(10),
        ]);
    }

    public function setAdocaoId($adocaoId)
    {
        $this->adocaoId = $adocaoId;
    }

    public function finalizar()
    {
        $adocao = Adocao::findOrFail($this->adocaoId);
        if ($adocao->update([
            'adFinalizado' => 1,
        ])) {
            session()->flash('success', 'Publicação finalizada!');
            return redirect(route('adocoes.gerenciador'));
        }
    }
}
