<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MasyarakatController;
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
    return view('auth.login2');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/user-profile', [DashboardController::class, 'profile']);
Route::get('/list-post', [PostController::class, 'index']);
Route::get('/add-post', [PostController::class, 'create']);
Route::get('/edit-post', [PostController::class, 'edit']);
Route::resource('/blog', BlogController::class);

Route ::get('/list-article', [ArticleController::class, 'index']) ->name('article-index');
Route ::get('/add-article', [ArticleController::class, 'create']) ->name('article-create');
Route ::post('/store-article', [ArticleController::class, 'store']);
Route ::get('/edit-article/{id}' , [ArticleController::class, 'edit']) ->name('article-edit');
Route ::put('/update-article/{id}' , [ArticleController::class, 'update']) ->name('article-update');
Route ::delete('/destroy-article/{id}', [ArticleController::class, 'destroy']) ->name('article-delete');

Route ::get('/list-masyarakat', [MasyarakatController::class, 'index']) ->name('masyarakat-index');
Route ::get('/add-masyarakat', [MasyarakatController::class, 'create']) ->name('masyarakat-create');
Route ::post('/store-masyarakat', [MasyarakatController::class, 'store']);
Route ::get('/edit-masyarakat/{id}' , [MasyarakatController::class, 'edit']) ->name('masyarakat-edit');
Route ::put('/update-masyarakat/{id}' , [MasyarakatController::class, 'update']) ->name('masyarakat-update');
Route ::delete('/destroy-masyarakat/{id}', [MasyarakatController::class, 'destroy']) ->name('masyarakat-delete');
