<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public function parent()
    {
        return $this->belongsTo(City::class, 'parent_id');
    }
    public function children(){
        return $this->hasMany(City::class, 'parent_id');
    }
}
