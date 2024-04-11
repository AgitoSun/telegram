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
        $this->chat->html('Привет')->send();

        sleep(1);

        $this->chat
            ->message('Поиграем?')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('-1-')->action(Game::class)->param('value', 1),
                Button::make('-2-')->action('game')->param('value', 2),
                Button::make('-3-')->action('game')->param('value', 3),
            ]))->send();
    }

    public function game()
    {
//        $value = $this->data->get('value');
//        $this->chat->html("Нажата кнопка: {$value}")->send();
        return Game::class;
    }
}
