<?php

use App\Http\Controllers\Api\MailController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TypeProjectController;
use App\Models\Project;
use Illuminate\Http\Request;
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
// All Api Route
Route::apiResource('projects', ProjectController::class);
// Rotta per il singolo progetto
Route::get('projects/{id}', [ProjectController::class, 'show']);

Route::get('types/{id}/projects', TypeProjectController::class);

Route::post('/contact-message', [MailController::class, 'message']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
