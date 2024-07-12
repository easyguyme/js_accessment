<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WebsiteController;
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

Route::prefix('v1')->group(function () {
    Route::get('/new', [WebsiteController::class, 'new_candidates']);
    Route::get('/new/{id}', [WebsiteController::class, 'NewCandidateDetails']);
    Route::get('/past', [WebsiteController::class, 'past_candidates']);
    Route::get('/past/{id}', [WebsiteController::class, 'PastCandidateDetails']);
    Route::get('/categories', [WebsiteController::class, 'categories']);
    Route::get('/visas', [WebsiteController::class, 'visas']);


});

