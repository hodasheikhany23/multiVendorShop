<?php

namespace App\Livewire\Admin\Product;

use App\Models\ActivityLog;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use App\Models\Vendor;
use Livewire\Component;
use Livewire\WithFileUploads;
class ProductWireCreate extends Component
{
    use WithFileUploads;
    public $currentStep = 1;
    public $totalSteps = 3;
    public array $states = [];
    public $vendors;
    public $vendor_id=null;
    public $name = null;
    public $name_en = null;
    public $price = null;
    public $quantity = null;

    public $description = null;
    public $description_en = null;
    public $categories = null;
    public $logo = null;

    public $status = null;

    public $items = [];
    public $selected = [];
    public $dropdownOpen = false;

    public $msg = null;
    public $msg_status = null;

    public $images = [];
    public $mainImage;

    public $attribute;
    public $selected_attributes=[];
    public $formCount=1;

    public function mount(){

        $categories = Category::with('children')->whereNull('parent_id')->get();

        $this->items = $this->buildTree($categories);

        $this->vendors = Vendor::all();

        $this->attribute = Attribute::all();

        $this->selected_attributes = [
            ['id' => null, 'value' => null, 'price'=>null, 'quantity'=>null]
        ];
    }

    public function addForm(){
        $this->formCount++;
        $this->selected_attributes[] = ['id' => null, 'value' => null, 'price'=>null, 'quantity'=>null];
    }
    public function deleteForm(){
        if ($this->formCount > 1) {
            $this->formCount--;
            array_pop($this->selected_attributes);
        }
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
            if (isset($value['id']) && $value['id'] == $id) {
                return $value['name'];
            }

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
    public function setMainImage($index)
    {
        $this->mainImage = $index;
    }

    public function removeImage($index)
    {
        unset($this->images[$index]);
        $this->images = array_values($this->images); // ری‌اینکس
    }
    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255|min:3',
            'description' => 'nullable|string|max:255|min:3',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);
        $product = new Product();
        try {
            $product->vendor_id = $this->vendor_id;
            $product->name = $this->name;
            $product->name_en = $this->name_en;
            $product->price = $this->price;
            $product->quantity = $this->quantity;
            $product->status = $this->status;
            $product->save();

            if (is_array($this->selected) && !empty($this->selected)) {
                $product->categories()->sync($this->selected);
            }

            $data = [];
            foreach ($this->selected_attributes as $attr) {
                if (!empty($attr['id'])) {
                    $data[] = [
                        'attribute_id' => $attr['id'],
                        'value'        => $attr['value'] ?? null,
                        'price'        => $attr['price'] ?? 0,
                        'quantity'     => $attr['quantity'] ?? 0,
                    ];
                }
            }
            $product->attributes()->sync($data);

            $mediaRecords = [];

            foreach ($this->images as $index => $image) {
                $path = $image->store('product', 'public');
                $media = new Media();
                $media->name = $this->name.'_image_'.$index.rand();
                $media->path = $path;
                $media->model_type = Product::class;
                $media->model_id = $product->id;
                $media->size = $image->getSize();
                $media->mime_type = $image->getMimeType();
                $media->is_main = $this->mainImage === $index;
                $mediaRecords[] = $media;
                $media->save();
            }
            ActivityLog::log('product',$product->id,'create','product created successfully');

            $this->msg =__('validation.massages.add_success',['item'=> __('validation.attributes.product')]);
            $this->msg_status ='success';

        }catch (\Exception $e){
            $this->msg =__('validation.massages.add_failed',['item'=> __('validation.attributes.product')]);
            $this->msg_status ='failed';
            ActivityLog::log('product',null,'create','failed to create product __'.$e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.admin.product.product-wire-create')->layout('layouts.app');
    }
}
