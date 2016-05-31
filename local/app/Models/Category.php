<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'title', 'description'
    ];


    public function articles(){
        return $this->hasMany('app\Article');//duza litera?
    }
}
