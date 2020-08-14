<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;
use App\ServicesModel;

class HomeController extends Controller
{
    function homeIndex(){

        $UserIP=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set('Asia/Dhaka');
        $timeDate=date('y-m-d h:i:sa');
        VisitorModel::insert(['ip_address'=>$UserIP,'visit_time'=>$timeDate]);

        $ServicesData=ServicesModel::all();

        return view('home',[
            'ServicesData'=>$ServicesData
        ]);
    }
}
