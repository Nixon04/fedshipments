<?php

namespace App\Http\Controllers;

use App\Models\ReceiverNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function ResendAPI(Request $request){
        $payload = $request->all();

        Log::info('LogReference', [
            'info' => $payload,
        ]);

        if($payload['type'] === 'email.received'){
           $created_at = $payload['data']['created_at'];
           $email_id = $payload['data']['email_id'];
           $from_email = $payload['data']['from'];
           $message_id = $payload['data']['message_id'];
           $receiver_from = $payload['data']['received_for'][0];
           $subject = $payload['data']['subject'];
           $to = $payload['data']['to'][0];


           ReceiverNotification::updateOrCreate([
            'from' => $from_email,
            'receiver_from' => $receiver_from,
            'subject' => $subject,
            'to' => $receiver_from,
            'type' => $payload['type'],
           ], [
            'message_id' => $message_id,
            'email_id' => $email_id,
            'created_at' => $created_at,
           ]);

           return response()->json([
              'message' => 'Email Webhook sent successfully',
              'status' => 'success',
           ]);
        }

    }
}
