<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use app\Http\Requests;
use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(){
        $this->middleware('auth',['only' => 'create']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.home');
    }

}
