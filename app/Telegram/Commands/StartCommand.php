<?php

namespace App\Telegram\Commands;

use Illuminate\Http\Request;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $pattern = '{username}';
    protected string $description = 'Start Command to get you started';

    public function handle()
    {
//        $update = $this->getUpdate();
//        $user_id = $update->getMessage()->from->id;
//        $user_name = $update->getMessage()->from->username;

        $update = Telegram::getWebhookUpdate();
        $chat_id = $this->getUpdate()->getMessage()->from->id;
        $user_name = $this->getUpdate()->getMessage()->from->username;

        $this->replyWithMessage([
            'text' => "Hello {$user_name}! Welcome to our bot :)",

        ]);
    }
}
