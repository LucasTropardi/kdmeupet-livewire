<?php

namespace App\Livewire\Publico\Adocoes;

use App\Models\Adocao;
use App\Models\AdocaoMensagem;
use App\Models\AdocaoInteresse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class Ver extends Component
{

    public $adocaoId;
    public $open = false;
    public $adocao;
    public $adocao_id;
    public $user_id;
    public $admConteudo;
    public $admData;
    public $countMensagem;
    public $mensagemId;
    public $countInteresses;

    #[Layout('layouts.guest')]

    public function mount($id)
    {
        $this->adocao = Adocao::findOrFail($id);
        $this->user_id = $this->adocao->user_id;
        $this->adocao_id = $this->adocao->id;
        $this->admData = Carbon::now();
        $this->countMensagem = AdocaoMensagem::count();
        $this->countInteresses = AdocaoInteresse::where('adiFinalizado', 0)->where('adocao_id', $this->adocao->id)->count();
    }

    public function render()
    {
        return view('livewire.publico.adocoes.ver', [
            'mensagens' => AdocaoMensagem::where('adocao_id', $this->adocao_id)->orderBy('created_at', 'desc')->paginate(2),
        ]);
    }

    public function setAdocaoId($adocaoId)
    {
        $this->adocaoId = $adocaoId;
    }

    public function escreverMensagem()
    {
        $validated = $this->validate([
            'admConteudo' => ['required', 'string', 'max:600'],
        ]);

        $mensagem = AdocaoMensagem::create([
            'user_id' => $this->user_id,
            'adocao_id' => $this->adocao_id,
            'admConteudo' => $validated['admConteudo'],
            'admData' => $this->admData,
        ]);

        if ($mensagem) {
            session()->flash('new_success', 'Mensagem enviada com sucesso!');
            $this->redirect(route('adocao.ver', $this->adocao->id));
        }
    }

    public function setMensagemId($mensagemId)
    {
        $this->mensagemId = $mensagemId;
    }


    public function excluirMensagem()
    {
        if ($this->mensagemId) {
            $mensagem = AdocaoMensagem::findOrFail($this->mensagemId);

            if ($mensagem) {
                $result = $this->deleteRegistro($mensagem);

                if ($result['success']) {
                    Session::flash('success', 'Comentário excluído com sucesso!');
                } else {
                    Session::flash('error', 'Erro ao apagar registro: ' . $result['message']);
                }
            }

            // Feche o modal
            $this->open = false;
            $this->redirect(route('adocao.ver', $this->adocao_id));
        }
    }
}
