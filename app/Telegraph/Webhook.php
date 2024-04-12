<?php

namespace App\Telegraph;

use App\Telegraph\Actions\Game;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

class Webhook extends WebhookHandler
{
    public function start()
    {
//        $this->chat->html('Привет')->send();
//
//        sleep(1);

        $this->chat
            ->message('Что необходимо?')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Тех. поддержка')->action('support'),
                Button::make('Закупка')->action('purchase'),
            ]))->send();
    }

    public function support()
    {
//        $value = $this->data->get('value');
        $this->chat
            ->message('Какая у вас проблема?')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Тех. поддержка')->action('support'),
                Button::make('Закупка')->action('purchase'),
            ]))->send();
    }

    protected function handleChatMessage(Stringable $text): void
    {
        // in this example, a received message is sent back to the chat
        $this->chat->html("Received: $text")->send();
    }
}
