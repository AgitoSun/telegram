<?php

namespace App\Telegram\Webhook;

use App\Facades\Telegram;
use Illuminate\Http\Request;

class Webhook
{
    protected Request $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function run()
    {
        $telegram_id =  $this->request->input('message')['from']['id'];
        return Telegram::message($telegram_id, 'Не удалось обработать сообщение')->send();
    }
}
