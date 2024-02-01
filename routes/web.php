<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

//list of persons route
Route::get('/',([PersonController::class,'index']))
       ->name('mainhome');

//delete persons route
Route::get('/persons/{id}/delete',([PersonController::class,'destroy']))
       ->name('persons.destroy');

//add new persons route
Route::get('/persons/create',([PersonController::class,'create']))
       ->name('persons.create');

//validate person route
Route::post('/persons/create',([PersonController::class,'store']))
       ->name('persons.store');

//update person route
Route::get('/persons/{id}/update',([PersonController::class,'edit']))
       ->name('persons.edit');

//update validate person route
Route::put('/persons/{id}/update',([PersonController::class,'update']))
       ->name('persons.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
