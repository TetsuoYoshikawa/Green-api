
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\GreensController;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::get('/users', [UsersController::class, 'getUser']);
Route::put('/users', [UsersController::class, 'put']);

Route::post('/comments/shop', [CommentsController::class, 'postShop']);
Route::post('/comments/green', [CommentsController::class, 'postGreen']);
Route::delete('/comments/shop', [CommentsController::class, 'deleteShop']);
Route::delete('/comments/green', [CommentsController::class, 'deleteShop']);

Route::get('/favorites', [FavoritesController::class, 'get']);
Route::post('/favorites/shop', [FavoritesController::class, 'postShop']);
Route::post('/favorites/green', [FavoritesController::class, 'postGreen']);
Route::delete('/favorites/shop', [FavoritesController::class, 'deleteShop']);
Route::delete('/favorites/green', [FavoritesController::class, 'deleteGreen']);

Route::get('/shops', [ShopsController::class, 'get']);
Route::get('/shops/{$id}', [ShopsController::class, 'getShop']);
Route::post('/shops', [ShopsController::class, 'post']);

Route::apiResource('/shares', GreensController::class);
