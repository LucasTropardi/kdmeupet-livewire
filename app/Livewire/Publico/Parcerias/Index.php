<?php

namespace App\Livewire\Publico\Parcerias;

use App\Models\Parceria;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    #[Layout('layouts.guest')]

    public function render()
    {
        return view('livewire.publico.parcerias.index', [
            'parcerias' => Parceria::where('parAprovado', 1)
                                    ->where('parFinalizado', 0)
                                    ->orderBy('id', 'desc')
                                    ->get(),
            'parceriasCount' => Parceria::where('parFinalizado', '0')->count(),
        ]);
    }
}
