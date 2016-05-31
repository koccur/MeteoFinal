<?php

namespace App\Http\Controllers;

use app\Models\Comments;
use Illuminate\Http\Request;
use app\Article;
use app\Comment;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function store(Requests\CreateCommentRequest $request){
        Comments::create($request->all());

        return redirect('articles');
    }
}
