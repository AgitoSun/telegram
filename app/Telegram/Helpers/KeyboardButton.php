<?php

namespace App\Telegram\Helpers;

class KeyboardButton
{
    private static $button_number = 1;

    public static $buttons = [
        'keyboard' => [

        ],
        'resize_keyboard'
    ];
    public static function add(mixed $text, int $row = 1)
    {
        self::$button_number++;
        self::$buttons['keyboard'][$row -1][] = [
            'text' => $text,
        ];
    }
}
