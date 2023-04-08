<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Visit;
use App\Models\Hospitals;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistersContoller extends Controller
{
    public function index()
    {
        if (!session('user_id')) {
            return redirect('/logowanie');
        }

        $cities = City::all();

        return view('register-for-vaccine', ['cities' => $cities]);
    }

    public function citiesList($city)
    {
        if (!session('user_id')) {
            return redirect('/logowanie');
        }

        $hospitals = Hospitals::where('city_id', $city)->get();

        return json_encode([
            'view' => view('ajax/select-options', ['hospitals' => $hospitals])->render(),
        ]);
    }

    public function cityInfo($city)
    {
        if (!session('user_id')) {
            return redirect('/logowanie');
        }

        $hospital = Hospitals::where('id', $city)->first();
        $week = $this->getWeek('+1 weeks');

        $visits = Visit::where('date', '>=', $week['start'])
            ->where('date', '<=', $week['end'])
            ->where('hospital_id', $city)
            ->get();

        $arrayOfDate = [];
        foreach ($visits as $visit) {
            $arrayOfDate[] = $visit->date;
        }
    
        return json_encode([
            'info' => view('ajax/hospital-info', ['hospital' => $hospital])->render(),
            'calendar' => view(
                'ajax/calendar',
                [
                    'openDate' => json_decode($hospital->hours_data),
                    'week' => $week,
                    'existedDates' => $arrayOfDate,
                ]
            )->render(),
        ]);
    }

    private function getWeek($changeDate = NULL)
    {
        //check the current day
        if(date('D')!='Mon') {    
        //take the last monday
            $staticstart = date('Y-m-d',strtotime('last Monday'));    
        } else {
            $staticstart = date('Y-m-d');   
        }

        //always next saturday
        if(date('D')!='Sat') {
            $staticfinish = date('Y-m-d',strtotime('next Saturday'));
        } else {
            $staticfinish = date('Y-m-d');
        }

        if ($changeDate) {
            return [
                'start' => date('Y-m-d', strtotime($staticstart . ' ' . $changeDate)),
                'end' => date('Y-m-d', strtotime($staticfinish . ' ' . $changeDate)),
            ];
        }
        return [
            'start' => $staticstart,
            'end' => $staticfinish,
        ];
    }

    public function registerForVisit($hospital)
    {
        if (!session('user_id')) {
            return redirect('/logowanie');
        }

        if (!isset($hospital) || !isset($_GET['hour']) || !isset($_GET['date'])) {
            return redirect('/zapisy')->with(['error' => 1, 'message' => 'Wystąpił błąd spróbuj ponownie']);
        }

        $visitDate = date('Y-m-d H:i:s', strtotime($_GET['date'] . ' ' . $_GET['hour']));

        Visit::insert([
            'user_id' => session('user_id'),
            'hospital_id' => $hospital,
            'date' => $visitDate
        ]);

        return redirect('/zapisy')->with(['error' => 0, 'message' => 'Poprawnie dodano wizytę']);
    }
}
