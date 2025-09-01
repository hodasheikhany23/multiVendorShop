<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($locale)
    {
        $menus = Menu::all();
        return view('admin.layouts.menu.list',['menus'=>$menus,'locale'=>$locale]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($locale)
    {
        return view('admin.layouts.menu.create',['locale'=>$locale]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,$locale)
    {
        return view('admin.layouts.menu.update',['menu'=>$id,'locale'=>$locale]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
