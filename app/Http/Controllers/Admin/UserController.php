<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function index($locale){
        return view('admin.layouts.user.list',['locale'=>$locale]);
    }
}
