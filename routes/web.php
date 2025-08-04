<?php

use App\Http\Controllers\DotmeController;
use App\Http\Controllers\ProfileController;
use App\Models\Dotme;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostagemController;

Route::get('/', function () {
    return view('index');
})->name('index');

// Header
Route::get('/cadastro', function () {
    return view('cadastro');
});
Route::get('/log', function () {
    return view('log');
});
Route::get('/adote', function () {
    return view('adote');
});
Route::get('/desaparecidos', function () {
    return view('desaparecidos');
});

// Footer
Route::get('/sobre', function () {
    return view('sobre');
});
Route::get('/contato', function () {
    return view('contato');
});
Route::get('/apoie', function () {
    return view('apoie');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/redes', function () {
    return view('redes');
});

// Postagem

Route::get('/postagem', [PostagemController::class, 'create'])->name('postagem.create');
Route::post('/postagem', [PostagemController::class, 'store'])->name('postagem.store');

Route::post('cadastro', [DotmeController::class,
'create'])->name('cadastro.post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
