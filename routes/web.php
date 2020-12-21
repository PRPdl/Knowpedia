<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;

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

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    $articles = App\Models\Article::take(3)->latest()->get();
    return view('about', compact('articles'));
});

Route::middleware(['auth'])->group(function (){
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.post');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.put');
    Route::delete('articles/{article}/delete', [ArticleController::class, 'destroy'])->name('articles.delete');

    Route::post('/comment/{article}', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.post')->middleware('auth');
    Route::post('/comment/{comment}/liked', [\App\Http\Controllers\CommentController::class, 'markAsBest'])->name('comment.markAsBest')->middleware('auth');

    Route::get('/notifications/unread', [\App\Http\Controllers\NotificationController::class, 'show'])->name('notification.show');
    Route::get('/notifications/unreadCount', [\App\Http\Controllers\NotificationController::class, 'getUnreadCount'])->name('notification.count');



});

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');



Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/payment', [\App\Http\Controllers\PaymentController::class, 'show'])->name('payment.show');
Route::post('/payment', [\App\Http\Controllers\PaymentController::class, 'store'])->name('payment.store');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/test', [\App\Http\Controllers\TestController::class, 'home']);

Route::get('pay', [\App\Http\Controllers\PaymentGatewayController::class, 'store']);

