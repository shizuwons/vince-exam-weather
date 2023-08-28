<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Http\Interfaces\FetchInterface;

class WeatherService implements FetchInterface
{
    private $url = "https://api.openweathermap.org/data/2.5/forecast";

    public function getData($place)
    {
        $appId = config('places.openweather');

        try {
            $response = Http::get("{$this->url}/?q={$place}&appid={$appId}");

            return json_decode($response->getBody());
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return false;
        }
    }
}