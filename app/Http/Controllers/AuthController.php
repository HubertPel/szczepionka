<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function saveUser(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'pesel' => 'required',
            'email' => 'required',
            'birthdate' => 'required',
            'password' => 'required',
        ]);
        
        User::insert([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'pesel' => $request->input('pesel'),
            'email' => $request->input('email'),
            'birthdate' => $request->input('birthdate'),
            'password' => $request->input('password'),
        ]);

        return redirect('/rejestracja')->with([
            'error' => 0,
            'message' => 'Poprawnie dodano konto',
        ]);
    }
}
