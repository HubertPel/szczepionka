<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function list() 
    {
        $model = new $this->model;
        
        $list = $model->paginate(3);

        return view('admin/views/' . $this->view['list'])->with('list', $list);
    }
}
