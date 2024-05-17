<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieWatchLogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // アカウント編集画面
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // アカウント編集処理
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // アカウント削除処理
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ユーザー一覧画面
    Route::get('/user-list', [UserListController::class, 'list'])->middleware('admin')->name('user-list.list');
    // 編集画面
    Route::get('/user-list/edit/{id}', [UserListController::class, 'edit'])->middleware('admin')->name('user-list.edit');
    // 指定ユーザー編集処理
    Route::post('/user-list/update/{id}', [UserListController::class, 'update'])->name('user-list.update');
    // 指定ユーザーの削除
    Route::post('/user-list/destroy{id}', [UserListController::class, 'destroy'])->name('user-list.destroy');

    // 動画一覧画面
    Route::get('/movie', [MovieController::class, 'top'])->name('movie.top');
    // 動画詳細画面
    Route::get('/movie/detail/{id}', [MovieController::class, 'detail'])->name('movie.detail');
    // 動画アップロード画面
    Route::get('/movie/upload', [MovieController::class, 'upload'])->middleware('admin')->name('movie.upload');
    // 動画アップロード処理
    Route::post('/movie/store',[MovieController::class, 'store'])->name('movie.store');
    // Ajaxで動画視聴記録を保存
    Route::post('/movie/detail/addLog/{id}', [MovieWatchLogController::class, 'addMovieLog'])->name('movie-watch-log.addLog');
});

require __DIR__.'/auth.php';
