<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //
    protected $fillable = [
        'name', 'path', 'model_type', 'model_id',
        'size', 'mime_type', 'is_main'
    ];

    public function model()
    {
        return $this->morphTo();
    }
    public function products(){
        return $this->belongsTo(Product::class);
    }
}
