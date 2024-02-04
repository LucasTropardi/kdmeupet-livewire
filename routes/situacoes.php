<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Logado\Gerenciador\Situacoes\Index as SituacoesIndex;
use App\Livewire\Logado\Gerenciador\Situacoes\Cadastrar as SituacoesCadastrar;
use App\Livewire\Logado\Gerenciador\Situacoes\Alterar as SituacoesAlterar;


Route::get('lista-situacoes', SituacoesIndex::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('lista.situacoes');

Route::get('situacao-cadastrar', SituacoesCadastrar::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('situacao.cadastrar');

Route::get('situacao-alterar/{id}', SituacoesAlterar::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('situacao.alterar');
