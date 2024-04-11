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

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

/**
 * This command can be triggered in two ways:
 * /start and /join due to the alias.
 */
class StartCommand extends Command
{
    protected string $name = 'start';
    protected array $aliases = ['join'];
    protected string $description = 'Start Command to get you started';
    protected string $pattern = '{username}
    {age: \d+}';

    public function handle()
    {
        $update = $this->getUpdate();
        $user_id = $update->getMessage()->from->id;

        $reply_markup = Keyboard::make()
            ->setResizeKeyboard(true)
            ->setOneTimeKeyboard(true)
            ->row([
                Keyboard::button('1'),
                Keyboard::button('2'),
                Keyboard::button('3'),
            ])
            ->row([
                Keyboard::button('4'),
                Keyboard::button('5'),
                Keyboard::button('6'),
            ])
            ->row([
                Keyboard::button('7'),
                Keyboard::button('8'),
                Keyboard::button('9'),
            ])
            ->row([
                Keyboard::button('0'),
            ]);

        $response = Telegram::sendMessage([
            'chat_id' => $user_id,
            'text' => 'Hello World',
            'reply_markup' => $reply_markup
        ]);

        $messageId = $response->getMessageId();

        Telegram::forwardMessage([
            'chat_id' => $user_id,
            'from_chat_id' => $user_id,
            'message_id' => $messageId
        ]);
    }
}
