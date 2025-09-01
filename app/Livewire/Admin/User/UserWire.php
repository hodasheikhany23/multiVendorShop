<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class UserWire extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.admin.user.user-wire',['users'=>$users])->layout('layouts.app');
    }
}
