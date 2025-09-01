<?php

namespace App\Livewire\Admin\module;

use App\Models\Module;
use Livewire\Component;
use Livewire\WithPagination;

class ModuleWire extends Component
{
    use WithPagination;
    public function render()
    {
        $modules = Module::with('menus')->paginate(10);
        return view('livewire.admin.module.module-wire',['modules'=>$modules])->layout('layouts.app');
    }
}
