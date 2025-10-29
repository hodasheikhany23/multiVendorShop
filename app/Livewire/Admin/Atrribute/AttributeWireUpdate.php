<?php

namespace App\Livewire\Admin\Atrribute;

use App\Models\ActivityLog;
use App\Models\Attribute;
use Livewire\Component;

class AttributeWireUpdate extends Component
{
    public $name;
    public $translate_name = null;
    public $attribute;
    public $translate_check;
    public $msg;
    public $msg_status;

    public function mount(Attribute $attribute){
        $this->attribute = $attribute;
        $this->name = $attribute->name;
        if($attribute->name_en != null){
            $this->translate_check = true;
            $this->translate_name = $attribute->name_en;
        }
    }
    public function edit()
    {
        $attribute = Attribute::findOrFail($this->attribute->id);
        try {
            $attribute->name = $this->name;
            if($this->translate_check){
                $attribute->name_en = $this->translate_name;
            }
            $attribute->save();
            $this->msg_status = 'success';
            $this->msg = __('validation.massages.update_success', ['item' => __('validation.attributes.attribute')]);
            ActivityLog::log('attribute',$attribute->id,'update','attribute updated successfully');
        }catch (\Exception $e){
            $this->msg_status = 'failed';
            $this->msg = __('validation.massages.update_failed', ['item' => __('validation.attributes.attribute')]);
            ActivityLog::log('attribute',$attribute->id,'update','attribute updated failed__'.$e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.admin.atrribute.attribute-wire-update')->layout('layouts.app');
    }
}
