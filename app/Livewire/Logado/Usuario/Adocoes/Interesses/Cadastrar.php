<?php

namespace App\Livewire\Logado\Usuario\Adocoes\Interesses;

use App\Models\AdocaoInteresse;
use App\Models\Adocao;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Cadastrar extends Component
{
    public string $adiMensagem;
    public string $adiContato;
    public $adiDataCadastro;
    public $adiFinalizado;
    public $adocao_id;
    public $user_id;
    public $adocao;

    #[Layout('layouts.app')]

    public function mount($id)
    {
        $this->adiDataCadastro = date('d/m/Y');
        $this->user_id = Auth::user()->id;
        $this->adocao = Adocao::findOrFail($id);
        $this->adocao_id = $this->adocao->id;
        $this->adiFinalizado = 0;
    }

    public function render():View
    {
        return view('livewire.logado.usuario.adocoes.interesses.cadastrar');
    }

    public function cadastrar(): void
    {
        $validated = $this->validate([
            'adiMensagem' => ['required', 'string', 'max:191'],
            'adiContato' => ['required', 'string', 'max:191'],
            'adiDataCadastro' => ['required'],
            'adocao_id' => ['required'],
            'user_id' => ['required'],
            'adiFinalizado' => ['required'],
        ]);

        if (AdocaoInteresse::create($validated)) {
            session()->flash('new_success', 'Solicitação enviada com sucesso!');
            $this->redirect(route('adocao.ver', $this->adocao_id));
        }
    }
}
