<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Logado\Gerenciador\Tamanhos\Index as TamanhosIndex;
use App\Livewire\Logado\Gerenciador\Tamanhos\Cadastrar as TamanhosCadastrar;
use App\Livewire\Logado\Gerenciador\Tamanhos\Alterar as TamanhosAlterar;


Route::get('lista-tamanhos', TamanhosIndex::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('lista.tamanhos');

Route::get('tamanho-cadastrar', TamanhosCadastrar::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('tamanho.cadastrar');

Route::get('tamanho-alterar/{id}', TamanhosAlterar::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('tamanho.alterar');
