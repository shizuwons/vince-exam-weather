<?php

namespace App\Http\Controllers\Location;

use Illuminate\Http\Request;
use App\Http\Services\PlaceService;
use App\Http\Controllers\Controller;
use App\Http\Services\WeatherService;
use App\Http\Requests\PlaceRequest;

class LocationController extends Controller
{
    private $weatherService, $placeService;

    public function __construct(WeatherService $weather, PlaceService $place)
    {
        $this->weatherService = $weather;
        $this->placeService = $place;
    }

    public function getPlaceDetails(PlaceRequest $request)
    {
        $search = $request->query('city');

        // Get the weather
        try {
            $weather = $this->weatherService->getData($search);

            // Get the place information
            $place = $this->placeService->getData("{$weather->city->name}, {$weather->city->country}");
        } catch (\Exception $e) {
            return response()->json([
                'errors' => 'city',
                'message' => 'City not found'
            ], 422);
        }

        return response()->json([
            'weather' => $weather,
            'place' => $place
        ]);
    }
}
