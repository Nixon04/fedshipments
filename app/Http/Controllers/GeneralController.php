<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class GeneralController extends Controller
{
    public function MainHome(){
        return Inertia::render('home');
    }
    
    public function About(){
        return Inertia::render('about-us');
    }

    public function Services(){
        return Inertia::render('services');
    }
    public function Contact(){
        return Inertia::render('contact');
    }
    
    public function Tracker(){
        return Inertia::render('tracker');
    }
    
    public function Privacy(){
        return Inertia::render('privacy');
    }


    public function AirFreight(){
        return Inertia::render('services/air-freight');
    }
    

    public function Ocean(){
        return Inertia::render('services/ocean-freight');
    }
    

    public function Logistics(){
        return Inertia::render('services/logistics');
    }
    

    public function WareHouse(){
        return Inertia::render('services/warehouse');
    }
    

    public function Brokage(){
        return Inertia::render('services/brokage');
    }


    public function LocationTracker($id){

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

        return Inertia::render('c/tracking-location', [
            'id' => $id,
            'shipment_info' => $queryship,
            'shipmentUpdates' => $updates,
        ]);
    }


       
    
    
    
}
