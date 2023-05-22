<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
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

    public function edit($itemId)
    {
        $model = new $this->model;

        $item = $model->find($itemId);

        if (!$item) {
            return redirect()->back();
        }

        $types = [
            'user' => 'Użytkownik',
            'worker' => 'Prawcownik',
            'admin' => 'Admin'
        ];
        
        return view('admin/views/' . $this->view['form'])
            ->with([
                'item' => $item,
                'types' => $types
            ]);
    }
}
