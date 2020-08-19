<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;
use App\ServicesModel;
use App\CourseModel;
use App\ProjectModel;
use App\ContactModel;
use App\ReviewModel;

class HomeController extends Controller
{
    function HomeIndex(){

        $UserIP=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set('Asia/Dhaka');
        $timeDate=date('y-m-d h:i:sa');
        VisitorModel::insert(['ip_address'=>$UserIP,'visit_time'=>$timeDate]);
        $ServicesData=ServicesModel::all();
        $CoursesData=CourseModel::orderBy('id','desc')->limit('6')->get();
        $ProjectsData=ProjectModel::orderBy('id','desc')->limit('10')->get();
        $ReviewsData=ReviewModel::all();

        return view('home',[
            'ServicesData'=>$ServicesData,
            'CoursesData'=>$CoursesData,
            'ProjectsData'=>$ProjectsData,
            'ReviewsData'=>$ReviewsData
        ]);
    }

    function ContactSend(Request $request){
        $contact_name=$request->input('contactName');
        $contact_mobile=$request->input('contactMobile');
        $contact_email=$request->input('contactEmail');
        $contact_msg=$request->input('contactMsg');

        $result=ContactModel::insert([
            'contact_name'=>$contact_name,
            'contact_mobile'=>$contact_mobile,
            'contact_email'=>$contact_email,
            'contact_msg'=>$contact_msg
        ]);
        if($request==true){
            return 1;
        }else{
            return  0;
        }
    }



}
