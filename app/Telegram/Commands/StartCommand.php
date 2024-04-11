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
        $chat_id = $update->getMessage()->getChat()->getId();
        $user_name = $update->getMessage()->getChat()->getUsername();

        $fallbackUsername = $this->getUpdate()->getMessage()->from->username;

        # Get the username argument if the user provides,
        # (optional) fallback to username from Update object as the default.
        $username = $this->argument(
            'username',
            $fallbackUsername
        );

        $this->replyWithMessage([
            'text' => "Hello {$username}! Welcome to our bot :)",
            'chat_id' => $chat_id
        ]);
    }
}
