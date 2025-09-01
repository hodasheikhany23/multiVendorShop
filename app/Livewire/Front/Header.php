<?php

namespace App\Livewire\Front;

use App\Models\Menu;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $menus = Menu::where('status',1)->whereNull('parent_id')->where(function ($query) {
            $query->where('location',1)->orWhere('location',3);
        })->with('children')->get();
        return view('livewire.front.header',['menus'=>$menus])->layout('layouts.front');
    }
}
