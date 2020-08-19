<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseModel;

class CoursesController extends Controller
{
    
    function CoursesIndex(){
        return view('courses');
    }

    function getCoursesData(){
        $result=CourseModel::orderBy('id','desc')->get();
            return $result;
    }

    function getCourseDetails(Request $req){
        $id = $req->input('id');
        $result = CourseModel::where('id', '=', $id)->get();
        return $result;
    }

    function CourseDelete(Request $req){
        $id = $req->input('id');
        $result = CourseModel::where('id', '=', $id)->delete();
        if ($result == true)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    function CourseAdd(Request $req){
        $course_title = $req->input('title');
        $course_subtitle = $req->input('subtitle');
        $course_details = $req->input('details');
        $course_fee = $req->input('fee');
        $course_totalenroll = $req->input('totalenroll');
        $course_totalclass = $req->input('totalclass');
        $course_link = $req->input('link');
        $course_img = $req->input('img');


        $result=CourseModel::insert([
            'course_title' => $course_title,
            'course_subtitle' => $course_subtitle, 
            'course_details' => $course_details,
            'course_fee' => $course_fee,
            'course_totalenroll' => $course_totalenroll,
            'course_totalclass' => $course_totalclass,
            'course_link' => $course_link,
            'course_img' => $course_img
            ]);

        if ($result == true){
            return 1;
        }
        else
        {
            return 0;
        }
    }

    function CourseUpdate(Request $req){
        $id = $req->input('id');
        $course_title = $req->input('title');
        $course_subtitle = $req->input('subtitle');
        $course_details = $req->input('details');
        $course_fee = $req->input('Fee');
        $course_totalenroll = $req->input('totalenroll');
        $course_totalclass = $req->input('totalclass');
        $course_link = $req->input('link');
        $course_img = $req->input('img');

        $result = CourseModel::where('id','=', $id)->update([
                'course_title' => $course_title,
                'course_subtitle' => $course_subtitle, 
                'course_details' => $course_details,
                'course_fee' => $course_fee,
                'course_totalenroll' => $course_totalenroll,
                'course_totalclass' => $course_totalclass,
                'course_link' => $course_link,
                'course_img' => $course_img
            ]);

        if ($result == true)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    

}

