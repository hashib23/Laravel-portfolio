<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseModel;

class CourseController extends Controller
{
    function CourseIndex(){
        $CoursesData=CourseModel::orderBy('id','desc')->get();
        return view('courses',[
            'CoursesData'=>$CoursesData
            ]);
    }

}
