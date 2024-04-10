<?php

namespace App\Telegram\Commands;

use Illuminate\Http\Request;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;

class StartCommand extends Command
{
    protected Request $request;

    protected string $name = 'start';
    protected string $description = 'Start Command to get you started';

    public function handle()
    {
        $telegram_id =  $this->request->input('message')['from']['id'];

        $this->replyWithMessage([
            'text' => 'Hey, there! Welcome to our bot!',
            'chat_id' => $telegram_id
        ]);
    }
}
