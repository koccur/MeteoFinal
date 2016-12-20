<?php

namespace App\Http\Controllers\Auth;

//use app\user;
use App\Models\User;
use App\Permission;
use App\Role;
use App\Image;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;
use Intervention\Image\Facades\Image as Img;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */

//    protected $redirectTo = '/AddRoleUser';
//    protected $redirectTo = 'users/2';
    protected $username='username';

    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout','getLogout']]);
    }

    public function getlogout()
    {
        \Auth::logout();
        Session::flush();
        return redirect('/');
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
        $zm=Auth::user();
        $user=Role::where('name','=','User')->first();
        $zm->roles()->attach($user->id);
        $image=new Image;
        $destination_path = 'img/avatar/';
        $filename = 'cultist.png';
        $file=$destination_path.$filename;

//                 save image data into database //
        $image->file = $destination_path . $filename;
        $image->destination_path=$destination_path;
        $image->filename=$filename;
        $image->caption = $request->input('username');
        $zmm=Img::make($image->file);
        $zmm->resize(64,64);
        $zmm->save($destination_path.'thumbnails/'.$filename);
//        dd($zm);
        $zm->image_url=$destination_path.'thumbnails/'.$filename;
//
        Auth::user()->save();
        return redirect($this->redirectPath());//zmiana na dodanie uprawnien
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    protected function getFailedLoginMessage()
    {//zle zalogowanie
        return 'Problem z zalogowaniem spróbuj ponownie.';
    }
}
