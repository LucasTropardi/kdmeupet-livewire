<?php

namespace App\Livewire\Logado\Gerenciador\Situacoes;

use App\Models\Situacao;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Traits\Deletable;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    use Deletable;

    public $situacaoId;
    public $situacoes;
    public $open = false;

    #[Layout('layouts.app')]

    public function mount()
    {
        $this->situacoes = Situacao::All();
    }

    public function render()
    {
        return view('livewire.logado.gerenciador.situacoes.index');
    }

    public function setSituacaoId($situacaoId)
    {
        $this->situacaoId = $situacaoId;
    }


    public function excluirSituacao()
    {
        if ($this->situacaoId) {
            $situacao = Situacao::findOrFail($this->situacaoId);

            if ($situacao) {
                $result = $this->deleteRegistro($situacao);

                if ($result['success']) {
                    Session::flash('success', 'Registro excluído com sucesso!');
                } else {
                    Session::flash('error', 'Erro ao apagar registro: ' . $result['message']);
                }
            }

            // Feche o modal
            $this->open = false;
            $this->redirect(route('lista.situacoes'));
        }
    }

}
