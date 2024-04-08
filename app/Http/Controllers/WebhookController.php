<?php

namespace App\Http\Controllers;

use App\Telegram\Webhook\Realization;
use App\Telegram\Webhook\Webhook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class WebhookController extends Controller
{
    public function index(Request $request, Webhook $webhook, Realization $realization): bool
    {
        Cache::forever('webhook-data', $request->all());
        $path = $realization->take($request);
        if ($path)
        {
            App::make($path)->run();
            return true;
        } else
        {
            $webhook->run();
        }

        return true;
    }
}
