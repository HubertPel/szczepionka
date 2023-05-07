<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin/login');
    }

    public function loginUser(Request $request)
    {
        $user = User::where('email', $request->email)
            ->where('type', 'admin')
            ->first();
   
        if (!$user || !password_verify($request->password, $user->password)) {
            return redirect()->to('/admin/login');
        }

        session([
            'admin_id' => $user->id,
            'admin_name' => $user->name,
            'admin_surname' => $user->surname,
        ]);
      
        return redirect('/admin');
    }
}
