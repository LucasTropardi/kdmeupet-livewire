<?php

namespace App\Livewire\Logado\Usuario\Adocoes\Interesses;

use App\Models\Adocao;
use App\Models\AdocaoInteresse;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    public $adocaoInteresseId;
    public $open = false;
    public $id;
    public $adocao;

    #[Layout('layouts.app')]

    public function mount($id)
    {
        $this->adocao = Adocao::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.logado.usuario.adocoes.interesses.index', [
            'interesses' => AdocaoInteresse::where('adiFinalizado', '0')
                ->orderBy('id', 'asc')
                ->where('adocao_id', $this->adocao->id)
                ->paginate(10),
        ]);
    }

    public function setAdocaoInteresseId($adocaoInteresseId)
    {
        $this->adocaoInteresseId = $adocaoInteresseId;
    }

    public function finalizar()
    {
        $interesse = AdocaoInteresse::findOrFail($this->adocaoInteresseId);
        if ($interesse->update([
            'adiFinalizado' => 1,
        ])) {
            session()->flash('success', 'Solicitação finalizada!');
            return redirect(route('lista.interesses', $this->adocao->id));
        }
    }
}
