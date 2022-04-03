<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
  return view('home');
});

Route::get('articles', function () {
   return MainController::articles();
})->name('articles');

Route::get('/article/{article:id}', [MainController::class, 'article'])
    ->name('article');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/logout', function() {
    Session::flush();
    Auth::logout();
    return redirect('login');
});


Route::prefix('admin')
    ->middleware('admin')
    ->group(function () {

    Route::resource('article', ArticleController::class);

//    Route::get('/articles', [ArticleController::class, 'index'])
//        ->name('article.index');
//
//    Route::get('/article/create', [ArticleController::class, 'create'])
//        ->name('article.create');
//
//    Route::post('/article/store', [ArticleController::class, 'store'])
//        ->name('article.store');
//
//    Route::get('/article/{article:id}/edit', [ArticleController::class, 'edit'])
//        ->name('article.edit');
//
//    Route::put('/article/{article:id}/update', [ArticleController::class, 'update'])
//        ->name('article.update');
//
//    Route::delete('/article/{article:id}/delete', [ArticleController::class, 'destroy'])
//        ->name('article.destroy');
});




