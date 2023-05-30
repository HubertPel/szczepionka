<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Rules\Pesel;
use App\Models\Hospitals;
use Illuminate\Http\Request;
use App\Models\HospitalWorker;
use App\Http\Controllers\Admin\BaseController;

class UsersController extends BaseController
{
    protected $model = User::class;
    protected $view = [
        'list' => 'users/list',
        'form' => 'users/form'
    ];
    protected $link = 'users';


    protected $types = [
        'user' => 'Użytkownik',
        'worker' => 'Prawcownik',
        'admin' => 'Admin'
    ];

    public function create()
    {
        if (!session('admin_id')) {
            return redirect()->to('/admin/login');
        }

        return view('admin/views/' . $this->view['form'])->with('types', $this->types);
    }

    public function save(Request $request)
    {
        if (!session('admin_id')) {
            return redirect()->to('/admin/login');
        }

        $model = new $this->model;

        $insertData = $request->all();

        if ($insertData['type'] == 'user') {
            $validated = $request->validate([
                'name' => 'required',
                'surname' => 'required',
                'pesel' => ['required', 'unique:users,pesel', new Pesel],
                'email' => ['required', 'unique:users,email'],
                'birthdate' => 'required',
                'password' => 'required',
            ]); 
        } else {
            $validated = $request->validate([
                'name' => 'required',
                'surname' => 'required',
                'email' => ['required', 'unique:users,email'],
                'password' => 'required',
            ]); 
        }
        
        if (isset($insertData['_token'])) unset($insertData['_token']);
        
        $item = $model->create($insertData);

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

        $hospitals = [];
        if ($item->type == 'worker') {
            $userHospitals = HospitalWorker::where('user_id', $item->id)->pluck('hospital_id')->toArray();

            $hospitals = Hospitals::whereNotIn('id', $userHospitals)->get();
        }
        
        return view('admin/views/' . $this->view['form'])
            ->with([
                'item' => $item,
                'types' => $this->types,
                'hospitals' => $hospitals,
            ]);
    }

    public function update(Request $request)
    {
        if (!session('admin_id')) {
            return redirect()->to('/admin/login');
        }
        
        $model = new $this->model;

        $updateData = $request->all();

        if ($updateData['type'] == 'user') {
            $validated = $request->validate([
                'name' => 'required',
                'surname' => 'required',
                'pesel' => ['required', 'unique:users,pesel,'. $updateData['id'], new Pesel],
                'email' => ['required', 'unique:users,email,' . $updateData['id'] ],
                'birthdate' => 'required',
            ]); 
        } else {
            $validated = $request->validate([
                'name' => 'required',
                'surname' => 'required',
                'email' => ['required', 'unique:users,email'],
            ]); 
        }

        if ($updateData['password'] == '') unset($updateData['password']);   
        else $updateData['password'] =  password_hash($updateData['password'], PASSWORD_DEFAULT ); 
        if (isset($updateData['_token'])) unset($updateData['_token']);
        if (isset($updateData['_method'])) unset($updateData['_method']);
        
        $item = $model->where('id', $request->id)->update($updateData);

        return redirect()->back();
    }

    public function addHospital(Request $request)
    {
        if (!session('admin_id')) {
            return redirect()->to('/admin/login');
        }

        HospitalWorker::insert([
            'user_id' => $request->user,
            'hospital_id' => $request->hospital,
        ]);

        return redirect()->back();
    }

    public function deleteHospital(Request $request)
    {
        if (!session('admin_id')) {
            return redirect()->to('/admin/login');
        }
        
        HospitalWorker::where('hospital_id', $request->id)->where('user_id', $request->user_id)->delete();

        return redirect()->back();
    }

}
