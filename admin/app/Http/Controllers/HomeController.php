<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;
use App\CourseModel;
use App\ProjectModel;
use App\ServiceModel;
use App\ReviewModel;
use App\ContactModel;
use App\PhotoModel;

class HomeController extends Controller
{
    function homeIndex(){

    	$TotalVisitor=VisitorModel::count();
    	$TotalCourse=CourseModel::count();
    	$TotalProject=ProjectModel::count();
    	$TotalService=ServiceModel::count();
    	$TotalReview=ReviewModel::count();
    	$TotalContact=ContactModel::count();
        $TotalPhoto=PhotoModel::count();

        return view('home',[

        		'TotalVisitor'=>$TotalVisitor,
        		'TotalCourse'=>$TotalCourse,
        		'TotalProject'=>$TotalProject,
        		'TotalService'=>$TotalService,
        		'TotalReview'=>$TotalReview,
        		'TotalContact'=>$TotalContact,
                'TotalPhoto'=>$TotalPhoto

        ]);
    }
}
