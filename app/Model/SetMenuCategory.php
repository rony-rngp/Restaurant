<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SetMenuCategory extends Model
{
    public function setmenu_products()
    {
        return $this->hasMany(SetMenuProduct::class, 'setmenucategory_id', 'id');
    }

    public function setmenu()
    {
        return $this->belongsTo(SetMenu::class);
    }
}
