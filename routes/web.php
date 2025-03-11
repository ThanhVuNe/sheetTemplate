<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Middleware\CheckIsAdmin;
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
    Route::delete('/prLoginofile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Route for admin
    Route::middleware(CheckIsAdmin::class)->group(function () {
        Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    });
});

Route::get('/templates', [TemplateController::class, 'index'])->name('templates.index');
Route::get('/templates/{id}', [TemplateController::class, 'show'])->name('templates.show');

require __DIR__.'/auth.php';
