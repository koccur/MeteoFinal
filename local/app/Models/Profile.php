<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Profile extends Model{
    protected $table='profiles';
    protected $fillable=['city','telephone'];
    public function User(){
        return $this->belongsTo('App\User');
    }
}