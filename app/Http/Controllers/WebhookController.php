<?php

namespace App\Http\Controllers;

use App\Telegram\Webhook\Webhook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WebhookController extends Controller
{
    public function index(Request $request, Webhook $webhook)
    {
        Cache::forever('webhook-data', $request->all());
        $webhook->run();
        return true;
    }
}
