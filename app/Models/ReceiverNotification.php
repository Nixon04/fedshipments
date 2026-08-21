<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiverNotification extends Model
{
    protected $fillable = [
        'email_id',
        'from',
        'message_id',
        'receiver_from',
        'subject',
        'to',
        'type',
    ];
}
