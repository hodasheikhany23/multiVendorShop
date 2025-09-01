<?php

namespace App\Livewire\menu;

use App\Models\ActivityLog;
use App\Models\Menu;
use Livewire\Attributes\Validate;
use Livewire\Component;

class MenuWireCreate extends Component
{
    public $locale;

    public $name=null;
    public $parent=null;
    public $status=null;
    public $location=null;
    public $translate_name=null;
    public $translate_check = false;

    public $msg;
    public $msg_status;

    public function mount()
    {
//        $this->locale = $locale;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255|min:3',
            'status' => 'required|in:0,1',
            'location' => 'in:1,0,3',
            'translate_name' => 'nullable|string|max:255|min:3',
        ]);

        try {
            $menu = new Menu();
            $menu->title = $this->name;
            $menu->parent_id = $this->parent;
            $menu->status = $this->status;
            $menu->location = $this->location;
            $menu->title_en = $this->translate_name;
            $menu->save();

            ActivityLog::log('menu',$menu->id,'create','menu created successfully');

            $this->msg =__('validation.massages.add_success',['item'=> __('validation.attributes.menu')]);
            $this->msg_status ='success';
            $this->reset(['name','parent','status','location','translate_name']);
        }catch (\Exception $e){
            $this->msg =__('validation.massages.add_failed',['item'=> __('validation.attributes.menu')]);
            $this->msg_status ='failed';
            ActivityLog::log('menu',null,'create','failed to create menu __'.$e->getMessage());
        }

    }
    public function clearForm()
    {
        $this->reset();
    }
    public function render()
    {
        $menus = Menu::all();
        return view('livewire.menu.menu-wire-create',['menus'=>$menus])->layout('layouts.app');
    }
}
