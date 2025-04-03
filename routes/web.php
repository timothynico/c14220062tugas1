<?php

use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

Route::get('/add', function (){
    return view('add');
})->name('add');

Route::post('/add', [ResourceController::class, 'store'])->name('store');
Route::get('/', [ResourceController::class, 'index'])->name('home');
Route::get('/detail/{id}', [ResourceController::class, 'show'])->name('detail');
Route::get('/edit', [ResourceController::class, 'showEdit'])->name('edit');
Route::post('/edit/{id}', [ResourceController::class, 'edit'])->name('edit.promo');
Route::delete('/delete/{id}', [ResourceController::class, 'destroy'])->name('delete');
