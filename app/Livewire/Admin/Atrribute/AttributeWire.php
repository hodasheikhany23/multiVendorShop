<?php

namespace App\Livewire\Admin\Atrribute;

use App\Models\ActivityLog;
use App\Models\Attribute;
use Livewire\Component;
use Livewire\WithPagination;

class AttributeWire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $attribute;
    public $msg = null;
    public $msg_status = null;

    public function deleteAttribute($id)
    {
        $attribute = Attribute::findOrFail($id);
        try {
            $attribute->delete();
            $this->msg_status = 'info';
            $this->msg = __('validation.massages.delete_success',['item'=>__('validation.attributes.attribute')]);

            ActivityLog::log('attribute',$attribute->id,'delete','attributes deleted successfully');
        }catch (\Exception $e){
            ActivityLog::log('attribute',$attribute->id,'delete','attributes deleted failed__'.$e->getMessage());
            $this->msg_status = 'failed';
            $this->msg = __('validation.massages.delete_failed',['item'=>__('validation.attributes.attribute')]);
        }
    }
    public function render()
    {
        $this->attribute = Attribute::all();
        return view('livewire.admin.atrribute.attribute-wire')->layout('layouts.app');
    }
}
