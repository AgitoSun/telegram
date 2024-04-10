<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Start Command to get you started';

    public function handle()
    {
        $chat_id = Telegram::getWebhookUpdate()['message']['from']['id'];
        $this->replyWithMessage([
            'text' => 'Hey, there! Welcome to our bot!',
            'chat_id' => $chat_id
        ]);
    }
}
