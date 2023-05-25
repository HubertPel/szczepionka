<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function list() 
    {
        if (!session('admin_id')) {
            return redirect()->to('/admin/login');
        }

        $model = new $this->model;
        
        $list = $model->paginate(50);
        
        return view('admin/views/' . $this->view['list'])->with('list', $list);
    }

    public function create()
    {
        if (!session('admin_id')) {
            return redirect()->to('/admin/login');
        } 

        return view('admin/views/' . $this->view['form']);
    }

    public function save(Request $request)
    {
        if (!session('admin_id')) {
            return redirect()->to('/admin/login');
        }

        $model = new $this->model;

        $insertData = $request->all();
        
        if (isset($insertData['_token'])) unset($insertData['_token']);
        
        $item = $model->insert($insertData);

        return redirect()->back();
    }

    
    public function edit($itemId)
    {
        if (!session('admin_id')) {
            return redirect()->to('/admin/login');
        }

        $model = new $this->model;

        $item = $model->find($itemId);

        if (!$item) {
            return redirect()->back();
        }

        return view('admin/views/' . $this->view['form'])->with('item', $item);
    }

    public function update(Request $request)
    {
        if (!session('admin_id')) {
            return redirect()->to('/admin/login');
        }

        $model = new $this->model;

        $updateData = $request->all();
        
        if (isset($updateData['_token'])) unset($updateData['_token']);
        if (isset($updateData['_method'])) unset($updateData['_method']);
        
        $item = $model->where('id', $request->id)->update($updateData);

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        if (!session('admin_id')) {
            return redirect()->to('/admin/login');
        }
        
        $model = new $this->model;
        
        $model->where('id', $request->id)->delete();

        return redirect()->back();
    }
}
