<?php

namespace App\Livewire\Admin\Tag;

use App\Models\ActivityLog;
use App\Models\Tag;
use Livewire\Component;

class TagWireCreate extends Component
{
    public $name=null;

    public $msg=null;
    public $msg_status=null;

    public $translate_check=false;
    public $translate_name=null;

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255|min:3',
        ]);
        $tag = new Tag();
        try{
            $tag->name = $this->name;
            if ($this->translate_check) {
                $tag->name_en= $this->translate_name;
            }
            $tag->save();

            ActivityLog::log('tag',$tag->id,'create','tag created successfully');

            $this->msg =__('validation.massages.add_success',['item'=> __('validation.attributes.tag')]);
            $this->msg_status ='success';
            $this->reset(['name','translate_name']);

        }catch (\Exception $e){
            $this->msg =__('validation.massages.add_failed',['item'=> __('validation.attributes.tag')]);
            $this->msg_status ='failed';
            ActivityLog::log('tag',null,'create','failed to create tag __'.$e->getMessage());
        }

    }

    public function clearForm()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.admin.tag.tag-wire-create')->layout('layouts.app');
    }
}
