<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $guarded=[];
    protected $fillable = [
        'body'
    ];


    public function articles(){
        return $this->belongsTo('app\Article','article_id');//duza litera?
    }
    public function user(){
        return $this->belongsTo('app\User','user_id');
    }
}
