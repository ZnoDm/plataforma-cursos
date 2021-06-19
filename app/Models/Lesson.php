<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    public function getCompletedAttribute(){
        return $this->users->contains(auth()->user()->id);
    }

    //Relacion uno a uno entre lesson y description
    public function description(){
        return $this->hasOne('App\Models\Description');
    }

    //Relacion uno a muchos entre lesson y section inversa
    public function section(){
        return $this->belongsTo('App\Models\Section');
    }

    //Relacion uno a muchos entre lesson y platform inversa
    public function platform(){
        return $this->belongsTo('App\Models\Platform');
    }

    //Relacion mucho a muchos entre lesson y user
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }



    //Relacion uno a uno polimorfica
    public function resource(){
        return $this->morphOne('App\Models\Resource','resourceable');
    }

    //Relacion uno a muchos polimorfica
    public function comments(){
        return $this->morphMany('App\Models\Comment','commentable');
    }
    public function reactions(){
        return $this->morphMany('App\Models\Reaction','reactionable');
    }
}
