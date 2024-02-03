<?php

namespace App\Livewire\Logado\Gerenciador\Usuarios;


use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Traits\Deletable;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    use Deletable;

    public $userId;
    public $open = false;

    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.logado.gerenciador.usuarios.index', [
            'usuarios' => User::orderBy('nome', 'asc')->paginate(10),
        ]);
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function excluirUsuario()
    {
        if ($this->userId) {
            $user = User::find($this->userId);

            if ($user) {
                $result = $this->deleteRegistro($user);

                if ($result['success']) {
                    Session::flash('success', 'Registro excluído com sucesso!');
                } else {
                    Session::flash('error', 'Erro ao apagar registro: ' . $result['message']);
                }
            }

            // Feche o modal
            $this->open = false;
            $this->redirect(route('lista.usuarios'));
        }
    }

}
