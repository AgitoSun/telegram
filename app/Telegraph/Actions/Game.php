<?php

namespace App\Telegraph\Actions;

use App\Telegraph\Webhook;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Http\Request;
use function Laravel\Prompts\text;


class Game extends WebhookHandler
{
//    public function start()
//    {
//        $value = $this->data->get('value');
//        $this->chat->html("Нажата кнопка: {$value}")->send();
//    }

//    public function handle(Request $request, TelegraphBot $bot): void
//    {
//        $this->chat->html("Нажата кнопка")->send();
//    }



    public static function index($chat): void
    {
        $chat->html("Введите имя")->send();
        $chat->handleChatMessage($chat->message->text());
    }

    public function handleChatMessage(\Illuminate\Support\Stringable $text): void
    {
        // in this example, a received message is sent back to the chat
        $this->chat->html("Привет: $text")->send();
    }
}
