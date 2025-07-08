<?php

// app/Http/Controllers/WilayahController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WilayahController extends Controller
{
    public function getProvinces()
    {
        $response = Http::withOptions([
            'verify' => false, // Nonaktifkan verifikasi SSL
        ])->get('https://wilayah.id/api/provinces.json');

        return response()->json($response->json());
    }

    public function getRegencies($provinceCode)
    {
        $response = Http::withOptions([
            'verify' => false, // Nonaktifkan verifikasi SSL
        ])->get("https://wilayah.id/api/regencies/{$provinceCode}.json");
        return response()->json($response->json());
    }

    public function getDistricts($regencyCode)
    {
        $response = Http::withOptions([
            'verify' => false, // Nonaktifkan verifikasi SSL
        ])->get("https://wilayah.id/api/districts/{$regencyCode}.json");
        return response()->json($response->json());
    }

    public function getVillages($districtCode)
    {
        $response = Http::withOptions([
            'verify' => false, // Nonaktifkan verifikasi SSL
        ])->get("https://wilayah.id/api/villages/{$districtCode}.json");
        return response()->json($response->json());
    }
}

