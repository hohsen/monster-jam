<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ChampionController;
use App\Http\Controllers\NewsController;
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

Route::view('/', 'index');

Route::view('/admin', 'admin');
Auth::routes();


//Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Cnampions list route
Route::view('/championsList', 'championsList');

//Champion route
Route::view('/champion_id', 'champion');

//News list route
// Route::view('/newsList', 'newsList');
Route::get('newsList', [NewsController::class, 'show'])->name('news.show');

//News route
Route::view('/news_id', 'news');

//Cars routes
Route::get('cars', [CarController::class, 'index'])->name('car.index');
Route::get('cars/create', [CarController::class, 'create'])->name('car.create');
Route::post('cars', [CarController::class, 'store'])->name('car.store');
Route::get('cars/{id}', [CarController::class, 'edit'])->name('car.edit');
Route::put('cars/{id}', [CarController::class, 'update'])->name('car.update');
Route::delete('cars/{id}', [CarController::class, 'destroy'])->name('car.delete');

//Champions routes
Route::get('champions', [ChampionController::class, 'index'])->name('champion.index');
Route::get('champions/create', [ChampionController::class, 'create'])->name('champion.create');
Route::post('champions', [ChampionController::class, 'store'])->name('champion.store');
Route::get('champions/{id}', [ChampionController::class, 'edit'])->name('champion.edit');
Route::put('champions/{id}', [ChampionController::class, 'update'])->name('champion.update');
Route::delete('champions/{id}', [ChampionController::class, 'destroy'])->name('champion.delete');

//News routes
Route::get('news', [NewsController::class, 'index'])->name('news.index');
Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('news', [NewsController::class, 'store'])->name('news.store');
Route::get('news/{id}', [NewsController::class, 'edit'])->name('news.edit');
Route::put('news/{id}', [NewsController::class, 'update'])->name('news.update');
Route::delete('news/{id}', [NewsController::class, 'destroy'])->name('news.delete');
