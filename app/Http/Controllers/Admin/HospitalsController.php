<?php

namespace App\Http\Controllers\admin;

use App\Models\City;
use App\Models\Hospitals;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;

class HospitalsController extends BaseController
{
    protected $model = Hospitals::class;
    protected $view = [
        'list' => 'hospitals/list',
        'form' => 'hospitals/form'
    ];
    protected $link = 'hospitals';


    public function create()
    {
        if (!session('admin_id')) {
            return redirect()->to('/admin/login');
        }

        return view('admin/views/' . $this->view['form'])->with('cities', City::all());
    }

    public function save(Request $request)
    {
        if (!session('admin_id')) {
            return redirect()->to('/admin/login');
        }

        $model = new $this->model;

        $insertData = $request->all();
        
        if (isset($insertData['_token'])) unset($insertData['_token']);

        $insertData['hours_data'] = json_encode($insertData['hours_data']);
  
        $item = $model->insert($insertData);

        return redirect()->to('/admin/' . $this->link);
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

        $hours = json_decode($item->hours_data, 1);

        return view('admin/views/' . $this->view['form'])->with([
            'item' => $item,
            'cities' => City::all(),
            'hours' => $hours
        ]);
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
        
        $updateData['hours_data'] = json_encode($updateData['hours_data']);
        
        $item = $model->where('id', $request->id)->update($updateData);

        return redirect()->back();
    }
}
