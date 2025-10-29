<?php

namespace App\Livewire\Admin\Atrribute;

use App\Models\ActivityLog;
use App\Models\Attribute;
use Livewire\Component;

class AttributeWireCreate extends Component
{
    public $name=null;
    public $translate_name=null;
    public $translate_check=false;
    public $msg=null;
    public $msg_status=null;
    public $attribute;

    function save()
    {
        $this->validate([
            'name' => 'required|string|max:255|min:3',
            'translate_name' => 'nullable|string|max:255|min:3',
        ]);
        $attribute = new Attribute();
        try {
            $attribute->name = $this->name;
            if($this->translate_check){
                $attribute->name_en = $this->translate_name;
            }
            $attribute->save();

            ActivityLog::log('attribute',$attribute->id,'create','attribute created successfully');

            $this->msg =__('validation.massages.add_success',['item'=> __('validation.attributes.attribute')]);
            $this->msg_status ='success';
            $this->reset(['name','translate_name']);
        }catch (\Exception $e){
            $this->msg =__('validation.massages.add_failed',['item'=> __('validation.attributes.attribute')]);
            $this->msg_status ='failed';
            ActivityLog::log('attribute',null,'create','failed to create attribute __'.$e->getMessage());
        }
    }
    public function clearForm()
    {
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.atrribute.attribute-wire-create')->layout('layouts.app');
    }
}
