<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ChampionController;
use App\Http\Controllers\SliderController;
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

Route::view('/', 'mainPage');

Auth::routes();


//Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Cnampions list route
Route::view('/championsList', 'championsList');

//Champion route
Route::view('/champion_id', 'champion');

//Articles route
Route::get('articles', [ArticleController::class, 'show'])->name('article.show');

//Article route
Route::view('/article_id', 'article');

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

//Articles routes
Route::get('articles', [ArticleController::class, 'index'])->name('article.index');
Route::get('articles/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('articles', [ArticleController::class, 'store'])->name('article.store');
Route::get('articles/{id}', [ArticleController::class, 'edit'])->name('article.edit');
Route::put('articles/{id}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('article.delete');

//Sliders routes
Route::get('sliders', [SliderController::class, 'index'])->name('slider.index');
Route::get('sliders/create', [SliderController::class, 'create'])->name('slider.create');
Route::post('sliders', [SliderController::class, 'store'])->name('slider.store');
Route::get('sliders/{id}', [SliderController::class, 'edit'])->name('slider.edit');
Route::put('sliders/{id}', [SliderController::class, 'update'])->name('slider.update');
Route::delete('sliders/{id}', [SliderController::class, 'destroy'])->name('slider.delete');
