<?php

use App\Http\Controllers\AdocaoController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Logado\Usuario\Adocoes\Index as AdocoesIndex;
use App\Livewire\Logado\Usuario\Adocoes\Ver as AdocoesVer;
use App\Livewire\Logado\Usuario\Adocoes\Interesses\Cadastrar as AdocoesInteressesCadastrar;
use App\Livewire\Logado\Usuario\Adocoes\Interesses\Index as AdocoesInteressesIndex;
use App\Livewire\Logado\Gerenciador\Adocoes\Index as AdocoesGerenciadorIndex;


Route::get('lista-adocoes', AdocoesIndex::class)
    ->middleware(['auth', 'verified'])
    ->name('lista.adocoes');

Route::get('adocao-ver/{id}', AdocoesVer::class)
    ->middleware(['auth', 'verified'])
    ->name('adocao.ver');

Route::get('adocao-criar', [AdocaoController::class, 'criar'])
    ->middleware(['auth', 'verified'])
    ->name('adocao.criar');

Route::post('adocao-cadastrar', [AdocaoController::class, 'cadastrar'])
    ->middleware(['auth', 'verified'])
    ->name('adocao.cadastrar');

Route::get('adocao-editar/{adocao}', [AdocaoController::class, 'editar'])
    ->middleware(['auth', 'verified'])
    ->name('adocao.editar');

Route::put('adocao-alterar/{adocao}', [AdocaoController::class, 'alterar'])
    ->middleware(['auth', 'verified'])
    ->name('adocao.alterar');

Route::get('interesse-cadastrar/{id}', AdocoesInteressesCadastrar::class)
    ->middleware(['auth', 'verified'])
    ->name('interesse-cadastrar');

Route::get('lista-interesses/{id}', AdocoesInteressesIndex::class)
    ->middleware(['auth', 'verified'])
    ->name('lista.interesses');

// Gerenciador
Route::get('adocoes-gerenciador', AdocoesGerenciadorIndex::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('adocoes.gerenciador');
