<?php

namespace App\Http\Controllers\admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;

class FaqController extends BaseController
{
    protected $model = Faq::class;
    protected $view = [
        'list' => 'faq/list',
        'form' => 'faq/form'
    ];

}
