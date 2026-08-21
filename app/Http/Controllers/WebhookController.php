<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function ResendAPI(Request $request){
        $payload = $request->all();

        Log::info('LogReference', [
            'info' => $payload,
        ]);

    }
}
