<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public blog routes
|--------------------------------------------------------------------------
*/
Route::get('/', [BlogController::class, 'index'])->name('blog.index');
Route::get('/category/{category:slug}', [BlogController::class, 'category'])->name('blog.category');
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/kebijakan-privasi', [PageController::class, 'privacy'])->name('pages.privacy');
Route::get('/syarat-ketentuan', [PageController::class, 'terms'])->name('pages.terms');

/*
|--------------------------------------------------------------------------
| Auth routes (admin login)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AdminLoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin panel routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', PostController::class)->except(['show']);
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');

    Route::get('comments', [AdminCommentController::class, 'index'])->name('comments.index');
    Route::put('comments/{comment}', [AdminCommentController::class, 'update'])->name('comments.update');
    Route::delete('comments/{comment}', [AdminCommentController::class, 'destroy'])->name('comments.destroy');

    Route::get('settings/{tab?}', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings/{tab?}', [SettingController::class, 'update'])->name('settings.update');
});

/*
|--------------------------------------------------------------------------
| Single post route — kept last so it doesn't swallow the routes above
|--------------------------------------------------------------------------
*/
Route::get('/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
