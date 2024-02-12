<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
require __DIR__.'/usuarios.php';
require __DIR__.'/publicas.php';
require __DIR__.'/cores.php';
require __DIR__.'/especies.php';
require __DIR__.'/situacoes.php';
require __DIR__.'/tamanhos.php';
require __DIR__.'/racas.php';
require __DIR__.'/animais.php';
require __DIR__.'/parceiros.php';
require __DIR__.'/adocoes.php';
