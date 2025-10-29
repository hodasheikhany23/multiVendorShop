<?php

namespace App\Livewire\Admin\Product;

use App\Models\ActivityLog;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductWire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate_num = 10;
    public $msg = null;
    public $msg_status = null;
    public function deleteproduct($id)
    {
        $product = Product::findOrFail($id);
        try {
            $product->delete();
            ActivityLog::log('product',$product->id,'delete','product deleted successfully');

            $this->msg =__('validation.massages.delete_success',['item'=> __('validation.attributes.product')]);
            $this->msg_status ='info';
        }catch (\Exception $e){
            $this->msg =__('validation.massages.delete_failed',['item'=> __('validation.attributes.product')]);
            $this->msg_status ='danger';
            ActivityLog::log('product',$product->id,'delete','product delete failed __'.$e->getMessage());
        }
    }
    public function render()
    {
        $products = Product::with('categories','vendors')->paginate($this->paginate_num);
        return view('livewire.admin.product.product-wire',['products'=>$products])->layout('layouts.app');
    }
}
