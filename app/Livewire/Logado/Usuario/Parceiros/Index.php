<?php

namespace App\Livewire\Logado\Usuario\Parceiros;

use App\Models\User;
use App\Models\Parceria;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Traits\Deletable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    use Deletable;

    public $parceriaId;
    public $open = false;
    public $user_id;

    #[Layout('layouts.app')]

    public function mount()
    {
        $this->user_id = Auth::user()->id;
    }

    public function render()
    {
        return view('livewire.logado.usuario.parceiros.index', [
            'parcerias' => Parceria::where('user_id', $this->user_id)
                ->where('parFinalizado', 0)
                ->orderBy('id', 'desc')
                ->paginate(10),
        ]);
    }

    public function setParceriaId($parceriaId)
    {
        $this->parceriaId = $parceriaId;
    }

    public function finalizar()
    {
        $parceria = Parceria::findOrFail($this->parceriaId);
        if ($parceria->update([
            'parFinalizado' => 1,
        ])) {
            session()->flash('success', 'Publicação finalizada!');
            return redirect(route('lista.parceiros'));
        }
    }
}
