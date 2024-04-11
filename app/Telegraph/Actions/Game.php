<?php

namespace App\Telegraph\Actions;

use App\Telegraph\Webhook;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Http\Request;

class Game extends Webhook
{
//    public function start()
//    {
//        $value = $this->data->get('value');
//        $this->chat->html("Нажата кнопка: {$value}")->send();
//    }

    public function handle(Request $request, TelegraphBot $bot): void
    {
        $value = $this->data->get('value');
        $this->chat->html("Нажата кнопка: {$value}")->send();
    }
}
