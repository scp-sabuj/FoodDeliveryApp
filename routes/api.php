<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RiderController;
use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\API\RiderLocationController;
use App\Http\Controllers\API\NearbyRiderController;

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

Route::apiResource('/riders', RiderController::class);
Route::apiResource('/restaurants', RestaurantController::class);
Route::apiResource('/riderlocations', RiderLocationController::class);

Route::get('/nearby-rider/{restaurantId}', [NearbyRiderController::class, 'findRider']);
