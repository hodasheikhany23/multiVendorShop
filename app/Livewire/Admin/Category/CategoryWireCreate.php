<?php

namespace App\Livewire\Admin\Category;

use App\Models\ActivityLog;
use App\Models\Category;
use Livewire\Component;

class CategoryWireCreate extends Component
{
    public $name=null;
    public $parent_id=null;

    public $msg=null;
    public $msg_status=null;

    public $translate_check=false;
    public $translate_name=null;

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255|min:3',
        ]);
        $category = new Category();
        try{
            $category->name = $this->name;
            $category->parent_id = $this->parent_id;
            if ($this->translate_check) {
                $category->name_en= $this->translate_name;
            }
            $category->save();

            ActivityLog::log('category',$category->id,'create','category created successfully');

            $this->msg =__('validation.massages.add_success',['item'=> __('validation.attributes.category')]);
            $this->msg_status ='success';
            $this->reset(['name','parent_id','translate_name']);

        }catch (\Exception $e){
            $this->msg =__('validation.massages.add_failed',['item'=> __('validation.attributes.category')]);
            $this->msg_status ='failed';
            ActivityLog::log('category',null,'create','failed to create category __'.$e->getMessage());
        }

    }

    public function clearForm()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        $categories = Category::with('parent')->get();
        return view('livewire.admin.category.category-wire-create',['categories'=>$categories])->layout('layouts.app');
    }
}
