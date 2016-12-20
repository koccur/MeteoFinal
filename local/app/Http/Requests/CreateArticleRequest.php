<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateArticleRequest extends Request
{
    public function authorize(){

            return true;
    }
    public function rules()
    {
        return [
            'title'=>'required|min:5',
            'body' => 'required|min:10',
            'published_at' =>'required|date',
        ];
    }
}
