<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\ShipmentTrackingUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function AdminLogin(){
        return Inertia::render('jay-funds/backend/login', [
        ]);
    }

    public function HomeDashboard(){
        $total = Shipment::orderBy('id', 'DESC')->count();
        $in_transit = ShipmentTrackingUpdate::where('status', 'in_transit')->orderBy('id', 'DESC')->count();
        $delivered = ShipmentTrackingUpdate::where('status', 'delivered')->orderBy('id', 'DESC')->count();
        $data = [
            'total' => $total ?? 0,
            'in_transit' => $in_transit ?? '0',
            'delivered' => $delivered ?? '0',
        ];

        return Inertia::render('jay-funds/dashboard/home', [
            'data' => $data,
        ]);
    }
    
    public function ReceiverNotificationID($id)
    {
        try {
    
            $url = "https://api.resend.com/emails/receiving/{$id}";
    
            $response = Http::withToken(env('RESEND_API_KEY'))
                ->acceptJson()
                ->timeout(15)
                ->get($url);
    
            Log::info('Resend Received Email', [
                'url' => $url,
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
    
            if (!$response->successful()) {
    
                Log::error('Failed to retrieve Resend email', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
    
                return Inertia::render('jay-funds/dashboard/read-mail', [
                    'email' => null,
                    'error' => 'Unable to retrieve this email.',
                ]);
            }
    
            $email = $response->json();
    
            Log::info('Received Email Content', [
                'email_id' => $email['id'] ?? null,
                'from' => $email['from'] ?? null,
                'to' => $email['to'] ?? [],
                'subject' => $email['subject'] ?? null,
                'html' => $email['html'] ?? null,
                'text' => $email['text'] ?? null,
            ]);
    
            return Inertia::render('jay-funds/dashboard/read-mail', [
                'email' => [
                    'id' => $email['id'] ?? null,
                    'from' => $email['from'] ?? null,
                    'to' => $email['to'] ?? [],
                    'subject' => $email['subject'] ?? '',
                    'created_at' => $email['created_at'] ?? null,
    
                    // Main email content
                    'html' => $email['html'] ?? '',
                    'text' => $email['text'] ?? '',
    
                    // Useful for reply/thread information
                    'message_id' => $email['message_id'] ?? null,
                    'reply_to' => $email['reply_to'] ?? [],
                    'headers' => $email['headers'] ?? [],
                    'attachments' => $email['attachments'] ?? [],
                    'received_for' => $email['received_for'] ?? [],
                ],
                'error' => null,
            ]);
    
        } catch (\Throwable $e) {
    
            Log::error('Exception retrieving Resend received email', [
                'email_id' => $id,
                'error' => $e->getMessage(),
            ]);
    
            return Inertia::render('jay-funds/dashboard/read-mail', [
                'email' => null,
                'error' => 'Something went wrong while retrieving the email.',
            ]);
        }
    }

    public function ReceiveNotification(){
        return Inertia::render('jay-funds/dashboard/receiver');
    }

    public function Settings(){
        return Inertia::render('jay-funds/dashboard/settings');
    }

    public function NotificationSettings(){
        return Inertia::render('jay-funds/dashboard/notification');
    }

    public function Shipment(){
        return Inertia::render('jay-funds/dashboard/shipment');
    }

    public function History(){
        return Inertia::render('jay-funds/dashboard/history');
    }

    public function ShipmentUpdate($id){

        $queryship = Shipment::where('reference', $id)->first();
        if(!$queryship){
            return response()->json([
                'status' => 'error',
                'message' => 'No reference found',
            ]);
        }

        $updates = DB::table('shipment_tracking_updates')
        ->where('shipment_id', $queryship->id)
        ->orderBy('created_at')
        ->get();

        return Inertia::render('jay-funds/dashboard/shipment-update', [
            'reference' =>$id,
            'shipmentUpdates' => $updates,
        ]);
    }
}

