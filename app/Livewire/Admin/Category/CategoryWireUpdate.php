<?php

namespace App\Livewire\Admin\Category;

use App\Models\ActivityLog;
use App\Models\Category;
use Livewire\Component;

class CategoryWireUpdate extends Component
{

    public $name;
    public $parent_id;

    public $msg;
    public $msg_status;

    public $translate_check=false;
    public $translate_name;

    public $category;

    public function mount(Category $category)
    {
        $this->category = $category;
        if($category->name_en != null){
            $this->translate_check = true;
            $this->translate_name = $category->name_en;
        }
        $this->name = $category->name;
        $this->parent_id = $category->parent_id;
    }

    public function edit()
    {
        $this->validate([
            'name'=>'required|min:3|max:255',
            'parent_id'=>'nullable|numeric',
            ]);
        $category = $this->category;
        try{
            $category->name = $this->name;
            $category->parent_id = $this->parent_id;
            $category->name_en = $this->translate_name;

            $category->save();


            ActivityLog::log('category',$category->id,'update','category updated successfully');

            $this->msg =__('validation.massages.update_success',['item'=> __('validation.attributes.category')]);
            $this->msg_status ='success';

        }catch (\Exception $e){
            $this->msg =__('validation.massages.update_failed',['item'=> __('validation.attributes.category')]);
            $this->msg_status ='failed';
            ActivityLog::log('category',$category->id,'update','failed to update category __'.$e->getMessage());
        }
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.category.category-wire-update',['categories'=>$categories])->layout('layouts.app');
    }
}
