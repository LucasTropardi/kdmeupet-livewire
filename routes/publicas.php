<?php

use App\Livewire\Publico\Home\Index;
use Illuminate\Support\Facades\Route;
use App\Livewire\Publico\Achados\Index as PublicoAchadosIndex;
use App\Livewire\Publico\Perdidos\Index as PublicoPerdidosIndex;
use App\Livewire\Publico\Adocoes\Index as PublicoAdotarIndex;
use App\Livewire\Publico\Parcerias\Index as PublicoParceriasIndex;
use App\Livewire\Publico\Localizacoes\Index as PublicoLocalizacoesIndex;
use App\Livewire\Publico\Animais\Ver as PublicoAnimalVer;
use App\Livewire\Publico\Adocoes\Ver as PublicoAdocaoVer;

Route::get('/', Index::class);

Route::get('/home', Index::class)
    ->name('home');

Route::get('publico-achados', PublicoAchadosIndex::class)
    ->name('publico.achados');

Route::get('publico-perdidos', PublicoPerdidosIndex::class)
    ->name('publico.perdidos');

Route::get('publico-adotar', PublicoAdotarIndex::class)
    ->name('publico.adotar');

Route::get('publico-parcerias', PublicoParceriasIndex::class)
    ->name('publico.parcerias');

Route::get('publico-localizacoes', PublicoLocalizacoesIndex::class)
    ->name('publico.localizacoes');

Route::get('publico-animal-ver/{id}', PublicoAnimalVer::class)
    ->name('publico.animal.ver');

Route::get('publico-adocao-ver/{id}', PublicoAdocaoVer::class)
    ->name('publico.adocao.ver');
