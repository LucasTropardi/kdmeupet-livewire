<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Logado\Usuario\Animais\Index as AnimaisIndex;
use App\Livewire\Logado\Usuario\Animais\Ver as AnimaisVer;
use App\Livewire\Logado\Usuario\Animais\Cadastrar as AnimaisCadastrar;
use App\Livewire\Logado\Usuario\Animais\Alterar as AnimaisAlterar;
use App\Models\Raca;
use Illuminate\Http\Request;

Route::get('lista-animais', AnimaisIndex::class)
    ->middleware(['auth', 'verified'])
    ->name('lista.animais');

Route::get('animal-ver/{id}', AnimaisVer::class)
    ->middleware(['auth', 'verified'])
    ->name('animal.ver');

Route::get('animal-criar', [AnimalController::class, 'criar'])
    ->middleware(['auth', 'verified'])
    ->name('animal.criar');

Route::post('animal-cadastrar', [AnimalController::class, 'cadastrar'])
    ->middleware(['auth', 'verified'])
    ->name('animal.cadastrar');

Route::get('animal-editar/{animal}', [AnimalController::class, 'editar'])
    ->middleware(['auth', 'verified'])
    ->name('animal.editar');

Route::put('animal-alterar/{animal}', [AnimalController::class, 'alterar'])
    ->middleware(['auth', 'verified'])
    ->name('animal.alterar');

// Rotas auxiliares
Route::get('/buscar-racas', [AnimalController::class, 'buscarRacas']);
Route::get('/buscar-tamanhos', [AnimalController::class, 'buscarTamanhos']);