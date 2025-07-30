<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\VotingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresenceController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/chat', function () {
    return view('chat');
})->name('chat');

Route::get('/agenda', function () {
    return view('agenda');
})->name('agenda');

Route::get('/voting', function () {
    return view('voting');
})->name('voting');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/chat', [ChatController::class, 'index'])->name('chat');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
    Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store');
    Route::get('/voting', [VotingController::class, 'index'])->name('voting');
    Route::post('/voting/create', [VotingController::class, 'create'])->name('voting.create');
    Route::post('/voting/{vote}/submit', [VotingController::class, 'submit'])->name('voting.submit');
    Route::delete('/voting/{vote}', [VotingController::class, 'destroy'])->name('voting.destroy');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/presence', [PresenceController::class, 'index'])->name('presence.index');
    Route::post('/presence', [PresenceController::class, 'store'])->name('presence.store');
    
});

require __DIR__.'/auth.php';
