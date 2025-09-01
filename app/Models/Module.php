<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    public function menus(){
        return $this->hasOne(Menu::class,'id','user_id');
    }
}
