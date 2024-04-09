<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

//$http = Http::post('https://api.telegram.org/bot7172131620:AAG9rtWkZDn0KmGUgqvOUbe9L866-6Gv1Lc/setWebhook',
//[
//    'url' => 'https://podlegaevm.ru/api/webhook'
//])->json();
//$http = Http::post('https://api.telegram.org/bot7172131620:AAG9rtWkZDn0KmGUgqvOUbe9L866-6Gv1Lc/getWebhookInfo')->json();
//dd($http);

//\App\Facades\Telegram::message(5330525821, 'test')->send();

//\App\Facades\Telegram::inlineButtons(5330525821, 'Кнопки', [
//    'inline_keyboard' => [
//        [
//            [
//                'text' => 'Кнопка 1',
//                'callback_data' => '123'
//            ]
//        ]
//    ]
//])->send();

//\App\Telegram\Helpers\InlineButton::add('Тестовая кнопка', 'Test', [
//    'number' => 1
//]);
//\App\Telegram\Helpers\InlineButton::link('Вторая кнопка', 'https://prog-time.ru/course/bot-v-telegram-5/');
//\App\Telegram\Helpers\KeyboardButton::add('Тестовая кнопка');
//\App\Telegram\Helpers\KeyboardButton::remove();
//dd(\App\Facades\Telegram::inlineButtons(5330525821, 'Клавиатура', \App\Telegram\Helpers\KeyboardButton::$buttons)->send());




Route::get('/', function () {
    $file = \Illuminate\Support\Facades\Storage::get('public/attachment.jpg');
    dd($file);
    dd(\App\Facades\Telegram::document(5330525821, $file, 'скан'));
    return view('welcome');
});

Route::get('/webhook-data', function () {
    dd(\Illuminate\Support\Facades\Cache::get('webhook-data'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
