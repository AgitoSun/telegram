<?php

namespace App\Telegram\Webhook\Commands;

use App\Facades\Telegram;
use App\Models\User;
use App\Telegram\Helpers\KeyboardButton;
use App\Telegram\Webhook\Webhook;
use Illuminate\Support\Facades\Request;

class Start extends Webhook
{
    public function run()
    {
//       $username =  Request::input('message')['from']['username'];
//       $telegram_id =  Request::input('message')['from']['id'];
//        User::create([
//            'name' => $username,
//            'email' => 'zeke@mail.ru',
//            'password' => Hash::make('123123123'),
//            'telegram_id' => $telegram_id
//        ]);
//        $text = 'Пользователь '.$username.' добавлен';

        $telegram_id =  $this->request->input('message')['from']['id'];
        $user = User::all()->where('telegram_id', $telegram_id)->first();
        $text = 'Пользователь не найден, обратитесь к администратору';

        if (!empty($user))
        {
            if ($user->telegram_id == $telegram_id)
            {
                $text = $user->name.', добро пожаловать!';
                KeyboardButton::add('Тестовая кнопка');
                Telegram::inlineButtons($telegram_id, 'Клавиатура', KeyboardButton::$buttons)->send();
            }
        }

       return Telegram::message($telegram_id, $text)->send();
    }
}
