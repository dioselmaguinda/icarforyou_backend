<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VehiclesController;
use App\Http\Controllers\Api\BrandsController;
use App\Http\Controllers\Api\CustomersController;
use App\Http\Controllers\Api\DealersController;
use App\Http\Controllers\Api\InventoriesController;
use App\Http\Controllers\Api\ModelsController;
use App\Http\Controllers\Api\OptionsController;
use App\Http\Controllers\Api\SuppliersController;
use App\Http\Controllers\Api\ManufacturingPlantsController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(VehiclesController::class)->group(function () {
    Route::get('/vehicles', 'index');
    Route::post('/vehicles', 'store');
    Route::put('/vehicles/{id}', 'update');
    Route::delete('/vehicles/{id}', 'destroy');
});

Route::controller(BrandsController::class)->group(function () {
    Route::get('/brands', 'index');
    Route::post('/brands', 'store');
    Route::put('/brands/{id}', 'update');
    Route::delete('/brands/{id}', 'destroy');
});

Route::controller(ModelsController::class)->group(function () {
    Route::get('/models', 'index');
    Route::post('/models', 'store');
    Route::put('/models/{id}', 'update');
    Route::delete('/models/{id}', 'destroy');
});

Route::controller(OptionsController::class)->group(function () {
    Route::get('/options', 'index');
    Route::post('/options', 'store');
    Route::put('/options/{id}', 'update');
    Route::delete('/options/{id}', 'destroy');
});

Route::controller(SuppliersController::class)->group(function () {
    Route::get('/suppliers', 'index');
    Route::post('/suppliers', 'store');
    Route::put('/suppliers/{id}', 'update');
    Route::delete('/suppliers/{id}', 'destroy');
});

Route::controller(ManufacturingPlantsController::class)->group(function () {
    Route::get('/manufacturing_plants', 'index');
    Route::post('/manufacturing_plants', 'store');
    Route::put('/manufacturing_plants/{id}', 'update');
    Route::delete('/manufacturing_plants/{id}', 'destroy');
});

Route::controller(CustomersController::class)->group(function () {
    Route::get('/customers', 'index');
    Route::post('/customers', 'store');
    Route::put('/customers/{id}', 'update');
    Route::delete('/customers/{id}', 'destroy');
});

Route::controller(InventoriesController::class)->group(function () {
    Route::get('/inventories', 'index');
    Route::post('/inventories', 'store');
    Route::put('/inventories/{id}', 'update');
    Route::delete('/inventories/{id}', 'destroy');
});

Route::controller(DealersController::class)->group(function () {
    Route::get('/dealers', 'index');
    Route::post('/dealers', 'store');
    Route::put('/dealers/{id}', 'update');
    Route::delete('/dealers/{id}', 'destroy');
});
