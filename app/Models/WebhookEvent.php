<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebhookEvent extends Model
{
    protected $fillable = [
        'event_id', 'payment_id', 'event', 'status', 'payload'
    ];

    protected $casts = [
        'payload' => 'array',
    ];
}
