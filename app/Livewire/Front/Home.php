<?php

namespace App\Livewire\Front;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Home extends Component
{

    public function render()
    {
        return view('livewire.front.home')->layout('layouts.front');
    }
}
