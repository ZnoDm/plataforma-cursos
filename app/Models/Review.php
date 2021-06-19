<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    //Relacion uno a muchos entre course y reviews inversa
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    //Relacion uno a muchos entre user y reviews inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
