<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestsController extends Controller
{
    public function index()
    {
        if (!session('user_id')) {
            return redirect('/logowanie');
        }

        if (session('user_type') != 'worker') {
            return redirect('/');
        }

        $user = User::find(session('user_id'));
        
        $hospitals = [];

        foreach ($user->hospitals as $hospital) {
            $hospitals[] = $hospital->id;
        }

        $visits = Visit::whereIn('hospital_id', $hospitals)->orderBy('date', 'ASC')->get();

        return view('tests', ['visits' => $visits]);
    }

    public function changeStatus($visit)
    {
        if (!session('user_id')) {
            return redirect('/logowanie');
        }

        if (session('user_type') != 'worker') {
            return redirect('/');
        }

        $visit = Visit::find($visit);

        $user = User::find(session('user_id'));
        
        $hospitals = [];
        foreach ($user->hospitals as $hospital) {
            $hospitals[] = $hospital->id;
        }

        if (!in_array($visit->hospital_id, $hospitals)) {
            return redirect('/testy');
        }
       
        if (in_array($_GET['status'], ['planned', 'finished', 'canceled'])) {
            Visit::where('id', $visit->id)->update(['status' => $_GET['status']]);
        }

        return redirect('/testy');
    }

    public function changeResult($visit)
    {
        if (!session('user_id')) {
            return redirect('/logowanie');
        }

        if (session('user_type') != 'worker') {
            return redirect('/');
        }

        $visit = Visit::find($visit);

        $user = User::find(session('user_id'));
        
        $hospitals = [];
        foreach ($user->hospitals as $hospital) {
            $hospitals[] = $hospital->id;
        }

        if (!in_array($visit->hospital_id, $hospitals)) {
            return redirect('/testy');
        }
       
        if (in_array($_GET['result'], ['negative', 'positive'])) {
            Visit::where('id', $visit->id)->update(['result' => $_GET['result']]);
        }

        return redirect('/testy');
    }
}
