<?php

namespace App\Livewire;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Sidebar extends Component
{
    public $locale;
    public $title;
    public $header_left;

    public function mount($locale = null, $title = 'نام صفحه', $header_left = '')
    {
        $this->title = $title;
        $this->header_left = $header_left;

        $this->locale = Session::get('locale', config('app.locale'));
        session(['locale' => $this->locale]);
        App::setLocale($this->locale);
    }

    public function switchLanguage($locale)
    {
        Session::put('locale', $locale);
        App::setLocale($locale);

        // ری‌دایرکت به همان صفحه برای reload کل محتوا
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.sidebar', ['locale' => $this->locale]);
    }
}
