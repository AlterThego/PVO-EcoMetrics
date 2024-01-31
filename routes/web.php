<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalPopulationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Primary
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/animal-population', function () {
    return view('animal.population');
})->middleware(['auth', 'verified'])->name('animal.population');

Route::get('/animal-list', function () {
    return view('animal.list');
})->middleware(['auth', 'verified'])->name('animal.list');

Route::get('/animal-type', function () {
    return view('animal.type');
})->middleware(['auth', 'verified'])->name('animal.type');

Route::get('/animal-infected', function () {
    return view('animal.infected');
})->middleware(['auth', 'verified'])->name('animal.infected');

Route::get('/animal-death', function () {
    return view('animal.death');
})->middleware(['auth', 'verified'])->name('animal.death');

Route::get('/fish-production', function () {
    return view('fish.production');
})->middleware(['auth', 'verified'])->name('fish.production');


Route::get('/fish-production-area', function () {
    return view('fish.production-area');
})->middleware(['auth', 'verified'])->name('fish.production-area');



// Add data
Route::post('/animal-population', 'App\Http\Controllers\AnimalPopulationController@store')
->middleware(['auth', 'verified'])->name('animal.population.store');

Route::post('/animal-list', 'App\Http\Controllers\AnimalController@store')
->middleware(['auth', 'verified'])->name('animal.store');

Route::post('/animal-type', 'App\Http\Controllers\AnimalTypeController@store')
->middleware(['auth', 'verified'])->name('animal.type.store');

Route::post('/animal-infected', 'App\Http\Controllers\AffectedAnimalsController@store')
->middleware(['auth', 'verified'])->name('affected.animals.store');

Route::post('/animal-death', 'App\Http\Controllers\AnimalDeathController@store')
->middleware(['auth', 'verified'])->name('animal.death.store');

Route::post('/fish-production', 'App\Http\Controllers\FishProductionController@store')
->middleware(['auth', 'verified'])->name('fish.production.store');

Route::post('/fish-production-area', 'App\Http\Controllers\FishProductionAreaController@store')
->middleware(['auth', 'verified'])->name('fish.production-area.store');







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
