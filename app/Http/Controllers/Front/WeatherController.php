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

        if (!$lat || !$lon) {
            return response()->json(['error' => 'Latitude atau Longitude tidak ditemukan'], 400);
        }

        // Build URL aman
        $url = "https://api.open-meteo.com/v1/forecast?" . http_build_query([
            'latitude'  => $lat,
            'longitude' => $lon,
            'current'   => 'temperature_2m,relative_humidity_2m,weather_code,wind_speed_10m',
            'timezone'  => 'auto'
        ]);

        // Request ke API
        $response = Http::timeout(10)->get($url);

        if (!$response->successful()) {
            return response()->json(['error' => 'Gagal menghubungi server cuaca'], 500);
        }

        $data = $response->json();

        // Validasi data
        if (!isset($data['current'])) {
            return response()->json(['error' => 'Data cuaca tidak tersedia'], 500);
        }

        return response()->json([
            'temp'     => $data['current']['temperature_2m'] ?? null,
            'humidity' => $data['current']['relative_humidity_2m'] ?? null,
            'wind'     => $data['current']['wind_speed_10m'] ?? null,
            'code'     => $data['current']['weather_code'] ?? null,
        ]);
    }
}
