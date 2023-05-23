<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Visit;
use App\Models\Hospitals;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;

class VisitsController extends BaseController
{
    protected $model = Visit::class;
    protected $view = [
        'list' => 'visits/list',
        'form' => 'visits/form'
    ];

    protected $results = [
        '' => 'Oczekuje',
        'positive' => 'Pozytywny',
        'negative' => 'Negatywny',
    ];

    protected $status = [
        'planned' => 'Zaplanowana',
        'finished' => 'Zakończona',
        'canceled' => 'Anulowana',
    ];

    public function create()
    {
        $users = User::where('type', 'user')->get();
        $hospitals = Hospitals::all();

        return view('admin/views/' . $this->view['form'])->with([
            'users' => $users,
            'hospitals' => $hospitals,
            'status' => $this->status,
            'results' => $this->results,
        ]);
    }

    public function save(Request $request)
    {
        $model = new $this->model;

        $insertData = $request->all();
        
        if (isset($insertData['_token'])) unset($insertData['_token']);
        if ($insertData['result'] == null) $insertData['result'] = '';
        
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

        $users = User::where('type', 'user')->get();
        $hospitals = Hospitals::all();

        return view('admin/views/' . $this->view['form'])->with([
            'item' => $item,
            'users' => $users,
            'hospitals' => $hospitals,
            'status' => $this->status,
            'results' => $this->results,
        ]);
    }

    public function update(Request $request)
    {
        $model = new $this->model;

        $updateData = $request->all();
        
        if (isset($updateData['_token'])) unset($updateData['_token']);
        if (isset($updateData['_method'])) unset($updateData['_method']);
        if ($updateData['result'] == null) $updateData['result'] = '';
        
        $item = $model->where('id', $request->id)->update($updateData);

        return redirect()->back();
    }
}
