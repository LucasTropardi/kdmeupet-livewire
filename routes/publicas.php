<?php

use App\Livewire\Publico\Home\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class);

Route::get('/home', Index::class)
    ->name('home');
