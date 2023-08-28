<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Http\Interfaces\FetchInterface;

class PlaceService implements FetchInterface
{
    private $url = "https://api.foursquare.com/v3/places/search";

    public function getData($place)
    {
        $appId = config('places.foursquare');

        try {
            $response = Http::withHeaders([
                'Authorization' => $appId
            ])->get("{$this->url}?near={$place}");

            return json_decode($response->getBody());
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return false;
        }
    }
}