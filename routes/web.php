<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
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
    return view('welcome');
});
Route::get('/t', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// routes for commande
Route::get('commandes', [CommandeController::class, "index"])->name("commandes");
Route::get('commandes/create', [CommandeController::class, "create"])->name('commandes.create');
Route::post('commandes/store', [CommandeController::class, "store"])->name('commande.store');
// Route::get('commandes/edit/{id}', [CommandeController::class, "edit"])->name('commandes.edit');
// Route::post('commandes/update/{id}', [CommandeController::class, "update"])->name('commandes.update');
// Route::post('commandes/delete/{id}', [CommandeController::class, "destroy"])->name('commandes.delete');
 

// routes for product


Route::get('produits', [ProduitController::class, "index"])->name("produits");
Route::get('produits/create', [ProduitController::class, "create"])->name('produit.create');
Route::post('produits/store', [ProduitController::class, "store"])->name('produit.store');
Route::get('produit/edit/{id}', [ProduitController::class, "edit"])->name('produit.edit');
Route::post('produit/update/{id}', [ProduitController::class, "update"])->name('produit.update');
Route::post('produit/delete/{id}', [ProduitController::class, "destroy"])->name('produit.delete');
 