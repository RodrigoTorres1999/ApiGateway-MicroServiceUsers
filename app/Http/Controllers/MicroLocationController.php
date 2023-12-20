<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MicroLocationController extends Controller
{

    const BASE_LOCATION_URL = 'http://127.0.0.1:8080/api/locations';
    
    public function getLocation(Request $request)
    {
        $token = $request->bearerToken();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get(self::BASE_LOCATION_URL);

        return $response->json();
    }


    //COUNTRIES
    public function addCountry(Request $request)
    {
        $token = $request->bearerToken();

        $countryData = $request->all();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post(self::BASE_LOCATION_URL . '/country/add', $countryData);

        return $response->json();
    }

    public function updateCountry(Request $request, $countryId)
    {
     
        $token = $request->bearerToken();
        $countryData = $request->all();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post(self::BASE_LOCATION_URL . "/country/update/{$countryId}", $countryData);

        return $response->json();
    }


    //DEPARTMENTS

    public function addDepartment(Request $request)
    {
        $token = $request->bearerToken();

        $departmentData = $request->all();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post(self::BASE_LOCATION_URL . '/department/add', $departmentData);

        return $response->json();
    }

    public function updateDepartment(Request $request, $departmentId)
    {
     
        $token = $request->bearerToken();
        $departmentData = $request->all();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post(self::BASE_LOCATION_URL . "/department/update/{$departmentId}", $departmentData);

        return $response->json();
    }


    //Cities
    public function addCity(Request $request)
    {
        $token = $request->bearerToken();

        $cityData = $request->all();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post(self::BASE_LOCATION_URL . '/city/add', $cityData);

        return $response->json();
    }

    public function updateCity(Request $request, $cityId)
    {
     
        $token = $request->bearerToken();
        $cityData = $request->all();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post(self::BASE_LOCATION_URL . "/city/update/{$cityId}", $cityData);

        return $response->json();
    }
}
