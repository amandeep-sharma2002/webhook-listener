<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebhookEvent extends Model
{
    protected $fillable = [
        'provider', 'event_id', 'payment_id', 'status', 'payload'
    ];

    protected $casts = [
        'payload' => 'array',
    ];
}
