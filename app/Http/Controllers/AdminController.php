<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\ShipmentTrackingUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function Settings(){
        return Inertia::render('jay-funds/dashboard/settings');
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

