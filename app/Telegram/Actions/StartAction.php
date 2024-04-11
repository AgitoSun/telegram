<?php

namespace App\Telegram\Actions;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;

class StartAction extends Command
{
    public function handle()
    {
        $update = $this->getUpdate();
        $user_id = $update->getMessage()->from->id;
        $user_text = $update->getMessage()->text;

        Telegram::sendMessage([
            'chat_id' => $user_id,
            'text' => $user_text
        ]);
    }
}
