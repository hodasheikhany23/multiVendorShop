<?php

namespace App\Livewire\Front;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Header extends Component
{
    public $locale;
    public function switchLanguage($locale)
    {
        Session::put('locale', $locale);
        App::setLocale($locale);

        // ری‌دایرکت به همان صفحه برای reload کل محتوا
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        $menus = Menu::where('status',1)->whereNull('parent_id')->where(function ($query) {
            $query->where('location',1)->orWhere('location',3);
        })->with('children')->get();

        $categories = Category::whereNull('parent_id')->with('children')->get();

        return view('livewire.front.header',['menus'=>$menus,'categories'=>$categories])->layout('layouts.front');
    }
}
