<?php
namespace App\Http\Controllers;
use App\User;
use DB;
use app\Http\Requests;
use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use Carbon\Carbon;
class PagesController extends Controller
{
	public function __construct(){
		$this->middleware('auth',['only' => 'create']);
	}
	public function index(){
//        return \Auth::user();/*sprawdzenie uzytkownika ktory zalogowany */
		return view('pages.home');
	}



}