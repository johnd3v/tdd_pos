<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\SalesController;
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';



Route::view('product','product')->middleware(['auth', 'verified'])->name('product');
// Route::view('sales','sales')->middleware(['auth', 'verified'])->name('sales');

Route::get('/sales',[SalesController::class,'index'])->middleware(['auth','verified'])->name('sales');
Route::get('/sales/report',[SalesController::class,'report'])->middleware(['auth','verified'])->name('sales.report');

