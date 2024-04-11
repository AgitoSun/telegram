<?php

namespace App\Http\Telegraph\Actions;

use App\Http\Telegraph\Webhook;

class Game extends Webhook
{
    public function start()
    {
        $value = $this->data->get('value');
        $this->chat->html("Нажата кнопка: {$value}")->send();
    }
}
