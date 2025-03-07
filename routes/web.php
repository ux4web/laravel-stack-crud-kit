<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Articles\ShowArticles;
use App\Livewire\Articles\CreateArticle;
use App\Livewire\Articles\EditArticle;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/articles', ShowArticles::class)->name('articles.index');
    Route::get('/articles/create', CreateArticle::class)->name('articles.create');
    Route::get('/articles/{id}/edit', EditArticle::class)->name('articles.edit');

    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password')->middleware('password.confirm');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
