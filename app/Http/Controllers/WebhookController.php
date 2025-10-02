<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebhookEvent;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    private $secret;

    public function __construct()
    {
        $this->secret = env('WEBHOOK_SECRET', 'test_secret');
    }

    public function receive(Request $request, $provider)
    {
        $signature = $request->header('X-Signature');

        $computed = hash_hmac('sha256', $request->getContent(), $this->secret);

        if (!hash_equals($computed, $signature)) {
            return response()->json(['error' => 'Invalid signature'], 401);
        }

        $payload = $request->json()->all();

        $eventId   = $payload['id'] ?? null;
        $paymentId = $payload['payload']['payment']['entity']['id'] ?? null;
        $status    = $payload['payload']['payment']['entity']['status'] ?? null;

        if (!$eventId || !$paymentId) {
            return response()->json(['error' => 'Missing event_id or payment_id'], 400);
        }

        try {
            $event = WebhookEvent::create([
                'provider'   => $provider,
                'event_id'   => $eventId,
                'payment_id' => $paymentId,
                'status'     => $status,
                'payload'    => $payload,
            ]);
            return response()->json(['message' => 'Event accepted', 'id' => $event->id], 201);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => 'Duplicate event ignored'], 200);
        }
    }

    public function history($paymentId)
    {
        $events = WebhookEvent::where('payment_id', $paymentId)
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->map(function ($event) {
                        return [
                            'event_type' => $event->status,
                            'received_at' => $event->created_at->toIso8601String(),
                        ];
                    });

        return response()->json($events);
    }

}
