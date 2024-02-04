<?php

namespace App\Livewire\Logado\Gerenciador\Racas;

use App\Models\Raca;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Traits\Deletable;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    use Deletable;

    public $racaId;
    public $open = false;

    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.logado.gerenciador.racas.index', [
            'racas' => Raca::orderBy('id', 'asc')->paginate(10),
        ]);
    }

    public function setRacaId($racaId)
    {
        $this->racaId = $racaId;
    }


    public function excluirRaca()
    {
        if ($this->racaId) {
            $raca = Raca::findOrFail($this->racaId);

            if ($raca) {
                $result = $this->deleteRegistro($raca);

                if ($result['success']) {
                    Session::flash('success', 'Registro excluído com sucesso!');
                } else {
                    Session::flash('error', 'Erro ao apagar registro: ' . $result['message']);
                }
            }

            // Feche o modal
            $this->open = false;
            $this->redirect(route('lista.racas'));
        }
    }

}
