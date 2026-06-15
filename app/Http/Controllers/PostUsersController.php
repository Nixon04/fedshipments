<?php

namespace App\Http\Controllers;

use App\Helpers\ErrorCollector;
use App\Mail\BookingMailer;
use App\Mail\EmailContactReach;
use App\Models\Admin;
use App\Models\EmailMailerContact;
use App\Models\Shipment;
use App\Models\ShipmentTrackingUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Resend\Laravel\Facades\Resend;

class PostUsersController extends Controller
{


    // Route::post('/login', 'LoginAccount');
    // Route::post('/register', 'RegisterAccount');
    // Route::post('/shipment', 'CreateShipment');
    // Route::post('/tracking-id', 'TrackerID');
    // Route::post('/update-location', 'ShipmentUpdate');
    // Route::post('/update-address', 'CompanyAddress');


    public function AccountLogout(Request $request){
        Session::pull('user_session_id');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json([
          'message' => 'You have been logged Out',
          'status' => 'success',
        ]);
     }


     public function TrackerID(Request $request){
        $validate = Validator::make($request->all(), [
            'tracking_code' => 'required|string',
        ]);

        if($validate->fails()){
            return response()->json([
                'errors' => $validate->errors(),
                'error' => 'error',
            ], 422);
        }

        try{        
        $trackingid = $request->input('tracking_code');

        $query = Shipment::where('tracking_code', $trackingid)->first();
        if(!$query){
            return response()->json([
                'status' => 'error',
                'message' => 'Tracking ID Not Valid.',
            ]);
        }
    
        return response()->json([
            'status' => 'success',
            'data' => $query->reference,
            'message' => 'Shipment Collection Found.',
        ]);
       
        }   
        catch(\Exception $e){
            Log::info('error', [
                'errors' =>  $e->getMessage(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Oops something went wrong',
            ]);
        }
    }



    public function ShipmentUpdate(Request $request){

        $validate = Validator::make($request->all(), [
            'reference' => 'required|string',
            'status' => 'required|in:picked_up,in_transit,checkpoint,arrived,out_for_delivery,delivered',
            'description' => 'required|string',
            'nextstop' => 'required|string',
            'location' => 'required|string',
        ]);

        if($validate->fails()){
            return response()->json([
                'errors' => $validate->errors(),
                'status' => 'error',
            ], 422);
        }

        try{        
        $reference = $request->input('reference');

        $queryship = Shipment::where('reference', $request->input('reference'))->first();
        if(!$queryship){
            return response()->json([
                'status' => 'error',
                'message' => 'No reference found',
            ]);
        }

        if($queryship->status == 'delivered'){
            return response()->json([
                'status' => 'error',
                'message' => 'Delivery has ended',
            ]);
        }

        if ($request->input('status')) {
            $query = Shipment::where('reference', $reference)->firstOrFail();
            $status = $request->input('status');
            $progressMap = [
                'picked_up' => 10,
                'in_transit' => 30,
                'checkpoint' => 50,
                'arrived' => 70,
                'out_for_delivery' => 90,
                'delivered' => 100,
            ];
        
            $query->update([
                'status' => $status,
                'progress' => $progressMap[$status] ?? 0,
            ]);
        }

        $query = ShipmentTrackingUpdate::where('shipment_id', $queryship->id)->first();
        if(!$query){
            return response()->json([
                'status' => 'error',
                'message' => 'No ID found',
            ]);
        }

        $queryshipment = Shipment::where('reference', $reference)->firstOrFail();
        $queryshipment->update([
            'current_location' => $request->input('location'),
            'next_stop' => $request->input('nextstop'),
        ]);
        

        if($request->input('status') == 'delivered'){
            $queryshipment->update([
                'status' => 'delivered',
            ]);
        }
        
        $requestchecker = ShipmentTrackingUpdate::create([
            'shipment_id' => $queryship->id,
            'location' => $request->input('location'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'is_current' => 1,
            'event_time' => now(),
        ]);

    
            
        return response()->json([
            'status' => 'success',
            'message' => 'Shipment Updated Successfully',
        ]);
       
        }   
        catch(\Exception $e){
            Log::info('error', [
                'errors' =>  $e->getMessage(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Oops something went wrong',
            ]);
        }
    }




    public function DeleteShipment(Request $request){
        $validate = Validator::make($request->all(), [
            'reference' => 'required|string',
        ]);

        if($validate->fails()){
            return response()->json([
                'errors' => $validate->errors(),
                'status' => 'error',
            ], 422);
        }

        try{        
        $reference = $request->input('reference');

        $query = Shipment::where('reference', $reference)->first();
        if(!$query){
            return response()->json([
                'status' => 'error',
                'message' => 'No reference found',
            ]);
        }

        $query->delete();
            
        return response()->json([
            'status' => 'success',
            'message' => 'Shipment Deleted Successfully',
        ]);
       
        }   
        catch(\Exception $e){
            Log::info('error', [
                'errors' =>  $e->getMessage(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Oops something went wrong',
            ]);
        }
    }


    public function CreateShipment(Request $request){
        $validate = Validator::make($request->all(), [
            'title' => 'required|string',
            'sender_name' => 'required|string',
            'receiver_name' => 'required|string',
            'origin' => 'required|string',
            'destination' => 'required|string',
            'expected_delivery' => 'required|date',
        ]);

        if($validate->fails()){
            return response()->json([
                'errors' => $validate->errors(),
                'status' => 'error',
            ], 422);
        }

        try{        
            $result = DB::transaction(function () use ($request) {
                $email = $request->input('email');

                $query = Admin::where('email', $email)->first();
                if($query){
                    return [
                        'status' => 'error',
                        'message' => 'Email Already Registered',
                    ];
                }
        
                $query = Shipment::where('title', $request->input('title'))->first();
                if($query){
                    return [
                        'status' => 'error',
                        'message' => 'Shipment Type Already Created, Make The Goods Unique',
                    ]; 
                }
        
                $tracker_code = 'FED-' . Str::random(20);
                $reference = Str::uuid();
                
                $shipments = Shipment::create([
                    'tracking_code' => $tracker_code,
                    'title' => $request->input('title'),
                    'sender_name' => $request->input('sender_name'),
                    'receiver_name' => $request->input('receiver_name'),
                    'origin' => $request->input('origin'),
                    'destination' => $request->input('destination'),
                    'current_location' => $request->input('origin'),
                    'next_stop' => 'Pending',
                    'status' => 'pending',
                    'progress' => 0,
                    'expected_delivery' => $request->input('expected_delivery'),
                    'reference' => $reference,
                ]);
                    
                ShipmentTrackingUpdate::create([
                    'shipment_id' => $shipments->id,
                    'location' => 'Present',
                    'status' => 'picked_up',
                    'description' => 'Product picked.',
                    'is_current' => 1,
                    'event_time' =>  now(),
                ]);
        
                return [
                    'status' => 'success',
                    'message' => 'Shipment Created Successfully',
                ];
            });

            return response($result);
        }   
        catch(\Exception $e){
            Log::info('error', [
                'errors' =>  $e->getMessage(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Oops something went wrong',
            ]);
        }
    }



    public function SendEmail(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'message' => 'required|string|max:1000',
            ]);

            if($validator->fails()){
                return response()->json([
                    'errors' => $validator->errors(),
                    'error' => 'error',
                ], 422);
            }

            $email = $request->input('email');
            $message = $request->input('message');

 
            Resend::emails()->send([
                'from' => 'Nixon <info@nivexiahealth.com>',
                'to' => 'regisnow@proton.me',
                'subject' => 'Contact Mailer',
                'html' => (new EmailContactReach($email, $message))->render(),
            ]);

            return response()->json([
                'message' => 'Email Sent Successfully',
                'status' => 'success',
            ]);

        }
        catch(\Exception $e){
            Log::info($e);
            return response()->json([
                'message' => 'Oops something went wrong...',
                'status' => 'success',
            ]);
        }
    }


    public function BookingsMail(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'services' => 'required|in:dialysis,homecare,gym,laboratory,pharmacy',
                'fullname' => 'required|string|max:50',
                'phone_number' => 'required|digits:11',
                'email_address' => 'required|email',
                'date' => 'required',
            ]);

            if($validator->fails()){
                return response()->json([
                    'errors' => $validator->errors(),
                    'error' => 'error',
                ], 422);
            }

            // Resend::emails()->send([
            //     'from' => 'Nixon <info@nivexiahealth.com>',
            //     'to' => 'nixonsampson04@gmail.com',
            //     'subject' => 'Contact Mailer',
            //     'html' => (new BookingMailer
            //     ($request->input('services'),
            //     $request->input('fullname'),
            //     $request->input('phone_number'),
            //     $request->input('date'),
            //     $request->input('email_address'),
            //     ))->render(),
            // ]);

            return response()->json([
                'message' => 'Thanks, Booking has been recieved and our team will reach out to you soon.',
                'status' => 'success',
            ]);

        }
        catch(\Exception $e){
            Log::info($e);
            return response()->json([
                'message' => 'Oops something went wrong...',
                'status' => 'success',
            ]);
        }
    }




    public function LoginAccount(Request $request){
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validate->fails()){
            return response()->json([
                'errors' => $validate->errors(),
                'status' => 'error',
            ], 422);
        }

        try{        
        $email = $request->input('email');

        $query = Admin::where('email', $request->input('email'))->first();
        if ($query && Hash::check($request->input('password'), $query->password)){
            Session::put('user_session_id', trim($request->input('email')));

            return response()->json([
                'message' => 'Authentication successful',
                'status' => 'success',
            ]);
        }
        else{
            return response()->json([
                'message' => 'Email or Password is incorrect',
                'status' => 'error',
            ]);
        }
        }   
        catch(\Exception $e){
            Log::info('error', [
                'errors' =>  $e,
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Oops something went wrong',
            ]);
        }
    }

    public function RegisterAccount(Request $request){
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validate->fails()){
            return response()->json([
                'errors' => $validate->errors(),
                'status' => 'error',
            ], 422);
        }

        try{        
        $email = $request->input('email');

        $query = Admin::where('email', $email)->first();
        if($query){
            return response()->json([
                'status' => 'error',
                'message' => 'Email Already Registered',
            ]);
        }
            
        Admin::create([
            'name' => 'Feds',
            'email' => $email,
            'password' => Hash::make($request->input('password')),
            'role' => 'super_admin',
            'last_login' => now(), 
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Account Created Successfully',
        ]);
       
        }   
        catch(\Exception $e){
            Log::info('error', [
                'errors' =>  $e,
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Oops something went wrong',
            ]);
        }
    }






    public function ShipmentLog(Request $request){
        $perPage = $request->query('per_page', 15);
        $search = $request->query('search');
        $tabselect = $request->query('tabselect');

        // $session_id = Session::get('user_session_id');

        $query = DB::table('shipments as ship')
            ->select([
                'ship.tracking_code',
                'ship.title',
                'ship.id',
                'ship.sender_name',
                'ship.receiver_name',
                'ship.origin',
                'ship.destination',
                'ship.reference',
                'ship.status',
                'ship.created_at',
                'ship.expected_delivery',
            ])->orderBy('ship.id', 'DESC');
    
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('ship.title', 'like', "%{$search}%") 
                ->orWhere('ship.sender_name', 'like', "%{$search}%")
                ->orWhere('ship.receiver_name', 'like', "%{$search}%");
            });
        }
        
        if($tabselect !== null){
            $query->where('ship.status', $tabselect);
        }
    
        $data = $query->paginate($perPage);

        return response()->json([
            'data' => $data,
            'status' => 'success',
        ]);
    }



    public function ShipmentUpdateLog(Request $request){
        $perPage = $request->query('per_page', 15);
        $search = $request->query('search');
        $tabselect = $request->query('tabselect');

        // $session_id = Session::get('user_session_id');
    
        $query = DB::table('shipment_tracking_updates as ship')
            ->select([
                'ship.shipment_id',
                'ship.location',
                'ship.description',
                'ship.status',
                'ship.is_current',
                'ship.event_time',
            ]);
    
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('ship.title', 'like', "%{$search}%") 
                ->orWhere('ship.sender_name', 'like', "%{$search}%")
                ->orWhere('ship.receiver_name', 'like', "%{$search}%");
            });
        }
        
        if($tabselect !== null){
            $query->where('ship.status', $tabselect);
        }
    
        $data = $query->paginate($perPage);

        return response()->json([
            'data' => $data,
            'status' => 'success',
        ]);
    }
    

}



