<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentTrackingUpdate extends Model
{
    protected $fillable = [
        'shipment_id',
        'location',
        'status',
        'is_current',
        'description',
        'event_time',
    ];
}
