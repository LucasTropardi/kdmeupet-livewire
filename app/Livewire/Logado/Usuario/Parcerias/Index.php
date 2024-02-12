<?php

namespace App\Livewire\Logado\Usuario\Parcerias;

use App\Models\Parceria;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.logado.usuario.parcerias.index', [
            'parcerias' => Parceria::where('parAprovado', 1)
                                    ->where('parFinalizado', 0)
                                    ->orderBy('id', 'desc')
                                    ->get(),
            'parceriasCount' => Parceria::where('parFinalizado', '0')->count(),
        ]);
    }
}
