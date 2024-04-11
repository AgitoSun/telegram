<?php

//namespace App\Telegram\Commands;
//
//use Illuminate\Http\Request;
//use Telegram\Bot\Commands\Command;
//use Telegram\Bot\Laravel\Facades\Telegram;
//
//class StartCommand extends Command
//{
//    protected string $name = 'start';
//    protected string $pattern = '{username}';
//    protected string $description = 'Start Command to get you started';
//
//    public function handle()
//    {
////        $update = $this->getUpdate();
////        $user_id = $update->getMessage()->from->id;
////        $user_name = $update->getMessage()->from->username;
//
//        $update = Telegram::getWebhookUpdate();
//        $chat_id = $this->getUpdate()->getMessage()->from->id;
//        $user_name = $this->getUpdate()->getMessage()->from->username;
//
//        $this->replyWithMessage([
//            'text' => "Hello {$user_name}! Welcome to our bot :)",
//            'chat_id' => $chat_id
//        ]);
//    }
//}


namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $pattern = '{username}
    {age: \d+}';

    protected string $description = 'Start Command to get you started';

    public function handle()
    {
        $username = $this->argument('username');
        $age = $this->argument('age');

        if (!$username) {
            $this->replyWithMessage([
                'text' => "Please provide your username! Ex: /start jasondoe"
            ]);

            return;
        }

        if (!$age) {
            $this->replyWithMessage([
                'text' => "Please provide your age with the username! Ex: /start jasondoe 24"
            ]);

            return;
        }

        $this->replyWithMessage([
            'text' => "Hello {$username}! Welcome to our bot :)"
        ]);
    }
}
