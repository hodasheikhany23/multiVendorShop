<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function children(){
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function getParentsPathAttribute()
    {
        $category = $this->parent;
        $names = [];

        while ($category) {
            if(app()->getLocale() == 'fa'){
                array_unshift($names, $category->name);
            }
            else{
                array_unshift($names, $category->name_en);
            }

            $category = $category->parent;
        }

        return implode(' _ ', $names);
    }

    public function getFullNameAttribute()
    {
        if ($this->parent) {
            if(app()->getLocale() == 'fa'){
                return $this->parent->full_name . '/' . $this->name;
            }
            else{
                return $this->parent->full_name . '/' . $this->name_en;
            }
        }
        if (app()->getLocale() == 'fa') {
            return $this->name;
        }
        else{
            return $this->name_en;
        }
    }

    public function allChildrenIds()
    {
        $ids = collect([$this->id]);

        foreach ($this->children as $child) {
            $ids = $ids->merge($child->allChildrenIds());
        }

        return $ids;
    }
    public function vendors(){
        return $this->belongsToMany(Vendor::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class);
    }

}
