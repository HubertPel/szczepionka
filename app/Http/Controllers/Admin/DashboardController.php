<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session('admin_id')) {
            return redirect()->to('/admin/login');
        }

        return view('admin/dashboard');
    }
}
