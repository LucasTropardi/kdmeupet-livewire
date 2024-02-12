<?php

namespace App\Livewire\Logado\Usuario\Perdidos;

use App\Models\Animal;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.logado.usuario.perdidos.index', [
            'animais' => Animal::where('anFinalizado', '0')
                ->where('situacao_id', 4)
                ->orderBy('id', 'desc')
                ->paginate(9),
            'animaisCount' => Animal::where('anFinalizado', '0')
                ->where('situacao_id', 3)
                ->count(),
        ]);
    }
}
