<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateArticleRequest;
use App\Permission;
use App\User;
use DB;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Hashing\BcryptHasher;
use Validator;
use App\Role;
use App\Image;
use app\Http\Requests;
use App\article;
use Intervention\Image\Facades\Image as Img;
use Symfony\Component\HttpFoundation\File;
use App\Http\Controllers\Controller;
use app\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function index(){
        $users=DB::table('users')->paginate(15);
        return view('users.index',compact('users'));
    }

    public function store(CreateUserRequest $request){
        return redirect()->action('UsersController@index');
    }

    public function edit($id){
        $raz=User::findOrFail($id);
//        $this->addrole($raz->id);
        $role=Role::Pluck('name','id');
        return view('users.edit',compact('raz','role'));
    }

    public function changePassword($id, ResetPasswordRequest $request){
        $user=User::findorFail($id);
        $zm=Input::get('password');

        $user->password=bcrypt($zm);
    return redirect('users');
    }

    public function update($id,UpdateUserRequest $request){
        $zm=User::findOrFail($id);
        $zm->email=Input::get('email');
        $image = new Image;
        // upload the image //
        if($request->file('userfile')) {
            $file = $request->file('userfile');
            $destination_path = 'img/avatar/';

            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $file->move($destination_path, $filename);
            //        // save image data into database //
            $image->file = $destination_path . $filename;
            $image->destination_path = $destination_path;
            $image->filename = $filename;
            $image->caption = $request->input('title');
            $zmm = Img::make($image->file);
            $zmm->resize(64, 64);

            $zmm->save($destination_path . 'thumbnails/' . $filename);
            $zm->image_url = $destination_path . 'thumbnails/' . $filename;
        }
        $log=DB::delete('DELETE FROM `role_user` WHERE `user_id`= ?',[$zm->id]);
        $zm->roles()->attach($request->role_id);
        $zm->update($request->all());
        return redirect('users');
    }

    public function user_articles($id){
        $articles=Article::where('user_id',$id)->orderBy('created_at','desc')->paginate(5);
        $title=User::find($id)->name;
        return view('master')->withArticles($articles)->withTitle($title);
    }

    public function profile(Request $request,$id)
    {
        $article=Article::findOrFail($id);
        $article->category_id=Input::get('category_id');
        $cat=Category::findOrFail($article->category_id);
        $article->cat_name=$cat->title;
    }

        public function show( $id ){
            $user=User::findOrFail( $id );
            $role=$user->role;
            return view('users.show',compact('user','role'));
        }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->action('UsersController@index');
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        Auth::guard($this->getGuard())->login($this->create($request->all()));
        return redirect($this->redirectPath());//zmiana na dodanie uprawnien
}

    public function create()
    {
        return redirect()->action('UsersController@index');
    }
}
