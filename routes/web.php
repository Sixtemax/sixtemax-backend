<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Terceros\TerceroForm;

use App\Http\Controllers\HomeController;

use Livewire\Livewire;


// Route::get('/', function () {
//     return view('home');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/livewire/terceros/tercero-form', function () {
    return Livewire::mount('terceros.tercero-form');
});

Route::get('/pestanas/terceros', function () {
    return view('pestanas.terceros');
})->name('pestana.terceros');

Route::get('/componente/terceros', function () {
    return Livewire::mount('terceros.index')->render();
});

Route::get('/terceros/pestaña', function () {
    return view('terceros.tab'); // Esta vista solo carga el componente Livewire
});

