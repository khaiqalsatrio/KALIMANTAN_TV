<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $lat = $request->lat;
        $lon = $request->lon;

        // Jika lokasi tidak ditemukan
        if (!$lat || !$lon) {
            return response()->json(['error' => 'Lokasi tidak ditemukan'], 400);
        }

        // API Open-Meteo
        $url = "https://api.open-meteo.com/v1/forecast?latitude={$lat}&longitude={$lon}&current=temperature_2m,relative_humidity_2m,weather_code,wind_speed_10m&timezone=auto";

        $data = Http::get($url)->json();

        return response()->json([
            'temp'      => $data['current']['temperature_2m'],
            'humidity'  => $data['current']['relative_humidity_2m'],
            'wind'      => $data['current']['wind_speed_10m'],
            'code'      => $data['current']['weather_code'],
        ]);
    }
}
