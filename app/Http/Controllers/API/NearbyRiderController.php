<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\RiderLocation;
use App\Models\Restaurant;

use DB;


class NearbyRiderController extends Controller
{
    public function findRider($restaurantId)
    {
        try {
            $restaurant = Restaurant::findOrFail($restaurantId);
            $restaurantLat = $restaurant->lat;
            $restaurantLong = $restaurant->long;
    
            $nearestRiderLocation = RiderLocation::selectRaw(
                '*, (6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(`long`) - radians(?)) + sin(radians(?)) * sin(radians(lat)))) AS distance'
            )
                ->where('capture_time', '>=', now()->subMinutes(5))
                ->orderBy('distance')
                ->addBinding($restaurantLat, 'select')
                ->addBinding($restaurantLong, 'select')
                ->addBinding($restaurantLat, 'select')
                ->first();
    
            if ($nearestRiderLocation) {
                $data = [
                    'rider_info' => $nearestRiderLocation->rider,
                    'distance' => $nearestRiderLocation->distance,
                ];
                return response()->json($data, 200);
            } else {
                return response()->json(['message' => 'No riders found within the last 5 minutes.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
