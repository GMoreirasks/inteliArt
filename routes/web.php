<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\OpenAIController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redireciona a raiz para a listagem de eBooks
Route::view('/', 'welcome');


// Dashboard (precisa estar autenticado)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CRUD de eBooks
Route::resource('ebooks', EbookController::class);

Route::get('/chat', function() {
    return view('chat');
});

Route::post('/chat/receive', [ChatController::class, 'processMessage']);

Route::get('/openai/test', [OpenAIController::class, 'testOpenAI']);
Route::get('/test-openai', [OpenAIController::class, 'index']);
Route::post('/test-openai', [OpenAIController::class, 'ask']);
Route::post('/chat/receive', [ChatController::class, 'processMessage']);


// Rotas de autenticação (login, registro, etc.)
require __DIR__.'/auth.php';
