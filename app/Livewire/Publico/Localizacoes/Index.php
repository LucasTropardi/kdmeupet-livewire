<?php

namespace App\Livewire\Publico\Localizacoes;

use App\Models\Animal;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    public $animalId;
    public $open = false;
    public $id;

    #[Layout('layouts.guest')]

    public function render()
    {
        return view('livewire.publico.localizacoes.index', [
            'animais' => Animal::where('anFinalizado', '0')
                ->orderBy('id', 'desc'),
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
