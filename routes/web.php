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

Route::get('/user-management', function () {
    return view('user-management');
})->middleware(['auth', 'verified', 'admin'])->name('user-management');

Route::get('/compare', function () {
    return view('compare');
})->middleware(['auth', 'verified'])->name('compare');

Route::get('/animal-population', function () {
    return view('animal.population');
})->middleware(['auth', 'verified'])->name('animal.population');

Route::get('/animal-list', function () {
    return view('animal.list');
})->middleware(['auth', 'verified', 'admin'])->name('animal.list');

Route::get('/animal-type', function () {
    return view('animal.type');
})->middleware(['auth', 'verified', 'admin'])->name('animal.type');

Route::get('/animal-infected', function () {
    return view('animal.infected');
})->middleware(['auth', 'verified'])->name('animal.infected');

Route::get('/animal-death', function () {
    return view('animal.death');
})->middleware(['auth', 'verified'])->name('animal.death');

Route::get('/fish-production', function () {
    return view('fish.production');
})->middleware(['auth', 'verified', 'admin'])->name('fish.production');


Route::get('/fish-production-area', function () {
    return view('fish.production-area');
})->middleware(['auth', 'verified'])->name('fish.production-area');

Route::get('/disease', function () {
    return view('health.disease');
})->middleware(['auth', 'verified', 'admin'])->name('health.disease');

Route::get('/yearly-disease', function () {
    return view('health.yearly-disease');
})->middleware(['auth', 'verified'])->name('health.yearly-disease');

Route::get('/farm', function () {
    return view('farm.list');
})->middleware(['auth', 'verified'])->name('farm.list');

Route::get('/farm-supply', function () {
    return view('farm.supply');
})->middleware(['auth', 'verified', 'admin'])->name('farm.supply');

Route::get('/veterinary-clinics', function () {
    return view('health.veterinary-clinics');
})->middleware(['auth', 'verified'])->name('farm.veterinary-clinics');

Route::get('/bee-keeping', function () {
    return view('farm.bee-keeping');
})->middleware(['auth', 'verified'])->name('farm.bee-keeping');

Route::get('/sanctuaries', function () {
    return view('fish.sanctuaries');
})->middleware(['auth', 'verified'])->name('fish.sanctuaries');



Route::get('/municipalities', function () {
    return view('miscellaneous.municipalities');
})->middleware(['auth', 'verified', 'admin'])->name('miscellaneous.municipalities');

Route::get('/barangays', function () {
    return view('miscellaneous.barangays');
})->middleware(['auth', 'verified', 'admin'])->name('miscellaneous.barangays');

Route::get('/population', function () {
    return view('miscellaneous.population');
})->middleware(['auth', 'verified', 'admin'])->name('miscellaneous.population');

Route::get('/about-us', function () {
    return view('footer-components.about-us');
})->middleware(['auth', 'verified'])->name('footer-components.about-us');

Route::get('/contact-us', function () {
    return view('footer-components.contact-us');
})->middleware(['auth', 'verified'])->name('footer-components.contact-us');

Route::get('/terms-of-service', function () {
    return view('footer-components.terms-of-service');
})->middleware(['auth', 'verified'])->name('footer-components.terms-of-service');

Route::get('/privacy-policy', function () {
    return view('footer-components.privacy-policy');
})->middleware(['auth', 'verified'])->name('footer-components.privacy-policy');


// Charts
Route::get('/animal-population', 'App\Http\Controllers\AnimalPopulationController@index')->middleware(['auth', 'verified'])->name('animal.population');
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@dashboard')->middleware(['auth', 'verified'])->name('dashboard');

// Regression
Route::get('/animal-population-regression', 'App\Http\Controllers\AnimalPopulationController@linearRegression')
    ->middleware(['auth', 'verified'])
    ->name('animal.population.regression');

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

Route::post('/disease', 'App\Http\Controllers\DiseaseController@store')
    ->middleware(['auth', 'verified'])->name('health.disease.store');

Route::post('/yearly-disease', 'App\Http\Controllers\YearlyCommonDiseaseController@store')
    ->middleware(['auth', 'verified'])->name('health.yearly-disease.store');

Route::post('/farm', 'App\Http\Controllers\FarmController@store')
    ->middleware(['auth', 'verified'])->name('farm.list.store');

Route::post('/farm-supply', 'App\Http\Controllers\FarmSupplyController@store')
    ->middleware(['auth', 'verified'])->name('farm.supply.store');

Route::post('/veterinary-clinics', 'App\Http\Controllers\VeterinaryClinicsController@store')
    ->middleware(['auth', 'verified'])->name('health.veterinary-clinics.store');

Route::post('/fish-sanctuaries', 'App\Http\Controllers\FishSanctuaryController@store')
    ->middleware(['auth', 'verified'])->name('fish.sanctuaries.store');

Route::post('/barangays', 'App\Http\Controllers\BarangayController@store')
    ->middleware(['auth', 'verified'])->name('miscellaneous.barangays.store');

Route::post('/bee-keeping', 'App\Http\Controllers\BeeKeeperController@store')
    ->middleware(['auth', 'verified'])->name('farm.bee-keeping.store');

Route::post('/population', 'App\Http\Controllers\PopulationController@store')
    ->middleware(['auth', 'verified'])->name('miscellaneous.population.store');

Route::post('/municipalities', 'App\Http\Controllers\MunicipalityController@store')
    ->middleware(['auth', 'verified'])->name('miscellaneous.municipalities.store');

Route::post('/user-management', 'App\Http\Controllers\UserController@store')
    ->middleware(['auth', 'verified'])->name('user-management.store');


//Export
Route::get('/animal-population-excel', 'App\Http\Controllers\ExportController\AnimalPopulationExport@generateExcel')
    ->middleware(['auth', 'verified'])
    ->name('animal-population.generate-excel');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
