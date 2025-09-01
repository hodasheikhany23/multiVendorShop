<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;

class ModuleController extends Controller
{
    //
    public function index($locale){
        return view('admin.layouts.module.list',['locale'=>$locale]);
    }
}
