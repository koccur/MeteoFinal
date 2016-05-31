<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateArticleRequest extends Request
{
    public function authorize(){
        if($this->user()->can('can_create')){
            return true;//zmienic na false bo kazdy moze wszystko robic
        }
            return false;
    }
    public function rules()
    {
        return [
            'title'=>'required|min:5',
            'body' => 'required|min:10',
            'published_at' =>'required|date',
//            'photo'=>'required'
//            'category_id' =>'required',
        ];
    }
}
