<?php

namespace App\Http\Telegraph\Actions;

use App\Http\Telegraph\Webhook;

class Game extends Webhook
{
    public function game()
    {
        $this->chat->html('Ответ принят')->send();
    }
}
