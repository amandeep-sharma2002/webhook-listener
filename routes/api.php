<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;

Route::post('/webhook/{provider}', [WebhookController::class, 'receive']);
Route::get('/payments/{paymentId}/events', [WebhookController::class, 'history']);
