<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('encuestas.index');
    })->name('dashboard');
    Route::get('encuestas', \App\Http\Livewire\Encuestas\Index::class)->name('encuestas.index');
    Route::get('encuestas/{encuesta}', \App\Http\Livewire\Encuestas\Show::class)->name('encuestas.show');
});
