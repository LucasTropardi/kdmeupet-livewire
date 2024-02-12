<?php

namespace App\Livewire\Publico\Home;

use App\Models\Adocao;
use App\Models\Animal;
use App\Models\Parceria;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.guest')]

    public function render()
    {
        return view('livewire.publico.home.index', [
            'achados' => Animal::where('situacao_id', '3')
                                ->where('anFinalizado', '0')
                                ->orderBy('id', 'desc')
                                ->take(5)
                                ->get(),
            'countAchados' => Animal::where('situacao_id', '3')
                                    ->where('anFinalizado', '0')
                                    ->count(),
            'perdidos' => Animal::where('situacao_id', '4')
                                    ->where('anFinalizado', '0')
                                    ->orderBy('id', 'desc')
                                    ->take(5)
                                    ->get(),
            'countPerdidos' => Animal::where('situacao_id', '4')
                                    ->where('anFinalizado', '0')
                                    ->count(),
            'adocoes' => Adocao::where('adFinalizado', '0')
                                    ->orderBy('id', 'desc')
                                    ->take(5)
                                    ->get(),
            'countAdocoes' => Adocao::where('adFinalizado', '0')
                                    ->count(),
            'parcerias' => Parceria::where('parFinalizado', '0')
                                    ->orderBy('id', 'desc')
                                    ->take(2)
                                    ->get(),
            'countParcerias' => Parceria::where('parFinalizado', '0')
                                    ->count(),
        ]);
    }
}
