<?php

namespace App\Telegram\Webhook\Commands;

use App\Facades\Telegram;
use App\Telegram\Webhook\Webhook;

class Start extends Webhook
{
    public function run()
    {
//       return $this->telegram->message(5330525821, 'Привет, спасибо что подписался')->send();
       Telegram::message(5330525821, 'Привет, спасибо что подписался')->send();
    }
}