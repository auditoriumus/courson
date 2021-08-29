<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test.welcome');
});

Route::get('/dashboard', function () {
    return redirect('/contacts');
})->middleware(['auth'])->name('home');

require __DIR__.'/auth.php';

Route::resource('contacts', ContactController::class)
    ->except(['show'])
    ->middleware('auth');

Route::post('/contacts/{id}/favorite', [ContactController::class, 'changeFavoriteStatus'])
    ->middleware(['auth']);
