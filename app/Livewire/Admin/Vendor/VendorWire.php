<?php

namespace App\Livewire\Admin\Vendor;

use App\Models\ActivityLog;
use App\Models\City;
use App\Models\Province;
use App\Models\Vendor;
use Livewire\Component;
use Livewire\WithPagination;

class VendorWire extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate_num=5;
    public $msg;
    public $msg_status;


    public function deleteVendor($id){
        $vendor = Vendor::findOrFail($id);
        try {
            $vendor->delete();
            ActivityLog::log('vendor',$vendor->id,'delete','vendor deleted successfully');

            $this->msg =__('validation.massages.delete_success',['item'=> __('validation.attributes.vendor')]);
            $this->msg_status ='info';
        }
        catch (\Exception $e){
            $this->msg =__('validation.massages.delete_failed',['item'=> __('validation.attributes.vendor')]);
            $this->msg_status ='danger';
            ActivityLog::log('vendor',$vendor->id,'delete','vendor delete failed __'.$e->getMessage());
        }
    }
    public function render()
    {
        $vendors = Vendor::with(['users','categories.parent.parent'])->paginate($this->paginate_num);
        $provinces = Province::all();
        $cities = City::all();
        return view('livewire.admin.vendor.vendor-wire',['vendors'=>$vendors,'provinces'=>$provinces,'cities'=>$cities])->layout('layouts.app');
    }
}
