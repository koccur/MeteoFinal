<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
{
    public function authorize(){
        return true;
    }

    public function rules()
    {
        return [
            'username'=>'required|max:30|unique:users',
            'email' => 'required|email|unique:users',
            'password' =>'required|confirmed|min:8',
        ];
    }
}
