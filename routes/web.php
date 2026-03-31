<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/events', [PageController::class, 'events'])->name('events.index');
Route::get('/events/create', [PageController::class, 'eventCreate'])->name('events.create');
Route::get('/events/{slug}', [PageController::class, 'eventShow'])->name('events.show');
Route::get('/map', [PageController::class, 'map'])->name('map');
Route::get('/garage', [PageController::class, 'garage'])->name('garage');
Route::get('/museums', [PageController::class, 'museums'])->name('museums');
Route::get('/membership', [PageController::class, 'membership'])->name('membership');
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/admin', [PageController::class, 'admin'])->name('admin');

require __DIR__.'/settings.php';
