<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Rules\Pesel;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;

class UsersController extends BaseController
{
    protected $model = User::class;
    protected $view = [
        'list' => 'users/list',
        'form' => 'users/form'
    ];

    protected $types = [
        'user' => 'Użytkownik',
        'worker' => 'Prawcownik',
        'admin' => 'Admin'
    ];

    public function create()
    {
        return view('admin/views/' . $this->view['form'])->with('types', $this->types);
    }

    public function save(Request $request)
    {
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
        
        $item = $model->insert($insertData);

        return redirect()->back();
    }

    public function edit($itemId)
    {
        $model = new $this->model;

        $item = $model->find($itemId);

        if (!$item) {
            return redirect()->back();
        }
        
        return view('admin/views/' . $this->view['form'])
            ->with([
                'item' => $item,
                'types' => $this->types
            ]);
    }

    public function update(Request $request)
    {
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
        if (isset($updateData['_token'])) unset($updateData['_token']);
        if (isset($updateData['_method'])) unset($updateData['_method']);
        
        $item = $model->where('id', $request->id)->update($updateData);

        return redirect()->back();
    }

}
