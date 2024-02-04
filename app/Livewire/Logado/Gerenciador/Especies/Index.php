<?php

namespace App\Livewire\Logado\Gerenciador\Especies;

use App\Models\Especie;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Traits\Deletable;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    use Deletable;

    public $especieId;
    public $open = false;

    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.logado.gerenciador.especies.index', [
            'especies' => Especie::orderBy('id', 'asc')->paginate(10),
        ]);
    }

    public function setEspecieId($especieId)
    {
        $this->especieId = $especieId;
    }


    public function excluirEspecie()
    {
        if ($this->especieId) {
            $especie = Especie::findOrFail($this->especieId);

            if ($especie) {
                $result = $this->deleteRegistro($especie);

                if ($result['success']) {
                    Session::flash('success', 'Registro excluído com sucesso!');
                } else {
                    Session::flash('error', 'Erro ao apagar registro: ' . $result['message']);
                }
            }

            // Feche o modal
            $this->open = false;
            $this->redirect(route('lista.especies'));
        }
    }

}
