<?php

namespace App\Telegram\Webhook;

use App\Facades\Telegram;
use Illuminate\Http\Request;

class Webhook
{
    protected Request $request;
    protected Telegram $telegram;

    public function __construct(Request $request, Telegram $telegram)
    {
        $this->request = $request;
        $this->telegram = $telegram;
    }

    public function run()
    {
        Telegram::message(5330525821, 'Не удалось обработать сообщение')->send();
//       dd($this->telegram->message(5330525821, 'Не удалось обработать сообщение')->send());
    }
}