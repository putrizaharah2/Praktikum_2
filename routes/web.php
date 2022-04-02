<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PerjalananController;

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
    return view('auth.login');
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

Route ::get('/list-user', [UserController::class, 'index']) ->name('petugas-index');
Route ::get('/add-user', [UserController::class, 'create']) ->name('petugas-create');
Route ::post('/store-user', [UserController::class, 'store']);
Route ::get('/edit-user/{id}' , [UserController::class, 'edit']) ->name('petugas-edit');
Route ::put('/update-user/{id}' , [UserController::class, 'update']) ->name('petugas-update');
Route ::delete('/destroy-user/{id}', [UserController::class, 'destroy']) ->name('petugas-delete');

Route ::get('/list-pengguna', [MasyarakatController::class, 'index']) ->name('user-index');
Route ::get('/add-pengguna', [MasyarakatController::class, 'create']) ->name('user-create');
Route ::post('/store-pengguna', [MasyarakatController::class, 'store']);
Route ::get('/edit-pengguna/{id}' , [MasyarakatController::class, 'edit']) ->name('user-edit');
Route ::put('/update-pengguna/{id}' , [MasyarakatController::class, 'update']) ->name('user-update');
Route ::delete('/destroy-pengguna/{id}', [MasyarakatController::class, 'destroy']) ->name('user-delete');

Route ::get('/list-perjalanan', [PerjalananController::class, 'index']) ->name('perjalanan-index');
Route ::get('/add-perjalanan', [PerjalananController::class, 'create']) ->name('perjalanan-create');
Route ::post('/store-perjalanan', [PerjalananController::class, 'store']) ->name('perjalanan-store');
Route ::get('/edit-perjalanan/{id}' , [PerjalananController::class, 'edit']) ->name('perjalanan-edit');
Route ::put('/update-perjalanan/{id}' , [PerjalananController::class, 'update']) ->name('perjalanan-update');
Route ::delete('/destroy-perjalanan/{id}', [PerjalananController::class, 'destroy']) ->name('perjalanan-delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
