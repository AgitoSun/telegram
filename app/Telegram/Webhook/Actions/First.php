<?php

namespace App\Telegram\Webhook\Actions;

use App\Facades\Telegram;
use App\Telegram\Webhook\Webhook;
use Illuminate\Support\Facades\Request;

class First extends Webhook
{
    public function run()
    {
        $telegram_id =  $this->request->input('message')['from']['id'];
        $username =  Request::input('message')['from']['username'];

        return Telegram::message(5330525821, 'Login: '.$username.'<br>Id: '.$telegram_id)->send();
    }
}
