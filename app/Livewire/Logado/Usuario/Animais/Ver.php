<?php

namespace App\Livewire\Logado\Usuario\Animais;

use App\Models\Animal;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Ver extends Component
{
    public $animalId;
    public $open = false;
    public $animal;
    // public $dataCadastrada;

    #[Layout('layouts.app')]

    public function mount($id)
    {
        $this->animal = Animal::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.logado.usuario.animais.ver', [
            'dataCadastrada' => Carbon::parse($this->animal->anData)->format('d/m/Y'),
        ]);
    }

    public function setAnimalId($animalId)
    {
        $this->animalId = $animalId;
    }


}
