<?php

namespace App\Telegram\Helpers;

class InlineButton
{
    public static $buttons = [
        'inline_keyboard' => [

        ]
    ];
    public static function add(mixed $text, string $action, array $data, int $row = 1)
    {
        self::$buttons['inline_keyboard'][$row -1][] = [
            'text' => $text,
            'callback_data' => json_encode($data)
        ];
    }
}
