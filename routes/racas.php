<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Logado\Gerenciador\Racas\Index as RacasIndex;
use App\Livewire\Logado\Gerenciador\Racas\Cadastrar as RacasCadastrar;
use App\Livewire\Logado\Gerenciador\Racas\Alterar as RacasAlterar;


Route::get('lista-racas', RacasIndex::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('lista.racas');

Route::get('raca-cadastrar', RacasCadastrar::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('raca.cadastrar');

Route::get('raca-alterar/{id}', RacasAlterar::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('raca.alterar');
