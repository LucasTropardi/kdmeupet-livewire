<?php

namespace App\Livewire\Logado\Gerenciador\Tamanhos;

use App\Models\Tamanho;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Traits\Deletable;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    use Deletable;

    public $tamanhoId;
    public $open = false;

    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.logado.gerenciador.tamanhos.index', [
            'tamanhos' => Tamanho::orderBy('id', 'asc')->paginate(10),
        ]);
    }

    public function setTamanhoId($tamanhoId)
    {
        $this->tamanhoId = $tamanhoId;
    }


    public function excluirTamanho()
    {
        if ($this->tamanhoId) {
            $tamanho = Tamanho::findOrFail($this->tamanhoId);

            if ($tamanho) {
                $result = $this->deleteRegistro($tamanho);

                if ($result['success']) {
                    Session::flash('success', 'Registro excluído com sucesso!');
                } else {
                    Session::flash('error', 'Erro ao apagar registro: ' . $result['message']);
                }
            }

            // Feche o modal
            $this->open = false;
            $this->redirect(route('lista.tamanhos'));
        }
    }

}
