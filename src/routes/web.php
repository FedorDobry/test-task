<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\CommentController;

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

/* Blog routes */

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/article/{id}', [MainController::class, 'showArticle'])->name('article-page');
Route::get('/comments', [CommentsController::class, 'index'])->name('comments');
Route::post('/comments/add', [CommentController::class, 'addComment'])->name('comments.add');

/* Admin routes */

Route::group(['prefix' => 'admin'], function() {
    Route::get('/articles', [ArticlesController::class, 'index'])->name('articles');
    Route::get('/articles/add', [ArticlesController::class, 'addArticle'])->name('articles.add');
    Route::post('/articles/add', [ArticlesController::class, 'addRequestArticle']);
    Route::get('/articles/edit/{id}', [ArticlesController::class, 'editArticle'])
        ->where('id', '\d+')
        ->name('articles.edit');
    Route::post('/articles/edit/{id}', [ArticlesController::class, 'editRequestArticle'])
        ->where('id', '\d+');
    Route::delete('/articles/delete', [ArticlesController::class, 'deleteArticle'])->name('articles.delete');
});

