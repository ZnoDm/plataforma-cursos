<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    //Relacion uno a muchos entre category y level
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
}
