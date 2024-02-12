<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Logado\Usuario\Parceiros\Index as ParceirosIndex;
use App\Livewire\Logado\Usuario\Parceiros\Cadastrar as ParceirosCadastrar;
use App\Livewire\Logado\Usuario\Parceiros\Alterar as ParceirosAlterar;
use App\Livewire\Logado\Usuario\Parceiros\Ver as ParceirosVer;
use App\Livewire\Logado\Gerenciador\Parceiros\Index as ParceirosGerenciadorIndex;


Route::get('lista-parceiros', ParceirosIndex::class)
    ->middleware(['auth', 'verified'])
    ->name('lista.parceiros');

Route::get('parceiro-cadastrar', ParceirosCadastrar::class)
    ->middleware(['auth', 'verified'])
    ->name('parceiro.cadastrar');

Route::get('parceiro-alterar/{id}', ParceirosAlterar::class)
    ->middleware(['auth', 'verified'])
    ->name('parceiro.alterar');

Route::get('parceiro-ver/{id}', ParceirosVer::class)
    ->middleware(['auth', 'verified'])
    ->name('parceiro.ver');

// Gerenciador
Route::get('parceiros-gerenciador', ParceirosGerenciadorIndex::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('parceiros.gerenciador');

