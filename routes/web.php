<?php

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user-list', [UserListController::class, 'list'])->middleware('admin')->name('user-list.list');
    // 編集画面
    Route::get('/user-list/edit/{id}', [UserListController::class, 'edit'])->name('user-list.edit');
    // 指定ユーザー編集処理
    Route::post('/user-list/update/{id}', [UserListController::class, 'update'])->name('user-list.update');
    // 指定ユーザーの削除
    Route::post('/user-list/destroy{id}', [UserListController::class, 'destroy'])->name('user-list.destroy');
});

require __DIR__.'/auth.php';
