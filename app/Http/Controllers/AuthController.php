<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\Pesel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'pesel' => ['required', 'unique:users,pesel', new Pesel],
            'email' => ['required', 'unique:users,email'],
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

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)
            ->where('password', $request->password)
            ->first();    
        
        if (!$user) { 
            return redirect('/logowanie')->with([
                'error' => 1,
                'message' => 'Podany użytkownik nie istnieje',
            ]);
        }

        // $request->session()->put('user_id', $user->id);

        session([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_surname' => $user->surname,
        ]);
        return redirect('/');
    }
}
