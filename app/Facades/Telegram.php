<?php

namespace App\Facades;

use App\Telegram\Bot\Bot;
use App\Telegram\Bot\Message;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Message message(mixed $chat_id, string $text, $reply_id = null)
 * @method static Message inlineButtons(mixed $chat_id, string $text, array $buttons)
 * @method Bot send()
 */

class Telegram extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Telegram::class;
    }
}
