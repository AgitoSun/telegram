<?php

namespace App\Telegraph\Actions;

use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Http\Request;

class Game extends WebhookHandler
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
