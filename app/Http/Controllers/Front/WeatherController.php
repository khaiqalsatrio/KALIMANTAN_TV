<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $lat = $request->lat;
        $lon = $request->lon;

        if (!$lat || !$lon) {
            return response()->json(['error' => 'Latitude atau Longitude tidak ditemukan'], 400);
        }

        // Get Weather Data
        $url = "https://api.open-meteo.com/v1/forecast?" . http_build_query([
            'latitude'  => $lat,
            'longitude' => $lon,
            'current'   => 'temperature_2m,relative_humidity_2m,weather_code,wind_speed_10m',
            'timezone'  => 'auto'
        ]);

        try {
            $response = Http::timeout(10)->get($url);

            if (!$response->successful()) {
                return response()->json(['error' => 'Gagal menghubungi server cuaca'], 500);
            }

            $data = $response->json();

            if (!isset($data['current'])) {
                return response()->json(['error' => 'Data cuaca tidak tersedia'], 500);
            }

            $weatherCode = $data['current']['weather_code'] ?? 0;

            // Get Location Name (Reverse Geocoding)
            $locationName = $this->getLocationName($lat, $lon);

            return response()->json([
                'temp'        => $data['current']['temperature_2m'] ?? null,
                'humidity'    => $data['current']['relative_humidity_2m'] ?? null,
                'wind'        => $data['current']['wind_speed_10m'] ?? null,
                'code'        => $weatherCode,
                'description' => $this->getWeatherDescription($weatherCode),
                'icon'        => $this->getWeatherIcon($weatherCode),
                'location'    => $locationName,  // ← Tambahan
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    // ← METHOD BARU: Reverse Geocoding
    private function getLocationName($lat, $lon)
    {
        try {
            // Menggunakan Nominatim OpenStreetMap (Gratis, no API key)
            $url = "https://nominatim.openstreetmap.org/reverse?" . http_build_query([
                'lat' => $lat,
                'lon' => $lon,
                'format' => 'json',
                'addressdetails' => 1,
                'accept-language' => 'id'  // Bahasa Indonesia
            ]);

            $response = Http::timeout(5)
                ->withHeaders([
                    'User-Agent' => 'LaravelWeatherApp/1.0'  // Required by Nominatim
                ])
                ->get($url);

            if ($response->successful()) {
                $data = $response->json();
                $address = $data['address'] ?? [];

                // Prioritas: Kota/Kabupaten, lalu Provinsi
                $city = $address['city']
                    ?? $address['town']
                    ?? $address['village']
                    ?? $address['county']
                    ?? $address['state_district']
                    ?? '';

                $state = $address['state'] ?? '';

                if ($city && $state) {
                    return "$city, $state";
                } elseif ($city) {
                    return $city;
                } elseif ($state) {
                    return $state;
                }
            }
        } catch (\Exception $e) {
            // Jika gagal, kembalikan koordinat
        }

        return sprintf("%.2f°, %.2f°", $lat, $lon);
    }

    private function getWeatherDescription($code)
    {
        $descriptions = [
            0 => 'Cerah',
            1 => 'Cerah',
            2 => 'Berawan Sebagian',
            3 => 'Berawan',
            45 => 'Berkabut',
            48 => 'Berkabut',
            51 => 'Gerimis Ringan',
            53 => 'Gerimis Sedang',
            55 => 'Gerimis Lebat',
            61 => 'Hujan Ringan',
            63 => 'Hujan Sedang',
            65 => 'Hujan Lebat',
            71 => 'Salju Ringan',
            73 => 'Salju Sedang',
            75 => 'Salju Lebat',
            95 => 'Badai Petir',
        ];

        return $descriptions[$code] ?? 'Tidak Diketahui';
    }

    private function getWeatherIcon($code)
    {
        $icons = [
            0 => '01d',
            1 => '01d',
            2 => '02d',
            3 => '03d',
            45 => '50d',
            48 => '50d',
            51 => '09d',
            53 => '09d',
            55 => '09d',
            61 => '10d',
            63 => '10d',
            65 => '10d',
            71 => '13d',
            73 => '13d',
            75 => '13d',
            95 => '11d',
        ];

        $icon = $icons[$code] ?? '01d';
        return "https://openweathermap.org/img/wn/{$icon}@2x.png";
    }
}
