<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MicroLocationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas por token
Route::middleware('jwt.auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Microservice Locations
    Route::get('/locations', [MicroLocationController::class, 'getLocation']);
});

// Rutas protegidas por token de administradores
Route::middleware(['jwt.auth', 'checkRole:admin'])->group(function () {
    Route::post('/register', [AuthController::class, 'register']);

    // Microservice Locations
    Route::post('/locations/country/add', [MicroLocationController::class, 'addCountry']);
    Route::post('/locations/country/update/{countryId}', [MicroLocationController::class, 'updateCountry']);

    Route::post('/locations/department/add', [MicroLocationController::class, 'addDepartment']);
    Route::post('/locations/department/update/{departmentId}', [MicroLocationController::class, 'updateDepartment']);

    Route::post('/locations/city/add', [MicroLocationController::class, 'addCity']);
    Route::post('/locations/city/update/{cityId}', [MicroLocationController::class, 'updateCity']);

    Route::post('/locations/import-data', [MicroLocationController::class, 'importData']);
});

// Otras rutas protegidas por token de roles
Route::middleware(['jwt.auth', 'checkRole:client'])->group(function () {
});
