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

}
