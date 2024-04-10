<?php

use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

$telegram = Telegram::bot();
$updates = $telegram->getUpdates();

//$response = Telegram::setWebhook(['url' => 'https://podlegaevm.ru/api/webhook']);
//dd($response);

//$telegram = Telegram::bot();

//$response = $telegram->sendMessage([
//    'chat_id' => '5330525821',
//    'text' => 'Hello World'
//]);




//$response = $telegram->sendMessage([
//    'chat_id' => '5330525821',
//    'text' => 'Hello World'
//]);
//$messageId = $response->getMessageId();

//$response = $telegram->getUserProfilePhotos(['user_id' => 7172131620]);
//
//$photos_count = $response->getTotalCount();
//$photos = $response->getPhotos();
//
//dd($photos);
