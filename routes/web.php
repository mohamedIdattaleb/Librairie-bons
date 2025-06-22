<?php

use App\Http\Controllers\BonController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});
Route::resource('clients', ClientController::class);
Route::resource('bons', BonController::class);
Route::get('/bons/{id}/pdf', [BonController::class, 'downloadPDF'])->name('bons.pdf');
Route::get('/bons/search', [BonController::class, 'search'])->name('bons.search');
