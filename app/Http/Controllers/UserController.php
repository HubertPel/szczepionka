<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\Pesel;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function myAccount()
    {
        if (!session('user_id')) {
            return redirect('/logowanie');
        }

        if (session('user_type') != 'user') {
            return redirect('/');
        }

        $user = User::find(session('user_id'));

        $visits = Visit::where('user_id', $user->id)
            ->where('status', 'planned')
            ->count();

        $visitDate = Visit::where('user_id', $user->id)
            ->where('status', 'planned')
            ->orderBy('date', 'ASC')
            ->first();

        return view('my-account',
            [
                'user' => $user,
                'visits' => $visits,
                'visitDate' => $visitDate
            ]
        );
    }

    function updateMyData(Request $request)
    {
        if (!session('user_id')) {
            return redirect('/logowanie');
        }

        if (session('user_type') != 'user') {
            return redirect('/');
        }

        $validated = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'pesel' => ['required', 'unique:users,pesel,'. session('user_id'), new Pesel],
            'email' => ['required', 'unique:users,email,'. session('user_id')],
            'birthdate' => 'required',
        ]);
        
        User::where('id', session('user_id'))->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'pesel' => $request->input('pesel'),
            'email' => $request->input('email'),
            'birthdate' => $request->input('birthdate'),
        ]);

        $user = User::find(session('user_id'));
        session([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_surname' => $user->surname,
        ]);

        return redirect('/moje-konto')->with([
            'error' => 0,
            'message' => 'Poprawnie edytowano dane',
        ]);
    } 

    public function myVisits()
    {
        if (!session('user_id')) {
            return redirect('/logowanie');
        }

        if (session('user_type') != 'user') {
            return redirect('/');
        }

        $visits = Visit::where('user_id', session('user_id'))->orderBy('date', 'DESC')->get();

        $visitsCount = Visit::where('user_id', session('user_id'))
            ->where('status', 'planned')
            ->count();

        $visitDate = Visit::where('user_id', session('user_id'))
            ->where('status', 'planned')
            ->orderBy('date', 'ASC')
            ->first();


        return view('my-vistis',
            [
                'visits' => $visits,
                'visitsCount' => $visitsCount,
                'visitDate' => $visitDate
            ]
        );
    }

    public function certificate($visit)
    {
        if (!session('user_id')) {
            return redirect('/logowanie');
        }

        if (session('user_type') != 'user') {
            return redirect('/');
        }

        $visitData = Visit::where('user_id', session('user_id'))->where('id', $visit);

        if (!$visitData) {
            return redirect('/moje-konto/wizyty');
        }

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Certfikat</h1>');
        $mpdf->Output();
    }

    public function cancelVisit($visit)
    {
        if (!session('user_id')) {
            return redirect('/logowanie');
        }

        if (session('user_type') != 'user') {
            return redirect('/');
        }

        $visitData = Visit::where('user_id', session('user_id'))->where('id', $visit);

        if (!$visitData) {
            return redirect('/moje-konto/wizyty');
        }

        Visit::where('id', $visit)->update(['status' => 'canceled']);
        return redirect('/moje-konto/wizyty');
    }
}
