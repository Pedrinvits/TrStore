<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellersController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ContactController;

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

Route::get('/',[SellersController::class, "index"])->name("sellers.index");
Route::resource('sellers',SellersController::class);
Route::get('/sales',[SalesController::class, "index"])->name("sales.index");
Route::post('/sales/{seller}',[SalesController::class, "create"])->name("sales.create");
Route::post('/sales',[SalesController::class, "store"])->name("sales.store");
Route::get('/sales/{sale}',[SalesController::class, "show"])->name("sales.show");
Route::get('/sales/{sale}/{edit}',[SalesController::class, 'edit'])->name('sales.edit');
Route::put('/sales/{sale}',[SalesController::class, "update"])->name("sales.update");
Route::delete('/sales/{sale}',[SalesController::class, "destroy"])->name("sales.destroy");
