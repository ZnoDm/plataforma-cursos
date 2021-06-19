<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;
    
    //Relacion uno a muchos entre price y level
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
}
