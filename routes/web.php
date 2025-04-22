<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

use App\Http\Controllers\DepositoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/index-cliente', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/create-cliente', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/store-cliente', [ClienteController::class, 'store'])->name('clientes.store');

Route::get('/show-cliente/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
Route::get('/edit-cliente/{cliente}', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/update-cliente/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/delete-cliente/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

Route::get('/depositos/create', [DepositoController::class, 'create'])->name('depositos.create');
Route::post('/depositos', [DepositoController::class, 'store'])->name('depositos.store');