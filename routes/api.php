<?php

use App\Http\Controllers\Api\V1\CompliantsController;
use App\Http\Controllers\Api\V1\NewsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1/')->group(function () {
    Route::get('news', [NewsController::class, 'index']);
    Route::get('news/{id}', [NewsController::class, 'show']);
    Route::post('complaints', [CompliantsController::class, 'store']);
});