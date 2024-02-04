<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Logado\Gerenciador\Especies\Index as EspeciesIndex;
use App\Livewire\Logado\Gerenciador\Especies\Cadastrar as EspeciesCadastrar;
use App\Livewire\Logado\Gerenciador\Especies\Alterar as EspeciesAlterar;


Route::get('lista-especies', EspeciesIndex::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('lista.especies');

Route::get('especie-cadastrar', EspeciesCadastrar::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('especie.cadastrar');

Route::get('especie-alterar/{id}', EspeciesAlterar::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('especie.alterar');
