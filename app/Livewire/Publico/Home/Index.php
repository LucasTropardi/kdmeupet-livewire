<?php

namespace App\Livewire\Publico\Home;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.guest')]

    public function render()
    {
        return view('livewire.publico.home.index');
    }
}
