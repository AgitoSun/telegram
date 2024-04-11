<?php

namespace App\Telegram\Commands;

use Illuminate\Http\Request;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Start Command to get you started';

    public function handle()
    {
        $update = $this->getUpdate();
        $user_id = $update->getMessage()->from->id;
        $user_name = $update->getMessage()->from->username;

        $this->replyWithMessage([
            'text' => 'Hey '.$user_name.', there! Welcome to our bot!',
            'chat_id' => $user_id
        ]);
    }
}
