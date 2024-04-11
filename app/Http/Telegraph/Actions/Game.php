<?php

namespace App\Http\Telegraph\Actions;

use DefStudio\Telegraph\Handlers\WebhookHandler;

class Game extends WebhookHandler
{
    public function start()
    {
        $value = $this->data->get('value');
        $this->chat->html("Нажата кнопка: {$value}")->send();
    }
}
