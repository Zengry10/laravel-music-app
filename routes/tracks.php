<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackController;

Route::get('/tracks', [TrackController::class, 'getTracks'])->name('tracks.index');
Route::get('/tracks/{id}', [TrackController::class, 'getTrackDetails'])->name('tracks.show');

Route::post('/tracks', [TrackController::class, 'createTrack'])->name('track.store');
Route::delete('/tracks/{uuid}', [TrackController::class, 'destroy'])->name('track.destroy');
Route::get('/tracks/{uuid}/edit', [TrackController::class, 'edit'])->name('track.edit');
Route::put('/tracks/{uuid}', [TrackController::class, 'update'])->name('track.update');
