<?php

namespace App\Telegram\Webhook\Commands;

use App\Facades\Telegram;
use App\Telegram\Webhook\Webhook;

class Problem extends Webhook
{
    public function run()
    {
        $telegram_id =  $this->request->input('message')['from']['id'];
        return Telegram::message($telegram_id, 'Техподдержка')->send();
    }
}
