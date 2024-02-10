<?php

namespace App\Livewire\Logado\Usuario\Animais;

use App\Models\Animal;
use App\Models\Mensagem;
use App\Traits\Deletable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class Ver extends Component
{
    use WithPagination;
    use Deletable;

    public $animalId;
    public $open = false;
    public $animal;
    public $animal_id;
    public $user_id;
    public $conteudoMensagem;
    public $dataMensagem;
    public $countMensagem;
    public $mensagemId;

    #[Layout('layouts.app')]

    public function mount($id)
    {
        $this->animal = Animal::findOrFail($id);
        $this->user_id = Auth::user()->id;
        $this->animal_id = $this->animal->id;
        $this->dataMensagem = Carbon::now();
        $this->countMensagem = Mensagem::count();
    }

    public function render()
    {
        return view('livewire.logado.usuario.animais.ver', [
            'dataCadastrada' => Carbon::parse($this->animal->anData)->format('d/m/Y'),
            'mensagens' => Mensagem::where('user_id', $this->user_id)->orderBy('dataMensagem', 'asc')->paginate(2),
        ]);
    }

    public function setAnimalId($animalId)
    {
        $this->animalId = $animalId;
    }

    public function escreverMensagem()
    {
        $validated = $this->validate([
            'conteudoMensagem' => ['required', 'string', 'max:600'],
        ]);

        $mensagem = Mensagem::create([
            'user_id' => $this->user_id,
            'animal_id' => $this->animal_id,
            'conteudoMensagem' => $validated['conteudoMensagem'],
            'dataMensagem' => $this->dataMensagem,
        ]);

        if ($mensagem) {
            session()->flash('new_success', 'Mensagem enviada com sucesso!');
            $this->redirect(route('animal.ver', $this->animal->id));
        }
    }

    public function setMensagemId($mensagemId)
    {
        $this->mensagemId = $mensagemId;
    }


    public function excluirMensagem()
    {
        if ($this->mensagemId) {
            $mensagem = Mensagem::findOrFail($this->mensagemId);

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
            $this->redirect(route('animal.ver', $this->animal_id));
        }
    }
}
