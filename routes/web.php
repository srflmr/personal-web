<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::group(['prefix' => 'portfolio', 'controller' => PortfolioController::class], function () {
    Route::get('/', 'index')->name('portfolio.index');
    Route::get('/{slug}', 'show')->where('slug', '[a-z0-9-]+')->name('portfolio.show');
});

Route::group(['prefix' => 'blog', 'controller' => BlogController::class], function () {
    Route::get('/', 'index')->name('blog.index');
    Route::get('/{slug}', 'show')->where('slug', '[a-z0-9-]+')->name('blog.show');
});
