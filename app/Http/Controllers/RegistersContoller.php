<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Hospitals;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistersContoller extends Controller
{
    public function index()
    {
        $cities = City::all();

        return view('register-for-vaccine', ['cities' => $cities]);
    }

    public function citiesList($city)
    {
        $hospitals = Hospitals::where('city_id', $city)->get();

        return json_encode([
            'view' => view('ajax/select-options', ['hospitals' => $hospitals])->render(),
        ]);
    }

    public function cityInfo($city)
    {

        $hospital = Hospitals::where('id', $city)->first();
 
        return json_encode([
            'info' => view('ajax/hospital-info', ['hospital' => $hospital])->render(),
            'calendar' => view('ajax/calendar', ['openDate' => json_decode($hospital->hours_data)])->render(),
        ]);
    }

    public function registerForVisit($hospital)
    {
        dd('Tutaj będzie mechanizm zapisywania na szczepienie');
    }
}
