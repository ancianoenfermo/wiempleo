<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\MisofertasController;

Route::get('/', HomeController::class)->name('home');
Route::get('/ofertas-trabajo/{tipoTrabajo?}',[OfertasController::class,'index'])->name('ofertas');
Route::get('/mis-ofertas',[MisofertasController::class,'index'])->name('misofertas');


/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/redis', function(){
    print_r(app()->make('redis'));
});
*/
