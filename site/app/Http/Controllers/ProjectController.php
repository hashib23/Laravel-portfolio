<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectModel;


class ProjectController extends Controller
{
    function ProjectIndex(){

        $ProjectsData=ProjectModel::orderBy('id','desc')->get();
        return view('projects',[
            'ProjectsData'=>$ProjectsData
            ]);
    }
}
