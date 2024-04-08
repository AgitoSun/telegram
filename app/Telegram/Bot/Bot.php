<?php

namespace App\Telegram\Bot;

use Illuminate\Support\Facades\Http;

class Bot
{
    protected $method;
    public function send()
    {
        return Http::post('https://api.telegram.org/bot'.env('TELEGRAM_BOT_TOKEN').'/'.$this->method,
        [
            'chat_id' => 5330525821,
            'text' => 'test message',
            'parse_mode' => 'html',
            'reply_markup' => [
                'remove_keyboard' => true,
            ]
        ])->json();
    }
}
