<?php

namespace App\Telegram\Webhook\Actions;

use App\Facades\Telegram;
use App\Telegram\Webhook\Webhook;
use Illuminate\Http\Request;

class First extends Webhook
{
    public function run()
    {
        return Telegram::message(5330525821, 'asdasdf')->send();
    }
}
