<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;
    
    //Relacion uno a uno entre lesson y description inversa
    public function lesson(){
        return $this->belongsTo('App\Models\Lesson');
    }
}
