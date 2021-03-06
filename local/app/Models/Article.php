<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class article extends Model
{
    protected $guarded=[];
    protected $fillable= [
        'title',
        'body',
        'published_at',
        'user_id',
        'author',
    ];
    protected $dates = ['published_at'];
    //setNameAttribute
    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }
    public function scopePublished($query){
        $query->where('published_at','<=',Carbon::now());
    }
    public function scopeUnPublished($query){
        $query->where('published_at','>',Carbon::now());
    }
    public function user(){
        return $this->belongsTo('app\User','user_id');
    }
    public function category(){
        return $this->belongsTo('app\Category','category_id');
    }
    public function comments(){
        return $this->hasMany('app\Comment','article_id');
    }
    public function image(){
        return $this->hasOne('app\Image','article_id');
    }
}
