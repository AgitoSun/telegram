<?php

namespace App\Telegram\Webhook;

use App\Telegram\Webhook\Actions\First;
use App\Telegram\Webhook\Commands\Problem;
use App\Telegram\Webhook\Commands\Start;
use Illuminate\Http\Request;

class Realization
{
    protected const Commands = [
        '/start' => Start::class,
        '/problem' => Problem::class
    ];

    public function take(Request $request)
    {
        if ($request->input('message')['text'] == '/start')
        {
            return First::class;
        }
        if (isset($request->input('message')['entities'][0]['type']))
        {
            if ($request->input('message')['entities'][0]['type'] == 'bot_command')
            {
                $command_name = explode(' ', $request->input('message')['text'])[0];
                return self::Commands[$command_name];
            }
        }
        if ($request->input('callback_query'))
        {
            $data = json_decode($request->input('callback_query')['data']);
            return '\App\Telegram\Webhook\Actions\\'.$data->action;
        }


        return false;
    }
}
