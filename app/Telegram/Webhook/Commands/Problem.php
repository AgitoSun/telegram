<?php

namespace App\Telegram\Webhook\Commands;

use App\Facades\Telegram;
use App\Telegram\Webhook\Webhook;

class Problem extends Webhook
{
    public function run()
    {
       return Telegram::message(5330525821, 'Техподдержка')->send();
    }
}
