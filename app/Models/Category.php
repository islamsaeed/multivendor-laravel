<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use translatable;
    protected $with = ['translations'];
    protected $fillable = ['slug','parent_id','is_active'];

    protected $cast = [
        'is_active' => 'boolean'
    ];

    protected $translatedAttributes = ['name'];
    protected $hidden =['translations'];


}
