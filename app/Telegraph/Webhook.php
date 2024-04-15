<?php

namespace App\Telegraph;

use App\Telegraph\Actions\Game;
use App\Telegraph\Commands\Start;
use DefStudio\Telegraph\DTO\InlineQueryResultPhoto;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Http\Request;
use Illuminate\Support\Stringable;
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

//    protected function handleChatMessage(\Illuminate\Support\Stringable $text): void
//    {
//        // in this example, a received message is sent back to the chat
//        $this->chat->html("Received: $text")->send();
//    }

    public function start(): void
    {
        $this->chat
            ->message($this->message->text())
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Тех. поддержка')->action('support'),
                Button::make('Закупка')->action('qwe'),
            ]))->send();
    }

    public function support(Game $game): void
    {
        $game->index($this->chat);
    }

    protected function handleChatMessage(Stringable $text): void
    {
        // in this example, a received message is sent back to the chat
        $this->chat->html("Received: $text")->send();
    }



//    public function handle(Request $request, TelegraphBot $bot): void
//    {
//        return parent::handle($request, $bot); // TODO: Change the autogenerated stub
//    }
}
