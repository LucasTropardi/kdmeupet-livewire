<?php

namespace App\Livewire\Publico\Achados;

use App\Models\Animal;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    #[Layout('layouts.guest')]

    public function render()
    {
        return view('livewire.publico.achados.index', [
            'animais' => Animal::where('anFinalizado', '0')
                ->where('situacao_id', 3)
                ->orderBy('id', 'desc')
                ->paginate(9),
            'animaisCount' => Animal::where('anFinalizado', '0')
                ->where('situacao_id', 3)
                ->count(),
        ]);
    }
}
