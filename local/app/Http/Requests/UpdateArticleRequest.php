<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateArticleRequest extends Request
{
    public function authorize(){
        if($this->user()->can('can_edit')){
            return true;//zmienic na false bo kazdy moze wszystko robic
        }
        return false;
    }
    public function rules()//tutaj problem jakis
    {
        return [
            'title'=>'required|min:5',
            'body' => 'required|min:10',
            'published_at' =>'required|date',
//            'category_id'=>'required',
        ];
    }
}
