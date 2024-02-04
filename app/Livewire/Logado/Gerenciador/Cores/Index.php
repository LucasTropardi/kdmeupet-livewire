<?php

namespace App\Livewire\Logado\Gerenciador\Cores;

use App\Models\Cor;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Traits\Deletable;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    use Deletable;

    public $corId;
    public $open = false;

    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.logado.gerenciador.cores.index', [
            'cores' => Cor::orderBy('id', 'asc')->paginate(10),
        ]);
    }

    public function setCorId($corId)
    {
        $this->corId = $corId;
    }


    public function excluirCor()
    {
        if ($this->corId) {
            $cor = Cor::findOrFail($this->corId);

            if ($cor) {
                $result = $this->deleteRegistro($cor);

                if ($result['success']) {
                    Session::flash('success', 'Registro excluído com sucesso!');
                } else {
                    Session::flash('error', 'Erro ao apagar registro: ' . $result['message']);
                }
            }

            // Feche o modal
            $this->open = false;
            $this->redirect(route('lista.cores'));
        }
    }

}
