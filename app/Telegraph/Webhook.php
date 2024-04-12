<?php

namespace App\Telegraph;

use App\Telegraph\Actions\Game;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Http\Request;
use PHPUnit\Event\Code\Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Webhook extends WebhookHandler
{
//    /**
//     * @throws \Throwable
//     */
//    protected function onFailure(Throwable|\Throwable $throwable): void
//    {
//        if ($throwable instanceof NotFoundHttpException) {
//            throw $throwable;
//        }
//
//        report($throwable);
//
//        $this->reply('sorry man, I failed');
//    }

    public function start(): void
    {
//        $this->chat->html('Привет')->send();
//
//        sleep(1);

        $this->chat
            ->message('Что необходимо?')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Тех. поддержка')->action('support'),
                Button::make('Закупка')->action('purchase'),
            ]))->send();
    }
//
    public function support()
    {
        $value = $this->data->get('action');
        return '\App\Telegraph\Actions\\'.$value;

//        $this->chat
//            ->message('Какая у вас проблема?')
//            ->keyboard(Keyboard::make()->buttons([
//                Button::make('Тех. поддержка')->action('support'),
//                Button::make('Закупка')->action('purchase'),
//            ]))->send();
    }

//    protected function handleChatMessage(Stringable $text): void
//    {
//        // in this example, a received message is sent back to the chat
//        $this->chat->html("Received: $text")->send();
//    }

//    public function handle(Request $request, TelegraphBot $bot): void
//    {
//        return parent::handle($request, $bot); // TODO: Change the autogenerated stub
//    }
}
