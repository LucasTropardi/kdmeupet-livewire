<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Logado\Gerenciador\Usuarios\Index as UsuariosIndex;
use App\Livewire\Logado\Gerenciador\Usuarios\Cadastrar as UsuariosCadastrar;
use App\Livewire\Logado\Gerenciador\Usuarios\Alterar as UsuariosAlterar;

Route::get('lista-usuarios', UsuariosIndex::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('lista.usuarios');

Route::get('usuario-cadastrar', UsuariosCadastrar::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('usuario.cadastrar');

Route::get('usuario-alterar/{id}', UsuariosAlterar::class)
    ->middleware(['auth', 'verified'])
    ->middleware('can:nivel')
    ->name('usuario.alterar');
