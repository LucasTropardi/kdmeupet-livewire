<?php

namespace App\Livewire\Logado\Usuario\Animais;

use App\Models\Animal;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    public $animalId;
    public $open = false;
    public $id;

    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.logado.usuario.animais.index', [
            'animais' => Animal::where('anFinalizado', '0')->orderBy('anData', 'asc')->paginate(10),
        ]);
    }

    public function setAnimalId($animalId)
    {
        $this->animalId = $animalId;
    }

    public function finalizar()
    {
        $animal = Animal::findOrFail($this->animalId);
        if ($animal->update([
            'anFinalizado' => 1,
        ])) {
            session()->flash('success', 'Publicação finalizada!');
            return redirect(route('lista.animais'));
        }
    }
}
