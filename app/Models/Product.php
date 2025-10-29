<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function vendors(){
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function media()
    {
        return $this->morphMany(Media::class, 'model');
    }
    public function attributes(){
        return $this->belongsToMany(Attribute::class)->withPivot('value','price','quantity');
    }
    public function mainImage()
    {
        return $this->morphOne(Media::class, 'model')->where('is_main', true);
    }
}
