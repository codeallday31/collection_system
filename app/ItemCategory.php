<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $fillable = ['name'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }
    
    public function indexUrl($notification){
        return redirect()->route('item.category.index')->with($notification);
    }
}
