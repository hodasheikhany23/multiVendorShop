<?php

namespace App\Livewire\Admin\Tag;

use App\Models\ActivityLog;
use App\Models\Tag;
use Livewire\Component;

class TagWireUpdate extends Component
{
    public $name;

    public $msg=null;
    public $msg_status=null;

    public $translate_check;
    public $translate_name;

    public $tag;
    public function mount(Tag $tag){
        $this->tag=$tag;
        $this->name = $tag->name;
        if($tag->name_en != null){
            $this->translate_check = true;
            $this->translate_name = $tag->name_en;
        }
    }
    public function edit()
    {
        $this->validate([
            'name' => 'required|string|max:255|min:3',
        ]);
        $tag = $this->tag;
        try{
            $tag->name = $this->name;
            if ($this->translate_check) {
                $tag->name_en= $this->translate_name;
            }
            $tag->save();

            ActivityLog::log('tag',$tag->id,'update','tag updated successfully');

            $this->msg =__('validation.massages.update_success',['item'=> __('validation.attributes.tag')]);
            $this->msg_status ='success';
        }catch (\Exception $e){
            $this->msg =__('validation.massages.update_failed',['item'=> __('validation.attributes.tag')]);
            $this->msg_status ='failed';
            ActivityLog::log('tag',null,'update','failed to update tag __'.$e->getMessage());
        }

    }

        public function render()
    {
        return view('livewire.admin.tag.tag-wire-update')->layout('layouts.app');
    }
}
