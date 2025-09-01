<?php

namespace App\Livewire\Admin\Category;

use App\Models\ActivityLog;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryWire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate_num=5;
    public $msg;
    public $msg_status;

    public function deleteCategory($id)
    {
        $category = Category::findOrfail($id);
        try {
            $category->delete();

            ActivityLog::log('category',$category->id,'delete','category deleted successfully');

            $this->msg =__('validation.massages.delete_success',['item'=> __('validation.attributes.category')]);
            $this->msg_status ='info';
        }catch (\Exception $e){
            $this->msg =__('validation.massages.delete_failed',['item'=> __('validation.attributes.category')]);
            $this->msg_status ='danger';
            ActivityLog::log('category',$category->id,'delete','category delete failed __'.$e->getMessage());
        }
    }

    public function render()
    {
        $categories = Category::with('parent')->paginate($this->paginate_num);
        return view('livewire.admin.category.category-wire', ['categories' => $categories,'msg'=>$this->msg])->layout('layouts.app');
    }
}
