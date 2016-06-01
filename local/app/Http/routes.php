<?php


use App\Permission;
use App\Role;
use App\Models\User;
use App\Image;
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/contact', function () {
    return view('contact.contact');
});
Route::get('/about', function () {
    return view('contact.about');
});
Route::get('articles/lista',function (){
    return view('articles.lista');
});
Route::get('/images/gallery',function(){
    $images=Image::all();
    return view('images.list',compact('images'));
});
//Route::get('/users.delete')
Route::group(['middleware' => ['web']], function () {

    Route::resource('articles', 'ArticlesController');
    Route::resource('users', 'UsersController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('comments', 'CommentsController');
    Route::resource('about', 'PagesController');
    Route::resource('', 'PagesController');
    Route::resource('images','ImageController');
    Route::resource('forecast','ForecastController');
});
//Route::get('user/{id}','UsersController@show')->where('id','[0-9]+');
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
//    Route::get('/reset/password','Auth\PasswordController');
    Route::get('/home', 'HomeController@index');
});
///////////////////////////////
//Route::post('/users/destroy','UsersController@destroy');


///////////////////////////////////////
//Do poprawy bezpieczenstwa
Route::get('/AddRoleUser', function () {

////    dd($user);
////    dd($read);
    $admin = new Role();
    $admin->name = 'Admin';
    $admin->display_name = 'Administrator';
    $admin->save();
    $user = new Role();
    $user->name = 'User';
    $user->display_name = 'Użytkownik';
    $user->save();
    $mod = new Role();
    $mod->display_name = 'Moderator';
    $mod->name = 'Mod';
    $mod->save();
//
    $user = Role::where('name', '=', 'User')->first();
    $admin = Role::where('name', '=', 'Admin')->first();
    $mod = Role::where('name', '=', 'Mod')->first();


    $read = new Permission();
    $read->name = 'can_read';
    $read->display_name = 'Can Read Data';
    $read->save();

////////
    $create = new Permission();
    $create->name = 'can_create';
    $create->display_name = 'Moze tworzyc artykuły';
    $create->save();

    $edit = new Permission();
    $edit->name = 'can_edit';
    $edit->display_name = 'Can Edit Data';
    $edit->save();

    $edit_user = new Permission();
    $edit_user->name = 'can_edit_user';
    $edit_user->display_name = "może edytować użytkowników";
    $edit_user->save();
//
    $read = Permission::where('name', '=', 'can_read')->first();
    $create = Permission::where('name', '=', 'can_create')->first();
    $edit_user = Permission::where('name', '=', 'can_edit_user')->first();
    $edit = Permission::where('name', '=', 'can_edit')->first();

    $admin->perms()->sync(array($read->id, $edit->id, $create->id, $edit_user->id));
    $user->perms()->sync(array($read->id));
    $mod->perms()->sync(array($read->id, $edit->id, $create->id));
//    return 'x';

});
//    $adminRole = DB::table('roles')->where('name', '=', 'Admin')->pluck('id');
//    $modRole = DB::table('roles')->where('name', '=', 'Mod')->pluck('id');
//    $userRole = DB::table('roles')->where('name', '=', 'User')->pluck('id');
//////// print_r($userRole);
////// die();
////dd($user);
//
////    $user1 = User::where('username', '=',  )->first();
////    $user2 = User::where('username', '=', 'moderator')->first();
//    $user1=User::all()->last();
////        $us=Auth::user();
////    $user=
////        dd($us);
//    $user1->roles()->attach($user->id);
//    return redirect('/');
//});
//Route::get('/AddRoleMod', function () {
//
//    $mod=Role::where('name','=','Mod')->first();
//    $edit = Permission::where('name', '=', 'can_edit')->first();
//    $create = Permission::where('name', '=', 'can_create')->first();
//    $read = Permission::where('name', '=', 'can_read')->first();
////    dd($mod);
//    $mod->perms()->sync(array($edit->id, $create->id, $read->id));
//
//    $user1 = User::all()->last();
//    $user1->roles()->attach($mod->id);
//});
//Route::get('/AddRoleAdmin', function () {
//    $admin = Role::where('name', '=', 'Admin')->first();
//    $edit = Permission::where('name', '=', 'can_edit')->first();
//    $edit_user = Permission::where('name', '=', 'can_edit_user')->first();
//    $create = Permission::where('name', '=', 'can_create')->first();
//    $read = Permission::where('name', '=', 'can_read')->first();
//    $admin->perms()->sync(array($edit->id, $create->id, $read->id));
//
//    $user1 = User::all()->last();
//    $user1->roles()->attach($admin->id);
//
//});

