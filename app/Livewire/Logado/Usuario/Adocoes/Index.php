<?php

namespace App\Livewire\Logado\Usuario\Adocoes;

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
        return view('livewire.logado.usuario.adocoes.index', [
            'adocoes' => Adocao::where('adFinalizado', 0)
                ->where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->paginate(10),
            'countAdocoes' => Adocao::where('adFinalizado', 0)
                ->where('user_id', Auth::user()->id)
                ->count(),
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
            return redirect(route('lista.adocoes'));
        }
    }
}
