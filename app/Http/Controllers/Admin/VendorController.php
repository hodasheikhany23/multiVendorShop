<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    //
    public function index($locale){
        return view('admin.layouts.vendor.list',['locale'=>$locale]);
    }
}
