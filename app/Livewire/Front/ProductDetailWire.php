<?php

namespace App\Livewire\Front;

use App\Models\Category;
use App\Models\City;
use App\Models\Product;
use App\Models\Province;
use Livewire\Component;

class ProductDetailWire extends Component
{
    public $product;
    public $product_name;
    public $num;
    public $str;
    public $parent;
    public $breadcrumb;
    public $categories;
    public $attributs;
    public $province;
    public $city;
    public function mount($product,$slug)
    {
        $Porduct = Product::findOrFail($product);
        $this->product = $Porduct;
        $this->product_name = $Porduct->name;
        preg_match('/^(\d+)(.*)$/', $slug, $matches);
        $this->num = $matches[1];
        $this->str = $matches[2];
        $this->parent = Category::with('parent')->where('id', $this->num)->first();
        $string = $this->parent->full_name;
        $this->breadcrumb = explode('/', $string);
        $this->province = Province::where('id',$Porduct->vendors->province)->first();
        $this->city = City::where('id',$Porduct->vendors->city)->first();
        $this->categories = Category::whereNull('parent_id')->with('children')->get();
        $this->attributs = \DB::table('attribute_product')
            ->join('attributes', 'attribute_product.attribute_id', '=', 'attributes.id')
            ->where('attribute_product.product_id', $product)
            ->select('attributes.name as attribute_name', 'attribute_product.*')
            ->get()
            ->groupBy('attribute_name');
    }
    private function buildTree($categories)
    {
        $tree = [];

        foreach ($categories as $category) {
            $tree[$category->name] = $category->children->count()
                ? $this->buildTree($category->children)
                : ['id' => $category->id, 'name' => $category->name];
        }

        return $tree;
    }
    public function render()
    {
        $category = Category::with('children')->where('id', $this->num)->firstOrFail();
        $categoryIds = $category->allChildrenIds()->toArray();
        $products = Product::whereHas('categories', function($query) use ($categoryIds) {
            $query->whereIn('categories.id', $categoryIds);
        })->get();

        return view('livewire.front.product-detail-wire')->layout('layouts.front');
    }
}
