<?php

namespace App\Http\Controllers\admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;

class CitiesController extends BaseController
{
    protected $model = City::class;
    protected $view = [
        'list' => 'cities/list',
        'form' => 'cities/form'
    ];
    protected $link = 'cities';
}
