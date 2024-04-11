<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

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

Route::post('webhook', [\App\Http\Controllers\BotController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/webhook', function () {
    $update = Telegram::commandsHandler(true);
    $updates = Telegram::getWebhookUpdate();
    Cache::forever('webhook-data', $updates);
    // Commands handler method returns the Update object.
    // So you can further process $update object
    // to however you want.
    return 'ok';
});
