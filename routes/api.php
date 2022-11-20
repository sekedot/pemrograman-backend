<?php

use App\Http\Controllers\CovidController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#Route GET COVID-API
//get all resource
Route::get("/patients", [CovidController::class, 'index']);

Route::get("/test", function(){
    echo "test";
});

//get detail resource
Route::get("/patients/{id}", [CovidController::class, 'show']);

//get detail search name
Route::get("/patients/search/{name}", [CovidController::class, 'search']);

//get detail positive
Route::get("/patients/status/positive", [CovidController::class, 'positive']);

//get detail recovered
Route::get("/patients/status/recovered", [CovidController::class, 'recovered']);

//get detail dead
Route::get("/patients/status/dead", [CovidController::class, 'dead']);


#Route POST COVID-API
Route::post("/patients", [CovidController::class, 'store']);

#Route PUT COVID-API
Route::put("/patients/{id}", [CovidController::class, 'update']);

#Route DELETE COVID-API
Route::delete("/patients/{id}", [CovidController::class, 'destroy']);
