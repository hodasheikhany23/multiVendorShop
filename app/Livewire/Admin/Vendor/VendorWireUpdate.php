<?php

namespace App\Livewire\Admin\Vendor;

use App\Models\ActivityLog;
use App\Models\Category;
use App\Models\City;
use App\Models\Media;
use App\Models\Province;
use App\Models\User;
use App\Models\Vendor;
use Livewire\Component;
use Livewire\WithFileUploads;

class VendorWireUpdate extends Component
{
    use WithFileUploads;
    public $currentStep = 1;
    public $totalSteps = 5;
    public array $states = [];
    public $users;
    public $user_id;
    public $f_name;
    public $f_name_en;
    public $l_name;
    public $l_name_en;
    public $phone;
    public $province;
    public $provinces = null;
    public $city = null;
    public $cities;

    public $selected_province = null;
    public $selected_city = null;
    public $shop_name = null;
    public $shop_name_en = null;
    public $description = null;
    public $description_en = null;
    public $categories = null;
    public $logo = null;
    public $website = null;

    public $telegram = null;
    public $instagram = null;
    public $eata = null;
    public $email = null;
    public $status = null;


//    public $name, $email, $phone;
//
//    public $username, $password, $password_confirmation;
    public $items = [];
    public $selected = [];
    public $dropdownOpen = false;

    public $msg = null;
    public $msg_status = null;

    public $vendor;

    public function mount(Vendor $vendor){
        $this->provinces = Province::all();

        $categories = Category::with('children')->whereNull('parent_id')->get();

        $this->items = $this->buildTree($categories);

        $this->users = User::all();

        $this->f_name = $vendor->name;
        $this->l_name = $vendor->l_name;
        $this->user_id = $vendor->user_id;
        $this->phone = $vendor->phone;
        $this->city = $vendor->city;
        $this->province = $vendor->province;

        $this->shop_name = $vendor->shop_name;
        $this->description = $vendor->description;
        $this->website = $vendor->website;
        $this->status = $vendor->status;

        $this->telegram = $vendor->telegram;
        $this->instagram = $vendor->instagram;
        $this->email = $vendor->email;
        $this->eata = $vendor->eata;

        $this->f_name_en = $vendor->name_en;
        $this->l_name_en = $vendor->l_name_en;
        $this->shop_name_en = $vendor->shop_name_en;
        $this->description_en = $vendor->description_en;
    }
    private function buildTree($categories)
    {
        $tree = [];

        foreach ($categories as $category) {
            $tree[$category->name] = $category->children->count()
                ? $this->buildTree($category->children) // بازگشتی
                : ['id' => $category->id, 'name' => $category->name];
        }

        return $tree;
    }
    public function findNameById($items, $id)
    {
        foreach ($items as $key => $value) {
            // اگر آیتم نهایی بود
            if (isset($value['id']) && $value['id'] == $id) {
                return $value['name'];
            }

            // اگر آرایه‌ی تو در تو باشه (یعنی زیرشاخه)
            if (is_array($value)) {
                $found = $this->findNameById($value, $id);
                if ($found) return $found;
            }
        }
        return null;
    }
    public function remove($id)
    {
        $this->selected = array_filter($this->selected, fn($item) => $item != $id);
    }

    public function toggleDropdown()
    {
        $this->dropdownOpen = !$this->dropdownOpen;
    }

    public function nextStep()
    {
        $this->currentStep+=1;
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function edit()
    {
        $this->validate([
            'f_name' => 'required|string|max:255|min:3',
            'l_name' => 'required|string|max:255|min:3',
            'phone' => 'required|string|max:255|min:3',
            'province' => 'required',
            'city' => 'required',
            'shop_name' => 'required|string|max:255|min:3',
            'user_id' => 'required|integer',
        ]);
        $vendor = $this->vendor;
        try {
            $vendor->user_id = $this->user_id;
            $vendor->name = $this->f_name;
            $vendor->name_en = $this->f_name_en;
            $vendor->l_name = $this->l_name;
            $vendor->l_name_en = $this->l_name_en;
            $vendor->city = $this->city;
            $vendor->province = $this->province;
            $vendor->description = $this->description;
            $vendor->description_en = $this->description_en;
            $vendor->shop_name = $this->shop_name;
            $vendor->shop_name_en = $this->shop_name_en;
            $vendor->phone  = $this->phone;
            $vendor->telegram = $this->telegram;
            $vendor->instagram = $this->instagram;
            $vendor->website = $this->website;
            $vendor->email = $this->email;
            $vendor->eata = $this->eata;
            $vendor->status = $this->status;
            $vendor->save();

            if (is_array($this->selected) && !empty($this->selected)) {
                $vendor->categories()->sync($this->selected);
            }
            $this->validate([
                'logo' => 'nullable|image|max:2048',
            ]);
            if ($this->logo) {
                try{
                    $path = $this->logo->store('vendors', 'public');
                    $media = new Media();
                    $media->name = $this->shop_name.'_logo';
                    $media->path = $path;
                    $media->model_type = Vendor::class;
                    $media->model_id = $vendor->id;
                    $media->size = $this->logo->getSize();
                    $media->mime_type = $this->logo->getMimeType();
                    $media->save();
                }catch (\Exception $e){
                    $this->msg =__('validation.massages.update_failed',['item'=> __('validation.attributes.logo')]);
                    $this->msg_status ='failed';
                    ActivityLog::log('vendor',null,'update','failed to update vendor (logo image error) __'.$e->getMessage());
                }

            }
            ActivityLog::log('vendor',$vendor->id,'update','vendor update successfully');

            $this->msg =__('validation.massages.update_success',['item'=> __('validation.attributes.vendor')]);
            $this->msg_status ='success';

        }catch (\Exception $e){
            $this->msg =__('validation.massages.update_failed',['item'=> __('validation.attributes.vendor')]);
            $this->msg_status ='failed';
            ActivityLog::log('vendor',$vendor->id,'update','failed to update vendor __'.$e->getMessage());
        }
    }
    public function render()
    {
        $this->provinces = Province::all();
        $this->cities = City::where('province',$this->province)->get();
        $this->users = User::all();
        return view('livewire.admin.vendor.vendor-wire-update', ['currentStep' => $this->currentStep])
            ->layout('layouts.app');
    }
}
