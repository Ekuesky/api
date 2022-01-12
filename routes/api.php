<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TestController;

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

// Route::apiResources([
//     'products' => ProductController::class,
//     'reviews' => ReviewController::class,
// ]);
route::get('/', function(){
    dd(app());
});
Route::apiResource('products', ProductController::class);
Route::group(['prefix'=>'product'],function(){
    Route::apiResource('/{product}/reviews', ReviewController::class)->except([
        'create', 'update', 'destroy'
    ]);
});
// Route::prefix('admin')->group(function () {
//     Route::get('/users', function () {
//         // Matches The "/admin/users" URL
//     });
// });

Route::get('/test', [TestController::class, 'sendmail']);