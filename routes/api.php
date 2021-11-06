<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
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

// Route::apiResources([
//     'products' => ProductController::class,
//     'reviews' => ReviewController::class,
// ]);
Route::apiResource('products', ProductController::class);
Route::group(['prefix'=>'product'],function(){
    Route::apiResource('/reviews', ReviewController::class)->except([
        'create', 'store', 'update', 'destroy'
    ]);
});
// Route::prefix('admin')->group(function () {
//     Route::get('/users', function () {
//         // Matches The "/admin/users" URL
//     });
// });