<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Logado\Usuario\Achados\Index as AchadosIndex;
use App\Livewire\Logado\Usuario\Perdidos\Index as PerdidosIndex;
use App\Livewire\Logado\Usuario\Adotar\Index as AdotarIndex;
use App\Livewire\Logado\Usuario\Parcerias\Index as ParceriasIndex;
use App\Livewire\Logado\Usuario\Localizacoes\Index as LocalizacoesIndex;

Route::get('logado-achados', AchadosIndex::class)
    ->middleware(['auth', 'verified'])
    ->name('logado.achados');

Route::get('logado-perdidos', PerdidosIndex::class)
    ->middleware(['auth', 'verified'])
    ->name('logado.perdidos');

Route::get('logado-adotar', AdotarIndex::class)
    ->middleware(['auth', 'verified'])
    ->name('logado.adotar');

Route::get('logado-parcerias', ParceriasIndex::class)
    ->middleware(['auth', 'verified'])
    ->name('logado.parcerias');

Route::get('logado-localizacoes', LocalizacoesIndex::class)
    ->middleware(['auth', 'verified'])
    ->name('logado.localizacoes');

