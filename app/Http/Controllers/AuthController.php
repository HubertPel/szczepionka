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
            'repeat_password' => ['required', 'same:password'],
        ]); 
        
        User::create([
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
            ->whereIn('type', ['worker', 'user'])
            ->first();    

        if ($user && !password_verify($request->password, $user->password)){
            $user = null;
        }
        
        if (!$user) { 
            return redirect('/logowanie')->with([
                'error' => 1,
                'message' => 'Podany użytkownik nie istnieje',
            ]);
        }

        session([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_surname' => $user->surname,
            'user_type' => $user->type
        ]);
        return redirect('/');
    }

    public function logout(Request $request) 
    {
        $request->session()->flush();
        return redirect('/');
    }
}
