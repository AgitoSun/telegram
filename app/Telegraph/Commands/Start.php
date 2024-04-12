<?php

namespace App\Telegraph\Commands;

use App\Telegraph\Webhook;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

class Start extends WebhookHandler
{
    public function start(): void
    {
        $this->chat
            ->message('Что необходимо?')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Тех. поддержка')->action('support'),
                Button::make('Закупка')->action('qwe'),
            ]))->send();
    }
}
