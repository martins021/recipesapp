<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index', 'show'])->name('home');

Route::get('/recipe/create', [App\Http\Controllers\RecipesController::class, 'create']); // forma, lai izveidotu jaunu recepti
Route::get('/recipe/{recipe}/edit', [App\Http\Controllers\RecipesController::class, 'edit']);
Route::patch('/recipe/{recipe}/update', [App\Http\Controllers\RecipesController::class, 'update']);
Route::delete('/recipe/delete/{id}', [App\Http\Controllers\RecipesController::class, 'destroy']);
Route::post('/r', [App\Http\Controllers\RecipesController::class, 'store']); // saglabā receptes datus datubāzē

Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create']);
Route::post('/c', [App\Http\Controllers\CategoryController::class, 'store']); // saglabā receptes datus datubāzē

Route::get('/recipe/like/{id}', [App\Http\Controllers\LikesController::class, 'store']); // registrē like

Route::get('/recipe/{recipe}/show', [App\Http\Controllers\CommentsController::class, 'showRecipe']);
Route::post('/w/{recipe}', [App\Http\Controllers\CommentsController::class, 'store']); // saglabā komentāru

Route::get('home/filter', [App\Http\Controllers\HomeController::class, 'filter'])->name('search');
