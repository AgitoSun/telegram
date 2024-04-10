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
        $chat_id = Telegram::getWebhookUpdate();
        $asd = 'asd';
        $this->replyWithMessage([
            'text' => 'Hey, there! Welcome to our bot!'.$asd,
            'chat_id' => 5330525821
        ]);
    }
}
