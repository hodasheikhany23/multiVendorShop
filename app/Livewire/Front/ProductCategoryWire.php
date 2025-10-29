<?php

namespace App\Livewire\Front;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductCategoryWire extends Component
{
    public $num;
    public $str;
    public $parent;
    public $breadcrumb;
    public $categories;
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
        preg_match('/^(\d+)(.*)$/', $slug, $matches);
        $this->num = $matches[1];
        $this->str = $matches[2];
        $this->parent = Category::with('parent')->where('id', $this->num)->first();
        $string = $this->parent->full_name;
        $this->breadcrumb = explode('/', $string);

        $this->categories = Category::whereNull('parent_id')->with('children')->get();
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
//        dd(Product::with('categories')->get());

        return view('livewire.front.product-category-wire',['products'=>$products])->layout('layouts.front');
    }
}
