<?php

namespace App\Telegram\Webhook\Commands;

use App\Facades\Telegram;
use App\Http\Controllers\WebhookController;
use App\Models\User;
use App\Telegram\Webhook\Webhook;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class Start extends Webhook
{
    public function run()
    {
       $username =  Request::input('message')['from']['username'];
        User::create([
            'name' => $username,
            'email' => 'zeke@mail.ru',
            'password' => Hash::make('123123123'),
        ]);


       return Telegram::message(5330525821, $username)->send();
    }
}
