<?php

namespace App\Livewire\Admin\Tag;

use App\Models\ActivityLog;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class TagWire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tags;
    public $paginate_num=5;
    public $msg;
    public $msg_status;

    public function deleteTag($id)
    {
        $tag = Tag::findOrfail($id);
        try {
            $tag->delete();

            ActivityLog::log('tag',$tag->id,'delete','tag deleted successfully');

            $this->msg =__('validation.massages.delete_success',['item'=> __('validation.attributes.tag')]);
            $this->msg_status ='info';
        }catch (\Exception $e){
            $this->msg =__('validation.massages.delete_failed',['item'=> __('validation.attributes.tag')]);
            $this->msg_status ='danger';
            ActivityLog::log('tag',$tag->id,'delete','tag delete failed __'.$e->getMessage());
        }
    }

    public function render()
    {
        $this->tags = Tag::all();
        return view('livewire.admin.tag.tag-wire')->layout('layouts.app');
    }
}
