<?php

namespace App\Http\Controllers;

use App\Models\Telegram;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = file_get_contents('php://input');
        $arrDataAnswer = json_decode($data, true);

        $textMessage = mb_strtolower($arrDataAnswer["message"]["text"]);
        $chatId = $arrDataAnswer["message"]["chat"]["id"];

        function TG_sendMessage($getQuery) {
            $ch = curl_init("https://api.telegram.org/bot". env('TG_TOKEN') ."/sendMessage?" . http_build_query($getQuery));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $res = curl_exec($ch);
            curl_close($ch);

            return $res;
        }

        if($textMessage == 'привет') {
            $textMessage_bot = "Привет! Есть фото для меня";

            $arrayQuery = array(
                'chat_id' 		=> 5330525821,
                'text'			=> $textMessage_bot,
                'parse_mode'	=> "html",
            );
            TG_sendMessage($arrayQuery);
        }

        if($textMessage == 'отправь кнопки') {
            $textMessage_bot = "Вот твои кнопки! Нажимай";

            $arrayQuery = array(
                'chat_id' => 1424646511,
                'text'	=> $textMessage_bot,
                'parse_mode'	=> "html",
                'reply_markup' => json_encode(array(
                    'inline_keyboard' => array(
                        array(
                            array(
                                'text' => 'Кнопка 1',
                                'callback_data' => 'but_1',
                            ),

                            array(
                                'text' => 'Кнопка 2',
                                'callback_data' => 'but_2',
                            )
                        ),
                    ),
                )),
            );
            TG_sendMessage($arrayQuery);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Telegram $telegram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Telegram $telegram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Telegram $telegram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Telegram $telegram)
    {
        //
    }
}
