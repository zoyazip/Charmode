<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use App\Models\Order;

class TrackingNumberHelper
{
    public static function generateUniqueTrackingNumber()
    {
        do {
            // Generate a random string of 10 characters
            $trackingNumber = strtoupper(Str::random(10));
        } while (Order::where('trackingNumber', $trackingNumber)->exists());

        return $trackingNumber;
    }
}