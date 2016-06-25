<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use App\Category;
use App\Image;
use App\Http\Requests;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Img;
use Illuminate\Support\Facades\Auth;
use Nwidart\ForecastPhp\Forecast;
use Validator;
use Symfony\Component\HttpFoundation\File;

class ArticlesController extends Controller
{
public function __construct(){
    $this->middleware('auth',['only' => 'create']);
}
    public function index()
    {
        $articles = Article::latest('published_at')->published()->paginate(5);
        return view('articles.index', compact('articles'));
    }
    public function lista(){
        $articles= Article::latest('published_at')->published()->paginate(5);
        $art=Article::latest('published_at');
        return view('articles.lista',compact('articles',$art));
    }
    public function show($id)
    {
        $article=Article::findOrFail($id);
        $comments = $article->comments;
        return view('articles.show',compact('article'))->withComments($comments);
    }
    public function create(Request $request)
    {
        $cat=Category::pluck('title','id');
        if($request->user()->can('can_create')) {
            return view('articles.create',compact('cat'));
        }
        else{
                return redirect('/')->withErrors("Brak Ci uprawnień człeniu");
            }
    }
    public function store(CreateArticleRequest $request){
            $article= new Article($request->all());
            $article->author=Auth::user()->username;
            $article->category_id=Input::get('cat_id');
            $cat=Category::findOrFail($article->category_id);
            $article->cat_name=$cat->title;
            $image = new Image;
            // upload the image //
            $file = $request->file('userfile');
            $destination_path = 'img/obrazki/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $file->move($destination_path, $filename);
    //        // save image data into database //
            $image->file = $destination_path . $filename;
            $image->destination_path=$destination_path;
            $image->filename=$filename;
            $image->caption = $request->input('title');
            $image->save();
            $zm=Img::make($image->file);
            $zm->resize(320,240);
            $zm->save($destination_path.'thumbnails/'.$filename);
            $article->image_url_s=$destination_path.'thumbnails/'.$filename;
            $article->image_url=$destination_path.$filename;
            Auth::user()->articles()->save($article);
            return redirect('articles');
    }
    public function edit($id){//poprawa
        $article=Article::findOrFail($id);
        $cat=Category::pluck('title','id');
            return view('articles.edit', compact('article','id','cat'));
    }

    public function update($id, UpdateArticleRequest $request){//poprawa
        $article=Article::findOrFail($id);
        $article->category_id=Input::get('cat_id');
        $cat=Category::findOrFail($article->category_id);
        $article->cat_name=$cat->title;
        $article->category_id= 2;
        $article->update($request->all());

        return redirect('articles');
    }

//    public function destroy($id){
//        $user = Article::findOrFail($id);
//        $user->delete();
//        return redirect()->action('ArticleController@index');
//    }

}
