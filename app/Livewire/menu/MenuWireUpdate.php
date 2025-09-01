<?php

namespace App\Livewire\menu;

use App\Models\ActivityLog;
use App\Models\Menu;
use Livewire\Component;

class MenuWireUpdate extends Component
{
    public $locale;

    public $name;
    public $parent;
    public $status;
    public $location;
    public $translate_name;
    public $translate_check=false;

    public $msg;
    public $msg_status;

    public $menu;

    public function mount(Menu $menu)
    {
        $this->menu = $menu;
        $this->name = $menu->title;
        $this->parent = $menu->parent_id;
        $this->location = $menu->location;
        $this->status = $menu->status;
        if($menu->title_en != null){
            $this->translate_check = true;
            $this->translate_name = $menu->title_en;
        }
    }

    public function edit()
    {
        $this->validate([
            'name' => 'required|string|max:255|min:3',
            'status' => 'required|in:0,1',
            'location' => 'in:1,0,3',
            'translate_name' => 'nullable|string|max:255|min:3',
        ]);
        $menu = $this->menu;
        try {
            $menu->title = $this->name;
            $menu->parent_id = $this->parent;
            if($this->translate_check){
                $menu->title_en = $this->translate_name;
            }
            $menu->location = $this->location;
            $menu->status = $this->status;
            $menu->save();
            ActivityLog::log('menu',$menu->id,'update','menu updated successfully');
            $this->msg =__('validation.massages.update_success',['item'=> __('validation.attributes.menu')]);
            $this->msg_status ='success';
        }catch (\Exception $e){
            ActivityLog::log('menu',$menu->id,'update','failed to update menu __'.$e->getMessage());
            $this->msg =__('validation.massages.update_failed',['item'=> __('validation.attributes.menu')]);
            $this->msg_status ='failed';
        }
    }

    public function render()
    {
        $menus = Menu::all();
        return view('livewire.menu.menu-wire-update',['menus'=>$menus])->layout('layouts.app');
    }
}
