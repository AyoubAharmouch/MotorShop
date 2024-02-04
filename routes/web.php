<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleAddController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('principale', [ArticleController::class, 'index'])->name('principale');

Route::get('/',[ArticleAddController::class,'index'])->name("home");

Route::delete('/{id}', [ArticleAddController::class,'destroy'])->name('destroy');



Route::get('/category/{cat}',[ArticleAddController::class ,'pro']);
Route::get('/espaceclient',[ArticleAddController::class ,'espclient']);
Route::get('/Catalogue',[ArticleAddController::class ,'Catalogue']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/{id}/edit', [ArticleAddController::class,'edit'])->name('edit'); // Appel : route('edit', ['id' => $id]);
Route::put('/{id}', [ArticleAddController::class,'update'])->name('update');
Route::resource('/', ArticleAddController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/cart/{id}',[ArticleAddController::class ,'addCart'])->name('addcart.to.cart');
Route::get('/cart',[ArticleAddController::class ,'shopCart'])->name('shopping');
// Route::delete('/deleteCart',[ArticleAddController::class ,'remove'])->name('deleteCart');
Route::delete('/remove_from_cart/{id}', [ArticleAddController::class,'remove'])->name('remove_from_cart');



Route::get('/panier',[PanierController::class , 'index'])->name('panier.index');
Route::get('add_to_panier/{id}' , [PanierController::class , 'AddToPanier'])->name('add_to_panier');
// Route::delete('remove_from_panier', [PanierController::class, 'remove'])->name('remove_from_panier');

Route::delete('/remove_from_panier/{id}', [PanierController::class,'remove'])->name('remove_from_panier');
Route::patch('/update_panier/{id}',[ PanierController::class ,'update'])->name('update_panier');
// Route::patch('/remove_from_panie',[ PanierController::class ,'remove'])->name('remove_from_panie');

