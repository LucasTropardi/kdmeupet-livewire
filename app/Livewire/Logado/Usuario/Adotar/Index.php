<?php

namespace App\Livewire\Logado\Usuario\Adotar;

use App\Models\Adocao;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.logado.usuario.adotar.index', [
            'adocoes' => Adocao::where('adFinalizado', '0')
                ->orderBy('id', 'desc')
                ->paginate(9),
            'adocoesCount' => Adocao::where('adFinalizado', '0')
                ->count(),
        ]);
    }
}
