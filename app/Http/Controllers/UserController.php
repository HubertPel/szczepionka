<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\Pesel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function myAccount()
    {
        if (!session('user_id')) {
            return redirect('/logowanie');
        }

        $user = User::find(session('user_id'));
        return view('my-account', ['user' => $user]);
    }

    function updateMyData(Request $request)
    {
        if (!session('user_id')) {
            return redirect('/logowanie');
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

        return redirect('/moje-konto')->with([
            'error' => 0,
            'message' => 'Poprawnie edytowano dane',
        ]);
    } 
}
