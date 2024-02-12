<?php

namespace App\Livewire\Publico\Adocoes;

use App\Models\Adocao;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    #[Layout('layouts.guest')]

    public function render()
    {
        return view('livewire.publico.adocoes.index', [
            'adocoes' => Adocao::where('adFinalizado', '0')
                ->orderBy('id', 'desc')
                ->paginate(9),
            'adocoesCount' => Adocao::where('adFinalizado', '0')
                ->count(),
        ]);
    }
}

