<?php

use App\Http\Controllers\HikerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrailController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TrailNotesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::controller(WelcomeController::class)->group(function(){
    Route::get('/','index')->name('welcome.index');
    Route::post('/','show')->name('welcome.show');
});

Route::get('/dashboard', function () {
    return view('hikers.index',['user' => Auth::user()->load('hiker')]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/dashboard/trails', TrailController::class)
->only('index','store','update','create','edit','destroy')
->middleware(['auth', 'verified']);

Route::controller(TrailNotesController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/trails/trailnotes', 'index')->name('trail_notes.index');
    Route::get('/dashboard/trails/trailnotes/create', 'create')->name('trail_notes.create');
    Route::post('/dashboard/trails/trailnotes', 'store')->name('trail_notes.store');
    Route::get('/dashboard/trails/trailnotes/{trailNotes}/{trail}/{user}', 'edit')->name('trail_notes.edit');
    Route::patch('/dashboard/trails/trailnotes/update/{trailNotes}','update')->name('trail_notes.update');
    Route::delete('/dashboard/trails/trailnotes/destroy', 'destroy')->name('trail_notes.destroy');
});

// Route::controller(TrailController::class)->middleware(['auth', 'verified'])->group(function(){
//     Route::get('/dashboard/trails','index')->name('trails.index');
//     Route::get('/dashboard/trails/create','create')->name('trails.create');
//     Route::post('/dashboard/trails','store')->name('trails.store');
//     Route::get('/dashboard/trails/{id}/edit','edit')->name('trails.edit');
//     Route::put('/dashboard/trails/','update')->name('trails.update');
//     Route::delete('/dashboard/trails/{id}','destroy')->name('trails.destroy');
// });

Route::get('/trails/{id}',[TrailController::class, 'show'])->name('trails.show');


Route::controller(HikerController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard/hiker','index')->name('hiker.index');
    Route::post('/dashboard/hiker','store')->name('hiker.store');
    Route::post('/dashboard/hiker/update','update')->name('hiker.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
