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
        # username from Update object to be used as fallback.
        $fallbackUsername = $this->getUpdate()->getMessage()->from->username;

        # Get the username argument if the user provides,
        # (optional) fallback to username from Update object as the default.
        $username = $this->argument(
            'username',
            $fallbackUsername
        );

        $this->replyWithMessage([
            'text' => "Hello {$username}! Welcome to our bot, Here are our available commands:"
        ]);

        # This will update the chat status to "typing..."
        $this->replyWithChatAction(['action' => Actions::TYPING]);

        # Get all the registered commands.
        $commands = $this->getTelegram()->getCommands();

        $response = '';
        foreach ($commands as $name => $command) {
            $response .= sprintf('/%s - %s' . PHP_EOL, $name, $command->getDescription());
        }

        $this->replyWithMessage(['text' => $response]);

        if($this->argument('age', 0) >= 18) {
            $this->replyWithMessage(['text' => 'Congrats, You are eligible to buy premimum access to our membership!']);
        } else {
            $this->replyWithMessage(['text' => 'Sorry, you are not eligible to access premium membership yet!']);
        }
    }
}
