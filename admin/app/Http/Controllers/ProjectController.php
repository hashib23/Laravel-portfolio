<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;
use App\ProjectModel;

class ProjectController extends Controller
{
    function ProjectIndex(){
        return view('projects');
    }

    function getProjectsData(){
        $result = ProjectModel::orderBy('id','desc')->get();
        return $result;
    }

    function getProjectDetails(Request $req){
        $id = $req->input('id');
        $result = ProjectModel::where('id', '=', $id)->get();
        return $result;
    }

    function ProjectDelete(Request $req){
        $id = $req->input('id');
        $result = ProjectModel::where('id', '=', $id)->delete();
        if ($result == true)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    function ProjectUpdate(Request $req)
    {
        $id = $req->input('id');
        $name = $req->input('project_name');
        $desc = $req->input('project_desc');
        $link = $req->input('project_link');
        $img = $req->input('project_img');

        $result = ProjectModel::where('id', '=', $id)->update([
        'project_name' => $name,
        'project_desc' => $desc,
        'project_link' => $link,
        'project_img' => $img
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


    function ProjectAdd(Request $req){
        $name = $req->input('project_name');
        $desc = $req->input('project_desc');
        $link = $req->input('project_link');
        $img = $req->input('project_img');
        $result=ProjectModel::insert([
            'project_name' =>$name,
            'project_desc' =>$desc,
            'project_link' =>$link,
            'project_img' =>$img
            ]);

        if ($result == true){
            return 1;
        }
        else
        {
            return 0;
        }
    }



}
