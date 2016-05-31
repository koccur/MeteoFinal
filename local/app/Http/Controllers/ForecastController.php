<?php
namespace App\Http\Controllers;

use App\Forecast;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use Carbon\Carbon;


class ForecastController extends Controller
{
    public function index()
    {

        return view('forecast.weather');
    }
    public function olsztyn()
    {
        return view('Forecast.olsztyn');
    }
    public function london()
    {
        return view('forecast.london');
    }
    public function rzeszow(){
        return view('forecast.rzeszow');
    }
    
    
//    public function doS(){
//        $weather=$this->forecast->get($lat,$lon);
//   }
}
