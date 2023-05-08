<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
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

// Route::get('/', function () {
//     return view('Admin/index');
// });


Route::middleware(['gzip'])->group(function () {
    Route::get('/', [ClientController::class, 'accueil']);
    Route::post('/loginAdmin', [AdminController::class, 'loginAdmin']);
    Route::post('/addArticle', [AdminController::class, 'addArticle']);
    Route::get('/article/fiche/{id}-{title}', [AdminController::class, 'fiche'])->name('article_fiche');
    Route::post('/deleteArticle', [AdminController::class, 'deleteArticle']);
    Route::post('/updateArticle/{id}', [AdminController::class, 'updateArticle']);
    Route::post('/rechercheflex', [AdminController::class, 'rechercheflex']);
    Route::put('article/{id}', [AdminController::class, 'updateArticle'])->name('article.update');
    Route::get('client/article/{id}-{title}', [ClientController::class, 'article'])->name('article');
    Route::get('/retourAdmin', [AdminController::class, 'retourAdmin']);
    Route::get('/retourClient', [ClientController::class, 'retourClient']);
    Route::get('/stat', [AdminController::class, 'stat']);
});
