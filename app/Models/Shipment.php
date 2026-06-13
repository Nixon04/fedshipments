<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{

    protected $fillable = [
        'tracking_code',
        'title',
        'sender_name',
        'receiver_name',
        'origin',
        'destination',
        'status',
        'progress',
        'expected_delivery',
        'current_location',
        'next_stop',
        'reference',
    ];
}
