<?php

namespace App\Livewire\menu;

use App\Models\ActivityLog;
use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;

class MenuWire extends Component
{
    use WithPagination;
    public $locale;
    public $paginate_num=10;
    public $msg = '';
    public $msg_status = '';
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
//        $this->locale = $locale;
    }
    public function deleteMenu($id)
    {
        $menu = Menu::findOrFail($id);
        try {
           $menu->destroy($id);
            ActivityLog::log('menu',$menu->id,'delete','menu deleted successfully');
            $this->msg = __('validation.massages.delete_success',['item'=> __('validation.attributes.menu')]);
           $this->msg_status = 'info';

        }catch (\Exception $e){
            ActivityLog::log('menu',$menu->id,'delete','failed to delete menu __'.$e->getMessage());
            $this->msg = __('validation.massages.delete_failed',['item'=> __('validation.attributes.menu')]);
            $this->msg_status = 'failed';
        }
    }

    public function render()
    {
        $menus = Menu::with('parent')->paginate($this->paginate_num);
        return view('livewire.menu.menu-wire',['menus'=>$menus,'msg'=>$this->msg])->layout('layouts.app');
    }
}
