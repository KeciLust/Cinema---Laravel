<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

Route::get('/', [ClientController::class, 'index'])->name('client');
Route::get('/client/hall={hall}&film={film}&date={date}&time={time}', [ClientController::class, 'choice']);
Route::patch('/client/clientPay', [ClientController::class, 'clientPay']);

Auth::routes();

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::post('/admin/addHall', [AdminController::class, 'addHall']);
Route::delete('/admin/{hall}/dellHall', [AdminController::class, 'dellHall'])->name('dellHall');
Route::patch('/admin/{hall}/confHall', [AdminController::class, 'confHall']);
Route::patch('/admin/{hall}/confPrice', [AdminController::class, 'confPrice']);
Route::post('/admin/addFilm', [AdminController::class, 'addFilm']);
Route::delete('/admin/{film}/dellFilm', [AdminController::class, 'dellFilm'])->name('dellFilm');
Route::post('/admin/{hall}/addSession', [AdminController::class, 'addSession']);
Route::delete('/admin/{hall}/dellFilmSession', [AdminController::class, 'dellFilmSession']);
Route::get('/logout', [AdminController::class, 'logout']);
