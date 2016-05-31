<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable= [
        'caption',
        'descrpiton',
    ];
    public function article(){
        return $this->belongsTo('app\Article','article_id');
    }
    public function user(){
        return $this->belongsTo('app\User','user_id');
    }
}
