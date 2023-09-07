<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SetMenu extends Model
{
    public function setmenu_categories()
    {
        return $this->hasMany(SetMenuCategory::class, 'setmenu_id', 'id');
    }
    public function setmenu_products()
    {
        return $this->hasMany(SetMenuProduct::class, 'setmenu_id', 'id');
    }
}
