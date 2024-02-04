<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Logado\Gerenciador\Cores\Index as CoresIndex;
use App\Livewire\Logado\Gerenciador\Cores\Cadastrar as CoresCadastrar;
use App\Livewire\Logado\Gerenciador\Cores\Alterar as CoresAlterar;


Route::get('lista-cores', CoresIndex::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('lista.cores');

Route::get('cor-cadastrar', CoresCadastrar::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('cor.cadastrar');

Route::get('cor-alterar/{id}', CoresAlterar::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('cor.alterar');
